<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/StyleUser.css') }}">
    <script src="https://kit.fontawesome.com/94f5bc3331.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Inicio de Sesion</title>
</head>
<body>


    <div class="container">
        <div class="box-info">
            <h1>Iniciar Sesion</h1>
            <div class="data">
                <p><i class="fa-solid fa-phone"></i> 3044559114</p>
                <p><i class="fa-solid fa-envelope"></i> peluqueriaMaria</p>
                <p><i class="fa-solid fa-location-pin"></i> Bogota-Colombia</p>
            </div>
            <div class="links">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
            </div>
        </div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-box">
                <input type="email" name="correo" id="correo" value="{{ old('correo') }}" placeholder="Correo Electronico" required>
                @error('correo')
                    <span>{{ $message }}</span>
                @enderror

            </div>
            <div class="input-box">
                <input id="password" type="password" required placeholder="Contraseña" name="password">

            </div>
            <button type="submit">Iniciar Sesión</button>
            <p>No tienes cuenta registrate <a href="{{ route('registrarse') }}">Registrarse</a></p>
        </form>


    </div>

</body>
</html>
