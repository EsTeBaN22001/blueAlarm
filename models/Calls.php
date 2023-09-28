<?php 

namespace Models;

use Models\ActiveRecord;

class Calls extends ActiveRecord{

  protected static $table = 'calls';
  protected static $columnsDB = ['id', 'id_type', 'id_area', 'id_patient', 'id_nurse', 'started_date', 'response_date', 'answered'];

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->id_type = $args['type'] ?? null;
    $this->id_area = $args['id_area'] ?? null;
    $this->id_patient = $args['id_patient'] ?? null;
    $this->id_nurse = $args['id_nurse'] ?? null;
    $this->started_date = $args['started_date'] ?? date('Y-m-d H:i:s');
    $this->response_date = $args['response_date'] ?? date('Y-m-d H:i:s');
    $this->answered = $args['answered'] ?? "0";
  }

  function validateCall(){

    if(!$this->id_type){
      self::$alerts['error'][] = 'Seleccione el tipo de llamado';
    }

    if(!$this->id_area){
      self::$alerts['error'][] = 'Seleccione el área';
    }

    if(!$this->id_patient){
      self::$alerts['error'][] = 'Seleccione el paciente';
    }

    if(!$this->id_nurse){
      self::$alerts['error'][] = 'Seleccione el enfermero a cargo';
    }

    return self::$alerts;

  }

}

?>