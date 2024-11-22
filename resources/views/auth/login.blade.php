<!DOCTYPE html>
<html>
<head>
    <title>Ingreso al sistema de egresados</title>
   
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/styles.css')}}">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <!-- Mostrar mensaje flash -->
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Inicio de sesión</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Correo" name="correo" required autofocus>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Ingresar" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <!-- Botón de regresar fuera del formulario -->
                <form action="{{ route('welcome') }}" method="GET">
                    <div class="form-group">
                        <input type="submit" value="Ir a Menú principal" class="btn return_btn">
                    </div>
                </form>
                <div class="d-flex justify-content-center links">
                    Olvidaste tu correo? <a href="{{ route('register') }}">Ingresar</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#">Olvidaste tu contraseña?</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
