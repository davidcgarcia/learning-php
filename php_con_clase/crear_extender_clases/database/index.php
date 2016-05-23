<?php 

// Utilizamos la clase

require('Database.php');

$database = new Database('localhost', 'root', 'L4r4v3l*.*2016', 'prueba', '3306', 'mysql');
$database->setQuery('SELECT * FROM usuarios');
$database->__destruct();

echo '<pre>';
	print_r($database->queryToArray());
echo '</pre>';