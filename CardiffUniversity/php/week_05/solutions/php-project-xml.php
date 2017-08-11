<?php
/*
 *  Cardiff Centre for Lifelong Learning
 *  PHP Scripting for the Web
 *  ------------------------
 *  Chris Maggs | Jan 2014
 */

// INCLUDES | CONSTANTS | SECURITY
include 'bootstrap.php';

$XMLPath = '/learn/phpcourse/resources/newsfeed.xml';
$XML = $_SERVER['DOCUMENT_ROOT'].$XMLPath;

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Project : Parsing XML</title>
    <link rel="stylesheet" href="resources/styles.css" type="text/css" />
</head>

<body>

<?php echo $topLinks; ?>

<h1>Project : Parsing XML</h1>

<p>Read and display XML using <strong>simplexml_load_file</strong>.</p>
<p>XML eg: <a href='<?php echo $XMLPath ?>' target='_new'><?php echo $XMLPath ?></a></p>

<?php

// simplexml_load_file - Interprets an XML file into an object
$xml = simplexml_load_file($XML);

// Access elements of the Object directly
echo "\n <h2 align='center'>$xml->title</h2>";
echo "\n <h3 align='center'>$xml->description</h3>";
echo "\n <p align='center'>$xml->lastBuildDate</p>";
echo "\n <hr>";

// An Object's element can also be an array..
$rssItems = $xml->item;

foreach($rssItems as $rssItem){
    //dumpr($rssItem);

    // ..of Objects
    echo "\n <h2>$rssItem->title</h2>";
    echo "\n <p>$rssItem->description</p>";
    echo "\n <p>$rssItem->pubDate : <a href='$rssItem->link'>Read More..</a></p>";
    echo "\n <hr>";
    echo "\n ";

}

?>

</body>

</html>