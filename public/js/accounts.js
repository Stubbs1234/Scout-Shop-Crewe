   var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+2; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd='0'+dd
}

if(mm<10) {
    mm='0'+mm
}

today = dd+'/'+mm+'/'+yyyy;

    document.getElementById("date555").innerText = today;


totals = 0;
totals1 = 0;
var $dataRows=$("#first-team-results-table");

            $dataRows.each(function() {
                $(this).find('.rowDataSd').each(function(i){
                    totals += parseFloat($(this).html());
                });
                $(this).find('.rowDataSd1').each(function(i){
                    totals1 += parseFloat($(this).html());
                });
            });
         testTotal = totals - totals1;
            $("#first-team-results-table td.totalCol").each(function(i){
                $(this).html(testTotal);
            });

var arr = []
while(arr.length < 4){
    var randomnumber = Math.ceil(Math.random()*9)
    if(arr.indexOf(randomnumber) > -1) continue;
    arr[arr.length] = randomnumber;
}
total11 = arr.join("");

document.getElementById('output').innerHTML = total11;




/*

      // addUP()

/*function addUP () {
totals = 0;
totals1 = 0;
var $dataRows=$("#first-team-results-table");

            $dataRows.each(function() {
                $(this).find('.rowDataSd').each(function(i){
                    totals += parseFloat($(this).html());
                });
                $(this).find('.rowDataSd1').each(function(i){
                    totals1 += parseFloat($(this).html());
                });
            });
         testTotal = totals - totals1;
            $("#first-team-results-table td.totalCol").each(function(i){
                $(this).html(testTotal);
            });
    addNumber();

}

function addNumber () {
var arr = []
while(arr.length < 4){
    var randomnumber = Math.ceil(Math.random()*9)
    if(arr.indexOf(randomnumber) > -1) continue;
    arr[arr.length] = randomnumber;
}
total11 = arr.join("");

document.getElementById('output').innerHTML = total11;

}*/


    function download() {
        var month = new Array();
    month[0] = "January";
    month[1] = "February";
    month[2] = "March";
    month[3] = "April";
    month[4] = "May";
    month[5] = "June";
    month[6] = "July";
    month[7] = "August";
    month[8] = "September";
    month[9] = "October";
    month[10] = "November";
    month[11] = "December";

    var d = new Date();
    var n = month[d.getMonth()];


        var groupName = document.getElementById("groupname").value;
  var fileName = groupName+"-"+n+".doc";
  console.log(fileName);

   if (!window.Blob) {
      alert('Your legacy browser does not support this action.');
      return;
   }

   var html, link, blob, url, css;

   // EU A4 use: size: 841.95pt 595.35pt;
   // US Letter use: size:11.0in 8.5in;

   css = (
     '<style>' +
     '@page WordSection1{size: 841.95pt 595.35pt;mso-page-orientation: landscape;}' +
     'div.WordSection1 {page: WordSection1;}' +
     'table{width: 100px}td{border:1px gray solid;padding:2px;}'+
     '</style>'
   );

   html = window.docx.innerHTML;
   blob = new Blob(['\ufeff', css + html], {
     type: 'application/msword'
   });
   url = URL.createObjectURL(blob);
   link = document.createElement('A');
   link.href = url;
   console.log(url);
   //document.write(url);
   //document.write(link);
   // Set default file name.
   // Word will append file extension - do not add an extension here.
   link.download = groupName;
   document.body.appendChild(link);
   if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, fileName); // IE10-11
   		else link.click();  // other browsers
   document.body.removeChild(link);
}

function printDiv() {
    console.log("running print");
     var content = document.getElementById("DivIdToPrint").innerHTML;
    var mywindow = window.open('', 'Print', 'height=600,width=800');
    console.log("running the next bit");
    mywindow.document.write('<html><head><title>Print</title>');
    mywindow.document.write('</head><body>');
    mywindow.document.write(content);
    mywindow.document.write('</body></html>');
    console.log("got the documents");
    mywindow.document.close();
    mywindow.focus();
    mywindow.print();
    mywindow.close();
    return true;
    console.log("ready to run the save");
}
