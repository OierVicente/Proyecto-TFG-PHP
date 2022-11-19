<?php
session_start();
include_once "./../phps/funciones.php";
if (isset($_SESSION["rolUsuario"]) && (!empty($_SESSION["rolUsuario"])) && $_SESSION["rolUsuario"] == 2) {
    if(isset($_GET['idUsuario'])) {

        $idUsuario = strip_tags(($_GET['idUsuario']));

        if (!empty($idUsuario)) {
            $conn = ConexionBD();
            //$bd = mysqli_connect("localhost", "root", "", "pruebasphp");


                if (! $conn) {
                    echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
                    exit();
                }

                $sql = "DELETE FROM usuarios WHERE idUsuario = ".$idUsuario;

                if (mysqli_query($conn,$sql)) {
                }
                else{
                    echo "La consulta ha fallado: ".mysqli_error($conn);
                }


                // mysqli_free_result ($result);
                mysqli_close($conn);


        }else{
            echo "Las variables estan vacias";
        }

        header("Location: ./../paginas/paginaAdminUsuarios.php");

    }else{
        echo "El id del usuario no esta definido";
    }
}else{
    echo "El usuario no esta registrado o no tiene rol de Administrador";
}

?>