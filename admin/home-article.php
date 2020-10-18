<?php
require_once __DIR__ . '/../src/config.php';
require_once __DIR__ . '/../src/includes/header-admin.php';
?>

    <div class="container d-flex justify-content-start mt-2 ">
        <a href="add-article.php" class="btn btn-success">Add new article</a>
    </div>

<?php foreach ($results as $result): ?>

    <div class="container mt-2 title-post-admin">

        <div class="mt-3">

            <a href="show-article.php?id=<?= $result['id']; ?>"><?= $result['name_title']; ?></a>

            <a class="btn btn-info btn-sm" href="edit-article.php?id=<?= $result['id']; ?>"> Edit </a>

            <a class="btn btn-danger btn-sm" href="delete-article.php?id=<?= $result['id']; ?>"> Delete </a>

        </div>

        <p class="d-flex justify-content-end mt-3 date-post">Posted in: <?= $result['date_post']; ?></p>

    </div>

<?php endforeach; ?>

<?php require_once __DIR__ . "/../src/includes/footer-admin.php"; ?>