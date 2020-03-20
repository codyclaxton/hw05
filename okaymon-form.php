<?php
/*
Cody Claxton
ITEC 325, Spring 2020
https://php.radford.edu/~itec325/2020spring-ibarland/Homeworks/form-handle/form-handle.html
*/

error_reporting( E_ALL );
require_once('utils.php'); 
require_once('okaymon-validate.php');?>

<!DOCTYPE html>
<html>
<head>
<title>This is my form for Okaymon</title>
</head>
<body>
<form action="okaymonform-validate-handle.php" method="post">

<h1 style="border:3px; border-style: solid; text-align: center; border-color: green; padding: 3px;">
<b>Okaymon Info entry form</b></h1>
<h2 style="text-align: center"><b><i><q>Gotta Catch Several of' em</i></q></b></h2>

<p style="font-size: 20px">Enter info about a newly-discover Okaymon, for our database!</p>
<p style="line-height: 0.7">Discovering trainer: <input type="text" name="trainer"><br>
Okaymon Species: <input type="text" name="species"><br>
Energy Type
<?php
echo dropdown("energy",$energy_type= array("clover","candle","puddle","spark","thinkin"),false),"\n";
?>


Weight: <input type="text" name="weight" maxlength="5" size="3">
<?php
echo dropdown("conversion",$conversion_type= array("lbs","kgs"),false),"\n";
?>
<br>
<br>
Flavor text:<br>
<textarea name='flavor' id='flavor' rows="3" cols="30"></textarea>
<br><br>

<?php
echo radiotable("types", array("weak","neutral","resistant"), array("clover","candle","spark","puddle","thinkin"));
?>

<br>

<label>
<input type="checkbox" name="agreement">
I understand that by submitting this form, I am transferring any copyright<br>
intellectual property rights to the form's owner, that I have the right to do so, and <br>
that my submission is not infringing on other people's rights.
</label>

</p>
<input type="submit">
</form>

</body>
</html>
