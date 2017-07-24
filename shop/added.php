<?php
ob_start();
session_start();
?>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="form-group">
            <label for="recipient-name" class="control-label">Quantity:</label>
      <input type="text" id="quantity" name="quantity" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Size:</label>
      <script type="text/javascript">
                          if ( == "Unisex Scout Activity Shorts"){}
            var select = document.getElementById("selectNumber"); 
var options = ["1", "2", "3", "4", "5"]; 

for(var i = 0; i < options.length; i++) {
    var opt = options[i];
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    select.appendChild(el);
}
            </script>
            <select id="size" class="form-control">
            <option 
            </select>
        </div>
    </div>
  </div>
</div>
<?php
$page_title='Cart Addition';

if(isset($_GET['id']) && ($_GET['q']) && ($_GET['s']) && ($_GET['n']) && ($_GET['p'])) $id = $_GET['id'];
if (isset($_SESSION['cart'][$id]))
{$_SESSION['cart'][$id]['quantity']++;
//echo "<p>Added".$row['item_name']."</p>";
echo '<script language="javascript">';
echo 'alert("'.$_GET['n'].' Added")';
echo '</script>';
 $host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'shop.php';
header("Location: http://$host$uri/$extra");
exit;
} else {
$_SESSION['cart'][$id]=
array ('quantity' => $_GET['q'], 'price' => $_GET['p'], 'name' => $_GET['n'], 'size' => $_GET['s']);
echo '<script language="javascript">';
echo 'alert("'.$_GET['n'].' Added")';
echo '</script>';
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'shop.php';
header("Location: http://$host$uri/$extra");
    exit;
}

?>