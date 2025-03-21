<?php
class Database
{
  private static $connection;

  public static function getConnection()
  {
    if (!self::$connection) {
      $config = include __DIR__ . "/../../config/configure.php";
      try {
        self::$connection = new PDO(
          "mysql:host={$config['db_host']};dbname={$config['db_name']}",
          $config['db_user'],
          $config['db_pass']
        );
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        die(json_encode(["error" => "Database connection failed"]));
      }
    }
    return self::$connection;
  }
}
