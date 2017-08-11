<?php

session_start();

$string = $_SESSION['string'] = rand(1000,9999);

// Create an empty imahe (200px x 200px)
$img = imagecreate(48, 30);

//  Allocate some colourts for use
$backcolour = imagecolorallocate($img, 220, 220, 220);
$textcolour = imagecolorallocate($img, 50, 50, 50);

//  Flood-fill background colour
imagefill($img,0,0,$backcolour);

// Write a string to the image
imagestring($img,5,6,8,$string,$textcolour);

//  Option 1 - display image
header("Content-type: image/jpeg");
imagejpeg($img);

//  Option 2 - save image
//imagejpeg($img,'../uploads/chris.jpg',100);

//  Release memory allocation
imagedestroy($img);


