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
    <title>Project : Outputting Strings</title> 
    <link rel="stylesheet" href="resources/styles.css" type="text/css" /> 
</head> 

<body> 
     
    <?php echo $topLinks; ?> 
     
    <h1>Project : Outputting Strings</h1> 
     
    <h2>PHP output of string variables.</h2> 
     
    <table> 
         
        <tr class='odd'> 
            <td width="50%"> 
                Output the following, using a PHP Variable for your name:<br> 
                <em>$myName = 'Chris';</em> 
            </td> 
            <td><?php  
                 
                $myName = 'Chris'; 
                 
                echo 'My name is '.$myName; 
                 
                ?> 
            </td> 
        </tr> 
         
        <tr class=''> 
            <td width="50%"> 
                Select 2 random numbers.<br> 
                Perform a calculation using PHP and display the calculated result.<br> 
                <em>$number1 = 123456;<br>$number2 = 654321;</em> 
            </td> 
            <td><?php  
                 
                $number1 = 123456; 
                $number2 = 654321; 
                 
                $sum = ($number1 + $number2); 
                 
                echo 'The sum of '.$number1.' and '.$number2.' is : '.$sum; 
                 
                ?> 
            </td> 
        </tr> 
         
        <tr class='odd'> 
            <td width="50%"> 
                Select a random number of letters/numbers/true/false.<br> 
                Perform individual tests for the following, and output the result.<br> 
                <em>$random = 'abc123';</em> 
                <ul> 
                    <li>Is it a string ?</li> 
                    <li>Is it boolean ?</li> 
                    <li>Is it a number ?</li> 
                </ul> 
                Check your answer with a single function. 
            </td> 
            <td> 
                <br><br><br> 
                 
                <?php  
                 
                $random = 'abc123'; 

                echo '<ul>'; 
                 
                if( is_string($random) ){ 
                    echo "<li>'".$random."' is a string</li>"; 
                } else { 
                    echo "<li>'".$random."' is not a string</li>"; 
                } 
                 
                if( is_bool($random) ){ 
                    echo "<li>'".$random."' is a boolean</li>"; 
                } else { 
                    echo "<li>'".$random."' is not a boolean</li>"; 
                } 
                 
                if( is_numeric($random) ){ 
                    echo "<li>'".$random."' is a number</li>"; 
                } else { 
                    echo "<li>'".$random."' is not a number</li>"; 
                } 
                 
                echo '</ul>'; 
                 
                //-------------------------------------------------------------------------------- 
                /* 
                echo '<p>'.$random.' '.is_string($random)  ? ' is ' : ' is not ' . 'a string</p>'; 
                echo '<p>'.$random.' '.is_bool($random)    ? ' is ' : ' is not ' . 'a boolean</p>'; 
                echo '<p>'.$random.' '.is_numeric($random) ? ' is ' : ' is not ' . 'a number</p>'; 
                */ 
                //-------------------------------------------------------------------------------- 
                 
                echo 'Type :: '.gettype($random); 
                 
                ?> 
            </td> 
        </tr>      
         
    </table> 
     
    <div class="related"> 
        <h2>Need Help..?</h2> 
        <p>Related sections in the course manual: 
            <ul> 
                <li>PHP Variables</li> 
                <li>PHP Types</li> 
                <li>PHP Operators</li> 
                <li>PHP Strings</li> 
                <li>String Functions</li> 
                <li>PHP Functions</li> 
            </ul> 
        </p> 
    </div> 
     
</body> 

</html>