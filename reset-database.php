<?
/*
Cody Claxton
ITEC 325, Spring 2020
https://php.radford.edu/~itec325/2020spring-ibarland/Homeworks/db/db.html
*/
require('database-creds.php');
$sql_drop_okaymon = "drop table if EXISTS okaymon";
$sql_drop_energy = "drop table if exists energy_types";
$sql_create_okaymon = "create table okaymon (\n"

    . "    trainerId int AUTO_INCREMENT primary key,\n"

    . "    trainer varchar(50) not null,\n"

    . "    species varchar(25) not null,\n"

    . "    energy varchar(10) not null,\n"

    . "    weight int(3) not null,\n"

    . "    weight_units varchar(3),\n"

    . "    flavor_text varchar(200),\n"

    . "    bias varchar(25)\n"

    . "    )";
$sql_create_energy = "create table energy_types(\n"

. "    energy varchar(25) primary key\n"

. "    )";
$sql_create_constraint ="ALTER TABLE okaymon\n"

. "add constraint fk_energy\n"

. "FOREIGN key (energy) REFERENCES energy_types(energy)";
$sql_drop_restraint = "alter table okaymon drop CONSTRAINT fk_energy";

$connection = mysqli_connect($db_servername,$db_username,$db_password,$db_name);
if(!$connection){
    throw new Exception("Error: mysqli_connect:  Database connection failed.");
}else{
   //Create db
    mysqli_query($connection,$sql_drop_okaymon);
    mysqli_query($connection,$sql_drop_energy);
    mysqli_query($connection,$sql_create_okaymon);
    mysqli_query($connection,$sql_create_energy);
    mysqli_query($connection,$sql_create_constraint);
    mysqli_query($connection,$sql_drop_restraint);
    echo "Database has been reset";

}

mysqli_close($connection);

?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="index.css">

<title>Reference to all links for assignment</title>
</head>

<body>
    <li><a href="index.php">Index</a></li>
    <li><a href="https://php.radford.edu/~itec325/2020spring-ibarland/Homeworks/db/db.html">Assignment Page</a></li>
    <li><a href="okaymon-form.php">Okaymon Form</a></li>
    <li><a href="reset-database.php">Reset Database</a></li>
    <li><a href="okaymon-handle-test-1.php">Okaymon Test 1</a></li>
    <li><a href="okaymon-handle-test-5.php">Okaymon Test 2</a></li>
    <li><a href="okaymon-handle-test-6.php">Okaymon Test 3</a></li>
</body>
