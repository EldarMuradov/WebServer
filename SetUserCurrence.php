<?php
    
require 'ConnectionSettings.php';
$cost;
$un;
if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["username"] && $_REQUEST["cost"])
{
$cost = $_REQUEST["cost"];
$un = $_REQUEST["username"];

//$result = $conn->query($sql);
	$sql = "UPDATE users SET currence = currence - '$cost' WHERE username = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("s", $un);
    $statement->execute();
    $result = $statement->get_result();

if(!empty($result) && $result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		
		echo $row["currence"];
	} 
} 
else
{
    echo "Fatal error";
}
$conn->close();
}


?>
