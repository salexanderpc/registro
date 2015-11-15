<?php
/* Parametros de conexion */
require 'consulta.php';
    include('../conexion.php');
    $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
    
    
    //hacer la consulta con las restricciones que tenga transaccion_id = 6 o transacción id = 3
$query_mostrar= "select des.id as id_desc,exp.numero_expediente,pac.nombre,esp.nombre_especialidad from 
            desc_recetas des inner join expediente exp
            on des.expediente_id = exp.id 
            inner join paciente pac on exp.paciente_id = pac.id 
            inner join especialidades esp on des.especialidades_id = esp.id where 
             des.transaccion_id = 3";

$resultado = pg_query($conexion, $query_mostrar) or die("Error en la Consulta SQL");

$imp="";
while ($row = pg_fetch_array($resultado)) {
    $especialidad = $row['nombre_especialidad'];
    $id_des = $row['id_desc'];
    $nombre = $row['nombre'];
    $num_exp = $row['numero_expediente'];
    
    //En este bucle hacer la consulta y tomar en cuenta si la consulta devuelve mas resultados y 
    //que el estado de la receta no sea pendiente.
    
    $query_recetas = datosReceta($id_des);
    
    $hay_datos = pg_num_rows($query_recetas);
    if($hay_datos == 0)
    {
        continue;
    }
    
    $imp.= "<table class=\"table table-bordered \">
                                                    <caption>
                                                    </caption>
                                                    <thead>
                                                        <tr>
                                                        
                                                        <td bgcolor=\"\" class=\"success text-left\" colspan=\"4\"><button type=\"button\" onclick=\"ProcesarRecetaDesp($id_des,$num_exp,1)\" class=\"btn btn-primary\"><i class=\"fa fa-share\"></i>&nbsp;&nbsp;Despachar Receta</button></td>
                                                        <td class=\"success text-left\"colspan=\"4\"><button type=\"button\" onclick=\"ProcesarReceta($id_des,$num_exp,2)\" class=\"btn btn-warning\">Anular Receta</button></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <th colspan=\"2\" class=\"success\">
                                                        N° Expediente : &nbsp;&nbsp;&nbsp;<mark>$num_exp</mark>
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
  
    
    
    
    while ($row2 = pg_fetch_array($query_recetas)) {
        $fecha_programada = $row2['fecha_programada'];
        $medicamento = $row2['nombre_medicamento'];
        $cantidad = $row2['cantidad'];
        $medico = $row2['nombre_medico'];
        $especialidad = $row2['nombre_especialidad'];
        $numero_expediente = $row2['numero_expediente'];
        $id_medicamento = $row2['id_medicina'];
        $id_transaccion = $row2['transaccion_id'];
        
            $fecha = date("d-m-Y", strtotime($fecha_programada));
        if($id_transaccion==6)
        {
            $imp.="<tr class=\"danger\">
        <td class=\"text-center\"><small>$fecha</small></td>
        <td class=\"text-center\"><small>$medicamento</small></td>
        <td class=\"text-center\"><small>$cantidad</small></td>
        <td class=\"text-center\"><small>$medico</small></td>
        <td class=\"text-center\"><button class=\"btn btn-info\" onclick=\"ActivarDesp($id_medicamento,'$numero_expediente')\" type=\"submit\">
                <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>&nbsp;Despachar</button></td>   
                <td class=\"text-center\" ><button disabled class=\"btn btn-danger\" onclick=\"PendienteDesp($id_medicamento,'$numero_expediente')\" type=\"submit\">
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
                <td class=\"text-center\"><button data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tooltip on top\" class=\"btn btn-danger\" onclick=\"PendienteDesp($id_medicamento,'$numero_expediente')\" type=\"submit\">
                <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>&nbsp;Pendiente</button></td>
            </tr>";
        }
    }
    
    $imp.="<tr><td colspan=\"7\" class=\"warning\"><br></td></tr></tbody></table><hr>";
    

       
    }
    $imp.="";

//echo rand(5, 15);
    echo $imp;
?>
