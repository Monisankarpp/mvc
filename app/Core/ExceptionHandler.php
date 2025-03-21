<?php
set_exception_handler(function ($e) {
  Logger::log($e->getMessage());
  http_response_code(500);
  echo json_encode(["error" => "Internal Server Error"]);
});