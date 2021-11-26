<?php
class Materia extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function render()
	{
		$this->view->render('materia/index');
	}
}
