<?php

require_once("../strings/StrUtils.php");
// Encriptamos la contraseña proporcionada por el usuario 
$crypt = md5($_POST['password']);
echo $crypt.'<br>';

$utils = new StrUtils();

$pass = '123456';
$arrAlgoritmos = hash_algos();

echo "Cadena Original ". $pass . "<br>";

for ($i = 0; $i < count($arrAlgoritmos); $i++) {
	echo 'Cadena <b>'. $arrAlgoritmos[$i] . "</b>: ". $utils->encodeString($pass, $arrAlgoritmos[$i]) . "<br>";
}