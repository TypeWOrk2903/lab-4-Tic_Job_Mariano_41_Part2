<?php

namespace Backend\support;

class IdMask
{
    private static string $salt = 'carpool2025_secret_salt'; // Mude isso para algo único e forte

    /**
     * Codifica o ID para usar na URL
     */
    public static function encode(int $id): string
    {
        $data = $id . '|' . time(); // Adiciona timestamp para evitar reutilização
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
    }

    /**
     * Decodifica o ID da URL
     */
    public static function decode(string $maskedId): ?int
    {
        $data = base64_decode(str_replace(['-', '_'], ['+', '/'], $maskedId));
        if (!$data) return null;

        [$id, $timestamp] = explode('|', $data);

        // Opcional: Valida se o link não expirou (ex: 24h)
        if (time() - (int)$timestamp > 86400) {
            return null;
        }

        return (int)$id;
    }
}