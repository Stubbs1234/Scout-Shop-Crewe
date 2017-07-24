<html>
    <head>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
    </head>
<body>
        <div id="container">
<div class="page-header">
<h1>Scout Shop Crewe</h1>
    <a href='../main.html' class='btn btn-info'>Home</a><a href='logout.html' class='btn btn-warning'>Logout</a>
    </div>
    <div class="jumbotron">
<?php 

 require '../vendor/autoload.php';
     use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseClient;

  ParseClient::initialize( '5uHe6i4aZsLeX0XScouI6lHiPQ2nMeWkzieKMgj7', "nqsbSHJzuznLFiBbZp4Ox2XxCRBdJWYmk57VNGRI", 'yNXW96DeR6oU35QWJL3KKzsMenHhCsUKx2txNkQp' );
ParseClient::setServerURL('https://parseapi.back4app.com', '/');
//$arr = new array();
echo '<table class="table table-striped" border="1"><tr><th></th><th>Customer Name</th><th>Product Name</th><th>Quantity</th><th>Product Price</th><th>Size</th>';
            $query = new ParseQuery("orderC");
     //$query->equalTo("order_id", "Alex Stubbs");
$results = $query->find();
for ($i = 0; $i < count($results); $i++)
{
     $object = $results[$i];
$arr = $object->get('items');
    echo '<tr><td><input type="checkbox" class="chkNumber" value="'.$object->get('order_id').'"/></td><td> <strong>' .$object->get('order_id').'</td>';
    foreach($arr as $id => $value) {
    echo '<td> <strong>' .$arr[$id]['name'].'</td>
        <td> <strong>'.$arr[$id]['quantity'].'</td>
        <td> <strong>'.$arr[$id]['price'].'</td>
        <td> <strong>'.$arr[$id]['size'].'</td></tr>';
}
}  
//echo '<table class="table table-striped" border="1"><tr>';
/*foreach($arr as $id => $value) {
 
    echo '<td> <strong>' .$arr[$id]['name'].'</td>
        <td> <strong>'.$arr[$id]['quantity'].'</td>
        <td> <strong>'.$arr[$id]['price'].'</td>
        <td> <strong>'.$arr[$id]['size'].'</td>';
}*/
echo '</tr> </table>';
?>
        <br><div id="buttonShow"> 
    <input type="button" class="btnGetAll" value="More"/>
    </div>
    <div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
		<p>Please select an option</p>
		<input type="radio" name="share" value="paid1">Phoned<br>
        <input type="radio" name="share" value="newMonth"><br>
		<input type="submit" id="go" value="Go"/>
	</div>
        <script type="text/javascript">
        $('.btnGetAll').click(function () {
        if ($('.chkNumber:checked').length) {
          var chkId = '';
          $('.chkNumber:checked').each(function () {
            chkId += $(this).val() + ",";
          });
          chkId = chkId.slice(0, -1);
          OBJECT = chkId
          window.location="#openModal";
        }
        else {
          alert('Nothing Selected');
        }
      });

      $('.chkSelectAll').click(function () {
        $('.chkNumber').prop('checked', $(this).is(':checked'));
      });

      $('.chkNumber').click(function () {
        if ($('.chkNumber:checked').length == $('.chkNumber').length) {
          $('.chkSelectAll').prop('checked', true);
        }
        else {
          $('.chkSelectAll').prop('checked', false);
        }
      });
      $('#go').click(function () { 
      var selectedVal = "";
var selected = $("input[type='radio'][name='share']:checked");
if (selected.length > 0) {
    selectedVal = selected.val();
}
if (selectedVal == "paid1") {
 
} else if (selectedVal == "newMonth") {
    
} });
        
        
        </script>
        </div>
        </body>
</html>
