<?php
    ob_start();
    require_once "conn_mysql.php";
	
	$curp = $_POST["txtcurp"];
	
    $sqlP = "SELECT * FROM personas WHERE curp=" ."'" .$curp."'";
    $resultP = $conn->query($sqlP);
    $rowsP = $resultP->fetchAll();
    
    $sqlR = "SELECT * FROM registros INNER JOIN personas ON registros.idPersona = personas.curp WHERE curp=" . "'".$curp."'";
    $resultR = $conn->query($sqlR);
    $rowsR = $resultR->fetchAll();

	$cuantos = (int)$rowsP;
    $cuantos2 = (int)$rowsR;
	if ($cuantos == 0){
        $conn = null;
        header("Location: confirmar_curp.php?id=".$curp);
	    exit;
    } else if ($cuantos == 1 && $cuantos2 == 0) {
        $conn = null;
        header("Location: confirmar_contacto.php?id=".$curp);
	    exit;
    } else if($cuantos > 0 && $cuantos2 > 0){
        $conn = null;
        header("Location: resultado.php?id=".$curp);
        exit;
    }
?>