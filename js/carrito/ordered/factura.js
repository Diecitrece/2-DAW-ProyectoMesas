
//En esta funcion lo que hacemos es recoger los datos que nos mandan y tranformarlos en una factura con formato
function crearFactura (for_mail){
    console.log(for_mail);
    for_mail=JSON.parse(for_mail);
    var row ="";
    
    let total= 0;
    row+= "<p>Usted ha finalizado su compra con estos elementos en su carrito: </p>"; 
    row+="<div id='todo' style='flex-basis: 100% !important;background-color: rgb(222, 222, 222)'>";
    row+="<div class='cabecera'>";
    row+="<h3>Reservar Mesas S.L</h3>";
    row+="<p><b>Cif:</b> 12345679E</p>";
    row+="<p><b>Direccion:</b> Avenida de la Paz, 144 Alicante</p>";
    row+="<p><b>Telefono:</b> 96374293</p>";
    row+="<p><b>Email:</b> reservarmesas@gmail.com</p>";
    row+="</div>";       
    for(i=0; i < for_mail.length; i++)
        {
            let local = for_mail[i]["idLocal"];
            let menu = for_mail[i]["tipo_menu"];
            let final = 5*for_mail[i]["tipo_mesa"];
            
            row+="<div id='cuerpo' style='border: solid;padding: 1em; margin: 1em; background-color: rgb(200, 200, 200) !important;'>";
            row+="<div class='detallesLocal' style='display:flex !important;'>"
            row+="<p style='width: 33%;'><b>Local selecionado: </b>"+ local["nombre"]+"</p>";
            row+="<p style='width: 33%;'><b>Telefono local: </b>"+ local["tlf"]+"</p>";
            row+="<p style='width: 33%;'><b>Direccion local: </b>"+ local["direccion"]+"</p>";
            row+="</div>";
            row+="<p><b>Tiempo estimado de llegada: </b>"+ for_mail[i]["tiempo_estimado"]+"</p>";
            row+= "<p><b>Menu selecionado: </b>"+ menu["nombre"]+"</p>";
            row+= "<p><b>Descripcion menu: </b>"+ menu["detalles"]+"</p>";
            row+= "<p><b>Mesa selecionado: </b>"+ for_mail[i]["tipo_mesa"]+"</p>";
            row+= "<p><b>Importe a pagar por persona de anticipo: </b> 5€</p>";
            row+= "<p><b>Importe pagar por menus: </b>"+ final+"€</p>";
            row+="</div>";
            total = total+final;
        }
        var sinIva = total*0.79;
        var Iva = total*0.21;
        row+="<p class='iva'><b>Importe sin IVA: </b>"+sinIva+" €.</p>";
        row+="<p class='iva''><b>IVA 21%: </b>"+Iva+" €.</p>";
        row+="<p class='iva''><b>Importe total: </b>"+total+" €.</p>";
        row+="</div>";
        row+="</div>";
        localStorage.setItem("data_factura",row);
        location.replace("./confirmarPago.php");
    }
//Esta funcion sirve para cargar la factura en el HTML
function loadFactura(){
    var row =localStorage.getItem("data_factura");
    let div_facturas = document.getElementById("crearFactura");
    div_facturas.innerHTML=row;
}
//Esta es la funcion encargada de enviar el email de confirmacion
function enviarMail(factura){
    var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let response = this.responseText;
            
            if(this.statusText=="OK") {
                console.log('Todo correcto');
            } else {
                console.log("Se ha producido un error, inténtalo de nuevo más tarde");
            }
		}
	}

    params = "factura="+factura;
	
    xhttp.open("POST", "..//..//..//mail//index.php", true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send(params);

    return false;
}
//Esta es la funcion que se inciia cuando le das a confirmar factura
function confirmarPedido()
{
    
    var xhttp = new XMLHttpRequest();			
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if(this.statusText=="OK") {
                console.log("Todo correcto");
                window.location.replace("./carrito.php");
                var factura =localStorage.getItem("data_factura");
                enviarMail(factura);

        } else {
                console.log("Se ha producido un error, inténtalo de nuevo más tarde");
            }
		}
	}
    
	xhttp.open("GET", "..//..//templates//controllers//carrito//ordered//dataUploader.php", true);
    xhttp.send();

    return false;
}
//Esta funcion hace que le damos a cancelar nos mande de nuevo al carrito
function cancelar(){
    location.replace("./carrito.php");
}
