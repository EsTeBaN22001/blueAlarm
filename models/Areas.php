<?php 

namespace Models;

use Models\ActiveRecord;

class Areas extends ActiveRecord{

  protected static $table = 'areas';
  protected static $columnsDB = ['id', 'name', 'description'];

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->name = $args['name'] ?? null;
    $this->description = $args['description'] ?? null;
  }

  public function validate(){
    if(!$this->name){
      self::$alerts['error'][] = 'El nombre es inválido';
    }
    if(!$this->description){
      self::$alerts['error'][] = 'La descripción es inválida';
    }

    return self::$alerts;
  }

}

?>