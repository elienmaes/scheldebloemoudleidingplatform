<?php

class Doc extends BaseModel
{
    public static function getDocs()
    {
        global $db;
        $sql_doc =
            'SELECT *
            FROM `docs`
            INNER JOIN `users` on `docs`.`user_id` = `users`.`user_id`            
            ORDER BY `created_on` DESC
            LIMIT 25
            ';

        $pdo_statement = $db->prepare($sql_doc);
      
        $pdo_statement->execute();
       
        return $pdo_statement->fetchAll();
    }

    public static function insertDoc($user_id, $doc, $created_on, $title)
    {
        global $db;
        $sql = "INSERT INTO docs
        (user_id, doc, created_on, title)
        VALUES
        (:user_id, :doc, :created_on, :title);";


        $sth = $db->prepare($sql);
        $sth->execute([
            ':user_id' => $user_id,
            ':doc' => $doc,
            ':created_on' => $created_on,
            ':title' =>$title,
        ]);
    }
}
