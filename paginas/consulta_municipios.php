<?php
    $resultsM = "";
    $sqlM = 'SELECT * FROM municipios';
    $stmtM = $conn->query($sqlM);
    $rowsM = $stmtM->fetchAll();
    if (empty($rowsM)) {
        $resultM = "Lo sentimos, no encontramos resultados";
    }
?>