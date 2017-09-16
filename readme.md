# Laravel PHP Framework

## ¿Por qué Laravel?
Al momento de elegir el Framework PHP, que ibamos a utilizar en la etapa final; nos enfocamos en los que fueran populares, con buena documentacion y con una curva de aprendizaje corta (por los tiempos de la entrega). Con estas caracteristicas en mente y con el objetivo de elegir un Framework PHP que nos sirviera en el futuro, llegamos a tres posibles candidatos: Laravel, Symfony y CodeIgniter. Symfony si bien cumplia las caracteristicas planteadas, por lo que estuvimos investigando tiene una curva de aprendizaje lenta y fue la principal razon por la que no lo elegimos. CodeIgniter que viene ganando popularidad en el mercado, no tiene (al momento) una documentacion y comunidad que nos sintiera seguros al decidir su eleccion. Laravel en cambio, reunia todas las condiciones para realizar la etapa final. Es un Framework bien posicionado en el mercado, tanto por empresas como por desarrolladores. Tiene una muy buena documentacion, como comunidad que brinda informacion. El aprendizaje es bastante sencillo, y el motor de plantillas que utiliza (blade) nos permitia reutilizar practicamente todas las vistas (con ligeros cambios). 

## Documentacion Oficial

La documentacion de Laravel se puede encontrar en: [Laravel Documentacion](http://laravel.com/docs).

## Modulos Reutilizados 
El motor de plantillas, blade, utilizado por Laravel nos permitio realizar todas las vistas. Pudimos conservar los estilos, los JavaScript y librerias utilizadas para las vistas. Tuvimos que hacer ligeros ajustes, por ejemplo: blade accede a las variables {{$variable}} mientras que twig {{variable}}y las estructuras de control cambiaron de {% if %} a @if(). Si bien podriamos haber instalado un plugging para utilizar Twig en Laravel, queriamos aprender a utilizar el motor de plantillas por defecto (para tener la experencia completa).

## Mecanismo de Routing 
Laravel provee un archivo ubicado en: App\Http\routes.php dedicado al manejo de rutas. En las vistas se escribe la url a utilizar en un href (por ejemplo), y en el archivo mencionado se define el metodo de captura de la url con el contralador que brindara servicio a esa peticion.
Por ejemplo:
```
En la vista >>                 <a href="{{url('/productos')}}">PRODUCTOS</a>
En el archivo routes.php >>     Route::get('/productos', 'productosController@mostrarListado')->middleware('adminGestion');
```
## Mecanismo de Seguridad
En este aspecto hay varios puntos a tener consideracion. Para la autenticacion, Laravel provee una clase que permite autenticar a los usuarios. Por ejemplo: Auth::attempt($user) clequea que un usuario se corresponda con su correo, usuario, etc. y su password.
Para verificar si hay una session se utiliza el metodo Auth::guest(). Además se pueden creear middleware, que funcionan como filtros, para chequear el acceso a las url. Los middleware se encuentran en la carpeta App\Http\Middleware. Ejemplo de un Middleware: 
```
  public function handle($request, Closure $next){
        if (Auth::guest()){
          return redirect()->intended('/');
        }
        elseif (Auth::user()->rol_id != 1) {
            return redirect()->intended('/');
        }
        return $next($request);
    }
```
Los middleware se utilizan asignandolos a una ruta en el archivo routes.php. Por ejemplo:  Route::get('/productos', 'productosController@mostrarListado')->middleware('adminGestion');
Para validar los campos de los formularios, Laravel permite la extencion de las Request definiendo reglas para los campos. Estas Request se encuentran en la carpeta: App\Http\Requests. Un ejemplo de request es: 
       
        public function rules()
            {
                return [
                    'usuario' => 'required|max:30', 
                    'password' => 'required|min:6',
                ];
            }

Ademas Laravel permite blindar los parametros en las consultas a la base de datos.

## Mecanismo para CRUD
Laravel permite extender la clase Models, para crear modelos. De esta manera se puede utilizar las tablas como objetos, mediante Eloquent ORM. Facilitando el uso de la base de datos y la realizacion de consultas. Para la insercion se crea una instancia del objeto que queremos utilizar, seteamos su datos con los recibidos de la request y lo salvamos (tan sencillo como eso). Ejemplo de insercion:
```
public function agregar(productoRequest $request)
{
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->stock = $request->stock;
        $producto->stock_minimo = $request->stockMinimo;
        $producto->categoria_id = $request->categoria;
        $producto->proveedor = $request->proveedor;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->descuentaStock = $request->descuenta=='on';
        $producto->fecha_alta = date('Y-m-d');
        $producto->save();
        return redirect('productos');
}
```
Para la actualizacion es bastante parecido. Se recupera el objeto, se setean los datos y se salva. Ejemplo:
```
static public function editar(productoRequest $request)
{
        $producto = Producto::find($request->input('id'));
        $producto->nombre = $request->input('nombre');
        $producto->marca = $request->input('marca');
        $producto->stock = $request->input('stock');
        $producto->stock_minimo = $request->input('stockMinimo');
        $producto->categoria_id = $request->categoria;
        $producto->proveedor = $request->proveedor;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->descuentaStock = $request->descuenta=='on';
        $producto->fecha_alta = date('Y-m-d');
        $producto->save(); 
        return $producto;
}
```
Para el borrado, Laravel provee la eliminacion logica (agregando un campo a la estructuras de las tablas 'deleted_at'). Ejemplo de borrado:
``` 
 public function borrar($id)
 {
        Producto::find($id)->delete();
        return redirect('productos');
 }
```
Por ultimo, un ejemplo de lectura (paginando):
   
    static public function productosOrdenadosporNombre($porPagina){
        return Producto::orderBy('nombre')->paginate($porPagina['valor']);
     }


## Manejando MVC
Las Vistas se encuentran en la carpeta: Resources\views. Los recursos que estas utilizan, como los css, se encuentran en: Public\
Los controladores se encuentran en la carpeta: App\Http\Controllers
Los modelos se encuentran en la carpeta: App\
Las estructuras de las tablas en la carpeta: Database\Migrations
Las rutas: App\Http\routes.php

Cuando se ingresa una URL entra en funcion el archivo de rutas, que es el que redirige al controlador encargado de manejar la solicitud. El controlador, puede o no utilizar un modelo y retorna una vista asociada a la peticion realizada.

## Licencia

El Framework Laravel es de codigo abierto bajo la [MIT licencia](http://opensource.org/licenses/MIT).
