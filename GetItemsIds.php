<?php
    
require 'ConnectionSettings.php';
$kd;
$rank;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id FROM items";
$result = $conn->query($sql);
if(!empty($result) && $result->num_rows > 0)
{
	$rows = array();
	while($row = $result->fetch_assoc())
	{
		$rows[] = $row;
	} 
	echo json_encode($rows);
} 
else
{
    echo "0";
}

$conn->close();

?>
