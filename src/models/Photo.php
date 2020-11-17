<?php

class Photo extends BaseModel
{
    public static function getPhotos()
    {
        global $db;
       
        $sql_photo =
            'SELECT *
            FROM `photos`
            INNER JOIN `users` on `photos`.`user_id` = `users`.`user_id`            
            ORDER BY `created_on` DESC
            LIMIT 25
            ';

        $pdo_statement = $db->prepare($sql_photo);
      
        $pdo_statement->execute();
       
        return $pdo_statement->fetchAll();
    }
    public static function insertPhoto($user_id, $photo, $created_on, $title)
    {
        global $db;
        $sql = "INSERT INTO `photos`
        (user_id, photo, created_on, title)
        VALUES
        (:user_id, :photo, :created_on, :title);";


        $sth = $db->prepare($sql);
        $sth->execute([
          ':user_id' => $user_id,
          ':photo' => $photo,
          ':created_on' => $created_on,
          ':title' =>$title,
        ]);
    }
}
