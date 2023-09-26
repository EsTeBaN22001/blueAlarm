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

  public static function edit(Router $router){

    $areaId = $_GET['id'] ?? null;

    $area = Areas::where('id', $areaId);

    if(!$areaId || !$area){
      redirect('/dashboard/areas');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $area->syncUp($_POST);
      
      $alerts = $area->validateEditInfo();

      if(empty($alerts)){
        
        $result = $area->save();

        if($result){
          redirect('/dashboard/areas?at=success&am=Se guardaron los cambios correctamente');
        }
  
      }
    }

    $alerts = Areas::getAlerts();
    
    $router->render('dashboard/areas/edit', [
      'title' => 'Usuarios',
      'alerts' => $alerts,
      'area' => $area
    ]);
  } 

  public static function delete(){

    $areaId = $_GET['id'] ?? null;

    $area = Areas::where('id', $areaId);

    if(!$areaId || !$area){
      redirect('/dashboard/areas');
    }

    $result = $area->delete();

    if($result){
      redirect('/dashboard/areas?at=success&am=Se eliminó el área correctamente');
    }

  }
}

?>