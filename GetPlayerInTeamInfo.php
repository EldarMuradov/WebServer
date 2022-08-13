<?php
    
require 'ConnectionSettings.php';
$l;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["teamId"])
{
$sql = "SELECT auserId, buserId, cuserId, duserId, leaderId from teams WHERE id = '" .$_REQUEST["teamId"] . "'";
$result = $conn->query($sql);
if(!empty($result) && $result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		$l = $row["leaderId"];
		echo $l . " ";
		if($row["auserId"] != null)
		{
			$sql2 = "SELECT id, username, score FROM users WHERE id = '" . $row["auserId"] . "'";
    		$result2 = $conn->query($sql2);
	    	if(!empty($result2) && $result2->num_rows > 0)
			{
				while($row1 = $result2->fetch_assoc())
				{
					echo $row1["username"] . " " . "Score:" . $row1["score"] . " " . "Id:" . $row1["id"] . " ";
				}
			}
		}
		if($row["buserId"] != null)
		{
			$sql3 = "SELECT id, username, score FROM users WHERE id = '" . $row["buserId"] . "'";
    		$result3 = $conn->query($sql3);
	    	//echo "Success";
	        if(!empty($result3) && $result3->num_rows > 0)
			{
				while($row2 = $result3->fetch_assoc())
				{
					echo $row2["username"] . " " . "Score:" . $row2["score"] . " " . "Id:" . $row2["id"] . " ";
				}
			}
		}
		if($row["cuserId"] != null)
		{
			$sql4 = "SELECT id, username, score FROM users WHERE id = '" . $row["cuserId"] . "'";
    		$result4 = $conn->query($sql4);
	    	//echo "Success";
	    	if(!empty($result4) && $result4->num_rows > 0)
			{
				while($row3 = $result4->fetch_assoc())
				{
					echo $row3["username"] . " " . "Score:" . $row3["score"] . " " . "Id:" . $row3["id"] . " ";
				}
			}
		}
		if($row["duserId"] != null)
		{
			$sql5 = "SELECT id, username, score FROM users WHERE id = '" . $row["duserId"] . "'";
    		$result5 = $conn->query($sql5);
	    	//echo "Success";
	    	if(!empty($result5) && $result5->num_rows > 0)
			{
				while($row4 = $result5->fetch_assoc())
				{
					echo $row4["username"] . " " . "Score:" . $row4["score"] . " " . "Id:" . $row4["id"] . " ";
				}
			}	    	
		}
	}
} 
else
{
    echo "0";
}
}
$conn->close();


?>
