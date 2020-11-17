<?php
    require 'app.php';

    if ($_SESSION['user_id']) {
        include 'views/partials/header.php';

        $all_pages= Page::getAll();

        $v_id = $_GET['q_id'] ?? 1;
        $current_page = Page::getById($v_id);

        $view = 'views/pages/' . $current_page->template . '.php';
        if (! file_exists($view)) {
            $view = 'views/pages/home.php';
        }
        include $view;
    } else {
        echo'
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>Php website</title>
                <link rel="stylesheet" href="../public/stylesheets/style.css" />
                <script
                src="https://kit.fontawesome.com/c7945f03a3.js"
                crossorigin="anonymous"
                ></script>
            </head>

            <body>
                <header>
                <nav class="container-fluid">
                    <div class="row end navbar navbar-expand-lg navbar-light bg-primary">
                    <div class="col-lg-8">
                        <picture>
                        <img src="./assets/images/logo.png" alt="logo" />
                        </picture>
                    </div>
                    <div class="col-lg-4">
                        <ul class="navbar-nav mr-auto d-flex justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="./views/user/login.php"
                            >inloggen <span class="sr-only">(current)</span></a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                            class="nav-link text-uppercase"
                            href="./views/user/register.php"
                            >registreren</a
                            >
                        </li>
                        </ul>
                    </div>
                    </div>
                </nav>
                </header>
                <section class="container-fluid homepage my-5">
                <div class="row">
                    <div class="col-lg-12">
                    <p class="banner">
                        <span class="text-blue banner">Eén plek</span> waar alles staat wat
                        je nodig hebt?
                    </p>
                    </div>
                </div>
                <div class="row d-flex align-items-center mt-5">
                    <div class="col-lg-4">
                    <picture class="homepage_image">
                        <img
                        src="./assets/images/shane-rounce-DNkoNXQti3c-unsplash.png"
                        alt="Hands team"
                        />
                    </picture>
                    </div>
                    <div class="col-lg-6">
                    <p><span class="text-blue"> Activiteiten</span></p>
                    <p>
                        Krijg een overzicht van alle komende activiteiten of creëer er zelf
                        een bij.
                    </p>
                    <p class="quote-text">#stayintouch</p>
                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col-lg-8">
                    <p><span class="text-blue"> Chat</span></p>
                    <p>Vragen? Leuke weetjes? Stuur berichtjes via de groepschat.</p>
                    <p class="quote-text">#connect</p>
                    </div>
                    <div class="col-lg-4">
                    <picture class="homepage_image">
                        <img
                        src="./assets/images/levi-guzman-zdSoe8za6Hs-unsplash.png"
                        alt="Hands team"
                        />
                    </picture>
                    </div>
                </div>
                <div class="row my-5 button-group">
                    <div class="col-lg-6 mx-auto center">
                    <p><span class="text-blue banner">Overtuigd?</span></p>
                    <div class="d-flex">
                        <a href="views/user/register.php">Registreer je nu</a>
                        <p class="quote-text mx-4">of</p>
                        <a href="views/user/login.php">Log in</a>
                    </div>
                    </div>
                </div>
                </section>
';
    }
    
    include 'views/partials/footer.php';
