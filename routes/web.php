<?php
use App\Controllers\UserController;
use App\Core\Router;

Router::add("users", UserController::class, "getUsers");
Router::add("users/create", UserController::class, "createUser");
Router::add("users/update", UserController::class, "updateUser");
Router::add("users/delete", UserController::class, "deleteUser");
