<?php

/*
 * PHP Scripting for the Web 2017
 * Written by Andrew Hoard
 */

include 'dumpr.php';

$formCompleted = false;
$errorFullname;
$errorEmailAddress = Array();;
$errorUserEnquiry = false;

$emailAddress = '';
$fullname = '';
$userEnquiry = '';

if ( isset($_POST['submit']) && $_POST['submit'] == 'Submit') {

    $formCompleted = true;

    $emailAddress = $_POST['emailAddress'];

    $errorFullname = false;
    $fullname = $_POST['fullName'];
    if ( empty($fullname)) {

        $errorFullname = true;
    }

    if ( empty($emailAddress )) {

        $errorEmailAddress[] = 'Please enter your email address';
    }
    elseif (! filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {

        $errorEmailAddress[] = 'Please enter a correctly formatted email address';
    }

    $userEnquiry = $_POST['userEnquiry'];
    if ( empty($userEnquiry)) {

        $errorUserEnquiry = true;
    }
}
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Project : Form Validation</title>
    <link rel="stylesheet" href="validation.css" type="text/css"/>
</head>

<body>

<h1>Project : Enquiry Form Validation</h1>

<div class='project'>
    PHP for the Web assignment by <em>Andrew Hoard</em> completed during March 2017
</div>

<h2>Enquiry Form</h2>

<p>1. Submit the form using POST.<br>
    2. Perform server-side validation to ensure that each field has been completed.<br>
    3. Display Valid / Invalid next to each field on submit.<br>
    4. Images can be copied and stored locally for use<br>

    <br><em>All fields are mandatory</em><br>
</p>

<form name="" action="" method="post">

    <table class='noborder'>

        <tr>
            <td>
                <input name="fullName" type="text" value="<?php echo $fullname ?>" placeholder='Name..'/>
            </td>
            <td>
                <?php if ($formCompleted == true && $errorFullname == false) {?>
                    <img src="success.png">
                <?php } ?>
                <?php if ($formCompleted == true && $errorFullname == true) {?>
                    <img src="error.png"> Please enter your name
                <?php } ?>
            </td>
        </tr>

        <tr>
            <td>
                <input name="emailAddress" type="text" value="<?php echo $emailAddress ?>" placeholder='Email Address'/>
            </td>
            <td>
                <?php if ($formCompleted == true && count($errorEmailAddress) == 0) {?>
                    <img src="success.png">
                <?php } ?>
                <?php if ($formCompleted == true && count($errorEmailAddress) > 0) {?>
                    <img src="error.png"> <?php echo $errorEmailAddress[0] ?>
                <?php } ?>
            </td>
        </tr>

        <tr>
            <td>
                <textarea name="userEnquiry" placeholder='Your enquiry'><?php echo $userEnquiry ?></textarea>
            </td>
            <td>
                <?php if ($formCompleted == true && $errorUserEnquiry == false) {?>
                    <img src="success.png">
                <?php } ?>
                <?php if ($formCompleted == true && $errorUserEnquiry == true) {?>
                    <img src="error.png"> Please enter your enquiry
                <?php } ?>
            </td>
        </tr>

        <tr>
            <td colspan='2'>
                <input type="submit" name="submit" value="Submit"/>
                <button>Clear</button>
            </td>
        </tr>

    </table>

</form>

</body>

</html>
