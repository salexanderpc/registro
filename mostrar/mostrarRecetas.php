<?php
include '../include/head.php';
include '../include/banner.php';

?>
<html>
    <head>
        <title>.:::VERIFICACIÓN:::.</title>
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
        <script type="text/javascript" src="../paciente.js"></script>
        <script type="text/javascript" src="../public/icheck/icheck.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="../public/calendar/jquery-ui.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-theme.min.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/css/hovernav.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/css/font-awesome.min.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/chosen/choosen-bootstrap.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../public/icheck/skins/square/blue.css" media="screen"/>
        <!--<script type="text/javascript" src="../addRecetas.js"></script>-->
        <script type="text/css">
            .table td {
                text-align: center;   
            }
        </script>
        
        <script language="javascript">
           $(document).ready(function(){
//setInterval(loadClima,100000);
$("#resultado").load("cargarRecetas.php");
});

function loadClima(){
$("#resultado").load("cargarRecetas.php");
}

</script>
        <script type="text/javascript">
			//$('document').ready(function(){}
				/* Pone el estado del medicamento como pendiente */
                        function PendienteDesp(id_receta,expediente)
                        {
                        alert("Activaste la funcion Pendiente");
//                       jQuery.post("procesarPendienteDesp.php", {
//                                                id_receta:id_receta,
//                                                exp:expediente
//					}, function(data, textStatus){
//                                            
//						if(data == 1){
//							$('#resultado').html("Datos insertados.");
//							$('#resultado').css('color','green');
//						}
//						else{
//                                                            $('#cargador').hide();
//                                                            $('#resultado').html(data);
//                                                       
//						}
//					});
                        }
                        
                        /* Pone el estado de la receta en activa para que sea procesada */
                        function Activar(id_receta,expediente)
                        {
                        alert("Activaste la funcion Activar()");
//                       jQuery.post("procesarActivacionDesp.php", {
//                                                id_receta:id_receta,
//                                                exp:expediente
//					}, function(data, textStatus){
//                                            
//						if(data == 1){
//							$('#resultado').html("Datos insertados.");
//							$('#resultado').css('color','green');
//						}
//						else{
//                                                        
//							$('#resultado').html(data);
//							$('#resultado').css('color','red');
//						}
//					});
                        }
                        
                        /*Funcion que recibe el id de la receta y una bandera para decidir si es una rece
                         * receta anulada o procesada */
                        function ProcesarReceta(id_receta,expediente,bandera)
                        {
                        alert("Activaste la funcion Procesar Receta"+bandera);
//                       jQuery.post("procesarTodas.php", {
//						id_receta_desc:id_receta,
//                                                expediente:expediente,
//                                                bandera:bandera
//					}, function(data, textStatus){
//                                            
//						if(data == 1){
//							$('#resultado').html("Datos insertados.");
//							$('#resultado').css('color','green');
//						}
//						else{
//                                                        
//							//$('#resultado').html(data);
//                                                        $('#resultado').hide();
//                                                        $('expediente').val('');
//                                                        $('#expediente').focus();
//							$('#resultado').css('color','red');
//						}
//					});
                        }
   
                        
		</script>
    </head>
    <body>
<?php echo bannerVerificacion(); ?>
        <div class="container">
            <div class="row">
            <ul class="nav nav-tabs">
                <li role="presentation"><a href="../index.php">Ingreso</a></li>
                <li role="presentation"><a href="../verificacionRecetas/verificacion.php">Verificación Recetas</a></li>
                <li role="presentation" class="active"><a href="../mostrar/mostrarRecetas.php">Mostrar Recetas</a></li>
            </ul>
        </div>
        </div>
    
      
        <br>
        <div class="container">
            <h3><p align="center" class="bg-info">Despacho de Medicamentos</p></h3>
        </div>
        
        <br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10" id="resultado">
            
        </div>
        <div class="col-md-1"></div>
    </div>
    <span id="res"></span>
    </body>
</html>



<!--select * from recetas rec inner join expediente exp
on rec.expediente_id = exp.id and exp.numero_expediente = '10071-07'-->