<?php

/**
 * Script para mostrar los detalles del pago
 */

require 'config/config.php';
require 'fpdf/fpdf.php';

$id_transaccion = isset($_GET['key']) ? $_GET['key'] : '';

$error = '';

if ($id_transaccion == '') {
    $error = 'Error al procesar la petición';
} else {

    $db = new Database();
    $con = $db->conectar();

    $sql = $con->prepare("SELECT count(id) FROM compra WHERE id_transaccion=? AND (status=? OR status=?)");
    $sql->execute([$id_transaccion, 'COMPLETED', 'approved']);
    if ($sql->fetchColumn() > 0) {

        $sql = $con->prepare("SELECT id, fecha, email, total FROM compra WHERE id_transaccion=? AND (status=? OR status=?) LIMIT 1");
        $sql->execute([$id_transaccion, 'COMPLETED', 'approved']);
        $row = $sql->fetch(PDO::FETCH_ASSOC);

        $idCompra = $row['id'];
        $total = $row['total'];
        $fecha = $row['fecha'];

        $sqlDet = $con->prepare("SELECT nombre, precio, cantidad FROM detalle_compra WHERE id_compra=?");
        $sqlDet->execute([$idCompra]);
    } else {
        $error = "Error al comprobar la compra";
    }
}
// Función para generar el PDF
/*function generarPDF($id_transaccion, $row, $sqlDet)
{
    // Crear la carpeta 'reports' si no existe
    if (!file_exists('fpdf/reports')) {
        mkdir('fpdf/reports', 0777, true);
    }

    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->Image('images/optica.jpg', 10, 10, 30); // Cambia la ruta y tamaño según el logo

    $pdf->SetFont('Arial', 'B', 16);

    // Encabezado
    $pdf->Cell(0, 10, 'Nota de Venta - Folio: ' . $id_transaccion, 0, 1, 'C');
    $pdf->Ln(10);

    // Información de la compra
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Fecha de compra: ' . $row['fecha'], 0, 1);
    $pdf->Cell(0, 10, 'Total: $' . $row['total'], 0, 1);
    $pdf->Ln(10);

    // Tabla de productos
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(30, 10, 'Cantidad', 1);
    $pdf->Cell(80, 10, 'Producto', 1);
    $pdf->Cell(40, 10, 'Importe', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 12);
    while ($row_det = $sqlDet->fetch(PDO::FETCH_ASSOC)) {
        $importe =  $row_det['cantidad'] * $row_det['precio'];
        $pdf->Cell(30, 10, $row_det['cantidad'], 1);
        $pdf->Cell(80, 10, $row_det['nombre'], 1);
        $pdf->Cell(40, 10, $importe, 1);
        $pdf->Ln();
    }

    // Guardar el PDF
    $fileName = 'nota_de_venta_' . $id_transaccion . '.pdf';
    $pdf->Output('F', 'fpdf/reports/' . $fileName);

    // Retornar el nombre del archivo
    return $fileName;
}*/

