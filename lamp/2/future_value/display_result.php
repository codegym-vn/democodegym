<?php

$investment = $_POST['investment'];
$rate = $_POST['rate'];
$years = $_POST['years'];

if(empty($investment)){
    $error_message = 'Investment is a required field';
} else if (!is_numeric($investment)){
    $error_message = 'Investment must be a number';
} else if($investment < 0) {
    $error_message = 'Investment must be greater than zero';
} else if(empty($rate)){
    $error_message = 'Rate is a required field';
} else if (!is_numeric($rate)){
    $error_message = 'Rate must be a number';
} else if($rate < 0) {
    $error_message = 'Rate must be greater than zero';
} else if(empty($years)){
    $error_message = 'Number of years is a required field';
} else if (!is_numeric($years)){
    $error_message = 'Number of years must be a number';
} else if($years < 0) {
    $error_message = 'Number of years must be greater than zero';
} else {
    $error_message = '';
}

if($error_message !== ''){
    include "index.php";
    exit();
}

$future_value = $investment;
for ($i = 0; $i < $years; $i++){
    $future_value = ($future_value + ($future_value * $rate * 0.01));
}
?>
<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
<head>
    <title>Future Value Calculator</title>
</head>
<body>
    <div id="content">
        <h1>Future Value Calculator</h1>

        <label>Investment Amount: </label>
        <span>$<?php echo $investment; ?></span> <br/>

        <label>Yearly Interest Rate: </label>
        <span><?php echo $rate; ?>% </span> <br/>

        <label>Number of Years: </label>
        <span><?php echo $years; ?></span> <br/>


        <label>Future Value: </label>
        <span>$<?php echo $future_value; ?></span> <br/>
    </div>
</body>
</html>
