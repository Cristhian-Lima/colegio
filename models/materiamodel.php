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
}
