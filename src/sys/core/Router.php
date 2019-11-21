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
		$this->handle_url();

		if ($this->controller) {

			// Does the controller exist?
			if (file_exists(APPPATH . 'controllers/' . $this->controller . '.php')) {
				require_once APPPATH . 'controllers/' . $this->controller . '.php';
				$this->controller = new $this->controller;

				// Does the method exist?
				if (method_exists($this->controller, $this->action)) {

					// Are there any parameters?
					if (!empty($this->params)) {

						// Call method with parameters
						call_user_func_array(array($this->controller, $this->action), $this->params);
					} else {

						// No parameters
						$this->controller->{$this->action}();
					}

				} else {

					// Method does not exist - load default index method of controller
               		if (method_exists($this->controller, 'index')) {
               			$this->controller->index();
               		} else {

               			// Controller missing index method
               			exit('Controller has no index method!');
               		}
				}
			} else {
				// Controller doesn't exit
				exit('Controller does not exist!');
			}

		} else {
			// Controller not provided
			exit('Welcome!');
		}
	}

	/* Gets the url and splits it into controller, method, and params */
	private function handle_url()
	{
		if (isset($_SERVER['REQUEST_URI'])) {
			$url = parse_url($_SERVER['REQUEST_URI']);
			$segments = explode('/', $url['path']);

			$this->controller = isset($segments[2]) ? $segments[2] : null;
			$this->action = isset($segments[3]) ? $segments[3] : null;

			// Remove controller and method from url segments leaving just paramaters
			unset($segments[0], $segments[1], $segments[2], $segments[3]);

			// Rebase array keys and store the URL parameters
			$this->params = array_values($segments);
		}
	}
}