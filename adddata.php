<?php
require 'dblogin.php';

$name = $_POST['name'];
$area = $_POST['area'];
$city = $_POST['city'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$type = $_POST['type'];
$description = $_POST['description'];

$connection = mysqli_connect('localhost', $username, $password);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($connection,"utf8");

$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_connect_error());
}

$query = "INSERT INTO markers VALUE ('', '". $name ."', '". $area ."', '". $city ."', '". $lat ."', '". $lng ."', '". $type ."','". $description ."')";
$result = mysqli_query($connection, $query);

if (!$result) {
  die('Invalid query: ' . mysqli_connect_error());
}else{
    echo 'successfull';
}

?>