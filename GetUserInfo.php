<?php
    
require 'ConnectionSettings.php';
$kd;
$rank;

if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}

if($_REQUEST["username"])
{

$sql = "SELECT ROW_NUMBER() OVER(ORDER BY score DESC) row_num, id, score, level, kills, deaths FROM users WHERE username = ?";
//$result = $conn->query($sql);

    $statement = $conn->prepare($sql);
    $statement->bind_param("s", $_REQUEST["username"]);
    $statement->execute();
    $result = $statement->get_result();
if(!empty($result) && $result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		if($row["kills"] == 0)
				$kd = 0;
			else if($row["deaths"] == 0)
				$kd = $row["kills"];
			else
			$kd = $row["kills"] / $row["deaths"];

		if($row["score"] < 0)
			$rank = "LOSER";
		else if($row["score"] < 300 && $row["score"] >= 0)
			$rank = "NEWBITE";
		else if($row["score"] < 700 && $row["score"] >= 300)
			$rank = "SILVER";
		else if($row["score"] < 1200 && $row["score"] >= 700)
			$rank = "LUCKY";
		else if($row["score"] < 1700 && $row["score"] >= 1200)
			$rank = "GOLD";
		else if($row["score"] < 2200 && $row["score"] >= 1700)
			$rank = "HUNTER";
		else if($row["score"] < 2700 && $row["score"] >= 2200)
			$rank = "WARRIOR";
		else if($row["score"] < 3200 && $row["score"] >= 2700)
			$rank = "DOMINATOR";
		else if($row["score"] >= 3200 && $row["row_num"] > 100)
			$rank = "MASTER";
		else if($row["score"] >= 3200 && $row["row_num"] <= 100)
			$rank = "GRANDMASTER";

		echo  $rank . "<br>" . "ID: " .$row["id"]."<br>" . "SCORE: " . $row["score"] . "<br>" ."LEVEL: " . $row["level"] . "<br>" . "K/D: " . round($kd, 2) . "<br>";
	} 
} 
else
{
    echo "Fatal error";
}

}
$conn->close();

?>
