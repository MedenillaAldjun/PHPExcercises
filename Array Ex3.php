<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Array Exercise, Part 2</title>
</head>
<body>
<?php

$file = file('text.txt');

echo "<strong>Arrays in .txt:</strong>";
print"</br>";

foreach ($file as $line_num => $line) {
	print "$line</br>"; 
}
print"</br>";
?>

<?php
			echo "<strong>First Exercise:</strong>";
			print"</br>";
			echo "Test Data: ";
			print "$line</br>";
        $file = file_get_contents("text.txt");
		$array =  explode(",", $file);
		$dup = 0;

		$Arrays = array_count_values($array);

			foreach($Arrays as $x => $value) {
  				if($value > 1){
  					$dup++;
  				}
		}

		echo "Total number of duplicate elements found in the array is : $dup";  
?>

<?php
print"</br>";
print"</br>";
			echo "<strong>Second Exercise:</strong>";       
            echo "<br/>Test Data: ";
            print "$line</br>";

        $file = file_get_contents("text.txt");
		$array = explode(",", $file);
		$y = 0;

		$Arrays = array_count_values($array);

		echo "The frequency of all elements of an array : <br>";

			foreach($Arrays as $x => $value) {
  				echo "$x occured <strong>$value</strong> time(s) <br>";
		}

            
?>

<?php
print"</br>";
print"</br>";
			
			echo "<strong>Third Exercise:</strong>";		
            echo "<br/>Test Data: ";
            print "$line</br>";

        $file = file_get_contents("text.txt");
		$num = explode(",", $file);
		
		$evenNum = array();
		$oddNum = array();

		for($i=0;$i<count($num);$i++){
			if($num[$i]%2==0){
				$evenNum[$i]=$num[$i];
			}else{
				$oddNum[$i]=$num[$i];
			}
		}

		echo "The <strong>Even</strong> elements are : <br>";
		foreach ($evenNum as $x)
		echo "$x ";
		echo "<br>";

		echo "The <strong>Odd</strong> elements are : <br>";
		foreach ($oddNum as $x)
		echo "$x ";
		echo "<br>";
?>

</body>
</html>