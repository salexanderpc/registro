<?php

include('../conexion.php');



$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
$query = "select id,nombre_medicamento from medicamento";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
        //    $combo="<td class=\"elimina\">";
            $combo = "<select required class=\"choosen\" data-placeholder=\"Seleccione...\" name=\"medicamentos[]\" id=\"divi\">";
            $combo.="<option value=\"\"></option>";
            while ($row = pg_fetch_array($resultado)) {
                $combo.="<option value='" . $row['id'] . "'>". $row['nombre_medicamento'] . "</option>";
            }
            $combo.="</select>";
        
            echo $combo;

        ?>