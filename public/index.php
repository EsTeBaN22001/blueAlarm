<?php 
date_default_timezone_set('America/Buenos_Aires');

require_once __DIR__ . '/../includes/app.php';

use Controllers\AreasController;
use Controllers\CallsController;
use Controllers\DashboardController;
use Controllers\LoginController;
use Controllers\NursesController;
use Controllers\PatientsAndNursesController;
use Controllers\PatientsController;
use Controllers\UsersController;
use MVC\Router;

$router = new Router();

// Login de usuarios
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Dashboard principal
$router->get('/dashboard', [DashboardController::class, 'index']);

// Usuarios
$router->get('/dashboard/users', [UsersController::class, 'index']);
$router->get('/dashboard/users/edit', [UsersController::class, 'edit']);
$router->post('/dashboard/users/edit', [UsersController::class, 'edit']);
$router->get('/dashboard/users/delete', [UsersController::class, 'delete']);

// Areas
$router->get('/dashboard/areas', [AreasController::class, 'index']);
$router->get('/dashboard/areas/create', [AreasController::class, 'create']);
$router->post('/dashboard/areas/create', [AreasController::class, 'create']);
$router->get('/dashboard/areas/edit', [AreasController::class, 'edit']);
$router->post('/dashboard/areas/edit', [AreasController::class, 'edit']);
$router->get('/dashboard/areas/delete', [AreasController::class, 'delete']);

// Pacientes y enfermeros - asignación de áreas
$router->get('/dashboard/patients-and-nurses', [PatientsAndNursesController::class, 'index']);

// Pacientes CRUD
$router->get('/dashboard/patients/create', [PatientsController::class, 'create']);
$router->post('/dashboard/patients/create', [PatientsController::class, 'create']);
$router->get('/dashboard/patients/edit', [PatientsController::class, 'edit']);
$router->post('/dashboard/patients/edit', [PatientsController::class, 'edit']);
$router->get('/dashboard/patients/delete', [PatientsController::class, 'delete']);

// Enfermeros CRUD
$router->get('/dashboard/nurses/create', [NursesController::class, 'create']);
$router->post('/dashboard/nurses/create', [NursesController::class, 'create']);
$router->get('/dashboard/nurses/edit', [NursesController::class, 'edit']);
$router->post('/dashboard/nurses/edit', [NursesController::class, 'edit']);
$router->get('/dashboard/nurses/delete', [NursesController::class, 'delete']);

// Llamados - calls
$router->get('/dashboard/calls', [CallsController::class, 'index']);
$router->get('/dashboard/calls/create', [CallsController::class, 'create']);
$router->post('/dashboard/calls/create', [CallsController::class, 'create']);
$router->get('/dashboard/calls/edit-state', [CallsController::class, 'editState']);
$router->get('/dashboard/calls/delete', [CallsController::class, 'delete']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->checkRoutes();