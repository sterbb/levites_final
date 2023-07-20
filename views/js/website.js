
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
    alert("hello");
    getWebsites();

    var website_list = $("#groupWebsiteList").val();
    console.log(website_list);
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

        var str = this.value;
        var strArray = str.split("#");

        var name = strArray[0];
        var path = strArray[1];

        console.log(strArray);



        
        var websites = {};
        websites.name = name;
        websites.path = path;
        arrData.push(websites);
    
     });

 

     $("#groupWebsiteList").val(JSON.stringify(arrData));
     
}




$("#deleteWeb").on('click', function(){
    alert("hello");

    var id = $id; // Replace with the actual ID of the item you want to delete

    // Make an AJAX request to the server-side script
    $.ajax({
      url: 'delete_website.ajax.php', // Replace with the URL of your server-side script
      method: 'POST',
      data: { id: id }, // Send the item ID as data
      success: function(response) {
        // Handle the response from the server
        console.log(response);
        // Refresh the page or update the UI as needed
      },
      error: function() {
        // Handle any error that occurs during the AJAX request
        alert('Oops! Something went wrong.');
      }
    });
  });

  
  
  
  