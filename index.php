<?php include 'include/head.php';
      include 'include/banner.php';
?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="public/css/docs.css" media="screen" />
        <script type="text/javascript" src="public/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="public/js/bootstrap.min.js"></script>       
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap-theme.min.css" media="screen"/>
    </head>
    <body>
        <?php echo banner();?>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong><center>LOGIN</center></strong></h3>
                        </div>
                        <div class="panel-body">
<!--                            <form action='Busqueda.php' method="post" >
                                <div class="form-group">
                                    <label for="expediente" class="col-sm-4 control-label">N° de Expediente</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="expediente" name="expediente" placeholder="Digite el Numero de Expediente" onKeyPress="return acceptNum(event)">
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <div class="col-sm-offset-5 col-sm-10">
                                        <button type="submit" class="btn btn-success" value="Buscar">Buscar</button>                                   </div>
                                </div>
                            </form>-->

<!--                            <form action='Busqueda.php' method="post" >
                                <div class="form-group">
                                    <label for="expediente" class="col-sm-4 control-label">N° de Expediente</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="expediente" name="expediente" placeholder="Digite el Numero de Expediente" onKeyPress="return acceptNum(event)">
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <div class="col-sm-offset-5 col-sm-10">
                                        <button type="submit" class="btn btn-success" value="Buscar">Buscar</button>                                   </div>
                                </div>
                            </form>-->
<form action='autenticacion.php' method="post">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su usuario">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-default">Ingresar</button>
                </form>
                        
                        </div>
                    </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </body>
</html>

