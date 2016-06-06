<?php

// Encriptamos la contraseña proporcionada por el usuario 
$crypt = md5($_POST['password']);
echo $crypt;