<?php

echo '<hr>';

echo time();

echo '<hr>';

echo date('Y');

echo '<hr>';

echo date('l dS F Y h:i A', time());

echo '<hr>';

echo date('jS F Y g:i a', time());

echo '<hr>';

echo date('Y-m-d H:i:s', time());

echo '<hr>';

$now = time();
echo date('jS F Y g:i a', $now);

echo '<hr>';

$then = strtotime('+1 day');
echo date('jS F Y g:i a', $then);

echo '<hr>';

$lastweek = strtotime('last week');
echo date('jS F Y g:i a', $lastweek);

echo '<hr>';

$lastYear = strtotime('last year');
echo date('jS F Y g:i a', $lastYear);

echo '<hr>';

$yearBirth = strtotime('28 august 1999');
echo 'I was born on ' . date('l', $yearBirth);

echo '<hr>';

$courseStartDate1 = strtotime('19 January 2017');

echo '<ul>';

echo '<li>' . 'Week 1: ' . date('jS F Y', $courseStartDate1) . '</li>';

$courseStartDate2 = strtotime('+7 days', $courseStartDate1);
echo '<li>' . 'Week 2: ' . date('jS F Y', $courseStartDate2 ) . '</li>';

$courseStartDate3 = strtotime('+7 days', $courseStartDate2);
echo '<li>' . 'Week 3: ' . date('jS F Y', $courseStartDate3 ) . '</li>';

$courseStartDate4 = strtotime('+7 days', $courseStartDate3);
echo '<li>' . 'Week 4: ' . date('jS F Y', $courseStartDate4 ) . '</li>';

echo '</ul>';

echo '<hr>';

$thisYear = date('Y');
$christmasDay = mktime(0, 0, 0, 12, 25, $thisYear);
var_dump($christmasDay);

echo '<hr>';

$daysToChristmasDay = date('z', $christmasDay) - date ('z', time());
echo $daysToChristmasDay;

if ($daysToChristmasDay < 0) {

    $nextYear = date('Y') + 1;
    $christmasDay = mktime(0, 0, 0, 12, 25, $nextYear);
    $daysToChristmasDay = date('z', $christmasDay) - date ('z', time());        
}

echo "There are $daysToChristmasDay days to Christmas";

echo '<hr>';
