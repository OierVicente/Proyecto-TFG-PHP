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
    <link rel="icon" type="image/png" href="./../imagenes/icono.png" sizes="16x16">
    <link rel="stylesheet" href="../bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/finalizarCompra.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Pagina Web Oier Vicente - Finalizar Compra</title>
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
    <!-- FIN DEL MENU -->

    <!-- DATOS DE PAGO -->
    <div class="container mt-4 mb-4 p-4">
        <form action="./../phps/finalizarCompra.php" method="post">

            <div class="form-group">
                <label for="full_name_id" class="control-label">Nombre completo</label>
                <input type="text" class="form-control" placeholder="Oier Vicente">
            </div>

            <div class="form-group">
                <label for="street1_id" class="control-label">Calle y numero de casa</label>
                <input type="text" class="form-control" placeholder="Venancio Etxebarria Kalea, 18">
            </div>

            <div class="form-group">
                <label for="city_id" class="control-label">Ciudad</label>
                <input type="text" class="form-control" placeholder="Getxo">
            </div>

            <div class="form-group">
                <label for="state_id" class="control-label">Provincia</label>
                <select name="provincia" class="form-control" >
                    <option value="">Elige Provincia</option>
                    <option value="Álava/Araba">Álava/Araba</option>
                    <option value="Albacete">Albacete</option>
                    <option value="Alicante">Alicante</option>
                    <option value="Almería">Almería</option>
                    <option value="Asturias">Asturias</option>
                    <option value="Ávila">Ávila</option>
                    <option value="Badajoz">Badajoz</option>
                    <option value="Baleares">Baleares</option>
                    <option value="Barcelona">Barcelona</option>
                    <option value="Burgos">Burgos</option>
                    <option value="Cáceres">Cáceres</option>
                    <option value="Cádiz">Cádiz</option>
                    <option value="Cantabria">Cantabria</option>
                    <option value="Castellón">Castellón</option>
                    <option value="Ceuta">Ceuta</option>
                    <option value="Ciudad Real">Ciudad Real</option>
                    <option value="Córdoba">Córdoba</option>
                    <option value="Cuenca">Cuenca</option>
                    <option value="Gerona/Girona">Gerona/Girona</option>
                    <option value="Granada">Granada</option>
                    <option value="Guadalajara">Guadalajara</option>
                    <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                    <option value="Huelva">Huelva</option>
                    <option value="Huesca">Huesca</option>
                    <option value="Jaén">Jaén</option>
                    <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                    <option value="La Rioja">La Rioja</option>
                    <option value="Las Palmas">Las Palmas</option>
                    <option value="León">León</option>
                    <option value="Lérida/Lleida">Lérida/Lleida</option>
                    <option value="Lugo">Lugo</option>
                    <option value="Madrid">Madrid</option>
                    <option value="Málaga">Málaga</option>
                    <option value="Melilla">Melilla</option>
                    <option value="Murcia">Murcia</option>
                    <option value="Navarra">Navarra</option>
                    <option value="Orense/Ourense">Orense/Ourense</option>
                    <option value="Palencia">Palencia</option>
                    <option value="Pontevedra">Pontevedra</option>
                    <option value="Salamanca">Salamanca</option>
                    <option value="Segovia">Segovia</option>
                    <option value="Sevilla">Sevilla</option>
                    <option value="Soria">Soria</option>
                    <option value="Tarragona">Tarragona</option>
                    <option value="Tenerife">Tenerife</option>
                    <option value="Teruel">Teruel</option>
                    <option value="Toledo">Toledo</option>
                    <option value="Valencia">Valencia</option>
                    <option value="Valladolid">Valladolid</option>
                    <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                    <option value="Zamora">Zamora</option>
                    <option value="Zaragoza">Zaragoza</option>
                </select>
            </div>

            <div class="form-group">
                <!-- Codigo Postal-->
                <label class="control-label">Codigo Postal</label>
                <input type="text" class="form-control" maxlength="5" placeholder="#####">
            </div>

            <div class="credit-card-div my-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row my-4">
                            <div class="col-md-12 pad-adjust">
                                <input type="text" class="form-control" maxlength="100"
                                    placeholder="Titular de la Tarjeta" />
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-md-12">
                                <input type="text" class="form-control" maxlength="16"
                                    placeholder="Numero de la Tarjeta" />
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font"> Mes de Caducidad</span>
                                <input type="number" class="form-control" maxlength="2" min="1" max="12"
                                    placeholder="MM" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font"> Año de Caducidad</span>
                                <?php $Year2Digitos = date("y");echo "<input type='number' class='form-control' maxlength='2' min=".$Year2Digitos. " placeholder='YY'/>"; ?>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font"> CCV</span>
                                <input type="number" class="form-control" maxlength="3" placeholder="CCV" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <img href="./../imagenes/credit.png" class="img-rounded" />
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12 pad-adjust">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked class="text-muted"> Quieres guardar los datos de
                                        pago
                                        ?</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                <input type="submit" name="cancelar" class="btn btn-danger" value="CANCELAR" />
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                <input type="submit" name="comprar" class="btn btn-warning btn-block" value="COMPRAR AHORA" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </form>
    </div>

    <!-- FIN DATOS DE PAGO -->

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
                <div class="col-12 col-sm-6 col-md-2"><a class="terms footerA" href="" rel="nofollow">Sala de
                        Prensa</a>
                </div>
                <div class="col-12 col-sm-6 col-md-2"><a class="terms footerA" href="" rel="nofollow">Contacto</a>
                </div>
                </p>
            </div>
        </div>
    </footer>


    <!-- Scripts de jquery y bootstrap -->
    <script src="./../js/jquery-3.6.0.min.js"></script>
    <script src="./../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
</body>

</html>