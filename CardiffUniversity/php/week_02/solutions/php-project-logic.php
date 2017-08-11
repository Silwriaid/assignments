<?php
/*
 *  Cardiff Centre for Lifelong Learning
 *  PHP Scripting for the Web
 *  ------------------------
 *  Chris Maggs | Jan 2014
 */

// INCLUDES | CONSTANTS | SECURITY
include 'bootstrap.php'; 

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Project : Conditional Logic</title>
    <link rel="stylesheet" href="resources/styles.css" type="text/css" />
</head>

<body>
    
    <?php echo $topLinks; ?>
    
    <h1>Project : Conditional Logic</h1>
    
    <h2>Using variables to make decisions.</h2>
    
    <table>
        
        <tr class='odd'>
            <td width="50%">
                Display a greeting, based on the time of day.<br>
                Use the <em>if</em> clause only.
            </td>
            <td><?php 
            
                $h = date("H");

                if($h < 12){
                    echo 'Good Morning';
                }
                
                if($h > 12 && $h < 20){
                    echo 'Good Afternoon!';
                }
                
                if($h >= 20){
                    echo 'Good Night';
                }
                
                ?>
            </td>
        </tr>
        
        
        <tr class=''>
            <td width="50%">
                Generate a random number between 0 and 100.<br>
                Display whether the number is more or less than 50.<br>
                Use <em>if</em> and <em>else</em> clauses.
            </td>
            <td><?php 
            
                $randomNumber = rand(0,100);
                
                echo 'The randomly generated number is '. $randomNumber;
                
                if ($randomNumber < 50){
                    
                    echo '<br>The randomly generated number is `less` than 50';
                    
                } else {
                    
                    if ($randomNumber > 50){
                        
                        echo '<br>The randomly generated number is `more` than 50';
                        
                    } else {
                        
                        echo '<br>The randomly generated number is `exactly` 50';
                        
                    }
                    
                }
                
                ?>
            </td>
        </tr>        
        
        
        <tr class='odd'>
            <td width="50%">
                Create 2 random variables as numbers.<br>
                Output a result that compares the values as being equal or not.<br>
                Use <em>if</em> and <em>elseif</em> clauses.
            </td>
            <td><?php 
            
                $n1 = rand(1,10);
                $n2 = rand(1,10);
                
                echo '$n1 = '.$n1.'<br>$n2 = '.$n2.'<br>';

                if ($n1 == $n2)   {

                  echo "The values are the same!";

                } elseif ($n1 > $n2)   {

                  echo 'The $n1 variable is higher than $n2 variable';
                  
                } elseif ($n1 < $n2)   {

                  echo 'The $n1 variable is lower than $n2 variable';
                    
                } 
                
                ?>
            </td>
        </tr>
        
        
        <tr>
            <th colspan='2'>Introducing the GLOBAL variable: $_GET</th>
        </tr>
 
        <tr class=''>
            <td width="50%">
                Use a language variable in the URL to output a phrase in different languages.<br>
                The default should be English.</br>
                Other languages should be available via a link.<br>
                Use a <em>switch</em> statement to output the correct language;
            </td>
            <td><?php 
            
                $languages = array('en','fr','de','cy');
                
                echo '<p>Switch Language : ';
                foreach ($languages as $language){
                    echo "\n\t<a href='?lang=$language'>$language</a> ";
                }
                echo '</p>';
                
                if(isset($_GET['lang']) && in_array($_GET['lang'],$languages)){
                    
                    $lang = $_GET['lang'];
   
                }
                
                
                if($lang == 'fr'){
                    
                    echo 'Le chien paresseux sauté par-dessus le chat endormi.';

                } elseif ($lang == 'de') {
                    
                    echo 'Der faule Hund sprang über den schlafenden Katze.';
                    
                } elseif ($lang == 'cy') {                        
                        
                    echo 'Ma`r ci ddiog neidio dros y gath yn cysgu.';

                } else {
                    
                    echo 'The lazy dog jumped over the sleeping cat.';
                    
                }
                
//                // Alternative way - less decisions!
//                switch($lang){
//                    case 'fr':    
//                        echo 'Le chien paresseux sauté par-dessus le chat endormi.';
//                        break;
//                    case 'de':
//                        echo 'Der faule Hund sprang über den schlafenden Katze.';
//                        break;
//                    case 'cy':
//                        echo 'Ma`r ci ddiog neidio dros y gath yn cysgu.';
//                        break;
//                    default:
//                        echo 'The lazy dog jumped over the sleeping cat.';
//                }
                
                
                // Translations courtesy of Google Translate
                // http://translate.google.com/#en/de/The%20lazy%20dog%20jumped%20over%20the%20sleeping%20cat.
                ?>
            </td>
        </tr>
        
    </table>
    
    <div class="related">
        <h2>Need Help..?</h2>
        <p>Related sections in the course manual:
            <ul>
                <li>PHP Operators</li>
                <li>PHP If.. Else.. </li>
                <li>PHP Super Globals</li>
            </ul>
        </p>
    </div>    
       
</body>

</html>