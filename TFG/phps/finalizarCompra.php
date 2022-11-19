<?php
session_start();

if (isset($_POST["cancelar"])) {
    header("location: ./../paginas/productos.php");
}else if (isset($_POST["comprar"])){
    header("location: ./../index.php");
}else{
    echo "<h1>Se ha producido un error</h1>";
}

?>