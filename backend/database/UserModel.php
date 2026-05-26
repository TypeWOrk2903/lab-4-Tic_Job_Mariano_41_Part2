<?php

declare(strict_types=1);

namespace Backend\database;

use Backend\support\Model;

/**
 * User Model — Gerencia o ciclo de vida dos Utilizadores
 */
class UserModel extends Model
{
    protected $table = 'users';

    /**
     * Colunas que NUNCA devem ser inseridas/atualizadas automaticamente
     */
    protected array $safe = ['id', 'created_at', 'updated_at'];

    // ── VALIDAÇÕES ─────────────────────────────────────────────────────

    /**
     * Valida os dados para o registo de um novo utilizador
     */
    public function validateRegistration(array $data): ?string
    {
        $required = ['name', 'email', 'password', 'phone'];

        foreach ($required as $field) {
            if (empty(trim($data[$field] ?? ''))) {
                return "O campo '{$field}' é obrigatório.";
            }
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return "Formato de email inválido.";
        }

        if (strlen($data['password']) < 8) {
            return "A palavra-passe deve ter no mínimo 8 caracteres.";
        }

        if ($this->emailExists($data['email'])) {
            return "Este email já está registado.";
        }

        if ($this->phoneExists($data['phone'])) {
            return "Este número de telefone já está associado a uma conta.";
        }

        return null;
    }

    // ── OPERAÇÕES DE REGISTO ───────────────────────────────────────────

    /**
     * Regista um novo utilizador filtrando chaves desnecessárias (como confirm_password)
     */
    public function register(array $data): bool|int
    {
        $error = $this->validateRegistration($data);
        if ($error !== null) {
            $this->fail = $error;
            return false;
        }

        // Construímos o array explicitamente com o que vai para a tabela
        $userData = [
            'name'       => trim($data['name']),
            'email'      => strtolower(trim($data['email'])),
            'phone'      => trim($data['phone']),
            'role'       => $data['role'] ?? 'passenger',
            'gender'     => $data['gender'] ?? null,
            'password'   => password_hash($data['password'], PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
            'status'     => 'active'
        ];

        // Define os dados limpos no componente Pai (Model)
        $this->data = $userData;

        if ($this->save()) {
            return $this->getLastInsertId(); // Retorna o ID criado
        }

        return false;
    }

    // ── CONSULTAS ──────────────────────────────────────────────────────

    public function emailExists(string $email): bool
    {
        $stmt = $this->query(
            "SELECT id FROM {$this->table} WHERE email = :email LIMIT 1",
            ['email' => strtolower(trim($email))]
        );
        return (bool) $stmt->fetch();
    }

    public function phoneExists(string $phone): bool
    {
        $stmt = $this->query(
            "SELECT id FROM {$this->table} WHERE phone = :phone LIMIT 1",
            ['phone' => trim($phone)]
        );
        return (bool) $stmt->fetch();
    }

    /**
     * Busca um utilizador pelo email.
     * @param bool $includePassword Se true, mantém o hash da senha no array (usado no login)
     */
    public function findByEmail(string $email, bool $includePassword = false): ?array
    {
        $stmt = $this->query(
            "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1",
            ['email' => strtolower(trim($email))]
        );
        $user = $stmt->fetch();

        // Se encontrou o utilizador e NÃO foi pedido para incluir a senha, removemos por segurança
        if ($user && !$includePassword) {
            unset($user['password']);
        }

        return $user ?: null;
    }
       /**
     * Busca todos os dados de um condutor pelo ID
     */
    public function findById(int $id): ?array
    {
        $stmt = $this->query(
            "SELECT * FROM users 
             WHERE id = :id 
             LIMIT 1",
            ['id' => $id]
        );

        $user = $stmt->fetch();
        if ($user) {
            unset($user['password']);
        }

        return $user ?: null;
    }

    // ── AUTENTICAÇÃO ───────────────────────────────────────────────────

    /**
     * Autentica um utilizador verificando a palavra-passe cryptografada
     */
    public function authenticate(string $email, string $password): ?array
    {
        // Forçamos a inclusão da senha para o password_verify poder comparar
        $user = $this->findByEmail($email, true);

        if ($user && password_verify($password, $user['password'] ?? '')) {
            // Removemos a senha logo após validar, antes de mandar para a sessão/controlador
            unset($user['password']); 
            return $user;
        }

        return null;
    }

    // ── MÉTODOS AUXILIARES ─────────────────────────────────────────────

    public function getLastInsertId(): int
    {
        return (int) $this->db->lastInsertId();
    }

    public function fail(): ?string
    {
        return $this->fail;
    }
}