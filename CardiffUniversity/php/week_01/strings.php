<?php

$myName = 'Andrew';
echo "My name is $myName";

echo '<hr>';

$number1 = 123456;
$number2 = 654321;

$result = $number1 + $number2;

echo "Sum of $number1 and $number2 is $result";

echo '<hr>';

$random = 'abc123';

if (is_string($random)) {

  echo "'$random' is string";	
}
else {

  echo "'$random' is not a string";
}
echo '<hr>';

if (is_integer($random)) {

  echo "'$random' is number";	
}
else {

  echo "'$random' is not a number";
}
echo '<hr>';

if (is_bool($random)) {

  echo "'$random' is boolean";	
}
else {

  echo "'$random' is not boolean";
}
echo '<hr>';