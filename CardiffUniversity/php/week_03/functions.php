<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo '<p>Functions!</p>';

function myname() {
    
    echo '<p>My name is Andrew</p>';
}

function mynameis($param) {
    
    echo "<p>My name is $param</p>";
}

myname();

mynameis('Chris');
mynameis('Steve');



function add($a, $b) {
    
    return ($a + $b);
}

$a = 10;
$b = 5;

echo "<p> $a plus $b equals " . add($a, $b) . '</p>';


