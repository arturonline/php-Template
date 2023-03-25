<?php

namespace Core;
use PDO;

class SqliteDb
{
    public PDO $connection;
    public $statement;

    public function __construct($config)
    {
        $this->connection = new PDO($config['Path'], '', '');
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function get() {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }
    public function findorFail() {
        $result = $this->Find();

        if(! $result) {
            abort();
        }
        return $result;

    }
}
