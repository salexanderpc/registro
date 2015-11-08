<?php
/* Verificar si alguna de los medicamentos que componen la receta esta con el estado de 6 Pendiente 
si es asi entonces tendra que dejar en estado de la receta en 1 para que solo muestre el medicamento
 * que ha quedado pendiente  */

/* si la consulta no da resultados entonces actualizar el id de la receta a procesada Recepcion */


include('../conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());

$id_receta = $_POST['id_receta_desc'];
$expediente = $_POST['expediente'];
$bandera = $_POST['bandera'];

if($bandera == 1)
{
    //echo 'Hacer Procesos para poner la receta en estado de enviar a despacho';
    $query="select des.id as id_des,rec.id as id_rec from desc_recetas des inner join expediente exp
            on des.expediente_id = exp.id
            inner join recetas_programadas rec
            on rec.desc_recetas_id = des.id where exp.numero_expediente ='$expediente' and
            rec.transaccion_id = 6 and des.id = $id_receta";
    
    $resultado = pg_query($conexion, $query) or die("Error en la Consult SQL");
    $pendientes = pg_num_rows($resultado);
    
    if($pendientes > 0)
    {
       // echo 'pendientes';
        $query = "update recetas_programadas set transaccion_id = 3 where desc_recetas_id = $id_receta and transaccion_id <> 6";
        $resultado = pg_query($conexion, $query) or die("Error en la Consult SQL");
    }
    else
    {
        //echo 'no hay pendientes';
        $query = "update recetas_programadas set transaccion_id = 3 where desc_recetas_id = $id_receta ";
        $resultado = pg_query($conexion, $query) or die("Error en la Consult SQL");
        
        /* actualizar el estado de desc_receta para cerrarla */
        $query = "update desc_recetas set transaccion_id = 3 where id = $id_receta";
        $resultado = pg_query($conexion, $query) or die("Error en la Consult SQL");
    }
    /*si esta query tiene num_rows > 0  tiene una receta pendiente +
      entonces hacer update de las recetas que no tienen estado igual a 6 
      
     *  pero si tiene num_rows = 0 entonces actualizar todas las recetas a procesadas recepcion
     *  asociadas a desc_recetas y actualizar en desc_recetas el id_transaccion     */
}
else
{
    echo 'Hacer Procesos para poner estado de la receta como anulada';
}

?>