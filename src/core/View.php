<?php
namespace Core;

class View
{
	public function render($template, ...$data)
	{
		$this->create_form_token();
		$loader = new \Twig\Loader\FilesystemLoader(APPPATH . '/views');
		$twig = new \Twig\Environment($loader, ['debug' => \Config\Config::TWIG_DEBUG]);
		echo $twig->render($template, $data);
	}

	public function create_form_token()
	{
	    if (empty($_SESSION['bimvc_form_token'])) {
	        $_SESSION['bimvc_form_token'] = bin2hex(random_bytes(32));
	    }
	}
}