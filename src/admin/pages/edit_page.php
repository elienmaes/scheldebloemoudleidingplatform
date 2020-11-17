<?php
    require '../../app.php';
    $page_id = $_GET['page_id'] ?? 0;

    if (isset($_POST['update'])) {

        //waarden uit post halen
        $data = (object) array(
            $slug = $_POST['slug'] ?? '',
            $name = $_POST['name'] ?? '',
            $content = $_POST['content'] ?? '',
            $template = $_POST['template'] ?? 'page',
        );
        //Page::save($data);
        if ($page_id) {
            //Update sql schrijven
            $sql = 'UPDATE `navigation`
                    SET `slug` = :slug, `name` = :name, `content` = :content, `template` = :template
                    WHERE `page_id` = :page_id ';
            $update_statement = $db->prepare($sql);
            $update_statement->execute(
                [
                    ':slug' => $slug,
                    ':name' => $name,
                    ':content' => $content,
                    ':template' => $template,
                    ':page_id' => $page_id,
                ]
            );
            header('location: index.php');
            die();
        } else {
            //INSERT ITEM
            $sql = 'INSERT INTO `navigation` (`slug`, `name`, `content`, `template`)
                    VALUES (:slug, :name, :content, :template)';
            $insert_statement = $db->prepare($sql);
            $insert_statement->execute(
                [
                    ':slug' => $slug,
                    ':name' => $name,
                    ':content' => $content,
                    ':template' => $template,
                ]
            );

            $new_id = $db->lastInsertId();

            header('location: index.php');
            die();
        }
    }

    if ($page_id) {
        //SQL om page_id, slug en name op te vragen van alle paginas
        $sql = 'SELECT * FROM `navigation` WHERE `page_id` = :page_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([ ':page_id' => $page_id ]);
        $page = $pdo_statement->fetchObject();
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link rel="stylesheet" href="../../../public/stylesheets/style.css">
</head>
<body>
<div class="container">
<h1>website > <?= ($page_id) ? 'Edit' : 'Add'; ?> Page</h1>

<form  method="POST">
    <p>
        <label>
            Name
              <input type="text" name="name" value="<?= ($page_id) ? $page->name : ''; ?>" class="form-control">
        </label>
    </p>
    <p>
        <label>
            Slug
            <input type="text" name="slug" value="<?=  ($page_id) ? $page->slug : ''; ?>" class="form-control">
        </label>
    </p>
    <p>
        <label>
            Content
            <textarea name="content"><?= $page->content ?></textarea>
        </label>
    </p>
    <p>
        <label>
            Template<br>

            <select name="template" required class="form-control">
            <?php
                $templates = [
                    'page' => 'Pagina',
                    'home' => 'Startpagina',
                    'projects' => 'Projecten' ];
                foreach ($templates as $key => $value) : ?>
                    <option value="<?= $key; ?>" <?php if ($page_id && $page->template == $key) {
                    echo 'selected';
                } ?>><?= $value; ?></option>
                <?php endforeach;  ?>
                </select>
            </label>
    </p>
    <button type="submit" class="btn btn-primary" name="update"><?= ($page_id) ? 'Aanpassen' : 'Plaats pagina'; ?></button>
    <a href="index.php" class="btn btn-outline-secondary">Terug</a>
</form>



</body>
</html> 