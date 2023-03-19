<?php

class SqliteDb
{
    public $connection;

    public function __construct($config)
    {
        if ($this->connection == null) {
            $this->connection = new \PDO("sqlite:" . $config['Path']);
        }
        return $this->connection;
    }

    public function query($query, $params = []): false|PDOStatement
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt;

    }
}
