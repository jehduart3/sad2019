<?php
$numero = 5; //Número para calcular o fatorial
$fatorial = 1;
while ($numero > 1){
    $fatorial *= $numero;
    $numero--;
}

echo $fatorial;