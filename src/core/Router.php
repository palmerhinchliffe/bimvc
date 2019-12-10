<?php
namespace Core;

defined('APPPATH') OR exit();

class Router
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

	// Route URL to controller
	public function route()
	{
		// Attempt to validate and split the url
		if ($this->split_url()) {

			// Is the controller name provided?
			if (!$this->controller) {
				// Controller name not provided -- go home
				$this->controller = \config\Config::BASE_CONTROLLER;
			}

			// Does the controller exist?
			if (!file_exists(APPPATH . '/controllers/' . $this->controller . '.php')) {
				// Controller doesn't exist -- get error/404
				Error::error('Page not found', true);
				exit();
			}

			require_once APPPATH . '/controllers/' . $this->controller . '.php';
			$this->controller = new $this->controller;
			$this->dispatch();
		} else {
			// invalid url
			exit('Invalid URL');
		}
	}

	// Call the action
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
	   			Error::error('Controller has no index method', true);
	   			exit();
	   		}
		}
	}

	/* Gets the url and splits it into controller, method, and params */
	/* Return: BOOLEAN */
	private function split_url()
	{
		if (isset($_SERVER['REQUEST_URI']) && $this->validate_url($_SERVER['REQUEST_URI'])) {
			$url = parse_url($_SERVER['REQUEST_URI']);
			$url = explode('/', $url['path']);

			$this->controller_sub_dir = null;
			$this->controller = isset($url[2]) ? ucfirst($url[2]) : null;
			$this->action = isset($url[3]) ? $url[3] : null;

			// Remove controller and method from url leaving just paramaters
			unset($url[0], $url[1], $url[2], $url[3]);

			// Rebase array keys and store the URL parameters
			$this->params = array_values($url);

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