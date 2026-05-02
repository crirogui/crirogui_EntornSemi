<?php

//funcion conexio serverBD
function conexionBD()
{
    $server = "localhost";
    $usuario = "root";
    $password = "";
    $bd_nom = "videojuegos";

    $conexion = mysqli_connect($server, $usuario, $password, $bd_nom, 3306);

    mysqli_report(MYSQLI_REPORT_OFF);

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    mysqli_set_charset($conexion, "utf8");

    return $conexion;
}

function validarLogin($bd, $user, $password)
{
    $sql = "SELECT * FROM usuarios WHERE username = '$user' AND password='$password'";



    #faig consulta SQL amb les dades del formulari.
    $result = mysqli_query($bd, $sql);

    #busque si el resultat te alguna fila, ha de ser 1 ja que username és unic.
    if (mysqli_num_rows($result) == 1) {
        $fila = mysqli_fetch_assoc($result);
        return $fila["id"];
    }
    return false;
}

function registerUser($bd, $user, $password)
{
    $sql = "INSERT INTO usuarios (username, password) VALUES ('$user', '$password')";

    $result = mysqli_query($bd, $sql);

    // Executem la consulta
    if ($result) {
        return true; // S'ha guardat correctament
    } else {
        return false; // Error (per exemple, si el nom d'usuari ja existeix)
    }
}

function generarLista($bd, $id_login)
{

    //consultem amb el login de l'usuari.
    $sql = "SELECT id, titulo, año, consola, precio 
        FROM jocs 
        WHERE id_usuario = $id_login";

    $datos = mysqli_query($bd, $sql);


    $codigo = "<center>";
    $codigo .= "<table border='1'>";
    $codigo .= "<tr>";
    $codigo .= "<th> ID </th>";
    $codigo .= "<th> Título </th>";
    $codigo .= "<th> Año </th>";
    $codigo .= "<th> Consola </th>";
    $codigo .= "<th> Precio </th>";
    $codigo .= "<th> Borrar </th>";
    $codigo .= "</tr>";

    if ($datos) {
        while ($fila = mysqli_fetch_assoc($datos)) {
            $id = $fila["id"];
            $titulo = $fila["titulo"];
            $año = $fila["año"];
            $consola = $fila["consola"];
            $precio = $fila["precio"];

            $codigo .= "<tr>";
            $codigo .= "<td>$id</td>";
            $codigo .= "<td>$titulo</td>";
            $codigo .= "<td>$año</td>";
            $codigo .= "<td>$consola</td>";
            $codigo .= "<td>$precio</td>";
            $codigo .= "<td>" . "<a href='borrar.php?id=$id'>" . "Eliminar" . "</a>" . "</td>";
            $codigo .= "</tr>";
        }
    }
    return $codigo;
}

function agregarTitulo($bd, $titulo, $año, $consola, $precio, $id_login)
{

    //creo query y llamo funcion para incluir juego
    $sql = "INSERT INTO jocs(titulo, año, consola, precio, id_usuario) 
            VALUES ('$titulo', $año, '$consola', $precio, $id_login)";

    return mysqli_query($bd, $sql);
}

function borrarTitulo($bd, $id)
{
    $sql = "DELETE FROM jocs WHERE id=$id";
    return mysqli_query($bd, $sql);
}

function actualizarJuego($bd, $id_login, $datos_post)
{
   
    $campos_sql="";
    $id_joc = $datos_post["id"];

    if (!empty($datos_post["titulo"])) {
        $titulo = $datos_post["titulo"];
        $campos_sql.="titulo='$titulo', ";
    }
    if (!empty($datos_post["año"])) {
        $año = $datos_post["año"];
        $campos_sql.="año='$año', ";
    }
    if (!empty($datos_post["consola"])) {
        $consola = $datos_post["consola"];
        $campos_sql.="consola='$consola', ";
    }
    if (!empty($datos_post["precio"])) {
        $precio = $datos_post["precio"];
        $campos_sql.="precio='$precio', ";
    }
    $campos_sql= substr($campos_sql, 0, -2);

    $sql = "UPDATE  jocs SET $campos_sql
            WHERE id=$id_joc AND id_usuario=$id_login";
            
    return mysqli_query($bd, $sql);
}
