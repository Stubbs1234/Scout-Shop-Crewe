<?php
ob_start();
session_start();
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <script src="http://npmcdn.com/parse/dist/parse.js"></script>
        <script src="size.js"></script>
    <script src="change.js"></script>
</head>
<body>
     <div class="container">
    <div class="page-header">
    <h1>New Order</h1>
        <div class="btn-toolbar">
         <a href="../main.html" class="btn btn-warning pull-right"/>Home</a>
         </div>
    </div>
        <div class="jumbotron">
<form action="" method="POST" class="form-horizontal" id="shopForm">
    <div class="form-group">
        <p>Scouts or Guides</p>
<select id="section" name="section" class="form-control">
<option value="default">Select </option> 
<option value="scouts">Scouts</option>
<option value="guides">Guides</option>
</select>
    </div>
     <div class="form-group">
        <p>Section</p>
<select id="sub-section" name="sub-section" class="form-control">

</select>
    </div>
    <div class="form-group">
         <p>Catagory</p>
<select id="catagoryName" name="catagoryName" class="form-control">
<option value="default">Select </option> 
<option value="uniform">Uniform</option>
<option value="badges">Badges</option>
<option value="pub">Pub</option>
<option value="nov">Nov</option>
<option value="non">Other</option>
</select><br>
 <input type="submit" name="submit" value="Search" class="btn btn-success"/> <input type="reset" id="reset" name="reset" value="Reset" class="btn btn-danger"/> <a href="cart.php" class="btn btn-info">Cart</a>
        </div>
</form>
<script type="text/javascript">
                  $("#section").change(function() {
    
    var el = $(this) ;
    
    if(el.val() === "scouts" ) {
         $("#sub-section option").remove() ;
    $("#sub-section").append("<option value='beavers'>Beavers</option>");
        $("#sub-section").append("<option value='cubs'>Cubs</option>");
        $("#sub-section").append("<option value='scouts'>Scouts</option>");
        $("#sub-section").append("<option value='explorers'>Explorers</option>");
        $("#sub-section").append("<option value='leader'>Leaders</option>");
         $("#sub-section").append("<option value='allsections'>All Sections (Badges Only)</option>");
        $("#sub-section").append("<option value='non'>Other</option>");
    }
      else if(el.val() === "guides" ) {
           $("#sub-section option").remove() ;
       $("#sub-section").append("<option value='rainbows'>Rainbows</option>");
      $("#sub-section").append("<option value='brownies'>Brownies</option>");
          $("#sub-section").append("<option value='guides'>Guides</option>");
          $("#sub-section").append("<option value='seniorsection'>Senior Section</option>");
          $("#sub-section").append("<option value='non'>Other</option>");
      }
  });
            </script>
 <div id="reedem">
<?php
     require '../vendor/autoload.php';
     use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseClient;
            $page_title = 'Shop';
if(isset($_POST['submit'])){
$selected_val = $_POST['section'];
$selected_val1 = $_POST['catagoryName'];
    $selected_val2 = $_POST['sub-section'];
    $_SESSION['table'] = $selected_val;
    $_SESSION['cat'] = $selected_val1;
    //getinfo();
}

     if ($selected_val2 && $selected_val1 == "non") {
         $host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'other.php';
header("Location: http://$host$uri/$extra");
 exit;
     } else {
         ParseClient::initialize( '5uHe6i4aZsLeX0XScouI6lHiPQ2nMeWkzieKMgj7', "nqsbSHJzuznLFiBbZp4Ox2XxCRBdJWYmk57VNGRI", 'yNXW96DeR6oU35QWJL3KKzsMenHhCsUKx2txNkQp' );
ParseClient::setServerURL('https://parseapi.back4app.com', '/');
 
            $query = new ParseQuery($selected_val);
$query->equalTo("section", $selected_val2);
     $query->equalTo("category", $selected_val1);
$results = $query->find();
echo '<table class="table table-striped" border="1"><tr>';
for ($i = 0; $i < count($results); $i++)
{
     $object = $results[$i];
echo '<td> <strong>' .$object->get('item_name').
'<br> <img src='.$object->get('item_png').' heigth="50" width="50" class="img-thumbnail" />
 <br>&pound'.$object->get('item_price').
'<br>
<button id="'.$object->get('item_id').'" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">Add Cart</button></td>';
}
echo '</tr> </table>';
     }
