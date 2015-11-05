<?php

function datosRecetaActivar($id_desc,$expediente) {
        include('../conexion.php');
         $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
        $query_mostrar = "select  rec.transaccion_id,exp.numero_expediente,rec.id as id_medicamento,des.id as id_desc, des.fecha_programada,exp.id as id_expediente,
	pac.nombre,m.nombre_medico,esp.nombre_especialidad, med.nombre_medicamento
	,rec.cantidad from desc_recetas des
	inner join expediente exp on des.expediente_id = exp.id  
	inner join paciente pac on exp.paciente_id = pac.id 
	inner join medicos m on des.medicos_id = m.id
	inner join especialidades esp on des.especialidades_id = esp.id
	inner join recetas_programadas rec on des.id = rec.desc_recetas_id
	inner join medicamento med on rec.medicamento_id = med.id
	where exp.numero_expediente = '$expediente' and des.transaccion_id = 1 and des.id=$id_desc order by des.fecha_programada,id_desc,med.nombre_medicamento";
        $respuesta = pg_query($conexion, $query_mostrar) or die("Error en la Consulta SQL");
        return($respuesta);
    }
    ?>