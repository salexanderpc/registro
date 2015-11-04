<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function datosReceta($id_des) {
        include('../conexion.php');
         $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
        $query_mostrar = "select des.id,rec.id,rec.cantidad,des.expediente_id,des.fecha_programada,pac.nombre,esp.nombre_especialidad,m.nombre_medico,med.nombre_medicamento,exp.numero_expediente
                        from desc_recetas des inner join recetas_programadas rec
                        on rec.desc_recetas_id = des.id
                        inner join especialidades esp on des.especialidades_id = esp.id 
                        inner join medicos m on des.medicos_id = m.id 
                        inner join medicamento med on rec.medicamento_id = med.id
                        inner join expediente exp on des.expediente_id = exp.id
                        inner join paciente pac on exp.paciente_id = pac.id where rec.recepcion=TRUE and des.id = $id_des order by des.id";
        $respuesta = pg_query($conexion, $query_mostrar) or die("Error en la Consulta SQL");
        return($respuesta);
    }
    ?>

