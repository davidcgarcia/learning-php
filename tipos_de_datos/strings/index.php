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