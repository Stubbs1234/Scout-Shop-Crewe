<?php
require '../vendor/autoload.php';
     use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseClient;
# Set page title and display header section.
$page_title = 'Checkout' ;

# Check for passed total and cart.
if ( isset( $_SESSION['code']) && isset($_SESSION['des']) && ($_SESSION['other']))
{
  # Open database connection.
    ParseClient::initialize( '5uHe6i4aZsLeX0XScouI6lHiPQ2nMeWkzieKMgj7', "nqsbSHJzuznLFiBbZp4Ox2XxCRBdJWYmk57VNGRI", 'yNXW96DeR6oU35QWJL3KKzsMenHhCsUKx2txNkQp' );
ParseClient::setServerURL('https://parseapi.back4app.com', '/');
  $gameScore = new ParseObject("orderOther");

$gameScore->set("code", $_SESSION['code']);
$gameScore->set("des", $_SESSION['des']);
$gameScore->set("other", $_SESSION['other']);

try {
  $gameScore->save();
  echo 'New object created with objectId: ' . $gameScore->getObjectId();
} catch (ParseException $ex) {  
  // Execute any logic that should take place if the save fails.
  // error is a ParseException object with an error code and message.
  echo 'Failed to create new object, with error message: ' . $ex->getMessage();
}

  # Display order number.
  //echo "<p>Order Number Is #".$order_num."</p>";
    //echo "<a href='check.php' class='btn btn-success'>Finish</a>";

  # Remove cart items.  
 // $_SESSION['cart'] = NULL ;
     //$_SESSION['total'] = NULL ;
}
# Or display a message.
else { echo '<p>There are no items in your cart.</p>' ; }
?>