<?php
    
require 'ConnectionSettings.php';
$uid;
$iid;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["userId"] && $_REQUEST["itemId"])
{
	$uid = $_REQUEST["userId"];
	$iid = $_REQUEST["itemId"];
	$sql = "DELETE FROM usersitems WHERE userId = '$uid' and itemId = '$iid'";
	$result = $conn->query($sql);
	if(!empty($result) && $result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "Success";
		} 
	} 
	else
	{
    	echo "0";
	}
}

$conn->close();

?>
