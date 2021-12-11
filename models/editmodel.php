<?php
class EditModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getEstudiante($id_est)
	{
		$connection = $this->db->connect();

		$res = $connection->query("SELECT * FROM estudiante WHERE ci_est='$id_est'");
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
	public function getMaterias()
	{
		$conn = $this->db->connect();

		$res = $conn->query("SELECT * FROM materia");
		return $res;
	}
	public function getMateria($cod_mat)
	{
		$conn = $this->db->connect();

		$res = $conn->query("SELECT * FROM materia WHERE cod_mat='$cod_mat'");
		return $res;
	}
	public function getAdmin($id_admin)
	{
		$conn = $this->db->connect();
		$res = $conn->query("SELECT * FROM administrador WHERE cod_admin=$id_admin");
		return $res;
	}

	public function actualizarEst($est, $curso)
	{
		$connection = $this->db->connect();

		$qry_cod_curso = "SELECT cod_curso FROM curso
			WHERE
			cod_nivel='{$curso['nivel']}' and
			nro_curso={$curso['curso']} and
			nombre_par='{$curso['paralelo']}'";

		$cod_curso = $connection->query($qry_cod_curso)->fetch_assoc()['cod_curso'];

		$qry_update_est = "
			UPDATE estudiante
			SET
				cod_curso='{$cod_curso}',
				nombre_est='{$est['nombre_est']}',
				apellido_pat_est='{$est['apellido_pat_est']}',
				apellido_mat_est='{$est['apellido_mat_est']}',
				telefono_padre={$est['telefono_padre']}
			WHERE
				ci_est='{$est['ci_est']}'
		";

		$res = $connection->query($qry_update_est);
		return $res;
	}

	public function actualizarProf($profesor)
	{
		$conn = $this->db->connect();

		$qry_dicta = "
			UPDATE dicta
			SET
				cod_mat='{$profesor['cod_mat']}'
			WHERE
				ci_prof='{$profesor['ci_prof']}'
		";
		$qry_prof = "
			UPDATE profesor
			SET
				nombre_prof='{$profesor['nombre_prof']}',
				apellido_pat_prof='{$profesor['apellido_pat_prof']}',
				apellido_mat_prof='{$profesor['apellido_mat_prof']}',
				telefono_prof={$profesor['telefono_prof']}
			WHERE
				ci_prof='{$profesor['ci_prof']}'
		";

		$res = $conn->query($qry_dicta);
		if (!$res) {
			return false;
		}
		$res = $conn->query($qry_prof);
		if (!$res) {
			return false;
		}
		return true;
	}
	public function actualizarMat($mat)
	{
		$conn = $this->db->connect();

		$qry_update = "
			UPDATE materia
			SET nombre_mat='{$mat['nombre_mat']}'
			WHERE cod_mat='{$mat['cod_mat']}'
		";
		$res = $conn->query($qry_update);
		if (!$res) {
			return false;
		}
		return $res;
	}
	public function actualizarAdmin($admin)
	{
		$conn = $this->db->connect();
		$qry_update = "
			UPDATE administrador
			SET
				nombre_user='{$admin['nombre_user']}',
				correo='{$admin['correo']}',
				password='{$admin['password']}'
			WHERE
				cod_admin={$admin['cod_admin']}
		";

		$res = $conn->query($qry_update);
		if (!$res) {
			return false;
		}
		return $res;
	}
}
