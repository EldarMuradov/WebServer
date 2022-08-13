<?php
    
require 'ConnectionSettings.php';
$id;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["userId"] && $_REQUEST["teamId"])
{
	$id = $_REQUEST["userId"];
	$sql = "UPDATE teams SET leaderId = '$id' WHERE id = '" .$_REQUEST["teamId"] . "'";
	$result = $conn->query($sql);
	if(!empty($result) && $result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{

			echo "Success";
			
			
		}
	} 
}
else
{
    echo "0";
}

$conn->close();

?>
