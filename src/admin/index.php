<?php
    include '../app.php';

    if (isset($user_id)) {
        $admin = User::verifyUserIfAdmin($user_id);
        if ($admin->is_admin!=1) {
            header('location: ../');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link rel="stylesheet" href="../../public/stylesheets/style.css">
</head>
<body>

<nav class="container my-5">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center my-3">
            <h1>Admin</h1>
        </div>
        <ul class="col-lg-12 d-flex justify-content-center">
            <li class="list-inline-item"><a class="btn btn-secondary"href="pages/index.php">pages</a></li>
            <li class="list-inline-item"><a class="btn btn-secondary" href="messages/index.php">messages</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center my-3">
        <a href="../">Terug naar website</a>

        </div>
    </div>
</nav>
</body>
</html> 