<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Validaciones</title>
</head>
<body>
	<form id="form1" name="form1" method="post" action="validaciones.php" enctype="multipart/form-data">
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
			Número de documento 
			<input type="text" name="documento_id" id="documento_id">
			</label>
		</p>
		<p>
			<label>
			Fecha de nacimiento 
			<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="dd/mm/YYYY">
			</label>
		</p>
		<p>
			<label>
			Avatar 
			<input type="file" name="avatar" id="avatar">
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