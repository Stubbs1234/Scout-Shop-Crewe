<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/header.php'); ?>

    <h1>New Invoice</h1>
    <!--provides home button-->
    <div class="btn-toolbar">
        <a href="home" class="btn btn-warning pull-right">Home</a>
    </div>
    </div>
    <div class="jumbotron">
        <!--runs the form for user to enter data-->
        <form role="form" action="" method="post">
            <div class="form-group">
                <p>Receipt Number</p>
                <input type="text" name="receipt" class="form-control" value="<?php if(isset($_POST['receipt'])){echo $_POST['receipt'];} else{echo null;} ?>"/>
            </div>
            <div class="form-group">
                <p>Name</p>
                <input type="text" name="name" class="form-control" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} else{echo null;}?>"/>
            </div>
            <div class="form-group">
                <p>Group Name</p>
                <?php echo $this->groupExtObj->renderGroups(); ?>
            </div>
            <!--Buttons for submit-->
            <input type="hidden" name="invoiceForm" value="true">
            <input type="reset" id="reset" name="reset" value="Reset" class="btn btn-danger btn-lg"/>
            <input type="submit" value="Add" class="btn btn-primary btn-lg"/>
        </form>
    </div>
    </div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/footer.php'); ?>
