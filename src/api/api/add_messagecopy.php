<?php

require '../includes/db.php';

$message = $_POST['message'] ?? '';
$user_id = 2;
$created_on = date("Y-m-d H:i:s");

header('Content-Type: application/json');

echo json_encode(file_get_contents('php://input'), true);
exit;


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


header('location: ../index.php?q_id=5');
die();
