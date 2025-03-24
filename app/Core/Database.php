<?php
namespace App\Core;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database
{
  private static $connection;

  public static function getConnection()
  {
    if (!self::$connection) {
      $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
      $dotenv->load();
      try {
        self::$connection = new PDO(
          "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'],
          $_ENV['DB_USER'],
          $_ENV['DB_PASS']
        );

        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        die(json_encode(["error" => "Database connection failed"]));
      }
    }
    return self::$connection;
  }
}
