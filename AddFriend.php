<?php
    
require 'ConnectionSettings.php';
$f;
$s;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["fuserId"] && $_REQUEST["suserId"])
{
	$f = $_REQUEST["fuserId"];
	$s = $_REQUEST["suserId"];

	$sql = "INSERT INTO friends(fuserId, suserId) VALUES('$f', '$s')";
	
	$result = $conn->query($sql);
	//if(!empty($result) && $result->num_rows > 0)
	//{
	//	while($row = $result->fetch_assoc())
	//	{

	//	}
			
	//}
}
else
{
    echo "0";
}

$conn->close();

?>
