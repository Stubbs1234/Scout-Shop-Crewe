<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/header.php'); ?>
<h1>Scout Shop Crewe</h1>
<h2>Users</h2>
<div class="btn-toolbar">
    <a href="newusers" class="btn btn-success pull-right">Add New User</a><a href="home" class="btn btn-warning pull-right">Home</a>
</div>
</div>
<div class="jumbotron">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Username</th>
                <th>Account Type</th>
                <th>Updated At</th>
                <th>Updated By/Set Up By</th>
                <th>Last Log Out</th>
                <th>Online</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php echo $this->renderUsers(); ?>
        </tbody>
    </table>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/footer.php'); ?>
