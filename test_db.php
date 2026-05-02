<?php
include_once("biblioteca.php");

$db = conexionBD();

echo "\nLa variable \$db ara conté la connexió a: " . mysqli_get_server_info($db);

?>