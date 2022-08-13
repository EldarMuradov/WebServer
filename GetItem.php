<?php
    
require 'ConnectionSettings.php';

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["id"])
{
$sql = "SELECT name, description, price, id, skinId FROM items WHERE id = '" . $_REQUEST["id"] . "'";
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
}

$conn->close();

?>
