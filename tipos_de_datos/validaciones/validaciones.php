<?php

// Verificamos que se haya enviado el formulario 
if (isset($_POST['enviar'])) {
	require('FormValidation.php');

	$formValidation = new FormValidation();

	// Validamos los campos que consideremos obligatorios
	$formValidation->validaTexto($_POST['nombre'], true, 'Por favor ingrese su nombre');
	$formValidation->validaEmail($_POST['email'], 'Por favor ingrese un email valido');
	$formValidation->validaNumero($_POST['edad'], 'El campo edad debe contener solo numeros');
	$formValidation->validaTexto($_POST['mensaje'], true, 'Por favor ingrese un mensaje');

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
