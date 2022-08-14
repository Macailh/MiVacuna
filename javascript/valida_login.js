function validaFormulario() {
    var user = document.getElementById("txtUser").value;
    var password = document.getElementById("txtPass").value;

    if (user == null || user.length == 0) {
        alert("Debes ingresar el usuario");
        document.getElementById("txtUser").value = "";
        document.getElementById("txtUser").focus();
        document.getElementById("txtUser").style.backgroundColor = 'pink';
        return false;
    } else if (password == null || password.length == 0) {
        alert("Debes ingresar la contraseña");
        document.getElementById("txtPass").value = "";
        document.getElementById("txtPass").focus();
        document.getElementById("txtPass").style.backgroundColor = 'pink';
        return false;
    }
    return true;
}