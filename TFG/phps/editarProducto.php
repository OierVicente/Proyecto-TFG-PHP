<?php
session_start();
include_once "./../phps/funciones.php";

if (isset($_SESSION["rolUsuario"]) && (!empty($_SESSION["rolUsuario"])) && $_SESSION["rolUsuario"] == 2) {
    if(isset($_POST["nombreProducto"]) && isset($_POST["descripcionProducto"]) && isset($_POST["precioProducto"]) && isset($_POST["idCategoriaSelect"])){
        if(isset($_GET['idProducto'])) {
            
        $idProducto = strip_tags(($_GET['idProducto']));

        $nombreProducto = strip_tags($_POST["nombreProducto"]);
        $descripcionProducto = strip_tags($_POST["descripcionProducto"]);
        $precioProducto = strip_tags($_POST["precioProducto"]);
        //$imagenProducto = $imagenProducto;
        $revisar = getimagesize($_FILES["image"]["tmp_name"]);

        $idCategoriaSelect = strip_tags($_POST["idCategoriaSelect"]);

        if($revisar !== false){
                if(!empty($nombreProducto) && !empty($descripcionProducto) && !empty($precioProducto)){

                    $imagen = $_FILES["image"]["tmp_name"];    
                    $imgContenido = addslashes(file_get_contents($imagen));
                    
                    $conn = ConexionBD();
                
                    if (! $conn) {
                        echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
                        exit();
                    }
                    $sql = "UPDATE productos SET nombreProducto = '".$nombreProducto."' , descripcionProducto = '".$descripcionProducto."' , precioProducto = ".$precioProducto.", imagenProducto = '".$imgContenido."', categoriaProducto = ".$idCategoriaSelect." WHERE idProducto=".$idProducto."";

                    if (mysqli_query($conn,$sql)) {

                        header("location: ./../paginas/productos.php");
                    }
                    else{
                        echo "Error al hacer la Update: ".mysqli_error($conn);
                    }

                    mysqli_close($conn);

                }else{
                    echo "Alguna de las variables es vacia";
                }
            }else{
                echo "La imagen introducida no es correcta";
            }
        }else{
            echo "El id del producto no esta definido";
        }
    }else{
        echo "Las variables no estan definidas";
    }


}else{
    echo "El usuario no esta registrado o no tiene rol de Administrador";
}
?>