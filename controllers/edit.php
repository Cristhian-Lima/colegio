<?php
class Edit extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->valAdmin();

		$this->setUrlRef();

		$this->view->est = [];
		$this->view->prof = [];
		$this->view->mat = [];
	}

	private function setUrlRef()
	{
		$this->url_ref = isset($_SESSION['url_ref']) ? $_SESSION['url_ref'] : "";
		$_SESSION['url_ref'] = null;
	}
	public function render($view = "index")
	{
		$this->view->render("edit/$view");
	}

	private function valAdmin()
	{
		if (!isset($_SESSION['admin'])) {
			header("Location: " . URL);
		}
	}

	public function getEstudiante()
	{
		if (isset($_GET['ci'])) {
			$id_est = $_GET['ci'];
			$estudiante = $this->model->getEstudiante($id_est);

			if ($estudiante->num_rows) {
				$row = $estudiante->fetch_assoc();
				$this->view->est = $row;
			}
			$_SESSION['url_ref'] = $_SERVER['HTTP_REFERER'];
		}
		$this->render('editEstudiante');
	}
	public function getMateria()
	{
		$cod_mat = $_GET['cod'];
		$materia = $this->model->getMateria($cod_mat);
		if ($materia->num_rows) {
			$row = $materia->fetch_assoc();
			$this->view->mat = $row;
		}
		$this->render('editMateria');
	}
	public function getMaterias()
	{
		$materias = $this->model->getMaterias();
		if ($materias->num_rows) {
			while ($row = $materias->fetch_assoc()) {
				array_push($this->view->mat, $row);
			}
		}
	}
	public function getProfesor()
	{
		if (isset($_GET['ci'])) {
			$id_prof = $_GET['ci'];
			$profesor = $this->model->getProfesor($id_prof);
			if ($profesor->num_rows) {
				$row = $profesor->fetch_assoc();
				$this->view->prof = $row;
			}
			$this->getMaterias();
		}
		$this->render('editProfesor');
	}
	public function getAdmin()
	{
		if (isset($_GET['id'])) {
			$id_admin = $_GET['id'];
			$admin = $this->model->getAdmin($id_admin);

			if ($admin && $admin->num_rows) {
				$row = $admin->fetch_assoc();
				$this->view->admin = $row;
			}
		}
		$this->render('editAdministrador');
	}

	/*----------------- guardar------------------------*/
	public function guardar()
	{
		if (isset($_POST['guardar'])) {
			switch ($_POST['guardar']) {
				case 'estudiante':
					$this->actualizarEst();
					break;
				case 'profesor':
					$this->actualizarProf();
					break;
				case 'materia':
					$this->actualizarMat();
					break;
				case 'administrador':
					$this->actualizarAdmin();
					break;
			}
		}
	}

	/*----------------- Actualizar------------------------*/

	private function actualizarEst()
	{
		if (isset($_POST['nivel']) && isset($_POST['curso']) && isset($_POST['paralelo'])) {
			$curso = [
				"nivel" => $_POST['nivel'],
				"curso" => $_POST['curso'],
				"paralelo" => $_POST['paralelo']
			];
			$est = [
				"ci_est" => $_POST['ci_est'],
				"nombre_est" => $_POST['nombre'],
				"apellido_pat_est" => $_POST['paterno'],
				"apellido_mat_est" => $_POST['materno'],
				"telefono_padre" => $_POST['telefono']
			];
			$res = $this->model->actualizarEst($est, $curso);
			if ($res) {
				header("Location:" . $this->url_ref);
			}
		} else {
			$_SESSION['msg'] = "No selecciono nivel, curso y/o paralelo";
			header("Location:" . URL . "edit/estudiante?ci={$_POST['ci_est']}");
		}
	}
	private function actualizarProf()
	{
		if (isset($_POST['cod_mat'])) {
			$res = $this->model->actualizarProf($_POST);
			if ($res) {
				header("Location:" . $this->url_ref);
			}
		} else {
			$_SESSION['msg'] = "No selecciono materia";
			header("Location:" . URL . "edit/profesor?ci={$_POST['ci_est']}");
		}
	}
	private function actualizarMat()
	{
		$res = $this->model->actualizarMat($_POST);
		if ($res) {
			header("Location: " . URL . "materias");
		}
	}
	private function actualizarAdmin()
	{
		$_POST['password'] = md5($_POST['password']);
		$res = $this->model->actualizarAdmin($_POST);
		if ($res) {
			header("Location: " . URL . "administradores");
		}
	}
}
