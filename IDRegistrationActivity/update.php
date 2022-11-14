<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
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
            // Update the record
        $stmt = $pdo->prepare('UPDATE contacts SET id_num = ?, fname = ?, mname = ?, lname = ?, address = ?, birthdate = ?, department = ?, course = ?, year = ?, guardian_name = ?, guardian_num = ?, WHERE id = ?');
        $stmt->execute([$id, $id_num, $fname, $mname, $lname, $address, $birthdate, $department, $course, $year, $guardian_name, $guardian_num, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM student_rec WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>

<div class="content update">
    <h2>Update Contact #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
         <label for="id">ID</label>
        <input type="text" name="id" placeholder="auto"  id="id">

        <label for="id_num">ID Number</label>
        <input type="text" name="id_num" placeholder="12-34567-899" id="id_num">

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
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>