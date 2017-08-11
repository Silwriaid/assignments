<?php

/*
 * PHP Scripting for the Web 2017
 * Written by Andrew Hoard
 */

$XMLPath = 'http://feeds.bbci.co.uk/news/technology/rss.xml';
$xml = simplexml_load_file($XMLPath);
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="xml.css">
</head>
<body>

<h1>Project : Parsing an RSS (XML) feed</h1>
<div class='project'>
    PHP for the Web assignment by <em>Andrew Hoard</em> completed during February 2017
</div>

<h2 align="center"><?php echo $xml->channel->title ?></h2>
<h3 align="center"><?php echo $xml->channel->description ?></h3>
<p  align="center">Updated: <?php echo $xml->channel->lastBuildDate ?></p>
<hr>

<?php

//  Test whether there are news items before looping through them
if(count($xml->channel->item)) {

    //  Loop for each news item
    foreach($xml->channel->item as $item) {

        // The image has a namespaced element
        $media = $item->children('http://search.yahoo.com/mrss/');

        //  Loop for each HTML attribute and look for the URL attribute
        foreach($media->thumbnail->attributes() as $key => $value) {

            if ($key == "url") {

                $url = $value;
            }
        }

        echo '<h2><img src="' . $url . '" height="113' . '" width="200' . '" style="float:right; margin-left: 5px;" />';
        echo "$item->title</h2>";
        echo "<p>$item->description</p>";
        echo "<p>$item->pubDate : <a href='$item->link'>Read more ...</a> </p>";

        echo "<hr style='clear:both'>";
    }
}
?>

</body>

</html>

