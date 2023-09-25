<?php 

namespace Controllers;

use Models\Users;
use MVC\Router;

class IndexController{

  public static function login(Router $router){
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $user = new Users($_POST);
      
      $alerts = $user->validateLogin();

      if(empty($alerts)){

        // Verificar que el usuario exista
        $userExists = Users::where('email', $user->email);

        if($userExists){
          
          $passwordVerify = password_verify($user->password, $userExists->password);

          if($passwordVerify){

            $user->startSession();

            header('Location: /dashboard');

          }else{
            $alerts = Users::setAlert('error', 'La contraseña es incorrecta');  
          }

        }else{
          $alerts = Users::setAlert('error', 'El usuario no existe');
        }

      }

    }

    $alerts = Users::getAlerts();
    
    $router->render('login', [
      'title' => 'Inicio de sesión',
      'alerts' => $alerts
    ]);
  }

}

?>