<?php

declare(strict_types=1);

namespace Backend\database;

use Backend\support\Model;

/**
 * DriverModel — Gerencia dados específicos dos Condutores
 */
class DriverModel extends Model
{
    protected $table = 'users';

    /**
     * Busca todos os dados de um condutor pelo ID
     */
    public function findDriverById(int $id): ?array
    {
        $stmt = $this->query(
            "SELECT * FROM users 
             WHERE id = :id AND role = 'driver' 
             LIMIT 1",
            ['id' => $id]
        );

        $driver = $stmt->fetch();
        if ($driver) {
            unset($driver['password']);
        }

        return $driver ?: null;
    }

    /**
     * Próxima viagem agendada do condutor
     */
    public function getUpcomingRide(int $driverId): ?array
    {
        $stmt = $this->query(
            "SELECT r.*, 
                    o.city_name AS origin_city, 
                    d.city_name AS destination_city 
             FROM rides r
             JOIN locations o ON r.origin_id = o.id
             JOIN locations d ON r.destination_id = d.id
             WHERE r.driver_id = :driver_id 
               AND r.status = 'active' 
               AND r.departure_time > NOW()
             ORDER BY r.departure_time ASC 
             LIMIT 1",
            ['driver_id' => $driverId]
        );

        return $stmt->fetch() ?: null;
    }

    /**
     * Ganhos mensais do condutor (CORRIGIDO)
     */
    public function getMonthlyEarnings(int $driverId): float
    {
        $stmt = $this->query(
            "SELECT COALESCE(SUM(price_per_seat * (available_seats)), 0) AS total 
             FROM rides 
             WHERE driver_id = :driver_id 
               AND status = 'completed' 
               AND MONTH(departure_time) = MONTH(CURRENT_DATE())
               AND YEAR(departure_time) = YEAR(CURRENT_DATE())",
            ['driver_id' => $driverId]
        );

        $result = $stmt->fetch();
        return (float)($result['total'] ?? 0);
    }

    /**
     * Total de viagens realizadas
     */
    public function getTotalTrips(int $driverId): int
    {
        $stmt = $this->query(
            "SELECT COUNT(*) as total FROM rides 
             WHERE driver_id = :driver_id AND status = 'completed'",
            ['driver_id' => $driverId]
        );

        $result = $stmt->fetch();
        return (int)($result['total'] ?? 0);
    }

    /**
     * Avaliação média
     */
    public function getAverageRating(int $driverId): float
    {
        $stmt = $this->query(
            "SELECT COALESCE(AVG(stars), 0) as avg_rating 
             FROM reviews 
             WHERE evaluated_id = :driver_id",
            ['driver_id' => $driverId]
        );

        $result = $stmt->fetch();
        return round((float)($result['avg_rating'] ?? 0), 2);
    }

    /**
     * Viagens recentes
     */
    public function getRecentRides(int $driverId, int $limit = 5): array
    {
        $stmt = $this->query(
            "SELECT r.*, 
                    o.city_name AS origin_city, 
                    d.city_name AS destination_city 
             FROM rides r
             JOIN locations o ON r.origin_id = o.id
             JOIN locations d ON r.destination_id = d.id
             WHERE r.driver_id = :driver_id 
             ORDER BY r.departure_time DESC 
             LIMIT :limit",
            [
                ':driver_id' => $driverId,
                ':limit' => $limit
            ]
        );

        return $stmt->fetchAll();
    }
}