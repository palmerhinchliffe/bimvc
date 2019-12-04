<?php
namespace Core;

defined('APPPATH') OR exit();

class Controller
{
    /**
     * @var Twig environment
     */
	public $twig;

	public function render($view, $data = array())
	{
		$loader = new \Twig\Loader\FilesystemLoader(APPPATH . '/views');
		$twig = new \Twig\Environment($loader, ['debug' => \Config\Config::TWIG_DEBUG]);
		$twig->display($view, $data);
	}

	public function load_model($name) {
		$model = ucfirst($name);
		if (file_exists(APPPATH . '/models/' . $model . '.php')) {
			require_once APPPATH . '/models/' . $model . '.php';
			$model = new $model;
			return $model;
		} else {
			// Error model cant be found
			Error::error('Model cannot be found. Does the file exist in "/src/models/"?');
		}
	}

	public function load_library($name) {
		$library = ucfirst($name);
		if (file_exists(APPPATH . '/lib/' . $library . '.php')) {
			require_once APPPATH . '/lib/' . $library . '.php';
			$library = new $library;
			return $library;
		} else {
			// Error
			Error::error('Library cannot be found. Does the file exist in "/src/libraries/"?');
		}
	}
}