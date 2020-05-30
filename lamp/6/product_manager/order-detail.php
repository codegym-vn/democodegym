<?php
require_once 'Database.php';
$db = new Database();
$conn = $db->connect();

$orderNumber = $_GET['id'];

$sql = "SELECT * FROM `orderdetails` JOIN `products` ON `orderdetails`.`productCode`=`products`.`productCode` WHERE `orderdetails`.`orderNumber`=$orderNumber";

$orderDetails = $conn->query($sql)->fetchAll();
?>
<h2>Order details</h2>
<table>
    <tr>
        <th>Product name</th>
        <th>Quantity ordered</th>
        <th>Price each</th>
    </tr>
    <?php foreach($orderDetails as $orderDetail):?>
        <tr>
            <td><?=$orderDetail['productName']?></td>
            <td><?=$orderDetail['quantityOrdered']?></td>
            <td><?=$orderDetail['priceEach']?></td>
        </tr>
    <?php endforeach; ?>
</table>
