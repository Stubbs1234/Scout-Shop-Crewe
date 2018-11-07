<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/header.php'); ?>

<h1>Scout Shop Crewe</h1>
<h2>Welcome <span><?php if (isset($_SESSION['firstname'])){echo $_SESSION['firstname']; } else { echo null; } ?></span></h2>
<h3 id="time"></h3><a href='logout' class='btn btn-warning pull-right'>Logout</a><br />
<br />
</div>
<script type="text/javascript">
    $(document).ready(function() { /* code here */

        startTime();

    });

    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('time').innerHTML =
            h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
</script>

<div class="jumbotron">
    <!--user level access-->
    <?php if ($this->admin == '1') { ?>
    <div id="staff">
        <a href="invoice" class="btn btn-info btn-lg btn-block">New Invoice</a><br /><br />
        <!--<a href="shop/shopFirst.php" class="btn btn-info btn-lg btn-block">New Orders</a><br /><br />
        <a href="shop/get.php" class="btn btn-info btn-lg btn-block">Get Orders</a><br /><br />-->
        <a href="personal" class="btn btn-warning btn-lg btn-block">Edit Profile</a><br /><br />
    </div>
    <?php } elseif ($this->admin == '3') { ?>
    <div id="adminStaff">
        <a href="invoice" class="btn btn-info btn-lg btn-block">New Invoice</a><br /><br />
        <!--<a href="shop/shopFirst.php" class="btn btn-info btn-lg btn-block">New Orders</a><br /><br />
        <a href="shop/get.php" class="btn btn-info btn-lg btn-block">Get Orders</a><br /><br />-->
        <a href="monthlyStatement" class="btn btn-success btn-lg btn-block">Monthly Statements</a><br /><br />
        <a href="paid" class="btn btn-success btn-lg btn-block">Paid</a><br /><br />
        <a href="personal" class="btn btn-warning btn-lg btn-block">Edit Profile</a><br /><br />
        <a href="users" class="btn btn-danger btn-lg btn-block">Users</a><br /><br />
    </div>
    <?php } ?>
</div>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/footer.php'); ?>
