<?php
    
require 'ConnectionSettings.php';
$f;
$s;
$n;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["fuserId"] && $_REQUEST["suserId"] && $_REQUEST["roomname"])
{
	$f = $_REQUEST["fuserId"];
	$s = $_REQUEST["suserId"];
	$n = $_REQUEST["roomname"];

	$sql = "INSERT INTO invites(fuserId, suserId, roomname) VALUES('$f', '$s', '$n')";
	
	$result = $conn->query($sql);
}
else
{
    echo "0";
}

$conn->close();

?>
