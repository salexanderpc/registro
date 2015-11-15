<?php
 /* Parametros de conexion */
require 'consulta.php';
include('../conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
$numero_expediente = $_POST['name'];

 
$query = "select des.id as id_desc,exp.numero_expediente,pac.nombre,esp.nombre_especialidad from 
            desc_recetas des inner join expediente exp
            on des.expediente_id = exp.id 
            inner join paciente pac on exp.paciente_id = pac.id 
            inner join especialidades esp on des.especialidades_id = esp.id where exp.numero_expediente = '$numero_expediente'
            and des.transaccion_id in (1,6)";

$resultado = pg_query($conexion, $query) or die("Error en la Consult SQL");

$consulta = pg_num_rows($resultado);

if($consulta>0)
{

while ($row = pg_fetch_array($resultado)) {
        
    /*En este while tomare el id crear una consulta con el id de la receta para mostrar todas las asociadas */
          $id_desc = $row['id_desc'];
          $numero_expediente = $row['numero_expediente'];
          $nombre =$row['nombre'];
          $especialidad = $row['nombre_especialidad'];
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
                                                        
                                                        <td bgcolor=\"\" class=\"success text-left\" colspan=\"4\"><button type=\"button\" onclick=\"ProcesarReceta($id_desc,$numero_expediente,1)\" class=\"btn btn-primary\"><i class=\"fa fa-share\"></i>&nbsp;&nbsp;Enviar Receta</button></td>
                                                        <td class=\"success text-left\"colspan=\"4\"><button type=\"button\" onclick=\"ProcesarReceta($id_desc,$numero_expediente,2)\" class=\"btn btn-warning\">Anular Receta</button></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <th colspan=\"2\" class=\"success\">
                                                        N° Expediente : &nbsp;&nbsp;&nbsp;<mark>$numero_expediente</mark>
                                                        </th>
                                                        <th colspan=\"2\" class=\"text-left success\">Nombre : <mark>$nombre</mark></th>
                                                        <th colspan=\"3\" class=\"success\">Especialidad : <mark>$especialidad</mark></th>
                                                        </tr>
                                                        <tr class=\"warning\">
                                                            <th class=\"col-md-1 text-center\">Fecha<br>Programada</th>
                                                            <th class=\"col-md-3 text-center\">Medicamento</th>
                                                            <th class=\"col-md-1 text-center\">Cantidad</th>
                                                            <th class=\"col-md-3 text-center\">Médico</th>
                                                            <th colspan=\"3\" class=\"text-center\">Opción</th>
                                                        </tr>
                                                    </thead><tbody>";
        $query_recetas = datosRecetaActivar($id_desc,$numero_expediente);
        while ($row2 = pg_fetch_array($query_recetas)) {
        $id_transaccion = $row2['transaccion_id'];    
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
        if($id_transaccion==6)
        {
            $imp.="<tr class=\"danger\">
        <td class=\"text-center\"><small>$fecha</small></td>
        <td class=\"text-center\"><small>$medicamento</small></td>
        <td class=\"text-center\"><small>$cantidad</small></td>
        <td class=\"text-center\"><small>$medico</small></td>
        <td class=\"text-center\"><button class=\"btn btn-info\" onclick=\"Activar($id_medicamento,'$numero_expediente')\" type=\"submit\">
                <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>&nbsp;Despachar</button></td>   
                <td class=\"text-center\" ><button disabled class=\"btn btn-danger\" onclick=\"Pendiente($id_medicamento,'$numero_expediente')\" type=\"submit\">
                <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>&nbsp;Pendiente</button></td>
            </tr>";
        }
        else
        {
            $imp.="<tr class=\"info\">
        <td class=\"text-center\"><small>$fecha</small></td>
        <td class=\"text-center\"><small>$medicamento</small></td>
        <td class=\"text-center\"><small>$cantidad</small></td>
        <td class=\"text-center\"><small>$medico</small></td>
        <td class=\"text-center\"><button disabled  class=\"btn btn-info\" onclick=\"Activar($id_medicamento,'$numero_expediente')\" type=\"submit\">
                <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>&nbsp;Despachar</button></td>   
                <td class=\"text-center\"><button data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tooltip on top\" class=\"btn btn-danger\" onclick=\"Pendiente($id_medicamento,'$numero_expediente')\" type=\"submit\">
                <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>&nbsp;Pendiente</button></td>
            </tr>";
        }
        
        }
        
        $imp.="<tr><td colspan=\"7\" class=\"warning\"><br></td></tr></tbody></table><hr>";
        

    }
    
 
}
else
{
    $imp = 1;
}


echo $imp ;
 
?>
