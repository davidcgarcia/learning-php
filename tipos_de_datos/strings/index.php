<?php

require_once('StrUtils.php');

$srtUtils = new StrUtils();

$texto = '<div class="container" style="font-size: 14px; color: red">
		<p>
			<b>Lorem ipsum dolor</b> sit amet, consectetur adipisicing elit. <p> Dolore recusandae commodi itaque ex </p> dolorem nostrum sapiente pariatur totam voluptate inventore quos nemo, eaque rem nisi quis eius voluptates dicta quaerat.
		</p>	
	</div>';

// Limitamos el texto a 135 caracteres 
$textoLimitado = $srtUtils->cortarStrings($texto, 135);
echo '<h3>Texto completo</h3>';
echo $texto;

echo '<h3>Texto limitado</h3>';
echo $textoLimitado;

echo '<h3>Palíndromos</h3>';

// Definimos algunos elementos de prueba
$palindromos = [
	'Neuquén', 
	'07570', 
	'oso', 
	'radar', 
	'palindromo', 
	'zorro', 
	7
];

for ($i = 0; $i < count($palindromos); $i++) {
	if ($srtUtils->esPalindromo($palindromos[$i])) {
		echo '<h5>' .$palindromos[$i] . ' Es palíndromo</h5>';
	} else {
		echo '<h5>' .$palindromos[$i] . ' No es palíndromo</h5>';
	}

}