<?php 

namespace Controllers;

use Models\Patients;
use MVC\Router;

class PatientsAndNursesController{

  public static function index(Router $router){
    
    // Obtener pacientes y reemplazar el id_area por el nombre del área
    $query = "select p.id, p.name, p.surname, p.phone, p.email, p.domicile, a.name as area from patients as p inner join areas as a on p.id_area = a.id;";

    $patients = Patients::consultSQL($query);
    
    $router->render('dashboard/patientsAndNurses/index', [
      'title' => 'Asignación de áreas',
      'patients' => $patients
    ]);

  }
  
}

?>