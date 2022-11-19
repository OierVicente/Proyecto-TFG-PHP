<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="icon" type="image/png" href="../imagenes/icono.png" sizes="16x16">
    <link rel="stylesheet" href="../bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <title>Registrarse</title>
    <style>
    @import url('../css/registrarse.css');
    </style>
</head>

<body>

    <div id="myModal" class="">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="avatar">
                        <img src="../imagenes/avatar.png" alt="Avatar">
                    </div>
                    <h4 class="modal-title">Registro</h4>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                </div>
                <!-- Nombre Usuario, Contraseña Usuario, rolUsuario -->
                <div class="modal-body">
                    <form action="../phps/comprobarRegistro.php" method="post">

                        <div class="form-group">
                            <input type="text" class="form-control" name="usuar" placeholder="Nombre del Usuario"
                                required="required">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="contr" placeholder="Contraseña del Usuario" required="required">
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email del Usuario" required="required">
                        </div>

                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-primary btn-lg btn-block login-btn" name="btnRegistrarse">Registrarse <i class="fas fa-sign-in-alt"></i></button>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary btn-lg btn-block login-btn" href="./../paginas/login.php">
                                Volver <i class="fas fa-undo"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de jquery y bootstrap -->
    <script src="./../js/jquery-3.6.0.min.js"></script>
    <script src="./../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
</body>

</html>