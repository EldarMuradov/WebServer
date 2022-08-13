<?php
    
require 'ConnectionSettings.php';

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["username"])
{

$sql = "SELECT currence FROM users WHERE username = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("s", $_REQUEST["username"]);
    $statement->execute();
    $result = $statement->get_result();
//$result = $conn->query($sql);
if(!empty($result) && $result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		
		echo  $row["currence"];
	} 
} 
else
{
    echo "Fatal error";
}
$conn->close();
}


?>
