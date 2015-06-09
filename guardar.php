<?php
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: index.php');
}

$time = time();
$fecha_ini = date("Y-m-d H:i:s", $time);

$expediente = $_POST['numero_expediente'];
$mnt_retiro_id = $_POST['retira'];
$nombre = $_POST['nombre_completo'];
$telefono = $_POST['telefono'];
$mnt_usuario_id = $_SESSION['id']; //usuario que registra la ATF

include('conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
$query = "insert into mnt_paciente(mnt_usuario_id,mnt_retiro_id,nombre,telefono,fecha_hora_registro) values($mnt_usuario_id,$mnt_retiro_id,'$nombre','$telefono','$fecha_ini')";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

//hacer select para id_paciente_insertado
$query="select id from mnt_paciente where mnt_usuario_id = $mnt_usuario_id and fecha_hora_registro = '$fecha_ini'";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
$numReg = pg_num_rows($resultado);
if($numReg > 0)
{
    while ($fila = pg_fetch_array($resultado)) {
        $id_paciente = $fila['id'];
    }
}

$query = "insert into mnt_expediente(mnt_paciente_id,numero_exp)values($id_paciente,$expediente)";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

header('location: principal.php');
?>


