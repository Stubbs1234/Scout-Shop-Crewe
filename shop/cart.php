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
    <h1>Checkout (Cart)</h1>
    </div>
       <div class="jumbotron">
<?php
           require '../vendor/autoload.php';
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseClient;
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
  foreach ( $_POST['qty'] as $item_id => $item_qty )
  {
    # Ensure values are integers.
    $id = (int) $item_id;
    $qty = (int) $item_qty;

    # Change quantity or delete if zero.
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}

# Initialize grand total variable.
$total = 0; 

# Display the cart if not empty.
if (!empty($_SESSION['cart']))
{
  # Connect to the database.

ParseClient::initialize( '5uHe6i4aZsLeX0XScouI6lHiPQ2nMeWkzieKMgj7', "nqsbSHJzuznLFiBbZp4Ox2XxCRBdJWYmk57VNGRI", 'yNXW96DeR6oU35QWJL3KKzsMenHhCsUKx2txNkQp' );
// Users of Parse Server will need to point ParseClient at their remote URL and Mount Point:
ParseClient::setServerURL('https://parseapi.back4app.com', '/');
 
  echo '<form action="cart.php" method="post"><table class="table table-striped"><tr><th colspan="5">Items in your cart</th></tr>';
    //print_r($_SESSION['cart']);
    
    foreach ($_SESSION['cart'] as $id => $value) {
        $subtotal = $_SESSION['cart'][$id]['quantity'] * $_SESSION['cart'][$id]['price'];
    $total += $subtotal;
        
    echo "<tr><td>{$_SESSION['cart'][$id]['name']}</td><td>Size:{$_SESSION['cart'][$id]['size']}<td><input type=\"text\" size=\"3\" name=\"qty[{$_SESSION['cart'][$id]}]\" value=\"{$_SESSION['cart'][$id]['quantity']}\"></td><td>@ {$_SESSION['cart'][$id]['price']} = </td><td>".number_format ($subtotal, 2)."</td></tr>";}

  # Retrieve all items in the cart from the 'shop' database table.
  

    # Display the total.
  echo ' <tr><td colspan="5" style="text-align:right">Total = '.number_format($total,2).'</td></tr></table><input type="submit" name="submit" value="Update My Cart" class="btn btn-warning">';
   echo "<a href='details.html?total=".$total."' class='btn btn-success'>Checkout</a>
<input type='reset' value='Reset' class='btn btn-danger'></form>";
    $_SESSION['total'] = $total;
  
}
?>
       </div>
    </div>
    </body>
</html>