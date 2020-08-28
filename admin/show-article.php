<?php

require "database.php";
require "PostRepository.php";

$result = new PostRepository($pdo);
$results = $result->searchArticle($_GET['id']);

require_once "includes/header-admin.php";

?>

<div class="container-xl mt-3 p-2 main">

    <div class="container-xl mt-1 show-article-admin">
        <?php echo $results['name_title'];  ?>
    </div>

    <div class="container-xl mt-1 show-article-admin">
        <p class="mt-2"><?php echo nl2br($results['content_post']);  ?></p>
        

        <div class=" mt-1">
            <hr>
            <p>
                <?php
                $date = date('Y\/m\/d\-h:i:s A'); // Day-Mouth-Year // Hour, minute and seconds // AM or PM
                echo $date;
                ?>
            </p>
        </div>
    </div>
</div>
<?php require_once "includes/footer-admin.php"; ?>

