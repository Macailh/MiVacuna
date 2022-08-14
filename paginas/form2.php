<div class="titlecurp">
    Lugar en el que voy a vacunarme y datos para localizarme
</div>
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
        <select name="selMun" id="selMun" class="txt">

        </select>
    </div>
    <div class="txtCp">
        <label for="txtCp" class="">Codigo postal:</label>
        <br>
        <input type="text" name="txtCp" id="txtCp" class="txt">
    </div>
    <div class="txtTelefono">
        <label for="txtTelefono" class="">Teléfono (1):</label>
        <br>
        <input type="text" name="txtTelefono" id="txtTelefono" class="txt">
    </div>
    <div class="txtTelefono2">
        <label for="txtTelefono2" class="">Teléfono (2):</label>
        <br>
        <input type="txtTelefono2" name="txtTelefono2" id="txtTelefono2" class="txt">
    </div>

    <div class="txtEmail">
        <label for="txtEmail" class="">Correo electrónico personal:</label>
        <br>
        <input type="text" name="txtEmail" id="txtEmail" class="txt">
    </div>
    <div class="txtEmail2">
        <label for="txtEmail2" class="">Correo electrónico de apoyo:</label>
        <br>
        <input type="text" name="txtEmail2" id="txtEmail2" class="txt">
    </div>
    <div class="txtNote">
        <label for="txtNote" class="">Notas de contacto:</label>
        <br>
        <input type="text" name="txtNote" id="txtNote" class="txt">
    </div>
</div>
<div class="containerSubmit">
    <input type="submit" value="Enviar" class="btnSubmit" name="btnSubmit">
    <br>
    <br>
</div>