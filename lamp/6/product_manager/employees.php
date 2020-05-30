<?php
require_once 'Database.php';
$db = new Database();
$conn = $db->connect();

$sql = "SELECT * FROM `employees` JOIN `offices` ON `employees`.`officeCode`=`offices`.`officeCode`";
$employees = $conn->query($sql)->fetchAll();
?>
<h2>Employees</h2>
<table>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Office City</th>
        <th>Office Country</th>
    </tr>
    <?php foreach($employees as $employee):?>
    <tr>
        <td><?=$employee['firstName']?></td>
        <td><?=$employee['lastName']?></td>
        <td><?=$employee['email']?></td>
        <td><?=$employee['city']?></td>
        <td><?=$employee['country']?></td>
    </tr>
    <?php endforeach; ?>
</table>
