<?php

class Database
{

    public $connection;

    public function __construct($config, $user = "", $pass = "")
    {


        $dsn = 'sqlsrv:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $user, $pass, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $params = [])
    {

        $stmt = $this->connection->prepare($query);

        $stmt->execute($params);

        return $stmt;

    }
}