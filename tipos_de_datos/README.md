# VALIDACIÓN DE DATOS SERVER-SIDE

Actualmente, la mayoría de aplicaciones o sitios web reciben gran cantidad de información por parte del usuario: 
personal, para registrarlo en nuestra base de datos, direcciones de e-mail para el envío de un newsletter, o bien
encuestas de satisfación de nuestros clientes. 

La mayoría de las verificaciones o validaciones de la información ingresada por el usuario se realizan de lado 
del cliente `(client-side)` utilizando `JavaScript`. Esto es correcto en cuestiones de usabilidad, ya que nos 
permite informar al usuario respecto de la integridad de los datos ingresados antes de que los envíe y sean 
procesados por el servidor, pudiendo corregirlos y reenviar la información.

Ahora bien, es fundamental realizar también estas validaciones del lado del servidor `(server-side)` para evitar 
que, por ejemplo, si el navegador web no tiene `JavaScript` habilitado recibamos información sin estar normalizada. 
Tomaremos como ejemplo el formulario ubicado en la carpeta **validaciones**.

En el primer ejemplo podemos ver que estamos validando campo por campo, y si bien cumple con el objetivo planteado 
no podemos reutilizarlo. Por otra parte, si alguna regla de negocio cambiara, por ejemplo: solo admitiremos e-mails 
con el dominio de la compañia o el usuario deberá tener una longitud determinada, en cada uno de estos casos deberiamos 
modificar cada archivo de validación de cada formulario. 

Para optimizarlo creamos entonces una clase que nos permitirá validar los datos de acuerdo con las reglas de negocio 
de la aplicación, que puede ser reutilizada por otros formularios de éste u otro proyecto. La clase se encuentra en 
el archivo **FormValidation.php**.

**Feat**: Se añaden nuevas funcionalidades: validación de fechas, validación de subida de archivos y validación 
de cantidad mínima y máxima de caracteres. 

# ARRAYS 

Los `arrays` son uno de los tipos de datos más utilizados en **PHP**, y estan presentes en casí todos los lenguajes 
de programación de la actualidad. Su uso es imprescindible en cualquier desarrollo. El **PHP** tiene gran cantidad de 
`arrays` predefinidos como por ejemplo **$_SERVER**, que contiene la información del servidor web sobre la que corre 
nuestro script; otro `array` de acceso global es **$_COOKIE**, que contiene, como su nombre lo indica, las `cookies` 
disponibles para el dominio actual.

La sintaxis es muy similar a la utilizada en resto de los tipos de datos, pero con diferencias a la hora de recuperar 
el valor, puesto que, como almacena múltiples valores, debemos informar en que posición del `array` se encuentra el 
dato buscado. los `arrays` pueden contener datos de diferentes tipos: `strings`, `enteros`, o `flotantes` entre otros. 
A modo de repaso, veremos en forma sintética, las generalidades de este tipo de dato. La creación de los arrays puede 
hacerse utilizando el constructor `array()`. 

```
<?php 
		// creamos un array de ciudades 
		$arrCiudades = [
			'Cali', 
			'Medellin', 
			'Bogota'
		];

		// Asignamos la posición o el índice manualmente 
		$arrCiudades = [
			0 => 'Cali', 
			1 => 'Medellin', 
			2 => 'Bogota'
		];
```

En el código fuente anterior, podemos ver la creación de dos `arrays`. En un primer caso, dejando que **PHP** asigne 
los índices por nosotros en forma consecutiva, o bien hacerlo nosotros mismos utilizando el formato `[indice] => [valor]`.

Por convención, el primer elemento de un `array` corresponde siempre al índice cero. Si quisiéramos, recuperar la ciudad 
que se encuentra en el índice 1 del `array` de ciudades, simplemente haremos: 

```
	<?php 
		echo $arrCiudades[1];
```

En caso de necesitar agregar elementos a nuestro `$arrCiudades`, podemos realizarlo indicando el número de índice; en 
caso de que la posición ya existe se escribirá sobre el dato. 

```
	<?php 

		$arrCiudades[3] = 'Bucaramanga';
```

También tenemos la posibilidad de sumar más elementos al `array` sin indicar el índice, lo que colocará el nuevo dato 
en nueva posición, al final. 

```
	<?php 
		$arrCiudades[] = 'Pereira';

		// o también podemos hacerlo de esta manera: 
		array_push($arrCiudades, 'Palmira', 'Buga');
```

# ARRAYS ASOCIATIVOS 

En todos los casos anteriores, planteamos `arrays` con índices o claves númericos (estos `arrays` son conocidos como 
escalares). Podemos también utilizar cadenas de texto, es decir, `strings` como índices, en cuyo caso crearemos `arrays` 
asociativos.

```
	<?php 

		$datosPersonales = [
			'nombre'		=> 'Cristhian', 
			'apellido'	=> 'García', 
			'telefono'	=> '7552075',
			'documento'	=> '11205687' 
		];
```

# ARRAYS MULTIDIMENSIONALES 

El último tipo de `array` es el `array` multidimensional o matriz. En este caso, al menos uno de sus elementos será, 
a su vez, un `array`.

```
	<?php 

		$telefonos = [
			'movil'		=> '1552038',
			'fijo'		=> '3802568', 
			'oficina'	=> '6652012'
		];

		$datosPersonales = [
			'nombre'		=> 'Cristhian', 
			'apellido'	=> 'García', 
			'telefonos'	=> $telefonos, 
			'documento'	=> '11205687'
		];

```

Para acceder a los elementos de una matriz usaremos la combinación de ambos índices (númericos o asociativos).

``` 
	<?php 
		echo $datosPersonales['telefono']['movil'];
```

# RECUPERANDO TODO EL CONTENIDO 

Si queremos rápidamente y para hacer debug de nuestro `array`, podemos utilizar la función `print_r`, qué nos 
devolverá todo el contenido en forma legible. Otra alternativa es utilizar `var_dump`, que entregará todo el 
contenido con información adicional, como el tipo de dato que contiene y su longitud.

```
	<?php 

		$telefonos = [
			'movil'		=> '1552038',
			'fijo'		=> '3802568', 
			'oficina'	=> '6652012'
		];

		$datosPersonales = [
			'nombre'		=> 'Cristhian', 
			'apellido'	=> 'García', 
			'telefonos'	=> $telefonos, 
			'documento'	=> '11205687'
		];

		// Mostramos el contenido en pantalla 
		echo '<h1>Utilizamos print_r</h1>';
		echo '<pre>'; print_r($datosPersonales); echo '</pre>';

		echo '<h1>Utilizamos var_dump</h1>';
		echo '<pre>'; var_dump($datosPersonales); echo '</pre>';
```

Otra forma de recuperar todo el contenido es utilizando el bucle `foreach`.

```
	<?php 
		// Recuperamos la información sin necesidad de conocer su clave 
		foreach ($datosPersonales as $val) {
			echo 'Valor: '. $val . '<br>';
		}

		echo '<hr>';

		si queremos recuperar el valor del índice 

		foreach ($datosPersonales as $key => $val) {
			if (is_array($val)) {
				echo 'clave: ' . $key . 'valor: ' . $val . '<br>';
			}
		}
```

Ahora que hicimos un breve repaso de este tipo de dato, comenzaremos a escribir una clase que nos permita 
manipular su contenido o estructura en forma dínamica, y reutilizable para tareas comunes como almacenar 
una lista de países para ser mostradas en un elemento `<select></select>` de un formulario HTML.