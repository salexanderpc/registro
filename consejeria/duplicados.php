<?php
include "../verificacionRecetas/consulta.php";
$desc = $_GET['desc_receta'];
$numero_expediente = $_GET['numero_exp'];

include('../conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
    
    
$query = "select des.id as id_desc,exp.numero_expediente,pac.nombre,esp.nombre_especialidad from 
            desc_recetas des inner join expediente exp
            on des.expediente_id = exp.id 
            inner join paciente pac on exp.paciente_id = pac.id 
            inner join especialidades esp on des.especialidades_id = esp.id where exp.numero_expediente = '$numero_expediente'
            and des.transaccion_id in (1,6)";

$resultado = pg_query($conexion, $query) or die("Error en la Consult SQL");



?>
 <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Modal title</h4>
            </div>			<!-- /modal-header -->
            <div class="modal-body">
            <!--<p>Excitavit hic ardor milites per municipia plurima, quae isdem conterminant, dispositos et castella, sed quisque serpentes latius pro viribus repellere moliens, nunc globis confertos, aliquotiens et dispersos multitudine superabatur ingenti.</p>-->
            <?php
                while ($row = pg_fetch_array($resultado)) {
        
    /*En este while tomare el id crear una consulta con el id de la receta para mostrar todas las asociadas */
          $id_desc = $row['id_desc'];
          $numero_expediente = $row['numero_expediente'];
          $nombre =$row['nombre'];
          $especialidad = $row['nombre_especialidad'];
          ?>
        
        
        <table class="table table-bordered">
                                                    <caption>
                                                    </caption>
                                                    <thead>
                                                        <tr>
                                                        
                                                        <td  class="success text-left" colspan="4"><button type="button" onclick="ProcesarReceta($id_desc,$numero_expediente,1)" class="btn btn-primary"><i class="fa fa-share"></i>&nbsp;&nbsp;Enviar Receta</button></td>
                                                        <td class="success text-left"colspan="4"><button type="button" onclick="ProcesarReceta($id_desc,$numero_expediente,2)" class="btn btn-warning">Anular Receta</button></td>
                                                        
                                                        </tr>
                                                        <tr>
                                                        <th colspan="2" class="success">
                                                        N° Expediente : &nbsp;&nbsp;&nbsp;<mark><?php echo $numero_expediente;?></mark>
                                                        </th>
                                                        <th colspan="2" class="text-left success">Nombre : <mark><?php echo $nombre;?></mark></th>
                                                        <th colspan="3" class="success">Especialidad : <mark><?php echo $especialidad;?></mark></th>
                                                        </tr>
                                                        <tr class="warning">
                                                            <th class="col-md-1 text-center">Fecha<br>Programada</th>
                                                            <th class="col-md-3 text-center">Medicamento</th>
                                                            <th class="col-md-1 text-center">Cantidad</th>
                                                            <th class="col-md-3 text-center">Médico</th>
                                                            <th colspan="3" class="text-center">Opción</th>
                                                        </tr>
                                                    </thead><tbody>
        <?php                                                
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
            ?>
        <tr class="danger">
        <td class="text-center"><small><?php echo $fecha; ?></small></td>
        <td class="text-center"><small><?php echo $medicamento; ?></small></td>
        <td class="text-center"><small><?php echo $cantidad;?></small></td>
        <td class="text-center"><small><?php echo $medico;?></small></td>
        <td class="text-center"><button class="btn btn-info" onclick="Activar($id_medicamento,'$numero_expediente')" type="submit">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Despachar</button></td>   
                <td class="text-center" ><button disabled class="btn btn-danger" onclick="Pendiente($id_medicamento,'$numero_expediente')" type="submit">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Pendiente</button></td>
            </tr>
            <?php
        }
        else
        {?>
        <tr class="info">
        <td class="text-center"><small><?php echo $fecha; ?></small></td>
        <td class="text-center"><small><?php echo $medicamento; ?></small></td>
        <td class="text-center"><small><?php echo $cantidad;?></small></td>
        <td class="text-center"><small><?php echo $medico;?></small></td>
        <td class="text-center"><button class="btn btn-info" onclick="Activar($id_medicamento,'$numero_expediente')" type="submit">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Despachar</button></td>   
                <td class="text-center" ><button disabled class="btn btn-danger" onclick="Pendiente($id_medicamento,'$numero_expediente')" type="submit">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Pendiente</button></td>
            </tr>
            <?php 
        }
        
        }?>
        
        <tr><td colspan="7" class="warning"><br></td></tr></tbody></table><hr>
        
<?php 
    }
            
            ?>
            </div>			<!-- /modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>