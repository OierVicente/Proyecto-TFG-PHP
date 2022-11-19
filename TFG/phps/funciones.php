<?php

function ConexionBD()
  {
    $conn = new mysqli("localhost", "id16881704_oieruserbd", "]n~VDSZ7v=}x/3y>", "id16881704_tiendabd");
    if (!$conn) {
      echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
      exit();
  }

    return $conn;
  }

  function sacarNombreRolporId($idRol)
  {
    $nombreRol = "nombre rol nulo";
    $conn = ConexionBD();
    if (!$conn) {
      echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
      exit();
  }

  $sql = "SELECT nombreRol FROM roles WHERE idRol=".$idRol;

        if ($result = mysqli_query($conn, $sql)) {

            if (mysqli_num_rows($result) > 0) {

                while ($fila = mysqli_fetch_assoc($result)) {
                    
                        
                    $nombreRol = $fila["nombreRol"];
                    
                    $consultaCorrecta = true;

                  }
                } 
                if($consultaCorrecta == false) {
                    header("HTTP/1.0 500 Internal Server Error");
                }
            }
            mysqli_close($conn);

    return $nombreRol;
  }

  function sacarNombreCategoriaporId($idCategoria)
  {
    $nombreCategoria = "nombre categoria nulo";
    $conn = ConexionBD();
    if (!$conn) {
      echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
      exit();
  }

  $sql = "SELECT nombreCategoria FROM categoria WHERE idCategoria=".$idCategoria;

        if ($result = mysqli_query($conn, $sql)) {

            if (mysqli_num_rows($result) > 0) {

                while ($fila = mysqli_fetch_assoc($result)) {
                    
                        
                    $nombreCategoria = $fila["nombreCategoria"];
                    
                    $consultaCorrecta = true;

                  }
                } 
                if($consultaCorrecta == false) {
                    header("HTTP/1.0 500 Internal Server Error");
                }
            }
            mysqli_close($conn);

    return $nombreCategoria;
  }

  function sacariDCategoriaporIdProducto($idProducto)
  {
    $idCategoria = "id categoria nulo";
    $conn = ConexionBD();
    if (!$conn) {
      echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
      exit();
  }

  $sql = "SELECT categoriaProducto FROM productos WHERE idProducto=".$idProducto;

        if ($result = mysqli_query($conn, $sql)) {

            if (mysqli_num_rows($result) > 0) {

                while ($fila = mysqli_fetch_assoc($result)) {
                    
                    // EN LA BD EL ID EN PRODUCTOS SE LLAMA ASI (categoriaProducto)    
                    $categoriaProducto = $fila["categoriaProducto"];
                    $idCategoria = $categoriaProducto;
                    $consultaCorrecta = true;

                  }
                } 
                if($consultaCorrecta == false) {
                    header("HTTP/1.0 500 Internal Server Error");
                }
            }
            mysqli_close($conn);

    return $idCategoria;
  }

  // FUNCIONES DE USUARIOS


  function sacarNombreRolporIdUsuario($idRol)
  {
    $nombreRol = "nombre Rol nulo";
    $conn = ConexionBD();
    if (!$conn) {
      echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
      exit();
  }

  $sql = "SELECT nombreRol FROM roles WHERE idRol=".$idRol;

        if ($result = mysqli_query($conn, $sql)) {

            if (mysqli_num_rows($result) > 0) {

                while ($fila = mysqli_fetch_assoc($result)) {
                    
                        
                    $nombreRol = $fila["nombreRol"];
                    
                    $consultaCorrecta = true;

                  }
                } 
                if($consultaCorrecta == false) {
                    header("HTTP/1.0 500 Internal Server Error");
                }
            }
            mysqli_close($conn);

    return $nombreRol;
  }

  function sacariDRolporIdUsuario($idUsuario)
  {
    $idRol = "id rol nulo";
    $conn = ConexionBD();
    if (!$conn) {
      echo("<br>Imposible conectar con la base de datos".mysqli_connect_error ());
      exit();
  }

  $sql = "SELECT rolUsuario FROM usuarios WHERE idUsuario=".$idUsuario;

        if ($result = mysqli_query($conn, $sql)) {

            if (mysqli_num_rows($result) > 0) {

                while ($fila = mysqli_fetch_assoc($result)) {
                    
                    // EN LA BD EL ID EN PRODUCTOS SE LLAMA ASI (rolUsuario)    
                    $rolUsuario = $fila["rolUsuario"];
                    $idRol = $rolUsuario;
                    $consultaCorrecta = true;

                  }
                } 
                if($consultaCorrecta == false) {
                    header("HTTP/1.0 500 Internal Server Error");
                }
            }
            mysqli_close($conn);

    return $idRol;
  }


?>