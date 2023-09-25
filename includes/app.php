<?php 

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__ . "./../");
$dotenv->load();

require 'functions.php';
require 'database.php';

// Conectarnos a la base de datos
use Models\ActiveRecord;
ActiveRecord::setDB($db);