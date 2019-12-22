<?php
namespace Core;

defined('APPPATH') OR exit();

class Controller
{
	public function render($template, ...$data)
	{
		$view = new View;
		$view->render($template, $data);
	}

	public function load_model($name)
	{
		if (file_exists(APPPATH . '/models/' . $name . '.php')) {
			require_once APPPATH . '/models/' . $name . '.php';
			$model = new $name;
			return $model;
		} else {
			// Error: model cannot be found
			Error::error('Model cannot be found. Does the class exist in "/src/models/"?');
		}
	}

	public function load_library($name) {
		if (file_exists(APPPATH . '/lib/' . $name . '.php')) {
			require_once APPPATH . '/lib/' . $name . '.php';
			$library = new $name;
			return $library;
		} else {
			Error::error('Model cannot be found. Does the class exist in "/src/models/"?');
		}
	}
}