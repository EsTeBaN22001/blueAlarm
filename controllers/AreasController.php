<?php 

namespace Controllers;

use Models\Areas;
use MVC\Router;

class AreasController{

  public static function index(Router $router){

    $areas = Areas::all();
    
    $router->render('dashboard/areas/index', [
      'title' => 'Areas',
      'areas' => $areas
    ]);

  }
}

?>