<?php
class Edit extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->valAdmin();

		$this->view->est = [];
		$this->view->prof = [];
		$this->view->mat = [];
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
		}
		$this->render('editEstudiante');
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
			$materias = $this->model->getMaterias();
			if ($materias->num_rows) {
				while ($row = $materias->fetch_assoc()) {
					array_push($this->view->mat, $row);
				}
			}
		}
		$this->render('editProfesor');
	}

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
				default:

					break;
			}
		}
	}

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
				header("Location:" . URL);
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
				header("Location:" . URL . "profesores");
			}
		} else {
			$_SESSION['msg'] = "No selecciono materia";
			header("Location:" . URL . "edit/profesor?ci={$_POST['ci_est']}");
		}
	}
}
