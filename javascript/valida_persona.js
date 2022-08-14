function validaPersona() {
    var name = document.getElementById("txtName").value;
    var lastName1 = document.getElementById("txtFirstLastName").value;
    var lastName2 = document.getElementById("txtSecondLastName").value;
    var curp = document.getElementById("txtCurp").value;
    var date = document.getElementById("txtDate").value;
    var entidad = document.getElementById("selStateBirth").value;
    var sex = document.getElementById("selGender").value;
    var x = false;

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
    }
    x = true;
    if (x) {
        let div = document.getElementById("form2");
        div.style.display = "block";
        return true;
    }
}