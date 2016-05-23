<?php

/** 
* Ya tenemos nuestra primera clase creada, que nos permite generar un nuevo 
* objeto, y asignarle un nombre y una descripción para luego obtener los 
* datos mediante un método publico verDatos()
*
*/

/*require('MediosDeTransporte.php');

$medio = new MediosDeTransporte('Avion', 'Transporte que vuela');

$datos = $medio->verDatos();
echo $datos[0].'<br>';
echo $datos[1].'<br>';
*/

require('Buses.php');

$bus = new Buses('Bus BMW', 'Ideal para viajes dentro de la provincia, posee TV con DVD', 'IAP-0232');

$datos = $bus->verBus();
echo $datos[0] . '<br>';
echo $datos[1] . '<br>';
echo $datos[2] . '<br>';
