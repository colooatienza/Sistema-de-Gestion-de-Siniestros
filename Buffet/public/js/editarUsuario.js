
function validarUbicacion(){
	var e = document.getElementById("selectRol");
	var selected = e.options[e.selectedIndex].value;
	if(selected==3){
		document.getElementById("divUbicacion").style.display="block";
	}
	else
		document.getElementById("divUbicacion").style.display="none";

}