<?php

include('../conexion.php');

$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
$query = "select id,nombre_especialidad from especialidades";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
        //    $combo="<td class=\"elimina\">";
            $combo = "<select required class=\"choosen2\" data-placeholder=\"Seleccione...\" name=\"especialidad[]\" id=\"divi\">";
            $combo.="<option value=\"\"></option>";
            while ($row = pg_fetch_array($resultado)) {
                $combo.="<option value='" . $row['id'] . "'>". $row['nombre_especialidad'] . "</option>";
            }
            $combo.="</select>";
        
            echo $combo;

        ?>