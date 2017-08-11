<?php

include 'dumpr.php';

$root = $_SERVER['DOCUMENT_ROOT'];
$relative = '/webstudent/sem4ajh/php/uploads';
$dir = $root . $relative;

if (! is_dir($dir)) {

    die ("'$dir' is not a directory");
}

if (! is_writable($dir)) {

    die ("'$dir' is not writable");
}

//  destination
$filename = 'cms.txt';
$destination = $dir . '/' . $filename;

if(isset($_POST['submit']) && $_POST['submit'] == 'Save') {

    //  Check if the submitted text area is blank
    if ($_POST['fileContent'] != '') {

        $str = $_POST['fileContent'];

        //  Write the str to disk (append if file already exists)
        if (file_put_contents($destination, $str) == false) {

            $error['There was an error writing the file'];
            dumpr($error);
            die($error);
        }
    }
    else {

        //  The text area is blank so delete the file
        if (file_exists($destination)) {

            unlink($destination);
        }
    }

    header("Location:" . $_SERVER['PHP_SELF']);  // Will not work if previous output e.g. dumpr
}

$str = file_get_contents($destination);

//  Replace carriage returns ith HTML <br>
$htmlStr = str_replace("\n","<br>",$str);
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h1>Project : Modify page content via an external file</h1>
<div class='project'>
    PHP for the Web assignment by <em>Andrew Hoard</em> completed during March 2017
</div>

<table>

    <tr>
        <td width='50%'>

            <h3>Modify content</h3>

            <form name="createFile" action="" method="post">

                <p>
                    <textarea name="fileContent" style='width:400px;height:200px;'><?php echo $str ?></textarea>
                </p>

                <p>
                    <input type="submit" name="submit" value="Save" />
                </p>

            </form>
        </td>

        <?php echo "<td>$htmlStr</td>" ?>

</table>