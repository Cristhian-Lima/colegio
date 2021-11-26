<?php
require_once 'models/curso.php';

class ParalelosApi
{
	function getAll()
	{
		$paralelo = new Paralelo();
		$paralelos = array();

		$res = $paralelo->getParalelos();

		if ($res->num_rows) {
			while ($row = $res->fetch_assoc()) {
				$par = array(
					'paralelo' => $row['nombre_par']
				);

				array_push($paralelos, $par);
			}

			return json_encode($paralelos);
		}
	}
}
class NivelesApi
{
	function getAll()
	{
		$nivel = new Nivel();
		$niveles = array();

		$res = $nivel->getNiveles();

		if ($res->num_rows) {
			while ($row = $res->fetch_assoc()) {
				$niv = array(
					'cod' => $row['cod_nivel'],
					'nombre' => $row['nombre_nivel']
				);

				array_push($niveles, $niv);
			}

			return json_encode($niveles);
		}
	}
}

class NroCursosApi
{
	function getAll()
	{
		$nro = new NroCurso();
		$nros = array();

		$res = $nro->getNroCursos();

		if ($res->num_rows) {
			while ($row = $res->fetch_assoc()) {
				$n = array(
					'nro' => $row['nro'],
					'nombre' => $row['nombre']
				);

				array_push($nros, $n);
			}

			return json_encode($nros);
		}
	}
}
class AllApi
{
	function getAll()
	{
		$niveles = new NivelesApi();
		$paralelos = new ParalelosApi();
		$nro = new NroCursosApi();

		$all = array(
			"niveles" => json_decode($niveles->getAll()),
			'paralelos' => json_decode($paralelos->getAll()),
			'nro_cursos' => json_decode($nro->getAll())
		);

		return json_encode($all);
	}
}