function generarPDF($id_transaccion, $row, $sqlDet, $con)
{
    if (!file_exists('fpdf/reports')) {
        mkdir('fpdf/reports', 0777, true);
    }

    $pdf = new FPDF();
    $pdf->AddPage();

    // Añadir logo
    $pdf->Image('images/optica.jpg', 10, 10, 30);

    $pdf->SetFont('Arial', 'B', 16);

    // Encabezado
    $pdf->Cell(0, 10, 'Nota de Venta - Folio: ' . $id_transaccion, 0, 1, 'C');
    $pdf->Ln(10);

    // Obtener datos del cliente desde la base de datos
    $sqlCliente = $con->prepare("SELECT dni, apellidos, nombres, telefono FROM clientes WHERE email=?");
    $sqlCliente->execute([$row['email']]);
    $cliente = $sqlCliente->fetch(PDO::FETCH_ASSOC);

    if ($cliente) {
        // Información del cliente
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Datos del Cliente', 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Nombre: ' . $cliente['nombres'] . ' ' . $cliente['apellidos'], 0, 1);
        $pdf->Cell(0, 10, 'Cedula/RUC: ' . $cliente['dni'], 0, 1);
        $pdf->Cell(0, 10, 'Telefono: ' . $cliente['telefono'], 0, 1);
        $pdf->Ln(10);
    } else {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Datos del Cliente no encontrados.', 0, 1);
        $pdf->Ln(10);
    }

    // Información de la compra
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Fecha de compra: ' . $row['fecha'], 0, 1);
    $pdf->Cell(0, 10, 'Total: $' . number_format($row['total'], 2), 0, 1); // El total ya incluye el IVA
    $pdf->Ln(10);

    // Tabla de productos
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(80, 10, 'Producto', 1);
    $pdf->Cell(30, 10, 'Cantidad', 1);
    $pdf->Cell(40, 10, 'Precio Unitario', 1);
    $pdf->Cell(40, 10, 'Subtotal', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 12);
    $subtotal = 0;

    while ($item = $sqlDet->fetch(PDO::FETCH_ASSOC)) {
        $nombre = $item['nombre'];
        $precio = $item['precio']; // Precio unitario ya con IVA
        $cantidad = $item['cantidad'];
        $total_item = $precio * $cantidad;

        $pdf->Cell(80, 10, $nombre, 1);
        $pdf->Cell(30, 10, $cantidad, 1, 0, 'C');
        $pdf->Cell(40, 10, '$' . number_format($precio, 2), 1, 0, 'R');
        $pdf->Cell(40, 10, '$' . number_format($total_item, 2), 1, 0, 'R');
        $pdf->Ln();

        $subtotal += $total_item;
    }

    // No es necesario calcular IVA, ya que el total ya lo incluye
    $pdf->Ln(10);
    $pdf->Cell(155, 10, 'Total a Pagar', 1, 0, 'R');
    $pdf->Cell(35, 10, '$' . number_format($subtotal, 2), 1, 1, 'R'); // El total ya incluye IVA

    // Salida del PDF
    /*$fileName = 'nota_venta_' . $id_transaccion . '.pdf';
    $pdf->Output('F', 'fpdf/reports/' . $fileName);

    // Devolver el nombre del archivo
    return $fileName;*/
    $pdf->Output('I', 'nota_venta_' . $id_transaccion . '.pdf');
}

// Si se hace clic en el botón para generar la nota de venta en PDF
if (isset($_POST['generar_pdf'])) {
    // Verifica que se haya establecido la conexión a la base de datos
    if (isset($con)) {
        // Llama a la función generarPDF y obtén el nombre del archivo generado
        $fileName = generarPDF($id_transaccion, $row, $sqlDet, $con); // Asegúrate de pasar la conexión a la base de datos

        // Redirige al archivo PDF generado
        header('Location: fpdf/reports/' . $fileName);
        exit();
    } else {
        echo "Error: No se pudo establecer la conexión a la base de datos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Óptica Sooleil</title>

    <link href="css/estilos.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <?php include 'menu.php'; ?>

    <!-- Contenido -->
    <main class="flex-shrink-0">
        <div class="container">
            <?php if (strlen($error) > 0) { ?>
                <div class="row">
                    <div class="col">
                        <h3><?php echo $error; ?></h3>
                    </div>
                </div>

            <?php } else { ?>

                <div class="row">
                    <div class="col">
                        <b>Folio de compra:</b> <?php echo $id_transaccion; ?><br>
                        <b>Fecha de compra:</b> <?php echo $row['fecha']; ?><br>
                        <b>Total:</b> <?php echo $row['total']; ?><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row_det = $sqlDet->fetch(PDO::FETCH_ASSOC)) {
                                    $importe =  $row_det['cantidad'] * $row_det['precio']; ?>
                                    <tr>
                                        <td><?php echo $row_det['cantidad']; ?></td>
                                        <td><?php echo $row_det['nombre']; ?></td>
                                        <td><?php echo $importe; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form method="POST">
                            <!--<button type="submit" name="generar_pdf" class="btn btn-primary" target="_blank">Generar Nota de Venta en PDF</button>-->
                            <a href="fpdf/reports/nota_venta_<?php echo $id_transaccion; ?>.pdf" target="_blank">Generar Nota de Venta en PDF</a>
                        </form>
                    </div>
                </div>

            <?php } ?>

        </div>
    </main>


    <?php include 'footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>js/bootstrap.bundle.min.js"></script>

</body>

</html>