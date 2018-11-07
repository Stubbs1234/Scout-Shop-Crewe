<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/header.php'); ?>
<h1>Scout Shop Crewe</h1>
<h2>Users</h2>
<div class="btn-toolbar">
    <a href="home" class="btn btn-warning pull-right">Home</a><a href="users" class="btn btn-info pull-right">Users</a>
</div>
</div>
<div class="jumbotron">
     <form method="post" role="form">
        <p>Name</p>
        <input type="text" name="firstname" class="form-control" value="<?php if(isset($_POST['firstname'])){echo $_POST['firstname'];} else{echo null;} ?>" /><br />
        <p>Username</p>
        <input type="text" name="username" class="form-control" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} else{echo null;} ?>"/><br />
        <p>Password</p>
        <input type="password" name="password" class="form-control" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} else{echo null;} ?>"/><br />
        <p>Confirm Password</p>
        <input type="password" name="cpassword" class="form-control" value="<?php if(isset($_POST['cpassword'])){echo $_POST['cpassword'];} else{echo null;} ?>"/><br />
        <p>Account Type</p>
        <select name="accounttype" class="form-control">
            <?php echo $this->renderAdminLevel(); ?>
        </select><br /><br />
        <input type="hidden" value="true" name="add_new_users"/>
        <input type="submit" value="Add User" class="btn btn-success"/>
    </form>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/footer.php'); ?>
