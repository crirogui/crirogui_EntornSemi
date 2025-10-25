<?php

$num = 19;

if($num%3 ==0 && $num%5 ==0){
    echo 'El número es múltiple de 3 y 5';
}else if($num%3 ==0){
    echo 'El número es múltiple de 3';

}else if($num%5 ==0){
    echo 'El número es múltiple de 5';

}else{
    echo 'El número no es múltiple ni de 3 ni de 5';
}

?>