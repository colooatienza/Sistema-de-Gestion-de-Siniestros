$(document).ready(function(){
  $("#categorias").change(
    function(){
        var id=$(this).val();         // obtiene el valor del id de la categoría (Bebidas, asd, etc)
        var dataString = 'id='+ id;
        $("#categoriasHija").find('option').remove(); 
        $.ajax({
          type: "GET",
          url: "getSubcategorias/"+id,
          data: dataString,
          cache: false,
          error: function(xhr, status, error) {
                    //var err = eval("(" + xhr.responseText + ")");
                    alert(error);
                  },
          success: function(html){
            $("#categoriasHija").html(html);
          } 
      });
    });

  

});

