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

  public static function edit(Router $router){

    $userId = $_GET['id'] ?? null;

    $user = Users::where('id', $userId);

    if(!$userId || !$user){
      redirect('/dashboard/users');
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      
      $user->syncUp($_POST);
      
      $alerts = $user->validateEditInfo();

      if(empty($alerts)){
        $result = $user->save();

        if($result){
          redirect('/dashboard/users?at=success&am=Se guardaron los cambios correctamente');
        }
      }
    }

    $alerts = Users::getAlerts();
    
    $router->render('dashboard/users/edit', [
      'title' => 'Usuarios',
      'user' => $user,
      'alerts' => $alerts
    ]);
  }

}

?>