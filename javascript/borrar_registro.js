function borrarRegistro(municipio, string) {
    if (confirm("¿Estas seguro de que desas eliminar el " + string + " " + municipio + "?") == true) {
        return true;
    } else {
        return false;
    }
}