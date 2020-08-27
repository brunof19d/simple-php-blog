<?php

require_once "database.php";
require_once "Content.php";
require_once "includes/header-admin.php";

$article = new Content();

if (array_key_exists('name_title' ,$_POST)) {
  $article->setNameTitle($_POST['name_title']);
}

?>

<form class="container-xl mt-3 p-2 main" method="POST">
  <div class="form-group">
    <label>Title:</label>
    <input type="text" class="form-control" name="name_title">
  </div>

  <div class="form-group">
    <label>Content:</label>
    <textarea class="form-control" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
  
</form>

<?php echo $article->getNameTitle(); ?>

<?php require_once "includes/footer-admin.php"; ?>