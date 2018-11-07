<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/header.php'); ?>
<div class="btn-toolbar">
    <a href="home" class="btn btn-warning pull-right">Home</a>
</div>
</div>
<div class="jumbotron">
    <form action="" method="POST" role="form" class="form-inline">
        <div class="form-group">
            <p>Please Select A Group</p>
            <?php echo $this->groupobj->renderGroups(); ?>
            <input type="hidden" name="selectedGroup" value="true">
             <input type="submit" class="btn btn-danger" value="Filter"/>
        </div>
    </form>
    <br />
    <table class="table table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>Transaction</th>
                <th>Receipt No</th>
                <th>Credits</th>
                <th>Debits</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $this->renderTable(); ?>
        </tbody>
        <tfoot>
             <?php echo $this->renderTotalInfo();?>
        </tfoot>
    </table>
    <form action="" method="POST" role="form">
        <?php echo $this->renderInfo();?>
        <input type="hidden" name="infoForm" value="true"/>
        <tr><td><input type='submit' class='btn btn-success' value="Create Monthly Statement"></td></tr>
    </form>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/footer.php'); ?>
