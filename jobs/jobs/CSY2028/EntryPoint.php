<?php
namespace CSY2028;
//Where all pages go through first
class EntryPoint {
	private $route;
	private $method;
	private $routes;
	
	
	public function __construct(\CSY2028\Routes $routes) {
		
		$this->routes = $routes;
	
	
	}
		
	public function run() {
		
		$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
		$routes = $this->routes->getRoutes();
		$validate = $this->routes->validate();
	 
		$method = $_SERVER['REQUEST_METHOD'];
		if (isset($routes[$route]['login']) && !$validate->isloggedin()) {
			header('location: /login/error');
		} 
		else if (isset($routes[$route]['permissions']) && !$this->routes->checkpermission($routes[$route]['permissions'])) {
			header('location: /permissionerror');
		
		} 
		else {
			$controller = $routes[$route][$method]['controller'];
 			$functionName = $routes[$route][$method]['function'];
			$page = $controller->$functionName();
			
			$output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);
			
			$title = $page['title'];

			echo $this->loadTemplate('../templates/layout.html.php', ['loggedin' => $validate->isloggedin(),
																		'user' => $validate->getuser(),
																		'categories' => $this->routes->categoriesTable->findAll(),
																		'output' => $output,
																		'title' => $title]);
			
		
		
		
	}
}

	function loadTemplate($fileName, $templateVars) {
			extract($templateVars);
			ob_start();
			require $fileName;
			$contents = ob_get_clean();
			return $contents;
	}
}
