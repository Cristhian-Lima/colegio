<?php
class Materia extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->view->materias = array();
		$this->view->mensaje = array();
	}
	function render()
	{
		$this->view->render('materia/index');
	}
	private function setMensaje($res, $mensaje)
	{
		if ($res) {
			$this->view->mensaje = [
				"type" => "succes",
				"mensaje" => "$mensaje agregado correctamente"
			];
			//header("Location: " . URL . "materias");
		} else {
			$this->view->mensaje = [
				"type" => "alerta",
				"mensaje" => "Error al agregar $mensaje"
			];
		}
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

	public function addMateria()
	{
		$res = $this->model->addMateria($_POST);
		$this->setMensaje($res, 'MATERIA');
		$this->render();
	}
}
