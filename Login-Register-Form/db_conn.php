<?php

$host= "localhost";
$uname= "root";
$password = "";

$db_name = "test_db";

$conn = mysqli_connect($host, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}