<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM student_rec ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$student_req = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_contacts = $pdo->query('SELECT COUNT(*) FROM student_rec')->fetchColumn();
?>

<?=template_header('Read')?>

<div class="content read">
	<h2>Read Student Records</h2>
	<a href="create.php" class="create-contact">Create Student ID</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>ID Number</td>
                <td>First Name</td>
                <td>Middle Initial</td>
                <td>Last Name</td>
                <td>Address</td>
                <td>Birthday</td>
                <td>Department</td>
                <td>Course</td>
                <td>Year Level</td>
                <td>Guardian Name</td>
                <td>Guardian Contact Number</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($student_req as $contact): ?>
            <tr>
                <td><?=$contact['id']?></td>
                <td><?=$contact['id_num']?></td>
                <td><?=$contact['fname']?></td>
                <td><?=$contact['mname']?></td>
                <td><?=$contact['lname']?></td>
                <td><?=$contact['address']?></td>
                <td><?=$contact['birthdate']?></td>
                <td><?=$contact['department']?></td>
                <td><?=$contact['course']?></td>
                <td><?=$contact['year']?></td>
                <td><?=$contact['guardian_name']?></td>
                <td><?=$contact['guardian_num']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$contact['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$contact['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>