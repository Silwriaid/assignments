<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<a href='globals.php?today=Thursday&time=night'>Link</a>";

session_start();

echo '<pre>';
echo print_r($_SESSION);
echo '<pre>';
