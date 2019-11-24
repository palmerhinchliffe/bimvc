<?php
defined('SYSPATH') OR exit();

class BIMVC_Controller
{
    /**
     * @var Twig environment
     */
	public $twig;

	public function render($view, $data = array())
	{
		$loader = new \Twig\Loader\FilesystemLoader(APPPATH . '/views');
		$twig = new \Twig\Environment($loader, ['debug' => BIMVC_Config::TWIG_DEBUG]);
		$twig->display($view, $data);
	}

	public function load_model($model) {
		$model = ucfirst($model) . '_Model';
		if (file_exists(APPPATH . '/models/' . $model . '.php')) {
			require_once APPPATH . '/models/' . $model . '.php';
			$model = new $model;
			return $model;
		} else {
			// Error
			exit("Can't find model!");
		}
	}

	// Load twig and catch any errors
}