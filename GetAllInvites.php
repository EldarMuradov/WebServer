<?php
    
require 'ConnectionSettings.php';
$s;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["suserId"])
{
	$s = $_REQUEST["suserId"];

	$sql = "SELECT fuserId, roomname FROM invites WHERE suserId = '$s'";
	
	$result = $conn->query($sql);
	if(!empty($result) && $result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo $row["fuserId"] . " " . $row["roomname"] . "/";
		}
			
	}
}
else
{
    echo "0";
}

$conn->close();

?>
