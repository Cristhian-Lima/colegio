<?php

class Calificacion extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->view->calificacion = array();
		$this->view->estudiante = array();
	}

	function render()
	{
		$this->view->render('calificacion/index');
	}

	function getCalificacion()
	{
		$ci = $_GET['ci'];

		$res = $this->model->getCalificacion($ci);

		if ($res->num_rows) {
			while ($row = $res->fetch_assoc()) {
				array_push($this->view->calificacion, $row);
			}
		}

		// obtiene y guarda los datos de estudiante
		$res = $this->model->getEstudiante($ci);
		if ($res->num_rows) {
			$this->view->estudiante = $res->fetch_assoc();
		}
	}
}
