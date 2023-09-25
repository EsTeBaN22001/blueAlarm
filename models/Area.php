<?php 

namespace Models;

use Model\ActiveRecord;

class Area extends ActiveRecord{

  protected static $table = 'area';
  protected static $columsDB = ['id', 'name', 'description'];

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->name = $args['name'] ?? '';
    $this->description = $args['description'] ?? '';
  }

}

?>