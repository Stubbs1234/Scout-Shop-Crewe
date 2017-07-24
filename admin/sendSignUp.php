<?php
/*Enter email address for the email to be sent to*/
$myemail  = $_GET['email'];

/*Enter the name of the function with a post method*/
$id = $_GET['id'];
$password = $_GET['pwrd'];

/*the layout of the email when receive from the website*/
$question = "$question";
$message = "Hello!

Welcome to the scout shop new system below is your user id and password,


User ID = $id,
Password = $password,

Yours in scouting 
Scout Shop Crewe
";


mail($myemail, "User ID and Password", $message);

/*Take the user to a new web page if email was sent correctly*/
header('Location: http://localhost:8888/ScoutShop/admin/users.html');

/*Check to make sure all inputs are fill in*/
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}
/*Show an error if none of the inputs are not fill in*/
function show_error($myError)
{
?>
    <html> 
<body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>
