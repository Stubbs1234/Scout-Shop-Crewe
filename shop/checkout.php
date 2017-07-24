<?php
session_start();
?>
<html>
<head>   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
    </head>
    <body>
        <div class="container">
       <div class="page-header">
    <h1>Order</h1>
    </div>
       <div class="jumbotron">
<?php
               require '../vendor/autoload.php';
    use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseException;
use Parse\ParseCloud;
use Parse\ParseClient;
           ParseClient::initialize( '5uHe6i4aZsLeX0XScouI6lHiPQ2nMeWkzieKMgj7', "nqsbSHJzuznLFiBbZp4Ox2XxCRBdJWYmk57VNGRI", 'yNXW96DeR6oU35QWJL3KKzsMenHhCsUKx2txNkQp' );
ParseClient::setServerURL('https://parseapi.back4app.com', '/');
           global $order_id;
# Set page title and display header section.
$page_title = 'Checkout' ;
$length = 5;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
         $end = "SGOL-".$randomString;
# Check for passed total and cart.
if ( isset( $_SESSION['total']) && isset($_POST['select']) && ( $_SESSION['total'] > 0 ) && (!empty($_SESSION['cart']) ) )
{
  # Open database connection.
  /*echo $_POST['name'];
    echo $_POST['phonenumber'];
    echo $_POST['email'];
    echo $_POST['paid'];
    echo $_POST['select'];*/
  
    $customer = new ParseObject("customer");
$id = uniqid(true);
$customer->set("id", $id);
$customer->set("name", $_POST['name']);
$customer->set("phonenumber", $_POST['phonenumber']);
$customer->set("email", $_POST['email']);
$customer->set("paid", $_POST['paid']);
$customer->set("group", $_POST['select']);

try {
  $customer->save();
} catch (ParseException $ex) {  
  // Execute any logic that should take place if the save fails.
  // error is a ParseException object with an error code and message.
  echo 'Failed to create new object, with error message: ' . $ex->getMessage();
}
  
    # Store buyer and order total in 'orders' database table.
      $orderCont = new ParseObject("orderC");

$orderCont->set("order_id", $end);
$orderCont->set("name", $_POST['name']);
$orderCont->setAssociativeArray("items", $_SESSION['cart']);
//$orderCont->set("phonenumber", $_SESSION['total']);
    $orderCont->set("customer_id", $id);
try {
  $orderCont->save();
} catch (ParseException $ex) {  
  // Execute any logic that should take place if the save fails.
  // error is a ParseException object with an error code and message.
  echo 'Failed to create new object, with error message: ' . $ex->getMessage();
}


  # Display order number.
  echo "<p>Order Number Is #".$end."</p>";
    echo "<a href='empty.php' class='btn btn-success'>Finish</a>";

  # Remove cart items.  
 // $_SESSION['cart'] = NULL ;
     //$_SESSION['total'] = NULL ;
}
# Or display a message.
else { echo '<p>There are no items in your cart.</p>' ; }
?>
            </div>
          </body>
          </html>