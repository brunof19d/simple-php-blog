<?php

require "database.php";
require "PostRepository.php";

$result = new PostRepository($pdo);
$results = $result->searchAll();

require_once "includes/header-admin.php";

?>

<div class="container-xl d-flex justify-content-center mt-2 ">
    <a href="add-article.php" class="btn btn-success">Add article</a>
</div>

<?php foreach ($results as $result) : ?>
    <div class="container-xl mt-3 title-post-admin">
        <a href="show-article.php?id=<?php echo $result['id']; ?>">
            <?php echo $result['name_title']; ?>
            <br>
            <strong>Posted in: </strong>
            <?php echo $result['date_post']; ?>
        </a>

        <div class="d-flex justify-content-center">
            <a class="btn btn-info m-2" href="edit.php?id=<?php echo $result['id']; ?>"> Edit </a>
            <a class="btn btn-danger m-2" href="delete-article.php?id=<?php echo $result['id']; ?>"> Delete </a>
        </div>
    </div>
<?php endforeach; ?>

<?php require_once "includes/footer-admin.php"; ?>