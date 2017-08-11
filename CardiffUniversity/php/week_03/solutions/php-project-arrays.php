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
    <title>Project : Arrays &amp; Loops</title>
    <link rel="stylesheet" href="resources/styles.css" type="text/css" />
</head>

<body>

    <?php echo $topLinks; ?>
    
    <h1>Project : Arrays &amp; Loops</h1>
    
    <h2>PHP output using array variables.</h2>
    
    <table>
        
        <tr class=''>
            <td width="50%">
                Generate an array of dog breeds.<br>
                Access a specific element of the array directly using its 'key'.
            </td>
            <td><?php
                
                // Indexed Array
                
                $dogs = array('Jack Russell','Yorkshire Terrier','English Bulldog','Weimaraner');
                
                //$dogs = array();
                //$dogs[] = 'Jack Russell';
                //$dogs[] = 'Yorkshire Terrier';
                //$dogs[] = 'English Bulldog';
                //$dogs[] = 'Weimaraner';
                
                echo '<p>My dog is a ' . $dogs[3] . '</p>';
                
                ?>
            </td>
        </tr>
        
        <tr class='odd'>
            <td width="50%">
                Generate an array of colours: <strong>$colours</strong><br>
                Output the array using a 'loop'.
            </td>
            <td><?php
                
                //$colours = array('Red','Green','Blue','Yellow');
                
                $colours = array();
                $colours[] = 'Red';
                $colours[] = 'Green';
                $colours[] = 'Blue';
                $colours[] = 'Yellow';
                
                echo '<ul>';
                foreach ($colours as $colour){
                    echo '<li>'.$colour.'</li>';
                }
                echo '</ul>';
                
                ?>
            </td>
        </tr>
        
        <tr class=''>
            <td width="50%">
                Output the <strong>$colours</strong> array, alphabetically.
            </td>
            <td><?php
            
                // Remember !! 'sort' does not return a value
                sort($colours);
                
                echo '<ul>';
                foreach ($colours as $colour){
                    echo '<li>'.$colour.'</li>';
                }
                echo '</ul>';
                
                ?>
            </td>
        </tr>
        
        <tr class='odd'>
            <td width="50%">
                Build an associative array of family members and ages: <strong>$family</strong><br>
                Use 'Name' as the $key and 'Age' as the $value.<br>
                Output the array..
            </td>
            <td><?php
           
                // Associative Array
           
                $family = array('Craig' => 26, 
                                'Chris' => 35,
                                'Colin' => 30, 
                                'Clare' => 40);

                //$family = array();
                //$family['Craig'] = 26;
                //$family['Colin'] = 30;
                //$family['Chris'] = 35;
                //$family['Clare'] = 40;
                
                echo '<ul>';
                foreach ($family as $key => $value){
                    echo '<li>'.$key.' is '.$value.' years old.</li>';
                }
                echo '</ul>';
                
                ?>
            </td>
        </tr>        
        
        <tr class=''>
            <td width="50%">
                Using the <strong>$family</strong> array:<br>
                Output the array in age order.
            </td>
            <td><?php
            
                asort($family);     // Sorts an array, and keeps index association
              //arsort($family);    // Reverse sort
               
               echo '<ul>';
                foreach ($family as $key => $value){
                    echo '<li>'.$key.' is '.$value.' years old.</li>';
                }
                echo '</ul>';
                
                ?>
            </td>
        </tr>  
        
        <tr class='odd'>
            <td width="50%">
                <strong>Advanced example, using a number of standard functions..</strong><br>
                Using the passage of text below, count the following:
                <ul>
                    <li>Number of words</li>
                    <li>Number of unique words</li>
                    <li>Most popular word</li>
                </ul>
                
                <?php $text = 'Ut vel est urna. Maecenas dignissim volutpat tortor sed sodales. '.
                'Ut quis porttitor velit, a fermentum massa. Duis vitae dignissim nunc. '.
                'Donec dictum, quam sit amet volutpat tincidunt, leo mauris lacinia velit, fermentum imperdiet dolor ligula non mauris. '.
                'Phasellus ipsum sapien, viverra a condimentum volutpat, tempor id arcu. '.
                'Maecenas sodales, erat quis accumsan sollicitudin, lectus risus tristique mauris, eu ultricies neque sem nec arcu.'; ?>
                
                <textarea style='width:500px;height:150px'><?php echo $text; ?></textarea>
     
            </td>
            <td><?php

                // Explode the string into an array ($tmp)
                $tmp = explode(' ',$text);
                
                // Build a new array of 'words'..  ($words)
                $words = array();
                foreach ($tmp as $word){
                    $word = trim($word);
                    $word = str_replace(array('.',',','"','\''), '', $word);
                    if (strlen($word)>0){
                        // ..by adding each word to the $words array
                        $words[] = $word;
                    }
                }
                
                // Count the number of elements in the array
                $numWords = count($words);                  
                echo "<p>There are $numWords words</p>";
                
                // Create a 'unique' array from the $words array
                $uniqueWords = array_unique($words);
                // Count the number of elements in the unique array
                $numUniqueWords = count($uniqueWords);
                echo "<p>There are $numUniqueWords unique words</p>";
                
                // Reverse the array, so that the keys become values, and values become keys
                $revArray = array_count_values($words);
                // Get the highest occuring 'key'
                $maxValue = max($revArray);
                // Get the words with the highest occurring 'key'
                $topOccurringWords = array_keys($revArray,$maxValue);
                
                echo "<p>The most popular words are '";
                echo implode("' and '",$topOccurringWords);
                echo "' (each appears $maxValue times)</p>";
                
                ?>
            </td>
        </tr>  
        
    </table>
    
    <div class="related">
        <h2>Need Help..?</h2>
        <p>Related sections in the course manual:
            <ul>
                <li>PHP Functions</li>
                <li>PHP Arrays</li>
                <li>Array Functions..</li>
            </ul>
        </p>
    </div>
       
</body>

</html>