function validaPersonaContacto() {
    var name = document.getElementById("txtName").value;
    var lastName1 = document.getElementById("txtFirstLastName").value;
    var lastName2 = document.getElementById("txtSecondLastName").value;
    var curp = document.getElementById("txtCurp").value;
    var date = document.getElementById("txtDate").value;
    var entidad = document.getElementById("selStateBirth").value;
    var sex = document.getElementById("selGender").value;
    var entidad = document.getElementById("selState").selectedIndex;
    var municipio = document.getElementById("selMun").selectedIndex;
    var codigoPostal = document.getElementById("txtCp").value;
    var telefono = document.getElementById("txtTelefono").value;
    var telefono2 = document.getElementById("txtTelefono2").value;
    var email = document.getElementById("txtEmail").value;
    var email2 = document.getElementById("txtEmail2").value;
    var notes = document.getElementById("txtNote").value;

    if (name == null || name.length == 0 || /^\s+$/.test(name) || name.length > 50) {
        alert("Debes escribir el nombre");
        document.getElementById("txtName").value = "";
        document.getElementById("txtName").focus();
        document.getElementById("txtName").style.backgroundColor = 'pink';
        return false;
    } else if (lastName1 == null || lastName1.length == 0 || /^\s+$/.test(lastName1) || lastName1.length > 50) {
        alert("Desbes ingresar el primer apellido");
        document.getElementById("txtFirstLastName").value = "";
        document.getElementById("txtFirstLastName").focus();
        document.getElementById("txtFirstLastName").style.backgroundColor = 'pink';
        return false;
    } else if (lastName2 == null || lastName2.length == 0 || /^\s+$/.test(lastName1) || lastName1.length > 50) {
        alert("Debes ingresar el segundo apellido");
        document.getElementById("txtSecondLastName").value = "";
        document.getElementById("txtSecondLastName").focus();
        document.getElementById("txtSecondLastName").style.backgroundColor = 'pink';
        return false;
    } else if (curp == null || curp.length == 0 || /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/.test(curp) == false) {
        alert("Debes ingresar la curp en el formato correcto");
        document.getElementById("txtCurp").value = "";
        document.getElementById("txtCurp").focus();
        document.getElementById("txtCurp").style.backgroundColor = 'pink';
        return false;
    } else if (date == null || date.length == 0) {
        alert("Debes ingresar tu fecha de nacimiento");
        document.getElementById("txtDate").focus();
        document.getElementById("txtDate").style.backgroundColor = 'pink';
        return false;
    } else if (entidad == null || entidad.length == 0 || entidad == 0) {
        alert("Debes seleccionar la entidad de nacimiento");
        document.getElementById("selStateBirth").value = "";
        document.getElementById("selStateBirth").focus();
        document.getElementById("selStateBirth").style.backgroundColor = 'pink';
        return false;
    } else if (sex == null || sex.length == 0 || sex == 0) {
        alert("Debes seleccionar el sexo");
        document.getElementById("selGender").value = "";
        document.getElementById("selGender").focus();
        document.getElementById("selGender").style.backgroundColor = 'pink';
        return false;
    } else if (entidad == null || entidad.length == 0 || entidad == 0) {
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