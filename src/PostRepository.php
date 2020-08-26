<?php

class PostRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // public function saveContent(Content $content)
    // {
        
    // }

    public function searchAll()
    {
        $sql = "SELECT id, name_title, content_post FROM content";
        $stn = $this->pdo->prepare($sql);
        $stn->execute();
        $results = $stn->fetchAll();
        return $results;
    }
}