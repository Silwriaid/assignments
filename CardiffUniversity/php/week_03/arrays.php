<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$dogs = array('Border Collie', 'German Shepherd', 'Sausage');

echo "My dog is a ". $dogs[2];

echo '<hr>';

$colours = array('Red','Green', 'Blue', 'Yellow');

echo '<ul>';

if (count($colours)) {
    foreach ($colours as $colour) {

        //echo "<li>" . $colour . "</li>";
        echo "<li>$colour</li>";
    }
}

echo '</ul>';

echo '<hr>';

echo '<ul>';

sort($colours);

if (count($colours)) {
    foreach ($colours as $colour) {

        //echo "<li>" . $colour . "</li>";
        echo "<li>$colour</li>";
    }
}

echo '</ul>';

echo '<hr>';

$ages = array ();
$ages['Chris'] = 30;
$ages['Clare'] = 45;
$ages['Colin'] = 26;
$ages['Craig'] = 32;

echo '<ul>';

if (count($ages)) {
    foreach($ages as $key => $value) {

        echo "<li>$key is $value years old</li>";
    }
}

echo '</ul>';

echo '<hr>';

echo '<ul>';

asort($ages);

if (count($ages)) {
    foreach($ages as $key => $value) {

        echo "<li>$key is $value years old</li>";
    }
}

echo '</ul>';

echo '<hr>';

echo '<ul>';

sort($ages);

if (count($ages)) {
    foreach($ages as $key => $value) {

        echo "<li>$key is $value years old</li>";
    }
}

echo '</ul>';

echo '<hr>';
