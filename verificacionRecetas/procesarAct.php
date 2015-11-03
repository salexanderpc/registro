<?php
 
//$con = mysql_connect('localhost','pruebas','12345') or die('Error en conexion a la DB');
//mysql_select_db('jquery', $con) or die('Error al seleccionar la DB');
include('../conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());

$id_expediente = $_POST['id_expediente'];
$id_medicamento = $_POST['id_medicamento'];
$expediente = $_POST['expediente'];

/* crear actualizacion para medicamento */

$query_actualiza = "update recetas_programadas set transaccion_id = 2, recepcion = 'TRUE' where id=$id_medicamento";
$resultado = pg_query($conexion, $query_actualiza) or die("Error en la Consulta SQL");

/* hacer consulta de nuevo para mostrar la tabla actualizada*/
 
//$query = "select des.id as id_desc, des.fecha_programada,
//	pac.nombre,m.nombre_medico,esp.nombre_especialidad, med.nombre_medicamento
//	,rec.cantidad from desc_recetas des
//	inner join expediente exp on des.expediente_id = exp.id  
//	inner join paciente pac on exp.paciente_id = pac.id 
//	inner join medicos m on des.medicos_id = m.id
//	inner join especialidades esp on des.especialidades_id = esp.id
//	inner join recetas_programadas rec on des.id = rec.desc_recetas_id
//	inner join medicamento med on rec.medicamento_id = med.id
//	where exp.numero_expediente = '10-01' order by des.fecha_programada,id_desc,med.nombre_medicamento";
//
//$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
//
//$imp = "<table class=\"table table-bordered table-hover\">
//                                                    <caption><h4>Recetas</h4></caption>
//                                                    <thead>
//                                                        <tr class=\"info\">
//                                                            <th class=\"text-center\">Fecha<br>Programada</th>
//                                                            <th class=\"text-center\">Medicamento</th>
//                                                            <th class=\"text-center\">Cantidad</th>
//                                                            <th class=\"text-center\">Médico</th>
//                                                            <th class=\"text-center\">Especialidad</th>
//                                                            <th class=\"text-center\">Opción</th>
//                                                        </tr>
//                                                    </thead><tbody>";
//$id_ini=""; $i=0;
//while ($row = pg_fetch_array($resultado)) {
//        $id_desc = $row['id_desc'];
//        $fecha_programada = $row['fecha_programada'];
//        $nombre = $row['nombre'];
//        $medico = $row['nombre_medico'];
//        $especialidad = $row['nombre_especialidad'];
//        $medicamento = $row['nombre_medicamento'];
//        $cantidad = $row['cantidad'];
//        
//           
//        
//        if($id_ini==$id_desc)
//        {
//           $imp.="<tr>
//                <td>$fecha_programada</td>
//                <td>$medicamento</td>  
//                <td>$cantidad</td> 
//                <td>$medico</td> 
//                <td>$especialidad</td> 
//                <td><button class=\"btn btn-info\" onclick=\"miFuncion($cantidad)\" type=\"submit\">
//                <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>&nbsp;Procesar</button></td>    
//                </tr>";
//        }
//        else
//        {
//            if($i==0)
//            {
//                
//                $imp.="<tr>
//                <td>$fecha_programada</td>
//                <td>$medicamento</td>  
//                <td>$cantidad</td> 
//                <td>$medico</td> 
//                <td>$especialidad</td> 
//                <td><button class=\"btn btn-info\" type=\"submit\">
//                <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>&nbsp;Procesar</button></td>
//                </tr>";
//            }else
//            {
//                $imp.="<tr class=\"danger\"><td colspan=\"6\" rowspan=\"\"></td></tr>";
//                
//                $imp.="<tr class=\"danger\"><td colspan=\"6\"></td></tr>";
//                $imp.="<tr>
//                <td>$fecha_programada</td>
//                <td>$medicamento</td>  
//                <td>$cantidad</td> 
//                <td>$medico</td> 
//                <td>$especialidad</td> 
//                <td><button class=\"btn btn-info\" type=\"submit\">
//                <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>&nbsp;Procesar</button></td>    
//                </tr>";
//            }
//             
//            
//        }
//        
//        $id_ini= $id_desc;
//        $i++;
//    }
//    $imp.="</tbody></table>";
////$res = mysql_query("INSERT INTO users(nombre,pass) VALUES('$nombre','$pass')");
////if(mysql_affected_rows()>0){
////	echo "1";
////}
////else{
////	echo "2";
////}
 
echo $id_expediente ;
 
?>
