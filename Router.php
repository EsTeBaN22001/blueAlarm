<?php

namespace MVC;

class Router
{
	public array $getRoutes = [];
	public array $postRoutes = [];

	public function get($url, $fn)
	{
		$this->getRoutes[$url] = $fn;
	}

	public function post($url, $fn)
	{
		$this->postRoutes[$url] = $fn;
	}

	public function checkRoutes()
	{
		
		// Proteger Rutas...
		session_start();

		// Arreglo de rutas protegidas...
		$protectedRoutes = [
			'/dashboard',
			'/dashboard/users',
			'/dashboard/users/edit',
			'/dashboard/users/delete',
			'/dashboard/areas',
			'/dashboard/areas/create',
			'/dashboard/areas/edit',
			'/dashboard/areas/delete',
			'/dashboard/patients-and-nurses',
			'/dashboard/patients/create',
			'/dashboard/patients/edit',
			'/dashboard/patients/delete',
			'/dashboard/nurses/create',
			'/dashboard/nurses/edit',
			'/dashboard/nurses/delete',
			'/dashboard/calls',
			'/dashboard/calls/create',
			'/dashboard/calls/edit-state',
			'/dashboard/calls/delete',
		];

		$auth = $_SESSION['login'] ?? null;

		$currentUrl = $_SERVER['PATH_INFO'] ?? '/';
		$method = $_SERVER['REQUEST_METHOD'];

		if ($method === 'GET') {
			$fn = $this->getRoutes[$currentUrl] ?? null;
		} else {
			$fn = $this->postRoutes[$currentUrl] ?? null;
		}

		if(in_array($currentUrl, $protectedRoutes) && !$auth){
			header('Location: /');
		}

		if ( $fn ) {
			// Call user fn va a llamar una función cuando no sabemos cual sera
			call_user_func($fn, $this); // This es para pasar argumentos
		} else {
			echo "Página No Encontrada o Ruta no válida";
		}
	}

	public function render($view, $datos = [])
	{

		// Leer lo que le pasamos  a la vista
		foreach ($datos as $key => $value) {
			$$key = $value;  // Doble signo de dolar significa: variable de variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
		}

		ob_start(); // Almacenamiento en memoria durante un momento...

		// entonces incluimos la vista en el layout
		include_once __DIR__ . "/views/$view.php";
		$content = ob_get_clean(); // Limpia el Buffer
		include_once __DIR__ . '/views/templates/layout-dashboard.php';
	}

	public function renderLogin($view, $datos = [])
	{

		// Leer lo que le pasamos  a la vista
		foreach ($datos as $key => $value) {
			$$key = $value;  // Doble signo de dolar significa: variable de variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
		}

		ob_start(); // Almacenamiento en memoria durante un momento...

		// entonces incluimos la vista en el layout
		include_once __DIR__ . "/views/$view.php";
		$content = ob_get_clean(); // Limpia el Buffer
		include_once __DIR__ . '/views/templates/layout.php';
	}
}