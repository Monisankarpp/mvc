<?php
namespace App\Controllers;

use App\Models\User;

class UserController
{
  public function getUsers()
  {
    $users = User::getAllUsers();
    echo json_encode($users);
  }

  public function createUser()
  {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data["name"], $data["email"])) {
      User::createUser($data["name"], $data["email"]);
      echo json_encode(["message" => "User added successfully"]);
    } else {
      http_response_code(400);
      echo json_encode(["error" => "Invalid input"]);
    }
  }

  public function updateUser()
  {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data["id"], $data["name"], $data["email"])) {
      User::updateUser($data["id"], $data["name"], $data["email"]);
      echo json_encode(["message" => "User updated successfully"]);
    } else {
      http_response_code(400);
      echo json_encode(["error" => "Invalid input"]);
    }
  }

  public function deleteUser()
  {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data["id"])) {
      User::deleteUser($data["id"]);
      echo json_encode(["message" => "User deleted successfully"]);
    } else {
      http_response_code(400);
      echo json_encode(["error" => "Invalid input"]);
    }
  }
}

