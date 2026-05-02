<?php
include("biblioteca.php");
session_start();
$bd = conexionBD();
$id_login = $_SESSION["id"];


if(isset($_GET["id"])){
    $id_joc = $_GET["id"];
    if(borrarTitulo($bd, $id_joc)){
        header("Location:listado.php");
        exit;
    }

}

?>