function crear_objeto_XMLHttpRequest() {
    try {
        objeto = new XMLHttpRequest();
    } catch(err1) {
        try {
            objeto = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (err2) {
            try {
                objeto = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (err3) {
                objeto = false;
            }
        }
    }
    return objeto;
}

var objeto_AJAX = crear_objeto_XMLHttpRequest();


function pedirMunicipios(){
    var URL = "obtener_municipios.php";
    objeto_AJAX.open("POST", URL, true);
    objeto_AJAX.onreadystatechange = muestraResultado;
    objeto_AJAX.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    objeto_AJAX.send("entidad_seleccionada="+document.getElementById("selState").value);
}


function muestraResultado(){
    if (objeto_AJAX.readyState == 4 && objeto_AJAX.status == 200) 
    {
       document.getElementById("selMun").innerHTML = objeto_AJAX.responseText;
    }
}