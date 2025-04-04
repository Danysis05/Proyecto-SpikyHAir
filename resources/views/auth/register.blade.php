<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/StyleRegister.css') }}">
    <script src="https://kit.fontawesome.com/94f5bc3331.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Registro</title>
</head>
<body>

    <div class="container">
        <div class="box-info">
            <h1>Registrate</h1>
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

        <form action="{{ route('registrarse.post') }}" method="POST">
            @csrf
            <div class="input-box">
                <input id="nombre" type="text" name="nombre" required placeholder="Nombre">
            </div>

            <div class="input-box">
                <input id="email" type="email" name="correo" required placeholder="Correo electrónico">
            </div>

            <div class="input-box">
                <input id="password" type="password" name="password" required placeholder="Contraseña">
            </div>
            <div class="input-box">
                <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Confirmar contraseña">
            </div>

            <div class="input-box">
                <input id="telefono" type="text" name="telefono" required placeholder="Teléfono">
            </div>

            <button type="submit">Registrarse</button>
            <a href="{{ route('iniciarSesion') }}" id="back">Regresar</a>
        </form>

    </div>

</body>
</html>
