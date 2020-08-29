<?php

// Calling settings
require_once 'config.php';

// Variable to call fuction delete Article
$results = $result->deleteArticle($_GET['id']);

header('Location: index.php');