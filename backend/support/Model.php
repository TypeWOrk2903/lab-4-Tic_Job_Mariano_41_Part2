<?php

namespace Backend\support;

use PDOException;

abstract class Model extends Connection
{

    /**
     * @var PDO
     */
    protected $db;
    private ?int $id = null;
    /**
     * @var string O nome da tabela no banco de dados (ex: 'users', 'rides')
     */
    protected $table = '';
    /** Dados do registro atual (nome da coluna => valor). */
    protected array $data = [];
    /** Última mensagem de erro de operação. */
    protected ?string $fail = null;
    /**
     * Colunas protegidas: jamais são enviadas no INSERT/UPDATE automático.
     * Os models filhos podem sobrescrever ou ampliar este array.
     */
    protected array $safe = ['id'];

    public function __construct()
    {
        // Obtém a instância única e otimizada da conexão
        $this->db = Connection::getInstance();
    }

    /**
     * Executa uma query SQL customizada com Prepared Statements de forma segura.
     */
    protected function query(string $sql, array $params = [])
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    /**
     * Procura e retorna todos os registros da tabela.
     */
    public function getAll(): array
    {
        return $this->query("SELECT * FROM {$this->table}")->fetchAll();
    }

    /**
     * Procura um registro específico pelo seu ID.
     */
    public function find(int $id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = :id", ['id' => $id])->fetch();
    }

    /**
     * Insere um novo registro dinamicamente no banco de dados.
     * 
     * @param array $data Array associativo ['campo_banco' => 'valor']
     * @return int Retorna o ID do registro recém inserido
     */
    public function save(): bool
    {
        if (empty($this->table)) {
            $this->fail = 'A propriedade $entity não foi definida no model ' . static::class . '.';
            return false;
        }

        if ($this->id === null) {
            $newId = $this->create($this->table, $this->data);
            if ($newId !== null) {
                $this->id = $newId;
                return true;
            }
            return false;
        }

        return $this->update(
            $this->table,
            $this->data,
            'id = :id',
            "id={$this->id}"
        );
    }
    /**
     * INSERT INTO `$table` (colunas…) VALUES (:placeholders…)
     *
     * @param string $table  Nome da tabela.
     * @param array  $data   Array associativo [coluna => valor].
     * @return int|null      ID inserido ou null em caso de falha.
     */
    protected function create(string $table, array $data): ?int
    {
        $data = $this->filterSafe($data);

        if (empty($data)) {
            $this->fail = 'Nenhum dado fornecido para INSERT.';
            return null;
        }

        $columns      = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $sql          = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";

        try {
            $stmt = Connection::getInstance()->prepare($sql);
            $stmt->execute($this->buildNamedParams($data));
            return (int) Connection::getInstance()->lastInsertId();
        } catch (PDOException $e) {
            $this->fail = $e->getMessage();
            return null;
        }
    }
    /**
     * Define o id do registro (usado pelo save() para decidir UPDATE).
     */
    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Atualiza um registro existente dinamicamente baseado no ID.
     * 
     * @param int $id ID do registro a ser atualizado
     * @param array $data Array associativo com os novos dados
     * @return bool True se alterou algo, False caso contrário
     */
    public function update(int $id, array $data): bool
    {
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
    public function delete(int $id): bool
    {
        $stmt = $this->query("DELETE FROM {$this->table} WHERE id = :id", ['id' => $id]);
        return $stmt->rowCount() > 0;
    }
    /**
     * Remove as colunas listadas em $this->safe do array de dados.
     */
    private function filterSafe(array $data): array
    {
        return array_diff_key($data, array_flip($this->safe));
    }

    /**
     * Converte array [coluna => valor] em array [:coluna => valor]
     * para uso no execute() do PDO.
     */
    private function buildNamedParams(array $data): array
    {
        $params = [];
        foreach ($data as $key => $value) {
            $params[":{$key}"] = $value;
        }
        return $params;
    }
}
