<?php

declare(strict_types=1);

namespace Backend\support;

/**
 * Session — Gerenciamento de sessão para o Carpool.
 *
 * Encapsula o acesso ao $_SESSION com métodos tipados e
 * utilitários para autenticação (isLoggedIn, login, logout).
 */
final class Session
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            
            session_start([
                'cookie_lifetime' => 0,          // Expira ao fechar o navegador
                'cookie_httponly' => true,       // Protege contra roubo de cookies via Javascript (XSS)
                'cookie_secure'   => false,      // Mude para true se estiver usando HTTPS
                'cookie_samesite' => 'Lax',       // Proteção contra CSRF
            ]);
        }

        // Medida de segurança: Regenera o ID periodicamente para mitigar Session Fixation
        if (!isset($_SESSION['_last_regeneration'])) {
            $this->regenerate();
        } elseif (time() - $_SESSION['_last_regeneration'] > 1800) { // 30 minutos
            $this->regenerate();
        }
    }

    /** Regenera o ID da sessão atual com segurança. */
    public function regenerate(): void
    {
        session_regenerate_id(true);
        $_SESSION['_last_regeneration'] = time();
    }

    // ── Leitura / Escrita ────────────────────────────────────────────────

    /** Retorna o valor de uma chave de sessão ou um padrão se não existir. */
    public function get(string $key, mixed $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    /** Define uma chave de sessão. */
    public function set(string $key, mixed $value): static
    {
        $_SESSION[$key] = $value;
        return $this;
    }

    /** Remove uma chave de sessão. */
    public function remove(string $key): static
    {
        unset($_SESSION[$key]);
        return $this;
    }

    /** Verifica se uma chave existe na sessão. */
    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /** Retorna todos os dados da sessão como array. */
    public function all(): array
    {
        return $_SESSION;
    }

    // ── Autenticação ─────────────────────────────────────────────────────

    /**
     * Retorna true se o utilizador está autenticado.
     * Verifica a presença de user_id na sessão.
     */
    public function isLoggedIn(): bool
    {
        return !empty($_SESSION['user_id']);
    }

    /**
     * Cria a sessão de autenticação para o utilizador.
     *
     * @param array{id:int, name:string, email:string, role?:string, avatar?:string|null} $user
     */
    public function login(array $user): static
    {
        // Força a troca do ID ao logar por segurança
        $this->regenerate();

        $_SESSION['user_id']     = $user['id'];
        $_SESSION['user_name']   = $user['name'];
        $_SESSION['user_email']  = $user['email'];
        $_SESSION['user_role']   = $user['role'] ?? 'user';
        $_SESSION['user_avatar'] = $user['avatar'] ?? null;
        return $this;
    }

    /**
     * Destrói a sessão atual (logout).
     */
    public function logout(): void
    {
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();
    }

    // ── Tentativas de login ──────────────────────────────────────────────

    /** Incrementa o contador de tentativas de login falhadas. */
    public function incrementLoginAttempts(): int
    {
        $_SESSION['login_attempts'] = ($this->loginAttempts()) + 1;
        return $_SESSION['login_attempts'];
    }

    /** Retorna o número atual de tentativas de login falhadas. */
    public function loginAttempts(): int
    {
        return (int) ($_SESSION['login_attempts'] ?? 0);
    }

    /** Zera o contador de tentativas de login. */
    public function resetLoginAttempts(): static
    {
        unset($_SESSION['login_attempts']);
        return $this;
    }

    // ── Flash messages ───────────────────────────────────────────────────

    /** Armazena ou recupera uma mensagem temporária. */
    public function flash(string $key, mixed $value = null): mixed
    {
        if ($value !== null) {
            $_SESSION['_flash'][$key] = $value;
            return $this;
        }

        $val = $_SESSION['_flash'][$key] ?? null;
        unset($_SESSION['_flash'][$key]);
        return $val;
    }
}