<?php

class PostRepository
{

    private $pdo;
    
    /**
     * Construct function that calls PDO
     * @param \PDO $pdo
     * @return void
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Fuction search All article in database
     * @return array
     */
    public function searchAll()
    {
        $sql = "SELECT id, name_title, content_post, date_post FROM content";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll();
        return $results;
    }

    /**
     * Fuction search unique article in database
     * @return mixed
     */
    public function searchArticle(string $id): array
    {
        $sql = "SELECT id, name_title, content_post, date_post FROM content WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    /**
     * Fuction save article POST in database
     * @return mixed
     */
    public function saveArticle(Content $article)
    {
        $sql = "
            INSERT INTO content
            (name_title, content_post)
            VALUES
            (:name_title, :content_post)
        ";
        $statement = $this->pdo->prepare($sql);
        
        $statement->execute([
            'name_title'    => strip_tags($article->getNameTitle()),
            'content_post'  => strip_tags($article->getContent()),
        ]);
    }

    /**
     * Fuction save article POST in database
     * @param int
     */
    public function deleteArticle($id)
    {
        $sql = "DELETE FROM content WHERE id = :id ";

        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            'id' => $id,
        ]);
    }
}