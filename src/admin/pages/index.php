<?php
    require '../../app.php';

    $all_pages = Page::getAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link rel="stylesheet" href="../../../public/stylesheets/style.css">
</head>
<body>
    <div class="container">
        <h1 class="my-5">Website</h1>
        <?php foreach ($all_pages as  $page) : ?>
            <div class="row mb-3">
                <div class="col-8">
                    <?= $page['name']; ?>
                </div>
                <div class="col-4 text-right">
                    <a href="edit_page.php?page_id=<?= $page['page_id']; ?>" class="btn btn-secondary mr-3">Bewerk</a>
                    <a href="delete_page.php?page_id=<?= $page['page_id']; ?>" class="btn btn-danger">Verwijder</a>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="row">
            <div class="col-12 my-5">
                <a href="#" class="btn btn-success mt-3 mr-3">Pagina toevoegen</a>
                <a class="btn btn-outline-primary mt-3" href="../">terug naar admin</a>
            </div>
        </div>
    </div>
</body>
</html> 