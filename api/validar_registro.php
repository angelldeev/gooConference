<?php if (isset($_POST['submit'])): 
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $regalo = $_POST['regalo'];
            $total = $_POST['total_pedido'];
            $fecha = date('Y-m-d H:i:s');
            //PEDIDOS
            $boletos = $_POST['boletos'];
            $camisas = $_POST['pedido_camisas'];
            $etiquetas = $_POST['pedido_eiquetas'];
            include_once 'include/functions/funciones.php';
            $pedido = productos_json($boletos, $camisas, $etiquetas);
            //eventos
            $eventos = $_POST['registro'];
            $registro = eventos_json($eventos);
            //INSERCION DE REGISTROS
            try {
                require_once('include/functions/dbconection.php');
                $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
                $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
                $stmt->execute();
                $stmt->close();
                $conn->close();
                header('Location: validar_registro.php?exitoso=1')
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
            ?>
        <?php endif; ?>  
<?php include_once "include/templates/header.php"; ?>
<section class="section contenedor">
        <h2>RESUMEN REGISTRO</h2>
    <?php if (isset($_GET['exitoso'])):
        if($_GET['exitoso'] == "1"):
            echo "Registro exitoso";
     endif; ?>
    
</section>


<?php include_once "include/templates/footer.php"; ?>
