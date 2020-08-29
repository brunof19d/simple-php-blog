<?php 

require_once "config.php";

try {
    $pdo = new PDO(DATABASE_DSN, DATABASE_USER, DATABASE_PASSWORD);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


