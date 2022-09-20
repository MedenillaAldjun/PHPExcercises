<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exercise 7</title>
</head>
<body>
<?php
        echo "<table>";
        for($row=1; $row <= 7; $row++) {
            echo "<tr>\n";
            for($col = 1; $col <= 7; $col++) {
                $x = $col * $row;
                echo "<td> $x </td>\n";   
            } echo "</tr>";
        } echo "</table>";
    ?>
</body>
</html>