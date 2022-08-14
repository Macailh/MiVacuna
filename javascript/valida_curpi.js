function validaCurp() {
    var curp = document.getElementById("txtcurp").value;

    if (curp == null || curp.length == 0 || /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/.test(curp) == false) {
        alert("Debes ingresar la curp en el formato correcto");
        document.getElementById("txtcurp").value = "";
        document.getElementById("txtcurp").focus();
        document.getElementById("txtcurp").style.backgroundColor = 'pink';
        return false;
    }
    return true;
}