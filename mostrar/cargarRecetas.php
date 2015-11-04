<?php
/* Parametros de conexion */
require 'consulta.php';
    include('../conexion.php');
    $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
    
/* Obtengo el Primer Registro */
//$query="select des.id as id_des
//from desc_recetas des inner join recetas_programadas rec
//on rec.desc_recetas_id = des.id
//inner join especialidades esp on des.especialidades_id = esp.id 
//inner join medicos m on des.medicos_id = m.id 
//inner join medicamento med on rec.medicamento_id = med.id
//inner join expediente exp on des.expediente_id = exp.id
//inner join paciente pac on exp.paciente_id = pac.id where rec.recepcion=TRUE order by des.id desc limit 1";
//
//$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
//
//while ($row = pg_fetch_array($resultado)) {
//       $id_des = $row['id_des'];
//    }
    
$query_mostrar= "select des.id as id_des,rec.id,des.expediente_id,des.fecha_programada,pac.nombre,esp.nombre_especialidad,m.nombre_medico,med.nombre_medicamento,exp.numero_expediente
from desc_recetas des inner join recetas_programadas rec
on rec.desc_recetas_id = des.id
inner join especialidades esp on des.especialidades_id = esp.id 
inner join medicos m on des.medicos_id = m.id 
inner join medicamento med on rec.medicamento_id = med.id
inner join expediente exp on des.expediente_id = exp.id
inner join paciente pac on exp.paciente_id = pac.id where rec.recepcion=TRUE order by des.id";

$resultado = pg_query($conexion, $query_mostrar) or die("Error en la Consulta SQL");

$imp="";
while ($row = pg_fetch_array($resultado)) {
    $nombre_medicamento = $row['nombre_medicamento'];
    $id_des = $row['id_des'];
    $imp.= "<table class=\"table table-bordered table-hover\">
                                                    <caption><button type=\"button\" class=\"btn btn-info\">Despachar Todo</button></caption>
                                                    <thead>
                                                        <tr>
                                                        <th colspan=\"3\" class=\"success\">
                                                        Nombre:
                                                        </th>
                                                        <th colspan=\"3\"class=\"success\">N° Expediente: </th>
                                                        </tr>
                                                        <tr class=\"info\">
                                                            <th class=\"text-center\">Fecha<br>Programada</th>
                                                            <th class=\"text-center\">Medicamento</th>
                                                            <th class=\"text-center\">Cantidad</th>
                                                            <th class=\"text-center\">Médico</th>
                                                            <th class=\"text-center\">Especialidad</th>
                                                            <th class=\"text-center\">Opción</th>
                                                        </tr>
                                                    </thead><tbody></tbody></table>";
  
    
    $query_recetas = datosReceta($id_des);
    while ($row2 = pg_fetch_array($query_recetas)) {
        $fecha_programada = $row2['fecha_programada'];
        
            $imp.="<tr>
        <td>$fecha_programada</td>
            </tr>";
    }
    

       
    }
    $imp.="";

//echo rand(5, 15);
    echo $imp;
?>
