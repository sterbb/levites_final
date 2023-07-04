
$(".addWebsiteForm").submit(function(e){
    e.preventDefault();

    var website_name = $("#website_name").val();
    var website_path = $("#website_path").val();
    var website_category = $("#website_category").val();
    alert(website_name +website_category + website_path);

    var websiteData = new FormData();
    websiteData.append("website_path", website_path);
    websiteData.append("website_name", website_name);


    $.ajax({
        url: "ajax/website_add.ajax.php",
        method: "POST",
        data: websiteData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
          console.log(answer);
          alert(answer);     
      
        },
        error: function() {
            alert("Oops. Something went wrong!");
        },
        complete: function() {
        }
      });

});