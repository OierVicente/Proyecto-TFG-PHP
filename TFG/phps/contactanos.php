<?php 
session_start();

if (isset($_POST["enviar"])) {
    header("location: ./../index.php");
}else{
    echo "<h1>Se ha producido un error</h1>";
}

?>