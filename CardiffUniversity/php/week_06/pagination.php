<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'dumpr.php';

$externalFile = $_SERVER['DOCUMENT_ROOT'].'/learn/phpcourse/resources/welshPlacenamesV.csv';

if (!file_exists($externalFile)) {
    
    die('File not found');
}

$handle = fopen($externalFile, 'r');

if ($handle) {
    
    $places = array();
    
    while($line = fgets($handle)) {
    
        $places[] = trim($line);         
    }
}

fclose($handle);

$numRecords = count($places);

$recordsPerPage = 10;

$pageNumber = isset($_GET['page']) ? $_GET['page'] : 0;

$startPosition = $pageNumber * $recordsPerPage;
$records = array_slice($places, $startPosition, $recordsPerPage);

$numPages = ceil($numRecords / $recordsPerPage);

?>

<table border="1">
    
    <tr>
        <?php if ($pageNumber <= 0) { ?>
        
        <td></td>
        <?php } else { ?>
        
            <td><a href='?page=<?php echo $pageNumber - 1 ?>'>Back</a></td>
        <?php } ?>
                    
        <?php if ($pageNumber <= $numPages) { ?>
          <td><a href='?page=<?php echo $pageNumber + 1 ?>'>Next</a></td>
        <?php } else { ?>
         <td></td>
        <?php } ?>
                    
        <td>
            <?php echo $numRecords ?> records
            Showing page 
            <?php echo $pageNumber ?> of
            <?php echo $numPages ?> pages
        
        </td>                
    </tr>
    
    <?php foreach($records as $place) { ?>
    
    <tr>
        <td colspan="3"><?php echo $place ?></td>
    </tr>
        
    <?php } ?>
    
</table>