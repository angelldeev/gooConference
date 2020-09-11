<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <!-- Place favicon.ico in the root directory -->
    <script defer src="js/js/all.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <?php 
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php","", $archivo);
        if($pagina == 'invitados' || $pagina == 'index') {
            echo '<link rel="stylesheet" href="css/colorbox.css">';
        } else if($pagina == 'conferencia'){
            echo '<link rel="stylesheet" href="css/lightbox.css">';
        }
        
    ?>

    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;700&display=swap" rel="stylesheet">

    <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina;?>">

    <!-- Add your site or application content here -->
    <header class="site-header">
        <div class="hero">
            <div class="contenido-header contenedor">
                <nav class="redes-sociales">
                    <a href="#"><i class="iconbtn fab fa-facebook-f"></i></a>
                    <a href="#"><i class="iconbtn fab fa-twitter"></i></a>
                    <a href="#"><i class="iconbtn fab fa-instagram"></i></a>
                    <a href="#"><i class="iconbtn fab fa-linkedin-in"></i></a>
                </nav>
                <div class="info-event">
                    <div class="datos">
                        <p class="fecha"><i class="far fa-calendar-alt"></i>10/12/12</p>
                        <p class="lugar"><i class="fas fa-map-marked-alt"></i>Ciudad Guatemala</p>
                    </div>

                    <h1 class="titulo-sitio">gooConference</h1>
                    <p class="slogan">Las mejores conferencias en <span>Guatemala</span></p>
                </div>

            </div>
        </div>
    </header>

    <div class="nav-1">
        <div class="contenido-nav contenedor">
            <div class="logo">
               <a href="index.php"><img src="img/logo.svg" alt="logo.l"> </a>
            </div>
            <div class="menu-mov">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="nav-primary">
                <a class="btn btn-nav" href="conferencias.php" target="_blank">Conferencias</a>
                <a class="btn btn-nav" href="calendario.php" target="_blank">Calendarios</a>
                <a class="btn btn-nav" href="invitados.php" target="_blank">Invitados</a>
                <a class="btn btn-nav" href="registro.php" target="_blank">Reservaciones</a>
            </nav>
        </div>
    </div>