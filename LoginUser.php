<?php
    
require 'ConnectionSettings.php';

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["username"] && $_REQUEST["password"] && $_REQUEST["email"]) 
{

	//$sql = "SELECT password, email, id FROM users WHERE username = '" . $_REQUEST["username"] . "'";
    //$result = $conn->query($sql);

    $sql = "SELECT password, email, id FROM users WHERE username = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("s", $_REQUEST["username"]);
    $statement->execute();
    $result = $statement->get_result();


    if(!empty($result) && $result->num_rows > 0)
    {
	while($row = $result->fetch_assoc())
	{
		if($_REQUEST["password"] == $row["password"] && $_REQUEST["email"] == $row["email"] )
		{
			echo $row["id"];
		} else {
			echo "Login failed";
		}
	}
    } else {
	    echo "Username doesn't exist";
    } 
    $conn->close();
    //echo "Recieved ". $_REQUEST["username"] . " password " .$_REQUEST["password"] . " success!";
}

?>