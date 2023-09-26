<?php 

namespace Models;

use Models\ActiveRecord;

class Areas extends ActiveRecord{

  protected static $table = 'areas';
  protected static $columsDB = ['id', 'name', 'description'];

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->name = $args['name'] ?? '';
    $this->description = $args['description'] ?? '';
  }

}

?>