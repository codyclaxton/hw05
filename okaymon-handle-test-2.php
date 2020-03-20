<?php
/*
Cody Claxton
ITEC 325, Spring 2020
https://php.radford.edu/~itec325/2020spring-ibarland/Homeworks/form-handle/form-handle.html
*/
error_reporting( E_ALL );

$_POST = array();
$_POST["trainer"] = "<pika>";
$_POST["species"] = ".=fi're";
$_POST["energy"] = "spa\nrk";
$_POST["weight"] = "8\n0";
$_POST["conversion"] = "lbs>>>";
$_POST["flavor"] = "this is just <me> testing input
okay \nthis 'is' on the '2nd' line
and this>>> is the 3rd line";

$_POST['clover'] = "wteapot>>";
$_POST['candle'] = "weak\n";
$_POST['puddle'] = "'neutral";
$_POST['spark'] = "resi\nstant";
$_POST['thinkin'] = "neut'ral";

require('okaymonform-validate-handle.php');
?>