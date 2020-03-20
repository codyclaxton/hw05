<?php
/*
Cody Claxton
ITEC 325, Spring 2020
https://php.radford.edu/~itec325/2020spring-ibarland/Homeworks/form-handle/form-handle.html
*/
error_reporting( E_ALL );
require_once('utils.php'); ?>

<!DOCTYPE html>
<html>
<head>
<title>This is my form for Okaymon</title>
</head>
<body>


<h1 style="border:3px; border-style: solid; text-align: center; border-color: green; padding: 3px;">
<b>Okaymon Info entry form</b></h1>
<h2 style="text-align: center"><b><i><q>Gotta Catch Several of' em</i></q></b></h2>
<p style="font-size: 20px;">Here is the information received:  <br></p>
<?php
$line_by_line = trim($_POST["flavor"]);

        echo "Trainer: ".htmlspecialchars($_POST['trainer'])."<br>";
        echo "Species: ".htmlspecialchars($_POST['species'])."<br>";
        echo "Energy: ".htmlspecialchars($_POST['energy'])."<br>";
        echo "Weight: " .htmlspecialchars($_POST['weight'])."<br>";
        echo "Weight-Units: ".htmlspecialchars($_POST['conversion'])."<br>";
        echo "Flavor text: ".nl2br(htmlspecialchars($line_by_line))."<br><br>";

        echo "Bias" . "<br>";
        echo "<ul style='line-height: 0.6';>";
                echo "<li>"."Clover: ".htmlspecialchars($_POST['clover'])."</li>"."<br>";
                echo "<li>"."Candle: ".htmlspecialchars($_POST['candle'])."</li>"."<br>";
                echo "<li>"."Puddle: ".htmlspecialchars($_POST['puddle'])."</li>"."<br>";
                echo "<li>"."Spark: ".htmlspecialchars($_POST['spark'])."</li>"."<br>";
                echo "<li>"."Thinkin: ".htmlspecialchars($_POST['thinkin'])."</li>"."<br>";
        echo "</ul>";
?>


</body>
</html>