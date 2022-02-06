function setCart(idForm)
{
    var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let response = JSON.parse(this.responseText);

            if(response.status=="OK") {
                console.log('Todo correcto' + response.message);
            } else {
                console.log("Se ha producido un error, inténtalo de nuevo más tarde");
            }
		}
	}

    //Esto se tendrá que cambiar para adaptarse a la existencia de varios formularios distintos

    currentForm = document.getElementById(idForm).elements;
    let idLocal=currentForm["hidden_idLocal"].value;
    let tiempo_estimado=currentForm["tiempo_estimado"].value;
    let tipo_mesa=currentForm["tipo_mesa"].value;
    let tipo_menu=currentForm["tipo_menu"].value;

    params = "idLocal="+idLocal+"&tiempo_estimado="+tiempo_estimado+"&tipo_mesa="+tipo_mesa+"&tipo_menu="+tipo_menu+"&idReserva="+idForm;

	xhttp.open("POST", "..//..//templates//controllers//carrito//setCart.php", true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send(params);

    document.getElementById(idForm).reset();

    return false;
}

function modifyCart(idForm)
{
    var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let response = JSON.parse(this.responseText);

            if(response.status=="OK") {
                getCart()
                console.log('Todo correcto' + response.message);
            } else {
                console.log("Se ha producido un error, inténtalo de nuevo más tarde");
            }
		}
	}

    //Esto se tendrá que cambiar para adaptarse a la existencia de varios formularios distintos
    currentForm = document.getElementById(idForm).elements;

    let idLocal=currentForm["idLocal"].value;
    let tiempo_estimado=currentForm["tiempo_estimado"].value;
    let tipo_mesa=currentForm["select_mesa"].value;
    let tipo_menu=currentForm["select_menu"].value;

    params = "idLocal="+idLocal+"&tiempo_estimado="+tiempo_estimado+"&tipo_mesa="+tipo_mesa+"&tipo_menu="+tipo_menu+"&idReserva="+idForm;
	
    xhttp.open("POST", "..//..//templates//controllers//carrito//modifyCart.php", true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send(params);

    return false;
}
function removeReserve(idForm)
{
    var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let response = JSON.parse(this.responseText);

            if(response.status=="OK") {
                console.log('Todo correcto' + response.message);
                getCart();
            } else {
                console.log("Se ha producido un error, inténtalo de nuevo más tarde");
            }
		}
	}

    //Esto se tendrá que cambiar para adaptarse a la existencia de varios formularios distintos

    params = "idReserva="+idForm;

	xhttp.open("POST", "..//..//templates//controllers//carrito//deleteCart.php", true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send(params);

    return false;
}
