<?php
class Curso extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->view->titulo = '';
		$this->view->curso = array();
		$this->view->nro_curso = 0;
		$this->view->paralelo = '';
	}

	function setTitle($title)
	{
		$this->view->titulo = $title;
	}

	function render()
	{
		$this->view->render('curso/index');
	}

	function getCurso($nivel)
	{

		$curso = $_GET['curso'];
		$paralelo = isset($_GET['paralelo']) ? $_GET['paralelo'] : '%';
		$res = $this->model->getCursoParalelo($nivel, $curso, $paralelo);


		if ($res->num_rows) {
			while ($row = $res->fetch_assoc()) {
				array_push($this->view->curso, $row);
			}
		}

		$this->view->nro_curso = $curso;
		$this->view->paralelo = $paralelo;
		$this->setTitle($nivel);
		$this->render();
	}
}
