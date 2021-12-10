<?php
class Profesores extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->view->prof = [];
		$this->view->mat = [];
	}

	public function render()
	{
		$this->view->render('profesores/index');
		$this->view->mensaje = [];
	}

	private function setMensaje($res, $mensaje)
	{
		if ($res) {
			$this->view->mensaje = [
				"type" => "succes",
				"mensaje" => "$mensaje agregado correctamente"
			];
			header("Location: " . URL . "profesores");
		} else {
			$this->view->mensaje = [
				"type" => "alerta",
				"mensaje" => "Error al agregar $mensaje"
			];
		}
	}

	public function getProfesores()
	{
		$res = $this->model->getProfesores();
		if ($res->num_rows) {
			while ($row = $res->fetch_assoc()) {
				array_push($this->view->prof, $row);
			}
		}
	}

	public function getMaterias()
	{
		$res = $this->model->getMaterias();
		if ($res->num_rows) {
			while ($row = $res->fetch_assoc()) {
				array_push($this->view->mat, $row);
			}
		}
	}

	public function addProf()
	{
		$prof = [
			"ci_prof" => $_POST['ci_prof'],
			"nombre_prof" => $_POST['nombre_prof'],
			"apellido_pat_prof" => $_POST['apellido_pat_prof'],
			"apellido_mat_prof" => $_POST['apellido_mat_prof'],
			"telefono_prof" => $_POST['telefono_prof'],
			"cod_mat" => $_POST['cod_mat']
		];
		$res = $this->model->addProfesor($prof);

		$this->setMensaje($res, "PROFESOR");
		$this->render();
	}
}
