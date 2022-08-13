<?php
    
require 'ConnectionSettings.php';
$tname;
$uname;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["teamname"] && $_REQUEST["username"])
{
	$tname = $_REQUEST["teamname"];
	$uname = $_REQUEST["username"];
	$sql = "INSERT INTO teams(teamname, auserId, leaderId) VALUES(?, ?, ?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param("sss", $tname, $uname, $uname);
    $statement->execute();
    $result = $statement->get_result();

    $sql1 = "SELECT id FROM teams WHERE teamname = ?";
    $statement1 = $conn->prepare($sql1);
    $statement1->bind_param("s", $tname);
    $statement1->execute();
    $result1 = $statement1->get_result();
    if(!empty($result1) && $result1->num_rows > 0)
	{
		while($row = $result1->fetch_assoc())
		{
			echo $row["id"];
		} 
	} 
	else
	{
    	echo "0";
	}
}
else
{
    echo "0";
}

$conn->close();

?>
