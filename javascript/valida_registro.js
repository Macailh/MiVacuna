function validaRegistro() {
    var curp = document.getElementById("selCurp").selectedIndex;
    var entidad = document.getElementById("selState").selectedIndex;
    var municipio = document.getElementById("selMun").value;
    var codigoPostal = document.getElementById("txtCp").value;

    if (curp == null || curp.length == 0 || curp == 0) {
        alert("Debes seleccionar la CURP");
        document.getElementById("selCurp").value = "";
        document.getElementById("selCurp").focus();
        document.getElementById("selCurp").style.backgroundColor = 'pink';
        return false;
    } else if (entidad == null || entidad.length == 0 || entidad == 0) {
        alert("Debes seleccionar el estado");
        document.getElementById("selState").value = "";
        document.getElementById("selState").focus();
        document.getElementById("selState").style.backgroundColor = 'pink';
        return false;
    } else if (municipio == null || municipio.length == 0 || municipio == 0) {
        alert("Debes seleccionar el municipio");
        document.getElementById("selMun").value = "";
        document.getElementById("selMun").focus();
        document.getElementById("selMun").style.backgroundColor = 'pink';
        return false;
    } else if (codigoPostal == null || codigoPostal.length == 0 || !/^([0-9])*$/.test(codigoPostal) || codigoPostal.length != 5) {
        alert("Debes ingresar el código postal");
        document.getElementById("txtCp").value = "";
        document.getElementById("txtCp").focus();
        document.getElementById("txtCp").style.backgroundColor = 'pink';
        return false;
    }
    return true;
}