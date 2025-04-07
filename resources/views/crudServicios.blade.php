<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleDashboard.css') }}">
    <title>Servicios</title>
</head>
<body>
<header>
    <div>
        <img src="{{ asset('image/Logo.png') }}" alt="Logo" class="menu-icono">
        <h3>DashBoard SpikyHair</h3>
    </div>
    <nav>
        <ul>
            <li><a href="{{ route('crudReservasAdmin')}}">Reservas</a></li>
            <li><a href="{{ route('crudUsuarios') }}">Usuarios</a></li>
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

<h1>Servicios Disponibles</h1>
<form action="{{ route('crudServicios') }}" method="GET" class="filtros">

    <label for="nombre">Filtrar por Nombre:</label>
    <select name="nombre" id="">
        <option value="">Todos</option>
        @foreach($servicios->unique('nombre') as $servicio)
            <option value="{{ $servicio->nombre }}" {{ request('nombre') == $servicio->nombre ? 'selected' : '' }}>
                {{ $servicio->nombre }}
            </option>
        @endforeach
    </select>
    <label for="precio">Filtrar por Precio:</label>
    <select name="precio" id="precio">
        <option value="">Todos</option>
        @foreach($servicios->unique('precio') as $servicio)
            <option value="{{ $servicio->precio }}" {{ request('precio') == $servicio->precio ? 'selected' : '' }}>
                ${{ $servicio->precio }}
            </option>
        @endforeach
    </select>



    <button type="submit">Filtrar</button>
</form>

<a href="{{ route('crearServicio')}}" id="botonAgragar">Agregar Servicio</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Detalles</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($servicios as $servicio)
        <tr>
            <td>{{ $servicio->id }}</td>
            <td>{{ $servicio->nombre }}</td>
            <td>{{ $servicio->detalles }}</td>
            <td>{{ number_format($servicio->precio, 2) }} €</td>
            <td>
                <form action="{{ route('eliminarServicio', $servicio->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este servicio?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
