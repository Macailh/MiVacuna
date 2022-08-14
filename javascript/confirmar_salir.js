function confirmarSalir() {
    if (confirm("¿Estas seguro de que deseas eliminar el salir") == true) {
        location.href = '../login.php';
        return true;
    } else {
        return false;
    }
}