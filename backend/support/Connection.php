<?php

namespace Backend\support;

use PDO;
use PDOException;

class Connection {
    
    // Armazena a instância da conexão para o Singleton
    private static $instance = null;

    // Construtor privado impede que a classe seja instanciada com 'new' fora dela
    private function __construct() {}

    // Método clone privado impede a clonagem da classe
    private function __clone() {}

    /**
     * Retorna a instância única da conexão com o banco de dados (PDO)
     * 
     * @return PDO
     */
    public static function getInstance(): PDO {
        if (self::$instance === null) {
            // Captura as constantes definidas no seu config/config.php (carregado pelo Composer)
            $host   =  DB_HOST;
            $dbname =  DB_NAME;
            $user   =  DB_USER ;
            $pass   =  DB_PASS;

            try {
                $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";
                
                self::$instance = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lança exceções em caso de erro SQL
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Retorna os dados como array associativo
                    PDO::ATTR_EMULATE_PREPARES   => false,                  // Utiliza prepares reais do MySQL para segurança (SQL Injection)
                ]);
                
            } catch (PDOException $e) {
                // Em ambiente de desenvolvimento exibe o erro. Em produção, guarde em log.
                die("Erro catastrófico na conexão com o Banco de Dados: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}