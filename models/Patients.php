<?php 

namespace Models;

use Models\ActiveRecord;

class Patients extends ActiveRecord{

  protected static $table = 'patients';
  protected static $columnsDB = ['id', 'name', 'surname', 'phone', 'email', 'domicile', 'id_area'];

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->name = $args['name'] ?? null;
    $this->surname = $args['surname'] ?? null;
    $this->phone = $args['phone'] ?? null;
    $this->email = $args['email'] ?? null;
    $this->domicile = $args['domicile'] ?? null;
    $this->id_area = $args['id_area'] ?? null;
  }

  public function validateNewPatient(){

    if(!$this->name){
      self::$alerts['error'][] = 'El nombre es obligatorio';
    }
    if(!$this->surname){
      self::$alerts['error'][] = 'El apellido es obligatorio';
    }
    if(!$this->phone){
      self::$alerts['error'][] = 'El telefono es obligatorio';
    }
    if(!$this->email){
      self::$alerts['error'][] = 'El correo es obligatorio';
    }
    if(!$this->domicile){
      self::$alerts['error'][] = 'El domicilio es obligatorio';
    }
    if(!$this->id_area){
      self::$alerts['error'][] = 'Es obligatorio seleccionar un área';
    }
    
    return self::$alerts;

  }

}

?>