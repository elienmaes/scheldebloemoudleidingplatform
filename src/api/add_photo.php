<?php

require '../app.php';
$title = $_POST['title'] ?? '';
$photo = $_FILES['photo'] ?? '';
$user_id = $_SESSION['user_id'];
$created_on = date("Y-m-d");

if (isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) {
    $upload_dir = '../images/' . $user_id . '/';        //per gebruiker folder bijhouden
    if (! is_dir($upload_dir)) {
        mkdir($upload_dir, 0777);   //0777 zijn de rechten rwe
    }

    $tmp_location = $_FILES['photo']['tmp_name'];
    $old_name = $_FILES['photo']['name'];
    $file_type = $_FILES['photo']['type'];
    $file_info = pathinfo($old_name);
    $extension = $file_info['extension'];
    
    //controle op file_type
    if (in_array($file_type, ['image/jpeg', 'image/png', 'image/gif'])) {
        $photo = uniqid() . '.' . $file_info['extension'];
        $new_location = $upload_dir . $photo;

        move_uploaded_file($tmp_location, $new_location);
    } else {
        echo 'Dit bestandstype is niet toegestaan. Je kan enkel jpeg, png of gifs uploaden';
    }
}

Photo::insertPhoto($user_id, $photo, $created_on, $title);

header('location: ../index.php?q_id=4');
die();
