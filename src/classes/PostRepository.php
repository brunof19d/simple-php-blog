<?php

class PostRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Fuction search All article in database
     * @return array
     */
    public function searchAll(): array
    {
        $sql = "SELECT id, name_title, content_post, date_post FROM content";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * Fuction search unique article in database
     * @param int $id
     * @return mixed
     */
    public function searchArticle(int $id): array
    {
        $sql = "SELECT id, name_title, content_post, date_post FROM content WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Fuction save article POST in database
     * @param Content $article
     * @return void
     */
    public function saveArticle(Content $article): void
    {
        $sql = "INSERT INTO content (name_title, content_post) VALUES (:name_title, :content_post)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            'name_title'    => strip_tags($article->getNameTitle()),
            'content_post'  => strip_tags($article->getContent()),
        ]);
    }

    /**
     * Function update article POST in database.
     * @param Content $article
     * @return void
     */
    public function updateArticle(Content $article): void
    {
        $sql = "UPDATE content SET
        name_title = :name_title, 
        content_post = :content_post WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('name_title', $article->getNameTitle());
        $statement->bindValue(':content_post', $article->getContent());
        $statement->bindValue(':id', $article->getId());
        $statement->execute();
    }

    /**
     * Fuction save article POST in database
     * @param int
     * @return void
     */
    public function deleteArticle(int $id): void
    {
        $sql = "DELETE FROM content WHERE id = :id ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id' => $id,]);
    }
}