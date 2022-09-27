<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exercise 2 - [Array]</title>
</head>
<body>
	<h2>Largest Cities</h2>
	<?php
		$largest = array("Tokyo", "Mexico City", "New York City", "Mumbai", "Seoul", "Shanghai", "Lagos", "Buenos Aires", "Cairo", "London");

		foreach($largest as $city){
			print "$city, ";
		}

		sort($largest);
		
		echo "<div><ul>";
		echo "<h3>First Entry: </h3>";
		foreach($largest as $city){
			echo "<br>".$city."</br>";
		}
		echo "</ul></div>";

		array_push($largest, "Los Angeles", "Calcutta", "Osaka", "Beijing");
		sort($largest);

		
		echo "<br>";
		echo "<div><ul>";
		echo "<h3>Second Entry: </h3>";
		foreach($largest as $city){
			echo "<br>".$city."</br>";
		}
		echo "<ul></div>";
	?>
</body>
</html>