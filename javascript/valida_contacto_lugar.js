function validaContacto() {
    var entidad = document.getElementById("selState").selectedIndex;
    var municipio = document.getElementById("selMun").selectedIndex;
    var codigoPostal = document.getElementById("txtCp").value;
    var telefono = document.getElementById("txtTelefono").value;
    var telefono2 = document.getElementById("txtTelefono2").value;
    var email = document.getElementById("txtEmail").value;
    var email2 = document.getElementById("txtEmail2").value;
    var notes = document.getElementById("txtNote").value;

    if (entidad == null || entidad.length == 0 || entidad == 0) {
        alert("Debes seleccionar la entidad");
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
    } else if (telefono == null || telefono.length == 0 || !/^([0-9])*$/.test(telefono) || telefono.length > 10) {
        alert("Debes ingresar el teléfono");
        document.getElementById("txtTelefono").value = "";
        document.getElementById("txtTelefono").focus();
        document.getElementById("txtTelefono").style.backgroundColor = 'pink';
        return false;
    } else if (telefono2 == null || telefono2.length == 0 || !/^([0-9])*$/.test(telefono2) || telefono2.length > 10) {
        alert("Debes ingresar el teléfono 2");
        document.getElementById("txtTelefono2").value = "";
        document.getElementById("txtTelefono2").focus();
        document.getElementById("txtTelefono2").style.backgroundColor = 'pink';
        return false;
    } else if (email == null || email.length == 0 || email.length > 50 ||
        /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/.test(email) == false) {
        alert("Debes ingresar el correo electrónico");
        document.getElementById("txtEmail").value = "";
        document.getElementById("txtEmail").focus();
        document.getElementById("txtEmail").style.backgroundColor = 'pink';
        return false;
    } else if (email2 == null || email2.length == 0 || email2.length > 50 ||
        /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/.test(email2) == false) {
        alert("Debes ingresar el correo electrónico de apoyo");
        document.getElementById("txtEmail2").value = "";
        document.getElementById("txtEmail2").focus();
        document.getElementById("txtEmail2").style.backgroundColor = 'pink';
        return false;
    } else if (notes.length > 100) {
        alert("Debes ingresar una nota de menos de 100 caracteres");
        document.getElementById("txtNote").value = "";
        document.getElementById("txtNote").focus();
        document.getElementById("txtNote").style.backgroundColor = 'pink';
        return false;
    }
    return true;
}