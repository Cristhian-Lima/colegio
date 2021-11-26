<?php
class Errors extends Controller
{
	function __construct($message)
	{
		parent::__construct();
		$this->view->message = $message;
		$this->view->render('errors/index');
	}
}
