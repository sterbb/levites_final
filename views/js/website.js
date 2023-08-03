$(".addWebsiteForm").submit(function(e) {
    e.preventDefault();
  
    var website_name = $("#website_name").val();
    var website_path = $("#website_path").val();
    var website_category = $("#website_category").val();
  
    if (website_name.trim() === "" || website_path.trim() === "") {
        // Display an error message when the website name or path is empty

    } else {
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
                location.reload();

            },
            error: function() {

            },
            complete: function() {
                // Handle any completion tasks if needed
            }
        });
    }
  });
  
  
  function editGroup(element) {
      var id = "#" + $(element).attr('id');
      var editingid = "editing-" + $(element).attr('id');
      var groupclass = "." + $(element).attr('id');
      var clickFunction = 'saveeditGroup(this)';
    
      $(id).removeClass("btn-outline-success");
      $(id).addClass("btn-outline-danger");
      $(id).attr('onclick', clickFunction);
      $(id).attr('id', editingid);
      $(groupclass).removeAttr("hidden");

    //   var $inputField = $(element).siblings('input');

    $('#' + editingid + "-input").removeAttr("disabled");
 

      var $container = $(element).closest('div'); // Find the nearest parent container
      var $inputField = $container.find('input'); // Find the input field within the container
      $inputField.removeAttr("disabled");
      
      // Enable input field
    //   $('#editButton').removeClass("btn-outline-success").addClass("btn-outline-danger").attr('onclick', 'saveeditGroup()');
    //   $('#' + editingid).removeAttr("disabled");
    //   $('#' + editingid).on('keydown', function() {
    //       $(this).removeAttr("disabled");
    //   });
  }
  
  function saveeditGroup(element) {
      var id = "#" + $(element).attr('id');
      var saveid = $(element).attr('id').slice(8);
      var groupclass = "." + saveid;

     var groupname = $(element).attr('groupname');
     var newgroupname =   $('#editing-' + saveid + "-input").val();  
     var groupid = $(element).attr('groupid');

   


      var updateData = new FormData();
      updateData.append("groupname", groupname);
      updateData.append("newgroupname", newgroupname);
      updateData.append("groupid", groupid);

      $.ajax({
          url: "ajax/update_groupwebsite.ajax.php",
          method: "POST",
          data: updateData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "text",
          success: function(answer) {
              console.log(answer);
              location.reload();

          },
          error: function() {

          },
          complete: function() {
              // Handle any completion tasks if needed
          }
      });

      
      
      $(id).removeClass("btn-outline-danger");
      $(id).addClass("btn-outline-success");
      $(id).attr('onclick', 'editGroup(this)');
      $(id).attr('id', saveid);
      $(groupclass).attr("hidden", true);

      $('#editButton').removeClass("btn-outline-danger").addClass("btn-outline-success").attr('onclick', 'editGroup()');
      $('#editing-' + saveid + "-input").attr("disabled", true);
  }
  
  
  
  
  
  
  
  $("#addGroupBtn").on('click', function() {
    getWebsites();
    checkAllsm();
    checkAllmedia();
    checkAllpro();
    checkAllvid();
    var website_list = $("#groupWebsiteList").val();
    var website_groupname = $("#website_groupname").val()
  
    var websiteGroup = new FormData();
    websiteGroup.append("website_list", website_list);
    websiteGroup.append("website_groupname", website_groupname);
  
    $.ajax({
        url: "ajax/add_website_group.ajax.php",
        method: "POST",
        data: websiteGroup,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
            console.log(answer);
            location.reload();

        },
        error: function() {

        },
        complete: function() {
            // Handle any completion tasks if needed
        }
    });
  });


  $(".minus-website").click(function(){
    var w_id =  $(this).attr('id');
    var w_name =  $(this).val();

    var removeWebsite = new FormData();
    removeWebsite.append("w_id", w_id);
    removeWebsite.append("w_name", w_name);


    $.ajax({
        url: "ajax/delete_website.ajax.php",
        method: "POST",
        data: removeWebsite,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
            console.log(answer);
            location.reload();
  
           
        },
        error: function() {

        },
        complete: function() {
            // Handle any completion tasks if needed
        }
    });
  
  })

  function removeWebsiteGroup(element){

    var group_id =  $(element).attr('groupid');
    var w_name =  $(element).val();
    var group_name =  $(element).attr('groupname');
    var removeWebsite = new FormData();
    removeWebsite.append("group_id", group_id);
    removeWebsite.append("w_name", w_name);
    removeWebsite.append("group_name", group_name);


    $.ajax({
        url: "ajax/delete_website_ingroup.ajax.php",
        method: "POST",
        data: removeWebsite,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
            console.log(answer);
            location.reload();
  
           
        },
        error: function() {

        },
        complete: function() {
            // Handle any completion tasks if needed
        }
    });

  }

  function deleteGroup(element){
    var group_id =  $(element).attr('id');
    var group_name =  $(element).attr('group_name');

    var removeGroup = new FormData();
    removeGroup.append("group_id", group_id);
    removeGroup.append("group_name", group_name);



    $.ajax({
        url: "ajax/delete_groupwebsite.ajax.php",
        method: "POST",
        data: removeGroup,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
            console.log(answer);
            location.reload();
        },
        error: function() {

        },
        complete: function() {
            // Handle any completion tasks if needed
        }
    });



  }

  
  function getWebsites() {
    var arrData = [];
    
  
  
  
    $('input[name="cur_websites"]:checked').each(function() {
        var str = this.value;
        
        var strArray = str.split("#");
  
        var name = strArray[0];
        var path = strArray[1];
        var category = strArray[2];
  
        var websites = {};
        websites.name = name;
        websites.path = path;
        websites.category = category;
  
        arrData.push(websites);
    });
  
    $("#groupWebsiteList").val(JSON.stringify(arrData));
  }
  
  
  
  
  
  function checkAllsm() {
      var checkBoxes = document.getElementById("SM");
        if (checkBoxes.checked == true) {
          var chechSM = document.getElementsByClassName("NewSM");
          for(var i = 0; i < chechSM.length; i++){
              chechSM[i].checked=true;
          }
  
        } else {
          var chechSM = document.getElementsByClassName("NewSM");
          for(var i = 0; i < chechSM.length; i++){
              chechSM[i].checked=false;
  
  
          }
        }
      
    }
    
  function checkAllpro() {
      var checkProBoxes = document.getElementById("Pro");
        if (checkProBoxes.checked == true) {
          var chechPro = document.getElementsByClassName("NewPro");
          for(var i = 0; i < chechPro.length; i++){
              chechPro[i].checked=true;
          }
  
        } else {
          var chechPro = document.getElementsByClassName("NewPro");
          for(var i = 0; i < chechPro.length; i++){
              chechPro[i].checked=false;
  
  
          }
        }
      
    }
    
  function checkAllmedia() {
      var checkMedBoxes = document.getElementById("Media");
        if (checkMedBoxes.checked == true) {
          var chechMedia = document.getElementsByClassName("NewMedia");
          for(var i = 0; i < chechMedia.length; i++){
              chechMedia[i].checked=true;
          }
  
        } else {
          var chechMedia = document.getElementsByClassName("NewMedia");
          for(var i = 0; i < chechMedia.length; i++){
              chechMedia[i].checked=false;
  
  
          }
        }
      
    }
    
  function checkAllvid() {
      var checkVidBoxes = document.getElementById("Vid");
        if (checkVidBoxes.checked == true) {
          var chechVid = document.getElementsByClassName("NewVid");
          for(var i = 0; i < chechVid.length; i++){
              chechVid[i].checked=true;
          }
  
        } else {
          var chechVid = document.getElementsByClassName("NewVid");
          for(var i = 0; i < chechVid.length; i++){
              chechVid[i].checked=false;
  
  
          }
        }
      
    }

    