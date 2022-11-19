<?php
session_start();
include_once "./../phps/funciones.php";

if (isset($_SESSION["rolUsuario"]) && (!empty($_SESSION["rolUsuario"])) && $_SESSION["rolUsuario"] == 2) {
    if(isset($_POST["nombreUsuario"]) && isset($_POST["contrasenaUsuario"]) && isset($_POST["emailUsuario"]) && isset($_POST["idRolSelect"])){
        $nombreUsuario = strip_tags($_POST["nombreUsuario"]);
        $contrasenaUsuario = strip_tags($_POST["contrasenaUsuario"]);
        $emailUsuario = strip_tags($_POST["emailUsuario"]);

        $idRolSelect = $_POST["idRolSelect"];

            if(!empty($nombreUsuario) && !empty($contrasenaUsuario) && !empty($emailUsuario) && !empty($idRolSelect)){
                
                $conn = ConexionBD();
            
                if (! $conn) {
                    echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
                    exit();
                }

                $sql = "INSERT INTO usuarios(idUsuario, nombreUsuario, contrasenaUsuario, emailUsuario, rolUsuario) VALUES ( NULL ,'" . $nombreUsuario . "','" . $contrasenaUsuario . "','" . $emailUsuario . "',".$idRolSelect.")";

                if (mysqli_query($conn,$sql)) {

                    header("location: ./../paginas/paginaAdminUsuarios.php");
                }
                else{
                    echo "Error al hacer la Insert: ".mysqli_error($conn);
                }

                mysqli_close($conn);

            }else{
                echo "Alguna de las variables es vacia";
            }
            
    }else{
        echo "Las variables no estan definidas";
    }
}else{
    echo "El usuario no esta registrado o no tiene rol de Administrador";
}

?>