<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/header.php'); ?>
<h1>Scout Shop Crewe</h1>
<h2>Users</h2>
<div class="btn-toolbar">
    <a href="home" class="btn btn-warning pull-right">Home</a><a href="users" class="btn btn-info pull-right">Users</a>
</div>
</div>
<div class="jumbotron">
    <form method="post" role="form">
            <p>First Name</p>
            <input type="text" name="firstname" class="form-control" value="<?= $this->firstname ?>"/><br />
            <p>Username</p>
            <input type="text" name="username" class="form-control" value="<?= $this->username ?>"/><br />
            <p>Account Type</p>
            <select name="accounttype" class="form-control">
                <?php echo $this->renderAdminLevel(); ?>
            </select><br /><br />
            <input type="hidden" name="id" value="<?= $this->id ?>"/>
            <input type="hidden" name="edit_users" value="true"/>
        <input type="submit" value="Update Details" class="btn btn-success"/>
    </form>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/footer.php'); ?>
