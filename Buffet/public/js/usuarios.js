function confirmar()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
      return true;
  else
    return false;
}
function hacerSubmit(formulario){
		//document.forms[arguments[0]].submit();
		//alert("");
		//document.getElementById(formulario).submit();
		var v= "#"+formulario;
		alert(v);
		$(v).submit();
}

    //$('.confirmation').on('click', function () {
     //   return confirm('Are you sure?');
    //});

