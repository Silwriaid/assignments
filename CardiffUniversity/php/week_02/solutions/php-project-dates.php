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
    <title>Project : Outputting Dates</title>
    <link rel="stylesheet" href="resources/styles.css" type="text/css" />
</head>

<body>
    
    <?php echo $topLinks; ?>
    
    <h1>Project : Outputting Dates</h1>
    
    <h2>PHP output of date variables.</h2>
    
    <table>
        
        <tr class=''>
            <td width="50%">
                Whats the time(stamp)?
            </td>
            <td>
                <?php echo time(); ?>
            </td>
        </tr>        
        
        <tr class=''>
            <td width="50%">
                Display todays date & time in the following format:  <br>
                <em>Monday 1st January 2000, 7:15 pm </em>
            </td>
            <td><?php echo date('l jS F Y g:i a',time()); ?></td>
        </tr>
        
        <tr class=''>
            <td width="50%">
                Display a timestamp of a relavent date.<br>
                (And check it using date() and the date format above ).
            </td>
            <td><?php
                
                $myTimestamp = strtotime('3 June 1995');
                
                echo "My timestamp is: " . $myTimestamp . "<br>";
                
                $myDate = date('l jS F Y',$myTimestamp);
                
                echo "My date is: " . $myDate;
                
                ?>
            </td>
        </tr>   
        
        <tr class=''>
            <td width="50%">
                What `day` were you born on?
            </td>
            <td><?php
                
                echo "I was born on a " . date('l',strtotime('5 June 1974'));
                
                ?>
            </td>
        </tr>   
        
        <tr class=''>
            <td width="50%">
                Set a dynamic Copyright date
            </td>
            <td>
                &copy; 2000-<?php echo date("Y") ?>
            </td>
        </tr>         
        
        <tr class=''>
            <td width="50%">
                Output all the dates of this course adding '+ 7 days' to each date
            </td>
            <td>
                <?php
                
                echo '<ul>';
                
                $week_1 = strtotime('19 january 2017');
                echo '<li>Week 1: ' . date('jS F Y',$week_1) . '</li>';
                
                $week_2 = strtotime('+ 7 days',$week_1);
                echo '<li>Week 2: ' . date('jS F Y',$week_2) . '</li>';
                
                $week_3 = strtotime('+ 7 days',$week_2);
                echo '<li>Week 3: ' . date('jS F Y',$week_3) . '</li>';

                $week_4 = strtotime('+ 7 days',$week_3);
                echo '<li>Week 4: ' . date('jS F Y',$week_4) . '</li>';
                
                // etc....
                // etc....
                // etc....
                
                echo '</ul>';
                
                
                // ALternate version using a LOOP
                /*
                $date = strtotime('19 january 2017');
                echo '<ul>';
                for($i=1;$i<=12;$i++){
                    echo "<li>Week $i : " . date('jS F Y',$date) . "</li>";
                    $date = strtotime('+ 7 days',$date);
                }
                echo '</ul>';
                */
                
                ?>
            </td>
        </tr>            
        
       <tr class=''>
            <td width="50%">
                Display the number of days until Christmas Day.
            </td>
            <td><?php
                
                $thisYear = date('Y');
                
                //mktime ($hour,$minute,$second,$montd,$day,$year)
                $christmasDay = mktime(0,0,0,12,25,$thisYear);
                $daysToChristmas = date('z',$christmasDay) - date('z',time());
                
                // If we are between Xmas and NewYear..
                if ($daysToChristmas < 0){

                    // Do the same calculations for next year
                    $christmasDay = mktime(0,0,0,12,25,$thisYear+1);
                    $daysToChristmas = date('z',mktime(0,0,0,12,25,$thisYear+1));
                    
                }
                
                echo "There are " . $daysToChristmas . " days until Christmas";
                
                ?>
            </td>
        </tr>         
        
    </table>
    
    <div class="related">
        <h2>Need Help..?</h2>
        <p>Related sections in the course manual:
            <ul>
                <li>PHP Date & Time functions</li>
                <li><a href='http://php.net/manual/en/function.date.php' target='_new'>http://php.net/manual/en/function.date.php</a></li>
            </ul>
        </p>
    </div>
       
</body>

</html>