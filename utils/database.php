<?php
namespace Utils;

use PDO;

class Database
{
    private ?PDO $pdo = null;

    public function __construct(
        private readonly string $host,
        private readonly string $port,
        private readonly string $dbname,
        private readonly string $username,
        private readonly string $password
    ) { }

    public function getConnection(): PDO
    {
        if ($this->pdo === null) {
            $dsn = "pgsql:host=$this->host;port=$this->port;dbname=$this->dbname";
            $this->pdo = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }
        return $this->pdo;
    }
}
