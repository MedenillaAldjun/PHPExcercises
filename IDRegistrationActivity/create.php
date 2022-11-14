<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $id_num = isset($_POST['id_num']) ? $_POST['id_num'] : '';
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $mname = isset($_POST['mname']) ? $_POST['mname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : date('Y-m-d H:i:s');
    $department = isset($_POST['department']) ? $_POST['department'] : '';
    $course = isset($_POST['course']) ? $_POST['course'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';
    $guardian_name = isset($_POST['guardian_name']) ? $_POST['guardian_name'] : '';
    $guardian_num = isset($_POST['guardian_num']) ? $_POST['guardian_num'] : '';
    
    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO student_rec VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $id_num, $fname, $mname, $lname, $address, $birthdate, $department, $course, $year, $guardian_name, $guardian_num]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create')?>

<div class="content update">
    <h2>Create Student Record</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" value="auto"  id="id">

        <label for="id_num">ID Number</label>
        <input type="text" name="id_num" placeholder="12-3456-789"  id="id_num">

        <label for="fname">First Name</label>
        <input type="text" name="fname" placeholder="Aldjun" id="fname">

        <label for="mname">Middle Initial</label>
        <input type="text" name="mname" placeholder="R" id="mname">

        <label for="lname">Last Name</label>
        <input type="text" name="lname" placeholder="Medenilla" id="lname">

        <label for="address">Address</label>
        <input type="text" name="address" placeholder="Bakakeng Central, Baguio City" id="address">

        <label for="birthdate">Birthday</label>
        <input type="date" name="birthdate" value="<?=date('Y-m-d')?>" id="birthdate">

        <label for="department">Department</label>
        <input type="text" name="department" placeholder="CITCS" id="department">

        <label for="course">Course</label>
        <input type="text" name="course" placeholder="BSIT" id="course">

        <label for="year">Year level</label>
        <input type="text" name="year" placeholder="1" id="year">


        <label for="guardian_name">Guardian Name</label>
        <input type="text" name="guardian_name" placeholder="Jose Rizal" id="guardian_name">

        <label for="guardian_num">Guardian Contact Number</label>
        <input type="text" name="guardian_num" placeholder="09937612319" id="guardian_num">

        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>