<?php
    
require 'ConnectionSettings.php';
$a;
$b;
$c;
$d;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, teamname, auserId, buserId, cuserId, duserId, leaderId FROM teams";
$result = $conn->query($sql);
if(!empty($result) && $result->num_rows > 0)
{

	while($row = $result->fetch_assoc())
	{
	$a = $row["auserId"];
	$b = $row["buserId"];
	$c = $row["cuserId"];
	$d = $row["duserId"];
	if($a == null)
		$a = 0;
	if($b == null)
		$b = 0;
	if($c == null)
		$c = 0;
	if($d == null)
		$d = 0;
		echo $row["id"] . " " . $row["teamname"] . " " . $a . " " . $b . " " . $c . " " . $d . " " . $row["leaderId"] . " ";	
	}
} 
else
{
    echo "0";
}

$conn->close();

?>
