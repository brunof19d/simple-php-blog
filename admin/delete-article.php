<?php

require "database.php";
require_once "PostRepository.php";

$results = new PostRepository($pdo);
$results->deleteArticle($_GET['id']);

header('Location: index.php');