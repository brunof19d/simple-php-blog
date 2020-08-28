<?php

require_once "database.php";
require_once "Content.php";
require_once "PostRepository.php";
require_once "includes/header-admin.php";

$article = new Content();
$results = new PostRepository($pdo);



function tem_post()
{
  if (count($_POST) > 0) {
    return true;
  }

  return false;
}

$noPost = false;
$validateError = [];

if (tem_post()) {
  if (array_key_exists('name_title', $_POST) && strlen($_POST['name_title']) > 0) {
    $article->setNameTitle($_POST['name_title']);
  } else {
    $noPost = true;
    $validateError['name_title'] = 'Title is required';
  }

  if (array_key_exists('content_post', $_POST) && strlen($_POST['content_post']) > 0) {
    $article->setContent($_POST['content_post']);
  } else {
    $noPost = true;
    $validateError['content_post'] = 'Some text is required';
  }

  if (!$noPost) {
    $results->saveArticle($article);

    header('Location: index.php');
    die();
  }
}

?>

<!-- Content -->
<form class="container-xl mt-3 p-2 main" method="POST">
  <div class="form-group">
    <label>Title:</label>
    <?php if ($noPost && isset($validateError['name_title'])) : ?>
      <span class="error-form"><?php echo $validateError['name_title']; ?></span>
    <?php endif; ?>
    <input type="text" class="form-control" name="name_title" placeholder="Put your article title here">
  </div>
  <div class="form-group">
    <label>Content:</label>
    <?php if ($noPost && isset($validateError['content_post'])) : ?>
      <span class="error-form"><?php echo $validateError['content_post']; ?></span>
    <?php endif; ?>
    <textarea class="form-control" rows="3" name="content_post" placeholder="Put your text here"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>

<?php require_once "includes/footer-admin.php"; ?>