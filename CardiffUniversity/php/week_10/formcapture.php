<?php

include 'dumpr.php';

session_start();

if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
    
    if(empty($_POST['emailAddress'])) {
        
        $errors[] = 'Email Address is empty';
    }
    
    if(empty($_POST['captcha'])) {
        
        $errors[] = 'Captcha is empty';
    }
    else {
        
        if ((int)$_POST['captcha'] != (int)$_SESSION['string']) {
         
            $errors[] = 'Captcha is incorrect';
        }
    }
    
    if(count($errors) == 0) {
        
        $formValidates = true;
    }
    
    $emailAddress = $_POST['emailAddress'];
}

//  Display errors if they exist
if(count($errors)) {
    foreach($errors as $error) {
        echo $error.'<br>';
    }
}
?>

<?php if (! $formValidates) { ?>

<form name='' action='' method='post'>
    <table>
        <tr>
            <th>Email Address:</th>
            <td>
                <input name='emailAddress' type='text' value='<?php echo $emailAddress ?>' placeholder='Email Address' />
            </td>
        </tr>
        <tr>
            <td>
                <img src='image.php' />
            </td>
            <td>
                <input name='captcha' type='text' placeholder='Captcha' />
            </td> 
        </tr>
        <tr>                
            <td colspan='2'>
                <input type='submit' name='submit' value='Submit' />                   
            </td>
        </tr>
    </table>
</form>

<?php } else { ?>

<h1>Success</h1>
<?php } ?>

<br>
<br>
<br>
<br>
<br>

<?php
//dumpr($_SESSION);




