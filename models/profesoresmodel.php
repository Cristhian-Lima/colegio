<?php
class ProfesoresModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getProfesores()
	{
		$conn = $this->db->connect();

		$qry_prof = "
			SELECT
				profesor.*,
				materia.nombre_mat
			FROM dicta
				INNER JOIN materia ON dicta.cod_mat=materia.cod_mat
				INNER JOIN profesor ON dicta.ci_prof=profesor.ci_prof;
		";

		$res = $conn->query($qry_prof);
		return $res;
	}

	public function getMaterias()
	{
		$conn = $this->db->connect();

		$qry_mat = "SELECT * FROM materia";

		$res = $conn->query($qry_mat);

		echo $conn->error;

		return $res;
	}

	public function addProfesor($profesor)
	{
		$conn = $this->db->connect();

		print_r($profesor);
		$qry_prof = "
			INSERT INTO profesor
			VALUES (
				'{$profesor['ci_prof']}',
				'{$profesor['nombre_prof']}',
				'{$profesor['apellido_pat_prof']}',
				'{$profesor['apellido_mat_prof']}',
				{$profesor['telefono_prof']}
			)
		";
		echo "<br>" . $qry_prof;

		$res = $conn->query($qry_prof);
		if (!$res) {
			echo "<br>Eror: " . $conn->error;
			return false;
		}

		$qry_dicta = "
			INSERT INTO dicta
			VALUES (
				'{$profesor['cod_mat']}',
				'{$profesor['ci_prof']}'
			)
		";
		echo "<br>" . $qry_dicta;
		$res = $conn->query($qry_dicta);
		if (!$res) {
			echo $conn->error;
			return false;
		}

		return true;
	}
}
