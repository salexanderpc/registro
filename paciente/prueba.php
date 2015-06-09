<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>FormValidation demo</title>
<!--    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../public/validation/css/formValidation.css" media="screen"/>
    <script type="text/javascript" src="../public/jquery/jquery.min.js"></script>
     <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../public/validation/js/formValidation.js"></script> 
    <script type="text/javascript" src="../public/js/bootstrap.js"></script>-->
    
    
<link rel="stylesheet" href="../public/validation/vendor/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" href="../public/validation/dist/css/formValidation.css"/>
<script type="text/javascript" src="../public/validation/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../public/validation/vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../public/validation/dist/js/formValidation.js"></script>
<script type="text/javascript" src="../public/validation/dist/js/framework/bootstrap.js"></script>
<script type="text/javascript" src="../public/icheck/icheck.min.js"></script> 
<link rel="stylesheet" type="text/css" href="../public/icheck/skins/square/blue.css" media="screen"/>
</head>
<!--<body>
   <style type="text/css">
#icheckForm .radio label, #icheckForm .checkbox label {
    padding-left: 0;
}
</style>-->
<script>

</script>

<form id="icheckForm" method="post" class="form-horizontal">
    <div class="form-group">
        <label class="col-xs-3 control-label">Job position</label>
        <div class="col-xs-6">
            <div class="radio">
                <label>
                    <input type="radio" name="job" id="job1" value="designer" /> Designer
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="job" id="job2" value="frontend" /> Front-end Developer
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="job" id="job3" value="backend" /> Back-end Developer
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Programming Languages</label>
        <div class="col-xs-6">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="languages[]" value="net" /> .Net
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="languages[]" value="java" /> Java
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="languages[]" value="c" /> C/C++
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="languages[]" value="php" /> PHP
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="languages[]" value="perl" /> Perl
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="languages[]" value="ruby" /> Ruby
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="languages[]" value="python" /> Python
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="languages[]" value="javascript" /> Javascript
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-5 col-xs-offset-3">
            <button type="submit" class="btn btn-default">Validate</button>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
//    $('input').iCheck({
//    checkboxClass: 'icheckbox_square-blue',
//    radioClass: 'iradio_square-blue',
//    increaseArea: '20%' // optional
//  });
  
    $('#icheckForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                job: {
                    validators: {
                        notEmpty: {
                            message: 'The job position is required'
                        }
                    }
                },
                'languages[]': {
                    validators: {
                        choice: {
                            min: 2,
                            max: 4,
                            message: 'Please choose 2 - 4 programming languages you are good at'
                        }
                    }
                }
            }
        })
        .find('input[name="job"]')
            // Init icheck elements
            .iCheck({
                // The tap option is only available in v2.0
                    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' // optional
            })
            // Called when the radios/checkboxes are changed
            .on('ifChanged', function(e) {
                // Get the field name
                var field = $(this).attr('name');
                $('#icheckForm').formValidation('revalidateField', field);
            })
            .end();
});
</script>
</body>
</html>
