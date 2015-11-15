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
        <script type="text/javascript">
			$('document').ready(function(){
                            
                             
                             function comprobar() {
  var login = $('#expediente').value;
  var peticion = $.ajax({
    url:  'procesar.php',
    type: 'POST',
    data: { name: login },
    success: function(respuesta) {
      $('#resultado').html((data));
    }, 
    error: function() { alert('Se ha producido un error'); }
  });
}
                             
                            
                                /*Filtracion de teclas*/
var nav4 = window.Event ? true : false;
function acceptNum(evt){	
	var key = nav4 ? evt.which : evt.keyCode;	
	//alert(key);
		return ((key < 13) || (key >= 48 && key <= 57));
            }
				
                                
                                
			}
                                );
                        
                        
                        function pulsar(e) { 
  tecla = (document.all) ? e.keyCode :e.which; 
  
  return (tecla!=13); 
} 
                        
                        function ConsultaReceta(){
                                    
                                        //Añadimos la imagen de carga en el contenedor.
                                    $('#cargador').show();    
                                    $('#cargador').html('<img src="../public/images/ajax-loader.gif"/>');
        
					if($('#expediente').val()==""){
						alert("Introduce el expediente");
                                                $('#expediente').focus();
                                                $('#cargador').hide();
						return false;
					}
					else{
						var expediente = $('#expediente').val();
					}
					
                                    
                                        
					jQuery.post("procesar.php", {
						name:expediente
					}, function(data, textStatus){
                                            
						if(data == 1){
							//$('#resultado').html("Datos insertados.");
							//$('#resultado').css('color','green');
                                                        $('#cargador').hide();
                                                        $("#content").show();
                                                         setTimeout(function() {
                                                                
                                                                $("#content").fadeOut(1500);
                                                            },1500);
						}
						else{
                                                        
//							$('#resultado').fadeIn(1000).html(data);
//							$('#resultado').css('color','red');
                                                        setTimeout(function () {
                $('#cargador').hide();
                $('#resultado').html(data);
                $('#resultado').show();
            }, 200);
						}
					});
				};
                       
                        
                        /* Pone el estado del medicamento como pendiente */
                        function Pendiente(id_receta,expediente)
                        {
                        //alert("Activaste la funcion Pendiente");
                       jQuery.post("procesarPendiente.php", {
                                                id_receta:id_receta,
                                                exp:expediente
					}, function(data, textStatus){
                                            
						if(data == 1){
							$('#resultado').html("Datos insertados.");
							$('#resultado').css('color','green');
						}
						else{
                                                            $('#cargador').hide();
                                                            $('#resultado').html(data);
                                                       
						}
					});
                        }
                        
                        /* Pone el estado de la receta en activa para que sea procesada */
                        function Activar(id_receta,expediente)
                        {
                        //alert("Activaste la funcion Activar()");
                       jQuery.post("procesarActivacion.php", {
                                                id_receta:id_receta,
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
                        
                        /*Funcion que recibe el id de la receta y una bandera para decidir si es una rece
                         * receta anulada o procesada */
                        function ProcesarReceta(id_receta,expediente,bandera)
                        {
                        alert("Activaste la funcion Procesar Receta"+bandera);
                       jQuery.post("procesarTodas.php", {
						id_receta_desc:id_receta,
                                                expediente:expediente,
                                                bandera:bandera
					}, function(data, textStatus){
                                            
						if(data == 1){
							$('#resultado').html("Datos insertados.");
							$('#resultado').css('color','green');
                                                       
						}
						else{
                                                        
							//$('#resultado').html(data);
                                                        $('#resultado').hide();
                                                        $('expediente').val('');
                                                        $('#expediente').focus();
							$('#resultado').css('color','red');
						}
					});
                        }
                        
                        
   $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
                        
		</script>
    </head>
    <body>
<?php echo bannerVerificacion(); ?>
        <div class="container">
            <div class="row">
            <ul class="nav nav-tabs">
                <li role="presentation"><a href="../index.php">Ingreso</a></li>
                <li role="presentation" class="active"><a href="#">Verificación Recetas</a></li>
                <li role="presentation"><a href="../mostrar/mostrarRecetas.php">Mostrar Recetas</a></li>
            </ul>
        </div>
        </div>
    
    
    <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <br><br>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong><center>BUSQUEDA DE PACIENTE</center></strong></h3>
                    </div>
                    <div class="panel-body">
                        <br>
                        <form  method="post" onkeypress = "return pulsar(event)" class="form-horizontal">
                            <div class="form-group">
                                <label for="expediente" class="col-md-5 control-label" >N° de Expediente</label>
                                <div class="col-md-7">
                                    
                                    <div class='input-group'>
                                        <span class="input-group-addon" id="start-date" ><span class="glyphicon glyphicon-list-alt"></span></span>
                                        <input type="text" class="form-control"  id="expediente" name="expediente" placeholder="Ingrese el expediente" required>
                                    
                                </div>
                                </div>
                                
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-offset-5 col-sm-10">
                                    <button type="button" id="boton"  class="btn btn-success" onClick="return ConsultaReceta()">
                                        <span class="glyphicon glyphicon-search"  aria-hidden="true"></span> Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4">
                <div  style="display: none" id="content" class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  El Paciente no posee recetas duplicadas
</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6" id="cargador"></div>
        </div>
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