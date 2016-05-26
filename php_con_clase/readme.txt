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

Private 

Otorga el nivel de acceso más restritivo, los atributos o métodos que se definan como privados solo serán accesibles desde
dentro de la misma clase. Sin embargo, sí podrán ser accedidos mediante otros métodos públicos que accedan a lo privado, 
previamente definidos dentro de la misma clase. Esta restricción se aplica también a las subclases derivadas: es decir, que 
no se podrá acceder a los elementos de la super clase o clase padre.

Adaptemos, entonces, el ejemplo anterior (en el archivo learning-php/php_con_clase/visibilidad/private) para que no sea posible 
acceder al atributo valor directamente.


AUTOCARGA DE CLASES

Generalmente, todas las clases y subclases de nuestros proyectos son almacenadas en archivos independientes. Esto facilita el 
trabajo en equipos de desarrollo y el mantenimiento del código. pero supone también una gran cantidad de instrucciones require 
o include en el código de nuestra aplicación.

Una de las principales características que se sumaron en la versión 5 de PHP fue la función __autoload, que nos permite cargar 
automáticamente las clases on demand. Esto significa que cuando nuestra aplicación requiera crear objetos o acceder a métodos 
de nuestras clases, buscará el archivo fuente y lo cargará en forma automática.

Otra ventaja de la autocarga de nuestras clases es la seguridad de que solo se cargarán aquellas clases que sean necesarias y que
se utilicen. Es muy común que durante la vida de nuestras aplicaciones aquellas sufran modificaciones o actualizaciones, y queden 
en el código inclusiones de clases en desuso. Incluso para realizar acciones simples cargamos en memoria archivos que no son realmente 
necesarios.

Si bien a simple vista la autocarga de clases parece ser la solución a todos nuestros problemas, puede volverse un dolor de cabeza 
sino se utiliza con precaución, dado que en aplicaciones complejas será ejecutada en muchas oportunidades. Por eso, se sugiera que 
la función __autoload sea lo más simple y liviana posible.

Sugerencia

Pese a que la función __autoload() también puede ser empleada para autocargar clases e interfaces, es preferible utilizar la función 
spl_autoload_register(). Esto es debido a que es una alternativa más flexibe (posibilitando que se pueda especificar cualquier número 
de autocargadores en la aplicación, tales como los de las bibliotecas de terceros). Por esta razón, se desaconseja el uso de __autoload(), 
ya que podría estar obsoleta en el futuro.

Nota:

Antes de 5.3.0, las excepciones lanzadas en la función __autoload() no podían ser capturadas en el bloque catch, resultando en un error fatal. 
Desde 5.3 en adelante, esto es posible simpre que, si se lanza una excepción personalizada, esté disponible la clase de la excepción 
personalizada. La función __autoload() podría utilizarse recursivamente para cargar la clase de excepción personalizada. 

Nota:

La autocarga no está disponible si se utiliza PHP en el modo interactivo CLI. 

Nota:

Si el nombre de la clase se utiliza, por ejemplo, en call_user_func(), este puede contener algunos caracteres peligrosos tales 
como ../. Se recomienda no utilizar la entrada del usuario en tales funciones, o al menos verificar dicha entrada en __autoload(). 

CLASES ABSTRACTAS

Las clases abstractas son aquellas que no pueden ser instanciadas, y se utilizan para definir un modelo de jerarquía. Generalmente, 
sirven de base para otras que luego heredan de la superclase abstracta.

Dentro de este tipo de clases se pueden definir métodos abstractos que no tienen ninguna funcionalidad o implementación, sino 
que simplemente se definen para que luego las subclases los implementen otorgándoles funcionalidad.

ALCANCE DE LAS VARIABLES

El alcance de una variable (scope) determina desde qué contexto del código es accesible cada variable creada. Las variables podrán 
tener acceso local o global, según donde se definan. Aquellas definidas en el cuerpo de nuestro script(fuera de la clase o un método) 
tendrán alcance global, es decir, podrán ser accedidas en cualquier momento de la ejecución. En cambio, aquellas definidas dentro de 
una función solo podrán ser accedidas dentro de la misma función, y desde allí tampoco se podrá acceder a variables externas a ella. 