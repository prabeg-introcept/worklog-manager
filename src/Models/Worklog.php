<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Session;
use PDO;

class Worklog extends Model{
    protected const TABLE = "worklogs";

    public function createWorklog(array $worklogData) {
        $sql = sprintf(
            "INSERT INTO ".self::TABLE."(%s) VALUES(%s)",
             implode(', ', array_keys($worklogData)),
             ':'.implode(', :', array_keys($worklogData))
            );
        $this->db->run($sql, $worklogData);
    }

    public function getAllWorklogs() {
        $sql = "SELECT 
                        worklogs.id,
                        worklogs.description,
                        worklogs.created_at,
                        worklogs.updated_at,
                        worklogs.user_id,
                        users.username,
                        departments.department
                FROM worklogs 
                INNER JOIN (users 
                            INNER JOIN departments 
                            ON users.department_id = departments.id)
                ON worklogs.user_id = users.id
                ORDER BY worklogs.created_at DESC";

        $statement = $this->db->run($sql);

        return $statement->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function getUserWorklogs() {
        $currentUserId = Session::get('user_id');
        $sql = "SELECT 
                    worklogs.id,
                    worklogs.description,
                    worklogs.created_at,
                    worklogs.updated_at,
                    worklogs.user_id,
                    users.username
                FROM worklogs 
                INNER JOIN (users 
                            INNER JOIN departments 
                            ON users.department_id = departments.id)
                ON worklogs.user_id = users.id
                WHERE worklogs.user_id = $currentUserId
                ORDER BY worklogs.created_at DESC";

        $statement = $this->db->run($sql);

        return $statement->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function getWorklog($worklogData) {
        $sql = sprintf(
            "SELECT 
                    worklogs.id,
                    worklogs.description,
                    worklogs.created_at,
                    worklogs.updated_at,
                    worklogs.user_id,
                    users.username,
                    departments.department
                FROM worklogs 
                INNER JOIN (users 
                            INNER JOIN departments 
                            ON users.department_id = departments.id)
                ON worklogs.user_id = users.id
                WHERE worklogs.%s = %s
                ORDER BY worklogs.created_at DESC",
            implode('', array_keys($worklogData)),
            ':'.implode('', array_keys($worklogData))    
        );

        $statement = $this->db->run($sql, $worklogData);

        return $statement->fetchObject(self::class);
    }

    public function updateWorklog(array $worklogData){
        $sql = "UPDATE ".self::TABLE." SET description=:description, user_id=:user_id WHERE id=:id";

        $this->db->run($sql, $worklogData);
    }

    public function deleteWorklog(array $worklogData){
        $sql = sprintf(
            "DELETE FROM ".self::TABLE." WHERE %s=%s",
            implode(', ', array_keys($worklogData)),
            ':'.implode(', :', array_keys($worklogData))
        );

        $this->db->run($sql, $worklogData);
    }
}
