<?php
class CalificacionModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getEstudiante($ci)
	{
		$conn = $this->db->connect();

		$qry_estudiante = "SELECT
			ci_est AS ci,
			nombre_est AS nombre,
			apellido_pat_est AS paterno,
			apellido_mat_est AS materno
			FROM estudiante
			WHERE
			ci_est=$ci
			";

		$res = $conn->query($qry_estudiante);
		return $res;
	}

	function getCalificacion($ci)
	{
		$conn = $this->db->connect();

		$qry_calificacion = "SELECT
			materia.nombre_mat as materia,
			tipo_ev,
			nota,
			fecha
			FROM (
				(calificacion INNER JOIN materia ON calificacion.cod_mat=materia.cod_mat)
				INNER JOIN estudiante ON estudiante.ci_est=calificacion.ci_est
			) WHERE calificacion.ci_est=$ci
			";

		$res = $conn->query($qry_calificacion);
		return $res;
	}
}
