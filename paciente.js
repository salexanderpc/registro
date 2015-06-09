
$(document).ready(function(){  
$.fn.oldChosen = $.fn.chosen
$.fn.chosen = function(options) {
  var select = $(this)
    , is_creating_chosen = !!options

  if (is_creating_chosen && select.css('position') === 'absolute') {
    // if we are creating a chosen and the select already has the appropriate styles added
    // we remove those (so that the select hasn't got a crazy width), then create the chosen
    // then we re-add them later
    select.removeAttr('style')
  }

  var ret = select.oldChosen(options)

  if (is_creating_chosen) {
    // https://github.com/harvesthq/chosen/issues/515#issuecomment-33214050
    // only do this if we are initializing chosen (no params, or object params) not calling a method
    select.attr('style','display:visible; position:absolute; clip:rect(0,0,0,0)');
    select.attr('tabindex', -1);
  }
  return ret
}
//*/
    

    
    //$(".chosen").chosen({"width":"auto",allow_single_deselect: true,no_results_text:'No hay resultados para '});
  // $('select').chosen({allow_single_deselect: true});
    $(".tbl_estado_civil").chosen({allow_single_deselect: true,no_results_text:'No hay resultados para '});
    $(".tbl_hospital").chosen({"width":"250px",allow_single_deselect: true,no_results_text:'No hay resultados para '});
    $(".tbl_nivel_academico").chosen({allow_single_deselect: true,no_results_text:'No hay resultados para '});
    $(".tbl_departamento").chosen({allow_single_deselect: true,no_results_text:'No hay resultados para '});
    $(".tbl_ocupacion").chosen({allow_single_deselect: true,no_results_text:'No hay resultados para '});
//    $('input').iCheck({
//    checkboxClass: 'icheckbox_square-blue',
//    radioClass: 'iradio_square-blue',
//    increaseArea: '20%' // optional
//  });
});




/* PARA Calendario */
$(document).ready(function(){
//  $( "#datepicker" ).datepicker({
//      changeMonth: true,
//      changeYear: true
//});


 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#datepicker").datepicker();
});



});

/* PARA SELECT DEPENDIENTES */
$(document).ready(function(){
  // $(".tbl_municipio").change().chosen({allow_single_deselect: true,no_results_text:'No hay resultados para '});
   $("#tbl_dep").change(function () {
           $("#tbl_dep option:selected").each(function () {
            id_category = $(this).val();
            $.post("filtro.php", { id_category: id_category }, function(data){    
                $("#municipio").html(data);
            });               
        });       
   })  
});


/* PARA SELECT DEPENDIENTES */
$(document).ready(function(){
$('#formPaciente')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            locale: 'es_ES',
            fields: {
                sexo: {
                    validators: {
                        notEmpty: {
                            message: 'Elija una opción'
                        }
                    }
                },
                dui: {
                    validators: {
                        notEmpty: {
                            message: 'Ingrese número de DUI '
                        },
                        regexp: {
                        regexp:  /[0-9]{8}-[0-9]{1}$/i,
                        message: 'Digite un numero de DUI con formato ########-#'
                    }
                    }
                },
                fecha_nac: {
                    validators: {
                        notEmpty: {
                            message: 'El campo DUI es requerido'
                        },
                        date: {
                            format: 'MM/DD/YYYY',
                            message: 'fecha de nacimiento no valida'
                        }
                    }
                },
                email: {
                validators: {
                    emailAddress: {
                        message: 'The value is not a valid email address'
                    }
                }
            }
            ,numero_expediente: {
                message: 'Ingrese un número expediente valido',
                validators: {
                    // The validator will create an Ajax request
                    // sending { username: 'its value' } to the back-end
                    remote: {
                        message: 'El número de expediente ya esta registrado',
                        url: 'remote.php',
                        type: 'POST'
                    },
                        regexp: {
                        regexp:  /^[-_\d]+$/i,
                        message: 'Digite un numero de DUI con formato ########-#'
                    }
                }
            }
            ,nombre_completo: {
                message: 'Digite el nombre del paciente',
                validators: {
                    // The validator will create an Ajax request
                    // sending { username: 'its value' } to the back-end
                        regexp: {
                        regexp:  /^[-_\d]+$/i,
                        message: 'El nombre no puede contener números'
                    }
                }
            }
            ,telefono: {
                message: 'Ingrese un número telefonico',
                validators: {
                    // The validator will create an Ajax request
                    // sending { username: 'its value' } to the back-end
                        regexp: {
                        regexp:  /[2][0-9]{1}[0-9]{2}-[0-9]{4}$/i,
                        message: 'Ingrese un número de telefono valido con formato ####-####'
                    }
                }
            }
            }
        })
        .find('input[name="sexo"]')
            // Init icheck elements
            .iCheck({
                // The tap option is only available in v2.0
//                tap: true,
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue'
            })
//            // Called when the radios/checkboxes are changed
            .on('ifChanged', function(e) {
                // Get the field name
                var field = $(this).attr('name');
                $('#formPaciente').formValidation('revalidateField', field);
            })
            .end(),
            $('#formPaciente').find('[name="fecha_nac"]')
            .datepicker({
                      changeMonth: true,
      changeYear: true,
                onSelect: function(date, inst) {
                    // Revalidate the field when choosing it from the datepicker
                    $('#formPaciente').formValidation('revalidateField', 'fecha_nac');
                }
            });
});


