<?php

$result= Doc::getDocs();

?>

<section class="container-fluid docpage my-5">
    <div class="row">
        <div class="col-lg-12 d-flex docpage-info d-flex justify-content-center mb-2">
            <p class="text-secondary">Voorlopig enkel mogelijk om pdf files te uploaden!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 docpage-container d-flex flex-column align-items-center mb-5">
            <div class="text ">Upload een document</div>
            <div class="line mb-5"></div>
            <form action="api/add_doc.php" method="POST" enctype="multipart/form-data">
                <label class="file-upload mb-5 d-flex flex-column align-items-center">
                    <input type="file" name="doc" accept =".pdf" multiple>
                    <i class="fas fa-file-upload fa-3x mb-3"></i>
                    <div class="text-white">Upload hier je file</div>
                    <input type="text" name="title" placeholder="schrijf hier je titel">
                    <button class="mt-5" type="submit">Save</button>
                </label>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mx-auto docpage-docs">

        </div>
    </div>
    </div>
</section>
<section>
    <div class="row">
        <?php
            foreach ($result as $doc) {
                include 'docdetail.php';
            }
        ?>
    </div>
</section>