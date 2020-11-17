<?php

include'../../app.php';

$errors=array();


if (isset($_POST['login'])) {
    $user_email= $_POST['email'];
    $user = User::getUserByEmail($user_email);

    //controle of er een user inzit
    if (isset($user->email)) {
        //controleren dat de gebruiker geen leeg veld heeft doorgestuurd
        if (empty($_POST['email'])) {
            array_push($errors, "Verplicht emailadres op te geven");
        }
        if (empty($_POST['password'])) {
            array_push($errors, "Verplicht paswoord in te vullen");
        }
    } else {
        array_push($errors, "Gelieve de velden in te vullen!");
    }
    //controle of wachtwoord juist is
     
    if (!empty($_POST['password']) &&  isset($user->password) && password_verify($_POST['password'], $user->password) && count($errors)==0) {
        $_SESSION['user_id'] = $user->user_id;
        header('location: ../../index.php');
    } elseif (!empty($_POST['password']) && strlen(trim($_POST["password"])) < 6) {
        array_push($errors, "Het wachtwoord moet minstens 6 karakters bevatten");
    } else {
        array_push($errors, "Emailadres en/of wachtwoord zijn onjuist!");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Php website</title>
    <link rel="stylesheet" href="../../../public/stylesheets/style.css" />
    <script
      src="https://kit.fontawesome.com/c7945f03a3.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <section class="container-fluid form">
      <div class="row">
        <div
          class="col-lg-6 d-flex flex-column align-items-center justify-content-center form-content"
        >
          <p>Welkom terug, log hier in</p>
          <form method="POST">
            <div class="form-group">
            <?php include('errors.php'); ?> 
              <label for="exampleInputEmail1">Emailadres</label>
              <input
                type="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="voorbeeld@mail.com"
                name="email"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Wachtwoord</label>
              <input
                type="password"
                class="form-control"
                id="exampleInputPassword1"
                placeholder="minstens 6 karakters"
                name="password"
              />
            </div>
            <div class="mt-4">
              <button type="submit" name="login" class="btn btn-secondary">
                Log in 
              </button>
              <a href="../../index.php" class="btn btn-light">
                Terug naar homepage
              </a>
              <p>Heb je al een account? <span><a href="register.php">Registreer je</a></span></p>
            </div>
          </form>
        </div>
        <div
          class="col-lg-6 form-side d-flex flex-column align-items-center justify-content-center"
        >
          <p># Get in touch</p>
          <p># Stay Connected</p>
        </div>
      </div>
    </section>
  </body>
</html>
