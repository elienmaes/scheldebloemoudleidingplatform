<?php
$full_name= $message["firstname"] . ' ' . $message["lastname"];
?>

<div class="message my-2">
    <div class="user d-flex align-items-center">
        <img class="user-img mr-3" src="https://picsum.photos/id/<?=$message["user_id"] ?>/100/100">
        <div class="mr-3">@<?=$full_name ?></div>
        <div class="mr-3">aangemaakt op <?=$message["created_on"] ?></div>
    </div>
    <p class="text-white mt-4">
        <?=$message["message"] ?>
    </p>
</div>


