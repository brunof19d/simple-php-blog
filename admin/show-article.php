<?php

require_once __DIR__ . '/../src/config.php';
require_once __DIR__ .  "/../src/includes/header-admin.php";

try {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if (!$id) throw new Exception('ID Invalid');
    $results = $result->searchArticle($id);
} catch (Exception $error) {
    echo 'Error: ',  $error->getMessage();
    die();
}

?>

<div class="container-xl mt-3 p-2 main">

    <!-- Title -->
    <div class="container mt-1 title-post-admin">
        <?= $results['name_title'];  ?>
    </div>

    <!-- Content Post ( Article ) -->
    <div class="container-xl mt-1 show-article-admin">

        <p class="mt-2">
            <?= nl2br($results['content_post']);  ?>
        </p>

        <p class="d-flex justify-content-end mt-3 date-post"><?= $results['date_post']; ?></p>
    </div>

    <div class="container-xl d-flex justify-content-center mt-2">
        <a href="index.php" class="btn btn-primary">Back</a>
    </div>

</div>

<?php require_once __DIR__ . "/../src/includes/footer-admin.php"; ?>