?>
    </div>
   </div>
        </div>
    <!--<a href="added.php?id='.$object->get('item_id').'&tableName='.$selected_val.'" class="btn btn-info">Add To Cart</a>-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="form-group">
            <label for="quantity" class="control-label">Quantity:</label>
      <input type="text" id="quantity" name="quantity" class="form-control"/>
        </div>
        <div class="form-group">    
        </div>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Size:</label>
        <select id="size" class="form-control">
            </select>    
        </div>
        <script type="text/javascript">
                    var options = [];
          var itemNAME = [];
            var itemID = "";
            var price ="";
            var name ="";
        $("button").click( function() {  
            itemID = this.id;
          var table = "<? echo $selected_val;?>";
             sessionStorage['table'] = table;
            Parse.initialize("5uHe6i4aZsLeX0XScouI6lHiPQ2nMeWkzieKMgj7", "wZH4mQq7uK1HpmgWI5lGCXTwDwrvJ8syTC01UGjN");
	 Parse.serverURL = 'https://parseapi.back4app.com';
    var GameScore = Parse.Object.extend(table);
var query = new Parse.Query(GameScore);
query.equalTo("item_id", itemID);
query.find({
  success: function(results) {
    for (var i = 0; i < results.length; i++) {
      var object = results[i];
      price = object.get('item_price');
        name = object.get('item_name');
         sessionStorage['name'] = name;
            sessionStorage['price'] = price;
        size();
    }
  },
  error: function(error) {
    alert("Error: " + error.code + " " + error.message);
  }
});
   sessionStorage['id'] = itemID;
        });      
            
function size() {
            console.log(name);   
if (name == "Youth's Scout Unisex Activity Shorts"){
                            options = ['Age 4','Age 5/6', 'Age 7/8', 'Age 9/10', 'Age 11/12', 'Age 13'];
                        } else if (name == "Youth's Scout Activity Trousers"){
                            options = ['Age 4','Age 5/6', 'Age 7/8', 'Age 9/10', 'Age 11/12', 'Age 13'];
                        }else if (name == "Beavers Polo Shirt") { 
                            options = ['22', '24', '26', '28', '30', '32', '34', '36'];
                        }else if (name == "Beavers Sweatshirt") { 
                            options = ['22', '24', '26', '28', '30', '32', '34', '36'];
                        } else if (name == "Cubs Sweatshirt") { 
                            options = ['22', '24', '26', '28', '30', '32', '34', '36'];
                        } else if (name == "Cubs Polo Shirt") { 
                            options = ['22', '24', '26', '28', '30', '32', '34', '36'];
                        } else if (name == "Scout L/S Blouse") {
                            options = ['XXS', 'XS',	'S', 'M', 'L', 'XL'];
                        } else if (name == "Scout L/S Shirt") {
                            options = ['XXS', 'XS',	'S', 'M', 'L', 'XL'];
                        }  else if (name == "Explorer L/S Shirt") {
                            options = ['XS', 'S', 'M', 'L',	'XL', 'XXL'];
                        }  else if (name == "Explorer S/S Shirt") {
                            options = ['XS', 'S', 'M', 'L',	'XL'];
                        }  else if (name == "Explorer L/S Blouse") {
                            options = ['XS', 'S', 'M', 'L', 'XL'];
                        }  else if (name == "Explorer Tipped Polo Shirts") {
                            options = ['34"', '36"', '38"',	'42"', '44"'];
                        }  else if (name == "Adult Unisex Tipped Polo Shirt") {
                            options = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'XXXXL'];
                        } else if (name == "Adult Men's S/S Shirt") {
                            options = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'XXXXL'];
                        } else if (name == "Adult Men's L/S Shirt") {
                            options = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'XXXXL'];
                        } else if (name == "Adult Ladies S/S Blouse") {
                            options = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL'];
                        }  else if (name == "Adult Ladies Scout L/S Blouse") {
                            options = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL'];
                        } else if (name == "Men's Scout Activity Trousers") {
                            options = ['30"', '32"', '34"', '36"', '38"', '40"', '42"', '44"', '46"', '48"', '50"', '52"', '54"', '56"', '58"', '60"'];
                        } else if (name == "Ladies Scout Activity Trousers") {
                            options = ['8', '10', '12', '14', '16', '18', '20', '22', '24', '26', '28', '30', '32', '34', '36'];
                        } else if (name == "Men's Scout Activity Shorts") {
                            options = ['30"', '32"', '34"', '36"', '38"', '40"', '42"', '44"', '46"', '48"', '50"', '52"', '54"', '56"', '58"', '60"'];
                        } else if (name == "Scout Slimline Uniform Belt and Buckle Set") {
                            options = ['S-M', 'M-L', 'L-XL', 'XL-XXL'];
                        } 
     console.log(options);

              var select = document.getElementById("size"); 

for(var i = 0; i < options.length; i++) {
    var opt = options[i];
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    select.appendChild(el);
}
        }
        </script>
        <div class="form-group">
           <button id="next" class="btn btn-info">Add Cart</button> 
        </div>
        <script type="text/javascript">
        $("#next").click( function() { 
           var quan = $('#quantity').val(); 
            var size = $('#size').val();
        console.log(sessionStorage['id']);
            var id = sessionStorage['id'];
            var table = sessionStorage['table'];
            var name23 = sessionStorage['name'];
            var price45 = sessionStorage['price'];
        window.location.href = "added.php?id="+id+"&n="+name23+"&s="+size+"&q="+quan+"&p="+price45;
        });
        </script>
    </div>
  </div>
</div>

</body>
</html>