<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'dumpr.php';

//$externalFile = 'http://learn.cf.ac.uk/learn/phpcourse/resources/stuartsTimeline.csv';

$externalFile2 = $_SERVER['DOCUMENT_ROOT'].'/learn/phpcourse/resources/stuartsTimeline.csv';

//dumpr($externalFile);
dumpr($externalFile2);

if (!file_exists($externalFile2)) {
    
    die('File not found');
}

//phpinfo();

$handle = fopen($externalFile2, 'r');

if ($handle) {
    
    $stuarts = array();
    $i = 0;
    
    while( $data = fgetcsv($handle, 0 , ',') ) {
        
        //dumpr($data);  
        
//        $stuarts[] = array ('name'  => $data[0],
//                            'dates' => $data[1],
//                            'image' => $data[2]);
        
        $stuarts['name'][$i] = $data[0];
        $stuarts['image'][$i] = "<img src='http://learn.cf.ac.uk/learn/phpcourse/resources/stuarts/" . $data[2] . "'";
        $stuarts['dates'][$i] = $data[1];
        
        $i++;
    }    
}

fclose($handle);

//dumpr($stuarts);
?>

<table border="1">
    
    <?php foreach($stuarts as $key => $values) { ?>
        
        <tr>
        
            <?php foreach($values as $value) { ?>
        
                <td><?php echo $value ?>  </td>
        
            <?php } ?>
        </tr>
    <?php } ?>
    
</table>