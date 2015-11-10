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
setInterval(loadClima,1000);
});

function loadClima(){
$("#resultado").load("cargarRecetas.php");
}

</script>
        <script type="text/javascript">
			$('document').ready(function(){
				$('#boton').click(function(){
					if($('#expediente').val()==""){
						alert("Introduce el nombre");
						return false;
					}
					else{
						var expediente = $('#expediente').val();
					}
					
					jQuery.post("procesar.php", {
						name:expediente
					}, function(data, textStatus){
                                            
						if(data == 1){
							$('#resultado').html("Datos insertados.");
							$('#resultado').css('color','green');
						}
						else{
                                                        
							$('#resultado').html(data);
							$('#resultado').css('color','red');
						}
					});
				});
                                
                                
			}
                                );
                        
                        function miFuncion(id_medicamento,id_expediente,expediente)
                        {
                        alert("Activaste la funcion miFuncion()"+id_medicamento);
                       jQuery.post("procesarAct.php", {
						id_medicamento:id_medicamento,
                                                id_expediente:id_expediente,
                                                exp:expediente
					}, function(data, textStatus){
                                            
						if(data == 1){
							$('#resultado').html("Datos insertados.");
							$('#resultado').css('color','green');
						}
						else{
                                                        
							$('#resultado').html(data);
							$('#resultado').css('color','red');
						}
					});
                        }
                        
                        function Anular(id_medicamento,id_expediente,expediente)
                        {
                        alert("Activaste la funcion Anular()"+id_medicamento);
                       jQuery.post("procesarAct.php", {
						id_medicamento:id_medicamento,
                                                id_expediente:id_expediente,
                                                exp:expediente
					}, function(data, textStatus){
                                            
						if(data == 1){
							$('#resultado').html("Datos insertados.");
							$('#resultado').css('color','green');
						}
						else{
                                                        
							$('#resultado').html(data);
							$('#resultado').css('color','red');
						}
					});
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