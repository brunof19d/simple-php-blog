<?php

require_once __DIR__ . '/../src/config.php';
require_once __DIR__ . "/../src/includes/header-admin.php";

try {

    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if (!$id) throw new Exception('ID Invalid');
    $results = $result->searchArticle($id);

    $noPost = false;
    $validateError = [];

    if (checkPost()) {

        if (array_key_exists('name_title', $_POST) && strlen($_POST['name_title']) > 0) {
            $title = filter_var($_POST['name_title'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
            if (!$title) throw new Exception('Field invalid');
            $article->setNameTitle($title);
        } else {
            $noPost = true;
            $validateError['name_title'] = 'Title is required';
        }

        if (array_key_exists('content_post', $_POST) && strlen($_POST['content_post']) > 0) {
            $contentPost = filter_var($_POST['content_post'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
            if (!$contentPost) throw new Exception('Field invalid');
            $article->setContent($contentPost);
        } else {
            $noPost = true;
            $validateError['content_post'] = 'Some text is required';
        }

        if (array_key_exists('id', $_POST) ) {
            $article->setId($_POST['id']);
        }

        if (!$noPost) {
            $result->updateArticle($article);
            header('Location: index.php');
            die();
        }
    }
} catch (Exception $error) {
    echo 'Error: ', $error->getMessage();
    die();
}

?>

    <form class="container mt-3 p-5 main" method="POST">
        <input type="hidden" name="id" value="<?= $results['id']; ?>">
        <div class="form-group">

            <label for="nameTitle">Title:</label>

            <?php if ($noPost && isset($validateError['name_title'])) : ?>
                <span class="error-form"><?= $validateError['name_title']; ?></span>
            <?php endif; ?>

            <input id="nameTitle" type="text" class="form-control" name="name_title" placeholder="Put your article title here" value="<?= $results['name_title']; ?>">

        </div>

        <div class="form-group">

            <label for="contentPost">Content:</label>

            <?php if ($noPost && isset($validateError['content_post'])) : ?>
                <span class="error-form"><?= $validateError['content_post']; ?></span>
            <?php endif; ?>

            <textarea id="contentPost" class="form-control" rows="8" name="content_post" placeholder="Put your text here"><?= $results['content_post']; ?></textarea>

        </div>

        <button type="submit" class="btn btn-success">Create article</button>

    </form>

<?php require_once __DIR__ . "/../src/includes/footer-admin.php"; ?>