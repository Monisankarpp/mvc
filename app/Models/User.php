<?php
namespace App\Models;

use App\Core\Database;
use PDO;
class User
{
  public static function getAllUsers()
  {
    $db = Database::getConnection();
    $stmt = $db->query("SELECT id, name, email FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function createUser($name, $email)
  {
    $db = Database::getConnection();
    $stmt = $db->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    return $stmt->execute([$name, $email]);
  }

  public static function updateUser($id, $name, $email)
  {
    $db = Database::getConnection();
    $stmt = $db->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    return $stmt->execute([$name, $email, $id]);
  }

  public static function deleteUser($id)
  {
    $db = Database::getConnection();
    $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
    return $stmt->execute([$id]);
  }
}

