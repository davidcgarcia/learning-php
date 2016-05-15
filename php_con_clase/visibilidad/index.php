<?php

class Aleatorio
{
	public $valor; // Atributo público de la clase

	/**
	* Método constructor público de la clase
	* 
	*/

	public function __construct()
	{
		$this->valor = rand();
	}

	/**
	* Método público de la clase - genera un número aleatorio
	* entre un rango dado por start & $end
	*/

	public function generar($start = 0, $end = null)
	{
		if ($end === null) {
			$end = getrandmax();
		}

		$this->valor = rand($start, $end);
	}

}

// usamos la clase 
$aleatorio = new Aleatorio();

for ($i = 1; $i <= 10; $i++) {
	$aleatorio->generar($i, $i * 10);
	echo 'La clase aleatorio ha generado este número random: ' .$aleatorio->valor . '<br>';
}