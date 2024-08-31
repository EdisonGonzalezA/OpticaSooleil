<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información - WebTech Solutions</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: calc(100vh - 140px);
            /* 100% del viewport height menos el tamaño del navbar y footer */
        }
    </style>
</head>


<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../webtech.php">WebTech Solutions</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Catálogo</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Información de la tienda -->
    <div>
        <p>
        <div class="container">
            <h2 class="text-center mb-4">WebTech Solutions</h2>
            <hr>
            <h4 class="text-center mb-4">¿Quiénes somos?</h4>
            <p class="text-center">Somos una tienda especializada en repuestos de computadoras, tecnologías, armado, reparación y diagnóstico de PC. Nuestro objetivo es proporcionar a nuestros clientes productos de calidad y servicios profesionales para cubrir todas sus necesidades tecnológicas.</p>
            <hr>
            <h4 class="text-center mb-4">¿Qué ofrecemos?</h4>
            <p class="text-center">En nuestro catálogo encontrarás una amplia gama de productos, desde componentes para armar tu propia computadora hasta accesorios y periféricos de última tecnología.</p>
            <p class="text-center">No dudes en contactarnos si necesitas asesoramiento técnico o tienes alguna consulta sobre nuestros productos y servicios. Estamos aquí para ayudarte.</p>
            <hr>
        </div>
    </div>

    <!-- Contacto -->
    <section id="contacto" class="py-4">
        <div class="container">
            <h2 class="text-center mb-4">Contáctanos</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">WhatsApp</h5>
                            <a href="https://api.whatsapp.com/send/?phone=%2B593999738698&text&type=phone_number&app_absent=0" class="btn btn-success btn-lg"></i><i class="fa-brands fa-whatsapp fa-beat"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Correo electrónico</h5>
                            <a href="mailto: bryanmoranchandi@gmail.com" class="btn btn-primary btn-lg"><i class="fa-solid fa-envelope fa-bounce"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <?php include '../footer.php'; ?>

    <script src="https://kit.fontawesome.com/af1771b0a0.js" crossorigin="anonymous"></script>
</body>

</html>