<?php
class Inscripcion extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->view->message = "";
	}

	function render()
	{
		$this->view->render('inscripcion/index');
	}

	function registrarEstudiante()
	{
		$ci = $_POST['ci'];
		$nombre = $_POST['nombre'];
		$paterno = $_POST['paterno'];
		$materno = $_POST['materno'];
		$telefono = $_POST['telefono'];
		$nivel = $_POST['nivel'];
		$curso = $nivel == 'n-in' ? 0 : $_POST['curso'];
		$paralelo = $_POST['paralelo'];

		$res = $this->model->insert([
			'ci' => $ci,
			'nombre' => $nombre,
			'paterno' => $paterno,
			'materno' => $materno,
			'telefono' => $telefono,
			'nivel' => $nivel,
			'curso' => $curso,
			'paralelo' => $paralelo
		]);

		$message = "Estudiante {$nombre} " . ($res ? "inscrito" : "fue inscrito anteriormente");

		$this->view->message = $message;
		$this->render();
	}
}
