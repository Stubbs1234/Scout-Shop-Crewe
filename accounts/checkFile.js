function checkTextField(field) {
   var intNumber = parseInt(field);
    if (intNumber.value > '5.00') {
        alert("Limit is above £5.00");
    }
}