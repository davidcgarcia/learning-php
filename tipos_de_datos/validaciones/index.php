<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Validaciones</title>
</head>
<body>
	<form id="form1" name="form1" method="post" action="validaciones.php">
		<label>
			Nombre 
			<input type="text" name="nombre" id="nombre">
		</label>
		<p>
			<label>
				Email 
				<input type="text" name="email" id="email">
			</label>
		</p>
		<p>
			<label>
			Edad 
			<input type="text" name="edad" id="edad">
			</label>
		</p>
		<p>
			<label>
				Mensaje 
				<textarea name="mensaje" id="mensaje" cols="45" rows="5"></textarea>
			</label>
		</p>
		<p>
			<label>
				<input type="submit" name="enviar" value="Enviar">
			</label>
		</p>
	</form>
</body>
</html>