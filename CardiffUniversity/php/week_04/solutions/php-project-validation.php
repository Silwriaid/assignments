

HOME | Welcome : Andrew Feedback | Software | FTP | Logout

<?php
/*
 *  Cardiff Centre for Lifelong Learning
 *  PHP Scripting for the Web
 *  ------------------------
 *  Chris Maggs | Jan 2014
 */

// INCLUDES | CONSTANTS | SECURITY
include 'bootstrap.php'; 

$formValdiates = false;

$fullName     = '';
$emailAddress = '';
$userComments = '';

if (isset($_GET) && $_GET['submit'] == 'Submit'){
    
    $errors = array();
    
    // Validate Name
    if (empty($_GET['fullName'])){
        $errors[] = 'Please enter your name';
    }
    
    // Validate Email
    if (empty($_GET['emailAddress'])){
        $errors[] = 'Please enter your email address';
    }
       
    // Validate Commnt
    if (empty($_GET['userComments'])){
        $errors[] = 'Please enter your comments';
    }
    
    if (count($errors) == 0){
        $formValdiates = true;
    }
    
    $fullName     = $_GET['fullName'];
    $emailAddress = $_GET['emailAddress'];
    $userComments = $_GET['userComments'];
    
}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Project : Form Validation</title>
    <link rel="stylesheet" href="resources/styles.css" type="text/css" />
</head>

<body>
    
    <?php echo $topLinks; ?>
    
    <h1>Project : Form Validation</h1>
        
    <h2>Contact Us</h2>
    
    <p>1. Submit the form using GET.<br>
       2. Perform server-side validation on each field to ensure that each field has been completed.<br>
       3. Display the submitted form details on successful form submission.<br>
       <br>
    </p>
    
    <?php if ( ! $formValdiates) { ?>
    
    <?php
    // Display Errors if they exist
    if (count($errors) > 0){
        echo "\n<div class='errors'>";
        echo "\n<ul>";
        foreach ($errors as $error){
            echo "\n\t<li>$error</li>";
        }
        echo "\n</ul>";
        echo "\n</div>";
    }
    ?>
    
    <form name="simpleLogin" action="" method="get">
        
        <p>
            <label for="fullName">Name:</label>
            <input name="fullName" type="text" value="<?php echo $fullName ?>" />
        </p>
        
        <p>
            <label for="emailAddress">Email:</label>
            <input name="emailAddress" type="text" value="<?php echo $emailAddress ?>" />
        </p>
        
        <p>
            <label for="userComments">Comments:</label>
            <textarea name="userComments"><?php echo $userComments ?></textarea>
        </p>
        
        <p>
            <label>&nbsp;</label>
            <input type="submit" name="submit" value="Submit" />
        </p>
        
    </form>
    
    <a href='<?php echo $_SERVER['PHP_SELF'] ?>'>Clear</a>
    
<?php } else { ?>
    
    <h2>Form Submission Successful</h2>
    
    <p><label>Name:</label><?php echo $_GET['fullName']?></p>
    <p><label>Email:</label><?php echo $_GET['emailAddress']?></p>
    <p><label>Comments:</label><?php echo $_GET['userComments']?></p>
    
    <br>
    <p><a href='php-project-validation.php'>reset</a></p>
    
<?php } ?>
    
    
    
    <div class="related">
        <h2>Need Help..?</h2>
        
        <p>
            <ol>
                <li>Validate each field separately</li>
                <li>Put submitted values back into form fields on failure</li>
                <li>Clear all fields on success</li>
            </ol>
        </p>

        <p><strong>$_GET</strong></p>
<pre>
<?php
var_dump($_GET);
?>
</pre> 
        
<pre>
&lt;form name="" action="" method="get"&gt;
    &lt;input    name="fullName"     type="text" value="" /&gt;
    &lt;input    name="emailAddress" type="text" value="" /&gt;
    &lt;textarea name="userComments"&gt;&lt;/textarea&gt;
    &lt;input    name="submit"       type="submit" value="Submit" /&gt;
&lt;/form&gt;
</pre>         
        
    </div>
    
    
    
</body>

</html> 1 