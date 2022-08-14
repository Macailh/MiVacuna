<?php
require_once "conn_mysql.php";
include "consulta_entidades.php"
?>
<div id="tabla">
    <div id="titulo" class="center">
        <h1>Reporte personas</h1>
        <div class="containerFormCurp">
            <div class="txtState">
                <label for="selState" class="">Entidad:</label>
                <br>
                <select name="selState" id="selState" class="txt" onChange="javascript:pedirMunicipios();">
                    <option value="0">Selecciona un estado</option>
                    <?php
                    foreach ($rowse as $rowe) {
                        echo '<option value="' . $rowe['idEstado'] . '">' . $rowe['estado'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="txtMun">
                <label for="selMun" class="">Municipio:</label>
                <br>
                <select name="selMun" id="selMun" class="txt" onChange="showRegisters(this.value)">

                </select>
            </div>
        </div>    
    </div>
    <div id="form">
        <div id="txtHint">
        </div>
        
    </div>
</div>