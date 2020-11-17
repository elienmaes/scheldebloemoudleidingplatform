<?php

class User extends BaseModel
{
    protected $table = 'users';
    protected $pk = 'user_id';

    public $user_id = 0;
    public $firstname;
    public $lastname;
    public $email;
    public $password;

    

    public static function getUserByEmail(string $email)
    {
        global $db;

        $sql = 'SELECT * FROM `users` WHERE `email` = :email';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([ ':email' => $email ]);

        return $pdo_statement->fetchObject();
    }

    public static function insertUser(string $firstname, string $lastname, string $email, string $password)
    {
        global $db;

        $sql = 'INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`)
                VALUES (:firstname, :lastname, :email, :password)';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
        ]);
        return $db->lastInsertId();
    }

    public static function registerUser(string $email)
    {
        global $db;

        $sql = 'SELECT COUNT(`email`) as total from `users` WHERE `email` = :email';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([
            ':email' => $email,
    ]);
        $total = (int) $pdo_statement->fetchColumn();
        return $total;
    }

    public static function verifyUserIfAdmin(string $user_id)
    {
        global $db;

        $sql = 'SELECT * FROM `users` WHERE `user_id` = :user_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([ ':user_id' => $user_id ]);

        return $pdo_statement->fetchObject();
    }
}
