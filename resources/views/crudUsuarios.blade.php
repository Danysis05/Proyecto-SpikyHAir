<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleDashboard.css') }}">
    <title>Usuarios</title>
</head>
<body>
    <header>
        <div>
            <img src="{{ asset('image/Logo.png' )}}" alt="" class="menu-icono">
            <h3>DashBoard SpikyHair</h3>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('crudReservasAdmin')}}">Reservas</a></li>
                <li><a href="{{ route('crudServicios') }}">Servicios</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <h1>Bienvenid@ a Usuarios, {{ $usuario->nombre }}!</h1>
    <form action="{{ route('crudUsuarios') }}" method="GET" class="filtros">
        <label for="nombre">Filtrar por Nombre:</label>
        <select name="nombre" id="">
            <option value="">Todos</option>
            @foreach($usuarios->unique('nombre') as $usuario)
                <option value="{{ $usuario->nombre }}" {{ request('nombre') == $usuario->nombre ? 'selected' : '' }}>
                    {{ $usuario->nombre }}
                </option>
            @endforeach
        </select>

        <label for="correo">Filtrar por Correo:</label>
        <select name="correo" id="correo">
            <option value="">Todos</option>
            @foreach($usuarios->unique('correo') as $usuario)
                <option value="{{ $usuario->correo }}" {{ request('correo') == $usuario->correo ? 'selected' : '' }}>
                    {{ $usuario->correo }}
                </option>
            @endforeach
        </select>

        <label for="rol">Filtrar por Rol:</label>
        <select name="rol" id="rol">
            <option value="">Todos</option>
            @foreach($usuarios->unique('rol') as $usuario)
                <option value="{{ $usuario->rol }}" {{ request('rol') == $usuario->rol ? 'selected' : '' }}>
                    {{ $usuario->rol }}
                </option>
            @endforeach
        </select>

        <button type="submit">Filtrar</button>
    </form>

    <table >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th >Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario )
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->correo }}</td>
                <td>********</td> <!-- No mostrar la contraseña -->
                <td> {{$usuario->rol}}</td>
                <td>
                    <form action="{{ route('eliminar', $usuario->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</body>
</html>
