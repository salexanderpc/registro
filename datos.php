<?php
// The back-end then will determine if the username is available or not,
// and finally returns a JSON { "valid": true } or { "valid": false }
// The code bellow demonstrates a simple back-end written in PHP

header('Content-type: application/json');

//sleep(5);

$valid = true;
// Get the username from request
$usuario = $_POST['username'];
echo $username;
/*Parametros de conexion*/
include('conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
//echo "<h3>Conexion Exitosa PHP - PostgreSQL</h3><hr><br>";
$query = "select id, usuario from mnt_usuario where usuario ='$usuario'";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
$numReg = pg_num_rows($resultado);

// Check its existence (for example, execute a query from the database) ...
if($numReg>0)
{
    $isAvailable = false; 
}
else
{
$isAvailable = true; // or false
}
// Finally, return a JSON
echo json_encode(array(
    'valid' => $isAvailable,
));