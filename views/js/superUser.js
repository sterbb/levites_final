
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
    
$(document).ready(function() {
    
    $(".AccoutAllAccept").on('click', function() {
      Swal.fire({
        title: 'Confirm Acceptance',
        text: 'Are you sure you want to accept all accounts registered?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, accept all!',
        cancelButtonText: 'No, decline'
      }).then((result) => {
        if (result.isConfirmed) {
          var acceptAllData = [];
  
          $(".acceptBtn").each(function() {
            var church_id = $(this).siblings('input').first().val();
            var church_name = $(this).val();
    
  
            acceptAllData.push({
              church_id: church_id,
              church_name: church_name
            });
          });
  
          if (acceptAllData.length > 0) {
            acceptAccount(acceptAllData);
          }
        }
      });
    });

                
    function acceptAccount(dataArray) {
      var acceptAllData = new FormData();
      acceptAllData.append("dataArray", JSON.stringify(dataArray));

      $.ajax({
          url: "ajax/accept_all_account.ajax.php",
          method: "POST",
          data: acceptAllData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "text",
          success: function(answer) {
              console.log(answer);

              // Show success toast notification
              Swal.fire({
                  icon: 'success',
                  title: 'Request Accepted',
                  text: 'All accounts registered have been successfully accepted.',
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
              });
              location.reload();
          },
          error: function() {
              alert("Oops. Something went wrong!");
          },
          complete: function() {
              // Handle any completion tasks if needed
          }
      });
  }

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

    $(".acceptBtn, .acceptBtnRjct").on('click', function(){
      var church_id = $(this).siblings('input').first().val();
      var church_name = $(this).val();
  
      Swal.fire({
          title: 'Confirm Church Acceptance',
          text: 'Are you sure you want to accept this church?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes, accept church',
          cancelButtonText: 'No, cancel',
      }).then((result) => {
          if (result.isConfirmed) {
              // User clicked "Yes," so you can proceed with accepting the church here
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
          }
      });
  });
  


  $(".AccoutAllReject").on('click', function() {
    console.log("Clicked Reject All")
    var rejectAllData = [];
  
    $(".rejectBtn").each(function() {
      var church_id = $(this).siblings('input').first().val();
      var church_name = $(this).val();
      rejectAllData.push({
        church_id: church_id,
        church_name: church_name
      });
    });
  
    if (rejectAllData.length > 0) {
      rejectAccount(rejectAllData);
    }
  });

    
function rejectAccount(dataArray) {
  var rejectAllData = new FormData();
  rejectAllData.append("dataArray", JSON.stringify(dataArray));

  Swal.fire({
    title: 'Confirm Rejection',
    text: 'Are you sure you want to reject all accounts registered?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, reject all!',
    cancelButtonText: 'No, keep them'
  }).then((result) => {
    if (result.isConfirmed) {
      // User confirmed rejection, proceed with AJAX request
      $.ajax({
        url: "ajax/reject_all_account.ajax.php",
        method: "POST",
        data: rejectAllData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
          console.log(answer);
          
          

          // Show success toast notification
          Swal.fire({
            icon: 'success',
            title: 'Requests Rejected',
            text: 'All accounts registered have been rejected.',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          });

          // Reload the page
          location.reload();
        },
        error: function() {
          alert("Oops. Something went wrong!");
        },
        complete: function() {
          // Handle any completion tasks if needed
        }
      });
    }
  });
}
    

    $(".rejectBtn").on('click', function(){


      
  Swal.fire({
    title: 'Confirm Rejection',
    text: 'Are you sure you want to reject accounts registered?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, reject church',
    cancelButtonText: 'No, keep them'
  }).then((result) => {
    if (result.isConfirmed) {
      var church_id = $(this).siblings('input').first().val();
      var church_name = $(this).val();
      
      
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

        }
        });
    });


    $(".superuser_deactivate").on('click', function(){

        
  Swal.fire({
    title: 'Confirm Rejection',
    text: 'Are you sure you want to deactivate this accounts registered?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, deactivate!',
    cancelButtonText: 'No, keep them'
  }).then((result) => {
    if (result.isConfirmed) {
      var church_id = $(this).val();


    
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
       
        },
        error: function(xhr, status, error) {
          //         var errorMessage = xhr.responseText; // Extract the error message
          console.log("Error: " + error);
        },
        complete: function() {
        }
      });

    }
    });
  
    });

    
    $(".superuser_activate").on('click', function(){
      Swal.fire({
        title: 'Confirm Rejection',
        text: 'Are you sure you want to activated this accounts registered?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, activate!',
        cancelButtonText: 'No, keep them'
      }).then((result) => {
        if (result.isConfirmed) {
      
      var church_id = $(this).val();

  
    
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
         
          },
          error: function(xhr, status, error) {
            //         var errorMessage = xhr.responseText; // Extract the error message
            console.log("Error: " + error);
          },
          complete: function() {
          }
        });

      }
    });
  
  });







    
$(document).ready(function() {
  $("#ApproveChurch").on("keyup", function() {
    var searchText = $(this).val().toLowerCase(); // Get the text entered in the search input

    // Loop through each div with class "church_container"
    $(".churchApprove").each(function() {
      var churchName = $(this).find(".flex-grow-1 .fw-bold").text().toLowerCase(); // Get the church name
      var isVisible = churchName.includes(searchText); // Check if church name contains search text

      // Toggle visibility based on search text
      $(this).toggle(isVisible);
    });
  });
});

$(document).ready(function() {
  $("#AccountApprove").on("keyup", function() {
    var searchText = $(this).val().toLowerCase(); // Get the text entered in the search input

    // Loop through each div with class "church_container"
    $(".ApproveAccount").each(function() {
      var churchName = $(this).find(".flex-grow-1 .fw-bold").text().toLowerCase(); // Get the church name
      var isVisible = churchName.includes(searchText); // Check if church name contains search text

      // Toggle visibility based on search text
      $(this).toggle(isVisible);
    });
  });
});




$(document).ready(function() {
  $("#RejectAccount").on("keyup", function() {
    var searchText = $(this).val().toLowerCase(); // Get the text entered in the search input

    // Loop through each div with class "church_container"
    $(".AccountReject").each(function() {
      var churchName = $(this).find(".flex-grow-1 .fw-bold").text().toLowerCase(); // Get the church name
      var isVisible = churchName.includes(searchText); // Check if church name contains search text

      // Toggle visibility based on search text
      $(this).toggle(isVisible);
    });
  });
});







