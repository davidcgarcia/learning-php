<?php

// Encriptamos la contraseña proporcionada por el usuario 
$crypt = md5($_POST['password']);
echo $crypt.'<br>';
echo '<h3>Lista de hashes</h3><pre>'; print_r(hash_algos()); echo '</pre>';