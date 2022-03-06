<?php
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unitybackenddb";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["username"] && $_REQUEST["password"] && $_REQUEST["email"]) 
{
	$sql = "SELECT password, username, email FROM users WHERE username = '" . $_REQUEST["username"] . "'";
    $result = $conn->query($sql);
    if(!empty($result) && $result->num_rows > 0)
    {
	while($row = $result->fetch_assoc())
	{
		if($_REQUEST["password"] == $row["password"] && $_REQUEST["email"] == $row["email"] )
		{
			echo "Login Success";
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