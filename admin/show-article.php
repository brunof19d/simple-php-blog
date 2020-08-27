<?php 

require "../database.php";
require "PostRepository.php";

$result = new PostRepository($pdo);
$results = $result->searchArticle($_GET['id']);

require_once "includes/header-admin.php"; 

?>

<div class="container-xl mt-3 title-post-admin">
<?php echo $results['name_title'];  ?>
</div>

<?php require_once "includes/footer-admin.php"; ?>