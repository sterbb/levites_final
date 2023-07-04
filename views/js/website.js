
$(".addWebsiteForm").submit(function(e){
    e.preventDefault();

    var website_name = $("#website_name").val();
    var website_path = $("#website_path").val();
    var website_category = $("#website_category").val();

    alert(website_name +website_category + website_path);

    var websiteData = new FormData();
    websiteData.append("website_path", website_path);
    websiteData.append("website_name", website_name);
    websiteData.append("website_category", website_category);


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
            
      
        },
        error: function() {
            alert("Oops. Something went wrong!");
        },
        complete: function() {
        }
      });

});

$("#addGroupBtn").on('click', function(){
    alert("hello")
    getWebsites();

    var website_list = $("#groupWebsiteList").val();
    var website_groupname = $("#website_groupname").val()

    var websiteGroup = new FormData();
    websiteGroup.append("website_list", website_list);
    websiteGroup.append("website_groupname", website_groupname);

    $.ajax({
        url:"ajax/add_website_group.ajax.php",
        method: "POST",
        data: websiteGroup,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"text",
        success: function(answer) {
           console.log(answer);
        },
        error: function() {
            alert("Oops. Something went wrong!");
        },
        complete: function() {

        }
    });


    
});


function getWebsites(){
    var arrData = [];
    $('input[name="cur_websites"]:checked').each(function() {
        console.log(this.value);

        
        var websites = {};
        websites.name = this.value;
        arrData.push(websites);
    
     });


     $("#groupWebsiteList").val(JSON.stringify(arrData));
     
  }