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
$_POST["energy"] = "spa\nrk \nthird line";

require('okaymonform-validate-handle.php');


?>