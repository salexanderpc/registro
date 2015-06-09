<?php
/*Parametros Recibidos por Post*/
$usuario = $_POST['usuario'];
$contrasenia = $_POST['password'];


/*Parametros de conexion*/
include('conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
//echo "<h3>Conexion Exitosa PHP - PostgreSQL</h3><hr><br>";
$query = "select id, usuario, contrasenia from mnt_usuario where usuario ='$usuario' and contrasenia = '$contrasenia' ";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
$numReg = pg_num_rows($resultado);
/*Cierre de parametros de conexion*/

if($numReg>0){
echo "<table border='1' align='center'>
<tr bgcolor='skyblue'>
<th>ID</th>
<th>Usuario</th>
<th>Contrasena</th></tr>";
session_start();
while ($fila=pg_fetch_array($resultado)) {
    $_SESSION['usuario']=$fila['usuario'];
    $_SESSION['id'] = $fila['id'];
}
        header('location: principal.php');
                echo "</table>";
}else{  ?>
    <script>
alert('Usuario o Contraseña incorrecto');
window.location.href='index.php';
</script><?php
    //header('location:index.php');
}

pg_close($conexion);

?>

