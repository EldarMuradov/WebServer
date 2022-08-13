<?php
    
require 'ConnectionSettings.php';
$f;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["fuserId"])
{
	$f = $_REQUEST["fuserId"];

	$sql = "DELETE FROM invites WHERE fuserId = '$f'";
	
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
