<?php

/**
 * Pantalla principal para mostrar el listado de productos
 */

require 'config/config.php';

$db = new Database();
$con = $db->conectar();

$idCategoria = $_GET['cat'] ?? '';
$orden = $_GET['orden'] ?? '';
$buscar = $_GET['q'] ?? '';

$orders = [
    'asc' => 'nombre ASC',
    'desc' => 'nombre DESC',
    'precio_alto' => 'precio DESC',
    'precio_bajo' => 'precio ASC',
];

$order = $orders[$orden] ?? '';
$params = [];

$sql = "SELECT id, slug, nombre, precio FROM productos WHERE activo=1";

if (!empty($buscar)) {
    $sql .= " AND (nombre LIKE ? OR descripcion LIKE ?)";
    $params[] = "%$buscar%";
    $params[] = "%$buscar%";
}

if (!empty($idCategoria)) {
    $sql .= " AND id_categoria = ?";
    $params[] = $idCategoria;
}

if (!empty($order)) {
    $sql .= " ORDER BY $order";
}

$query = $con->prepare($sql);
$query->execute($params);
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
$totalRegistros = count($resultado);

$categoriaSql = $con->prepare("SELECT id, nombre FROM categorias WHERE activo=1");
$categoriaSql->execute();
$categorias = $categoriaSql->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Óptica Sooleil</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
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

        /* Responsividad para pantallas pequeñas (móviles y tablets) */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
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
            }

            .card-body h5 {
                font-size: 1.2rem;
            }

            .card-body p {
                font-size: 0.9rem;
            }

            .form-select {
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.3rem;
            }

            .nav-link {
                font-size: 0.9rem;
            }

            .btn {
                font-size: 0.9rem;
                padding: 8px 15px;
            }

            .card-body h5 {
                font-size: 1.1rem;
            }

            .card-body p {
                font-size: 0.8rem;
            }

            .form-select {
                padding: 8px;
            }
        }
    </style>

</head>

<body class="d-flex flex-column h-100">

    <?php include 'menu.php'; ?>

    <!-- Contenido -->
    <main class="flex-shrink-0">
        <div class="container p-3">
            <div class="row">
                <!--<section id="presentacion" class="bg-white py-5" style="position: relative; overflow: hidden;">
                    <div class="container text-center" style="position: relative; z-index: 1;">
                        <h1 class="display-4 mb-4">Bienvenido a Óptica Sooleil</h1>
                        <p class="lead">Tu destino para lentes de alta calidad, tecnología óptica avanzada, reparación y cuidado especializado de tu visión.</p>
                    </div>

                    Div para la imagen superpuesta
                    <div class="superposed-image" style="
                            position: absolute;
                            bottom: 130px; /* Ajusta la posición vertical */
                            right: 70px;  /* Ajusta la posición horizontal */
                            width: 200px; /* Ajusta el tamaño de la imagen */
                            height: 100px;
                            background-image: url('images/optica.jpg');
                            background-size: cover;
                            background-position: center;
                            z-index: 2;
                            border-radius: 10%; /* Hace la imagen circular */
                            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3); /* Añade una sombra a la imagen */
                        ">
                    </div>
                </section>-->
                <!--<div class="superposed-image" style="-->



                <div class="col-12 col-md-3 col-lg-3">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            Categorías
                        </div>

                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action">TODO</a>
                            <?php foreach ($categorias as $categoria) { ?>
                                <a href="index.php?cat=<?php echo $categoria['id']; ?>" class="list-group-item list-group-item-action <?php echo ($categoria['id'] == $idCategoria) ? 'active' : ''; ?>">
                                    <?php echo $categoria['nombre']; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-9 col-lg-9">
                    <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                        <strong class="d-block py-2"><?php echo $totalRegistros; ?> Artículos encontrados </strong>
                        <div class="ms-auto">
                            <form action="index.php" id="ordenForm" method="get" onchange="submitForm()">
                                <input type="hidden" id="cat" name="cat" value="<?php echo $idCategoria; ?>">
                                <label for="cbx-orden" class="form-label">Ordena por</label>

                                <select class="form-select d-inline-block w-auto pt-1 form-select-sm" name="orden" id="orden">
                                    <option value="precio_alto" <?php echo ($orden === 'precio_alto') ? 'selected' : ''; ?>>Pecios más altos</option>
                                    <option value="precio_bajo" <?php echo ($orden === 'precio_bajo') ? 'selected' : ''; ?>>Pecios más bajos</option>
                                    <option value="asc" <?php echo ($orden === 'asc') ? 'selected' : ''; ?>>Nombre A-Z</option>
                                    <option value="desc" <?php echo ($orden === 'desc') ? 'selected' : ''; ?>>Nombre Z-A</option>
                                </select>
                            </form>
                        </div>
                    </header>

                    <div class="row">
                        <?php foreach ($resultado as $row) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                                <div class="card w-100 my-2 shadow-2-strong">

                                    <?php
                                    $id = $row['id'];
                                    $imagen = "images/productos/$id/principal.jpg";

                                    if (!file_exists($imagen)) {
                                        $imagen = "images/no-photo.jpg";
                                    }
                                    ?>
                                    <a href="details/<?php echo $row['slug']; ?>">
                                        <img src="<?php echo $imagen; ?>" class="img-thumbnail" style="max-height: 300px">
                                    </a>

                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex flex-row">
                                            <h5 class="mb-1 me-1"><?php echo MONEDA . ' ' . number_format($row['precio'], 2, '.', ','); ?></h5>
                                        </div>
                                        <p class="card-text"><?php echo $row['nombre']; ?></p>
                                    </div>

                                    <div class="card-footer bg-transparent">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a class="btn btn-success" onClick="addProducto(<?php echo $row['id']; ?>)">Agregar</a>
                                            <div class="btn-group">
                                                <a href="details/<?php echo $row['slug']; ?>" class="btn btn-primary">Detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>
    <script>
        function addProducto(id) {
            var url = 'clases/carrito.php';
            var formData = new FormData();
            formData.append('id', id);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors',
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_cart")
                        elemento.innerHTML = data.numero;
                    } else {
                        alert("No ay suficientes productos en el stock")
                    }
                })
        }

        function submitForm() {
            document.getElementById("ordenForm").submit();
        }
    </script>

</body>

</html>