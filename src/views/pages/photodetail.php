<div class="col-lg-2 mx-auto photopage-photos">
    <img src="images/<?= $photo['user_id'] ?>/<?= $photo['photo'] ?>">
    <div class="text-center text-primary text-uppercase mt-2"><?= $photo['title'] ?></div>
    <div class="text-center text-grey"><?= $photo['created_on'] ?></div>
    <div class="text-center text-grey">Geplaatst door: <?= $photo['firstname'] ?></div>
</div>