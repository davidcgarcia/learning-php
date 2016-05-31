<?php

// Verificamos que se haya enviado el formulario 
if (isset($_POST['enviar'])) {
	require('FormValidation.php');

	$formValidation = new FormValidation();

	// Validamos los campos que consideremos obligatorios
	$formValidation->validaTexto($_POST['nombre'], false, false, true, 'Por favor ingrese su nombre');
	$formValidation->validaEmail($_POST['email'], 'Por favor ingrese un email valido');
	$formValidation->validaNumero($_POST['documento_id'], '', 'El campo edad debe contener solo numeros');
	$formValidation->validaTexto($_POST['mensaje'], 1, 500, true, 'Por favor ingrese un mensaje');
	$formValidation->validaFecha($_POST['fecha_nacimiento'], 'La fecha ingresada no es válida');

	// Validamos el archivo 
	$arrExts = ['jpg', 'gif', 'png'];
	$formValidation->validaUpload($_FILES['avatar'], '5000', '', $arrExts, 'El avatar no es valido');

	/** 
	* Vereficamos si hay errores, en caso afirmativo tendremos un array, en caso contrario 
	* devolverá false
	*/

	$errors = $formValidation->getEstado();

	if (count($errors) > 0) {
		foreach ($errors as $error) :
?>
			<ul>
				<li><?= $error; ?></li>
			</ul>
<?php 			
		endforeach;
	}

} else {
	echo 'Hello world';
}
