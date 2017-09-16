$(document).ready(function()
{
  $("#txtUsuario").focusout(
    function(){
        var nombre=$(this).val();         // nombre de usuario
        var dataString = 'usuario='+ nombre;
        $.ajax({
          type: "GET",
          url: "verificarNombre/"+nombre,
          data: dataString,
          cache: false,          
          error: function(xhr, status, error) {
                    //var err = eval("(" + xhr.responseText + ")");
                    alert(error);
                  },
          success: function(b){ //Te ahorras de controlar que tuvo éxito
            if(b){
              $("#txtUsuario").css("border-color", "red");
              $('#error').html("Nombre de usuario no disponible");
            }
            else{

              $("#txtUsuario").css("border-color", "green");
              $('#error').html("");
            }
          }
        });
    });

});

