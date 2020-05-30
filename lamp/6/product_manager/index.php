<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div id="content">
    <ul>
        <li><a href="index.php">Employees</a></li>
        <li><a href="index.php?page=orders">Orders</a></li>
    </ul>
    <?php
        $page = NULL;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        switch ($page){
            case 'orders':
                include "orders.php";
                break;
            case 'order-detail':
                include "order-detail.php";
                break;
            default:
                include 'employees.php';
        }
    ?>
</div>
</body>
</html>