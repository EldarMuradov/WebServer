<?php
    
require 'ConnectionSettings.php';

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["username"] && $_REQUEST["password"] && $_REQUEST["email"]) 
{
	$sql = "SELECT password, username, email FROM users WHERE username = ?";
    //$result = $conn->query($sql);
    $statement = $conn->prepare($sql);
    $statement->bind_param("s", $_REQUEST["username"]);
    $statement->execute();
    $result = $statement->get_result();
    if(!empty($result) && $result->num_rows > 0)
    {
	while($row = $result->fetch_assoc())
	{
		echo "Username is already exist.";
	}
    } else {
	    $sql2 = "INSERT INTO users(username, password, level, currence, email) VALUES (?, ?, 1, 0, ?)";
	    $statement = $conn->prepare($sql);
    	$statement->bind_param("sss", $_REQUEST["username"], $_REQUEST["password"], $_REQUEST["email"]);
    	$statement->execute();
    	$result2 = $statement->get_result();
	    //$result2 = $conn->query($sql2);
	    echo "Register Success";
    } 
    $conn->close();
}

?>
