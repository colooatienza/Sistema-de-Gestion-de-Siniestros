$(document).ready(
  function(){
    
   var contador=1;
    
  $("#subcategoria1").change(
    function(){
        var id=$(this).val();         // obtiene el valor del id de la categoría (Bebidas, asd, etc)
        var dataString = 'id='+ id;
        $("#productos1").find('option').remove(); 
        $.ajax({
          type: "GET",
          url: "getProductos/"+id,
          data: dataString,
          cache: false,
          error: function(xhr, status, error) {
  var err = eval("(" + xhr.responseText + ")");
  alert(err.Message);
},
          success: function(html){ //Te ahorras de controlar que tuvo éxito
            $("#productos1").html(html);
          } 
      });
    });


    $("#btnNuevo").click(
    function(){
      contador++;
      $('#cantProductos').val(parseInt($('#cantProductos').val())+1);
      var nuevoProducto='<div id="formProducto'+contador+'" class="formularioProducto"> <button type="button" class="sacar" value="'+contador+'">X</button> <select class="categorias" subid="'+contador+'" required >';

      nuevoProducto+=$("select.categorias").html();
      nuevoProducto+='</select>   <select id="subcategoria'+contador+'" idselect="'+contador+'" class="subcategorias" required>    <option >Seleccione subcategoría</option> </select>  '+
      ' <select name="producto'+contador+'" id="productos'+contador+'" idselect="'+contador+'" class="productos" required>     <option value="">Seleccione producto</option>  </select>  <p>Precio unitario:</p>'+
      '<input type= "number" value="0.00" step="0.01" name="precio'+contador+'" id="precio'+contador+'" class="imputForm">  <p>Cantidad:</p>  <input type="number" value="1" name="cantidad'+contador+'"'+
      'class="imputForm"><br>   </div>';
    //$( "#formProducto" ).clone().appendTo( "#divProductos" );
      $( "#divProductos" ).append( nuevoProducto );

    $("#subcategoria"+contador).change(
    function(){
        var id=$(this).val();         // obtiene el valor del id de la categoría (Bebidas, asd, etc)
        var dataString = 'id='+ id;
        var idselect = "#productos"+$(this).attr('idselect');
        $(idselect).find('option').remove(); 
        $.ajax({
          type: "GET",
          url: "getProductos/"+id,
          data: dataString,
          cache: false,
          error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
          success: function(html){ //Te ahorras de controlar que tuvo éxito
            $(idselect).html(html);
          } 
      });


    });

    });
    $(document).on('click', 'button.sacar', function(){ 
      var id=$(this).val(); 
      $('#formProducto'+id).remove();
      $('#cantProductos').val(parseInt($('#cantProductos').val())-1);
    }); 
    $(document).on('change', 'select.productos', function(){ 
        var idprecio = "#precio"+$(this).attr('idselect');
        var id=$(this).val();         // obtiene el valor del id del producto (Bebidas, asd, etc)
        var dataString = 'id='+ id;
        $.ajax({
          type: "GET",
          url: "getPrecioProducto/"+id,
          data: dataString,
          cache: false,
          error: function(xhr, status, error){
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
          success: function(valor){ 
            $(idprecio).val(valor);
          } 
      });
    }); 
    $(document).on('change', 'select.categorias', function(){ 
      var idsub = "#subcategoria"+$(this).attr('subid');
        var id=$(this).val();         // obtiene el valor del id de la categoría (Bebidas, asd, etc)
        var dataString = 'id='+ id;
        //$("select."+idsub).find('option').remove(); 
        $.ajax({
          type: "GET",
          url: "getSubcategorias/"+id,
          data: dataString,
          cache: false,
          error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
          success: function(html){ //Te ahorras de controlar que tuvo éxito
            $(idsub).html(html);
          } 
    }); 
    });
});
function validar(){
  if(parseInt($('#cantProductos').val())>0)
    return true;
  else{
    alert("Agregue por lo menos un producto a la compra")
    return false;
  }
}

