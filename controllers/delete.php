<?php
class Delete extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->verificarAdmin();

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
			$materia = $this->model->getMateria($id_prof);
			if ($materia->num_rows) {
				$row = $materia->fetch_assoc();
				$this->view->mat = $row;
			}
			$_SESSION['url_ref'] = $_SERVER['HTTP_REFERER'];
		}
		$this->render('deleteProf');
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
}
