<?php 

namespace Controllers;

use Models\Areas;
use Models\Nurses;
use MVC\Router;

class NursesController{

  public static function create(Router $router){

    $areas = Areas::all();

    $nurse = new Nurses();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
      $nurse->syncUp($_POST);

      $alerts = $nurse->validateNurse();

      if(empty($alerts)){

        $result = $nurse->save();

        if($result){
          redirect('/dashboard/patients-and-nurses?at=success&am=Se creó el paciente correctamente');
        }

      }

    }
    
    $alerts = Nurses::getAlerts();
    
    $router->render('dashboard/nurses/create', [
      'title' => 'Crear paciente',
      'areas' => $areas,
      'nurse' => $nurse,
      'alerts' => $alerts
    ]);

  }

  public static function edit(Router $router){

    $idNurse = $_GET['id'] ?? null;

    $nurse = Nurses::where('id', $idNurse);

    if(!$idNurse || !$nurse){
      redirect('/dashboard/patients-and-nurses');
    }

    $areas = Areas::all();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $nurse->syncUp($_POST);

      $alerts = $nurse->validateNurse();

      if(empty($alerts)){

        $result = $nurse->save();

        if($result){
          redirect('/dashboard/patients-and-nurses?at=success&am=Se guardaron los datos del paciente correctamente');
        }

      }

    }
    
    $alerts = Nurses::getAlerts();
    
    $router->render('dashboard/nurses/edit', [
      'title' => 'Editar paciente',
      'nurse' => $nurse,
      'areas' => $areas,
      'alerts' => $alerts
    ]);

  }

  public static function delete(){

    $idNurse = $_GET['id'] ?? null;

    $nurse = Nurses::where('id', $idNurse);

    if(!$idNurse || !$nurse){
      redirect('/dashboard/patients-and-nurses');
    }

    $result = $nurse->delete();

    if($result){
      redirect('/dashboard/patients-and-nurses?at=success&am=Se eliminó el enfermero correctamente');
    }

  }

}

?>