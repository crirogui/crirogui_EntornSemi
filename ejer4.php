<?php

$num1 = 7;
$num2 = 33;
$num3 = 33;
$max_num;

if ($num1 >= $num2 && $num1 >= $num3) {
    $max_num = $num1;
} else if ($num2 >= $num1 && $num2 >= $num3) {
    $max_num = $num2;
} else {
    $max_num = $num3;
}

echo 'El mayor número escrito de los tres es el: ' . $max_num;
