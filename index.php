<?php
include 'include/head.php';
include 'include/banner.php';
/* Parametros de conexion */

function Medicamento() {
    /* Parametros de conexion */
    include('conexion.php');
    $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
    $query = "select id,nombre_medicamento from medicamento order by nombre_medicamento";
    $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
    $combo = "<select class='form-control medicamento1' data-placeholder=\"Seleccione...\" id='medicamento' name='medicamentos[]' width:'auto' required>
	  ";
    $combo.="<option value=\"\"></option>";

    while ($row = pg_fetch_array($resultado)) {
        $combo.="<option value='" . $row['id'] . "'>" . $row['nombre_medicamento'] . "</option>";
    }
    $combo.="</select>";
    pg_close($conexion);
    return($combo);
}

function Especialidad() {
    /* Parametros de conexion */
    include('conexion.php');
    $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
    $query = "select id,nombre_especialidad from especialidades order by nombre_especialidad";
    $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
    $combo = "<select class='form-control medicamento2' data-placeholder=\"Seleccione...\" id='especialidad' name='especialidad' width:'auto' required>
	  ";
    $combo.="<option value=\"\"></option>";

    while ($row = pg_fetch_array($resultado)) {
        $combo.="<option value='" . $row['id'] . "'>" . $row['nombre_especialidad'] . "</option>";
    }
    $combo.="</select>";
    pg_close($conexion);
    return($combo);
}

function Medico() {
    /* Parametros de conexion */
    include('conexion.php');
    $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
    $query = "select id,nombre_medico from medicos order by nombre_medico";
    $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
    $combo = "<select class='form-control medicamento3' data-placeholder=\"Seleccione...\" id='medico' name='medicos' width:'auto' required>
	  ";
    $combo.="<option value=\"\"></option>";

    while ($row = pg_fetch_array($resultado)) {
        $combo.="<option value='" . $row['id'] . "'>" . $row['nombre_medico'] . "</option>";
    }
    $combo.="</select>";
    pg_close($conexion);
    return($combo);
}
?>

<html>
    <head>
        <title>.:::RECETAS:::.</title>
        <link rel="stylesheet" href="public/validation/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="public/validation/dist/css/formValidation.css"/>
        <script type="text/javascript" src="public/validation/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="public/validation/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="public/validation/dist/js/formValidation.js"></script>
        <script type="text/javascript" src="public/validation/dist/js/language/es_ES.js"></script>
        <script type="text/javascript" src="public/validation/dist/js/framework/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="public/css/select.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="public/css/docs.css" media="screen" />
        <script type="text/javascript" src="public/chosen/chosen.jquery.min.js"></script> 
        <script type="text/javascript" src="public/js/bootstrap-select.js"></script>
        <script type="text/javascript" src="public/calendar/jquery-ui.js"></script>
        <script type="text/javascript" src="paciente.js"></script>
        <script type="text/javascript" src="public/icheck/icheck.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="public/calendar/jquery-ui.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap-theme.min.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="public/css/hovernav.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="public/css/font-awesome.min.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="public/chosen/choosen-bootstrap.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="public/icheck/skins/square/blue.css" media="screen"/>
        <script type="text/javascript" src="addRecetas.js"></script>
        <script type="text/css">
            .table td {
                text-align: center;   
            }
        </script>
    </head>
    <body>
<?php echo banner(); ?>
      
        <div class="container">
            <div class="row">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#">Ingreso</a></li>
                <li role="presentation"><a href="verificacionRecetas/verificacion.php">Verificación Recetas</a></li>
                <li role="presentation"><a href="mostrar/mostrarRecetas.php">Mostrar Recetas</a></li>
                <li role="presentation"><a href="../consejeria/consejeria.php">Atención Farmacéutica</a></li>
            </ul>
        </div>
        </div>
        
        <br><br>
        <div class="container">
            <form  method="post" action="guardar/guardar.php" class="form-horizontal">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="numero_expediente" class="col-lg-4 control-label">N° de Expediente :</label>
                        <div class="col-lg-8">
                            <div class='input-group'>
                                <span class="input-group-addon" id="start-date" ><i class="fa fa-folder-open fa-adjust" style="color:red"></i></span>
                                <input type="text" class="form-control" id="numero_expediente" name="numero_expediente" placeholder="N° de Expediente" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="col-lg-4 control-label">Nombre :</label>
                        <div class="col-lg-8">
                            <div class='input-group'>
                                <span class="input-group-addon" id="start-date" ><i class="fa fa-user-plus fa-adjust" style="color:blue"></i></span>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Paciente" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="nombre" class="col-lg-4 control-label">Fecha Programada :</label>
                        <div class="col-lg-8">
                            <div class='input-group'>
                                <span class="input-group-addon" id="start-date" ><i class="fa fa-user-plus fa-adjust" style="color:blue"></i></span>
                                <input type="date" required="" name="fecha_programada" class="form-control" size="3" placeholder="Ingrese la fecha programada de la receta">
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="col-md-6">
                    
                    
                    <div class="form-group">
                        <label for="nombre" class="col-lg-4 control-label">Medico :</label>
                        <div class="col-lg-8">
                            <?php echo Medico();?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="nombre" class="col-lg-4 control-label">Especialidad :</label>
                        <div class="col-lg-8">
                            <?php echo Especialidad();?>
                        </div>
                    </div>

                </div>
                </div>
                
                <div class="row">
                    <div class="col-md-2">&nbsp;
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-hover">
                                                    <caption><h4>Recetas</h4></caption>
                                                    <thead>
                                                        <tr class="info">
                                                            <th class="col-md-1 text-center">N°</th>
                                                            <th class="col-md-6 text-center">Medicamento</th>
                                                            <th class="col-md-2 text-center">Cantidad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        <tr id="entry1" class="clonado">
                                                            <td class="text-center">1</td>    
                                                          
                                                            <td>
                                                                <?php echo Medicamento(); ?>
                                                            </td>
                                                            <td>
                                            
                                                <input type="text" class="form-control" id="cantidad" name="cantidad[]" placeholder="Cantidad" size="3" required>
                                                            </td>
                                                    </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="1" align="center">
        
                                                                <button type="button"  class="btn btn-success clsAgregarFila">
                                                                    <i class="fa fa-plus"></i>   Agregar
                                                                </button>
                                                            </td>
                                                            <td align="center" colspan="1">
                                                                <button type="button" id="btnDelete" name="btnDel" class="btn btn-danger"><i class="fa fa-minus-circle fa-adjust"></i> Eliminar</button>
                                                            </td>
                                                            <td align="center" colspan="1">

                                                                <button type="submit" name="Guardar" class="btn btn-info"><i class="fa fa-minus-circle fa-adjust"></i> Guardar</button>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                    </div>
                    <div class="col-md-2">&nbsp;
                    </div>
                </div>

              
                        



            </form>
            <br>
            <br>
            <br>
            
            <div id="respuesta">
            </div>
        </div>
    </body>
</html>

