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
    <title>Project : Forms</title>
    <link rel="stylesheet" href="resources/styles.css" type="text/css" />
</head>

<body>
    
    <?php echo $topLinks; ?>
    
    <h1>Project : Forms</h1>
    
    <h2>Introducing GLOBAL variables $_POST and $_GET</h2>
    
    <table>
        
        <tr class='odd'>
            <td width="50%">
                Build a form that submits a single value.<br>
                Display the submitted value when the form has been submitted.<br>
                Use 'GET' as the form method.
            </td>
            <td>
<?php if ( ( isset($_GET['myForm']) )  && ( $_GET['myForm'] == 'Submit') ) { ?>
                
                <h3>Submitted value was: <?php echo $_GET['myValue'] ?></h3>
                
                <!-- Link to $_SERVER['PHP_SELF'] (the current filename)
                     to reload the page, removing any GET variables and clearing the form -->
                <p><a href='<?php echo $_SERVER['PHP_SELF'] ?>'>Clear</a></p>
                
<?php } else { ?>
                
                <form name="" action="" method="get">
                    <input type="text"   name="myValue" value="">
                    <input type="submit" name="myForm"  value="Submit">
                </form>
                
<?php } ?>
            </td>
        </tr>
        
        <tr class='odd'>
            <td width="50%">
                Duplicate the above form.<br>
                Use 'POST' as the form method.
            </td>
            <td>
<?php if ( ( isset($_GET['myForm']) )  && ( $_GET['myForm'] == 'Submit') ) { ?>
                
                <h3>Submitted value was: <?php echo $_POST['myValue'] ?></h3>
                
                <!-- Link to $_SERVER['PHP_SELF'] (the current filename)
                     to reload the page, removing any GET variables and clearing the form -->
                <p><a href='<?php echo $_SERVER['PHP_SELF'] ?>'>Clear</a></p>
                
<?php } else { ?>
                
                <form name="" action="" method="post">
                    <input type="text"   name="myValue" value="">
                    <input type="submit" name="myForm"  value="Submit">
                </form>
                
<?php } ?>                
            </td>
        </tr>
        
    </table>
    
    
    <div class="related">
        <h2>Need Help..?</h2>

        <p>Related sections in the course manual:
            <ul>
                <li>PHP Super Globals</li>
            </ul>
        </p>

        <p><strong>$_POST</strong></p>
<pre>
<?php
var_dump($_POST);
?>
</pre> 
        
        <p><strong>$_GET</strong></p>
<pre>
<?php
var_dump($_GET);
?>
</pre>        
        
        <p>Introducing 'FORMS' as a method of submitting information</p>
<pre>
    &lt;form name='' action='' method=''&gt; 
    &lt;input type='text'   name='myValue' value=''&gt; 
    &lt;input type='submit' name='myForm' value='Submit'&gt; 
    &lt;/form&gt; 
</pre>         
        
    </div>
       
</body>

</html>