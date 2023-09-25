<?php 

namespace Models;

use Model\ActiveRecord;

class Reports extends ActiveRecord{

  protected static $table = 'reports';
  protected static $columsDB = ['id', 'id_area', 'date', 'content'];

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->id_area = $args['id_area'] ?? null;
    $this->date = $args['date'] ?? null;
    $this->content = $args['content'] ?? null;
  }

}

?>