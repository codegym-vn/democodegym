<?php
require_once 'Database.php';
$db = new Database();
$conn = $db->connect();

$sql = "SELECT * FROM `orders` JOIN `customers` ON `orders`.`customerNumber`=`customers`.`customerNumber`";
$orders = $conn->query($sql)->fetchAll();
?>
<h2>Orders</h2>
<table>
    <tr>
        <th>Order date</th>
        <th>Status</th>
        <th>Customer name</th>
        <th>Customer phone</th>
        <th>Customer country</th>
        <th>View detail</th>
    </tr>
    <?php foreach($orders as $order):?>
        <tr>
            <td><?=$order['orderDate']?></td>
            <td><?=$order['status']?></td>
            <td><?=$order['customerName']?></td>
            <td><?=$order['phone']?></td>
            <td><?=$order['country']?></td>
            <td><a href="index.php?page=order-detail&id=<?=$order['orderNumber']?>">View detail</a></td>
        </tr>
    <?php endforeach; ?>
</table>
