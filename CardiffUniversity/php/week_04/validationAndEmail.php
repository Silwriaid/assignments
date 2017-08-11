<?php

include 'dumpr.php';

$errors = Array();
$formCompleted = false;

$genderOptions = array(
    'M' => 'Male',
    'F' => 'Female',
    'O' => 'Other');

if ( isset($_GET['formName']) && $_GET['formName'] == 'Form1') {
    
    //echo 'Form 1 was submitted <br>';
                
    if ( empty($_GET['fullName']) ) {
    
        //echo 'Full name is not completed <br>';
        $errors[] = 'Full name is not completed';
    }
    if ( empty($_GET['emailAddress']) ) {
    
        //echo 'Email address is not completed <br>';
        $errors[] = 'Email address is not completed';
    }
    if ( empty($_GET['gender']) ) {
    
        //echo 'Email address is not completed <br>';
        $errors[] = 'Gender is not completed';
    }
    if ( empty($_GET['userComments']) ) {

        //echo 'Comments is not completed <br>';
        $errors[] = 'Comments is not completed';
    }    
    
    if (count($errors) == 0) {
    
        $formCompleted = true;
    }
    
    dumpr($errors);
}

if ( isset($_GET['formName']) && $_GET['formName'] == 'Form2') {
    
    echo 'Form 2 was submitted';
}

//dumpr($_GET);

?>

<html>

    <body>
        <h1>My Form</h1>
        
        <hr>
        
        <?php
        
        // Output errors if they exist
        if (count($errors)) {
            
            echo '<ul>';
            foreach($errors as $error) {
                
                echo "<li>$error</li>";
            }
            
            echo '</ul>';
        }
        
        ?>
        
        <?php if ($formCompleted) { ?>
        
            $to = 'andrew.hoard@btinternet.com';
            $subject = 'My first email';
            $message = 'Test';

            $headers  = "MIME-Version: 1.0\r\n" .
                        "Content-type: text/html; charset=iso-8859-1\r\n" .
                        "From: Your Name andrew.hoard@btinternet.com\r\n" .
                        "Reply-To:  Your Name andrew.hoard@btinternet.com\r\n";

            mail($to, $subject, $message, $headers);

            <h2>Thanks for submitting</h2>
                <a href="validationAndEmail.php">Clear</a>
        <?php } else { ?>    
        
        <form name="" action="" method="get">
            <p>Name: <input    name="fullName" type="text" value="<?php echo $_GET['fullName'] ?>" /></p>
            <p>Email: <input    name="emailAddress" type="text" value="<?php echo $_GET['emailAddress'] ?>" /></p>
            
            <label for="gender">Gender:</label>
            <select name='gender' id='gender'>
                <option value=''>Select..</option>   
                
                <?php 
                
                   foreach ($genderOptions as $key => $value) { 
                    
                        $selected = $key == $_GET['gender'] ? 'selected' : '';
                        
                        echo "\n\t <option value='$key' $selected>$value</option>";
                ?>
                                                                                                          
                <?php } ?>
            </select>
            
            <p>Comments: <textarea name="userComments"><?php echo $_GET['userComments'] ?></textarea></p>
            <p><input name="submit" type="submit" value="Submit" /></p>
            <input  type="hidden"  name="formName" value="Form1" />
        </form>
        
        <?php } ?>
        
    </body>
</html>