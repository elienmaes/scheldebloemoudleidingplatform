<?php

class Chat extends BaseModel
{
    public static function getMessages($search='')
    {
        global $db;
        
        $sql_mes =
            'SELECT *
            FROM `message`
            INNER JOIN `users` on `message`.`user_id` = `users`.`user_id`
            WHERE `message`.`message` LIKE :search            
            ORDER BY `created_on` DESC
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

    public static function getAllMessages()
    {
        global $db;
        $sql_message =
            'SELECT *
            FROM `message`
            INNER JOIN `users` on `message`.`user_id` = `users`.`user_id`            
            ORDER BY `created_on` DESC
            LIMIT 5
            ';

        $pdo_statement = $db->prepare($sql_message);
      
        $pdo_statement->execute();

        return $pdo_statement->fetchAll();
    }

    public static function insertAdminMessage($message)
    {
        global $db;
        $sql = 'INSERT INTO `message` (`message`)
                    VALUES (:message)';
        $insert_statement = $db->prepare($sql);
        $insert_statement->execute(
            [
                    ':message' => $message,
                ]
        );
    }

    public static function updateMessage(string $message_id, string $message)
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
    public static function insertMessage($user_id, $message, $created_on)
    {
        global $db;
        $sql = "INSERT INTO message 
        (user_id, message, created_on)
        VALUES
        (:user_id, :message, :created_on);";


        $sth = $db->prepare($sql);
        $sth->execute([
            ':user_id' => $user_id,
            ':message' => $message,
            ':created_on' => $created_on,
        ]);
    }
    public static function deleteAdminMessage($message_id)
    {
        global $db;
        $sql = 'DELETE FROM `message` WHERE `message_id` = :message_id';

        $stmnt = $db->prepare($sql);
        $stmnt->execute([ ':message_id' =>$message_id ]);
    }
}
