<?php 

namespace Controllers;

use Models\Areas;
use Models\Calls;
use Models\Nurses;
use Models\Patients;
use Models\TypeCall;
use MVC\Router;

class CallsController{

  public static function index(Router $router){

    // Obtener todos los llamados reemplazando los campos de id's por el nobmre de cada tabla
    $query = "SELECT c.id, tc.name AS type, a.name AS area, p.name AS patient, n.name AS nurse, c.started_date, c.response_date, CASE WHEN c.answered = 0 THEN 'Pendiente' WHEN c.answered = 1 THEN 'Completado' ELSE 'Pendiente' END AS answered FROM calls AS c LEFT JOIN type_call AS tc ON c.id_type = tc.id LEFT JOIN areas AS a ON c.id_area = a.id LEFT JOIN patients AS p ON c.id_patient = p.id LEFT JOIN nurses AS n ON c.id_nurse = n.id;";
    
    $calls = Calls::consultSQL($query);
    
    $router->render('dashboard/calls/index', [
      'title' => 'Llamados',
      'calls' => $calls
    ]);

  }

  public static function create(Router $router){

    $call = new Calls();
    $areas = Areas::all();
    $patients = Patients::all();
    $nurses = Nurses::all();
    $types = TypeCall::all();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $call->syncUp($_POST);

      $alerts = $call->validateCall();
      
      if(empty($alerts)){

        $result = $call->save();

        if($result){
          redirect('/dashboard/calls?at=success&am=Se creó el llamado correctamente');
        }

      }
      
      // debugstop($call);
    }
    
    $alerts = Calls::getAlerts();

    $router->render('dashboard/calls/create', [
      'title' => 'Crear llamado',
      'alerts' => $alerts,
      'call' => $call,
      'areas' => $areas,
      'patients' => $patients,
      'nurses' => $nurses,
      'types' => $types
    ]);

  }

  public static function editState(){

    $idCall = $_GET['id'] ?? null;

    $call = Calls::where('id', $idCall);

    if(!$idCall || !$call){
      redirect('/dashboard/calls');
    }
    
    if($call->answered == 0){
      $call->response_date = date('Y-m-d H:i:s');
      $call->answered = 1;
    }else{
      $call->response_date = $call->started_date;
      $call->answered = 0;
    }

    $result = $call->save();

    if($result){
      redirect('/dashboard/calls');
    }

  }

  public static function delete(){

    $idCall = $_GET['id'] ?? null;

    $call = Calls::where('id', $idCall);

    if(!$idCall || !$call){
      redirect('/dashboard/calls');
    }

    $result = $call->delete();

    if($result){
      redirect('/dashboard/calls?at=success&am=Se eliminó el llamado correctamente');
    }

  }

}

?>