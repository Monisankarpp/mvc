<?php
require_once __DIR__ . "/../Core/Database.php";
class User
{
  public static function getAllUsers()
  {
    $db = Database::getConnection();
    $stmt = $db->query("SELECT id, name, email FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
