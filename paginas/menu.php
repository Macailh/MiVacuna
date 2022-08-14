<?php
require_once "proteccion.php";
require_once "conn_mysql.php";
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú</title>
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="../javascript/obtener_entidades.js"></script>
    <script language="javascript" src="../javascript/obtener_municipios.js"></script>
    <script language="javascript" src="../javascript/obtener_cines.js"></script>
    <script language="javascript" src="../javascript/borrar_registro.js"></script>
    <script language="javascript" src="../javascript/mostrar_registros.js"></script>
    <script language="javascript" src="../javascript/confirmar_salir.js"></script>
</head>

<body>
    <div id="contenedor">
        <h2 class="center">
            <br>
            <img src='../imagenes/gmx.png' alt="Gobierno de México">
            <br>
            <br>
        </h2>
        <div class="navbar">
            <div id="containerMenu">
                <div id="menu" class="tab center">
                    <button class="tablinks" onclick="openReport(event, 'Personas')">Personas</button>
                    <button class="tablinks" onclick="openReport(event, 'Contactos')">Contactos</button>
                    <button class="tablinks" onclick="openReport(event, 'Registros')">Registros</button>
                    <button class="tablinks" onclick="openReport(event, 'RegistrosPorLugar')">Registros por ubicación</button>
                    <button class="tablinks" onclick="return confirmarSalir();">Cerrar sesión</button>
                </div>
            </div>
        </div>
        <div id="cuerpo">

            <div id="Personas" class="tabcontent">
                <?php
                require_once "crud_personas.php";
                ?>
            </div>

            <div id="Contactos" class="tabcontent">
                <?php
                require_once "crud_contactos.php";
                ?>
            </div>

            <div id="Registros" class="tabcontent">
                <?php
                require_once "crud_registros.php";
                ?>
            </div>

            <div id="RegistrosPorLugar" class="tabcontent">
                <?php
                require_once "registros_ubicacion.php";
                ?>
            </div>
        </div>

    </div>
</body>

</html>