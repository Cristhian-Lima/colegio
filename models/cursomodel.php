<?php
class CursoModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getCursoParalelo($nivel, $curso, $paralelo)
	{
		$conn = $this->db->connect();

		$paralelo = strtolower($paralelo[0]); // a minsucula y soolo obtiene la primera letra

		$nivel = $nivel[0];
		if ($nivel == 'i') {
			$nivel = 'n';
			$curso = '';
		}

		$qry_primaria = "SELECT * FROM estudiante WHERE cod_curso like 'c-$nivel$curso$paralelo'";

		$res = $conn->query($qry_primaria);

		return $res;
	}
	//function getCurso($nivel, $curso)
	//{
	//$conn = $this->db->connect();
	//$nivel = $nivel[0];

	//if ($nivel == 'i') {
	//$nivel = 'n';
	//$curso = '';
	//}

	//$qry = "SELECT * FROM estudiante WHERE cod_curso LIKE 'c-$nivel$curso%'";

	//$res = $conn->query($qry);

	//return $res;
	//}
}
