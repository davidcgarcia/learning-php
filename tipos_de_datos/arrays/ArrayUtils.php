<?php 

class ArrayUtils 
{
	/** 
	* Almacenaremos el array al momento de construir la clase 
	*
	* @var $arr
	*/
	private $arr;

	/** 
	* Almacenaremos el orden del array 
	*
	* @var $orden
	*/
	private $orden;

	/** 
	* Constructor de la clase - castea el parámetro a un array obligatoriamente
	*
	* @param $arr 
	*
	* @return void
	*/
	public function __construct($arr) 
	{
		$this->arr = (array)$arr;
	}

	/** 
	* Permite sumar un elemento al array indicando un indice númerico o asociativo.
	* En caso de no definirse el índice, ya que es un parámetro opcional, se 
	* agregará el elemento al final del array.
	*
	* @param $valor: valor que se desea agregar al array 
	* @param $indice: [opcional] - númerico (int) o asociativo (string)
	*
	* @return void
	*/

	public function agregarElemento($valor, $indice = false) 
	{
		if (!$indice) {
			$this->arr[] = $valor;
		} else {
			if (is_int($indice)) {
				$this->arr[(int)$indice] = $valor;
			} else {
				$this->arr[(string)$indice] = $valor;
			}
		}
	}

	/** 
	* Espera el índice con la posición del elemento que se quiere eliminar, o la 
	* clave en caso de un array asociativo. Es importante tener en cuenta que al 
	* utilizar la función unset no se resetean los índices numéricos, lo que si 
	* sucederá si utilizáramos array_splice.
	*
	* @param $indice: indice de la posicion que se quiere eliminar 
	*
	* @return boolean
	*/
	public function eliminarElemento($indice)
	{
		if (is_int($indice)) {
			if (isset($this->arr[(int)$indice])) {
				unset($this->arr[(int)$indice]);

				return true;
			} else {
				return false;
			}
		} else {
			if (isset($this->arr[(string)$indice])) {
				unset($this->arr[(string)$indice]);

				return true;
			} else {
				return false;
			}
		}
	}
	/** 
	* Establece el orden en el cual se quiere ordenar el array 
	*
	* @param $indice: indice del array $this->orden[]
	* @param $direccion: en la cual se quiere ordenar el array 
	* 
	* @return void
	*/
	public function setOrden($indice = '', $direccion = 'ASC') 
	{

		$this->orden['indice'] = $indice;
		$this->orden['direccion'] = $direccion;

	}

	/** 
	* Ordena el array $this->arr en forma ascendente o descendente 
	*
	*/
	public function ordenar() 
	{
		if ($this->orden['direccion'] == 'ASC') {
			usort($this->arr, array($this, 'cmpAsp'));
		} else {
			usort($this->arr, array($this, 'cmpDesc'));
		}
	}

	/** 
	* Comparación de strings (array1, array2) y organiza los mismos en forma 
	* Ascendente
	*
	* @param $a: primer array incluyendo el índice 
	* @param $b: segundo array incluyendo el índice 
	*
	* @return array asc
	*/
	private function cmpAsc($a, $b) 
	{
		return strcmp($a[$this->orden['indice']], $b[$this->orden['indice']]);
	}

	/** 
	* Comparación de strings (array1, array2) y organiza los mismos en forma 
	* Descendente
	*
	* @param $a: primer array incluyendo el índice 
	* @param $b: segundo array incluyendo el índice 
	*
	* @return array desc
	*/
	private function cmpDesc($a, $b) 
	{
		return strcmp($b[$this->orden['indice']], $a[$this->orden['indice']]);
	}

	/** 
	* Actua como destructor de la clase - elimina todos elementos del array 
	*
	* @return void
	*/
	public function vaciarArray() 
	{
		$this->arr = array();
		$this->orden = array();
	}

	/** 
	* Permite acceder al contenido del atributo privado $arr 
	*/
	public function verArray() 
	{
		return $this->arr;
	}

}
