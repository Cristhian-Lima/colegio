<?php
class MateriaModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	function materias()
	{
		$conn = $this->db->connect();

		$qry_materia = "SELECT * FROM materia";
		$res = $conn->query($qry_materia);

		if (!$res) {
			echo $conn->error;
		}
		return $res;
	}

	public function addMateria($materia)
	{
		$conn = $this->db->connect();

		$qry_add = "
			INSERT INTO materia
			VALUES(
				'{$materia['cod']}',
				'{$materia['nombre']}'
			)
		";

		$res = $conn->query($qry_add);

		if (!$res) {
			//echo $conn->error;
			return false;
		}
		return $res;
	}
}
