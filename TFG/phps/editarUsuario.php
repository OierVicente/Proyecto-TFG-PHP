<?php
session_start();
include_once "./../phps/funciones.php";

if (isset($_SESSION["rolUsuario"]) && (!empty($_SESSION["rolUsuario"])) && $_SESSION["rolUsuario"] == 2) {
    if(isset($_POST["nombreUsuario"]) && isset($_POST["contrasenaUsuario"]) && isset($_POST["emailUsuario"]) && isset($_POST["idRolSelect"])){
        if(isset($_GET['idUsuario'])) {
            
        $idUsuario = strip_tags(($_GET['idUsuario']));

        $nombreUsuario = strip_tags($_POST["nombreUsuario"]);
        $contrasenaUsuario = strip_tags($_POST["contrasenaUsuario"]);
        $emailUsuario = strip_tags($_POST["emailUsuario"]);
        

        $idRolSelect = strip_tags($_POST["idRolSelect"]);

            if(!empty($nombreUsuario) && !empty($contrasenaUsuario) && !empty($emailUsuario) && !empty($idRolSelect)){
                
                $conn = ConexionBD();
            
                if (! $conn) {
                    echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
                    exit();
                }
                $sql = "UPDATE usuarios SET nombreUsuario = '".$nombreUsuario."' , contrasenaUsuario = '".$contrasenaUsuario."' , emailUsuario = '".$emailUsuario."' , rolUsuario = ".$idRolSelect." WHERE idUsuario=".$idUsuario."";

                if (mysqli_query($conn,$sql)) {

                    header("location: ./../paginas/paginaAdminUsuarios.php");
                }
                else{
                    echo "Error al hacer la Update: ".mysqli_error($conn);
                }

                mysqli_close($conn);

            }else{
                echo "Alguna de las variables es vacia";
            }
        }else{
            echo "El id del usuario no esta definido";
        }
    }else{
        echo "Las variables no estan definidas";
    }


}else{
    echo "El usuario no esta registrado o no tiene rol de Administrador";
}
?>