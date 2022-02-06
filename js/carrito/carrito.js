const id_reserves = Array();

function send_order()
{   
    var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let response = JSON.parse(this.responseText);
            if(response.status=="OK") {
                console.log('Todo correcto' + response.message);
                crearFactura(response.data);
            } else {
                console.log("Se ha producido un error, inténtalo de nuevo más tarde");
            }
		}
	}
    let json_reserves = Array();
    if(id_reserves.length != 0)
    {
        for (i=0; i < id_reserves.length; i++)
        {
            currentForm = document.getElementById(id_reserves[i]).elements;

            let idLocal=currentForm["idLocal"].value;
            let tiempo_estimado=currentForm["tiempo_estimado"].value;
            let tipo_mesa=currentForm["select_mesa"].value;
            let tipo_menu=currentForm["select_menu"].value;

            json_reserves.push(
                {
                    'idLocal':idLocal,
                    'tiempo_estimado':tiempo_estimado,
                    'tipo_mesa':tipo_mesa,
                    'tipo_menu':tipo_menu
                })
        }
        json_reserves = JSON.stringify(json_reserves);
        params = "reserves="+json_reserves;
        xhttp.open("POST", "..//..//templates//controllers//carrito//ordered//dataReceiver.php", true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhttp.send(params);
    }

    return false;
}

function loadCart(cart, div_componentes)
{
    if (cart !== "No hay reservas en curso")
    {
        var row="";

        id_reserves.length = 0;

        for(i=0; i < cart.length; i++)
        {
            console.log("cart:" + cart[i].tipos_menu);
            hidden_idLocal = cart[i].idLocal;
            form_id = cart[i].id;
            
            id_reserves.push(form_id);

            row+="<div class='feature-item mb-5 mb-lg-0'>";
            row+="<div class='feature-icon mb-4'>";
            row+="<form id=" + form_id + ">";
            row+= "<h4 class='mb-3'>Datos restaurante</h4>";
            row+="<input type=hidden value=" + hidden_idLocal + " name=idLocal>";
            row+="<ul class='w-hours list-unstyled'>";
            row+="<li class='d-flex justify-content-between'>Local : <span>"+cart[i].nombreLocal+"</span></li>";
            row+= "<li class='d-flex justify-content-between'>Direccion : <span>"+cart[i].direcLocal+"</span></li>";
            row+= "<li class='d-flex justify-content-between'>Tiempo estimado seleccionado:<input type='text' value='" + cart[i].tiempo_estimado + "' name=tiempo_estimado ></li>";
            row+="<li class='d-flex justify-content-between'>Tipo de mesa seleccionado: <select name='select_mesa'>";
            tipos_mesas = cart[i].tipos_mesas;
            for (let key in tipos_mesas)
            {
                if (key == cart[i].tipo_mesa_seleccionado)
                {
                    row+="<option value='" + key + "' selected>" + cart[i].tipos_mesas[key] + " personas máximo</option>";
                }
                else
                {
                    row+="<option value='" + key + "'>" + cart[i].tipos_mesas[key] + " personas máximo</option>";
                }
            }
            row+="</select></li><br><br>";
            row+="<li class='d-flex justify-content-between'>Menú seleccionado: <select name='select_menu'>";
            tipos_menu = cart[i].tipos_menu;
            console.log("tipos_menu:" + tipos_menu);
            for (let key in tipos_menu)
            {
                if (key == cart[i].tipo_menu_seleccionado)
                {
                    row+="<option value='" + key + "' selected title='"+cart[i].tipos_menu[key]["descripcion"]+"'>" + cart[i].tipos_menu[key]["menu"] + "</option>";
                }
                else
                {
                    row+="<option value='" + key + "' title='"+cart[i].tipos_menu[key]["descripcion"]+"'>" + cart[i].tipos_menu[key]["menu"] + "</option>";
                }
            }
            row+="</select></li></ul>";
            row+="</form>";
            row+= "<button type='button' style='margin: 0 1em !important' class='btn btn-main btn-round-full' data-toggle='modal' data-target='#ModalReserva' onclick='return removeReserve(" + form_id + ")'>Cancelar reserva</button>";
            row+= "<button type='button' class='btn btn-main btn-round-full' data-toggle='modal' data-target='#ModalReserva' onclick='return modifyCart(" + form_id + ")'>Guardar cambios</button>";
            row+= "</div>";
            row+= "</div>";
           }
        div_componentes.innerHTML+=row;
        // var form = document.getElementById(form_id);
        //     form.addEventListener("input", function (event) {
        //         console.log("Form " + form_id + " has changed!");
        //     });
    }   
    else
    {
        cart= "";
        cart+="<div class='feature-item mb-5 mb-lg-0'>";
        cart+="<div class='feature-icon mb-4' style='display: flex; flex-direction: column; margin: 0 auto;' >";
        cart+= "<h4 class='mb-3' style='margin: 0 auto;'>No hay reservas en curso</h4>";
        cart+="<img src='https://i.pinimg.com/originals/88/b5/94/88b594e006fbb30e33d3b83ad790f1f0.png' style='width: 40%; margin:0 auto;' >"
        cart+= "</div>";
        cart+= "</div>";
        div_componentes.innerHTML = cart;
    }
}

function getCart()
{
    let div_componentes = document.getElementById("contener_reservas");
    div_componentes.innerHTML="";
    var xhttp = new XMLHttpRequest();			
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let response = JSON.parse(this.responseText);
            if(response.status=="OK") {
                loadCart(response.data, div_componentes);
            } else {
                console.log("Se ha producido un error, inténtalo de nuevo más tarde");
            }
		}
	}
	xhttp.open("GET", "..//..//templates//controllers//carrito//getCart.php", true);
    xhttp.send();
}

document.addEventListener("DOMContentLoaded", function(event) { 
    getCart();
});
