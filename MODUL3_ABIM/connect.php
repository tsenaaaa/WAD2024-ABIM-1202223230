<?php

$host= "localhost";
$username="root";
$pass="";
$db="modul3";
$port= 3306;

$conn=mysqli_connect($host,$username,$pass,$db,$port);
if ($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}