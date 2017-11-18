<?php
error_reporting(0);
//session_id('mySessionID');
//session_start();
//$siteurl = "http://localhost/iwaykidz_theme/";
$servername = "localhost";
$username = "root";
$password = "";
$database="bar_application";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>