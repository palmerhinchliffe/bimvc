<?php
defined(SYSPATH) OR exit();

class BIMVC_Router
{
	/**
     * @var Current url
     */
	public $url;

	/**
     * @var Controller
     */
	public $controller;

	/**
     * @var Controller method
     */
	public $action;

	/**
     * @var Controller method parameters
     */
	public $params;

	public function __construct()
	{
		$this->handle_url();

		// Does the controller exist?
		if ($this->controller) {
			require APPPATH . 'controllers/' . $this->url_controller . '.php';
			$this->controller = new $this->url_controller();

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
                $this->controller->index();
			}

		} else {
			// Controller does not exist

		}
	}

	/* Gets the url and splits it into controller, method, and params */
	private function handle_url()
	{
		if (isset($_SERVER['REQUEST_URI'])) {
			$url = parse_url($_SERVER['REQUEST_URI']);
			$segments = explode('/', $url['path']);

			$this->controller = isset($segments[1]) ? $segments[1] : null;
			$this->action = isset($segments[2]) ? $segments[2] : null;

			// Remove controller and method from url segments leaving just paramaters
			unset($segments[0], $segments[1], $segments[2]);

			// Rebase array keys and store the URL parameters
			$this->params = array_values($segments);
		}
	}
}