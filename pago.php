<?php

/**
 * Pantalla para realizar pago
 */

require 'config/config.php';

// SDK de Mercado Pago
//require __DIR__ .  '/vendor/autoload.php';
//MercadoPago\SDK::setAccessToken(TOKEN_MP);
//$preference = new MercadoPago\Preference();
$productos_mp = array();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$db = new Database();
$con = $db->conectar();

$lista_carrito = array();

if ($productos != null) {
    foreach ($productos as $clave => $producto) {
        $sql = $con->prepare("SELECT id, nombre, precio, descuento, $producto AS cantidad FROM productos WHERE id=? AND activo=1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
} else {
    header("Location: index.php");
    exit;
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
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">

    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>
    <!--<script src="https://sdk.mercadopago.com/js/v2"></script>-->

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

        /* Media queries para dispositivos móviles y tablets */
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
                padding: 8px 12px;
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
                padding: 7px 10px;
            }

            .card {
                margin: 10px 0;
                padding: 10px;
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
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h4>Detalles de pago</h4>
                    <div lcass="row">
                        <div class="col-10">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>

                    <div lcass="row">
                        <div class="col-10 text-center">
                            <div class="checkout-btn"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($lista_carrito == null) {
                                    echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                                } else {
                                    $total = 0;
                                    foreach ($lista_carrito as $producto) {
                                        $descuento = $producto['descuento'];
                                        $precio = $producto['precio'];
                                        $cantidad = $producto['cantidad'];
                                        $precio_desc = $precio - (($precio * $descuento) / 100);
                                        $subtotal = $cantidad * $precio_desc;
                                        $total += $subtotal;

                                        //$item = new MercadoPago\Item();
                                        //$item->id = $producto['id'];
                                        //$item->title = $producto['nombre'];
                                        //$item->quantity = $cantidad;
                                        //$item->unit_price = $precio_desc;
                                        //$item->currency_id = CURRENCY;

                                        //array_push($productos_mp, $item);
                                        //unset($item);
                                ?>
                                        <tr>
                                            <td><?php echo $producto['nombre']; ?></td>
                                            <td><?php echo $cantidad . ' x ' . MONEDA . '<b>' . number_format($subtotal, 2, '.', ',') . '</b>'; ?></td>
                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td colspan="2">
                                            <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                                        </td>
                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <?php

    $_SESSION['carrito']['total'] = $total;

    //$preference->items = $productos_mp;

    //$preference->back_urls = array(
    //"success" => SITE_URL . "/clases/captura_mp.php",
    //"failure" => SITE_URL . "/clases/fallo.php"
    //);
    //$preference->auto_return = "approved";
    //$preference->binary_mode = true;
    //$preference->statement_descriptor = "STORE CDP";
    //$preference->external_reference = "Reference_1234";
    //$preference->save();

    ?>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>

    <script>
        paypal.Buttons({

            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $total; ?>
                        },
                        description: 'Compra Óptica Sooleil'
                    }]
                });
            },

            onApprove: function(data, actions) {

                let url = 'clases/captura.php';
                actions.order.capture().then(function(details) {

                    let trans = details.purchase_units[0].payments.captures[0].id;
                    return fetch(url, {
                        method: 'post',
                        mode: 'cors',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            details: details
                        })
                    }).then(function(response) {
                        window.location.href = "completado.php?key=" + trans;
                    });
                });
            },

            onCancel: function(data) {
                alert("Cancelo :(");
            }
        }).render('#paypal-button-container');


        /*const mp = new MercadoPago('<?php echo PUBLIC_KEY_MP; ?>', {
            locale: '<?php echo LOCALE_MP; ?>'
        });

        // Inicializa el checkout Mercado Pago
        mp.checkout({
            preference: {
                id: '<?php echo $preference->id; ?>'
            },
            render: {
                container: '.checkout-btn', // Indica el nombre de la clase donde se mostrará el botón de pago
                type: 'wallet', // Muestra un botón de pago con la marca Mercado Pago
                label: 'Pagar con Mercado Pago', // Cambia el texto del botón de pago (opcional)
            }
        });*/
    </script>

</body>

</html>