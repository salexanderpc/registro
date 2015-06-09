<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: ../index.php');
}

function Hospital() {
            /* Parametros de conexion */
include('../conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
$query = "select id,nombre_hospital from tbl_hospital_referencia";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
            $combo = "<select class='form-control tbl_hospital'  data-placeholder=\"Seleccione...\" id='hospital_ref' name='hospital_ref' required>
	  ";
             $combo.="<option value=\"\"></option>";
            while ($row = pg_fetch_array($resultado)) {
                $combo.="<option value='" . $row['id'] . "'>". $row['nombre_hospital'] . "</option>";
            }
            $combo.="</select>";
            return($combo);
        }

function Estado_Civil() {
            /* Parametros de conexion */
include('../conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
$query = "select id,estado_civil from tbl_estado_civil";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
            $combo = "<select class='form-control tbl_estado_civil' data-placeholder=\"Seleccione...\" id='estado_civil' name='estado_civil' required>
	  ";
             $combo.="<option value=\"\"></option>";
            while ($row = pg_fetch_array($resultado)) {
                $combo.="<option value='" . $row['id'] . "'>". $row['estado_civil'] . "</option>";
            }
            $combo.="</select>";
            return($combo);
        }
        
function Nivel_Academico() {
            /* Parametros de conexion */
include('../conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
$query = "select id,nivel_academico from tbl_nivel_academico";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
            $combo = "<select class='form-control tbl_nivel_academico' data-placeholder=\"Seleccione...\" id='nivel_academico' name='nivel_academico' required>
	  ";
             $combo.="<option value=\"\"></option>";
            while ($row = pg_fetch_array($resultado)) {
                $combo.="<option value='" . $row['id'] . "'>". $row['nivel_academico'] . "</option>";
            }
            $combo.="</select>";
            return($combo);
        }
        
function Departamento() {
            /* Parametros de conexion */
include('../conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
$query = "select id,nombre_departamento from tbl_departamento";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
            $combo = "<select class='form-control tbl_departamento' data-placeholder=\"Seleccione...\" id='tbl_dep' name='tbl_departamento' required>
	  ";
             $combo.="<option value=\"\"></option>";
            while ($row = pg_fetch_array($resultado)) {
                $combo.="<option value='" . $row['id'] . "'>". $row['nombre_departamento'] . "</option>";
            }
            $combo.="</select>";
            return($combo);
        }

function Ocupacion() {
            /* Parametros de conexion */
include('../conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
$query = "select id,ocupacion from tbl_ocupacion";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
            $combo = "<select class='form-control tbl_ocupacion' data-placeholder=\"Seleccione...\" id='ocupacion' name='ocupacion' required>
	  ";
             $combo.="<option value=\"\"></option>";
            while ($row = pg_fetch_array($resultado)) {
                $combo.="<option value='" . $row['id'] . "'>". $row['ocupacion'] . "</option>";
            }
            $combo.="</select>";
            return($combo);
        }

//function Sexo() {
//            /* Parametros de conexion */
//include('../conexion.php');
//$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
//$query = "select id,sexo from tbl_sexo";
//$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
//            $combo = "<select class='tbl_sexo' data-placeholder=\"Seleccione...\" id='sexo' name='sexo'>
//	  ";
//             $combo.="<option value=\"\"></option>";
//            while ($row = pg_fetch_array($resultado)) {
//                $combo.="<option value='" . $row['id'] . "'>". $row['sexo'] . "</option>";
//            }
//            $combo.="</select>";
//            return($combo);
//        }
?>
<html>
    <head>
        <link rel="stylesheet" href="../public/validation/vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../public/validation/dist/css/formValidation.css"/>
        <script type="text/javascript" src="../public/validation/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../public/validation/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../public/validation/dist/js/formValidation.js"></script>
        <script type="text/javascript" src="../public/validation/dist/js/language/es_ES.js"></script>
        <script type="text/javascript" src="../public/validation/dist/js/framework/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../public/css/select.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../public/css/docs.css" media="screen" />
        <script type="text/javascript" src="../public/chosen/chosen.jquery.min.js"></script> 
        <script type="text/javascript" src="../public/js/bootstrap-select.js"></script>
        <script type="text/javascript" src="../public/calendar/jquery-ui.js"></script>
        <script type="text/javascript" src="paciente.js"></script>
        <script type="text/javascript" src="../public/icheck/icheck.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="../public/calendar/jquery-ui.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-theme.min.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/css/hovernav.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/css/font-awesome.min.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/chosen/choosen-bootstrap.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/icheck/skins/square/blue.css" media="screen"/>

        <style>
            select:invalid + .chosen-container .chosen-single {
    border-color: red;
}
        </style>
    </head>
    <body>
        
        
        <?php //echo banner();?> 
        <br><br>
        <div class="row">
            
            
                <div id="custom-bootstrap-menu" class="navbar navbar-inverse" role="navigation">
                    <div class="container-fluid">

                        <div class="collapse navbar-collapse navbar-menubuilder">
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-pushpin" aria-hidden="true" style="color:red"></span> Registro<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../paciente/AddPaciente.php">Agregar Paciente</a></li>                   
                                    </ul>
                                </li>
                                <li><a href="/products">Buscar Paciente</a>
                                </li>
                                <li><a href="/about-us">About Us</a>
                                </li>
                                <li><a href="/contact">Contact Us</a>
                                </li>
                            </ul>
                            <div class="col-md-2 pull-right">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['usuario']; ?> <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="../include/logout.php">Cerrar Sesión</a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>     
                        </div>
                    </div>
                </div> 
            
            
        </div><!-- FIN DEL BANNER -->
        
        <ul class="nav nav-tabs">
  <li class="active"><a href="#">Home</a></li>
  <li><a href="#">Menu 1</a></li>
  <li><a href="#">Menu 2</a></li>
  <li><a href="#">Menu 3</a></li>
</ul>
        
        

        <br>
        <div class="container">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><center><strong>REGISTRO DE PACIENTES</strong></center></h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" id ="formPaciente" role="form" novalidate>
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
                                    <label for="nombre_completo" class="col-lg-4 control-label">Nombre Completo :</label>
                                    <div class="col-lg-8">
                                        <div class='input-group'>
                                        <span class="input-group-addon" id="start-date" ><i class="fa fa-user" ></i></span>
                                        <input type="text" data-title="Please enter your name" required class="form-control" id="nombre_completo" name="nombre_completo" placeholder="Nombre Completo">
                                        </div>
                                    </div>
                                </div>    
                                
                                <div class="form-group">
                                    <label for="dui" class="col-lg-4 control-label">DUI :</label>
                                    <div class="col-lg-8">
                                        <div class='input-group'>
                                        <span class="input-group-addon" id="start-date" ><i class="fa fa-pencil-square-o fa-adjust" ></i></span>
                                        <input type="text" class="form-control" id="dui" name="dui" placeholder="DUI">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="fecha_nacimiento" class="col-lg-4 control-label">Fecha de Nacimiento :</label>
                                    <div class="col-lg-8">
                                        <div class='input-group'>
                                        <span class="input-group-addon" id="start-date" ><i class="fa fa-calendar fa-adjust" ></i></span>
                                        <input type="text" class="form-control" id="datepicker" name="fecha_nac" data-fv-date="false" data-fv-date-format="DD/MM/YYYY" data-fv-date-message="The birthday is not valid" >
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="sexo" class="col-lg-4 control-label">Sexo :</label>
                                    <div class="col-lg-8">                                       
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="sexo" value="1" >
                                                Masculino
                                            </label>
                                            <label>
                                                <input type="radio" name="sexo" value="2" >
                                                Femenino
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="Telefono" class="col-lg-4 control-label">Telefono :</label>
                                    <div class="col-lg-8">
                                        <div class='input-group'>
                                        <span class="input-group-addon" id="start-date" ><i class="fa fa-phone fa-adjust" ></i></span>
                                        <input type="text" class="form-control" id="telefono" name="telefono" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="Celular" class="col-lg-4 control-label">Celular :</label>
                                    <div class="col-lg-8">
                                        <div class='input-group'>
                                        <span class="input-group-addon" id="start-date" ><i class="fa fa-mobile-phone fa-adjust" ></i></span>
                                        <input type="text" class="form-control" id="celular" name="celular" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="Hospital" class="col-lg-4 control-label">Hospital Referencia :</label>
                                    <div class="col-lg-8">                                       
                                        <?php echo Hospital();?>
                                    </div>
                                </div>

                        </div>
                            
                            <!-- INICIO DE SEGUNDA COLUMNA -->                         
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado_civil" class="col-lg-4 control-label">Estado Civil :</label>
                                    <div class="col-lg-8">
                                        <?php echo Estado_Civil();?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="nivel_academico" class="col-lg-4 control-label">Nivel Academico :</label>
                                    <div class="col-lg-8">
                                        <?php echo Nivel_Academico();?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="ocupacion" class="col-lg-4 control-label">Ocupación :</label>
                                    <div class="col-lg-8">
                                        <?php echo Ocupacion();?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="departamento" class="col-lg-4 control-label">Departamento :</label>
                                    <div class="col-lg-8">
                                        <?php echo Departamento();?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="municipio" class="col-lg-4 control-label">Municipio :</label>
                                    <div class="col-lg-8">
                                        <select class='form-control'  data-placeholder="Seleccione..." name="municipio" id="municipio"></select>
                                    </div>
                                </div>                                
                                
                                <div class="form-group">
                                    <label for="Email" class="col-lg-4 control-label">Correo Electrónico :</label>
                                    <div class="col-lg-8">
                                        <div class='input-group'>
                                            <div class="input-group-addon" ><strong>@</strong></div>
                                        <input type="email" class="form-control" id="email" name="email"
                data-fv-emailaddress-message="The value is not a valid email address">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="Direccion" class="col-lg-4 control-label">Dirección :</label>
                                    <div class="col-lg-8">
                                        <div class='input-group'>
                                        <span class="input-group-addon" id="start-date" ><span class="glyphicon glyphicon-home" aria-hidden="true"></span></i></span>
                                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
							<button class="btn btn-default" type="submit">Submit</button>
						</div>
                    </form>
                    
                </div>
            </div>
        </div>
    </body>
</html>
