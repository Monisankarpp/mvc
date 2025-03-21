<?php
require_once __DIR__ . "/../Controllers/UserController.php";
class Router
{
  private static $routes = [];

  public static function add($url, $controller, $method)
  {
    self::$routes[$url] = [$controller, $method];
  }

  public static function dispatch($requestUri)
  {
    $url = trim(parse_url($requestUri, PHP_URL_PATH), '/');
    if (isset(self::$routes[$url])) {
      [$controller, $method] = self::$routes[$url];
      (new $controller)->$method();
    } else {
      http_response_code(404);
      echo json_encode(["error" => "Route not found"]);
    }
  }
}
