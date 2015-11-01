$(document).ready(function() {
    



    
        /*Filtracion de teclas*/
var nav4 = window.Event ? true : false;
function acceptNum(evt){	
	var key = nav4 ? evt.which : evt.keyCode;	
	//alert(key);
		return ((key < 13) || (key >= 48 && key <= 57));
}
   
    var strNueva_Fila='',strNueva_FilaOtros='',data2="",otros_medicamentos=""
     ,especialidad="",medico="",objTabla,objTabla2,numero=1,ind=1;
     
               $.post("filtros/filtroMedicamentos.php", { id_category: numero}, function(data){    
            data2=data;
            });
            
            $.post("filtros/filtroEspecialidades.php", { id_category: numero}, function(data){    
            especialidad=data;
            });
            
             $.post("filtros/filtroMedicos.php", { id_category: numero}, function(data){    
            medico=data;
            });

    
    //evento que se dispara al hacer clic en el boton para agregar una nueva fila
    $(document).on('click','.clsAgregarFila',function(){
    var num     = $('.clonado').length,newNum  = new Number(num + 1);

        //almacenamos en una variable todo el contenido de la nueva fila que deseamos
        //agregar. pueden incluirse id's, nombres y cualquier tag... sigue siendo html

                   strNueva_Fila='<tr id="entry'+newNum+'" class="clonado">'+
                           //'<td><input type="text" name="contador" value="'+numero+'" length="1" size = "1"></td>'+
            '<td>'+newNum+'</td>'+       
            '<td align="center"><input type="date" class="form-control" name="fecha_programada[]" size="2" required></td>'+
            '<td>'+data2+'</td>'+
            '<td><input type="text" onKeyPress="return acceptNum(event)"  required  class="form-control" placeholder="cantidad" id="cantidad'+ind+'" name="cantidad[]" size="3" ></td>'+
            '<td align="left">'+medico+'</td>'+
            '<td align="left">'+especialidad+'</td>'+
        '</tr>';
                   

       // Enable the "remove" button. This only shows once you have a duplicated section.
        $('#btnDelete').attr('disabled', false);
         
                     objTabla=$(this).parents().get(3);
                  $(objTabla).find('tbody').append(strNueva_Fila);

$('.choosen').chosen({width:'250',allow_single_deselect: true});
$('.choosen2').chosen({width:'150',allow_single_deselect: true});
$('.choosen3').chosen({width:'175',allow_single_deselect: true});
   $('input').iCheck({
                // The tap option is only available in v2.0
//                tap: true,
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',

            });
            
            $(function () {
$("#datepicker"+ind).datepicker({
              changeMonth: true,
      changeYear: true
});
});
                              
        //si el cuerpo la tabla esta oculto (al agregar una nueva fila) lo mostramos
        if(!$(objTabla).find('tbody').is(':visible')){
            //le hacemos clic al titulo de la tabla, para mostrar el contenido
            $(objTabla).find('caption').click();
        }
    });
    
    $('#btnDelete').click(function () {
    // Confirmation dialog box. Works on all desktop browsers and iPhone.
        if (confirm("Desea eliminar una fila ?."))
            {
                var num = $('.clonado').length;
                // how many "duplicatable" input fields we currently have
                $('#entry' + num).slideUp('slow', function () {$(this).remove();
                // if only one element remains, disable the "remove" button
                    if (num -1 === 1)
                $('#btnDelete').attr('disabled', true);
                // enable the "add" button
                $('#btnAdd').attr('disabled', false).prop('value', "add section");});
            }
        return false; // Removes the last section you added
    });
    
    $('#btnDelete').attr('disabled', true);
    
    
     $(".medicamento1").chosen({width:'250',allow_single_deselect: true,no_results_text:'No hay resultados para '});
    $(".medicamento_imp").chosen({width:'450',allow_single_deselect: true,no_results_text:'No hay resultados para '});
    $(".medicamento2").chosen({width:'150',allow_single_deselect: true,no_results_text:'No hay resultados para '});
    $(".medicamento3").chosen({width:'175',allow_single_deselect: true,no_results_text:'No hay resultados para '});
    $(".medicamento4").chosen({width:'100%',allow_single_deselect: true,no_results_text:'No hay resultados para '});
    $(".medicamento5").chosen({width:'100%',allow_single_deselect: true,no_results_text:'No hay resultados para '});
    $(".choosen").chosen({width:'100%',allow_single_deselect: true,no_results_text:'No hay resultados para '});
    

 $(function(){
 $("#btn_enviar").click(function(){
 var url = "../guardar/guardar.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formGuardarRec").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               $("#respuesta").html(data); // Mostrar la respuestas del script PHP.
           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
});

});


