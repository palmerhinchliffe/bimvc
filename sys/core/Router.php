<?php
defined('SYSPATH') OR exit();

class BIMVC_Router
{
	/**
     * @var Current url
     */
	public $url = null;

	/**
     * @var Controller
     */
	public $controller = null;

	/**
     * @var Controller method
     */
	public $action = null;

	/**
     * @var Controller method parameters
     */
	public $params = null;

	public function __construct()
	{
		$this->route();
	}

	// 
	public function route()
	{
		if ($this->handle_url()) {

			// Is the controller name provided?
			if ($this->controller) {

				// Does the controller exist?
				if (file_exists(APPPATH . 'controllers/' . $this->controller . '.php')) {

					// Controller exists
					require_once APPPATH . 'controllers/' . $this->controller . '.php';

				} else {

					// Controller doesn't exist -- get error/404
					$this->controller = 'BIMVC_Error';
					require_once APPPATH . 'controllers/' . $this->controller . '.php';
				}

			} else {
				// Controller name not provided -- go home
				$this->controller = 'Welcome';
				require_once APPPATH . 'controllers/' . $this->controller . '.php';
			}
			$this->controller = new $this->controller;
			$this->dispatch();
		} else {
			exit('Invalid URL');
		}
	}

	private function dispatch()
	{
		// Does the method exist?
		if (method_exists($this->controller, $this->action)) {

			// Are there any parameters?
			if (!empty($this->params)) {

				// Call method with parameters
				call_user_func_array(array($this->controller, $this->action), $this->params);
			} else {

				// No parameters -- call method without
				$this->controller->{$this->action}();
			}

		} else {

			// Method does not exist - load default index method of controller
	   		if (method_exists($this->controller, 'index')) {
	   			$this->controller->index();
	   		} else {

	   			// Controller missing index() method
	   			exit('Controller has no index method!');
	   		}
		}
	}

	/* Gets the url and splits it into controller, method, and params */
	/* Return: BOOLEAN */
	private function handle_url()
	{
		if (isset($_SERVER['REQUEST_URI']) && $this->validate_url($_SERVER['REQUEST_URI'])) {
			$url = parse_url($_SERVER['REQUEST_URI']);
			$segments = explode('/', $url['path']);

			// Is controller in a sub-directory?
			if (is_dir(APPPATH . 'controllers/' . $segments[2])) {
				$this->controller = isset($segments[3]) ? $segments[3] : null;
				$this->action = isset($segments[4]) ? $segments[4] : null;

				// Remove controller and method from url segments leaving just paramaters
				unset($segments[0], $segments[1], $segments[2], $segments[3], $segments[4]);
			} else {
				$this->controller = isset($segments[2]) ? $segments[2] : null;
				$this->action = isset($segments[3]) ? $segments[3] : null;

				// Remove controller and method from url segments leaving just paramaters
				unset($segments[0], $segments[1], $segments[2], $segments[3]);
			}

			// Rebase array keys and store the URL parameters
			$this->params = array_values($segments);

			return true;
		}

		// Invalid URL
		return false;
	}

	/* Validates URL */
	/* Return BOOLEAN */
	private function validate_url($url)
	{
		return preg_match("/^[a-z A-Z 0-9 \- _ \/ ? & =]+$/", $url) ? true : false;
	}
}