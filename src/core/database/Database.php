<?php

namespace app\src\core\database;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    public PDO $pdo;

    public function __construct($dbConfig = [])
    {
        try {
            $dbDsn = $dbConfig['dsn'] ?? '';
            $username = $dbConfig['user'] ?? '';
            $password = $dbConfig['password'] ?? '';

            $this->pdo = new PDO($dbDsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }

    }

    public function prepare($sql): PDOStatement
    {
        return $this->pdo->prepare($sql);
    }
}