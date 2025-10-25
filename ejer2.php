<?php

$mes = 2;
$ano = 2025;
$estacion;


switch ($mes) {
    case 12:
    case 1:
    case 2:
    case 3:
        $estacion = 'hivern.';
        break;
    case 4:
    case 5:
    case 6:
        $estacion = 'primavera.';

        break;
    case 7:
    case 8:
    case 9:
        $estacion = 'estiu.';
        break;
    case 10:
    case 11:
        $estacion = 'la tardor.';
        break;
}

echo "Estem en $estacion";
