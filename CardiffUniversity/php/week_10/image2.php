<?php

session_start();

$string = $_GET['string'];

// Create an empty imahe (200px x 200px)
$img = imagecreate(200, 100);

//  Allocate some colourts for use
$red = imagecolorallocate($img, 255, 0, 0);
$black = imagecolorallocate($img, 0, 0, 0);
$white = imagecolorallocate($img, 255, 255, 255);

//  Flood-fill background colour
imagefill($img,0,0,$red);

// borders
imagerectangle($img, 3, 3, 194, 94, $black);
imagerectangle($img, 6, 6, 188, 88, $black);


$font = '../fonts/arial.ttf';

imagettftext($img, 50, 0, 30, 70, $white, $font, $string);

// Write a string to the image
//imagestring($img,5,6,8,$string,$textcolour);

//  Option 1 - display image
header("Content-type: image/jpeg");
imagejpeg($img);

//  Option 2 - save image
//imagejpeg($img,'../uploads/chris.jpg',100);

//  Release memory allocation
imagedestroy($img);


