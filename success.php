<?php 
// Include configuration file 
include_once 'config.php'; 
 
// Include database connection file 
include_once 'connect/db.php'; 
 
// If transaction data is available in the URL 
if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
    // Get transaction information from URL 
    $item_number = $_GET['item_number'];  
    $txn_id = $_GET['tx']; 
    $payment_gross = $_GET['amt']; 
    $currency_code = $_GET['cc']; 
    $payment_status = $_GET['st']; 
     
    // Get product info from the database 
    $productResult = mysqli_query($dbc,"SELECT * FROM images WHERE img_id = ".$item_number); 
    $productRow = mysqli_fetch_assoc($productResult); 
     
    // Check if transaction data exists with the same TXN ID. 
    $prevPaymentResult = mysqli_query($dbc,"SELECT * FROM payments WHERE txn_id = '".$txn_id."'"); 
 
    if(mysqli_num_rows($prevPaymentResult) > 0){ 
        $paymentRow = mysqli_fetch_assoc($prevPaymentResult); 
        $payment_id = $paymentRow['payment_id']; 
        $payment_gross = $paymentRow['payment_gross']; 
        $payment_status = $paymentRow['payment_status']; 
    }else{ 
        // Insert tansaction data into the database
        $q = mysqli_query($dbc,"INSERT INTO payments(order_id,txn_id,payment_gross,currency_code,payment_status) VALUES('$item_number','$txn_id','$payment_gross','$currency_code','$payment_status')"); 
        $payment_id = mysqli_insert_id($dbc); 
    } 
} 
?>

<div class="container">
    <div class="status">
        <?php if(!empty($payment_id)){ ?>
            <h1 class="success">Your Payment has been Successful</h1>
			
            <h4>Payment Information</h4>
            <p><b>Reference Number:</b> <?php echo $payment_id; ?></p>
            <p><b>Transaction ID:</b> <?php echo $txn_id; ?></p>
            <p><b>Paid Amount:</b> <?php echo $payment_gross; ?></p>
            <p><b>Payment Status:</b> <?php echo $payment_status; ?></p>
			
            <h4>Product Information</h4>
            <p><b>Name:</b> <?php echo $productRow['name']; ?></p>
            <p><b>Price:</b> <?php echo $productRow['price']; ?></p>
        <?php }else{ ?>
            <h1 class="error">Your Payment has Failed</h1>
        <?php } ?>
    </div>
    <a href="index.php" class="btn-link">Back to Products</a>
</div>