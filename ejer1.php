<?php

$mes = 2;
$ano = 2025;
$nombre_mes;
$dias;

switch ($mes) {
    case 1:
        $nombre_mes = 'Enero';
        $dias = 31;
        break;
    case 2:
        $nombre_mes = 'Febrero';
        $dias = 28;
        break;
    case 3:
        $nombre_mes = 'Marzo';
        $dias = 31;
        break;
    case 4:
        $nombre_mes = 'Abril';
        $dias = 30;
        break;
    case 5:
        $nombre_mes = 'Mayo';
        $dias = 31;
        break;
    case 6:
        $nombre_mes = 'Junio';
        $dias = 30;
        break;
    case 7:
        $nombre_mes = 'Julio';
        $dias = 31;
        break;
    case 8:
        $nombre_mes = 'Agost';
        $dias = 31;
        break;
    case 9:
        $nombre_mes = 'Septiembre';
        $dias = 30;
        break;
    case 10:
        $nombre_mes = 'Octubre';
        $dias = 31;
        break;
    case 11:
        $nombre_mes = 'Noviembre';
        $dias = 30;
        break;
    case 12:
        $nombre_mes = 'Diciembre';
        $dias = 31;
        break;
}

echo "En el año $ano, el mes de $mes tiene $dias dias ";
