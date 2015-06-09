<?php
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: index.php');
}

      include 'include/banner.php';
      
      function Retira() {
            /* Parametros de conexion */
include('conexion.php');
$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: " . pg_last_error());
$query = "select id,retiro from mnt_retiro";
$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
            $combo = "<select class='form-control tbl_hospital'  data-placeholder=\"Seleccione...\" id='retira' name='retira' required>
	  ";
             $combo.="<option value=\"\"></option>";
            while ($row = pg_fetch_array($resultado)) {
                $combo.="<option value='" . $row['id'] . "'>". $row['retiro'] . "</option>";
            }
            $combo.="</select>";
            return($combo);
        }

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
<!--        <link rel="stylesheet" type="text/css" href="../public/calendar/jquery-ui.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-theme.min.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/css/hovernav.css" media="screen"/>-->
        <link rel="stylesheet" type="text/css" href="../public/css/font-awesome.min.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/chosen/choosen-bootstrap.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/icheck/skins/square/blue.css" media="screen"/>
        
 

         <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
    </head>
    <body>
        <script>
            $('.carousel').carousel({
            interval: 5;
        });
            </script>

        <?php //echo banner();?> 
        <br><br>


        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
        <div id="custom-bootstrap-menu" class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registro<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="paciente/AddPaciente.php">Agregar Paciente</a></li>                   
                </ul>
            </li>
                
            </ul>
            <div class="col-md-2 pull-right">
            <ul class="nav navbar-nav">
                    <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['usuario'];?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="include/logout.php">Cerrar Sesión</a></li>
                                       
                </ul>
            </li>
           </ul>
            </div>     
        </div>
    </div>
        </div> 
            </div>
            <div class="col-md-1"></div>
</div>
        
        <div class="container">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><center><strong>REGISTRO DE PACIENTES</strong></center></h3>
                </div>
                <div class="panel-body">
                    <form action="guardar.php" method="post" class="form-horizontal" id ="formPaciente" role="form" novalidate>
                        <div class="row">
                            
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="Retira" class="col-lg-4 control-label">Registro :</label>
                                    <div class="col-lg-8">                                       
                                        <?php echo Retira();?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="numero_expediente" class="col-lg-4 control-label">N° de Expediente :</label>
                                    <div class="col-lg-4">
                                        <div class='input-group'>
                                        <span class="input-group-addon" id="start-date" ><i class="fa fa-folder-open fa-adjust" style="color:red"></i></span>
                                        <input type="text" class="form-control" required id="numero_expediente" name="numero_expediente" placeholder="N° de Expediente">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="nombre_completo" class="col-lg-4 control-label">Nombre Completo :</label>
                                    <div class="col-lg-8">
                                        <div class='input-group'>
                                        <span class="input-group-addon" id="start-date" ><i class="fa fa-user" ></i></span>
                                        <input type="text" pattern="[A-Za-z]"data-title="Please enter your name" required class="form-control" id="nombre_completo" name="nombre_completo" placeholder="Nombre Completo">
                                        </div>
                                    </div>
                                </div>   
                                
                                <div class="form-group">
                                    <label for="Telefono" class="col-lg-4 control-label">Telefono :</label>
                                    <div class="col-lg-4">
                                        <div class='input-group'>
                                        <span class="input-group-addon" id="start-date" ><i class="fa fa-phone fa-adjust" ></i></span>
                                        <input type="text" class="form-control" id="telefono" name="telefono" >
                                        </div>
                                    </div>
                                </div>
                                
                                
                                

                        </div>
                        <div class="col-md-1">
                            </div>     
                            <!-- INICIO DE SEGUNDA COLUMNA -->                       
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



