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
	$sql = "SELECT auserId, buserId, cuserId, duserId from teams WHERE id = '" .$_REQUEST["teamId"] . "'";
	$result = $conn->query($sql);
	if(!empty($result) && $result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{

			if($row["buserId"] == null)
			{
				$sql2 = "UPDATE teams SET buserId = '$id' WHERE id = '" .$_REQUEST["teamId"] . "'";
    			$result2 = $conn->query($sql2);
	    		echo "Success";
			}
			else if($row["cuserId"] == null && $row["buserId"] != null)
			{
				$sql2 = "UPDATE teams SET cuserId = '$id' WHERE id = '" .$_REQUEST["teamId"] . "'";
    			$result2 = $conn->query($sql2);
	    		echo "Success";
			}
			else if($row["duserId"] == null && $row["cuserId"] != null && $row["buserId"] != null)
			{
				$sql2 = "UPDATE teams SET duserId = '$id' WHERE id = '" .$_REQUEST["teamId"] . "'";
    			$result2 = $conn->query($sql2);
	    		echo "Success";
			}
		}
	} 
}
else
{
    echo "0";
}

$conn->close();

?>
