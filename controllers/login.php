<?php
class Login extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->verificarAdmin();
		$this->view->mensaje = "";
	}

	private function verificarAdmin()
	{
		if (isset($_SESSION['admin'])) {
			header("Location:" . URL);
		}
	}
	public function render()
	{
		$this->view->render('login/index');
	}

	public function verificarLogin()
	{
		$this->cerrarSesion();
		if (isset($_POST['email']) && isset($_POST['password'])) {
			$correo = $_POST['email'];
			$password = md5($_POST['password']);

			$res = $this->model->verificarAdmin($correo, $password);

			if ($res && $res->num_rows) {
				$_SESSION['admin'] = $res->fetch_assoc();
				echo "<pre>";
				header("Location: " . URL);
			} else {
				$this->view->mensaje = "Correo y/o contraseña incorrectos";
			}
		}
	}

	private function cerrarSesion()
	{
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			session_unset();
			session_destroy();
			header("Location: " . URL);
		}
	}
}
