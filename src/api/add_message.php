<?php

require '../app.php';

$message = $_POST['message'] ?? '';
$user_id = $_SESSION['user_id'];
$created_on = date("Y-m-d H:i:s");

Chat::insertMessage($user_id, $message, $created_on);

header('location: ../index.php?q_id=5');
die();
