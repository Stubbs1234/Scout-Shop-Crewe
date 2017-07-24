              $("#section").change(function() {
    
    var el = $(this) ;
    
    if(el.val() === "scouts" ) {
         $("#sub-section option").remove() ;
    $("#sub-section").append("<option value='beavers'>Beavers</option>");
        $("#sub-section").append("<option value='cubs'>Cubs</option>");
        $("#sub-section").append("<option value='scouts'>Scouts</option>");
        $("#sub-section").append("<option value='explorers'>Explorers</option>");
        $("#sub-section").append("<option value='leader'>Leaders</option>");
        $("#sub-section").append("<option value='non'>Other</option>");
    }
      else if(el.val() === "guides" ) {
           $("#sub-section option").remove() ;
       $("#sub-section").append("<option value='rainbows'>Rainbows</option>");
      $("#sub-section").append("<option value='brownies'>Brownies</option>");
          $("#sub-section").append("<option value='guides'>Guides</option>");
          $("#sub-section").append("<option value='sinor_section'>Sindor Section</option>");
          $("#sub-section").append("<option value='non'>Other</option>");
      }
  });