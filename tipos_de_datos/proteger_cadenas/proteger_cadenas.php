<?php

require_once("../strings/StrUtils.php");

$utils = new StrUtils();

// Simulamos el hash almacenado en la base de datos 
$hash = '59a8b70542b74ae46288d6f9a6d162a9691695a7076074';

// simulamos el ingreso del password ingresado por el usuario 
$pass = '123456';

echo 'Hash almacenado en la base de datos: ' . $hash . '<br>';

echo 'Resultado del ánalisis del hash: <br> <pre>';
$arrHash = $utils->deHash($hash);
print_r($arrHash);
echo '</pre>';

// Cadena a evaluar SALT + PASSWORD
$evaluar = $arrHash['salt'] . $pass;

// Concatenamos la longitud con el resultado de hashear el str con su salt y 
// luego el salt al final

$resultado = $arrHash['longitud'] . hash('sha1', $evaluar) . $arrHash['salt'];
echo '<b>' . $resultado . ' - ' . $hash . '</b><br>';
if ($resultado == $hash) {
	echo "El password es válido";
} else {
	echo "El password no es válido";
}