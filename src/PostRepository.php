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
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll();
        return $results;
    }

    public function searchArticle(string $id): array
    {
        $sql = "SELECT id, name_title, content_post FROM content WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

}