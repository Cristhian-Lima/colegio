<?php
class Materia extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->view->materias = array();
	}
	function render()
	{
		$this->view->render('materia/index');
	}

	function materias()
	{
		$res = $this->model->materias();

		if ($res->num_rows) {
			while ($row = $res->fetch_assoc()) {
				array_push($this->view->materias, $row);
			}
		}
	}
}
