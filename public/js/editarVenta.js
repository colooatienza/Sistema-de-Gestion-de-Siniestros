$(document).ready(
  function(){
   var contador=$('#cantProductos').val();
    $("select.categorias").change(
    function(){
        var idsub = "#subcategoria"+$(this).attr('subid');
        var id=$(this).val();         // obtiene el valor del id de la categoría (Bebidas, asd, etc)
        var dataString = 'id='+ id;
        //$("select."+idsub).find('option').remove(); 
        $.ajax({
          type: "POST",
          url: "./models/getSubcategorias.php",
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
    }
    );
  $("#subcategoria0").change(
    function(){
        var id=$(this).val();         // obtiene el valor del id de la categoría (Bebidas, asd, etc)
        var dataString = 'id='+ id;
        $("#productos0").find('option').remove(); 
        $.ajax({
          type: "POST",
          url: "./models/getProductos.php",
          data: dataString,
          cache: false,
          error: function(xhr, status, error) {
  var err = eval("(" + xhr.responseText + ")");
  alert(err.Message);
},
          success: function(html){ //Te ahorras de controlar que tuvo éxito
            $("#productos0").html(html);
          } 
      });
    });


    $("#btnNuevo").click(
    function(){
      contador++;
      $('#cantProductos').val(parseInt($('#cantProductos').val())+1);
      var nuevoProducto='<div id="formProducto'+contador+'" class="formularioProducto"><button type="button" class="sacar" value="'+contador+'">X</button>  <select class="categorias" subid="'+contador+'" required >';

      nuevoProducto+=$("select.categorias").html();
      nuevoProducto+='</select> <br/><br/>  <select id="subcategoria'+contador+'" idselect="'+contador+'" class="subcategorias" required>    <option >Seleccione subcategoría</option> </select>  '+
      '<br/><br/> <select name="producto'+contador+'" id="productos'+contador+'" idselect="'+contador+'" class="productos" required>     <option>Seleccione producto</option>  </select> <br/><br/> <p>Precio unitario:</p>'+
      '<input type= "number" value="0.00" step="0.01" name="precio'+contador+'" id="precio'+contador+'" class="imputForm">  <p>Cantidad:</p>  <input type="number" value="1" name="cantidad'+contador+'"'+
      'class="imputForm"><br>   <input type="hidden" name="accion'+contador+'" id="accion'+contador+'" value="agregar">  </div>';

      $( "#divProductos" ).append( nuevoProducto );
      $("select.categorias").change(
    function(){
        var idsub = "#subcategoria"+$(this).attr('subid');
        var id=$(this).val();         // obtiene el valor del id de la categoría (Bebidas, asd, etc)
        var dataString = 'id='+ id;
        //$("select."+idsub).find('option').remove(); 
        $.ajax({
          type: "POST",
          url: "./models/getSubcategorias.php",
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
    }
    );
    $("#subcategoria"+contador).change(
    function(){
        var id=$(this).val();         // obtiene el valor del id de la categoría (Bebidas, asd, etc)
        var dataString = 'id='+ id;
        var idselect = "#productos"+$(this).attr('idselect');
        $(idselect).find('option').remove(); 
        $.ajax({
          type: "POST",
          url: "./models/getProductos.php",
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
      $(document).on('change', 'select.productos', function(){ 
        var idprecio = "#precio"+$(this).attr('idselect');
        var id=$(this).val();         // obtiene el valor del id del producto (Bebidas, asd, etc)
        var dataString = 'id='+ id;
        $.ajax({
          type: "POST",
          url: "./models/getPrecioProducto.php",
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
    $(document).on('click', 'button.sacar', function(){ 
      var id=$(this).val();    
      alert($('#accion'+id).val());   
      if($('#accion'+id).val()=='agregar'){
        alert("no hay que eliminar")
        $('#formProducto'+id).remove();
        $('#cantProductos').val(parseInt($('#cantProductos').val())-1);
      }
      else{
        alert("hay que eliminar")
        $('#formProducto'+id).css("display","none");
        $('#accion'+id).val("eliminar");
      }
    }); 
});

