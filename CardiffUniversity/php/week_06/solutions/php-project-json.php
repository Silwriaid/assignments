<?php 
/* 
 *  Cardiff Centre for Lifelong Learning 
 *  PHP Scripting for the Web 
 *  ------------------------ 
 *  Chris Maggs | Jan 2014 
 */ 

// INCLUDES | CONSTANTS | SECURITY 
//include 'bootstrap.php';  

$postCode = isset($_POST['postCode']) ? $_POST['postCode'] : ''; 

?> 
<!DOCTYPE html> 
<head> 
    <meta charset="utf-8"> 
    <title>Project : Parsing a JSON feed </title> 
    <link rel="stylesheet" href="resources/styles.css" type="text/css" /> 
</head> 

<body> 
     
    <?php echo $topLinks; ?> 
     
    <h1>Project : Parsing a JSON feed </h1>     
     
    <p> 
       Use either the JSON Feed from below, substituting your post code, or your own publicly accessible JSON Feed<br> 
       <em>https://maps.google.com/maps/api/geocode/json?address=<--POST-CODE-HERE--></em> 
    </p> 
         
    <hr> 
     
    <h2>Post Code Lookup</h2> 
     
    <form name="" action="" method="post">     
        <input name="postCode" type="text" value="<?php echo $postCode ?>" />                 
        <input name="submit"   type="submit" value="Go" />         
    </form> 
     
    <br> 
     
    <?php 
     
    if(isset($_POST['submit']) && $_POST['submit'] == 'Go'){  
     
        $postCode   = str_replace(' ', '+', $postCode); 

        $geocode    = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$postCode ); 
         
        $output     = json_decode($geocode); 
         
        if($output){ 
           
            if(is_array($output->results)){ 
              
                foreach($output->results as $results){ 
                     
                    if($results->formatted_address){ 
                         
                        $address = str_replace(',',',<br>',$results->formatted_address); 
                         
                        echo '<h3>Address found:</h3>'; 
                        echo "<p>$address</p>"; 
  
                    } 
                    if($results->geometry->location){ 
                         
                        $lat = $results->geometry->location->lat; 
                        $lng = $results->geometry->location->lng; 
                      
                        echo "<p> 
                                <a href='http://www.google.com/maps/place/$lat,$lng' target='_blank' title='View in Google Maps'> 
                                    <span class='description'>Latitude: $lat Longitude: $lng</span> 
                                </a> 
                            </p>"; 
                     
                    } 
                    break; 
                } 
            } 
        } else { 
             
            echo 'Invalid or missing Post Code'; 
        } 
         
        echo '<hr>'; 
        echo '<p><a href="'.$_SERVER['PHP_SELF'].'">Clear</a></p>'; 
         
    } 
     
?> 
        
</body> 

</html>
