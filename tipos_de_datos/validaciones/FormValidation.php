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
	* Validación de textos con espacios o sin ellos, posibilidad de enviar longitud 
	* mínima y máxima de la cadena de texto.
	*
	* @param $text: texto ingresado por el usuario a través del form 
	* @param $min: longitud mínima de caracteres 
	* @param $max: longitud máxima de caracteres 
	* @param $espacios: si es igual a true el texto lleva espacios 
	* @param $mensaje: si existe algún error este mensaje será asignado al atributo $errors
	*
	* @return boolean
	*/

	public function validaTexto($text, $min = false, $max = false, $espacios = true, $mensaje) 
	{
		if (!empty($min)) {
			if (strlen($text) < $min) {
				$this->errors[] = $mensaje;
				return false;
			}
		}

		if (!empty($max)) {
			if (strlen($text) > $max) {
				$this->errors[] = $mensaje;
				return false;
			} 
		}

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
	public function validaNumero($num, $min = false, $max = false, $mensaje) 
	{
		if (is_numeric($num)) {
			if ($num < $min || $num > $max) {
				$this->errors[] = $mensaje;
				return false;
			} else {
				return true;
			}
		}

		$this->errors[] = $mensaje;
		return false;
	}

	/** 
	* Validación de fechas 
	*
	* @param $fecha
	* @param $mensaje: si existe algún error este mensaje será asignado al atributo $errors
	*
	* @return boolean
	*/
	public function validaFecha($fecha, $mensaje)
	{
		if (($ts = strtotime($fecha)) === false) {
			$this->errors[] = $mensaje;
			return false;
		}

		return true;
	}

	/** 
	* Validación de subida de archivos 
	*
	* @param $file: Archivo que se debe validar 
	* @param $max: Peso máximo del archivo 
	* @param $min: Peso mínimo del archivo 
	* @param $exts: Tipo de archivo (png || jpg || jpeg)
	* @param $mensaje: si existe algún error este mensaje será asignado al atributo $errors
	*
	* @return boolean 
	*/
	public function validaUpload($file, $max = false, $min = false, $exts, $mensaje)
	{
		// Validamos el peso del archivo: en bytes 
		if ($max) {
			if ($file['size'] > $max) {
				$this->errors[] = $mensaje;
				return false;
			}
		}

		/**
		* Validamos la extensión del archivo 
		* El parámetro $exts contendrá en un array las extensiones permitidas para 
		* luego utilizando la función in_array(), verificar si se encuentra habilitada 
		*
		*/
		if (!empty($exts)) {
			$ext = explode('.', basename(strtolower(trim($file['name']))));

			if (in_array($ext[count($ext) - 1], $exts)) {
				$this->errors[] = $mensaje;
				return false;
			}
		}
		
		return true;
	}

	/** 
	* Validación de direcciones e-mail
	*
	* @param $email: dirección de correo electónico 
	* @param $mensaje: si existe algún error este mensaje será asignado al atributo $errors 
	*
	* @return boolean
	*/
	public function validaEmail($email, $dominio, $mensaje) 
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
*
* Feat: Se añaden nuevas funcionalidades: validación de fechas, validación de subida de archivos y validación 
* de cantidad mínima y máxima de caracteres. 
*
* De esta manera, nuestra clase posee ahora una mayor funcionalidad y eficencia. 
* 
* Encontramos cambios en los métodos cuya implementación podemos verla comentada en el código fuente, 
* y sumamos dos nuevos métodos: uno, validaFecha cuyo comportamiento consiste en, utilizando la función 
* strtotime, convertir a formato Unix Timestamp(la cantidad de segundos que transcurrieron desde 01/01/1970 
* a las 00:00 horas) respecto de la fecha y hora actual.
*
* El resultado es evaluado verificando si la respuesta es false, en cuyo caso el string no tenía un formato 
* de fecha valido o bien pudo devolver un número entero si pudo verificarlo.
*
* Existe una curiosidad respecto a la conversión de cadenas a fechas en formato Unix Timestamp, utilizando 
* utilizando strtotime o en otros lenguajes de programacón mediante otras funciones, ya que esta tiene fecha 
* de vencimiento: 19 de enero de 2038 a las 03:14:47. Luego de esta fecha, la conversión informará como resul-
* tados en numeros negativos, generando múltiples cálculos erróneos. 
*
* El segundo método nuevo que estudiaremos en el código fuente es validaUpload, destinado a verificar los archivos 
* que sean enviados desde el formulario. El método permite comprobar el tamaño del archivo contra un tamaño 
* máximo definido, y que contenga una extensión válida, para lo cual debemos enviar como parámetro un array de 
* extensiones.
*
* El PHP nos informará el tamaño o peso del archivo subido en la componente size del array $_FILES en bytes 
* (1024 bytes = 1KB). En consecuencia, cualquier comparación debe efectuarse entre la misma unidad de medida. 
*
* Notese que al momento de extraer la extensión utilizando explode y basename se aplica al nombre del archivo 
* strtolower y trim a fin de eliminar los espacios y considerar la cadena en minúscula. En caso de no hacerlo 
* el archivo imagen.JPG será distinto de imagen.jpg, y deberíamos en el array establecer las extensiones en 
* minúsculas y en mayúscula(jpg, JPG, png, PNG).
*/