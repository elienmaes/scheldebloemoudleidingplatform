<?php

$errors=array();

include '../../app.php';
    $firstname=$_POST['firstname'] ?? '';
    $lastname=$_POST['lastname'] ?? '';
    $email=$_POST['email'] ?? '';
    $password=$_POST['password'] ?? '';



    if (isset($_POST['register'])) {
        $total = User::registerUser($email);

        if ($total > 0) {
            array_push($errors, "Dit emailadres is reeds in gebruik");
        }
        if (empty($firstname  && $lastname && $email && $password)) {
            array_push($errors, "Gelieve alle velden in te vullen!");
        } else {
            $user_id=User::insertUser($firstname, $lastname, $email, $password);
            
            $_SESSION['user_id'] = $user_id;
            header('location: login.php');
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
          <p>Maak je account aan</p>
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
              <label for="exampleInputName">Voornaam</label>
              <input
                type="text"
                class="form-control"
                id="exampleInputName"
                placeholder="naam"
                name="firstname"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputName">Achternaam</label>
              <input
                type="text"
                class="form-control"
                id="exampleInputName"
                placeholder="naam"
                name="lastname"
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
              <button type="submit" name="register" class="btn btn-secondary">
                Registreer
              </button>
              <a href="../../index.php" class="btn btn-light">
                Terug naar homepage
              </a>
              <p>Heb je al een account? <span><a href="login.php">Log in</a></span></p>
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
