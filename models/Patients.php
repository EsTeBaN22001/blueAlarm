<?php 

namespace Models;

use Model\ActiveRecord;

class Patients extends ActiveRecord{

  protected static $table = 'patients';
  protected static $columnsDB = ['id', 'name', 'surname', 'phone', 'email', 'domicile'];

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->name = $args['name'] ?? null;
    $this->surname = $args['surname'] ?? null;
    $this->phone = $args['phone'] ?? null;
    $this->email = $args['email'] ?? null;
    $this->domicile = $args['domicile'] ?? null;
  }

}

?>