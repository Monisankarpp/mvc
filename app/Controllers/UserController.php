<?php
require_once __DIR__ . "/../Models/User.php";
class UserController
{
  public function getUsers()
  {
    $users = User::getAllUsers();
    echo json_encode($users);
  }
}
