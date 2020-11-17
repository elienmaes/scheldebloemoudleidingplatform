<?php

$result= Event::getAllEvents();

?>
    <section class="container-fluid eventpage my-5">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="my-3">
                <h1 class="text-primary mb-4">Komende activiteiten</h1>
                    
                        <?php
                        
                   setlocale(LC_TIME, "Dutch");

                        $variablemonth=strftime('%B');
                        $month = strtolower($variablemonth);
                        
                            foreach ($result as $event) {
                                if ($month == $event['month']) {
                                    echo '<h2 class="text-primary">' . $month . '</h2>';
                                    include 'kalenderdetail.php';
                                } else {
                                    echo '<h2 class="text-primary">' . $event['month'] . '</h2>';
                                    include 'kalenderdetail.php';
                                }
                            }
                        ?>
                    
            </div>
        </div>
    </section>
