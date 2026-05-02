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



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
    $lista = generarLista($bd, $id_login);
    print($lista);
?>

<button><a href="agregar.php">Agregar</a></button>
<button><a href="actualizar.php">Actualizar</a></button>
<button><a href="logout.php">Cerrar sesión</a></button>
</body>

</html>