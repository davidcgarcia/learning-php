<?php require("Cliente.php"); ?>

<h2>Ejemplo de utilización del constructor</h2>

<?php
	// Creamos un nuevo objeto y mostramos los datos
	$cliente = new Cliente("Marco", 43526858);

	echo "<pre>";
		print_r($cliente->verCliente());
	echo "</pre>"; 

	// Tambíen podemos destruir el objeto usando la función unset(), y pasandole como parámetro el nombre del objeto.

	unset($cliente);
?>
