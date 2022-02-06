function loadHistorial(reservas)
{
    div = document.getElementById("historial");
    row="<table border='1px solid black' style='text-align:center; width:100%;'>";
    row+="<tr><th>Local</th><th>Direccion</th><th>Tiempo estimado</th><th>Número de personas</th><th>Menú</th>";
        for(let reserva in reservas)
        {
            reserva = reservas[reserva];
            row+="<tr>";
            row+="<td>"+reserva.local+"</td>";
            row+="<td>"+reserva.direccion+"</td>";
            row+="<td>"+reserva.tiempo_estimado+"</td>";
            row+="<td>"+reserva.personas+"</td>";
            row+="<td>"+reserva.menu+"</td>";
        }
    row+="</table>";
    div.innerHTML=row;
    
}
function getHistorial()
{
    var xhttp = new XMLHttpRequest();			
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let response = JSON.parse(this.responseText);
            if(response.status=="OK") {
                loadHistorial(response.data);
            } else {
                console.log("Se ha producido un error, inténtalo de nuevo más tarde");
            }
		}
	}
	xhttp.open("GET", "..//templates//controllers//loadHistorial.php", true);
    xhttp.send();
}