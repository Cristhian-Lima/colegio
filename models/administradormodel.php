<?php
class AdministradorModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAdministradores()
	{
		$conn = $this->db->connect();

		$res = $conn->query("SELECT cod_admin, nombre_user, correo FROM administrador");

		echo $conn->error;
		return $res;
	}

	public function addAdmin($admin)
	{
		$conn = $this->db->connect();

		$qry_add = "
			INSERT INTO administrador(
				nombre_user, correo, password
			)
			VALUES(
				'{$admin['user']}', '{$admin['email']}', '{$admin['password']}'
			)
		";

		$res = $conn->query($qry_add);

		return $res;
	}
}
