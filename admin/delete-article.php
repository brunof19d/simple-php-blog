<?php

require_once __DIR__ . '/../src/config.php';

try {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if (!$id) throw new Exception('ID Invalid');
    $results = $result->deleteArticle($id);
    header('Location: index.php');
} catch (Exception $error) {
    echo 'Error: ',  $error->getMessage();
    die();
}

