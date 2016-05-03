<?php

/*
* Veamos entonces como heredar estas propiedades con un nuevo tipo de vehiculo.
*
* La clase Avión cuenta con un atributo para la cantidad de plazas disponibles en él.
* 
*/

class Avion
{
	private $plazas;

	public function __construct($patente, $origen, $anio, $plazas)
	{
		parent::__construct(($patente, $origen, $anio);

		$this->plazas = $plazas;
	}


}