<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('assets/estilos.css') }}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <!--- Heading ---->
        <header class="heading">REGISTRO DE USUARIOS</header>
        <hr>

        <!--- Form starting ----> 
        <form action="{{ route('register') }}" method="POST">
            @csrf 
            <div class="row">
                <!--- For Name ---->
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xs-4">
                            <label class="nombres">Nombres:</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" name="nombres" id="nombres" placeholder="Ingrese sus nombres" class="form-control" required>
                        </div>
                    </div>
                </div>
        
                <!--- For Last name ---->
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xs-4">
                            <label class="apellidos">Apellidos:</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" name="apellidos" id="apellidos" placeholder="Ingrese sus apellidos" class="form-control" required> 
                        </div>
                    </div>
                </div>
        
                <!--- For Identification ---->
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xs-4">
                            <label class="identificación">Identificación:</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" name="identificación" id="identificación" placeholder="Ingrese su identificación" class="form-control" required> 
                        </div>
                    </div>
                </div>
        
                <!--- For Year of Graduation ---->
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xs-4">
                            <label class="año_graduacion_Xciclo">Año de Graduación:</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" name="año_graduacion_Xciclo" id="año_graduacion_Xciclo" placeholder="Ingrese su año de graduación" class="form-control" required> 
                        </div>
                    </div>
                </div>
        
                <!--- For Employment Status ------>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xs-4">
                            <label class="working">Está Laborando:</label>
                        </div>
                        <div class="col-xs-8">
                            <select id="está_laborando" name="está_laborando" class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="sí">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                </div>
        
                <!--- For Workplace ------>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xs-4">
                            <label class="workplace">Lugar de Trabajo:</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" name="lugar_de_trabajo" id="lugar_de_trabajo" placeholder="Ingrese su lugar de trabajo (si aplica)" class='form-control'>
                        </div>
                    </div>    
                </div>
        
                <!--- For Email ------>
                <div class="col-sm-12">
                    <div class="row">
                        <div class='col-xs-4'>
                            <label for='correo'>Correo Electrónico:</label>
                        </div>
                        <div class='col-xs-8'>
                            <input type='email' name='correo' id='correo' placeholder='Ingrese su correo electronico' required='required' class='form-control'>
                        </div> 
                    </div> 
                </div>
        
                <!--- For Password ------>
                <div class='col-sm-12'>
                    <label for='contraseña'>Contraseña:</label>    
                    <input type='password' name='contraseña' id='contraseña' placeholder='Ingrese una contraseña' required='required' class='form-control'>
                </div>
        
                <!--- For Confirm Password ------>  
                <div class='col-sm-12'>
                    <label for='password_confirmation'>Confirme la Contraseña:</label>    
                    <input type='password' name='contraseña_confirmation' id='contraseña_confirmation' placeholder='Ingrese nuevamente la contraseña' required='required' class='form-control'>
                </div>
                  
                <!-- Submit Button -->
                <button type='submit' name='button' class='btn btn-warning mt-3'>Registrarme</button> 
            </form> 

                <!--- Botón para redirigir a Inicio de Sesión ------>
                <div class="col-sm-12 text-center mt-3">
                    <a href="{{ route('login') }}" class='btn btn-secondary'>Inicio de Sesión</a> 
                </div>
            </div>  
        </form> 
    </div>

</body>     
</html>
