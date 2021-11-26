<?php
class API extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->view->render('api/index');
	}

	function niveles()
	{
		echo $this->api->getAll();
	}
	function paralelos()
	{
		echo $this->api->getAll();
	}
	function nrocursos()
	{
		echo $this->api->getAll();
	}

	function all()
	{
		echo $this->api->getAll();
	}
}
