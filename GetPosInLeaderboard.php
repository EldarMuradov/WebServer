<?php
    
require 'ConnectionSettings.php';
$i=1;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}
if($_REQUEST["username"])
{
	$sql = "SELECT username, score FROM users ORDER BY score DESC";
    $result = $conn->query($sql);
    if(!empty($result) && $result->num_rows > 0)
    {
		while($row = $result->fetch_assoc())
		{
			if($_REQUEST["username"] == $row["username"])
				echo "You are on the " .$i . " position!";
			$i++;
		}
	}
}
    $conn->close();

?>