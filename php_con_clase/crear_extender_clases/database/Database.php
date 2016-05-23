<?php

class Database 
{

	private $conexion;
	private $servidor;
	private $usuario;
	private $password;
	private $puerto;
	private $database;
	public $tipo;
	private $idConsulta;

	/** 
	* Constructor de la clase - crea la conexión a la base de datos según el motor 
	* de base de datos que se requiere utilizar (mysql - mssql)
	* 
	* @param string $servidor : Lugar donde esta alojada la Base de datos
	* @param string $usuario : Usuario de la base de datos
	* @param string $password : Contraseña correspondiente al usuario
	* @param string $database : Nombre de la base de datos a la cual nos vamos a conectar
	* @param string cast to int $puerto : Puerto 
	* @param string $tipo : Motor de base de datos
	*
	* @return void
	* @access public 
	* 
	*/
	public function __construct($servidor, $usuario, $password, $database, $puerto, $tipo='mysql')
	{
		$this->servidor = $servidor;
		$this->usuario = $usuario;
		$this->password = $password;
		$this->database = $database;
		$this->puerto = (int)$puerto;
		/** 
		* trim — Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
		* strtolower — Convierte una cadena a minúsculas
		*
		*/

		$this->tipo = trim(strtolower($tipo));

		if ($this->tipo == 'mysql') {
			$this->conexion = mysqli_connect($this->servidor.":".$this->puerto, $this->usuario, $this->password);
			mysqli_select_db($this->conexion, $this->database);
		}

		if ($this->tipo == 'mssql') {
			$this->conexion = mssqli_connect($this->servidor.":".$this->puerto, $this->usuario, $this->password);
			mssqli_select_db($this->database);
		}

	}

	/** 
	* Destructor de la clase - Cierra la conexión a la base de datos 
	*
	* @return void
	* @access public
	*
	*/
	public function __destruct() 
	{
		if ($this->tipo == 'mysql') {
			mysqli_close($this->conexion);
		}

		if ($this->tipo == 'mssql') {
			mssqli_close($this->conexion);
		}
	}

	/** 
	* Ejecuta una consulta sql 
	*
	* @param string $query : sentencia SQL 
	*
	* @return string $query
	* @access public
	*
	*/
	public function setQuery($query)
	{
		if ($this->tipo == 'mysql') {
			$query = mysqli_real_escape_string($this->conexion, $query);

			return $this->idConsulta = mysqli_query($this->conexion, $query);
		}

		/** 
		* Advertencia: La función mssql_query fue removida en PHP 7.0.0
		* Las alternativas son: 
		*
		* PDO:query()
		* sqlsrv_query()
		* odbc_query()
		*
		*/
		if ($this->tipo == 'mssql') {
			$query = str_replace("'", "''", $query);

			return $this->idConsulta = mssqli_query($query);
		}
	}

	/** 
	* Retorna un query en un array 
	*
	* @return array 
	* @access public
	*
	*/
	public function queryToArray()
	{
		if ($this->tipo == 'mysql') {
			return mysqli_fetch_assoc($this->idConsulta);
		}

		if ($this->tipo == 'mssql') {
			return mssqli_fetch_assoc($this->idConsulta);
		}
	}

}
