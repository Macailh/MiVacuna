<?php
require_once "proteccion.php";
require_once "conn_mysql.php";
include "consulta_entidades.php"; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de personas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script language="javascript" src="../javascript/valida_persona.js"></script>
    <script language="javascript" src="../javascript/obtener_municipios.js"></script>
</head>
<body>
    <?php
        include 'cabecera.php';
    ?>
    <div class="container">
        <form id="formcurp" onsubmit="return validaPersona();" method="post" action="grabar_persona.php">
            <div class="containerForm center">
                <div class="titlecurp">
                    Registrar personas
                </div>
                <div class="containerFormCurp">
                    <div id="name">
                        <label for="txtName" class="">Nombre</label>
                        <br>
                        <input type="text" name="txtName" id="txtName" class="txt" style="text-transform:uppercase;">
                    </div>
                    <div class="firstLastName">
                        <label for="txtFirstLastName" class="">Primer apellido</label>
                        <br>
                        <input type="text" name="txtFirstLastName" id="txtFirstLastName" class="txt" style="text-transform:uppercase;">
                    </div>
                    <div class="txtSecondLastName">
                        <label for="txtSecondLastName" class="">Segundo apellido</label>
                        <br>
                        <input type="text" name="txtSecondLastName" id="txtSecondLastName" class="txt" style="text-transform:uppercase;">
                    </div>
                    <div class="txtCurp">
                        <label for="txtCurp"" class="">CURP</label>
                        <br>
                        <input type="text" name="txtCurp" id="txtCurp" class="txt" style="text-transform:uppercase;">
                    </div>
                    <div class="txtDate">
                        <label for="txtDate" class="">Fecha de nacimiento</label>
                        <br>
                        <input type="date" name="txtDate" id="txtDate" class="txt">
                    </div>
                    <div class="txtState">
                        <label for="selStateBirth" class="">Entidad de nacimiento</label>
                        <br>
                        <select name="selStateBirth" id="selStateBirth" class="txt">
                            <option value="0">Selecciona un estado</option>
                            <?php
                                foreach ($rowse as $rowe) {
                                    echo '<option value="' . $rowe['idEstado'] . '">' . $rowe['estado'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="txtGender">
                        <label for="selGender" class="">Sexo</label>
                        <br>
                        <select name="selGender" id="selGender" class="txt">
                            <option value="0">Sexo</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                </div>
                <div class="containerSubmit">
                    <input type="submit" value="Registrar persona" class="btnSubmit" name="btnVac">
                    <br>
                    <br>
                    <input type="button" value="Regresar" class="btnReturn" name="btnReturn" onclick="location.href='menu.php'">
                    <br>
                    <br>
                </div>
            </div>
        </form>
    </div>    
</body>
</html>