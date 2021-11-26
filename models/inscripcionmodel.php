<?php
class InscripcionModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($datos)
	{
		$connection = $this->db->connect();

		$qry_cod_curso = "SELECT cod_curso FROM curso
			WHERE
			cod_nivel='{$datos['nivel']}' and
			nro_curso={$datos['curso']} and
			nombre_par='{$datos['paralelo']}'";


		// obtenemos el cod_curso al que va pertenecer el estudiante
		$res = $connection->query($qry_cod_curso);
		if ($res->num_rows) {
			$row = $res->fetch_assoc();
			$cod_curso = $row['cod_curso'];

			$qry_estudiante = "INSERT INTO estudiante
				VALUES (
					'{$datos['ci']}',
					'{$cod_curso}',
					'{$datos['nombre']}',
					'{$datos['paterno']}',
					'{$datos['materno']}',
					'{$datos['telefono']}'
				)";

			return $connection->query($qry_estudiante);
		}
	}
}
