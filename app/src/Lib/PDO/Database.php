<?php

namespace App\Lib\PDO;

use PDO;

class Database
{
    private $host = 'php-oop-exercice-db';
    private $dbName = 'blog';
    private $username = 'root';
    private $password = 'password';
    private $connection;

    public function connect()
    {
        try {
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->dbName}",
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}