<?php

class Event extends BaseModel
{
    public static function getEvent()
    {
        global $db;
        $search =$_POST["search_string"] ?? '';

        $sql_mes =
            'SELECT *
            FROM `events`
            INNER JOIN `users` on `events`.`user_id` = `users`.`user_id`
            WHERE `events`.`content` LIKE :search            
            ORDER BY `event_id` DESC
            LIMIT 25
';

        $pdo_statement = $db->prepare($sql_mes);
        $pdo_statement->execute(
            [
                ':search' => '%' . $search . '%'
            ]
        );
        return $pdo_statement->fetchAll();
    }

    public static function getAllEvents()
    {
        global $db;
        $sql_event =
            'SELECT *
            FROM `events`            
            ORDER BY `event_id` ASC
            LIMIT 5
            ';

        $pdo_statement = $db->prepare($sql_event);
      
        $pdo_statement->execute();

        return $pdo_statement->fetchAll();
    }

    public static function insertEvent()
    {
        global $db;
        $sql = 'INSERT INTO `events` (`content`)
                    VALUES (:message)';
        $insert_statement = $db->prepare($sql);
        $insert_statement->execute(
            [
                    ':content' => $content,
                ]
        );
    }

    public static function updateMessage()
    {
        global $db;
        $sql = 'UPDATE `message` 
                    SET `message` = :message
                    WHERE `message_id` = :message_id ';
        $update_statement = $db->prepare($sql);
        $update_statement->execute(
            [
                    ':message' => $message,
                    ':message_id' =>$message_id
                ]
        );
    }
}
