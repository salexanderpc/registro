<?php

$time = time();
$fecha_retiro= date("Y-m-d H:i:s", $time);

 $numero_expediente = $_POST['numero_expediente'];
$nombre = $_POST['nombre'];

$fecha_programada = $_POST['fecha_programada'];
$medicamentos = $_POST['medicamentos'];
$cantidad = $_POST['cantidad'];
$medicos = $_POST['medicos'];
$especialidad = $_POST['especialidad'];


/* Parametros de conexion */
    include('../conexion.php');
    $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
    $query = "select id,nombre_medicamento from medicamento order by nombre_medicamento";
    $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
    
    
    /*Verificar si esta registrado el numero de expediente */
    /* si esta registrado recuperar el id expediente */
    
   
    
   $query = "select * from expediente where numero_expediente = '$numero_expediente'";
   $resultado = pg_query($conexion,$query) or die("Error en consulta SQL");
   $contar = pg_num_rows($resultado);
   if($contar > 0)
   {
       while ($row = pg_fetch_array($resultado)) {
       $id_expediente = $row['id'];
       $id_paciente = $row['paciente_id'];
       $numero_expediente = $row['numero_expediente'];
    }
    
    /*Crear una desc_recetas*/
    $query = "insert into desc_recetas(expediente_id,especialidades_id,medicos_id,fecha_programada)"
            . "values($id_expediente,$especialidad,$medicos,'$fecha_programada')";
    
    $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
    
    /*recuperar id _desc_recetas*/
    $query = "select id from desc_recetas where expediente_id = $id_expediente order by id desc limit 1";
    $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
    
     while ($row = pg_fetch_array($resultado)) {
        $id_desc = $row['id'];
    }
    
    /*ingresar recetas_programadas*/
     for ($i = 0; $i < count($medicamentos); $i++) {
         $query = "insert into recetas_programadas(transaccion_id,desc_recetas_id,medicamento_id,cantidad,recepcion,despacho,fecha_retiro)"
                 . "values(1,$id_desc,$medicamentos[$i],$cantidad[$i],'FALSE','FALSE','$fecha_retiro')";
         
         $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
     }
     
//    /* insertar los datos */
//    for ($i = 0; $i < count($medicamentos); $i++) {
//    /* insertar todos los medicamentos y demas */
//    $query = "insert into recetas(especialidades_id,medicamento_id,medicos_id,expediente_id,fecha_programada,cantidad,recepcion,despacho,fecha_retiro)"
//            . "values($especialidad[$i],$medicamentos[$i],$medicos[$i],$id_expediente,'$fecha_programada[$i]',$cantidad[$i],'FALSE','FALSE','$fecha_retiro')";
//    $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
//}

    header ("Location: view_guardar.php");
    
   }
   else
   {
        /* Primero insertar el nombre */
    /* Recuperar el id de ultimo nombre insertado */
    /* insertar en table expediente */
    /* recuperar el ultimo id del expediente */
       $query ="insert into paciente(nombre) values('$nombre')";
       $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
       
       $query = "select * from paciente where nombre = '$nombre' order by id desc limit 1";
       $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
       
       while ($row = pg_fetch_array($resultado)) {
           $id = $row['id'];
        }
        
        /*insertar expediente*/
        $query = "insert into expediente(paciente_id,numero_expediente) values($id,'$numero_expediente')";
        $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
        
       $query = "select * from expediente where numero_expediente = '$numero_expediente' order by id desc limit 1";
       $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
       
       while ($row = pg_fetch_array($resultado)) {
           $id_expediente = $row['id'];
        }
        
        
        
        /*Crear una desc_recetas*/
    $query = "insert into desc_recetas(expediente_id,especialidades_id,medicos_id,fecha_programada)"
            . "values($id_expediente,$especialidad,$medicos,'$fecha_programada')";
    
    $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
    
    /*recuperar id _desc_recetas*/
    $query = "select id from desc_recetas where expediente_id = $id_expediente order by id desc limit 1";
    $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
    
     while ($row = pg_fetch_array($resultado)) {
        $id_desc = $row['id'];
    }
    
    /*ingresar recetas_programadas*/
     for ($i = 0; $i < count($medicamentos); $i++) {
         $query = "insert into recetas_programadas(transaccion_id,desc_recetas_id,medicamento_id,cantidad,recepcion,despacho,fecha_retiro)"
                 . "values(1,$id_desc,$medicamentos[$i],$cantidad[$i],'FALSE','FALSE','$fecha_retiro')";
         
         $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
     }
         
        
//         for ($i = 0; $i < count($medicamentos); $i++) {
//    /* insertar todos los medicamentos y demas */
//    $query = "insert into recetas(especialidades_id,medicamento_id,medicos_id,expediente_id,fecha_programada,cantidad,recepcion,despacho,fecha_retiro)"
//            . "values($especialidad[$i],$medicamentos[$i],$medicos[$i],$id_expediente,'$fecha_programada[$i]',$cantidad[$i],'FALSE','FALSE','$fecha_retiro')";
//    $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
//}

header ("Location: view_guardar.php");
   }
   


?>

