<?php

require '../app.php';
$title = $_POST['title'] ?? '';
$doc = $_FILES['doc'] ?? '';
$user_id = $_SESSION['user_id'];
$created_on = date("Y-m-d");


if (isset($_FILES['doc']) && $_FILES['doc']['size'] > 0) {
    $upload_dir = '../docs/' . $user_id . '/';        //per gebruiker folder bijhouden
    if (! is_dir($upload_dir)) {
        mkdir($upload_dir, 0777);   //0777 zijn de rechten rwe
    }

    $tmp_location = $_FILES['doc']['tmp_name'];
    $old_name = $_FILES['doc']['name'];
    $file_type = $_FILES['doc']['type'];
    $file_info = pathinfo($old_name);
    $extension = $file_info['extension'];
    
    //controle op file_type
    if (in_array($file_type, ['application/vnd.openxmlformats-officedocument.wordprocessingml.document' ,
    'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/pdf'])) {
        $doc = uniqid() . '.' . $file_info['extension'];
        $new_location = $upload_dir . $doc;

        move_uploaded_file($tmp_location, $new_location);
    } else {
        echo 'Dit bestandstype is niet toegestaan. Je kan enkel docx, pdf of pptx uploaden';
    }
} elseif ($_FILES['doc']['size'] == 0) {
    echo 'Sorry, u moet een file toevoegen voor het uploaden kan starten.';
} else {
    echo'Sorry, het bestand bestaat al';
}

Doc::insertDoc($user_id, $doc, $created_on, $title);


header('location: ../index.php?q_id=2');
die();
