<?php

include 'dumpr.php';

include $_SERVER['DOCUMENT_ROOT'] . '/learn/phpcourse/classes/URLShortner.class.php';

$google = new URLShortener();

//dumpr($google);

//$x = get_class_methods($google);
//dumpr($x);

$longUrl = 'http://www.bbc.co.uk/news/science_and_environment';

$result = $google->set_short($longUrl);
dumpr($result['id']);
$shortUrl = $result['id'];

$result = $google->get_long($shortUrl);
dumpr($result['longUrl']);

echo 'Long URL ' . $longUrl . '<br>';
echo 'Short URL ' . $shortUrl . '<br>';
echo 'Long URL ' . $result['longUrl'];

?>

<form name='' action='' method='post'>
    
    <input type='text' name='longUrl' value=''>
    <input type='submit' name='submit' value='Submit'>
    
</form>



