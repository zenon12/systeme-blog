<?php
class Article
{
  private $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function getAll()
  {
    $query = $this->pdo->query("SELECT * FROM articles");
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function create($data)
  {
    $stmt = $this->pdo->prepare("INSERT INTO articles (user_id, title, urlImage, urlVideo, content) 
    VALUES (:user_id, :title, :urlImage, :urlVideo, :content)");
    return $stmt->execute($data);
  }

  public function update($id, $data)
  {
    $data['id'] = $id;
    $stmt = $this->pdo->prepare("UPDATE articles SET title = :title, content = :content WHERE id = :id");
    return $stmt->execute($data);
  }

  public function delete($id)
  {
    $stmt = $this->pdo->prepare("DELETE FROM articles WHERE id = :id");
    return $stmt->execute(['id' => $id]);
  }

  //getLivreById
  public function getArticleById($id)
  {
    $stmt = $this->pdo->prepare("
          SELECT * FROM articles WHERE id = :id
        ");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
