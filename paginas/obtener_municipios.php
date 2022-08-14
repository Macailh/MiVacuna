<?php
    require_once "conn_mysql.php";
    $result;
	$resultado = "<option value='0'>Municipios</option>";
	$resultado2 = "Lo sentimos, no pudimos encontrar municipios en esa entidad";
	
	
	$municipio_elegido = $_POST["entidad_seleccionada"];
	
    
    $sql2 = "SELECT * FROM municipios WHERE idEstado='$municipio_elegido' ORDER BY municipio";

    
    $result = $conn->query($sql2);
      
    
    $rows = $result->fetchAll();
    
	
	
    if (empty($rows)) {
        echo $resultado2;
		die();
    } else {
        echo $resultado;
        foreach ($rows as $row) 
	    {
           echo '<option value="'.$row['idMunicipio'].'">'.$row['municipio'].'</option>';
        }
	}
?>