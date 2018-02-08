<?php

$dbserveraddr = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "spice_angadi";

$dbcnx = mysql_connect($dbserveraddr,$dbuser,$dbpassword);
if(!$dbcnx){
    echo "Error connecting to MySQL.".mysql_error();
    exit();
}

if(!mysql_select_db($dbname)){
    echo "Error connecting to MySQL Database.".mysql_error();
    exit();
}

?>