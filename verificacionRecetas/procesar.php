<?php
 /* Parametros de conexion */
require 'consulta.php';
include('../conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
$numero_expediente = $_POST['name'];

 
//$query = "select  exp.numero_expediente,rec.id as id_medicamento,des.id as id_desc, des.fecha_programada,exp.id as id_expediente,
//	pac.nombre,m.nombre_medico,esp.nombre_especialidad, med.nombre_medicamento
//	,rec.cantidad from desc_recetas des
//	inner join expediente exp on des.expediente_id = exp.id  
//	inner join paciente pac on exp.paciente_id = pac.id 
//	inner join medicos m on des.medicos_id = m.id
//	inner join especialidades esp on des.especialidades_id = esp.id
//	inner join recetas_programadas rec on des.id = rec.desc_recetas_id
//	inner join medicamento med on rec.medicamento_id = med.id
//	where exp.numero_expediente = '$numero_expediente' and transaccion_id = 1 order by des.fecha_programada,id_desc,med.nombre_medicamento";

$query = "select des.id as id_desc,exp.numero_expediente,pac.nombre from desc_recetas des inner join expediente exp
            on des.expediente_id = exp.id 
            inner join paciente pac on exp.paciente_id = pac.id where exp.numero_expediente = '$numero_expediente'";

$resultado = pg_query($conexion, $query) or die("Error en la Consult SQL");

while ($row = pg_fetch_array($resultado)) {
        
    /*En este while tomare el id crear una consulta con el id de la receta para mostrar todas las asociadas */
          $id_desc = $row['id_desc'];
          $numero_expediente = $row['numero_expediente'];
          $nombre =$row['nombre'];
//        $numero_expediente = $row['numero_expediente'];
//        $id_medicamento = $row['id_medicamento'];
//        $id_desc = $row['id_desc'];
//        $id_expediente = $row['id_expediente'];
//        $fecha_programada = $row['fecha_programada'];
//        $nombre = $row['nombre'];
//        $medico = $row['nombre_medico'];
//        $especialidad = $row['nombre_especialidad'];
//        $medicamento = $row['nombre_medicamento'];
//        $cantidad = $row['cantidad'];
        
        
        $imp.= "<table class=\"table table-bordered \">
                                                    <caption>
                                                    </caption>
                                                    <thead>
                                                        <tr>
                                                        
                                                        <td class=\"success text-left\" colspan=\"4\"><button type=\"button\" onclick=\"ProcesarReceta($id_receta,$numero_expediente,1)\" class=\"btn btn-info\">Despachar Todo</button></td>
                                                        <td class=\"success text-left\"colspan=\"3\"><button type=\"button\" onclick=\"ProcesarReceta($id_receta,$numero_expediente,2)\" class=\"btn btn-warning\">Anular Receta</button></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <th colspan=\"3\" class=\"success\">
                                                        N° Expediente : &nbsp;&nbsp;&nbsp;<mark>$numero_expediente</mark>
                                                        </th>
                                                        <th colspan=\"1\" class=\"text-right success\">Nombre : </th>
                                                        <td colspan=\"3\" class=\"success\"><mark>$nombre</mark></td>
                                                        </tr>
                                                        <tr class=\"info\">
                                                            <th class=\"col-md-1 text-center\">Fecha<br>Programada</th>
                                                            <th class=\"col-md-3 text-center\">Medicamento</th>
                                                            <th class=\"col-md-1 text-center\">Cantidad</th>
                                                            <th class=\"col-md-3 text-center\">Médico</th>
                                                            <th class=\"col-md-2 text-center\">Especialidad</th>
                                                            <th colspan=\"2\" class=\"text-center\">Opción</th>
                                                        </tr>
                                                    </thead><tbody>";
        $query_recetas = datosRecetaActivar($id_desc,$numero_expediente);
        while ($row2 = pg_fetch_array($query_recetas)) {
                    $id_medicamento = $row2['id_medicamento'];
        $id_desc = $row2['id_desc'];
        $id_expediente = $row2['id_expediente'];
        $fecha_programada = $row2['fecha_programada'];
        $nombre = $row2['nombre'];
        $medico = $row2['nombre_medico'];
        $especialidad = $row2['nombre_especialidad'];
        $medicamento = $row2['nombre_medicamento'];
        $cantidad = $row2['cantidad'];
        
        $fecha = date("d-m-Y", strtotime($fecha_programada));
        $imp.="<tr>
        <td class=\"text-center\"><small>$fecha</small></td>
        <td class=\"text-center\"><small>$medicamento</small></td>
        <td class=\"text-center\"><small>$cantidad</small></td>
        <td class=\"text-center\"><small>$medico</small></td>
        <td class=\"text-center\"><small>$especialidad</small></td>
        <td><button class=\"btn btn-info\" onclick=\"miFuncion($id_medicamento,$id_expediente,'$numero_expediente')\" type=\"submit\">
                <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>&nbsp;Despachar</button></td>   
                <td><button class=\"btn btn-danger\" onclick=\"Anular($id_medicamento,$id_expediente,'$numero_expediente')\" type=\"submit\">
                <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>&nbsp;Pendiente</button></td>
            </tr>";
        }
        
        $imp.="<tr><td colspan=\"7\" class=\"info\"></td></tr></tbody></table>";

    }
 
echo $imp ;
 
?>
