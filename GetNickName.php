<?php
    
require 'ConnectionSettings.php';
$id;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["id"])
{
	$id = $_REQUEST["id"];

	$sql = "SELECT username FROM users WHERE id = '$id'";
	
	$result = $conn->query($sql);
	if(!empty($result) && $result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo $row["username"];
		}
			
	}
}
else
{
    echo "0";
}

$conn->close();

?>
