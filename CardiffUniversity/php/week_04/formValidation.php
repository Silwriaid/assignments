<?php

include 'dumpr.php';

$errors = Array();
$formCompleted = false;

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
        
        <h2>Thanks for submitting</h2>
            <a href="formValidation.php">Clear</a>
        <?php } else { ?>    
        
        <form name="" action="" method="get">
            <p>Name: <input    name="fullName" type="text" value="<?php echo $_GET['fullName'] ?>" /></p>
            <p>Email: <input    name="emailAddress" type="text" value="<?php echo $_GET['emailAddress'] ?>" /></p>
            <p>Comments: <textarea name="userComments"><?php echo $_GET['userComments'] ?></textarea></p>
            <p><input name="submit" type="submit" value="Submit" /></p>
            <input  type="hidden"  name="formName" value="Form1" />
        </form>

        <form name="" action="" method="get">
            <p>Name: <input    name="fullName"     type="text" value="" /></p>
            <p>Email: <input    name="emailAddress" type="text" value="" /></p>
            <p>Comments: <textarea name="userComments"></textarea></p>
            <p><input name="submit"  type="submit" value="Submit" /></p>
            <input  type="hidden"  name="formName" value="Form2" />
        </form>
        
        <?php } ?>
        
    </body>
</html>