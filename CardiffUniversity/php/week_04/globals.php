<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$_SERVER;

//var_dump($_SERVER);

//echo '<pre>';
//echo print_r($_SERVER);
//echo '<pre>';

//$link = $_SERVER['HTTP_POST'].'staff/semcm2';
//echo "<a href=''>Link</a>";

//session_start();

//$_SESSION['name'] = 'Andrew';

//echo '<pre>';
//echo print_r($_SESSION);
//echo '<pre>';

//echo "<a href='globals2.php'>Link</a>";

//SetCookie('today', 'Thursday', time()+1000, 'ac.uk');
//SetCookie('tomorrow', 'Friday');

//echo '<pre>';
//print_r($_COOKIE);
//echo '<pre>';

//$_GET['name'] = 'Andrew';

//echo '<pre>';
//print_r($_GET);
//echo '<pre>';

//echo 'Today is '.$_GET['theday'];

echo '<pre>';
print_r($_POST);
echo '<pre>';

include 'dumpr.php';

dumpr($_POST);

echo 'Today is '.$_POST['theday'];

?>

<form name='' action='' method='post'>
        
        <input name='theday' value='Tuesday' />
        <button>Go</button>
        
</form>
        