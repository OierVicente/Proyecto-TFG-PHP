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
    <title>Login</title>
    <style>
    @import url('../css/login.css');
    </style>
</head>

<body>

    <!-- Login -->

    <!-- Modal HTML -->
    <div id="myModal" class="modal fade show" aria-modal="true" style="display: block;">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="avatar">
                        <img src="../imagenes/avatar.png" alt="Avatar">
                    </div>
                    <h4 class="modal-title">Iniciar Sesion</h4>
                </div>
                <div class="modal-body">
                    <form action="../phps/comprobarLogin.php" method="post">

                        <div class="form-group">
                            <input type="text" class="form-control" name="usuar" placeholder="Usuario"
                                required="required">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="contr" placeholder="Contraseña"
                                required="required">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn" name="btnLogearse">Login <i class="fas fa-sign-in-alt"></i></button>
                        </div>

                        <div class="form-group">
                            <a class="btn btn-primary btn-lg btn-block login-btn" href="./../paginas/registrarse.php">Crear Usuario <i class="fas fa-user-plus"></i></a>
                        </div>

                        <div class="form-group">
                            <a class="btn btn-primary btn-lg btn-block login-btn" href="./../index.php">Volver al home <i class="fas fa-home"></i></a>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" onclick="alert('Contacte con el administrador de la pagina para mas informacion.')">¿Has
                        olvidado tu contraseña?</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Scripts de jquery y bootstrap -->
    <script src="./../js/jquery-3.6.0.min.js"></script>
    <script src="./../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
</body>

</html>