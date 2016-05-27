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
			<input type="text" name="text-field" id="text-field">
		</label>
		<p>
			<label>
				Email 
				<input type="text" name="text-field-2" id="text-field-2">
			</label>
		</p>
		<p>
			<label>
			Edad 
			<input type="text" name="text-field-3" id="text-field-3">
			</label>
		</p>
		<p>
			<label>
				Mensaje 
				<textarea name="text-area" id="text-area" cols="45" rows="5"></textarea>
			</label>
		</p>
		<p>
			<label>
				<input type="submit" name="btn-submit" value="Enviar">
			</label>
		</p>
	</form>
</body>
</html>