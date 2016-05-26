<?php 

require('Database.php');

class MySQL extends Database 
{

	/**
	* Constructor de la clase - Obtiene los valores de configuración de la clase padre 
	* y se conecta a la base de datos.
	*
	* @param Host $servidor
	* @param User $usuario
	* @param Password $password
	* @param Database $database
	* @param Port $puerto
	*
	* @return Response
	*/
	public function __construct($servidor, $usuario, $password, $database, $puerto = 3306) 
	{
		parent::__construct($servidor, $usuario, $password, $database, $puerto, 'mysql');

		$this->conexion = mysqli_connect($this->servidor.":".$this->puerto, $this->usuario, $this->password);
		mysqli_select_db($this->conexion, $this->database);
	}

	/**
	* Cierra la conexión a la base de datos
	*
	*/
	public function __destruct() 
	{
		mysqli_close($this->conexion);
	}

	/** 
	* Establece una consulta SQL a la base de datos 
	* 
	* @param Query $query
	* @return string 
	*/
	public function setQuery($query) 
	{
		$query = mysql_real_escape_string($query);
		return $this->idConsulta = mysqli_query($this->conexion, $query);
	}

	/**
	* Establece el query en un array 
	*
	* @return array
	*/
	public function queryToArray() 
	{
		return mysqli_fetch_assoc($this->idConsulta);
	}

	/** 
	* Visualiza la configuración de la conexión a la base de datos
	*
	* @return void
	*/
	public function verConfiguracion() 
	{
		parent::verConfiguracion();
	}

}
