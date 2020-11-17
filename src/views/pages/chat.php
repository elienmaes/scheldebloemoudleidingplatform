<?php

setlocale(LC_ALL, 'nl_BE');
$search =$_GET["search_string"] ?? '';

$result= Chat::getMessages($search);


?>
<section class="container-fluid chatpage my-5">
    <div class="row">
        <form class="col-lg-6 mx-auto chatpage-container mb-5" method="POST" action="api/add_message.php" enctype="multipart/form-data">
            <textarea class="chatpage-box" name="message" rows="5" placeholder="Typ hier je bericht..."></textarea>
            <button type="submit">Verstuur</button>

        </form>
    </div>
    <div class="row">
        <form class="col-lg-6 col-md-6 col-sm-3 d-flex flex-row mx-auto chatpage-search mb-5" method="GET">
            <input type="text" value="<?= $search; ?>" name="search_string" placeholder="Zoek"></input>
            <input type="hidden" name="q_id" value="5">
            <button class="submit" type="submit">Zoek</button>
         <?php
         if ($search) {
             echo "<a href='index.php?q_id=5' class='all'>Alle berichten</a>";
         }
         ?>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto chatpage-messages">
            <?php
                foreach ($result as $message) {
                    include 'chatdetail.php';
                }
            ?>
        </div>
    </div>
</section>


<!-- <script src="api/add_message.js"></script> -->