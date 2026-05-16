<?php

declare(strict_types=1);

namespace Backend\database;

use Backend\support\Model;

/**
 * User Model — Gerencia o ciclo de vida, regras de negócio e integridade dos Utilizadores.
 */
class User extends Model
{
    /**
     * @var string A tabela correspondente no banco de dados.
     */
    protected $table = 'users';

    // ── 1. VALIDAÇÕES DE SEGURANÇA ───────────────────────────────────────

    /**
     * Valida os dados para a criação de um novo utilizador (Cadastro).
     * 
     * @param array $data Dados vindos do formulário.
     * @return string|null Mensagem de erro ou null se estiver tudo correto.
     */
    public function validateRegistration(array $data): ?string
    {
        // Verifica campos vazios
        $requiredFields = ['name', 'email', 'password', 'phone'];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty(trim((string)$data[$field]))) {
                return "Todos os campos são obrigatórios. O campo '{$field}' está em falta.";
            }
        }

        // Valida o formato do e-mail
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return "O formato do e-mail introduzido não é válido.";
        }

        // Verifica duplicatas globais
        if ($this->emailExists($data['email'])) {
            return "Este endereço de e-mail já está registado no Carpool.";
        }

        if ($this->phoneExists($data['phone'])) {
            return "Este número de telefone já está associado a uma conta.";
        }

        return null;
    }

    /**
     * Valida os dados para a atualização do perfil de um utilizador existente.
     * 
     * @param int $id ID do utilizador atual.
     * @param array $data Novos dados a serem validados.
     * @return string|null Mensagem de erro ou null se estiver tudo correto.
     */
    public function validateUpdate(int $id, array $data): ?string
    {
        // Verifica campos vazios
        $requiredFields = ['name', 'email', 'phone'];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty(trim((string)$data[$field]))) {
                return "O campo '{$field}' não pode ficar vazio.";
            }
        }

        // Valida o formato do e-mail
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return "O formato do e-mail introduzido não é válido.";
        }

        // Verifica se os novos dados colidem com contas de OUTROS utilizadores
        if ($this->emailExistsOnOthers($data['email'], $id)) {
            return "Este endereço de e-mail já está a ser utilizado por outro utilizador.";
        }

        if ($this->phoneExistsOnOthers($data['phone'], $id)) {
            return "Este número de telefone já está associado a outra conta.";
        }

        return null;
    }

    // ── 2. OPERAÇÕES DE ESCRITA (PERSISTÊNCIA) ───────────────────────────

    /**
     * Cadastra um novo utilizador aplicando hash seguro na password.
     * 
     * @param array{name:string, email:string, password:string, phone:string} $data
     * @return int ID do registro inserido.
     */
    public function register(array $data): int
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->create($data);
    }

    /**
     * Atualiza os dados básicos do perfil do utilizador.
     * 
     * @param int $id ID do utilizador.
     * @param array{name:string, email:string, phone:string} $data
     * @return bool True em caso de sucesso, false caso contrário.
     */
    public function updateProfile(int $id, array $data): bool
    {
        return $this->update($id, [
            'name'  => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone']
        ]);
    }

    /**
     * Atualiza o caminho da foto de perfil (avatar) do utilizador.
     */
    public function updateAvatar(int $id, string $avatarPath): bool
    {
        return $this->update($id, ['avatar' => $avatarPath]);
    }

    // ── 3. AUTENTICAÇÃO ──────────────────────────────────────────────────

    /**
     * Autentica um utilizador através de e-mail e password.
     * 
     * @return array|null Retorna os dados do utilizador (sem password) ou null se falhar.
     */
    public function authenticate(string $email, string $password): ?array
    {
        $stmt = $this->query("SELECT * FROM {$this->table} WHERE email = :email LIMIT 1", [
            'email' => $email
        ]);

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']); // Segurança: remove a hash do array
            return $user;
        }

        return null;
    }

    // ── 4. CONSULTAS AUXILIARES (VERIFICAÇÕES) ───────────────────────────

    /** Verifica se um e-mail já existe no sistema. */
    public function emailExists(string $email): bool
    {
        $stmt = $this->query("SELECT id FROM {$this->table} WHERE email = :email LIMIT 1", [
            'email' => $email
        ]);
        return (bool) $stmt->fetch();
    }

    /** Verifica se un telefone já existe no sistema. */
    public function phoneExists(string $phone): bool
    {
        $stmt = $this->query("SELECT id FROM {$this->table} WHERE phone = :phone LIMIT 1", [
            'phone' => $phone
        ]);
        return (bool) $stmt->fetch();
    }

    /** Verifica se o e-mail já pertence a OUTRO utilizador (ignorando o ID atual). */
    private function emailExistsOnOthers(string $email, int $currentId): bool
    {
        $stmt = $this->query(
            "SELECT id FROM {$this->table} WHERE email = :email AND id != :id LIMIT 1",
            ['email' => $email, 'id' => $currentId]
        );
        return (bool) $stmt->fetch();
    }

    /** Verifica se o telefone já pertence a OUTRO utilizador (ignorando o ID atual). */
    private function phoneExistsOnOthers(string $phone, int $currentId): bool
    {
        $stmt = $this->query(
            "SELECT id FROM {$this->table} WHERE phone = :phone AND id != :id LIMIT 1",
            ['phone' => $phone, 'id' => $currentId]
        );
        return (bool) $stmt->fetch();
    }
}