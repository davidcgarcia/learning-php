<?php 

// Creamos la super clase Fruta

/*class Fruta
{
	private $nombre;

	public function comer()
	{
		echo 'Buen provecho';
	}
}*/

// Creamos la sublcase manzana que hereda de Fruta

/*class Manzana extends Fruta 
{
	public function comer()
	{
		echo 'Que disfrutes tu manzana Newton! ';
	}
}*/

// Ahora utilicemos estas clases para comer una manzana
/*$manzana = new Manzana();
$manzana->comer();*/

// Comamos también una fruta

/*$fruta = new Fruta();
$fruta->comer();*/

/**
* Pensemos este ejemplo en el mundo real: Obtenemos una manzana, la comemos, tiene olor, color y 
* sabor a manzana, ahora bien ¿Su familia padre Fruta a qué tiene sabor? De esta conclusión. surge
* la necesidad de implementar la clase Fruta como abstracta, ya que no tiene sentido su implementación, 
* es decir, la creación de objetos a partir de ella.
*
*/

// Creamos la super clase Fruta 
abstract class Fruta 
{
	private $nombre;

	abstract public function comer();
}

// Creamos la subclase manzana que heredara de Fruta

class Manzana extends Fruta 
{
	public function comer() 
	{
		echo 'Que disfrutes tu manzana Newton!';
	}
}

// Ahora utilicemos esta clase 
$manzana = new Manzana();
$manzana->comer();