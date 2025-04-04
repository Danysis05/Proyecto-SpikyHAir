<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styleForm.css') }}">
    <title>Agregar Servicio</title>
</head>
<body>

    <form action="{{ route('guardarServicio')}}" method="POST">
        @csrf
        <h1>Agregar Servicio</h1>
        <label for="nombre">Nombre</label>
        <input type="text" placeholder="Digite el nombre del servicio" name="nombre" required>

        <label for="detalles">Detalles</label>
        <input type="text" placeholder="Digite los detalles del servicio" name="detalles" required>

        <label for="precio">Precio</label>
        <input type="number" placeholder="Digite el precio del servicio" name="precio" required min="0" step="0.01">

        <button type="submit">Guardar</button>
        <a href="{{ route('crudServicios')}}">Volver</a>
    </form>

</body>
</html>

