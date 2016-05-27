# VALIDACIÓN DE DATOS SERVER-SIDE

Actualmente, la mayoría de aplicaciones o sitios web reciben gran cantidad de información por parte del usuario: 
personal, para registrarlo en nuestra base de datos, direcciones de e-mail para el envío de un newsletter, o bien
encuestas de satisfación de nuestros clientes. 

La mayoría de las verificaciones o validaciones de la información ingresada por el usuario se realizan de lado 
del cliente `(client-side)` utilizando `JavaScript`. Esto es correcto en cuestiones de usabilidad, ya que nos 
permite informar al usuario respecto de la integridad de los datos ingresados antes de que los envíe y sean 
procesados por el servidor, pudiendo corregirlos y reenviar la información.

Ahora bien, es fundamental realizar también estas validaciones del lado del servidor `(server-side)` para evitar 
que, por ejemplo, si el navegador web no tiene `JavaScript` habilitado recibamos información sin estar normalizada. 
Tomaremos como ejemplo el formulario ubicado en la carpeta **validaciones**.