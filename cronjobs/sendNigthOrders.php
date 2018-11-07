<?php
include("../inc/database.php");
$to = 'alexstubbsduck@me.com';

$subject = 'New orders';
$from = "alexander.stubbs@icloud.com";
$headers = "From: ".$from."\r\n";
$headers .= "Reply-To: ".$from."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  $q = "SELECT 
        products.item_name,  
        SUM(order_contents.quantity) AS quantity, 
        order_contents.size,
        orders.unique_orderid,
        orders.status,
        orderStatus.status_name
        FROM orders 
        LEFT JOIN order_contents ON orders.order_id = order_contents.order_id 
        LEFT JOIN products ON order_contents.item_id = products.item_id
        LEFT JOIN orderStatus ON orders.status = orderStatus.status_number
        WHERE orders.status = '0'
        GROUP BY products.item_name";

  $r = mysqli_query ($mysqli, $q);
$date = date("D-d-m-Y");
$message = "<html><body>";
      $message .= "<h1>Scout Shop</h1>";
      $message .= "<p>Here are the orders that have been place tonight (".$date.")</p>";
      $message .= "<table width='100%' border='1px'><thead><tr><th>Product Name</th><th>Quantity</th><th>Size</th><th>Unique Order ID</th><th>Status</th></tr>";

  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
     $message .= "<tbody><tr><td>".$row['item_name']."</td><td>".$row['quantity']."</td><td>".$row['size']."</td><td>".$row['unique_orderid']."</td><td>".$row['status_name']."</td></tr>";
      $message .= "</tbody></table></body></html>";
      
  }

mail($to, $subject, $message, $headers);
