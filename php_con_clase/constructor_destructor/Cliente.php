<?php

/*
* Constructor: 
*
* Es invocado al momentto de instanciar la clase desde alguno de nuestros scripts, solo se puede
* definir un método constructor por clase y su uso es opcional; en caso de no encontrarlos definidos.
* PHP utilizará métodos por defecto que ya tiene incorporados.
*
* Destructor:
*
* Nos sirve para eliminar algún objeto, método o atributo, por ejemplo, cerrar la conexión a la base
* de datos en una clase.
*/

class Cliente
{
	private $email;
	private $dni;

	public function __construct($email, $dni)
	{
		$this->email = $email;
		$this->dni = $dni;
	}

	public function __destruct()
	{
		echo $this->dni.' destruido por el método destructor de PHP';
	}

	public function verCliente()
	{
		$datos = [
			$this->email, 
			$this->dni 
		];

		return $datos;
	}

}