<?php

namespace App\Models;

use App\Core\Model;

class User extends Model {
    protected const TABLE = "users";

    public function getUser($where, array $columns = ['*']) {
        $sql = sprintf(
            "SELECT %s FROM ".self::TABLE." WHERE %s=%s",
            implode(', ', $columns),
            implode('', array_keys($where)),
            ':'.implode('', array_keys($where))
        );
        $stmt = $this->db->run($sql, $where);

        return $stmt->fetchObject(self::class);
    }

    public function createUser(array $userData) {
        unset($userData['confirmPassword']);

        $sql = sprintf(
            "INSERT INTO ".self::TABLE."(%s) VALUES(%s)",
             implode(', ', array_keys($userData)),
             ':'.implode(', :', array_keys($userData))
            );
            
        $stmt = $this->db->run($sql, $userData);

        if(!$stmt) {
            throw new \PDOException("User with entered data already exists");
        }
    }
}
