<?php
require 'dblogin.php';

session_start();

$area = $_SESSION['places'];
$locationtype[] = array();
$locationtype = $_SESSION['locationtype'];

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

$connection = mysqli_connect('localhost', $username, $password);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($connection,"utf8");

$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_connect_error());
}

$query = "SELECT * FROM markers WHERE (type = '". $locationtype[0] ."' OR type = '".$locationtype[1]."' OR type = '". $locationtype[2] ."' OR type = '". $locationtype[3] ."' OR type = '". $locationtype[4] ."' OR type = '". $locationtype[5] ."') AND area LIKE '". $area ."'";
$result = mysqli_query($connection, $query);

header("Content-type: text/xml");
if(!empty($area)){
    echo '<markers>';

    while ($row = @mysqli_fetch_assoc($result)){
  echo '<marker ';
  echo 'id="' . $ind . '" ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'area="' . parseToXML($row['area']) . '" ';
  echo 'city="' . parseToXML($row['city']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['type'] . '" ';
  echo 'description="' . parseToXML($row['description']) . '" ';
  echo '/>';
    }
    echo '</markers>';
}
?>