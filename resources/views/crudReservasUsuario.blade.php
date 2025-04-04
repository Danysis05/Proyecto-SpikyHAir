<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleDashboard.css') }}">
    <title>Reservas</title>
</head>
<body>
<header>
    <div>
        <img src="{{ asset('image/Logo.png') }}" alt="Logo" class="menu-icono">
        <h3>SpikyHair</h3>
    </div>
    <nav>
        <ul>
            <li>
                <a href="{{ route('index') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ route('ServiciosUsuario') }}">Servicios</a>
            </li>


            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            </li>
        </ul>
    </nav>
</header>
@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<h1>Bienvenido a tus Reservas, {{ $usuario->nombre }}!</h1>
<div class="filtros">
    <form method="GET" action="{{ route('crudReservasUsuario') }}">
        <label for="id_servicio">Filtrar por servicio:</label>
        <select name="id_servicio" id="id_servicio">
            <option value="">Todos los servicios</option>
            @foreach($servicios as $servicio)
                <option value="{{ $servicio->id }}" {{ request('id_servicio') == $servicio->id ? 'selected' : '' }}>
                    {{ $servicio->nombre }}
                </option>
            @endforeach
        </select>
        <button type="submit">Filtrar</button>
    </form>
    <form action=" {{ route('crudReservasUsuario') }}" method="GET">
        <label for="fecha">Filtrar por fecha:</label>
        <select name="fecha" id="fecha">
        <option value="">Todas las Fechas</option>
            @foreach($reservas->unique('fecha') as $reserva)
                <option value="{{ $reserva->fecha }}" {{ request('fecha') == $reserva->fecha ? 'selected' : '' }}>
                    {{ $reserva->fecha }}
                </option>
            @endforeach
        </select>
        <button type="submit">Filtrar</button>
    </form>
<a href="{{ route('reservas.create')}}" id="botonAgragar">Reservar</a>
</div>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Servicio</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->servicio->nombre }}</td>
                <td>{{ $reserva->fecha }}</td>
                <td>{{ $reserva->hora }}</td>
                <td>
                    <a href="{{ route('reservas.edit', $reserva) }}">Editar</a>


                    <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">Eliminar</button>
                        </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
            <script>// Seleccionar elementos
                const menuHamburguesa = document.querySelector('.menu-hamburguesa');
                const cierreHamburguesa = document.querySelector('.cierre-hamburguesa');
                const nav = document.querySelector('nav');
                const body = document.body;

                // Abrir menú
                menuHamburguesa.addEventListener('click', () => {
                    nav.classList.add('menu-abierto');

                });

                // Cerrar menú
                cierreHamburguesa.addEventListener('click', () => {
                    nav.classList.remove('menu-abierto');
                });
                </script>

</body>
</html>
