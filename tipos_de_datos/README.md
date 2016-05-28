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

En el primer ejemplo podemos ver que estamos validando campo por campo, y si bien cumple con el objetivo planteado 
no podemos reutilizarlo. Por otra parte, si alguna regla de negocio cambiara, por ejemplo: solo admitiremos e-mails 
con el dominio de la compañia o el usuario deberá tener una longitud determinada, en cada uno de estos casos deberiamos 
modificar cada archivo de validación de cada formulario. 

Para optimizarlo creamos entonces una clase que nos permitirá validar los datos de acuerdo con las reglas de negocio 
de la aplicación, que puede ser reutilizada por otros formularios de éste u otro proyecto. La clase se encuentra en 
el archivo **FormValidation.php**