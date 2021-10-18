<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
    protected PDO $pdo;

    public function __construct(array $dbConfig)
    {
        $dsn = $dbConfig['dsn'] ?? '';
        $username = $dbConfig['username'] ?? '';
        $password = $dbConfig['password'] ?? '';

        try{
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex){
            die("Error: ".$ex->getMessage());
        }
    }

    public function run(string $sql, array $params = null){
        $statement = $this->pdo->prepare($sql);

        try{
            $statement->execute($params);
        }
        catch(PDOException $ex){
            die("PDO Exception: ".$ex->getMessage());
        } 

        return $statement;
    }
}
