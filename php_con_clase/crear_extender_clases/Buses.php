<?php

require('MediosDeTransporte.php');

/** 
* Ahora bien, hablamos anteriormente de la herencia, veamos cómo aplicarlo a 
* nuestra clase MediosDeTrasporte generando una subclase para manejar un tipo
* de medio de transporte, los Buses de pasajeros, heredado de nuestra superclase
* original.
*
*/


class Buses extends MediosDeTransporte
{
	private $patente;

	/**
	* Constructor de la clase - hereda nombre y descripción del medio de transporte
	*
	* @param string $nombre
	* @param $string $descripcion
	* @param string $patente
	* 
	* @return void
	* @access public
	* 
	*/
	public function __construct($nombre, $descripcion, $patente)
	{
		parent::__construct($nombre, $descripcion);
		$this->patente = $patente; 
	}

	/** 
	* Obtiene el bus y hereda el método verDatos de la clase MediosDeTransporte
	*
	* @return array
	* @access public 
	*
	*/
	public function verBus()
	{
		$arr = parent::verDatos();
		$arr[] = $this->patente;

		return $arr;
	}

}
