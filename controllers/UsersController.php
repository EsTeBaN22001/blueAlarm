<?php 

namespace Controllers;

use Models\Users;
use MVC\Router;

class UsersController{

  public static function index(Router $router){

    $users = Users::all();
    
    $router->render('dashboard/users/index', [
      'title' => 'Usuarios',
      'users' => $users
    ]);
  }

}

?>