<?php

namespace App\Core;

use PDO;
use PDOException;
use PDOStatement;

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

    public function run(string $sql, array $params = null): PDOStatement {
        $statement = $this->pdo->prepare($sql);

        if(!is_null($params)){
            foreach($params as $key=>$value) {
                $statement->bindValue(":$key", $value);
            }
        }

        return $statement->execute($params);
    }
}
