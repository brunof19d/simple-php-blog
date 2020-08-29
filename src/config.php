<?php
/**
 * Database settings
 */
define("DATABASE_DSN", "mysql:dbname=blogPHP;host=localhost"); // Put your DB name and Hostname
define("DATABASE_USER", "root"); // Your username
define("DATABASE_PASSWORD", ""); // Your database password

/**
 * Importing the libraries necessary for the system to function
 */
require_once "database.php";
require_once "helper.php";
require_once "classes/Content.php";
require_once "classes/PostRepository.php";

 /**
  * Variable to call classes
  */
  $article = new Content(); // Calling the class setters and getters for Forms
  $result = new PostRepository($pdo); // Calling the class that controls all crud in the database