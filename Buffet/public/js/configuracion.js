function mostrarMensaje(){
    var habilitar = document.getElementById('habilitar');
    if (habilitar.checked){
        document.getElementById('mensaje').disabled=false;
    }else{
        document.getElementById('mensaje').disabled=true;
    }
}