<?php

/**
* Esta clase, tiene un nuevo método público getNumero() que realiza la accion de obtener
* un nuevo número mediante el método privado generar(), y luego retorna el número asignado
* al atributo $valor
*/

class Aleatorio
{
	private $valor; // atributo privado

	public function __construct()
	{
		$this->valor = rand();
	}

	/**
	* Método privado - genera un valor aleatorio entre dos numeros dados por $start, $end
	*
	* @param $start
	* @param $end 
	*
	* @return void
	* @access private
	*/

	private function generar($start, $end)
	{
		if ($end === null) {
			$end = getrandmax();
		}

		$this->valor = rand($start, $end);

	}

	/**
	* Obtiene el número aleatorio
	* 
	* @param $min
	* @param $max 
	*
	* @return $this->valor : integer
	* @access public
	*
	*/

	public function getNumero($min, $max)
	{
		$this->generar($min, $max);
		return $this->valor;
	}

}

// Usamos la clase

$aleatorio = new Aleatorio();

for ($i = 0; $i < 10; $i++) {
	echo $aleatorio->getNumero($i, $i * 10) . '<br>';
}