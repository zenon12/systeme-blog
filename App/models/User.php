<?php
class User
{
  private $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function register($data)
  {
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $stmt = $this->pdo->prepare("
      INSERT INTO users 
      (full_name,username, email, role,picture,password) 
      VALUES 
      (:full_name, :username, :email, :role, :picture, :password)
    ");
    return $stmt->execute($data) ;
  }

  public function updateRole($userId, $role)
  {
    $stmt = $this->pdo->prepare("UPDATE users SET role = :role WHERE id = :id");
    return $stmt->execute(['id' => $userId, 'role' => $role]);
  }
  public function updatePicture($id,$picture)
  {
    $stmt = $this->pdo->prepare("UPDATE users SET picture = :picture WHERE id = :id");
    return $stmt->execute(['id' => $id, 'picture' => $picture]);
  }

  public function login($username, $password)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
      return $user;
    }
    return false;
  }

  public function isAdmin($userId)
  {
    $stmt = $this->pdo->prepare("SELECT role FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user['role'] === 'admin';
  }

  public function changePassword($userId, $password)
  {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $this->pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
    return $stmt->execute(['id' => $userId, 'password' => $password]);
  }

  public function updateProfile($userId, $data)
  {
    $stmt = $this->pdo->prepare("
      UPDATE users SET
      full_name = :full_name,
      username = :username,
      email = :email
      WHERE id = :id
    ");
    $data['id'] = $userId;
    return $stmt->execute($data);
  }


  public function getUserById($userId)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function getUserByEmail($email)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function getUserByUsername($username)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }


  public function delete($userId)
  {
    $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
    return $stmt->execute(['id' => $userId]);
  }

  public function all()
  {
    $stmt = $this->pdo->query("SELECT * FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


 
}
