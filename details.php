<?php

/**
 * Pantalla individual para mostrar el producto
 */

require 'config/config.php';

$db = new Database();
$con = $db->conectar();

$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

if ($slug == '') {
    echo 'Error al procesar la petición';
    exit;
}

$sql = $con->prepare("SELECT count(id) FROM productos WHERE slug=? AND activo=1");
$sql->execute([$slug]);
if ($sql->fetchColumn() > 0) {

    $sql = $con->prepare("SELECT id, nombre, descripcion, precio, descuento FROM productos WHERE slug=? AND activo=1");
    $sql->execute([$slug]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    $id = $row['id'];
    $descuento = $row['descuento'];
    $precio = $row['precio'];
    $precio_desc = $precio - (($precio * $descuento) / 100);
    $dir_images = 'images/productos/' . $id . '/';

    $rutaImg = $dir_images . 'principal.jpg';

    if (!file_exists($rutaImg)) {
        $rutaImg = 'images/no-photo.jpg';
    }

    $imagenes = array();
    $dirint = dir($dir_images);

    while ($archivo = $dirint->read()) {
        if ($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))) {
            $image = $dir_images . $archivo;
            $imagenes[] = $image;
        }
    }

    $dirint->close();
}

?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Óptica Sooleil</title>

    <link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <base href="<?php echo SITE_URL; ?>">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.7rem;
            color: #fff !important;
        }

        .nav-link {
            font-weight: 600;
            font-size: 1.1rem;
            color: #fff !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #00C4FF !important;
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

        .card-header {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        .list-group-item {
            color: #007BFF;
            transition: background-color 0.3s ease;
        }

        .list-group-item.active {
            background-color: #007BFF;
            color: white;
        }

        .list-group-item:hover {
            background-color: #00C4FF;
            color: white;
        }

        .btn {
            border-radius: 50px;
            padding: 12px 25px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.3s ease;
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

        .card-body h5 {
            font-weight: 700;
            color: #007BFF;
        }

        .card-body p {
            text-align: justify;
            color: #555;
        }

        .card-footer {
            background-color: #f8f9fa;
        }

        .form-select {
            border-radius: 30px;
            padding: 5px 15px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            color: #333;
        }

        .form-select:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        .form-label {
            font-weight: bold;
            color: #555;
        }

        /* Ajustes de responsividad para tablets */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.4rem;
            }

            .nav-link {
                font-size: 1rem;
            }

            .btn {
                font-size: 1rem;
                padding: 10px 20px;
            }

            .card {
                margin: 15px 0;
                padding: 15px;
            }

            .card-body h5 {
                font-size: 1.2rem;
            }

            .card-body p {
                font-size: 0.9rem;
            }

            .form-select {
                padding: 8px 12px;
            }

            .btn-success,
            .btn-primary {
                padding: 10px 20px;
            }
        }

        /* Ajustes de responsividad para teléfonos móviles */
        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.2rem;
            }

            .nav-link {
                font-size: 0.9rem;
            }

            .btn {
                font-size: 0.9rem;
                padding: 8px 15px;
            }

            .card {
                margin: 10px 0;
                padding: 10px;
            }

            .card-body h5 {
                font-size: 1.1rem;
            }

            .card-body p {
                font-size: 0.8rem;
            }

            .form-select {
                padding: 7px 10px;
            }

            .btn-success,
            .btn-primary {
                padding: 8px 15px;
            }
        }
    </style>

</head>

<body class="d-flex flex-column h-100">

    <?php include 'menu.php'; ?>

    <!-- Contenido -->
    <main class="flex-shrink-0">
        <div class="container">
            <div class="row">
                <div class="col-md-5 order-md-1">
                    <!--Carrusel-->
                    <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!--Imagenes-->
                            <div class="carousel-item active">
                                <img src="<?php echo $rutaImg; ?>" class="d-block w-100">
                            </div>

                            <?php foreach ($imagenes as $img) { ?>
                                <div class="carousel-item">
                                    <img src="<?php echo $img; ?>" class="d-block w-100">
                                </div>
                            <?php } ?>

                            <!--Imagenes-->
                        </div>

                        <!--Controles-->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                        <!--Controles carrusel-->
                    </div>
                    <!--Carrusel-->
                </div>

                <div class="col-md-7 order-md-2">
                    <h2><?php echo $row['nombre']; ?></h2>

                    <?php if ($descuento > 0) { ?>

                        <p><del><?php echo MONEDA; ?> <?php echo number_format($precio, 2, '.', ','); ?></del></p>
                        <h2><?php echo MONEDA; ?> <?php echo number_format($precio_desc, 2, '.', ','); ?> <small class=" text-success"><?php echo $descuento; ?>% descuento</small></h2>

                    <?php } else { ?>

                        <h2><?php echo MONEDA . ' ' . number_format($precio, 2, '.', ','); ?></h2>

                    <?php } ?>

                    <p class="lead"><?php echo $row['descripcion']; ?></p>

                    <div class="col-3 my-3">
                        <input class="form-control" id="cantidad" name="cantidad" type="number" min="1" max="10" value="1">
                    </div>

                    <div class="d-grid gap-3 col-7">
                        <button class="btn btn-primary" type="button" onClick="comprarAhora(<?php echo $id; ?>, cantidad.value)">Comprar ahora</button>
                        <button class="btn btn-outline-primary" type="button" onClick="addProducto(<?php echo $id; ?>, cantidad.value)">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>

    <script>
        function addProducto(id, cantidad) {
            var url = 'clases/carrito.php';
            var formData = new FormData();
            formData.append('id', id);
            formData.append('cantidad', cantidad);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors',
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_cart")
                        elemento.innerHTML = data.numero;
                    }
                })
        }

        function comprarAhora(id, cantidad) {
            var url = 'clases/carrito.php';
            var formData = new FormData();
            formData.append('id', id);
            formData.append('cantidad', cantidad);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors',
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_cart")
                        elemento.innerHTML = data.numero;
                        location.href = 'checkout.php';
                    }
                })
        }
    </script>
</body>

</html>