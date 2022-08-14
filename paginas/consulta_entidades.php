<?php
    $resultsE = "";
    $sqle = 'SELECT * FROM estados';
    $stmte = $conn->query($sqle);
    $rowse = $stmte->fetchAll();
    if (empty($rowse)) {
        $resulte = "Lo sentimos, no encontramos resultados";
    }
?>