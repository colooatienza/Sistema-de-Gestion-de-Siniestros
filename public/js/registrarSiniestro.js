$(document).ready(
  function(){
   var contador=$('#cantProductos').val();
    $('body').on('click','img.btnAgregar',function(){
        contador++;
        $('#cantProductos').val(parseInt($('#cantProductos').val())+1);
        var nuevoProducto='<p>Objeto '+contador+':</p>    <input type= "text" name="objeto'+contador+'" id="objeto'+contador+'" placeholder="Nombre">  <input type= "number" name="cantidad'+contador+'" id="cantidad'+contador+'" placeholder="Cant." class="cantidad">  <input type= "text" name="descripcion'+contador+'" id="descripcion'+contador+'" placeholder="Descripción" class="descripcion">';

        $( "#descripcion".concat(parseInt($('#cantProductos').val())-1) ).after( nuevoProducto );

    });
});

