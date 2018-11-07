<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/header.php'); ?>
<h1>Paid Statements</h1>
<div class="btn-toolbar">
    <a href="home" class="btn btn-warning pull-right">Home</a>
    <a href="paid?action=word" class="btn btn-info pull-right">Download Summary (Word)</a>
</div>
</div>
<div class="jumbotron">
    <table id="first-team-results-table" class="table table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Group</th>
                <th>Total</th>
                <th>Statement Number</th>
                <th>Paid</th>
                <th>Statement Paid</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $this->renderPaidTable(); ?>
        </tbody>
    </table>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/footer.php'); ?>
