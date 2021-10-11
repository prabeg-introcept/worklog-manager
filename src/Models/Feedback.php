<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Feedback extends Model{
    protected const TABLE = "feedbacks";

    public function createFeedback(array $feedbackData) {
        $sql = sprintf(
            "INSERT INTO ".self::TABLE."(%s) VALUES(%s)",
             implode(', ', array_keys($feedbackData)),
             ':'.implode(', :', array_keys($feedbackData))
            );
        $this->db->run($sql, $feedbackData);
    }

    public function getFeedBack(array $feedbackData){
        $sql = sprintf(
            "SELECT 
                feedbacks.id, 
                feedbacks.feedback,
                feedbacks.created_at
            FROM feedbacks 
            WHERE feedbacks.%s = %s",
            implode(', ', array_keys($feedbackData)),
            ':'.implode(', :', array_keys($feedbackData))
        );
        $statement = $this->db->run($sql, $feedbackData);

        return $statement->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
