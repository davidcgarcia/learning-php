<?php

/** 
* Veamos ahora la forma clásica de hacerlo: 
*/

// Definimos una variable donde almacenaremos el mensaje de error 

$mensaje = '';
$esValido = true;

// Verificamos que no haya variables vacías que sean requeridas 

if (trim($_POST['text-field']) == '') {
	$mensaje .= 'El nombre no puede estar vacío \n';
	$esValido = true;
} 

if (trim($_POST['text-field-2']) == '' || !ereg('^([a-zA-z0-9\._]+)\@([a-zA-Z0-9\.-]+)\.([a-zA-Z]{2,4})', trim($_POST['text-field-2']))) {
 $mensaje .= 'El email no puede estar vacío o no es válido \n';
 $esValido = false;
}

if (trim($_POST['text-field-3'] == '' || $_POST['text-field-3'] == 0) ) {
	$mensaje .= 'La edad no puede estar vacía \n';
	$esValido = false;
}

if (trim($_POST['text-area']) == '') {
	$mensaje .= 'El mensaje no puede estar vacío \n';
	$esValido = false;
}

if (!$esValido) {
?>
	<script>
		alert('<?= $mensaje ?>');
	</script>
<?php
} else {
	// procesamos el formulario
}