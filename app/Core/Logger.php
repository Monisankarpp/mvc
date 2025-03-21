<?php
class Logger
{
  public static function log($message)
  {
    $file = __DIR__ . "/../../logs/error.log";
    file_put_contents($file, date("[Y-m-d H:i:s]") . " " . $message . PHP_EOL, FILE_APPEND);
  }
}