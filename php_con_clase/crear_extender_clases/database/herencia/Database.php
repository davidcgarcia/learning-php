<?php 

class Database 
{
	/** 
	* Conexión a la base de datos 
	* 
	* @var conexion
	*/
	protected $conexion;

	/** 
	* Servidor en donde se encuentra la base de datos 
	*
	* @var servidor
	*/
	protected $servidor;

	/** 
	* Usuario de la base de datos 
	*
	* @var usuario
	*/
	protected $usuario;

	/** 
	* Contraseña correspondiente a ese usuario
	*
	* @var password
	*/
	protected $password;

	/** 
	* Puerto: por defecto es 3306
	*
	* @var puerto
	*/
	protected $puerto;

	/** 
	* Nombre de la base datos 
	*
	* @var database
	*/
	protected $database;

	/** 
	* Motor de base de datos (MySQL, PostsgreSQL, MsSQL)
	*
	* @var tipo
	*/
	public $tipo;

	/** 
	* Contructor de la clase - obtiene valores de configuración
	*
	* @param Host $servidor
	* @param User $usuario
	* @param Password $password
	* @param Database $database
	* @param Port $puerto
	* @param Type $tipo
	*
	* @return void
	*/
	public function __construct($servidor, $usuario, $password, $database, $puerto, $tipo)
	{
		$this->servidor = $servidor;
		$this->usuario = $usuario;
		$this->password = $password;
		$this->database = $database;
		$this->puerto = (int)$puerto;
		$this->tipo = trim(strtolower($tipo));
	}

	/** 
	* Visualiza la configuración de la base de datos 
	*
	* @return void
	*/
	protected function verConfiguracion() 
	{
		echo $this->servidor.":".$this->puerto."<br>";
		echo $this->usuario."<br>";
		echo $this->database."<br>";
		echo $this->tipo."<br>";
	}

}
