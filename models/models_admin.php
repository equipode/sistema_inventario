<?php

class DBConfig
{

	var $host;
	var $user;
	var $pass;
	var $db;
	var $db_link;
	var $conn = false;
	public $error = false;
	public $error_message;
	public $rowsCant;

	public function config()
	{ // class config
		$this->error = true;
	}

	function conexion($host = 'localhost', $user = 'root', $pass = '', $db = 'db_inventario')
	{  // connection function
		$this->error_message = "";
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
		$this->db = $db;
		$this->error_message = "";

		try {
			$this->db_link = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
			$this->db_link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conn = true;
			return $this->db_link;
			echo "ok connect";
		} catch (PDOException $exception) {
			echo $exception->getMessage();
			$this->error_message = $exception->getMessage();
		}
	}

	public function Consultas($Query)
	{
		$this->error_message = "";
		$this->rowsCant = 0;
		$sql = $this->db_link->prepare($Query);
		try {
			if ($sql->execute()) {
				$sql->setFetchMode(PDO::FETCH_ASSOC);
				$records_query = $sql->fetchAll(); //echo json_encode( $sql->fetchAll()  );
				$this->rowsCant = $sql->rowCount();
				if ($sql->rowCount() > 0)
					return $records_query;
				else
					return false;
			} else {
				$this->error_message = "-captura manual del error" . $this->error_message;
				return false;
			}
		} catch (PDOException $exception) {
			$this->error_message = $exception->getMessage();
		}
	}

	function Operaciones($Query)
	{
		$this->error_message = "";
		$sql = $this->db_link->prepare($Query);
		/*$sql = "INSERT INTO mascotas
          (nombre, tipo, raza, edad)
          VALUES
          (:title, :status, :content, :user_id)";
	    bindAllValues($statement, $input);    */
		//$sql->execute();
		try {
			if ($sql->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $exception) {
			$this->error_message = $exception->getMessage();
		}
	}

	function numero_de_filas()
	{
		return $this->rowsCant;
	}

	function close()
	{ // close connection
		if ($this->conn) { // check connection
			$this->db_link = null;
			$this->conn = false;
		}
	}
}//FIN CLASE DATABASE