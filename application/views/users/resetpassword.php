<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/header.php'); ?>
<h1>Scout Shop Crewe</h1>
<h2>Reset Password</h2>
</div>
<div class="jumbotron">

    <p>Hi, <?php echo $this->firstname; ?> <a href="logout" class="btn btn-success">Not You?</a></p>

    <form action="" role="form" method="post" name="passwordForm">
        <div class="form-group">
            <p>New Password</p>
            <input type="password" class="form-control" name="newpassword" id="newpassword">
        </div>
        <div class="form-group">
            <p>Confirm New Password</p>
            <input type="password" class="form-control" name="cpassword" id="cpassword">
        </div>
        <input type="hidden" name="password_update" value="true">

         <input type="submit" name="password_button" value="Reset Password" class="btn btn-success">
    </form>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/footer.php'); ?>
