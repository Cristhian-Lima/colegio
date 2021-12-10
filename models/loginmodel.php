<?php
class LoginModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function verificarAdmin($correo, $pass)
	{
		$conn = $this->db->connect();

		$admin = "SELECT * FROM administrador WHERE correo='$correo' AND password='$pass'";

		$res_admin = $conn->query($admin);

		return $res_admin;
	}
}
