<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Óptica Sooleil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.7rem;
            color: #f8f9fa !important;
        }

        #presentacion {
            background: linear-gradient(135deg, #007BFF 0%, #00C4FF 100%);
            color: white;
        }

        #presentacion h1 {
            font-weight: 700;
            font-size: 3rem;
        }

        #presentacion p {
            font-size: 1.25rem;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-weight: 700;
            color: #00BFFF;
            font-size: 1.5rem;
        }

        #mision-vision .card {
            background-color: #f8f9fa;
            border: none;
        }

        #mision-vision .card-title {
            font-size: 1.75rem;
        }

        #mision-vision p {
            font-size: 1.15rem;
            text-align: justify;
            color: #555;
        }

        .btn {
            border-radius: 50px;
            padding: 12px 25px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-warning {
            background-color: #ffcc00;
            border: none;
            color: #fff;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
            color: #fff;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
        }

        .btn:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }

        .footer {
            background-color: #343a40;
        }

        .footer p {
            margin: 0;
            color: #ccc;
        }

        /* Estilo para la imagen de la misión y visión */
        #mision-vision .img-fluid {
            max-width: 75%;
            border-radius: 50%;
            border: 4px solid #00BFFF;
        }

        /* Mejora del espaciado y alineación */
        .container h2 {
            font-weight: 700;
            color: #007BFF;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
        }

        .container h5 {
            font-weight: 700;
            color: #555;
        }
    </style>
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Óptica Sooleil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!--<li class="nav-item">
                        <a class="nav-link" href="index.php"> | Catálogo |</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">¡Únete a nosotros! |</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contáctanos |</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Presentación -->
    <section id="presentacion" class="bg-light py-5">
        <div class="container text-center">
            <h1 class="display-4 mb-4">Bienvenido a Óptica Sooleil</h1>
            <p class="lead">Tu destino para lentes de alta calidad, tecnología óptica avanzada, reparación y cuidado especializado de tu visión.</p>
        </div>
    </section>

    <!-- Misión y Visión -->
    <section id="mision-vision" class="py-5">
        <div class="container">
            <h2 class="text-center mb-6">Conoce sobre Óptica Sooleil</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="images/optica.jpg" alt="Óptica Sooleil" class="img-fluid rounded-circle mb-5">
                </div>
                <div class="col-md-8">
                    <p>Somos una entidad cuya prioridad es ofrecer un <strong>servicio integral de salud visual</strong> y satisfacer las necesidades de nuestros clientes, preocupándonos por la excelencia y la calidad de nuestros productos y servicios.</p>
                    <p>Nuestras labores se enfocan en la búsqueda constante del cumplimiento y desarrollo de los objetivos que nos hemos planteado, contando con la ayuda de un excelente equipo de trabajo, buscando ser la mejor opción en atención de salud visual.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h3 class="card-title text-center">Misión</h3>
                            <p class="card-text">Proveer soluciones ópticas innovadoras y de alta calidad a nuestros clientes, mejorando su salud visual y su calidad de vida. Nos comprometemos a ofrecer un servicio personalizado, utilizando tecnología avanzada y prácticas sostenibles para satisfacer las necesidades específicas de cada cliente.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h3 class="card-title text-center">Visión</h3>
                            <p class="card-text">Ser reconocidos como la óptica líder en innovación y excelencia en el servicio, expandiendo nuestro alcance a través de soluciones tecnológicas avanzadas, incluyendo aplicaciones web e inteligencia artificial, para ofrecer una experiencia integral y accesible a nuestros clientes en todo el país.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Productos 
    <section id="productos" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Nuestros productos</h2>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Ver productos</h5>
                            <a href="index.php" class="btn btn-warning btn-lg"><i class="fas fa-shop fa-bounce" style="color: #ffe5e5;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <!-- Servicios 
    <section id="servicios" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Acerca de Nosotros</h2>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Información</h5>
                            <a href="clases/informacion.php" class="btn btn-info btn-lg"><i class="fas fa-circle-info fa-shake" style="color: #d6e5ff;"></i></a>
                            <a href="clases/informacion.php" class="btn btn-info btn-lg"><i class="fas fa-circle-info fa-shake" style="color: #d6e5ff;"></i></a>
                            <a href="../clases/informacion.php" class="btn btn-info btn-lg"><i class="fas fa-circle-info fa-shake" style="color: #d6e5ff;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->

    <!-- Contacto -->
    <section id="contacto" class="py-4">
        <div class="container">
            <h2 class="text-center mb-4">Contáctanos</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">WhatsApp</h5>
                            <a href="https://api.whatsapp.com/send/?phone=%2B593969866869&text&type=phone_number&app_absent=0" class="btn btn-success btn-lg"></i><i class="fa-brands fa-whatsapp fa-beat"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Correo electrónico</h5>
                            <a href="mailto: edisongonzalezalberca1@gmail.com" class="btn btn-primary btn-lg"><i class="fa-solid fa-envelope fa-bounce"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!--<footer class="footer bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; <?php echo date('Y'); ?> Óptica Sooleil.</p>
        </div>
    </footer>-->

    <script src="https://kit.fontawesome.com/af1771b0a0.js" crossorigin="anonymous"></script>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>