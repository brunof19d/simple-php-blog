<?php

class PostRepository
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

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

    public function saveArticle(Content $article)
    {
        $date = $article->getDate();
        if (is_object($date)) {
            $date = $date->format('Y-m-d');
        }

        $sql = "
            INSERT INTO content
            (name_title, content_post, date_post)
            VALUES
            (:name_title, :content_post, :date_post)
        ";
        $statement = $this->pdo->prepare($sql);
        
        $statement->execute([
            'name_title'    => strip_tags($article->getNameTitle()),
            'content_post'  => strip_tags($article->getContent()),
            'date_post'     => $article
        ]);
    }

}