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
	$sql = "SELECT auserId, buserId, cuserId, duserId, leaderId from teams WHERE id = '" .$_REQUEST["teamId"] . "'";
	$result = $conn->query($sql);
	if(!empty($result) && $result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{

			if($row["auserId"] == $id)
			{
				$sql2 = "UPDATE teams SET auserId = null WHERE id = '" .$_REQUEST["teamId"] . "'";
    			$result2 = $conn->query($sql2);
	    		echo "Success";
			}
			if($row["buserId"] == $id && $row["auserId"] != $id)
			{
				$sql2 = "UPDATE teams SET buserId = null WHERE id = '" .$_REQUEST["teamId"] . "'";
    			$result2 = $conn->query($sql2);
	    		echo "Success";
			}
			else if($row["cuserId"] == $id && $row["buserId"] != $id && $row["auserId"] != $id)
			{
				$sql2 = "UPDATE teams SET cuserId = null WHERE id = '" .$_REQUEST["teamId"] . "'";
    			$result2 = $conn->query($sql2);
	    		echo "Success";
			}
			else if($row["duserId"] == $id && $row["cuserId"] != $id && $row["buserId"] != $id && $row["auserId"] != $id)
			{
				$sql2 = "UPDATE teams SET duserId = null WHERE id = '" .$_REQUEST["teamId"] . "'";
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
