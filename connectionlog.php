<?php
$sname = "localhost:3309";
$uname = "root";
$password = "";
$db_name = "intra";

$conn = mysqli_connect($sname,$uname,$password,$db_name);

if(!$conn){
    echo "connection failed";
}