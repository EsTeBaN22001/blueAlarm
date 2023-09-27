<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AreasController;
use Controllers\DashboardController;
use Controllers\LoginController;
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

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->checkRoutes();