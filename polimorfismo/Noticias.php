<?php

/*
* El concepto Polimorfismo en la orientación a objetos implica que dos métodos lleven
* el mismo nombre, pero acepten distintos tipos o número de argumentos, lo que provocaría
* en realiadad que no fueran dos métodos, sino el mismo método, mutado.
*
* PHP, no lo permite, dado que los indentificadores de los métodos son únicos en el ambito de
* de la clase local, sin embargo es posible simular el comportamiento del polimorfismo usando
* la función func_get_args(), que nos permite conocer los parámetros enviados a una función o
* método. De esta forma, podríamos de acuerdo con la cantidad de argumentos recibidos, modificar
* el comportamiento de un método.
*
*/

class Noticias
{

	/*
	* Este método puede no recibir ningún argumento y retornar una noticia al azar O puede recibir como
	* argumento el id de la noticia especifica y retornar una noticia cuyo id pertenezca a la misma. Es
	* una forma simple de emular polimorfismo.
	*
	*/

	public function verNoticia()
	{
		$arrArgs = func_get_arg();

		if (count($arrArgs) == 0) {
			return $this->getNoticiaRandom();
		} else {
			return $this->getNoticiaById($arrArgs[0]);
		}

	}

}