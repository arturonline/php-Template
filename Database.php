<?php

class Database
{
    const PATH_TO_DB = 'database/database.db';
    public $connection;

    public function __construct($config, $user = "", $pass = "")
    {
        if ($this->connection == null) {
            $this->connection = new \PDO("sqlite:" . Config::PATH_TO_DB);
        }
        return $this->connection;
    }

    public function query($query, $params = [])
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt;

    }
}