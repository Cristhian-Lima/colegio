<?php

require_once 'libs/database.php';

class Paralelo extends Database
{
	function getParalelos()
	{
		$connection = $this->connect();

		$query = "SELECT nombre_par FROM paralelo";

		$result = $connection->query($query);

		return $result;
	}
}


class Nivel extends Database
{
	function getNiveles()
	{
		$connection = $this->connect();


		$qry = "SELECT * FROM nivel";

		$result = $connection->query($qry);

		return $result;
	}
}

class NroCurso extends Database
{
	function getNroCursos()
	{
		$connection = $this->connect();

		$qry = "SELECT * FROM nro_curso";

		$result = $connection->query($qry);

		return $result;
	}
}
