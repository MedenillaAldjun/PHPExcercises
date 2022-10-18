<?php
if(!empty($_GET)){
    $student = [];
    $student['First_Name'] = $_GET['fname'];
    $student['Last_Name'] = $_GET['lname'];
    $student['Middle_Initial'] = $_GET['initial'];
    $student['ID_Number'] = $_GET['IDNumber'];


    $student['Department'] = $_GET['gg'];
    $student['Course'] = $_GET['course'];
    $student['Year_Level'] = $_GET['Year'];

    $student['Birthdate'] = $_GET['Birthdate'];
    $student['Address'] = $_GET['Address'];

    $student['Guardian_Name'] = $_GET['Guardian'];
    $student['Guardian_Contact_Number'] = $_GET['GuardianNum'];
    
    
    $studentArray = [];
    array_push($studentArray, $student);
    $str = print_r($studentArray, true);
    file_put_contents('students.txt', $str, FILE_APPEND);
}
?>

<h3>Form Submitted Successfully!</h3>