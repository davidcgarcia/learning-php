<?php

/** 
* Una vez adquiridos los fundamentos del paragdima de la POO, y conociendo los 
* elementos que componen las clases, estamos en condiciones de crear nuestros 
* propios objetos. Comencemos, creando una clase simple a la que iremos agregando
* complejidad durante todo el capítulo, y que nos permitirá manejar los medios de
* transporte de nuestro sitio web. 
*
*/

class MediosDeTransporte 
{
	private $nombre;
	private $descripcion;

	/** 
	* Constructor de la clase
	* 
	* @param $nombre = nombre del medio de transporte
	* @param $descripcion = Descripción del medio de transporte
	*
	* @return void
	*/
	public function __construct($nombre, $descripcion)
	{
		$this->nombre = strtoupper($nombre);
		$this->descripcion = $descripcion;
	}

	/**
	* Obtiene los datos (nombre, descripción)
	*
	* @return array
	* @access public
	*/
	public function verDatos()
	{
		$arr = array($this->nombre, $this->descripcion);
		return $arr;
	}

}
