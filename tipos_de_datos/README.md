### VALIDACIÓN DE DATOS SERVER-SIDE

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

### ARRAYS 

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

### ARRAYS ASOCIATIVOS 

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

### ARRAYS MULTIDIMENSIONALES 

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

### RECUPERANDO TODO EL CONTENIDO 

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

El ejemplo de la clase estará almacenado en la carpeta **arrays** en el archivo **ArrayUtils.php**.

### CORTAR CADENAS EN FORMA ESMERADA 

Continuando con el trabajo sobre diferentes tipos de datos, veremos aquí la aplicación sobre cadenas de 
texto o strings. Puede suceder que necesitemos mostrar una versión reducida de la cadena de texto, por 
ejemplo, en sitios de noticias que muestran una parte del artículo y donde es necesario acceder al interior 
de la nota para leerla completa.

Una forma sencilla de cortar el texto es utilizando la función propia de **PHP** `substr` 

~~~php 
	<?php 
		$texto = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

		// Guardamos en una variable los primeros 135 caracteres 
		$textoLimitado = substr($texto, 0, 135);
		echo '<h3>Versión completa</h3>';
		echo $texto . '...';

		echo '<h3>Versión reducida</h3>'
		echo $textoLimitado . '...';
~~~

El incoveniente de hacerlo de esta forma es la falta de esmero, ya que podríamos cortarlo en medio de una 
palabra o caracteres de puntuación dejando el texto ilegible.

Para realizar esto de manera eficiente veamos el siguiente código **(En la carpeta strings en el archivo StrUtils.php)**.

Al analizar el detalle del código fuente que compone la clase `StrUtils` encontramos el método `cortarStrings()`. 
Dicho método recorre el texto seperándolo por espacios a través de un bucle `foreach`, generando en cada iteración 
una variable **$word** con el contenido de esa porción del texto.

Para cada porción del texto se verifica que no esté vacía (evitando así tener en cuenta dobles espacios o tabs), y 
se suma la longitud de la cadena, utilizando la función `strlen`, a la variable **$total** con el objetivo de 
verificar que ésta no supere la longitud enviada como segundo parámetro al método. Además, se generó una segunda 
variable **$final**, donde se concatenan las palabras hasta el momento del corte.

Por último se comprueba que la longitud acumulada en **$total** no haya superado a la longitud dada en **$longitud**, 
en caso de que esto suceda se da del bucle retornando el valor de **$final**, que contendrá la cadena con la extensión 
solicitada.

El código fuente del ejemplo funcionaría perfecto, pero que sucedería si lo aplicáramos a una cadena de texto que 
contenga tags **HTML**, lo que para **PHP** no serían sino caracteres extra, con la diferencia de que se verían con 
formato cuando el navegador los procesara.

Supongamos que el texto que queremos acortar es el siguiente. 

~~~
	<div class="container" style="font-size: 14px; color: red">
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. <p> Dolore recusandae commodi itaque ex </p> dolorem nostrum sapiente pariatur totam voluptate inventore quos nemo, eaque rem nisi quis eius voluptates dicta quaerat.
		</p>	
	</div>
~~~

Si aplicamos el método `cortarStrings` a esta nueva cadena de texto el resultado será algo parecido a esto: 

~~~ 
	<h3>Texto completo</h3>
		<div class="container" style="font-size: 14px; color: red">
			<p>
				<b>Lorem ipsum dolor</b> sit amet, consectetur adipisicing elit. <p> Dolore recusandae commodi itaque ex </p> dolorem nostrum sapiente pariatur totam voluptate inventore quos nemo, eaque rem nisi quis eius voluptates dicta quaerat.
			</p>	
		</div>
	<h3>Texto limitado</h3> 
	<div class="container" style="font-size: 14px; color: red">
		<p>
			<b>Lorem ipsum dolor</b> sit amet, consectetur adipisicing elit. 
		<p> Dolore recusandae
~~~

Observamos que aplicando el método `cortarStrings` algunas tags `HTML` quedan sin cerrar, lo cual supone un problema 
considerable, generando por ejemplo que un vinculo que también abierto `<a>`. Y al no estar cerrado todo lo que se 
encuentre a partir de este (imágenes, texto o contenedores) lo heredará el vínculo.

### PALÍDROMOS 

Un palíndromo es una frase, palabra o número que se lee igual de adelante hacia atrás o viceversa. También son 
conocidos como capicúas. Algunos ejemplos. 

Neuquén, La ruta natural, No lo cases a Colon, 78787, 07570.

Si ejecutamos el código del método es palíndromo podemos observar que hay algún inconveniente con algunos 
elementos que poseen caracteres especiales o tildes.

Al mommento de evaluar las cadenas para verificar si son idénticas, es decir, si poseen los mismos caracteres en 
ambos sentidos, tenemos que limpiarlas previamente de caracteres especiales, signos de puntuación y espacios. 
También es necesario evaluar la cadena en minúsculas o en mayúsculas, ya que "A", por ejemplo, no es lo mismo que 
el caracter "a".

Para solucionar el incoveniente nombrado anteriormente entonces crearemos el método limpiar cadenas, con acceso 
privado que eliminará tags HTML, espacios, signos de puntuación, tildes y caracteres especiales, dejando a la 
cadena lista para ser evaluada como palíndromo.

### PROTEGER CADENAS DE TEXTO

Actualmente casí todos los foros, sitios web, blogs o aplicaciones cuentan con la posibilida de registrarse por 
parte del usuario, almacenando esta información en una base de datos. Generalmente entre estos datos suele 
encontrarse una contraseña que, lamentablemente los usuarios suelen utilizar no solo en ese sitio, sino también 
en su cuenta de correo electrónico, acceso al banco por internet o mensajería instantánea.

