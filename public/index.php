<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once __DIR__ . "/../app/Core/Router.php";
require_once __DIR__ . "/../routes/web.php";
require_once __DIR__ . "/../app/Core/ExceptionHandler.php";
require_once __DIR__ . "/../app/Core/Logger.php";
require_once __DIR__ . "/../app/Models/User.php";


// Dispatch the request
$request = $_GET['request'] ?? '';
Router::dispatch($request);