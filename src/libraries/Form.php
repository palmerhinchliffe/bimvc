<?php
defined('APPPATH') OR exit();

class Form
{
	public function open($action, ...$config)
	{
		$html = <<<HTML
		<form method='post' action=$action>


HTML;
		echo $html;
	}

	public function close()
	{
		$form_token = $_SESSION['bimvc_form_token'];
		$html = <<<HTML
		<input type="hidden" name="form_token" value="$form_token"></input>
		</form>
HTML;
		echo $html;
	}

	public function text($name, $config)
	{
		$html = <<<HTML
		<input></input>
HTML;
		echo $html;
	}

	public function textarea($name, $config)
	{
		$html = <<<HTML
		<textarea></textarea>
HTML;
		echo $html;
	}

	public function int($name, $config)
	{
		$html = <<<HTML
		<input></input>
HTML;
		echo $html;
	}

	public function tel($name, $config)
	{
		$html = <<<HTML
		<input></input>
HTML;
		echo $html;
	}

	public function email($name, $config)
	{
		$html = <<<HTML
		<input></input>
HTML;
		echo $html;
	}

	public function check($name, $config)
	{
		$html = <<<HTML
		<input></input>
HTML;
		echo $html;
	}

	public function radio($name, $config)
	{
		$html = <<<HTML
		<input></input>
HTML;
		echo $html;
	}

	public function search($name, $config)
	{
		$html = <<<HTML
		<input></input>
HTML;
		echo $html;
	}

	public function hidden($name, $config)
	{
		$html = <<<HTML
		<input></input>
HTML;
		echo $html;
	}
}