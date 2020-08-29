<?php

// Calling settings
require_once 'config.php';

// Variable to call all articles posted
$results = $result->searchAll();

// Call template home
require_once "home-article.php";