<?php 

namespace Models;

use Models\ActiveRecord;

class Users extends ActiveRecord{

  protected static $table = 'users';
  protected static $columnsDB = ['id', 'name', 'surname', 'email', 'password', 'admin'];

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->name = $args['name'] ?? null;
    $this->surname = $args['surname'] ?? null;
    $this->email = $args['email'] ?? null;
    $this->password = $args['password'] ?? null;
    $this->admin = $args['admin'] ?? null;
  }

  public function validateLogin(){

    if(!$this->email){
      self::$alerts['error'][] = 'El email es inválido';
    }

    return self::$alerts;
  }

  public function validateEditInfo(){
    if(!$this->name){
      self::$alerts['error'][] = 'El nombre es inválido';
    }
    if(!$this->surname){
      self::$alerts['error'][] = 'El email es inválido';
    }
    if(!$this->email){
      self::$alerts['error'][] = 'El email es inválido';
    }

    return self::$alerts;
  }

  public function startSession(){
    
    session_unset();

    $_SESSION['login'] = true;
    $_SESSION['id'] = $this->id;
    $_SESSION['name'] = trim($this->name);
    $_SESSION['surnname'] = trim($this->surname);
    $_SESSION['email'] = trim($this->email);
    $_SESSION['admin'] = $this->admin;

  }

}

?>