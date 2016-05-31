<?php 

/** 
* Utilicemos los métodos de nuestra clase en el $arrCiudades 
*/

$arrCiudades = [
	'Cali', 
	'Medellin',
	'Bucaramanga', 
	'Pereira',
	'Bogota', 
	'Palmira', 
	'Cucuta'
];

require_once('ArrayUtils.php');

$arrayUtils = new ArrayUtils();


// agregamos algunos elementos a nuestro array 
$arrayUtils->agregarElemento('Buga');
$arrayUtils->agregarElemento('Santander');
$arrayUtils->agregarElemento('Tulua');
$arrayUtils->agregarElemento('Popayan');

// Mostramos el contenido inicial del array 
echo '<h3>Contenido inicial del array</h3>';
echo '<pre>';
	print_r($arrayUtils->verArray());
echo '</pre>';

// Eliminamos el elemento en la posicion 3
$arrayUtils->eliminarElemento(3);

// Volvemos a mostrar el contenido del array 
echo '<h3>Eliminamos el elemento en la posición 3</h3>';
echo '<pre>';
	print_r($arrayUtils->verArray());
echo '</pre>';

// Indicamos la dirección y ordenamos el array 
$arrayUtils->setOrden('', 'DESC');
$arrayUtils->ordenar();

echo '<h3>Finalmente el array quedó ordenado en forma descendente</h3>';
echo '<pre>';
	print_r($arrayUtils->verArray());
echo '</pre>';