<!DOCTYPE html>
<html>
<style>
	.center{
		display: flex;
  		justify-content: center;
  		align-items: center;
	}
</style>
<head>
	<title>Student ID System</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<h3 style="text-align: center; font-family: Century Gothic;">Student Information</h3>

<form action="studentinfo.php" method="GET" style="text-align: center; font-family: Century Gothic;">
First Name:  <input type="text" name="fname"><br>
Last Name: <input type = "text" name="lname"><br>
Middle Initial: <input type="text" name="initial" maxlength="1"><br>
ID Number: <input type="text" name="IDNumber" maxlength="11"> <br>

 Department: <input type="radio" name="gg" value="CITCS" checked ="checked"> CITCS  <input type="radio" name="gg" value="CEA"> CEA  <input type="radio" name="gg" value="COA"> COA <input type="radio" name="gg" value="CAS"> CAS <br>
 
Course: <select name = "course">
<option selected="selected">BSIT</option>
<option>BSCS</option>
<option>BSDA</option>
<option>BSFS</option>
<option>BSCRIM</option>
<option>BSED</option>
</select> <br>

Year Level: <select name = "Year">
<option selected="selected">1</option>
<option>2</option>
<option>3</option>
</select> 

<br>
Birthdate: <input type="date" name="Birthdate"> <br>
Address: <input type="text" name="Address"> <br>

<h4>Guardian Information:</h4>
Guardian Name: <input type="text" name="Guardian"> <br>
Guardian Contact Number: <input type="text" name="GuardianNum" maxlength="11"><br>

<br> <input type="submit" name="submit">

</form>

</body>
</html>