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

      $alerts = $patient->validateNewPatient();

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

}

?>