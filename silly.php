<?php
/*
Cody Claxton
ITEC 325, Spring 2020
https://php.radford.edu/~itec325/2020spring-ibarland/Homeworks/form-handle/form-handle.html
*/
error_reporting( E_ALL );
require_once(__DIR__.'/utils.php'); ?>

<!DOCTYPE html>
<html>
<head>
<title>This is my silly webpage in php</title>
</head>
<body>

<h1>Testing pluralize</h1>
<?php echo pluralize(10,"shirt"),"\n"; ?>

<h2>Testing Hyperlink</h2>
<?php echo hyperlink("www.testing.com","Testing hyperlink"),"\n"; ?>

<h3>Testing thumbnail</h3>
<?php echo thumbnail("test.jpg",250),"\n"; ?>

</body>
</html>