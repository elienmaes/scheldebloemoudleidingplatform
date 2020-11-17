<?php
    require '../../app.php';
    $message_id = $_GET['message_id'] ?? 0;

    if (isset($_POST['update'])) {

        //waarden uit post halen
        $message = $_POST['message'] ?? '';
      

        if ($message_id) {
            Chat::updateMessage($message_id, $message);
            header('location: index.php');
            die();
        } else {
            // INSERT ITEM
            Chat::insertAdminMessage($message);
            header('location: index.php');
            die();
        }
    }

    if ($message_id) {
        $sql = 'SELECT * FROM `message` WHERE `message_id` = :message_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([ ':message_id' => $message_id ]);
        $message = $pdo_statement->fetchObject();
    }
    



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link rel="stylesheet" href="../../../public/stylesheets/style.css">
</head>
<body>
<div class="container editmessage-container">
<h1 class="my-3">Website -> <?= ($message_id) ? 'Edit' : 'Add'; ?> Message</h1>

<form  method="POST" class="row message">
    <p class="col-lg-12">
        <label class="message_edit">
            Message
              <input type="text" name="message" value="<?= ($message_id) ? $message->message : ''; ?>" class="form-control mt-3">
        </label>
    </p>
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary mr-3" name="update"><?= ($message_id) ? 'Aanpassen' : 'Plaats bericht'; ?></button>
        <a href="index.php" class="btn btn-outline-secondary">Terug</a>
    </div>
</form>



</body>
</html> 