<?php

/*
* Como observamos, la clase cuenta con tres atributos privados, un método constructor
* que permite inicializar la clase sobre la base de estos tres atributos y un método
* que nos informa la patente del objeto inicializado.
*
*/

class Vehiculo 
{
	private $patente;
	private $origen;
	private $anio;


	public function __construct($patente, $origen, $anio)
	{
		$this->patente = $patente;
		$this->origen = $origen;
		$this->anio = $anio;
	}

	public function verPatente()
	{
		return $this->patente;
	}


}