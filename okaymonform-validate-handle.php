<?php
/*
Cody Claxton
ITEC 325, Spring 2020
https://php.radford.edu/~itec325/2020spring-ibarland/Homeworks/form-handle/form-handle.html
*/
error_reporting( E_ALL );
require('okaymon-validate.php'); 
require('okaymon-constants.php');

$title = "Okaymon errors: ";
?>

<!--
    receives info from okaymon-validate.php
    Validates fields and prints any error messages contained in Okaymon form
    //Empty array equals false
    //Non empty is 1
    -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="validation.css">
<h1><?php echo $title?></h1>
<p><?php allErrorMessages($_POST);?>
</head>
<hr class ="rounded">
<body>
<h2>Information submitted</h2>
 <b>"Trainer:"</b><?php echo $_POST['trainer']; ?><br>
  <b>"Species:"</b><?php echo $_POST['species']; ?><br>
  <b>"Energy Type:"</b><?php echo $_POST['energy']; ?><br>
  <b>"Weight :"</b><?php echo $_POST['weight']; ?><br>
  <b>"Conversion"</b><?php echo $_POST['conversion']; ?><br>
  <b>"Flavor text:"</b><?php echo $_POST['flavor']; ?><br>
  <b>"Clover:"</b><?php echo $_POST['clover']; ?><br>
  <b>"Candle:"</b><?php echo $_POST['candle']; ?><br>
  <b>"Puddle:"</b><?php echo $_POST['puddle']; ?><br>
  <b>"Spark:"</b><?php echo $_POST['spark']; ?><br>
  <b>"Thinkin:"</b><?php echo $_POST['thinkin']; ?><br>
</html>