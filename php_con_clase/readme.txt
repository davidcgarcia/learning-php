VISIBILIDAD:

Al igual que otros lenguajes de programación orientados a objetos como Java, PHP 5 incorpora modificadores
de acceso a los métodos y propiedades de las clases. Estas caracteristicas dan sustento al principio de 
encasuplamiento que nos permite el uso de variables y métodos internos a un objeto, limitando y protegiendo su
acceso. Existen tres grados de visibilidad: pública (public), privada (private) y protegida (protected).

Public

Es el modificador más permisivo e indica que el método o atributo que se aplique este nivel de visibilidad 
podrá ser visualizado o editado por cualquier otro elemento de nuestro programa. Éste es el nivel de visibilidad 
que tomarán por defecto las propiedades o métodos que no tengan un definido, sin embargo no se aconseja que los 
atributos o métodos no tengan un modificador de acceso definido.

A continuación (en el directorio learning-php/php_con_clase/visibilidad/public) veremos uun ejemplo de métodos 
y propiedades públicas donde tendremos un atributo $valor que almacenará un valor aleatorio, y el método generar() 
que nos permitirá obtener un nuevo valor para un intervalo dado (opcional).