<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$theHour = date('H');

echo $theHour;

if ($theHour < 12) {
    
    echo "Good morning";
}

if ($theHour > 12 && $theHour < 20) {
    
    echo "Good afternoon";
}

if ($theHour > 20) {
    
    echo "Goodnight";
}

echo '<hr>';

$rand = rand(0, 100);
var_dump($rand);

echo '<hr>';

if ( $rand < 50) {
    
    echo "Number $rand is less than 50";
}
else {
    
    echo "Number $rand is greater than 50";
}

echo '<hr>';

$n1 = rand(0, 10);
$n2 = rand(0, 10);

if ($n1 < $n2) {
    
    echo "$n1 is less than $n2";
}
elseif ($n1 > $n2) {
    
    echo "$n1 is greater than $n2";
}
else {
    echo "$n1 is equal to $n2";
    
}
