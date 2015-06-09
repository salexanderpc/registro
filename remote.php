<?php
// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:
// http://domain.com/demo/remote.html

header('Content-type: application/json');

//sleep(5);

$valid = true;

$usuario = $_POST['numero_expediente'];

/*Parametros de conexion*/
include('conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
//echo "<h3>Conexion Exitosa PHP - PostgreSQL</h3><hr><br>";
$query = "select id, numero_exp from mnt_expediente where numero_exp ='$usuario'";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
$numReg = pg_num_rows($resultado);

if($numReg>0)
{
    $valid = false;
}


echo json_encode(array(
    'valid' => $valid,
));
