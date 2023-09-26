<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AreasController;
use Controllers\DashboardController;
use Controllers\LoginController;
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

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->checkRoutes();