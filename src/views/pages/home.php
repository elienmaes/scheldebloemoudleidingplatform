<?php
$events= Event::getAllEvents();

$messages= Chat::getAllMessages();

?>
    <section class="container-fluid homepage my-5">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <p class="text-primary"><a href="index.php?q_id=3">Komende activiteiten</a></p>
            <?php
                foreach ($events as $event) {
                    include 'homedetail1.php';
                }
            ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="d-flex flex-column homepage-messages">
            <p><a class="text-secondary" href="index.php?q_id=5">Laatste chatberichten</a></p>
                <?php
                foreach ($messages as $message) {
                    include 'homedetail2.php';
                }
                ?>
          </div>
        </div>
      </div>
    </section>
