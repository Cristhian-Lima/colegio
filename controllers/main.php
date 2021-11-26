<?php
class Main extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->view->primaria = array();
		$this->view->secundaria = array();
		$this->view->curso = array();
	}
	function render()
	{
		$this->view->render('main/index');
	}
}
