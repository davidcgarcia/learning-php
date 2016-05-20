<?php

function __autoload($class = 'index') {
	//Definimos el directorio de nuestras clases y el sufijo 

	$file = '../visibilidad/private/'.$class.'.php';

	// Limpiamos el cache para asegurarnos de incluir la última versión de la clase 
	clearstatcache();

	// Verificamos si existe el archivo y si se puede acceder a él, y lo incluimos 

	if (file_exists($file)) {
		require_once $file;
	}
}