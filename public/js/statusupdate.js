function setUpdateAction() {
    var data = $("#select").val();
    
    if(data == "Please Select") {
        alert("Sorry you need to select a status");
    } else {
    document.frmUser.action = "edit_orders.php";
    document.frmUser.submit();   
    }

}
function setDeleteAction() {
if(confirm("Are you sure want to delete these rows?")) {
document.frmUser.action = "delete_orders.php";
document.frmUser.submit();
}
}