<?php
    
require 'ConnectionSettings.php';
$rank;
$i=1;


if($conn->connect_error)
{ 
	die("Connection failed: " . $conn->connect_error);
}
//mysql_set_charset('utf8');
mb_internal_encoding("UTF-8");

	$sql = "SELECT username, score FROM users ORDER BY score DESC";
    $result = $conn->query($sql);
    if(!empty($result) && $result->num_rows > 0)
    {
		while($row = $result->fetch_assoc())
		{
		
			if($i < 11)
			{
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
			else if($row["score"] >= 3200 && $i>100)
				$rank = "MASTER";
			else if($row["score"] >= 3200 && $i <100)
				$rank = "GRANDMASTER";
			
			echo $i ."-". str_pad($row["username"], 16, " ", STR_PAD_RIGHT) . "   " . str_pad($rank, 11, " ", STR_PAD_RIGHT) . "   " . $row["score"] ."<br>";
			$i++; 
			
			}
		}
	}
    $conn->close();

?>