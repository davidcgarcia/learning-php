<?php

require_once('StrUtils.php');

$srtUtils = new StrUtils();

$texto = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum';

// Limitamos el texto a 135 caracteres 
$textoLimitado = $srtUtils->cortarStrings($texto, 135);
echo '<h3>Texto completo</h3>';
echo $texto;

echo '<h3>Texto limitado</h3>';
echo $textoLimitado;