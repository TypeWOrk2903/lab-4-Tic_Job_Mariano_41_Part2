<?php

namespace Backend\support;


abstract class Model extends Connection {
    
    /**
     * @var PDO
     */
    protected $db;
    
    /**
     * @var string O nome da tabela no banco de dados (ex: 'users', 'rides')
     */
    protected $table;

    public function __construct() {
        // Obtém a instância única e otimizada da conexão
        $this->db = Connection::getInstance();
    }

    /**
     * Executa uma query SQL customizada com Prepared Statements de forma segura.
     */
    protected function query(string $sql, array $params = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    /**
     * Procura e retorna todos os registros da tabela.
     */
    public function getAll(): array {
        return $this->query("SELECT * FROM {$this->table}")->fetchAll();
    }

    /**
     * Procura um registro específico pelo seu ID.
     */
    public function find(int $id) {
        return $this->query("SELECT * FROM {$this->table} WHERE id = :id", ['id' => $id])->fetch();
    }

    /**
     * Insere um novo registro dinamicamente no banco de dados.
     * 
     * @param array $data Array associativo ['campo_banco' => 'valor']
     * @return int Retorna o ID do registro recém inserido
     */
    public function create(array $data): int {
        $fields = array_keys($data);
        $binds  = array_map(fn($field) => ":{$field}", $fields);

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $this->table,
            implode(', ', $fields),
            implode(', ', $binds)
        );

        $this->query($sql, $data);
        
        return (int) $this->db->lastInsertId();
    }

    /**
     * Atualiza um registro existente dinamicamente baseado no ID.
     * 
     * @param int $id ID do registro a ser atualizado
     * @param array $data Array associativo com os novos dados
     * @return bool True se alterou algo, False caso contrário
     */
    public function update(int $id, array $data): bool {
        $fields = array_keys($data);
        $lines  = array_map(fn($field) => "{$field} = :{$field}", $fields);

        $sql = sprintf(
            "UPDATE %s SET %s WHERE id = :id_filter",
            $this->table,
            implode(', ', $lines)
        );

        // Adiciona o ID do filtro ao array de parâmetros com segurança
        $data['id_filter'] = $id;

        $stmt = $this->query($sql, $data);
        
        return $stmt->rowCount() > 0;
    }

    /**
     * Elimina um registro pelo ID.
     */
    public function delete(int $id): bool {
        $stmt = $this->query("DELETE FROM {$this->table} WHERE id = :id", ['id' => $id]);
        return $stmt->rowCount() > 0;
    }
}