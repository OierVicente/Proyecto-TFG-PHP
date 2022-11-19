<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="imagenes/icono.png" sizes="16x16">
    <link rel="stylesheet" href="bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/menu.css">
    <title>Pagina Web Oier Vicente - Index</title>
</head>

<body class="d-flex flex-column h-100">

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 box-shadow menu">
        <h5 class="my-0 mr-md-auto font-weight-normal ml-4 text-white"><i class="fas fa-snowboarding"></i> Web de Oier Sports
            <i class="fas fa-snowboarding"></i>
        </h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <?php
                if (isset($_SESSION["nombreUsuario"]) && (!empty($_SESSION["nombreUsuario"]))){
                    echo "<p class='p-2 text-white'> Bievenid@ ".$_SESSION["nombreUsuario"]." !</a>";
                }
            ?>
            <?php
                if (isset($_SESSION["rolUsuario"]) && (!empty($_SESSION["rolUsuario"]))) {
                    if ($_SESSION["rolUsuario"] == 2) {
                        echo "<a class='p-2 text-white' href='paginas/paginaAdmin.php'><i class='fas fa-user-lock'></i> Pagina Administrador</a>";
                    }
                }              
            ?>
            <a class="p-2 text-white" href="paginas/productos.php">Productos</a>
            <a class="p-2 text-white" href="paginas/contactanos.php">Contactanos</a>
        </nav>
        <?php
            if (isset($_SESSION["idUsuario"]) && (!empty($_SESSION["idUsuario"]))){
                echo "<a class='btn btn-outline-primary' href='phps/cerrarsesion.php?cerrarSesion=si'>Cerrar Sesion</a>";
              }else if(!isset($_SESSION["idUsuario"])){
                  echo "<a class='btn btn-outline-primary' href='paginas/login.php'>Iniciar Sesion</a>";
              }
        ?>
    </div>

    <div class="titulo">
        <h1>Oier Sports Web </h1>
        <h3>La mejor web de venta de producto deportivos de calidad</h3>
    </div>
    <div class="titulo2">
        <h3>Oier Sports Web </h3>
        <h6>La mejor web de venta de producto deportivos de calidad</h6>
    </div>

    <!-- Carousel bootstrap -->
    <!--<div class="row mr-0 ml-0">-->
    <!-- <div id="carouselExampleCaptions" class="carousel mx-auto col-12 col-md-6 slide w-75 rounded d-block" -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>


        </ol>
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="imagenes/carousel1.jpeg" class="" alt="">
                <div class="carousel-caption d-none d-md-block opacity-2 cuadradoTitulodeCarrousel1">
                    <h5>Halterofilia</h5>
                    <p>Deporte que consiste en el levantamiento del máximo peso posible en una barra en cuyos extremos
                        se fijan varios discos, que son los que determinan el peso final que se levanta.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="imagenes/carousel2.jpg" class="" alt="">
                <div class="carousel-caption d-none d-md-block opacity-2 cuadradoTitulodeCarrousel2">
                    <h5>Boxeo</h5>
                    <p>Deporte de contacto en el que dos contrincantes luchan utilizando únicamente sus puños con
                        guantes, golpeando a su adversario de la cintura hacia arriba, dentro de un cuadrilátero
                        especialmente diseñado para tal fin.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="imagenes/carousel3.jpg" class="" alt="">
                <div class="carousel-caption d-none d-md-block opacity-2 cuadradoTitulodeCarrousel3">
                    <h5>Fútbol</h5>
                    <p>Deporte de equipo jugado entre dos conjuntos de once jugadores cada uno y algunos árbitros que se
                        ocupan de que las normas se cumplan correctamente.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="imagenes/carousel4.jpg" class="" alt="">
                <div class="carousel-caption d-none d-md-block opacity-2 cuadradoTitulodeCarrousel4">
                    <h5>Tenis</h5>
                    <p>Deporte de raqueta practicado sobre una pista rectangular (compuesta por distintas superficies,
                        las cuales pueden ser cemento, tierra batida o hierba), delimitada por líneas y dividida por una
                        red.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="imagenes/carousel5.jpg" class="" alt="">
                <div class="carousel-caption d-none d-md-block opacity-2 cuadradoTitulodeCarrousel5">
                    <h5>Rugby</h5>
                    <p>Deporte de evasión y contacto en equipo nacido en Inglaterra. Fue en ese país donde tomó su
                        nombre a partir de las reglas del fútbol elaboradas en el colegio de la ciudad de Rugby (Rugby
                        School) en el siglo XIX.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="imagenes/carousel6.jpg" class="" alt="">
                <div class="carousel-caption d-none d-md-block opacity-2 cuadradoTitulodeCarrousel6">
                    <h5>Baloncesto</h5>
                    <p>Deporte de equipo, jugado entre dos conjuntos de cinco jugadores cada uno durante cuatro períodos
                        o cuartos de diez o doce minutos cada uno.</p>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div>
    <!-- </div> -->
    <!-- TERMINA EL CAROUSEL -->













    <!-- Footer -->
    <footer class="divFooter"><?php $Year = date("Y");
echo "<p>Copyright © ".$Year." Web Oier Vicente. Todos los derechos reservados."; ?>
        <div class="container">
            <div class="row">
                <p class="parrafoFooter">
                <div class="col-12 col-sm-6 col-md-4"><a class="terms footerA" href="" rel="nofollow">Política de
                        Privacidad y Aviso Legal</a></div>
                <div class="col-12 col-sm-6 col-md-2"><a class="terms footerA" href="" rel="nofollow">Términos de
                        Uso</a></div>
                <div class="col-12 col-sm-6 col-md-2"><a class="terms footerA" href="" rel="nofollow">Política de
                        Calidad</a></div>
                <div class="col-12 col-sm-6 col-md-2"><a class="terms footerA" href="" rel="nofollow">Sala de Prensa</a>
                </div>
                <div class="col-12 col-sm-6 col-md-2"><a class="terms footerA" href="" rel="nofollow">Contacto</a></div>
                </p>
            </div>
        </div>
    </footer>


    <!-- Scripts de jquery y bootstrap -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="js/scriptMenu.js"></script>
    <script type="text/javascript">
    $('.carousel').carousel({
        interval: 7000,
        pause: true,
        wrap: false
    });
    </script>
</body>

</html>