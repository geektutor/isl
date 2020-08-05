<?php
$db_host = 'localhost'; // Server Name
$db_user = 'unilagco_isl'; // Username
$db_pass = 'mB&brq}n1(0N'; // Password
$db_name = 'unilagco_isl'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
