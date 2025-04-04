<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/StylePerfil.css') }}">
    <script src="https://kit.fontawesome.com/94f5bc3331.js" crossorigin="anonymous"></script>
    <title>Reservas</title>
</head>
<body>

    <div class="container">
        <div class="box-info">
            <h1>RESERVA CON NOSOTROS</h1>
            <div class="data">
                <p><i class="fa-solid fa-phone"></i> 3044559114</p>
                <p><i class="fa-solid fa-envelope"></i> peluqueriaMaria</p>
                <p><i class="fa-solid fa-location-pin"></i> Bogotá - Colombia</p>
            </div>
            <div class="links">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
            </div>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul style="color: red,;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('reservas.store') }}" method="POST">
            @csrf
            <label for="servicio_id"><i class="fa-solid fa-cut"></i> Servicio</label>
            <select id="servicio_id" name="id_servicio" required>
                <option value="">Selecciona un Servicio</option>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                @endforeach
            </select>

            <label for="fecha"><i class="fa-regular fa-calendar-days"></i> Fecha</label>
            <input type="date" id="fecha" name="fecha" required>

            <label for="hora"><i class="fa-solid fa-clock"></i> Hora</label>
            <input type="time" id="hora" name="hora" required>

            <button type="submit">Reservar</button>
            <a href="javascript:history.back()" id="back">Regresar</a>
        </form>
    </div>

</body>
</html>
