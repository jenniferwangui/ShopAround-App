<?php

$dbname="mytest1";
$dbuser="root";
$dbpass="";
$dbhost="localhost";


$dbc = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die(mysqli_error($dbc));

?>

