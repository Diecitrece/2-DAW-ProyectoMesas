//Esta es la funcion que manda los datos de que todo esta bien y recoge los datos de la BBDD
function getRestaurante(){

    var xhttp = new XMLHttpRequest();				
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            
            let response = JSON.parse(this.responseText);

            if(response.status=="OK") {
                loadDataInTable(response.data);
            } else {
                alert("Se ha producido un error, inténtalo de nuevo más tarde");
            }
		}
	}
	xhttp.open("GET", "../templates/controllers/getRestaurante.php", true);	
	xhttp.send();	
}

//Esta funcion se encarga de pasarle los datos que necesita el modal
function dataLocal(idLocal, callback='')
{
    
    var xhttp = new XMLHttpRequest();			
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            
            let response = JSON.parse(this.responseText);
            
            if(response.status=="OK") {
                if (typeof callback === "function") {
                    // apply() sets the meaning of "this" in the callback
                    callback.apply(xhttp);
                } else {
                    return response.data;
                }
                
            } else {
                alert("Se ha producido un error, inténtalo de nuevo más tarde");
            }
		}
	}
    params="idLocal="+idLocal;
	xhttp.open("POST", "..//..//templates//controllers//getDatosLocal.php", false);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send(params);
    
}
//Esta funcion carga los datos del local en el modal
function loadModal(idLocal){
    let x;
    dataLocal(idLocal, function () {
        x = JSON.parse(this.responseText);
        x = x.data;
    });
    console.log(x);
    //Buscar cómo funciona una llamada asíncrona o mezclar ambas funciones
    let select_mesas= document.getElementById("desplegar_mesas");
    let select_menu= document.getElementById("desplegar_menu");
    document.getElementById("realizar_Form").reset();

    let row= "";
    let row2= "";
    mesas=x[0];
    menus=x[1];
    console.log(menus);

    for (let key in mesas){
        row += "<option value="+key+">"+mesas[key]+" personas máximo.</option>";
    }
    for (let key in menus){
        console.log(menus[key]["id"]);
        row2 += "<option value="+menus[key]["id"]+" title='"+menus[key]["descripcion"]+"'>"+menus[key]["menu"]+".</option>";
    }
    
    document.getElementById("hidden_idLocal").value=idLocal;

    select_menu.innerHTML= row2;
    select_mesas.innerHTML= row;
    
}
//Esta funcion se encarga de cargar el row que es lo incluye el html dinamico
function loadRow(bar, row2) {
    let $abierto= "";
    if(bar.abierto === "1"){
        $abierto = "✅";
    }else{
        $abierto="❌";
    }
    row2+="<div class='feature-item mb-5 mb-lg-0'>";
    row2+="<div class='feature-icon mb-4'>";
    row2+="<img src="+bar.img+" style=' width: 100px;height: 80px;'>";
    row2+= "</div>";
    row2+= "<h4 class='mb-3'>Datos restaurante</h4>";
    row2+="<ul class='w-hours list-unstyled'>";
    row2+="<li class='d-flex justify-content-between'>Nombre : <span>"+bar.nombre+"</span></li>";
    row2+= "<li class='d-flex justify-content-between'>Direccion : <span>"+bar.adress+"</span></li>";
    row2+= "<li class='d-flex justify-content-between'>Telefono : <span>"+bar.tlf+"</span></li>";
    row2+= "<li class='d-flex justify-content-between'>Descripcion : <span class='caja'>"+bar.detalles+"</span></li>";
    row2+= "<li class='d-flex justify-content-between'>Abierto : <span>"+$abierto+"</span></li>";
    row2+= "<li class='d-flex justify-content-between'>Categoría : <span class='caja'>"+bar.nombreCat+"</span></li>";
    row2+= "</ul>";
    row2+= "<button type='button' class='btn btn-main btn-round-full' data-toggle='modal' data-target='#ModalReserva' onclick='loadModal("+bar.id+")'>Realizar reserva</button>";
    row2+= "</div>";

    //Esto es para el desplegable
    
    return row2;
    
}
//Esta funcion carga el row cargado en el HTML
function loadDataInTable(barJSON) {
    
    if(barJSON.length<=0) {
        document.getElementById("no-bar-message").style.display="block";
    } else {
        categorias = [];
        for (let i in barJSON)
        {
            let bar = barJSON[i];
            if (!categorias.includes(bar.nombreCat))
            {
                categorias.push(bar.nombreCat)
            }
        }
        for (let categoria in categorias)
        {
            table=document.getElementById("local-container");
            row='<div><h2>'+categorias[categoria]+'</h2></div>';
            row+='<div style="display: grid;grid-template-columns: repeat(3, 1fr);margin: 30 px10px !important;">';
            for (let i in barJSON) {
                let bar = barJSON[i];
                if (categorias[categoria] == bar.nombreCat)
                {
                    row = loadRow(bar, row);
                }
            }
            row+="</div>";
            table.innerHTML+=row;
        }
    }
}

