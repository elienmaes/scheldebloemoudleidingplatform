<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/stylesheets/style.css" />
    <script
      src="https://kit.fontawesome.com/c7945f03a3.js"
      crossorigin="anonymous"
    ></script>
</head>
<body>
    <header>
        <nav class="container-fluid">
            <div class="row end navbar navbar-expand-lg navbar-light ">
                <div class="col-lg-8 col-md-10 col-sm-12">
                    <ul class="navbar-nav">

<?php

    $all_pages= Page::getAll();

    foreach ($all_pages as $page) {
        echo '<li class="nav-item"><a class="nav_link" href="index.php?q_id='. $page['page_id'] . '">'. $page['name'] . '</a></li>';
    }
  
    $current_page_id = $_GET['q_id'] ?? 1;
    $current_page = Page::getById($current_page_id);

    if (isset($user_id)) {
        $admin = User::verifyUserIfAdmin($user_id);
        if ($admin->is_admin==1) {
            echo '<li class="nav-item"><a class="nav_link font-weight-bold" href="admin/index.php">admin</a></li>';
        }
    }
?>
    
    </ul>
    </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="navbar-nav d-flex justify-content-end align-items-center">
                <div class="text-white">Hallo, <?=$user->firstname . ' ' . $user->lastname?></div>
                <i class="fas fa-user fa-2x ml-3"></i>
                <div class="nav-item">
                    <a class="nav-link text-uppercase" href="views/user/logoff.php">Uitloggen</a>
                </div>
            </div>
          </div>
        </div>
      </nav>
    </header>