Toda esta información esta resguardada de visitantes malintencionados, pero puede suceder que algún bug permita 
el acceso y deje al descubierto estos datos, entre ellos, la constraseña de nuestros usuarios. Por eso, es 
fundamental prevenirnos manteniendo nuestras aplicaciones actualizadas, si utilizamos software de terceros es 
importante asegurarnos de contar con la última versión. 

De todas formas, en caso de que la información sea accedida por terceros, debemos tener los datos sensibles 
ecriptados. Al referirnos a terceros no solo hablamos de alguien que haya hackeado nuestro sitio web, sino de, 
por ejemplo, los mismos dueños del sitio que no tendrían porque ver la contraseña que el usuario utiliza. 

A la hora de proteger nuestras cadenas de texto o strings se utilizan algoritmos de un solo sentido (one way), es 
decir, que la información no puede volver a su estado original. Para proteger la información se utilizan actualmente 
algoritmos de hashing que generan de manera univoca una clave que hace referencia a un documento, archivo, dato, 
cadena de texto. Entre los más utilizados podemos nombrar **MD5** y **SHA**.

El resultado que se obtiene al comprimir una cadena de texto con una función de hashing se conoce como `HASH`, y 
siempre tendrá la misma cantidad de caracteres una vez encriptado para cualquier cadena original dada. los `hashes` 
en **MD5** siempre tendrán una longitud de 32 caracteres por ejemplo.

Entonces, qué sucederá si almaceno el __password__ de mis usuarios `hasheado`, ¿cómo podré luego certificar que 
el dato que ingresan es el mismo que tengo almacenado? (ciertamente, los usuarios no lo ingresaron encriptado al 
acceder al sitio). Lo que podemos hacer es comparar la clave almacenada en nuestra base de datos con el dato 
ingresado por el usuario, que será protegido mediante el mismo algoritmo usado al momento de almacenar la información 
en la base de datos. Si ambos `hashes` son iguales quiere decir que provienen del mismo `string`.

~~~
<?php 
	// Encriptamos el password del usuario 
	$crypt = md5($_POST['password']);

	// Generamos la consulta SQL 
	$sql = "INSERT INTO usuarios (usuario, password) VALUES ('".$_POST['usuario']."', '".$crypt."')";

	// Ejecutamos la consulta SQL ...
~~~

Como expresamos anteriormente, MD5 es un algoritmo de sentido único, por lo que si la contraseña ingresada es 
123456 su HASH será siempre **e10adc3949ba59abbe56e057f20f883e**.

Existen muchas más alternativas que se pueden utilizar en **PHP**, la lista completa podemos verla imprimiendo 
el resultado de la función `hash_algos()`, que nos devolverá un array con la lista de algoritmos en nuestro 
sistema.

El inconveniente con las funciones de `hasheo` para la protección de contraseñas se proudce porque, aunque el 
resultado no sea reversible, no indica que mediante procesos específicos no pueda obtenerse la cadena original. 

Si el `string` inicial era simplemente alfanumerico y de hasta seis caracteres de longitud (lo que utiliza la 
mayoría de los usuarios como contraseña) no será difícil recuperarlo utilizando una técnica de fuerza bruta 
consistente, en líneas generales, en probar combinaciones hasta encontrar la cadena original completa. También 
existen cientos de sitios web que recopilan `hashes` en lugares conocidos como `rainbow tables`. Podríamos, 
por ejemplo, colocar el `hash` buscando en google para encontrar su origen en minutos. 

Para evitar esta situación, lo ideal es desarrollar políticas para la generación de contraseñas, no permitiendo 
que se utilice el mismo dato que se coloco como apellido o la fecha de nacimiento, forzando el uso de contraseñas 
de más de ocho caracteres. 

Del lado de la programación, produciremos un método para encriptar contraseñas y brindarles mayor seguridad. En 
primer lugar, haremos que nuestro método nos permita elegir el algoritmo de entre los disponibles dentro de 
nuesto sistema. También, podemos utilizar `SHA1`, que tiene una compresión en 160 bits en lugar de 128 como 
`MD5`. Esto lo hace algo más seguro, aunque logicamente ocupará más lugar, 40 caracteres en lugar de 32.

Pero esto no es suficiente para que nuestra información este realmente segura. ya que mediante el uso de una 
técnica conocida como fuerza bruta (brute force) se podría recuperar el contenido original de la cadena probando 
palabras de uno o más diccionarios, combinaciones alfanuméricas, entre otros.

Para superar esta debilidad, aplicaremos una pequeña modificación en nuestro método. Antes de la generación del 
`hash`, obtendremos una cadena de texto predeterminada y aleatoria, generalmente de longitud corta, conocida como 
`salt`. Obviamente deberemos tener también almacenado el `salt` que hayamos usuado para la encriptación, sino no 
podremos verificar si el dato ingresado en el futuro por el usuario es válido.

De todos modos, esto no debería ser un problema, porque como vimos el `hash` siempre tiene la misma longitud. Por 
ejemplo, podríamos generar un `salt` aleatorio de 5 caracteres y colocarlo al inicio o al final del dato guardado, 
de manera que luego separando el texto almacenado, podremos saber qué cadena aleatoria se ha utilizado en la 
encriptación. No hay que olvidar dimensionar el campo de la base de datos para que quepa toda la información, dado 
que ahora no solo almacenaremos el `hash`.