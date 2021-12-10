<?php
class Administrador extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->verificarAdmin();

		$this->view->admins = [];
	}
	public function render($view = 'index')
	{
		$this->view->render("administrador/$view");
	}
	private function verificarAdmin()
	{
		if (!isset($_SESSION['admin'])) {
			header('Location: ' . URL);
		}
	}
	private function setMensaje($res, $mensaje)
	{
		if ($res) {
			$this->view->mensaje = [
				"type" => "succes",
				"mensaje" => "$mensaje agregado correctamente"
			];
			header("Location: " . URL . "administradores");
		} else {
			$this->view->mensaje = [
				"type" => "alerta",
				"mensaje" => "Error al agregar $mensaje"
			];
		}
	}
	public function getAdministradores()
	{
		$admins = $this->model->getAdministradores();
		if ($admins && $admins->num_rows) {
			while ($row = $admins->fetch_assoc()) {
				array_push($this->view->admins, $row);
			}
		}
	}
	public function addAdmin()
	{
		$_POST['password'] = md5($_POST['password']);
		$addAdmin = $this->model->addAdmin($_POST);

		$this->setMensaje($addAdmin, 'Administrador');
	}
}
