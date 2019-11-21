<?php
defined('SYSPATH') OR exit();

class BIMVC_Controller
{
    /**
     * @var Database connection
     */
	public $db;

    /**
     * @var Twig environment
     */
	public $twig;

	public function __construct()
	{
		// Initialise twig environment
		$this->load_twig();
	}

	private function load_twig()
	{
	    $loader = new Twig_Loader_Filesystem(
	        array (
	            APPPATH . 'views'
	        )
	    );
	    // set up environment
	    $params = array(
	    );
	    $this->twig = new Twig_Environment($loader, $params);
	}
}