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
		echo "Username is already exist.";
	}
    } else {
	    $sql2 = "INSERT INTO users(username, password, level, currence, email) VALUES ('" . $_REQUEST["username"] . "', '" .$_REQUEST["password"] ."',1,0,'" . $_REQUEST["email"] . "')";
	    $result2 = $conn->query($sql2);
	    echo "Register Success";
    } 
    $conn->close();
}

?>
