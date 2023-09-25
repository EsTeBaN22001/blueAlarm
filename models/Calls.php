<?php 

namespace Models;

use Model\ActiveRecord;

class Calls extends ActiveRecord{

  protected static $table = 'calls';
  protected static $columnsDB = ['id', 'type', 'id_area', 'id_patient', 'started_date', 'response_date'];

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->type = $args['type'] ?? '';
    $this->id_area = $args['id_area'] ?? null;
    $this->id_patient = $args['id_patient'] ?? null;
    $this->started_date = $args['started_date'] ?? null;
    $this->response_date = $args['response_date'] ?? null;
  }

}

?>