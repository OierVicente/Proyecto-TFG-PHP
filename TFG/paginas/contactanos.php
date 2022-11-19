<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="./../imagenes/icono.png" sizes="16x16">
    <link rel="stylesheet" href="../bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/contactanos.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Pagina Web Oier Vicente - Contactanos</title>
</head>

<body class="d-flex flex-column h-100">

    <!-- MENU -->

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
            <a class="p-2 text-white" href="../index.php"><i class="fas fa-home"></i></a>
            <?php
                if (isset($_SESSION["rolUsuario"]) && (!empty($_SESSION["rolUsuario"]))) {
                    if ($_SESSION["rolUsuario"] == 2) {
                        echo "<a class='p-2 text-white' href='paginaAdmin.php'><i class='fas fa-user-lock'></i> Pagina Administrador</a>";
                    }
                }              
            ?>
            <a class="p-2 text-white" href="productos.php">Productos</a>
            <a class="p-2 text-white" href="contactanos.php">Contactanos</a>
        </nav>
        <?php
            if (isset($_SESSION["idUsuario"]) && (!empty($_SESSION["idUsuario"]))){
                echo "<a class='btn btn-outline-primary' href='./../phps/cerrarsesion.php?cerrarSesion=si'>Cerrar Sesion</a>";
              }else if(!isset($_SESSION["idUsuario"])){
                  echo "<a class='btn btn-outline-primary' href='./../paginas/login.php'>Iniciar Sesion</a>";
              }
        ?>
    </div>


    <!-- FORMULARIO DE CONTACTANOS -->
    <div class="container-contact100">
        <div class="row">
            <div class="col-12 wrap-contact100">
                <form class="contact100-form validate-form">
                    <span class="contact100-form-title">
                        <h1 style="font-family: 'Roboto Condensed', sans-serif;"> Mandanos un tu duda</h1>
                    </span>

                    <div class="wrap-input100 validate-input"
                        data-validate="Por favor introduzca su nombre y apellidos">
                        <input class="input100" type="text" maxlength="100" name="name" placeholder="Nombre y apellidos"
                            required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input"
                        data-validate="Por favor introduzca su Email: ejemplo@correo.com">
                        <input class="input100" type="email" name="email" maxlength="100"
                            placeholder="Email ejemplo: ejemplo@correo.com" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input"
                        data-validate="Por favor introduzca su numero de telefono">
                        <input class="input100" type="tel" name="phone" maxlength="9" pattern="[0-9]{9}"
                            placeholder="Teléfono ejemplo: 634919191" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Por favor introduzca su mensaje">
                        <textarea class="input100" name="message" maxlength="1000" placeholder="Tu mensaje"
                            required></textarea>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-contact100-form-btn">
                        <button class="contact100-form-btn">
                            <span>
                                <i class="fas fa-paper-plane" aria-hidden="true"></i>
                                Enviar
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- GOOGLE MAPS -->

        <div class="row col-12">

            <div class="col-md-6 mb-4">

                <div class="card card-cascade narrower">

                    <div class="view view-cascade gradient-card-header blue-gradient">
                        <h5 class="mb-0 text-center contact100-form-title text-dark mt-4 titulosDeLosMapas">Visitanos en Barcelona......</h5>
                    </div>

                    <div class="card-body card-body-cascade text-center">

                        <div id="map-container-google-8" class="z-depth-1-half map-container-5" style="height: 300px">
                            <iframe src="https://maps.google.com/maps?q=Barcelona&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="card card-cascade narrower">

                    <div class="view view-cascade gradient-card-header peach-gradient">
                        <h5 class="mb-0 text-center contact100-form-title text-dark mt-4 titulosDeLosMapas">Y tambien en Madrid......</h5>
                    </div>

                    <div class="card-body card-body-cascade text-center">

                        <div id="map-container-google-9" class="z-depth-1-half map-container-5" style="height: 300px">
                            <iframe src="https://maps.google.com/maps?q=Madryt&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>


                    </div>

                </div>

            </div>


        </div>
        <br>
        <!--Buttons-->
        <div class="row text-center">
            <div class="col-md-4">
                <a class="btn-floating blue accent-1"><i class="fas fa-map-marker-alt"></i></a>
                <p>Barcelona, 08042</p>
                <p>Cataluña</p>
            </div>

            <div class="col-md-4">
                <a class="btn-floating blue accent-1"><i class="fas fa-phone"></i>
                <p>+ 944 123 123</p>
                <p>Lunes - Viernes, 8:00-22:00</p>
            </div>

            <div class="col-md-4">
                <a class="btn-floating blue accent-1"><i class="fas fa-map-marker-alt"></i></a>
                <p>Madrid, 28014</p>
                <p>Madrid</p>
            </div>
        </div>

    </div>
    <!--Grid row-->



    </div>
    <!-- FIN FORMULARIO DE CONTACTANOS -->




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
    <script src="./../js/jquery-3.6.0.min.js"></script>
    <script src="./../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script> -->
</body>

</html>