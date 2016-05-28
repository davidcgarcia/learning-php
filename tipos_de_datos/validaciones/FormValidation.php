<?php 

class FormValidation 
{
	/** 
	* Definimos un array privado donde almacenaremos los errores
	*
	* @var $errors
	*/
	private $errors;

	/** 
	* Validación de textos con espacios o sin ellos 
	*
	* @param $text: texto ingresado por el usuario a través del form 
	* @param $espacios: si es igual a true el texto lleva espacios 
	* @param $mensaje: si existe algún error este mensaje será asignado al atributo $errors
	*
	* @return boolean
	*/

	public function validaTexto($text, $espacios = true, $mensaje) 
	{
		if ($espacios) {
			$res = preg_match("^[A-Za-z0-9\ ]+$", $text);
		} else {
			$res = preg_match("^[A-Za-z0-9]+$", $text);
		}

		if ($res) {
			return true;
		}

		$this->errors[] = $mensaje;
		return false;

	}

	/** 
	* Validación de números 
	*
	* @param $num: número que será validado 
	* @param $mensaje: si existe algún error este mensaje será asignado al atributo $errors
	*
	* @return boolean 
	*/
	public function validaNumero($num, $mensaje) 
	{
		if (is_numeric($num)) {
			return true;
		}

		$this->errors[] = $mensaje;
		return false;
	}

	/** 
	* Validación de direcciones e-mail
	*
	* @param $email: dirección de correo electónico 
	* @param $mensaje: si existe algún error este mensaje será asignado al atributo $errors 
	*
	* @return boolean
	*/
	public function validaEmail($email, $mensaje) 
	{
		$res = preg_match("^[^@ ]+@[^@ ]+\.[^@\.]+$", trim($email));

		if ($res) {
			return true;
		}

		$this->errors[] = $mensaje;
		return false;
	}

	/** 
	* Verifica el estado de la validación 
	*
	* @return boolean: false | array: lista de errores (sí los hay)
	*/
	public function getEstado() 
	{
		if (count($this->errors) >0 ) 
			return $this->errors;

		return false;
	}

}


/** 
* El código anterior nos presenta la clase FormValidation, que por el momento tiene cuatro métodos 
* públicos y una propiedad o atributo $errors de tipo privada, la cual finalmente contendrá un array 
* donde almacenaremos el resultado de las comprobaciones que haga cada una de nuestras funciones.
*
* Cada uno de los tres métodos que realizarán las validaciones admiten el pasaje de un parámetro 
* extra $mensaje, que será luego el que informe al usuario en caso de fallar la validación. Esto 
* nos permite hacer multilenguaje a nuestra clase en caso de que fuera necesario. 
*
* El primer método validaTexto() nos hará posible validar cadebas de texto con la opción de permitir 
* o no espacios de acuerdo con el valor enviado en el parámetro $espacios. Como podemos ver simplemente 
* cambia la expresión regular que se aplicará al validar el string. 
*
* En segundo lugar, tenemos la posibilidad de validar los campos numéricos de nuestro formulario, en 
* este caso simplemente verificamos mediante la función is_numeric si el campo es entero o flotante. 
* Dicha función propia de PHP informa el resultado en formato booleando (true o false).
*
* Por último, validaremos direcciones email utilizando el método validaEmail() de e-mail, donde 
* nuevamente usaremos una expresión regular para verificar el formato correcto de la cadena de texto. 
*
* Como habíamos definido $errors de forma privada solo podrá ser accedido mediante un método público 
* de la clase. Para esto, utilizaremos el método getEstado() que nos informará del resultado de la 
* validación.
* 
* A continuación, en el archivo validaciones.php de este mismo directorio veremos un ejemplo de aplicación 
* de esta clase.
*/