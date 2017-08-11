<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'dumpr.php';

//dumpr($_SERVER);
//dumpr($_SERVER['SCRIPT_NAME']);

//if ($_SERVER['SCRIPT_NAME'] == '/webstudent/sem4ajh/php/week_09/_ajaxWelshPlaceNamesSearch.php') {
    
    //header("Location: /");
//    exit;
//}

$externalFile = $_SERVER['DOCUMENT_ROOT'] . '/learn/phpcourse/resources/welshPlacenames.csv';

if (! file_exists ($externalFile)) {
    
    echo "Cant find file $externalFile";
}

if ($handle = fopen($externalFile,'r')) {
    
    $allPlaces = fgetcsv($handle,0,',');
}

if(isset($_GET['search']) && $_GET['search'] != '') {
    
    $filteredPlaces = array();
    
    foreach($allPlaces as $allPlace) {
        
        //if ( stristr( $allPlace, $_GET['search'] )) {
        if (strtoupper(substr($allPlace,0,strlen($_GET['search']))) == strtoupper($_GET['search'])) {   
            
            $filteredPlaces[] = $allPlace;
        }        
    }            
}

$size = count($filteredPlaces);
$html = "<select size='$size'>";

foreach($filteredPlaces as $filteredPlace) {
    
    $html .= "<option>$filteredPlace</option>";
}

$html .= "</select>";

echo $html;
?>
