
    $(document).ready(function() {
        if(window.location.href === "superuser"){

        $.ajax({
            url: "ajax/superuser_getChurches.ajax.php",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "text",
            success: function(answer) {
            },
            error: function() {
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
          });

        }


        
      const firebaseConfig = {
        apiKey: "AIzaSyDHkmk1QhuflkF8Vh_w5QC01WXy3-RAdbc",
        authDomain: "levites-aa257.firebaseapp.com",
        projectId: "levites-aa257",
        storageBucket: "levites-aa257.appspot.com",
        messagingSenderId: "126085173959",
        appId: "1:126085173959:web:0cf848c840596a337a24e2",
        measurementId: "G-QP1MWVQ7XE"
      };
      firebase.initializeApp(firebaseConfig);

    });

    $(document).ready(function() {
      $("#searchChurch").on("keyup", function() {
        var searchText = $(this).val().toLowerCase(); // Get the text entered in the search input
    
        // Loop through each div with class "church_container"
        $(".church_container").each(function() {
          var churchName = $(this).find(".flex-grow-1 .fw-bold").text().toLowerCase(); // Get the church name
          var isVisible = churchName.includes(searchText); // Check if church name contains search text
    
          // Toggle visibility based on search text
          $(this).toggle(isVisible);
        });
      });
    });
    

    $(".viewBtn").on('click', function(){
        // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
        var church_id = $(this).siblings('input').first().val();
    
        var churchData = new FormData();
        churchData.append("church_id", church_id);
        alert(church_id);


        $.ajax({
            url: "ajax/get_churchDetails.ajax.php",
            method: "POST",
            data: churchData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
         
              console.log(answer);

              $("#superuser_churchID").val(answer[0]);
              $("#church_name").val(answer[1]);
              $("#church_email").val(answer[2]);
              $("#church_telnum").val(answer[3]);
              $("#church_religion").val(answer[5]);

              $("#church_city").val(answer[4]);
              $("#church_region").val(answer[6]);
              $("#church_province").val(answer[7]);
              $("#church_barangay").val(answer[8]); 
              $("#church_street").val(answer[9]);




              $('#superuserModal').modal('show'); 

            },
            error: function(answer) {
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
          });
    });
    




    function myFunction(){
        // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
        var church_id = $(this).siblings('input').first().val();

        
        var churchData = new FormData();
        churchData.append("church_id", church_id);

        $.ajax({
            url: "ajax/accept_church.ajax.php",
            method: "POST",
            data: churchData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
  

              $("superuser_churchID").val(answer[0]);
              
              $("#accepted_churches").load(location.href + ' #accepted_churches');
              $("#registration_churches").load('superuser' + ' #registration_churches');
          
            },
            error: function(e) {
       
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
          });
    }

    $(".acceptBtn").on('click', function(){

        var church_id = $(this).siblings('input').first().val();
        var church_name = $(this).val();


        
        var churchData = new FormData();
        churchData.append("church_id", church_id);
        churchData.append("church_name", church_name);

        $.ajax({
            url: "ajax/accept_church.ajax.php",
            method: "POST",
            data: churchData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) { 

              console.log(answer);
              $("superuser_churchID").val(answer[0]);

              async function createSubfolder(parentFolderPath, subfolderName) {
                var storage = firebase.storage();
                var subfolderRef = storage.ref(parentFolderPath + "/" + subfolderName + "/.placeholder");
              
                var metadata = {
                  customMetadata: {
                    createdBy: getCookie('acc_name'),
                    // Add more custom metadata properties as needed
                  }
                };
              
                try {
                  await subfolderRef.putString("", "raw", metadata);
                } catch (error) {
                  throw error;
                }
              }
              
              async function createSubfoldersAndReload() {
                try {
                  await createSubfolder(church_id, "Public");
                  await createSubfolder(church_id, "Members");
                  location.reload();
                } catch (error) {

                }
              }
              
              // Call the function
              createSubfoldersAndReload();
              
          
            },
            error: function() {

            },
            complete: function() {
          
            }
          });

          // $("#accepted_churches").load('template' + ' #accepted_churches');
          // $("#registration_churches").load('template'+ ' #registration_churches');
    });

    $(".rejectBtn").on('click', function(){
      var church_id = $(this).siblings('input').first().val();
      var church_name = $(this).val();
      alert(church_name);

      
      var churchData = new FormData();
      churchData.append("church_id", church_id);
      churchData.append("church_name", church_name);

        $.ajax({
            url: "ajax/reject_church.ajax.php",
            method: "POST",
            data: churchData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
     

              $("#superuser_churchID").val(answer[0]);

              location.reload();

              
            },
            error: function(e) {
              console.log(e);
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
          });
    });


    $(".superuser_deactivate").on('click', function(){
      var church_id = $(this).val();

      alert(church_id);
    
      var reportData = new FormData();
      reportData.append("church_id", church_id);
  
      $.ajax({
        url: "ajax/deactivate_account.ajax.php",
        method: "POST",
        data: reportData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
          alert(answer);
        },
        error: function(xhr, status, error) {
          //         var errorMessage = xhr.responseText; // Extract the error message
          console.log("Error: " + error);
        },
        complete: function() {
        }
      });
  
    });

    
    $(".superuser_activate").on('click', function(){
      var church_id = $(this).val();

      alert(church_id);
    
      var reportData = new FormData();
      reportData.append("church_id", church_id);
  
      $.ajax({
        url: "ajax/activate_account.ajax.php",
        method: "POST",
        data: reportData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
          alert(answer);
        },
        error: function(xhr, status, error) {
          //         var errorMessage = xhr.responseText; // Extract the error message
          console.log("Error: " + error);
        },
        complete: function() {
        }
      });
  
    });




