<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/94f5bc3331.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
    <title>Servicios</title>
</head>
<body>
    <header>
        <div class="contenedor">
            <img src="{{ asset('image/Logo.png') }}" alt="" class="menu-icono">
            <nav>

                <ul class="lista-menu">
                    <li>
                        <a href="{{ route('index') }}">Inicio</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="{{ route('crudReservasUsuario') }}">Reservas</a>
                    </li>
                    <li>|</li>
                    <li>|</li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                            @csrf
                            <button type="submit">LogOut</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
            <section>
                <h1>Servicios</h1>
                <div class="separacion"></div>
                <div class="contenedor2">
                    <div class="servicios">
                        @foreach($servicios as $servicio)
                            <div class="servicio">
                                <h2>{{ $servicio->nombre }}</h2>
                                <p><strong>Precio:</strong> ${{ number_format($servicio->precio, 2) }}</p>
                                <form action="{{ route('reservas.create') }}" method="GET">
                                    <button type="submit">Reservar cita</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <footer>
                <div class="contenedor-footer">
                    <div class="nav-footer">
                        <ul>
                            <li>
                                <a href="{{ route('index') }}">Inicio</a>
                            </li>
                            <li> | </li>
                            <li>
                                <a href="{{ route('productos') }}">Productos</a>
                            </li>
                            <li> | </li>
                            <li>
                                <a href="perfilpelu.html">Contacto</a>
                            </li>
                        </ul>
                    </div>
                    <div class="listas-footer">
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-last"><p>© SpikyHair 2024</p></div>
            </footer>
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
