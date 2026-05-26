<?php
namespace Backend\database;

use Backend\support\Model;

/**
 * RideModel — Gerencia as viagens (rides) no sistema CARPOOL
 */
class RideModel extends Model
{
    protected $table = 'rides';

    /**
     * Busca viagens disponíveis com base nos critérios de pesquisa
     * 
     * @param string $origin Cidade de origem
     * @param string $destination Cidade de destino
     * @param string $date Data da viagem (Y-m-d)
     * @return array Lista de viagens
     */
    public function searchAvailableRides(string $origin, string $destination, string $date): array
    {
        $sql = "
            SELECT 
                r.id,
                r.driver_id,
                r.origin_id,
                r.destination_id,
                r.departure_time,
                r.available_seats,
                r.price_per_seat,
                r.status,
                u.name AS driver_name,
                u.avatar,
                o.city_name AS origin_city,
                d.city_name AS destination_city,
                COALESCE(AVG(ur.stars), 0) AS avg_rating,
                COUNT(ur.id) AS total_ratings
            FROM rides r
            INNER JOIN users u ON r.driver_id = u.id
            INNER JOIN locations o ON r.origin_id = o.id
            INNER JOIN locations d ON r.destination_id = d.id
            LEFT JOIN reviews ur ON ur.evaluated_id = r.driver_id
            WHERE r.status = 'active'
              AND DATE(r.departure_time) = :search_date
              AND o.city_name LIKE :origin
              AND d.city_name LIKE :destination
            GROUP BY r.id
            HAVING r.available_seats > 0
            ORDER BY r.departure_time ASC
        ";

        $params = [
            ':search_date' => $date,
            ':origin'      => '%' . trim($origin) . '%',
            ':destination' => '%' . trim($destination) . '%'
        ];

        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }

    /**
     * Busca uma viagem específica pelo ID
     */
    public function findRideById(int $rideId): ?array
    {
        $sql = "
            SELECT 
                r.*,
                u.name AS driver_name,
                u.avatar,
                u.phone AS driver_phone,
                o.city_name AS origin_city,
                d.city_name AS destination_city,
                COALESCE(AVG(ur.stars), 0) AS avg_rating
            FROM rides r
            INNER JOIN users u ON r.driver_id = u.id
            INNER JOIN locations o ON r.origin_id = o.id
            INNER JOIN locations d ON r.destination_id = d.id
            LEFT JOIN reviews ur ON ur.evaluated_id = r.driver_id
            WHERE r.id = :id
            GROUP BY r.id
        ";

        $stmt = $this->query($sql, [':id' => $rideId]);
        $ride = $stmt->fetch();

        return $ride ?: null;
    }

    /**
     * Verifica se ainda há lugares disponíveis na viagem
     */
    public function hasAvailableSeats(int $rideId, int $requestedSeats = 1): bool
    {
        $stmt = $this->query(
            "SELECT available_seats FROM rides WHERE id = :id AND status = 'active'",
            [':id' => $rideId]
        );

        $ride = $stmt->fetch();
        return $ride && $ride['available_seats'] >= $requestedSeats;
    }

    /**
     * Atualiza o número de lugares disponíveis (após reserva)
     */
    public function decreaseSeats(int $rideId, int $seatsToDecrease = 1): bool
    {
        $stmt = $this->query(
            "UPDATE rides 
             SET available_seats = available_seats - :seats 
             WHERE id = :id AND available_seats >= :seats",
            [
                ':id'   => $rideId,
                ':seats' => $seatsToDecrease
            ]
        );

        return $stmt->rowCount() > 0;
    }
}
