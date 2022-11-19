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
    <link rel="stylesheet" href="../css/verDetalleProducto.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Pagina Web Oier Vicente - Ver Detalle Producto</title>
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
    <main role="main" class="container my-4 contenedorMinimoAltura">
        <div class="jumbotron my-4">

            <div class="row p-4">
                <div class="col-md-6">
                    <div class="card-block">

    <!-- CONSULTA PARA EL PRODUCTO -->
    <?php
        include_once "./../phps/funciones.php";

        if(isset($_GET['idProducto'])) {
            if (!empty($_GET['idProducto'])) {
                $idProducto = $_GET['idProducto'];
                // Conectamos con la base de datos
                    $consultaCorrecta = false;
                    $conn = ConexionBD();
                    //$conn = mysqli_connect ("localhost", "id16881704_oieruserbd", "]n~VDSZ7v=}x/3y>", "id16881704_tiendabd");
                                
                            if (! $conn) {
                                echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
                                exit();
                            }

                            $sql = "SELECT * FROM productos WHERE idProducto=".$idProducto."";

                            if ($result = mysqli_query($conn, $sql)) {

                                if (mysqli_num_rows($result) > 0) {

                                    while ($fila = mysqli_fetch_assoc($result)) {

                                        $idProducto = $fila["idProducto"];
                                        $nombreProducto = $fila["nombreProducto"];
                                        $descripcionProducto = $fila["descripcionProducto"];
                                        $precioProducto = $fila["precioProducto"];
                                        $imagenProducto = $fila["imagenProducto"];
                                        $categoriaProducto = $fila["categoriaProducto"];
                                        echo "<h2 class='card-title'>".$nombreProducto."</h2>";
                                        //echo "<p class='card-text'> Categoria del Producto:".$categoriaProducto."</p>";
                                        echo "<p class='card-text'>".$descripcionProducto."</p>";
                                        echo "<h3 class='card-text'>".$precioProducto." €</h3>";

                                        echo "<div>";
                                        echo "<div class='row'>";
                                        echo "<div class='col-12 d-flex justify-content-start'>";
                                        echo "<a class='btn btn-primary mt-4' href='finalizarCompra.php?idProducto=".$idProducto."' ><i class='fas fa-shopping-cart'></i> Comprar Producto</a>";
                                        echo "</div>";

                                        if (isset($_SESSION["rolUsuario"]) && (!empty($_SESSION["rolUsuario"]))) {
                                           if ($_SESSION["rolUsuario"] == 2) {
                                                echo "<div class='col-12 d-flex justify-content-start'>";
                                                echo "<a class='btn btn-info ml-4 mt-4' href='./../paginas/editarProducto.php?idProducto=".$idProducto."'><i class='fas fa-edit'></i> Editar Producto</a>";
                                                echo "</div>";
                                                echo "<div class='col-12 d-flex justify-content-start'>";
                                                echo "<a class='btn btn-danger ml-4 my-4' href='./../phps/borrarProducto.php?idProducto=".$idProducto."'><i class='fas fa-trash-alt'></i> Borrar Producto</a>";
                                                echo "</div>";
                                           }
                                        }
                                        echo "</div>";

                                        echo "</div>";

                                        echo "</div>";
                                        echo "</div>";
                                        echo "<div class='col-md-6'>";
                                        echo '<div class="card-img-bottom">';
                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($imagenProducto).'" class="card-img-bottom ml-4" alt="" style="width: 70%;" />';
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";

                                        $consultaCorrecta = true;
                                    }
                                } 
                                if($consultaCorrecta == false) {
                                    header("HTTP/1.0 500 Internal Server Error");
                                }
                            }
                            mysqli_close($conn);
                
            }
        }


    ?>



    
                        <!-- <h2 class="card-title"></h2>
                        <p class="card-text"> Categoria del Producto: </p>
                        <p class="card-text"></p>
                        <p class="card-text"></p>
                        <a class="btn btn-primary" href="./../index.php"  onclick="alert(' Su compra ha sido realizada con exito')">Comprar Producto</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-img-bottom" src="data:image/jpeg;base64,' '">
                    </div>
                </div> -->
            </div>



        </div>
    </main>




    <!-- Footer -->
    <footer class="divFooter"><?php $Year = date("Y");
echo "<p>Copyright © ".$Year." Web Oier Vicente. Todos los derechos reservados."; ?>
        <div class="container">
            <div class="row">
                <p class="parrafoFooter">
                    <div class="col-12 col-sm-6 col-md-4"><a class="terms footerA" href="" rel="nofollow">Política de Privacidad y Aviso Legal</a></div>
                    <div class="col-12 col-sm-6 col-md-2"><a class="terms footerA" href="" rel="nofollow">Términos de Uso</a></div>
                    <div class="col-12 col-sm-6 col-md-2"><a class="terms footerA" href="" rel="nofollow">Política de Calidad</a></div>
                    <div class="col-12 col-sm-6 col-md-2"><a class="terms footerA" href="" rel="nofollow">Sala de Prensa</a></div>
                    <div class="col-12 col-sm-6 col-md-2"><a class="terms footerA" href="" rel="nofollow">Contacto</a></div>
                </p>
            </div>
        </div>
    </footer>


    <!-- Scripts de jquery y bootstrap -->
    <script src="./../js/jquery-3.6.0.min.js"></script>
    <script src="./../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
</body>

</html>