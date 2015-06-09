<?php

include('../conexion.php');
$id_category = $_POST['id_category'];
echo $id_category;
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
$query = "select id,nombre_municipio from tbl_municipio where tbl_departamento_id = ".$id_category."";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
            
            $combo = "<option value=\"\" ";
            while ($row = pg_fetch_array($resultado)) {
                $combo.="<option value='" . $row['id'] . "'>". $row['nombre_municipio'] . "</option>";
            }
            echo $combo;
        
        
        ?>

