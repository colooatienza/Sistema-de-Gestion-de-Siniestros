
	function confirmar() {
		return false;//confirm("Realmente desea eliminar el producto?");
	}
	//$('#myLink').click(function(){ confirmar(); return false; });
	function hacerSubmit(formulario){
		document.forms[arguments[0]].submit();
	}