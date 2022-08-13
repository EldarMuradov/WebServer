<?php
    
require 'ConnectionSettings.php';

$kd;
$rank;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["userId"] && $_REQUEST["itemId"])
{
$sql = "INSERT INTO usersitems(userId, itemId) VALUES ('" . $_REQUEST["userId"] . "', '" . $_REQUEST["itemId"] . "')";
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
