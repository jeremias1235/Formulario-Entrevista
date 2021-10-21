<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>formulario</title>

    <!--<link rel="stylesheet" type="text/css" href="css/estilo.css">-->
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Formulario</div>
            <div class="panel-body">
                <form id="form">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Nombre (*)</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" required>
                                <div class="nombre" hidden>
                                    <span class="text-danger ">este campo es obligatorio</span>
                                </div>                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido (*)</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" required>
                                <div class="apellido"hidden>
                                    <span class="text-danger" >este campo es obligatorio</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Username (*)</label>
                                <input type="email" class="form-control" name="username" id="username" data-validation="username" required>
                                <div class="username" hidden>
                                    <span class="text-danger">este campo es obligatorio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Contraseña (*)</label>
                                <input type="password" class="form-control" name="password" id="password" minlength="8" required>
                                <div class="password" hidden>
                                    <span class="text-danger" >este campo es obligatorio</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Confirmar Contraseña (*)</label>
                                <input type="password" class="form-control" name="repassword" id="repassword" required>
                                <div class="repassword" hidden>
                                    <span class="text-danger" >las contraseñas no coinciden</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Provincia</label>
                                <select name="provincias" id="provincias" class="form-control">

                                </select>
                                <div class="provincias" hidden>
                                    <span class="text-danger" >este campo es obligatorio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="terminos" name="terminos">
                                <label class="form-check-label" for="terminos">Acepto los Terminos y Condiciones</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fecha">fecha/hora</label>
                                <input type="datetime-local" class="form-control" id="fecha" name="fecha" required  max="<?php $date = new DateTime(); $dt= $date->format('Y-m-d\TH:i:s'); echo $dt ?>">
                                <div class="fecha" hidden>
                                    <span class="text-danger" >este campo es obligatorio</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fecha">Campo Numerico</label>
                                <input type="number" class="form-control" id="numero" name="camponumerico" required
                                min="1" max="100">
                            </div>
                        </div>
                       
                        <input class="btn btn-primary btn-block" disabled type="button" value="enviar" id="registrar">
                    </div>
                </form>
                <div class="content"></div>
            </div>
        </div>
    </div>

    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script>
        $(document).ready(function() {

            $.getJSON('provincias.json', function(data) {
                
                $("#provincias").empty().append('<option selected disabled>Seleccione su Provincia</option>');
                $.each(data, function(key, value) {

                       $("#provincias").append('<option value="' + value.nombre + '">' + value.nombre + '</option>');
			    }); // close each()
		    }); // close getJSON()


            $('#registrar').click(function() {
                
                if ($('#nombre').val() == ""){
                    $('.nombre').removeAttr('hidden','hidden');
                    alertify.alert("Información:", "El campo Nombre es requerido");
                }else if ($('#apellido').val() == ""){
                    $('.nombre').attr('hidden','hidden');
                    $('.apellido').removeAttr('hidden','hidden');
                    alertify.alert("Información:", "El campo Apellido es requerido");
                }else if ($('#username').val() == "") {
                    $('.username').removeAttr('hidden','hidden');
                    $('.username').empty().append('<span class="text-danger">Este campo es requerido</span>');
                    alertify.alert("Información:", "El campo USERNAME es requerido");
                } else if ($('#password').val() == ""){
                    $('.username').attr('hidden','hidden');
                    $('.password').removeAttr('hidden','hidden');
                    alertify.alert("Información:", "El campo CONTRASEÑA es requerido");
                } else if ($('#provincias').val() == null){
                    $('.password').attr('hidden','hidden');
                    $('.provincias').removeAttr('hidden','hidden');
                    alertify.alert("Información:", "Debe seleccionar una provincia");
                } else if ($('#fecha').val() == ""){
                    $('.provincias').attr('hidden','hidden');
                    $('.fecha').removeAttr('hidden','hidden');
                    alertify.alert("Información:", "El campo FECHA es requerido");
                } else if ($('#repassword').val() != $('#password').val()){
                    $('.fecha').attr('hidden','hidden');
                    $('.repassword').removeAttr('hidden','hidden');
                    alertify.alert("Información:", "Las CONTRASEÑAs no coinciden");
                }else{              
                    limpiar();
                    $('.content').append('<img src="preload.gif" alt="loading" /><br/>Un momento, por favor...');
                   
                    cadena = "nombre=" + $('#nombre').val() +
                            "&apellido=" + $('#apellido').val() +
                            "&email=" + $('#username').val()+
                            "&contra=" + $('#password').val()+
                            "&provi=" + $('#provincias').val()+
                            "&fecha=" + $('#fecha').val();
                    
                    $.ajax({
                        type: "POST",
                        url: "register.php",
                        data: cadena,
                        success: function(r) {
                                if (r == 1) {
                                    $('.content').fadeOut(1000).empty();
                                    alertify.error("Usuario ya existe en la BD");
                                    
                                } else {
                                    $('.content').fadeOut(1000).empty();
                                    alertify.success("Usuario registrado Exitosamente");
                                } 
                            }
                    });
                    return false;                                   
                                    
                }
                function limpiar(){
                    $('.username').attr('hidden','hidden');
                    $('.password').attr('hidden','hidden');
                    $('.repassword').attr('hidden','hidden');
                    $('.fecha').attr('hidden','hidden');
                    $('.provincias').attr('hidden','hidden');
                }
            });
            $('#terminos').on('change', function(){
                if ($('#terminos').prop('checked') == true) {
                    $('#registrar').removeAttr('disabled','disabled');
                    
                } else {
                    $('#registrar').attr('disabled','disabled');
                    
                }
            });
            $('#username').on('blur', function(){
                  caracteresCorreoValido($(this).val(), '.username')
            });
            $('#password').on('blur', function(){
                  contra($(this).val(), '.password')
            });
            function caracteresCorreoValido(email, div){

                var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

                if (caract.test(email) == false){
                    $('.username').removeAttr('hidden');
                    $('.username').empty().append('<span class="text-danger">Debe ser un email valido</span>');
                    
                    return false;
                }else{
                    $('.username').attr('hidden','hidden');
            //        $(div).html('');
                    return true;
                }
            }
            function contra(pass, div){

                var caract = new RegExp(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/);
                                        
                if (caract.test(pass) == false){
                    $('.password').removeAttr('hidden');
                    $('.password').empty().append('<span class="text-danger">La contraseña debe tener: 8 caracteres, letras y numeros</span>');
                    
                    return false;
                }else{
                    $('.password').attr('hidden','hidden');
            //        $(div).html('');
                    return true;
                }
            }
        });
    </script>

</body>

</html>