var tot = 0;
  var totalBar0 = 0; var totalBar1 = 0; var totalBar2 = 0; var totalBar3 = 0; var totalBar4 = 0; var totalBar5 = 0; var totalBar6 = 0; var totalBar7 = 0; var totalBar8 = 0; var totalBar9 = 0; var totalBar10 = 0; var totalBar11 = 0; var totalBar12 = 0; var totalBar13 = 0; var totalBar14 = 0;

      function add0() {
          var p = $("#price0").val();
          var q = $("#q0").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
         $("#total0").val(parseF.toFixed(2));
          totalBar0 = t;
          add();
      }
      function add1() {
          var p = $("#price1").val();
          var q = $("#q1").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total1").val(parseF.toFixed(2));
          totalBar1 = t;
          add();
      }
      function add2() {
          var p = $("#price2").val();
          var q = $("#q2").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total2").val(parseF.toFixed(2));
          totalBar2 = t;
          add();
      }
      function add3() {
          var p = $("#price3").val();
          var q = $("#q3").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total3").val(parseF.toFixed(2));
          totalBar3 = t;
          add();
      }
      function add4() {
          var p = $("#price4").val();
          var q = $("#q4").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total4").val(parseF.toFixed(2));
          totalBar4 = t;
          add();
      }
  function add5() {
          var p = $("#price5").val();
          var q = $("#q5").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total5").val(parseF.toFixed(2));
          totalBar5 = t;
          add();
      }
  function add6() {
          var p = $("#price6").val();
          var q = $("#q6").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total6").val(parseF.toFixed(2));
          totalBar6 = t;
          add();
      }
  function add7() {
          var p = $("#price7").val();
          var q = $("#q7").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total7").val(parseF.toFixed(2));
          totalBar7 = t;
          add();
      }
  function add8() {
          var p = $("#price8").val();
          var q = $("#q8").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total8").val(parseF.toFixed(2));
          totalBar8 = t;
          add();
      }
function add9() {
          var p = $("#price9").val();
          var q = $("#q9").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total9").val(parseF.toFixed(2));
          totalBar9 = t;
          add();
      }
  function add10() {
          var p = $("#price10").val();
          var q = $("#q10").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total10").val(parseF.toFixed(2));
          totalBar10 = t;
          add();
      }
  function add11() {
          var p = $("#price11").val();
          var q = $("#q11").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total11").val(parseF.toFixed(2));
          totalBar11 = t;
          add();
      }
  function add12() {
          var p = $("#price12").val();
          var q = $("#q12").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total12").val(parseF.toFixed(2));
          totalBar12 = t;
          add();
      }
  function add13() {
          var p = $("#price13").val();
          var q = $("#q13").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total13").val(parseF.toFixed(2));
          totalBar13 = t;
          add();
      }
  function add14() {
          var p = $("#price14").val();
          var q = $("#q14").val();
           var pi = p;
          var qi = q;
          var t = qi*pi;
          var parseF = parseFloat(t);
          $("#total14").val(parseF.toFixed(2));
          totalBar14 = t;
          add();
      }
      function add() {
        tot = totalBar0 + totalBar1 + totalBar2 + totalBar3 + totalBar4 + totalBar5 + totalBar6 + totalBar7 + totalBar8 + totalBar9 + totalBar10 + totalBar11 + totalBar12 + totalBar13 + totalBar14;
      $("#endTotal").val(tot.toFixed(2));
      }
