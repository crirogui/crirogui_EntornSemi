<?php
include("biblioteca.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: inicio.php");
    exit;
}
//Fem conexió i agafem el id logejat.
$bd = conexionBD();
$id_login = $_SESSION["id"];
$user = $_SESSION["username"];

//recojo parametros de post si agrega titulo
if (isset($_POST["enviar"])) {
    $titulo = $_POST["titulo"];
    $año = $_POST["año"];
    $consola = $_POST["consola"];
    $precio = $_POST["precio"];



    if (agregarTitulo($bd, $titulo, $año, $consola, $precio, $id_login)) {
        header("Location:listado.php");
        exit;
    } else {
        print "Error al añadir";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Agregar videojuego</h1>

    <form method="POST" action="agregar.php">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>
        <label for="año">Año:</label>
        <input type="number" name="año" required>
        <label>Consola:</label>
        <input type="text" name="consola" required>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" required>
        <button type="submit" name="enviar">Añadir</button>



    </form>
    <button><a href="listado.php">Volver</a></button>

</body>

</html>