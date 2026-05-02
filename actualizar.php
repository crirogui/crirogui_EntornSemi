<?php

include("biblioteca.php");
session_start();
$bd=conexionBD();

$id_login = $_SESSION["id"];

//compruebo si se ha hecho submit
if (isset($_POST["actualizar"])) {
    if(actualizarJuego($bd, $id_login, $_POST)){
        header("Location:actualizar.php?msg=actualizado");
        exit;
    }else{
        echo "Error al actualizar";
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
    <h1>Actualizar datos del juego</h1>
    <form action="actualizar.php" method="POST">
        <label for="id">Introduce el id del juego:</label>
        <input type="number" name="id" required>

        <h3>Datos a actualizar</h3>
        <label for="titulo">Título:</label>
        <input type="text" name="titulo">
        <label>Año:</label>
        <input type="number" name="año">
        <label>Consola:</label>
        <input type="text" name="consola">
        <label>Precio:</label>
        <input type="number" name="precio">
        <button type="submit" name="actualizar">Actualizar</button>
    </form>

    <button><a href="listado.php">Volver</a></button>

</body>

</html>