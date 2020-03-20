<?php
/*
Cody Claxton
ITEC 325, Spring 2020
https://php.radford.edu/~itec325/2020spring-ibarland/Homeworks/form-handle/form-handle.html
*/
error_reporting( E_ALL );
require_once('utils.php');
require('okaymon-validate.php');


/*
 * 0
 * 1
 * negative
 * decimal
 * 
 * 
echo allErrorMessages(array());
echo allErrorMessages(array("hello"));
echo allErrorMessages(array("apples","oranges"));
echo allErrorMessages(array(1));
echo allErrorMessages(array("hello"),5); 
echo allErrorMessages(array(""));*/
echo "///////////////Starting trainer_validation tests///////////////////////" ,"\n";
echo test(trainer_validation("joe",1,50),""), "\n";
echo test(trainer_validation("",0,50),""), "\n";
echo test(trainer_validation("",1,10),"<b>Trainer</b> name must be atleast 1 characters long"), "\n";
echo test(trainer_validation("Happy wonderland ",1,50),""), "\n";
echo test(trainer_validation("tomasjoe",-5,10),""), "\n";
echo test(trainer_validation("joe",4,2),"<b>Trainer</b> name may not be longer than 2 characters long"), "\n";
echo test(trainer_validation("a",1.5,10),""), "\n";
echo test(trainer_validation("applebottomjeansandsomemore",1,10),"<b>Trainer</b> name may not be longer than 10 characters long"), "\n";

echo "///////////////Starting species validation tests///////////////////////" , "\n";
echo test(species_validation("angry",50),""),"\n";
echo test(species_validation("angry",10.4),""),"\n";
echo test(species_validation("a",1),""),"\n";
echo test(species_validation("a",0),"<b>Species</b> can not be 0 or more characters"),"\n";
echo test(species_validation("////>hel",5.8),"<b>Species</b> can not be 5 or more characters"),"\n";
echo test(species_validation("",10),"<b>Species</b> needs to have atleast 1 letter character"),"\n";
echo test(species_validation("491084",20),"<b>Species</b> needs to have atleast 1 letter character"),"\n";
echo test(species_validation("monster",4), "<b>Species</b> can not be 4 or more characters"),"\n";
echo test(species_validation("a",-5),"<b>Species</b> can not be -5 or more characters"),"\n";

echo "///////////////Starting Flavor Text tests///////////////////////" , "\n";
echo test(flavorText_validation("yum",true,200),""),"\n";
echo test(flavorText_validation("yum",false,200),""),"\n";//need to fix
echo test(flavorText_validation("yum","",200),""),"\n";
echo test(flavorText_validation("",true,200),""),"\n";
echo test(flavorText_validation("yum",true,200),""),"\n";
echo test(flavorText_validation("a",true,200),""),"\n";
echo test(flavorText_validation("w",false,200),""),"\n";
echo test(flavorText_validation("this is a testthis is a testthis is a testthis is a testthis is a testthis is a testthis is a testthis is a test
this is a testthis is a testthis is a testthis is a testthis is a testthis is a testthis is a testthis is a testthis is a testthis is a test
this is a testthis is a testthis is a testthis is a testthis is a testthis is a testthis is a test",true,200),"<b>Flavor text</b> must be less than 200 characters"),"\n";

echo "///////////////Starting Weight Validation tests///////////////////////" , "\n";
echo test(weight_validation(0,10000),""),"\n";
echo test(weight_validation(-10,10000),"<b>Weight</b> must be greater then 0"),"\n";
echo test(weight_validation(-.1,10000),""),"\n";//Defaults to 0 so passes
echo test(weight_validation(8/4,10000),""),"\n";
echo test(weight_validation(10000,10000),"<b>Weight</b> must be less than 10,000"),"\n";
echo test(weight_validation(10001,10000),"<b>Weight</b> must be less than 10,000"),"\n";
echo "///////////////Starting EnergyPulldown tests///////////////////////" , "\n";
echo test(energyType_pulldown_validation(""),"<b>Energy Type</b> must be selected from drop down"),"\n";
echo test(energyType_pulldown_validation("clover"),""),"\n";
echo test(energyType_pulldown_validation("spark-puddle"),"<b>Energy Type</b> must be selected from drop down"),"\n";
echo test(energyType_pulldown_validation(4),"<b>Energy Type</b> must be selected from drop down"),"\n";

echo "///////////////Starting weightunits pulldown tests///////////////////////" , "\n";
echo test(weightUnits_pulldown_validation(""),"<b>Weight</b> units must be lbs or kgs"),"\n";
echo test(weightUnits_pulldown_validation("lb"),"<b>Weight</b> units must be lbs or kgs"),"\n";
echo test(weightUnits_pulldown_validation("lbs"),""),"\n";
echo test(weightUnits_pulldown_validation("lbs-kgs"),"<b>Weight</b> units must be lbs or kgs"),"\n";


?>