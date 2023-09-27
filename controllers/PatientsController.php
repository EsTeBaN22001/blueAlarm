<?php 

namespace Controllers;

use Models\Areas;
use Models\Patients;
use MVC\Router;

class PatientsController{

  public static function create(Router $router){

    $areas = Areas::all();

    $patient = new Patients();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
      $patient->syncUp($_POST);

      $alerts = $patient->validatePatient();

      if(empty($alerts)){

        $result = $patient->save();

        if($result){
          redirect('/dashboard/patients-and-nurses?at=success&am=Se creó el paciente correctamente');
        }

      }

    }
    
    $alerts = Patients::getAlerts();
    
    $router->render('dashboard/patients/create', [
      'title' => 'Crear paciente',
      'areas' => $areas,
      'patient' => $patient,
      'alerts' => $alerts
    ]);

  }

  public static function edit(Router $router){

    $idPatient = $_GET['id'] ?? null;

    $patient = Patients::where('id', $idPatient);

    if(!$idPatient || !$patient){
      redirect('/dashboard/patients-and-nurses');
    }

    $areas = Areas::all();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $patient->syncUp($_POST);

      $alerts = $patient->validatePatient();

      if(empty($alerts)){

        $result = $patient->save();

        if($result){
          redirect('/dashboard/patients-and-nurses?at=success&am=Se guardaron los datos del paciente correctamente');
        }

      }

    }
    
    $alerts = Patients::getAlerts();
    
    $router->render('dashboard/patients/edit', [
      'title' => 'Editar paciente',
      'patient' => $patient,
      'areas' => $areas,
      'alerts' => $alerts
    ]);

  }

}

?>