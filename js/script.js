//Estas funciones lo qe hacen es mostras o ocular ciertos div del login 
function mostrarRegistroUsuario(){
    document.getElementById("clienteNuevo").style.display ="block";
    document.getElementById("boton").style.display = "none";
    document.getElementById("boton2").style.display = "none";
}

function mostrarInicioUsuario(){
    document.getElementById("clienteInicio").style.display ="block";
    document.getElementById("boton").style.display = "none";
    document.getElementById("boton2").style.display = "none";

}

function atrasRegisUser(){
    document.getElementById("clienteNuevo").style.display ="none";
    document.getElementById("boton").style.display = "";
    document.getElementById("boton2").style.display = "";

}
function atrasUser(){
    document.getElementById("clienteInicio").style.display ="none";
    document.getElementById("boton").style.display = "";
    document.getElementById("boton2").style.display = "";

}
function botonModificar(){
    document.getElementById("actualizarNormal").style.display ="none";
    document.getElementById("actualizar").style.display ="block";
}

function actualizarDatos(){

}
//Esta es la funcion que comprueba que los datos introducimos en el form sean correctos y manda los datos a la BBDD para que los compruebe.
function comprobarDatos(){
	var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			
			let response = JSON.parse(this.responseText);
			

			if(response.status==="OK"){
				document.getElementById("ok").style.display="block";

				//redirigir a home
						
				window.location.href = "index.php";
			} else if(response.status==="KO_LOGIN"){
				console.log(" "+response.status+" ");
                document.getElementById("ko").style.display="block";

			} else {
				alert("Se ha producido un error, si el problema persiste contacta con el administrador")
			}
		}
	}

    //Oculto los mensajes de error del login
    document.getElementById("ko").style.display="none";

    //Monto los par??metros de la llamada
	let email = document.getElementById("email").value;
	let pass = document.getElementById("pass").value;
	var params = "email="+email+"&pass="+pass;

	xhttp.open("POST", "../templates/controllers/doLogin.php", true);	

	// env??o con POST requiere cabecera y cadena de par??metros
	xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhttp.send(params);	

	return false;
}
//Esta es la funcion que usamos para a??adir usuarios nuevos y hace las comprobaciones pertinentes
function addUser() {
    var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);
			
            if(response.status=="OK") {
                
                document.getElementById("addok").style.display="block";

                alert("Usuario a??adido correctamente");
				window.location.href = "./index.php";
            } else if(response.status=="KO_LOGIN") {
                alert("Se ha producido un error al a??adir el usuario");
				document.getElementById("addko").style.display="block";
            } 
            else {
                alert("Se ha producido un error, int??ntalo de nuevo m??s tarde");
            }

		}
	}

	
	
    //Monto los par??metros de la llamada
	let nombre = document.getElementById("addnombre").value;
	let email = document.getElementById("addemail").value;
    let pass = document.getElementById("addpass").value;
	

	var params = "nombre="+nombre+"&email="+email+"&pass="+pass;

	xhttp.open("POST", "./controllers/addUser.php", true);	

	
	// env??o con POST requiere cabecera y cadena de par??metros
	xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhttp.send(params);	

	return false;
}
