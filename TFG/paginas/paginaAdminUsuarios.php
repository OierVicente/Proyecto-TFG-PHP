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
    <link rel="stylesheet" href="../css/paginaAdminUsuarios.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Pagina Web Oier Vicente - Pagina Admin Usuarios</title>
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

    <!-- TABLA CON TODOS LOS CAMBIOS -->

    <!-- INFORMACION DE LOS USUARIOS -->
    <div class="container body-content py-4 contenedorMinimoAltura" id="filtroBuscador">
            <div class="row align-items-center justify-content-center my-4">
                <input class="form-control" id="filtro" type="text" placeholder="Buscador de usuarios..." size="100">
            </div>
        <h2 class="display-2 text-center">Usuarios</h2>

        <p>
            <!-- <a class="btn btn-success botonCrear" href="./../paginas/crearProducto.php"><i class="fas fa-plus-circle"></i> Crear un nuevo producto</a> -->
            <a class="btn btn-success mr-4" href="./../paginas/crearUsuario.php"><i class="fas fa-plus-circle"></i> Crear un nuevo usuario</a>
            <a class="btn btn-info ml-4" href="./../paginas/paginaAdmin.php"><i class="fas fa-users"></i> Administrar Productos</a>
        </p>
        <table class="table table-bordered table-striped">
            <tbody>
                <tr class="bg-info text-white text-center">
                    <th>
                        Id del usuario
                    </th>
                    <th>
                        Nombre del usuario
                    </th>
                    <th>
                        Contraseña del usuario
                    </th>
                    <th>
                        Email del usuario
                    </th>
                    <th>
                        Rol del usuario
                    </th>
                    <th>
                        Configuraciones del usuario
                    </th>
                </tr>

                <?php
                    include_once "./../phps/funciones.php";

                    // Conectamos con la base de datos
                    $consultaCorrecta = false;
                    $conn = ConexionBD();
                    //$conn = mysqli_connect ("localhost", "id16881704_oieruserbd", "]n~VDSZ7v=}x/3y>", "id16881704_tiendabd");
                        
                    if (! $conn) {
                        echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
                        exit();
                    }

                    $sql = "SELECT * FROM usuarios ";

                    if ($result = mysqli_query($conn, $sql)) {

                        if (mysqli_num_rows($result) > 0) {

                            while ($fila = mysqli_fetch_assoc($result)) {
                                
                                    
                                $idUsuario = $fila["idUsuario"];
                                $nombreUsuario = $fila["nombreUsuario"];
                                $contrasenaUsuario = $fila["contrasenaUsuario"];
                                $emailUsuario = $fila["emailUsuario"];
                                $iDrolUsuario = $fila["rolUsuario"];

                                $nombreRol = sacarNombreRolporIdUsuario($iDrolUsuario);
                                
                                $consultaCorrecta = true;

                                echo 
                                "<tr id='ocultar'>
                                    <td>".$idUsuario."</td>
                                    <td>".$nombreUsuario."</td>
                                    <td>".$contrasenaUsuario."</td>
                                    <td>".$emailUsuario."</td>
                                    <td>".$nombreRol."</td>
                                    <td class='text-center'>
                                        <a class='btn btn-outline-info p-2' href='./../paginas/editarUsuario.php?idUsuario=".$idUsuario."'><i class='fas fa-edit'></i> Editar</a>
                                        <a class='btn btn-outline-danger p-2' href='./../phps/borrarUsuario.php?idUsuario=".$idUsuario."'><i class='fas fa-trash-alt'></i> Borrar</a>
                                    </td>
                                </tr>";


                            }
                        } 
                        if($consultaCorrecta == false) {
                            header("HTTP/1.0 500 Internal Server Error");
                        }
                    }
                    mysqli_close($conn);

                ?>
                
            </tbody>
        </table>
        <hr>

    </div>


    <!-- FIN DE LA INFORMACION DE LOS USUARIOS -->
    
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
    <script>
        $(document).ready(function() {
            $("#filtro").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#filtroBuscador #ocultar").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script src="./../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
</body>

</html>