<?php
class Delete extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->verificarAdmin();

		$this->setUrlRef();
		$this->view->mensaje = "";
		$this->view->est = [];
		$this->view->prof = [];
		$this->view->mat = [];
		$this->view->admin = [];
	}

	private function setUrlRef()
	{
		$this->url_ref = isset($_SESSION['url_ref']) ? $_SESSION['url_ref'] : "";
		$_SESSION['url_ref'] = null;
	}

	private function verificarAdmin()
	{
		if (!isset($_SESSION['admin'])) {
			header("Location: " . URL);
		}
	}

	public function render($view = 'index')
	{
		$this->view->render("delete/$view");
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
		$this->render('deleteEst');
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
			$materia = $this->model->getMateriaOfProf($id_prof);
			if ($materia->num_rows) {
				$row = $materia->fetch_assoc();
				$this->view->mat = $row;
			}
			$_SESSION['url_ref'] = $_SERVER['HTTP_REFERER'];
		}
		$this->render('deleteProf');
	}
	public function getMateria()
	{
		if (isset($_GET['cod'])) {
			$cod_mat = $_GET['cod'];

			$res = $this->model->getMateria($cod_mat);

			if ($res && $res->num_rows) {
				$row = $res->fetch_assoc();
				$this->view->mat = $row;
			}
			$_SESSION['url_ref'] = $_SERVER['HTTP_REFERER'];
		}
		$this->render('deleteMat');
	}
	public function getAdmin()
	{
		if (isset($_GET['id'])) {
			$cod_admin = $_GET['id'];
			$res = $this->model->getAdmin($cod_admin);

			if ($res && $res->num_rows) {
				$row = $res->fetch_assoc();
				if ($row === $_SESSION['admin']) {
					$this->view->isAdmin = [
						"isSession" => true,
						"mensaje" => "No puedes eliminar al administrador con el que iniciaste sesion"
					];
				}
				$this->view->admin = $row;
			}
			$_SESSION['url_ref'] = $_SERVER['HTTP_REFERER'];
		}
		$this->render('deleteAdmin');
	}
	public function ok()
	{
		if (isset($_POST['ok'])) {
			switch ($_POST['ok']) {
				case 'estudiante':
					$this->deleteEst();
					break;
				case 'profesor':
					$this->deleteProf();
					break;
				case 'administrador':
					$this->deleteAdmin();
					break;
				case 'materia':
					$this->deleteMat();
					break;
			}
		}
	}
	private function deleteEst()
	{
		$id_est = $_POST['ci_est'];
		$resDelete = $this->model->deleteEst($id_est);

		if ($resDelete) {
			header("Location:" . $this->url_ref);
		}
	}
	public function deleteProf()
	{
		$id_prof = $_POST['ci_prof'];
		$resDel = $this->model->deleteProf($id_prof);
		if ($resDel) {
			header("Location:" . $this->url_ref);
		}
	}
	public function deleteMat()
	{
		$cod_mat = $_POST['cod_mat'];
		$resDel = $this->model->deleteMat($cod_mat);
		if ($resDel) {
			header("Location:" . $this->url_ref);
		}
	}
	public function deleteAdmin()
	{
		$cod_admin = $_POST['cod_admin'];
		$resDel = $this->model->deleteAdmin($cod_admin);

		if ($resDel) {
			header("Location:" . $this->url_ref);
		}
	}
}
