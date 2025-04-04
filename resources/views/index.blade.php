<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scale=no">
    <title>Principal</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    <script src="https://kit.fontawesome.com/94f5bc3331.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="htt ps://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
    @if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div style="color: red;">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

        <div class="menu">
            <div class="contenedor"></div>
            <img src="{{ asset('image/Logo.png' )}}" alt="" class="menu-icono">
            <nav>
                <ul class="lista-menu">
                    <li>
                        <a href="{{ route('ServiciosUsuario') }}">Servicios</a>
                    </li>
                    <li>
                        <a href="{{ route('crudReservasUsuario') }}">Reservas</a>
                    </li>
                    <li>
                        |
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                            @csrf
                            <button type="submit">LogOut</button>
                        </form>
                    </li>
                </ul>
            </nav>


        </div>
        <div class="tex">
            <h1>SpikyHair</h1>
            <h1>Reserva tu Estilo</h1>
            <a href="{{ route('reservas.create')}}" id="botonHead">Reservar</a>
        </div>
    </header>
    <div class="separacion"></div>
    <main>
        <section id="nosotros">
            <div class="dentro">
                <img src="{{ asset('image/nosotros.jpg') }}" alt="">
                <div class="info">
                    <h1>Nosotros</h1>
                    <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
                    <p>Nuestra peluquería ha sido un pilar en la comunidad desde hace más de 10 años, ofreciendo servicios de calidad y atención personalizada. Nos comprometemos a realzar la belleza de cada cliente, guiados por nuestra misión de brindar una experiencia única y memorable.</p>
                </div>
            </div>

        </section>

        <div class="separacion"></div>
        <section id="galeria">
            <div class="container-fluid">
                <h3 id="sax2">¿Qué te ofrecemos?</h3>
                <div id="estable" class="separacion"></div>
                <div class="row">
                    <div class="columna-33 columna-mobile-50">
                        <div class="cuadrado-perfecto">
                            <a href="{{ route('ServiciosUsuario') }}">
                                <img src="{{ asset('image/Peluqueria3.jpg') }}" alt="">
                                <h4>Servicios</h4>
                            </a>
                        </div>
                    </div>
                    <div class="columna-33">
                            <h1>Ecuentra el mejor servicio para ti</h1>
                            <p>Ofrecemos servicios de peluquería especializados en cambio de imagen, brindando cortes, coloración, tratamientos capilares y asesoría personalizada para resaltar tu estilo y renovar tu apariencia.</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="separacion"></div>

        <section id="last">
            <div class="obso">
                <h1>¡Reserva tu cita hoy mismo!</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae voluptatum facere ratione aliquam perferendis</p>
                <div class="botones">
                    <a href="{{ route('reservas.create')}}">Reservar</a>
                </div>
            </div>
        </section>
        <div class="separacion"></div>
    </main>

<footer>
    <div class="contenedor-footer">
        <div class="nav-footer">
            <ul>
                <li>
                    <a href="{{ route('ServiciosUsuario') }}">Servicios</a>
                </li>
                <li>
                    <a href="{{ route('crudReservasUsuario') }}">Reservas</a>
                </li>
                <li>
                    |
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        <button type="submit">LogOut</button>
                    </form>
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
