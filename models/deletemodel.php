<?php
class DeleteModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getMateriaOfProf($ci_prof)
	{
		$conn = $this->db->connect();

		$res = $conn->query(
			"
			SELECT materia.*
			FROM materia
			INNER JOIN dicta ON materia.cod_mat=dicta.cod_mat
			WHERE dicta.ci_prof=$ci_prof"
		);
		return $res;
	}
	public function getMateria($cod_mat)
	{
		$conn = $this->db->connect();

		$res = $conn->query("SELECT * FROM materia WHERE cod_mat='$cod_mat'");
		return $res;
	}
	public function getMaterias()
	{
		$conn = $this->db->connect();

		$res = $conn->query("SELECT * FROM materia");
		return $res;
	}
	public function getEstudiante($id_est)
	{
		$connection = $this->db->connect();

		$res = $connection->query("SELECT * FROM estudiante WHERE ci_est='$id_est'");
		echo $connection->error;
		return $res;
	}
	public function getProfesor($id_prof)
	{
		$conn = $this->db->connect();

		$res = $conn->query(
			"
			SELECT
				profesor.*,
				dicta.cod_mat
			FROM profesor
				INNER JOIN dicta
				ON profesor.ci_prof=dicta.ci_prof
			WHERE profesor.ci_prof='$id_prof'"
		);
		echo $conn->error;
		return $res;
	}
	public function getAdmin($cod_admin)
	{
		$conn = $this->db->connect();
		$res = $conn->query("SELECT * FROM administrador WHERE cod_admin=$cod_admin");
		return $res;
	}
	public function deleteEst($id_est)
	{
		$conn = $this->db->connect();

		$qry_delete_cal = "DELETE FROM calificacion WHERE ci_est='$id_est'";
		$qry_delete_est = "DELETE FROM estudiante WHERE ci_est='$id_est'";

		$res = $conn->query($qry_delete_cal);
		if (!$res) {
			return false;
		}
		$res = $conn->query($qry_delete_est);
		if (!$res) {
			return false;
		}
		return $res;
	}
	public function deleteProf($id_prof)
	{
		$conn = $this->db->connect();

		$qry_delete_dicta = "DELETE FROM dicta WHERE ci_prof='$id_prof'";
		$qry_delete_prof = "DELETE FROM profesor WHERE ci_prof='$id_prof'";

		$res = $conn->query($qry_delete_dicta);
		if (!$res) {
			echo $conn->error;
			return false;
		}
		$res = $conn->query($qry_delete_prof);
		if (!$res) {
			echo $conn->error;
			return false;
		}
		return true;
	}
	public function deleteMat($cod_mat)
	{
		$conn = $this->db->connect();

		$qry_del = "DELETE FROM materia WHERE cod_mat='$cod_mat'";
		$res = $conn->query($qry_del);
		if (!$res) {
			echo $conn->error;
			return false;
		}
		return $res;
	}
	public function deleteAdmin($cod_admin)
	{
		$conn = $this->db->connect();

		// obtiene la cantidad de administradores
		$nro_admins = $conn->query("SELECT COUNT(*) AS nro_admins FROM administrador")->fetch_assoc()['nro_admins'];
		if ($nro_admins > 1) {
			$res = $conn->query("DELETE FROM administrador WHERE cod_admin=$cod_admin");
			return $res;
		} else {
			return false;
		}
	}
}
