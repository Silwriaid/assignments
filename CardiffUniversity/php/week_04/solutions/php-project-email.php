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

$genders = array(
    'M' => 'Male',
    'F' => 'Female',
    'O' => 'Other'
    // additional ones can be added here....
);

$fullName     = '';
$emailAddress = '';
$userComments = '';

if (isset($_POST) && $_POST['submit'] == 'Submit'){
    
    $errors = array();
    
    if (empty($_POST['fullName'])){
        $errors[] = 'Please enter your name';
    }
    
    if (empty($_POST['emailAddress'])){
        $errors[] = 'Please enter your email address';
    } else {
        //$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        //if (!preg_match($regex, trim($_POST['emailAddress']))) {
        if(! filter_var($_POST['emailAddress'],FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Please enter a correctly formatted email address';
        }
    }

    if (empty($_POST['gender'])){
        $errors[] = 'Please select a gender';
    }
    
    if (empty($_POST['userComments'])){
        $errors[] = 'Please enter your comments';
    }
       
    if (count($errors) == 0){
        $formValdiates = true;
    }
    
    $fullName     = $_POST['fullName'];
    $emailAddress = $_POST['emailAddress'];
    $userComments = $_POST['userComments'];
    
}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Project : Validation and Email</title>
    <link rel="stylesheet" href="resources/styles.css" type="text/css" />
</head>

<body>
    
    <?php echo $topLinks; ?>
    
    <h1>Project : Validation and Email</h1>
    
    <h2>Build a working Contact form</h2>
    
    <p> 1. Improve on the previous example to email the results of each successfull form submission<br>
        2. Submit the form using POST.<br>
        3. Ensure that you validate the email address correctly<br>
    </p>
        
    <br>
    
    <?php 

    if (!$formValdiates) {
    
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
    
    <form name="feedback" action="" method="post">
        
        <p>
            <label for="fullName">Name:</label>
            <input name="fullName" id='fullName' type="text" value="<?php echo $fullName ?>" />
        </p>

        <p>
            <label for="emailAddress">Email:</label>
            <input name="emailAddress" id='emailAddress' type="text" value="<?php echo $emailAddress ?>" />
        </p>
        
        <p>
            <label for="gender">Gender:</label>
            <select name='gender' id='gender'>
                <option value=''>Select..</option>
                <?php 
                if(count($genders)){
                    foreach($genders as $key => $value){
                        $selected = $key == $_POST['gender'] ? 'selected' : '';
                        echo "\n\t <option value='$key' $selected>$value</option>";
                    }
                }
                ?>
            </select>
        </p>        
        
        <p>
            <label for="userComments">Comments:</label>
            <textarea name="userComments" id='userComments'><?php echo $userComments ?></textarea>
        </p>
        
        <p>
            <label>&nbsp;</label>
            <input type="submit" name="submit" value="Submit" />
        </p>
        
    </form>
    
    
<?php } else { 
    
    
    $to      = 'MaggsC1@cardiff.ac.uk';
    $subject = 'Enquiry Form';
    $message = "Name:     ".$_POST['fullName']."<br>"
             . "Email:    ".$_POST['emailAddress']."<br>"
             . "Message:  ".$_POST['userComments'];
    
    $headers  = "MIME-Version: 1.0\r\n" .                              
                "Content-type: text/html; charset=iso-8859-1\r\n" .    
                "From: LEARN PHP <web-php@cardiff.ac.uk>\r\n" .         
                "Reply-To:  ".$_POST['fullName']." <".$_POST['emailAddress'].">\r\n";    
    
          //mail($to, $subject, $message, $additional_headers = null, $additional_parameters = null) {}   
    $send = mail($to, $subject, $message, $headers);
    
    if ($send){
    
        echo ' 
            <h3>Form Submission Success!</h3>
            <p>You sent the following:</p>
            <p><strong>Name:</strong> '      . $_POST['fullName'].'</p>
            <p><strong>Email:</strong> '     . $_POST['emailAddress'].'</p>
            <p><strong>Gender:</strong> '    . $genders[$_POST['gender']].'</p>
            <p><strong>Comments:</strong> '  . $_POST['userComments'].'</p>
            <p>I`ll get back to you as soon as possible</p>
            ';
    
     } else {

         echo ' 
            <h3>Ooops! (Form Submission Failure)</h3>
            <p>Something went wrong</p>
            ';
    }
} 
?>
       
    <div class="related">
        <h2>Need Help..?</h2>
        
        <p>Related sections in the course manual:
            <ul>
                <li>Filters</li>
                <li>PHP mail() function reference : <a href='http://php.net/manual/en/function.mail.php' target='_new'>http://php.net/manual/en/function.mail.php</a></li>
            </ul>
        </p>

        <p><strong>$_POST</strong></p>
<pre>
<?php
var_dump($_POST);
?>
</pre> 
        
    <p>Use the PHP mail() function with headers as below: </p>

<pre>    
mail($to, $subject, $message, $headers);

$headers  = "MIME-Version: 1.0\r\n" .
            "Content-type: text/html; charset=iso-8859-1\r\n" .
            "From: <strong>Your Name</strong> <<strong>Your Email</strong>>\r\n" .
            "Reply-To:  <strong>Your Name</strong> <<strong>Your Email</strong>>\r\n";
</pre>       
        
    </div>
    
    
    
    
</body>

</html>