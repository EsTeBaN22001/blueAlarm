<?php 

namespace Controllers;

use Models\Users;
use MVC\Router;

class LoginController{

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
            
            $userExists->startSession();

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
    
    $router->renderLogin('login', [
      'title' => 'Inicio de sesión',
      'alerts' => $alerts
    ]);
  }

  public static function logout(){

    session_unset();

    header('Location: /');

  }

}

?>