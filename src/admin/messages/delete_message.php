<?php
require '../../app.php';

$message_id = $_GET['message_id'] ?? 0;

if ($message_id) {
    Chat::deleteAdminMessage($message_id);
}

header('location: index.php');
die();
