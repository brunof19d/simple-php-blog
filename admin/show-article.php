<?php

// Calling settings
require_once 'config.php';

// Variable to call fuction search unique Article to show
$results = $result->searchArticle($_GET['id']);

require_once "includes/header-admin.php";

?>

<!-- Content -->
<div class="container-xl mt-3 p-2 main">
    <div class="container-xl mt-1 title-post-admin">
        <?php echo $results['name_title'];  ?>
    </div>
    <div class="container-xl mt-1 show-article-admin">
        <p class="mt-2">
            <?php echo nl2br($results['content_post']);  ?>
        </p>
        <div class=" mt-1">
            <hr>
            <p><strong><i><?php echo $results['date_post']; ?></i></strong></p>
        </div>
    </div>
    <div class="container-xl d-flex justify-content-center mt-2">
        <a href="index.php" class="btn btn-secondary btn-xl">Back</a>
    </div>
</div>

<?php require_once "includes/footer-admin.php"; ?>