<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'dumpr.php';

$XMLPath = '/learn/phpcourse/resources/newsfeed.xml';

//echo '<pre>';
//print_r($XMLPath);
//echo '</pre>';


$XML = $_SERVER['DOCUMENT_ROOT'].$XMLPath;

//echo '<pre>';
//print_r($XML);
//echo '</pre>';


//dumpr($XML);

$xml = simplexml_load_file($XML);

//echo '<pre>';
//print_r($xml);
//echo '</pre>';

?>

<html>
    <body>
        
        <h1><?php echo $xml->title ?></h1>
        <h2><?php echo $xml->description ?></h2>
        <p>Updated: <?php echo $xml->date ?></p>
        <hr>
        
        <?php
        
            if(count($xml->item)) {
                
                foreach($xml->item as $item) {
                    
                    echo "<h3>$item->title</h3>";                    
                    echo "<p>$item->description</p>";
                    echo "<p>$item->pubDate <a href='$item->link'>Read more ...</a> </p>";
                    echo "<hr>";
                }
            }
        ?>
        
    </body>
            
</html>

