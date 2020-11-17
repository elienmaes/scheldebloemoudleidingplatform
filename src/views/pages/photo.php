<?php
$result= Photo::getPhotos();

?>
<section class="container-fluid photopage my-5">
    <div class="row">
        <div class="col-lg-2 photopage-container d-flex flex-column align-items-center mb-5">
            <div class="text ">Upload een foto</div>
            <div class="line mb-5"></div>
            <form action="api/add_photo.php" method="POST" enctype="multipart/form-data">
                <label class="file-upload mb-5 d-flex flex-column align-items-center">
                    <input  type="file" name="photo" multiple>
                    <i class="fas fa-file-upload fa-3x mb-3"></i>
                    <div class="text-white">Upload hier je file</div>
                    <input type="text" name="title" placeholder="schrijf hier je titel">
                    <button class="mt-5" type="submit">Save</button>
                </label>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mx-auto photopage-photos">

        </div>
    </div>
    </div>
</section>
<section>
    <div class="row">
            <?php
            foreach ($result as $photo) {
                include 'photodetail.php';
            }
            ?>
    </div>
</section>

