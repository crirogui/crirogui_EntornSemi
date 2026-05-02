<?php
session_start();
include("biblioteca.php");


$bd = conexionBD();
$user = $_POST["user"];
$pass = $_POST["pass"];

if (isset($_POST["access"])) {


    $id = validarLogin($bd, $user, $pass);

    if ($id) {
        $_SESSION["username"] = $user;
        $_SESSION["id"] = $id;
        header("Location: listado.php");
        exit;
    } else {
        header("Location: inicio.php");
        exit;
    }
}

if (isset($_POST["registre"])) {
    $creat = registerUser($bd, $user, $pass);

    if ($creat) {
        // Si s'ha creat bé, el fiquem dins directament:
        $_SESSION['username'] = $user;

        // L'enviem a la pàgina de benvinguda
        header("Location: listado.php");
        exit;
    } else {
        // Si hi ha error (nom duplicat, etc.), el tornem a l'inici

        header("Location: inicio.php?error=exit");
        exit;
    }
}
