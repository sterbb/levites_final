
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
    
    $(document).on("click", ".viewBtn", function(e) {
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
    
  $(document).on("click", ".AccoutAllAccept", function(e) {
      Swal.fire({
        title: 'Confirm Church Request?',
        text: 'Are you sure you want to accept all churches?',
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

              const Toast = Swal.mixin({
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
            
              Toast.fire({
                icon: 'success',
                title: 'Churches accepted successfully.'
              });
   

              var superuser = new FormData();
              superuser.append("superuser_function", "approve");
              superuser.append("data1", "");

              $.ajax({
                url: "ajax/async_superuser.ajax.php",
                method: "POST",
                data: superuser,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(answer) {
        
                    var requestSection = document.querySelector('#registration_churches');
                    requestSection.innerHTML = '';
                    var imagePath = ""; // Default value
        
                  answer.forEach(function (value, key) {
        
               
        
                    var asyncImage = new FormData();
                    asyncImage.append("image_purpose", "request");
                    asyncImage.append("data1",  value["churchID"]);
                    asyncImage.append("data2", "");
        
                    $.ajax({
                      url: "ajax/async_images.ajax.php",
                      method: "POST",
                      data: asyncImage,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType: "json",
                      success: function(image) {
                        console.log(image);
    
                        var asyncSuperuser = new FormData();
                        asyncSuperuser.append("superuser_function", "admin_details");
                        asyncSuperuser.append("data1",  value["churchID"]);
    
                        $.ajax({
                          url: "ajax/async_superuser.ajax.php",
                          method: "POST",
                          data: asyncSuperuser,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(details) {
                             console.log(details);
      
                              if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                
                                imagePath = "./views/images/default.png"; // Default value
              
              
              
              
                                const html = `
                                <div class="church_container ApproveAccount"> <!-- Wrap each church entry in a container -->
                                  <div class="d-flex align-items-center approval_churches gap-3">
                                    <div class="team-lis">
                                      <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                    </div>
                                    <div class="flex-grow-1">
                                      <h6 class="mb-1 fw-bold">${value["church_name"]}</h6> 
                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                        <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                      </span>
                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                        <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                      </span>
                                    </div>
                                    <div class="church_div">
                                      <input type="text" name="trans_type" id="church_id" value="${value["churchID"]}" name="church_id" style="display:none;" required>
                                      <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details</button>
                                      <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtn" value="${value["church_name"]}" >Accept</button>
                                      <button type="button" class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectBtn" value="${value["church_name"]}">Reject</button>
                                    </div>
                                  </div>
                                  <hr> <!-- Add hr within the container -->
                                </div>
                              `;
                                  requestSection.innerHTML += html;
                    
                    
                              } else {
                                  imagePath = "./views/UploadAvatar/" + image["Avatar"];
              
                    
              
                                  const html = `
                                        <div class="church_container ApproveAccount"> <!-- Wrap each church entry in a container -->
                                          <div class="d-flex align-items-center approval_churches gap-3">
                                            <div class="team-lis">
                                              <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                            </div>
                                            <div class="flex-grow-1">
                                              <h6 class="mb-1 fw-bold">${value["church_name"]}</h6> 
                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                              </span>
                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                              </span>
                                            </div>
                                            <div class="church_div">
                                              <input type="text" name="trans_type" id="church_id" value="${value["churchID"]}" name="church_id" style="display:none;" required>
                                              <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details</button>
                                              <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtn" value="${value["church_name"]}" >Accept</button>
                                              <button type="button" class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectBtn" value="${value["church_name"]}">Reject</button>
                                            </div>
                                          </div>
                                          <hr> <!-- Add hr within the container -->
                                        </div>
                                      `;
                                    requestSection.innerHTML += html;
                      
                      
                      
                              }
              
                              console.log(imagePath)
                  
    
    
    
    
                            
    
                          },
                          error: function(xhr, status, error) {
                            console.log(xhr)
                              alert("Oops. Something went wrong!");
                          },
                          complete: function() {
                          }
                        });
            
    
    
           
      
                
          
                
                      },
                      error: function(xhr, status, error) {
                        console.log(xhr)
                          alert("Oops. Something went wrong!");
                      },
                      complete: function() {
                      }
                    });
        
          
        
        
        
        
        
        
        
        
                  });
        
                  
          
            
                },
                error: function() {
                    alert("Oops. Something went wrong!");
                },
                complete: function() {
                }
              });

              var requestSection = document.querySelector('#accepted_churches');
              requestSection.innerHTML = '';


              var superuser = new FormData();
              superuser.append("superuser_function", "deactivated");
              superuser.append("data1", "");

              $.ajax({
                url: "ajax/async_superuser.ajax.php",
                method: "POST",
                data: superuser,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(answer) {
        
           
                    var imagePath = ""; // Default value
        
                  answer.forEach(function (value, key) {
        
               
        
                    var asyncImage = new FormData();
                    asyncImage.append("image_purpose", "request");
                    asyncImage.append("data1", value["churchID"]);
                    asyncImage.append("data2", "");
        
                    $.ajax({
                      url: "ajax/async_images.ajax.php",
                      method: "POST",
                      data: asyncImage,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType: "json",
                      success: function(image) {
                        console.log(image);
    
                        var asyncSuperuser = new FormData();
                        asyncSuperuser.append("superuser_function", "admin_details");
                        asyncSuperuser.append("data1",  value["churchID"]);
    
                        $.ajax({
                          url: "ajax/async_superuser.ajax.php",
                          method: "POST",
                          data: asyncSuperuser,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(details) {
                             console.log(details);
      
                              if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                
                                imagePath = "./views/images/default.png"; // Default value
              
              
              
              
                                const html = `
                                <div class="deactivatedChurch">
                                  <div class="d-flex align-items-center gap-3">
                                    <div class="team-list">
                                      <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                    </div>
                                    <div class="flex-grow-1">
                                      <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                        <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                      </span>
                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                        <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                      </span>
                                    </div>
                                    <div class="">
                                      <button href="javascript:;" class="btn btn-outline-primary rounded-5 btn-sm px-3 btn-hover superuser_activate" value="${value["churchID"]}" >Activate</button>
                                    </div>
                                  </div>
                                  <hr>
                                </div>
                              `;
                                  requestSection.innerHTML += html;
                    
                    
                              } else {
                                  imagePath = "./views/UploadAvatar/" + image["Avatar"];
              
                    
              
                                  const html = `
                                  <div class="deactivatedChurch">
                                    <div class="d-flex align-items-center gap-3">
                                      <div class="team-list">
                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                      </div>
                                      <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                          <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                        </span>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                          <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                        </span>
                                      </div>
                                      <div class="">
                                        <button href="javascript:;" class="btn btn-outline-primary rounded-5 btn-sm px-3 btn-hover superuser_activate" value="${value["churchID"]}" >Activate</button>
                                      </div>
                                    </div>
                                    <hr>
                                  </div>
                                `;
                                    requestSection.innerHTML += html;
                      
                      
                      
                              }
              
                              console.log(imagePath)
                  
    
    
    
    
                            
    
                          },
                          error: function(xhr, status, error) {
                            console.log(xhr)
                              alert("Oops. Something went wrong!");
                          },
                          complete: function() {
                          }
                        });
            
    
    
           
      
                
          
                
                      },
                      error: function(xhr, status, error) {
                        console.log(xhr)
                          alert("Oops. Something went wrong!");
                      },
                      complete: function() {
                      }
                    });
        
          
        
        
        
        
        
        
        
        
                  });
        
                  
          
            
                },
                error: function() {
                    alert("Oops. Something went wrong!");
                },
                complete: function() {
                }
              });


              var superuser = new FormData();
              superuser.append("superuser_function", "accepted");
              superuser.append("data1", "");

              $.ajax({
                url: "ajax/async_superuser.ajax.php",
                method: "POST",
                data: superuser,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(answer) {
        
           
                    var imagePath = ""; // Default value
        
                  answer.forEach(function (value, key) {
        
               
        
                    var asyncImage = new FormData();
                    asyncImage.append("image_purpose", "request");
                    asyncImage.append("data1", value["churchID"]);
                    asyncImage.append("data2", "");
        
                    $.ajax({
                      url: "ajax/async_images.ajax.php",
                      method: "POST",
                      data: asyncImage,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType: "json",
                      success: function(image) {
                        console.log(image);
    
                        var asyncSuperuser = new FormData();
                        asyncSuperuser.append("superuser_function", "admin_details");
                        asyncSuperuser.append("data1",  value["churchID"]);
    
                        $.ajax({
                          url: "ajax/async_superuser.ajax.php",
                          method: "POST",
                          data: asyncSuperuser,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(details) {
                             console.log(details);
      
                              if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                
                                imagePath = "./views/images/default.png"; // Default value
              
              
              
              
                                const html = `
                                  <div class="churchApprove">
                                    <div class="d-flex align-items-center gap-3">
                                      <div class="team-list">
                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                      </div>
                                      <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                          <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                        </span>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                          <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                        </span>
                                        <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary">
                                          <i class="bi bi-calendar-check-fill"></i> ${value['status_date']}
                                        </span>
                                      </div>
                                      <div class="">
                                        <button href="javascript:;" class="btn btn-outline-danger rounded-5 btn-sm px-3 btn-hover superuser_deactivate" value="${value["churchID"]}">Deactivate</button>
                                      </div>
                                    </div>
                                    <hr>
                                  </div>
                                `;
                                  requestSection.innerHTML += html;
                    
                    
                              } else {
                                  imagePath = "./views/UploadAvatar/" + image["Avatar"];
              
                    
              
                                
                                  const html = `
                                  <div class="churchApprove">
                                    <div class="d-flex align-items-center gap-3">
                                      <div class="team-list">
                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                      </div>
                                      <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                          <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                        </span>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                          <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                        </span>
                                        <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary">
                                          <i class="bi bi-calendar-check-fill"></i> ${value['status_date']}
                                        </span>
                                      </div>
                                      <div class="">
                                        <button href="javascript:;" class="btn btn-outline-danger rounded-5 btn-sm px-3 btn-hover superuser_deactivate" value="${value["churchID"]}">Deactivate</button>
                                      </div>
                                    </div>
                                    <hr>
                                  </div>
                                `;
                                    requestSection.innerHTML += html;
                      
                      
                      
                              }
              
                              console.log(imagePath)
                  
    
    
    
    
                            
    
                          },
                          error: function(xhr, status, error) {
                            console.log(xhr)
                              alert("Oops. Something went wrong!");
                          },
                          complete: function() {
                          }
                        });
            
    
    
           
      
                
          
                
                      },
                      error: function(xhr, status, error) {
                        console.log(xhr)
                          alert("Oops. Something went wrong!");
                      },
                      complete: function() {
                      }
                    });
        
          
        
        
        
        
        
        
        
        
                  });
        
                  
          
            
                },
                error: function() {
                    alert("Oops. Something went wrong!");
                },
                complete: function() {
                }
              });
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

  $(document).on("click", ".acceptBtn, .acceptBtnRjct", function(e) {

      var church_id = $(this).siblings('input').first().val();
      var church_name = $(this).val();
  
      Swal.fire({
          title: 'Confirm Church Request',
          text: 'Are you sure you want to accept this church?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes, accept request',
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
                          } catch (error) {
  
                          }
                      }
  
                      // Call the function
                      createSubfoldersAndReload();

                      const Toast = Swal.mixin({
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
                    
                      Toast.fire({
                        icon: 'success',
                        title: 'Church accepted successfully.'
                      });
           

                      var superuser = new FormData();
                      superuser.append("superuser_function", "approve");
                      superuser.append("data1", "");

                      $.ajax({
                        url: "ajax/async_superuser.ajax.php",
                        method: "POST",
                        data: superuser,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(answer) {
                
                            var requestSection = document.querySelector('#registration_churches');
                            requestSection.innerHTML = '';
                            var imagePath = ""; // Default value
                
                          answer.forEach(function (value, key) {
                
                       
                
                            var asyncImage = new FormData();
                            asyncImage.append("image_purpose", "request");
                            asyncImage.append("data1",  value["churchID"]);
                            asyncImage.append("data2", "");
                
                            $.ajax({
                              url: "ajax/async_images.ajax.php",
                              method: "POST",
                              data: asyncImage,
                              cache: false,
                              contentType: false,
                              processData: false,
                              dataType: "json",
                              success: function(image) {
                                console.log(image);
            
                                var asyncSuperuser = new FormData();
                                asyncSuperuser.append("superuser_function", "admin_details");
                                asyncSuperuser.append("data1",  value["churchID"]);
            
                                $.ajax({
                                  url: "ajax/async_superuser.ajax.php",
                                  method: "POST",
                                  data: asyncSuperuser,
                                  cache: false,
                                  contentType: false,
                                  processData: false,
                                  dataType: "json",
                                  success: function(details) {
                                     console.log(details);
              
                                      if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                        
                                        imagePath = "./views/images/default.png"; // Default value
                      
                      
                      
                      
                                        const html = `
                                        <div class="church_container ApproveAccount"> <!-- Wrap each church entry in a container -->
                                          <div class="d-flex align-items-center approval_churches gap-3">
                                            <div class="team-lis">
                                              <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                            </div>
                                            <div class="flex-grow-1">
                                              <h6 class="mb-1 fw-bold">${value["church_name"]}</h6> 
                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                              </span>
                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                              </span>
                                            </div>
                                            <div class="church_div">
                                              <input type="text" name="trans_type" id="church_id" value="${value["churchID"]}" name="church_id" style="display:none;" required>
                                              <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details</button>
                                              <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtn" value="${value["church_name"]}" >Accept</button>
                                              <button type="button" class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectBtn" value="${value["church_name"]}">Reject</button>
                                            </div>
                                          </div>
                                          <hr> <!-- Add hr within the container -->
                                        </div>
                                      `;
                                          requestSection.innerHTML += html;
                            
                            
                                      } else {
                                          imagePath = "./views/UploadAvatar/" + image["Avatar"];
                      
                            
                      
                                          const html = `
                                                <div class="church_container ApproveAccount"> <!-- Wrap each church entry in a container -->
                                                  <div class="d-flex align-items-center approval_churches gap-3">
                                                    <div class="team-lis">
                                                      <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                      <h6 class="mb-1 fw-bold">${value["church_name"]}</h6> 
                                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                        <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                                      </span>
                                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                        <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                                      </span>
                                                    </div>
                                                    <div class="church_div">
                                                      <input type="text" name="trans_type" id="church_id" value="${value["churchID"]}" name="church_id" style="display:none;" required>
                                                      <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details</button>
                                                      <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtn" value="${value["church_name"]}" >Accept</button>
                                                      <button type="button" class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectBtn" value="${value["church_name"]}">Reject</button>
                                                    </div>
                                                  </div>
                                                  <hr> <!-- Add hr within the container -->
                                                </div>
                                              `;
                                            requestSection.innerHTML += html;
                              
                              
                              
                                      }
                      
                                      console.log(imagePath)
                          
            
            
            
            
                                    
            
                                  },
                                  error: function(xhr, status, error) {
                                    console.log(xhr)
                                      alert("Oops. Something went wrong!");
                                  },
                                  complete: function() {
                                  }
                                });
                    
            
            
                   
              
                        
                  
                        
                              },
                              error: function(xhr, status, error) {
                                console.log(xhr)
                                  alert("Oops. Something went wrong!");
                              },
                              complete: function() {
                              }
                            });
                
                  
                
                
                
                
                
                
                
                
                          });
                
                          
                  
                    
                        },
                        error: function() {
                            alert("Oops. Something went wrong!");
                        },
                        complete: function() {
                        }
                      });

                      var requestSection = document.querySelector('#accepted_churches');
                      requestSection.innerHTML = '';


                      var superuser = new FormData();
                      superuser.append("superuser_function", "deactivated");
                      superuser.append("data1", "");

                      $.ajax({
                        url: "ajax/async_superuser.ajax.php",
                        method: "POST",
                        data: superuser,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(answer) {
                
                   
                            var imagePath = ""; // Default value
                
                          answer.forEach(function (value, key) {
                
                       
                
                            var asyncImage = new FormData();
                            asyncImage.append("image_purpose", "request");
                            asyncImage.append("data1", value["churchID"]);
                            asyncImage.append("data2", "");
                
                            $.ajax({
                              url: "ajax/async_images.ajax.php",
                              method: "POST",
                              data: asyncImage,
                              cache: false,
                              contentType: false,
                              processData: false,
                              dataType: "json",
                              success: function(image) {
                                console.log(image);
            
                                var asyncSuperuser = new FormData();
                                asyncSuperuser.append("superuser_function", "admin_details");
                                asyncSuperuser.append("data1",  value["churchID"]);
            
                                $.ajax({
                                  url: "ajax/async_superuser.ajax.php",
                                  method: "POST",
                                  data: asyncSuperuser,
                                  cache: false,
                                  contentType: false,
                                  processData: false,
                                  dataType: "json",
                                  success: function(details) {
                                     console.log(details);
              
                                      if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                        
                                        imagePath = "./views/images/default.png"; // Default value
                      
                      
                      
                      
                                        const html = `
                                        <div class="deactivatedChurch">
                                          <div class="d-flex align-items-center gap-3">
                                            <div class="team-list">
                                              <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                            </div>
                                            <div class="flex-grow-1">
                                              <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                              </span>
                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                              </span>
                                            </div>
                                            <div class="">
                                              <button href="javascript:;" class="btn btn-outline-primary rounded-5 btn-sm px-3 btn-hover superuser_activate" value="${value["churchID"]}" >Activate</button>
                                            </div>
                                          </div>
                                          <hr>
                                        </div>
                                      `;
                                          requestSection.innerHTML += html;
                            
                            
                                      } else {
                                          imagePath = "./views/UploadAvatar/" + image["Avatar"];
                      
                            
                      
                                          const html = `
                                          <div class="deactivatedChurch">
                                            <div class="d-flex align-items-center gap-3">
                                              <div class="team-list">
                                                <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                              </div>
                                              <div class="flex-grow-1">
                                                <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                  <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                                </span>
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                  <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                                </span>
                                              </div>
                                              <div class="">
                                                <button href="javascript:;" class="btn btn-outline-primary rounded-5 btn-sm px-3 btn-hover superuser_activate" value="${value["churchID"]}" >Activate</button>
                                              </div>
                                            </div>
                                            <hr>
                                          </div>
                                        `;
                                            requestSection.innerHTML += html;
                              
                              
                              
                                      }
                      
                                      console.log(imagePath)
                          
            
            
            
            
                                    
            
                                  },
                                  error: function(xhr, status, error) {
                                    console.log(xhr)
                                      alert("Oops. Something went wrong!");
                                  },
                                  complete: function() {
                                  }
                                });
                    
            
            
                   
              
                        
                  
                        
                              },
                              error: function(xhr, status, error) {
                                console.log(xhr)
                                  alert("Oops. Something went wrong!");
                              },
                              complete: function() {
                              }
                            });
                
                  
                
                
                
                
                
                
                
                
                          });
                
                          
                  
                    
                        },
                        error: function() {
                            alert("Oops. Something went wrong!");
                        },
                        complete: function() {
                        }
                      });


                      var superuser = new FormData();
                      superuser.append("superuser_function", "accepted");
                      superuser.append("data1", "");

                      $.ajax({
                        url: "ajax/async_superuser.ajax.php",
                        method: "POST",
                        data: superuser,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(answer) {
                
                   
                            var imagePath = ""; // Default value
                
                          answer.forEach(function (value, key) {
                
                       
                
                            var asyncImage = new FormData();
                            asyncImage.append("image_purpose", "request");
                            asyncImage.append("data1", value["churchID"]);
                            asyncImage.append("data2", "");
                
                            $.ajax({
                              url: "ajax/async_images.ajax.php",
                              method: "POST",
                              data: asyncImage,
                              cache: false,
                              contentType: false,
                              processData: false,
                              dataType: "json",
                              success: function(image) {
                                console.log(image);
            
                                var asyncSuperuser = new FormData();
                                asyncSuperuser.append("superuser_function", "admin_details");
                                asyncSuperuser.append("data1",  value["churchID"]);
            
                                $.ajax({
                                  url: "ajax/async_superuser.ajax.php",
                                  method: "POST",
                                  data: asyncSuperuser,
                                  cache: false,
                                  contentType: false,
                                  processData: false,
                                  dataType: "json",
                                  success: function(details) {
                                     console.log(details);
              
                                      if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                        
                                        imagePath = "./views/images/default.png"; // Default value
                      
                      
                      
                      
                                        const html = `
                                          <div class="churchApprove">
                                            <div class="d-flex align-items-center gap-3">
                                              <div class="team-list">
                                                <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                              </div>
                                              <div class="flex-grow-1">
                                                <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                  <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                                </span>
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                  <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                                </span>
                                                <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary">
                                                  <i class="bi bi-calendar-check-fill"></i> ${value['status_date']}
                                                </span>
                                              </div>
                                              <div class="">
                                                <button href="javascript:;" class="btn btn-outline-danger rounded-5 btn-sm px-3 btn-hover superuser_deactivate" value="${value["churchID"]}">Deactivate</button>
                                              </div>
                                            </div>
                                            <hr>
                                          </div>
                                        `;
                                          requestSection.innerHTML += html;
                            
                            
                                      } else {
                                          imagePath = "./views/UploadAvatar/" + image["Avatar"];
                      
                            
                      
                                        
                                          const html = `
                                          <div class="churchApprove">
                                            <div class="d-flex align-items-center gap-3">
                                              <div class="team-list">
                                                <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                              </div>
                                              <div class="flex-grow-1">
                                                <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                  <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                                </span>
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                  <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                                </span>
                                                <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary">
                                                  <i class="bi bi-calendar-check-fill"></i> ${value['status_date']}
                                                </span>
                                              </div>
                                              <div class="">
                                                <button href="javascript:;" class="btn btn-outline-danger rounded-5 btn-sm px-3 btn-hover superuser_deactivate" value="${value["churchID"]}">Deactivate</button>
                                              </div>
                                            </div>
                                            <hr>
                                          </div>
                                        `;
                                            requestSection.innerHTML += html;
                              
                              
                              
                                      }
                      
                                      console.log(imagePath)
                          
            
            
            
            
                                    
            
                                  },
                                  error: function(xhr, status, error) {
                                    console.log(xhr)
                                      alert("Oops. Something went wrong!");
                                  },
                                  complete: function() {
                                  }
                                });
                    
            
            
                   
              
                        
                  
                        
                              },
                              error: function(xhr, status, error) {
                                console.log(xhr)
                                  alert("Oops. Something went wrong!");
                              },
                              complete: function() {
                              }
                            });
                
                  
                
                
                
                
                
                
                
                
                          });
                
                          
                  
                    
                        },
                        error: function() {
                            alert("Oops. Something went wrong!");
                        },
                        complete: function() {
                        }
                      });


          





                  },
                  error: function() {
  
                  },
                  complete: function() {
  
                  }
              });
          }
      });
  });
  

  $(document).on("click", ".AccoutAllReject", function(e) {
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

          const Toast = Swal.mixin({
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
        
          Toast.fire({
            icon: 'success',
            title: 'Churches rejected successfully.'
          });

          
          

         
          var superuser = new FormData();
          superuser.append("superuser_function", "approve");
          superuser.append("data1", "");

          $.ajax({
            url: "ajax/async_superuser.ajax.php",
            method: "POST",
            data: superuser,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
    
                var requestSection = document.querySelector('#registration_churches');
                requestSection.innerHTML = '';
                var imagePath = ""; // Default value
    
              answer.forEach(function (value, key) {
    
           
    
                var asyncImage = new FormData();
                asyncImage.append("image_purpose", "request");
                asyncImage.append("data1",  value["churchID"]);
                asyncImage.append("data2", "");
    
                $.ajax({
                  url: "ajax/async_images.ajax.php",
                  method: "POST",
                  data: asyncImage,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function(image) {
                    console.log(image);

                    var asyncSuperuser = new FormData();
                    asyncSuperuser.append("superuser_function", "admin_details");
                    asyncSuperuser.append("data1",  value["churchID"]);

                    $.ajax({
                      url: "ajax/async_superuser.ajax.php",
                      method: "POST",
                      data: asyncSuperuser,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType: "json",
                      success: function(details) {
                         console.log(details);
  
                          if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                            
                            imagePath = "./views/images/default.png"; // Default value
          
          
          
          
                            const html = `
                            <div class="church_container ApproveAccount"> <!-- Wrap each church entry in a container -->
                              <div class="d-flex align-items-center approval_churches gap-3">
                                <div class="team-lis">
                                  <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                </div>
                                <div class="flex-grow-1">
                                  <h6 class="mb-1 fw-bold">${value["church_name"]}</h6> 
                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                    <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                  </span>
                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                    <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                  </span>
                                </div>
                                <div class="church_div">
                                  <input type="text" name="trans_type" id="church_id" value="${value["churchID"]}" name="church_id" style="display:none;" required>
                                  <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details</button>
                                  <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtn" value="${value["church_name"]}" onclick="changeButtonText(this)">Accept</button>
                                  <button type="button" class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectBtn" value="${value["church_name"]}">Reject</button>
                                </div>
                              </div>
                              <hr> <!-- Add hr within the container -->
                            </div>
                          `;
                              requestSection.innerHTML += html;
                
                
                          } else {
                              imagePath = "./views/UploadAvatar/" + image["Avatar"];
          
                
          
                              const html = `
                                    <div class="church_container ApproveAccount"> <!-- Wrap each church entry in a container -->
                                      <div class="d-flex align-items-center approval_churches gap-3">
                                        <div class="team-lis">
                                          <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                        </div>
                                        <div class="flex-grow-1">
                                          <h6 class="mb-1 fw-bold">${value["church_name"]}</h6> 
                                          <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                            <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                          </span>
                                          <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                            <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                          </span>
                                        </div>
                                        <div class="church_div">
                                          <input type="text" name="trans_type" id="church_id" value="${value["churchID"]}" name="church_id" style="display:none;" required>
                                          <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details</button>
                                          <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtn" value="${value["church_name"]}" onclick="changeButtonText(this)">Accept</button>
                                          <button type="button" class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectBtn" value="${value["church_name"]}">Reject</button>
                                        </div>
                                      </div>
                                      <hr> <!-- Add hr within the container -->
                                    </div>
                                  `;
                                requestSection.innerHTML += html;
                  
                  
                  
                          }
          
                          console.log(imagePath)
              




                        

                      },
                      error: function(xhr, status, error) {
                        console.log(xhr)
                          alert("Oops. Something went wrong!");
                      },
                      complete: function() {
                      }
                    });
        


       
  
            
      
            
                  },
                  error: function(xhr, status, error) {
                    console.log(xhr)
                      alert("Oops. Something went wrong!");
                  },
                  complete: function() {
                  }
                });
    
      
    
    
    
    
    
    
    
    
              });
    
              
      
        
            },
            error: function() {
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
          });

          var superuser = new FormData();
          superuser.append("superuser_function", "rejected");
          superuser.append("data1", "");

          $.ajax({
            url: "ajax/async_superuser.ajax.php",
            method: "POST",
            data: superuser,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
    
                var requestSection = document.querySelector('#rejected_churches');
                requestSection.innerHTML = '';
                var imagePath = ""; // Default value
    
              answer.forEach(function (value, key) {
    
           
    
                var asyncImage = new FormData();
                asyncImage.append("image_purpose", "request");
                asyncImage.append("data1",  value["churchID"]);
                asyncImage.append("data2", "");
    
                $.ajax({
                  url: "ajax/async_images.ajax.php",
                  method: "POST",
                  data: asyncImage,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function(image) {
                    console.log(image);

                    var asyncSuperuser = new FormData();
                    asyncSuperuser.append("superuser_function", "admin_details");
                    asyncSuperuser.append("data1",  value["churchID"]);

                    $.ajax({
                      url: "ajax/async_superuser.ajax.php",
                      method: "POST",
                      data: asyncSuperuser,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType: "json",
                      success: function(details) {
                         console.log(details);
  
                          if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                            
                            imagePath = "./views/images/default.png"; // Default value
          
          
          
          
                            const html = `
                                  <div class="AccountReject">
                                    <div class="d-flex align-items-center gap-3 ">
                                      <div class="team-list">
                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                      </div>
                                      <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">${value["church_name"]}</h6> 
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                          <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                        </span>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                          <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                        </span>
                                      </div>
                                      <div class="church_div">
                                        <input type="text" name="trans_type" id="church_id" value="${value["churchID"]}" name="church_id" style="display:none;" required>
                                        <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details </button>
                                        <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtnRjct" onclick="changeButtonText(this)">Accept </button>
                                      </div>
                                    </div>
                                    <hr>
                                  </div>
                                `;

                                // Add the HTML content to the container element
                                container.innerHTML += html;
                
                          } else {
                              imagePath = "./views/UploadAvatar/" + image["Avatar"];
          
                
          
                              const html = `
                              <div class="AccountReject">
                                <div class="d-flex align-items-center gap-3 ">
                                  <div class="team-list">
                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                  </div>
                                  <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-bold">${value["church_name"]}</h6> 
                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                      <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                    </span>
                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                      <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                    </span>
                                  </div>
                                  <div class="church_div">
                                    <input type="text" name="trans_type" id="church_id" value="${value["churchID"]}" name="church_id" style="display:none;" required>
                                    <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details </button>
                                    <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtnRjct" onclick="changeButtonText(this)">Accept </button>
                                  </div>
                                </div>
                                <hr>
                              </div>
                            `;
                                requestSection.innerHTML += html;
                  
                  
                  
                          }
          
                          console.log(imagePath)
              




                        

                      },
                      error: function(xhr, status, error) {
                        console.log(xhr)
                          alert("Oops. Something went wrong!");
                      },
                      complete: function() {
                      }
                    });
        


       
  
            
      
            
                  },
                  error: function(xhr, status, error) {
                    console.log(xhr)
                      alert("Oops. Something went wrong!");
                  },
                  complete: function() {
                  }
                });
    
      
    
    
    
    
    
    
    
    
              });
    
              
      
        
            },
            error: function() {
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
          });

          // Reload the page

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
    
$(document).on("click", ".rejectBtn", function(e) {


      
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

              const Toast = Swal.mixin({
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
            
              Toast.fire({
                icon: 'success',
                title: 'Church rejected successfully.'
              });
   

              var superuser = new FormData();
              superuser.append("superuser_function", "approve");
              superuser.append("data1", "");

              $.ajax({
                url: "ajax/async_superuser.ajax.php",
                method: "POST",
                data: superuser,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(answer) {
        
                    var requestSection = document.querySelector('#registration_churches');
                    requestSection.innerHTML = '';
                    var imagePath = ""; // Default value
        
                  answer.forEach(function (value, key) {
        
               
        
                    var asyncImage = new FormData();
                    asyncImage.append("image_purpose", "request");
                    asyncImage.append("data1",  value["churchID"]);
                    asyncImage.append("data2", "");
        
                    $.ajax({
                      url: "ajax/async_images.ajax.php",
                      method: "POST",
                      data: asyncImage,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType: "json",
                      success: function(image) {
                        console.log(image);
    
                        var asyncSuperuser = new FormData();
                        asyncSuperuser.append("superuser_function", "admin_details");
                        asyncSuperuser.append("data1",  value["churchID"]);
    
                        $.ajax({
                          url: "ajax/async_superuser.ajax.php",
                          method: "POST",
                          data: asyncSuperuser,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(details) {
                             console.log(details);
      
                              if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                
                                imagePath = "./views/images/default.png"; // Default value
              
              
              
              
                                const html = `
                                <div class="church_container ApproveAccount"> <!-- Wrap each church entry in a container -->
                                  <div class="d-flex align-items-center approval_churches gap-3">
                                    <div class="team-lis">
                                      <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                    </div>
                                    <div class="flex-grow-1">
                                      <h6 class="mb-1 fw-bold">${value["church_name"]}</h6> 
                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                        <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                      </span>
                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                        <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                      </span>
                                    </div>
                                    <div class="church_div">
                                      <input type="text" name="trans_type" id="church_id" value="${value["churchID"]}" name="church_id" style="display:none;" required>
                                      <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details</button>
                                      <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtn" value="${value["church_name"]}" onclick="changeButtonText(this)">Accept</button>
                                      <button type="button" class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectBtn" value="${value["church_name"]}">Reject</button>
                                    </div>
                                  </div>
                                  <hr> <!-- Add hr within the container -->
                                </div>
                              `;
                                  requestSection.innerHTML += html;
                    
                    
                              } else {
                                  imagePath = "./views/UploadAvatar/" + image["Avatar"];
              
                    
              
                                  const html = `
                                        <div class="church_container ApproveAccount"> <!-- Wrap each church entry in a container -->
                                          <div class="d-flex align-items-center approval_churches gap-3">
                                            <div class="team-lis">
                                              <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                            </div>
                                            <div class="flex-grow-1">
                                              <h6 class="mb-1 fw-bold">${value["church_name"]}</h6> 
                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                              </span>
                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                                <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                              </span>
                                            </div>
                                            <div class="church_div">
                                              <input type="text" name="trans_type" id="church_id" value="${value["churchID"]}" name="church_id" style="display:none;" required>
                                              <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details</button>
                                              <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtn" value="${value["church_name"]}" onclick="changeButtonText(this)">Accept</button>
                                              <button type="button" class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectBtn" value="${value["church_name"]}">Reject</button>
                                            </div>
                                          </div>
                                          <hr> <!-- Add hr within the container -->
                                        </div>
                                      `;
                                    requestSection.innerHTML += html;
                      
                      
                      
                              }
              
                              console.log(imagePath)
                  
    
    
    
    
                            
    
                          },
                          error: function(xhr, status, error) {
                            console.log(xhr)
                              alert("Oops. Something went wrong!");
                          },
                          complete: function() {
                          }
                        });
            
    
    
           
      
                
          
                
                      },
                      error: function(xhr, status, error) {
                        console.log(xhr)
                          alert("Oops. Something went wrong!");
                      },
                      complete: function() {
                      }
                    });
        
          
        
        
        
        
        
        
        
        
                  });
        
                  
          
            
                },
                error: function() {
                    alert("Oops. Something went wrong!");
                },
                complete: function() {
                }
              });

              var superuser = new FormData();
              superuser.append("superuser_function", "rejected");
              superuser.append("data1", "");

              $.ajax({
                url: "ajax/async_superuser.ajax.php",
                method: "POST",
                data: superuser,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(answer) {
        
                    var requestSection = document.querySelector('#rejected_churches');
                    requestSection.innerHTML = '';
                    var imagePath = ""; // Default value
        
                  answer.forEach(function (value, key) {
        
               
        
                    var asyncImage = new FormData();
                    asyncImage.append("image_purpose", "request");
                    asyncImage.append("data1",  value["churchID"]);
                    asyncImage.append("data2", "");
        
                    $.ajax({
                      url: "ajax/async_images.ajax.php",
                      method: "POST",
                      data: asyncImage,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType: "json",
                      success: function(image) {
                        console.log(image);
    
                        var asyncSuperuser = new FormData();
                        asyncSuperuser.append("superuser_function", "admin_details");
                        asyncSuperuser.append("data1",  value["churchID"]);
    
                        $.ajax({
                          url: "ajax/async_superuser.ajax.php",
                          method: "POST",
                          data: asyncSuperuser,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(details) {
                             console.log(details);
      
                              if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                
                                imagePath = "./views/images/default.png"; // Default value
              
              
              
              
                                const html = `
                                      <div class="AccountReject">
                                        <div class="d-flex align-items-center gap-3 ">
                                          <div class="team-list">
                                            <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                          </div>
                                          <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-bold">${value["church_name"]}</h6> 
                                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                              <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                            </span>
                                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                              <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                            </span>
                                          </div>
                                          <div class="church_div">
                                            <input type="text" name="trans_type" id="church_id" value="${value["churchID"]}" name="church_id" style="display:none;" required>
                                            <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details </button>
                                            <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtnRjct" onclick="changeButtonText(this)">Accept </button>
                                          </div>
                                        </div>
                                        <hr>
                                      </div>
                                    `;

                                    // Add the HTML content to the container element
                                    container.innerHTML += html;
                    
                              } else {
                                  imagePath = "./views/UploadAvatar/" + image["Avatar"];
              
                    
              
                                  const html = `
                                  <div class="AccountReject">
                                    <div class="d-flex align-items-center gap-3 ">
                                      <div class="team-list">
                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                      </div>
                                      <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">${value["church_name"]}</h6> 
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                          <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                        </span>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                          <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                        </span>
                                      </div>
                                      <div class="church_div">
                                        <input type="text" name="trans_type" id="church_id" value="${value["churchID"]}" name="church_id" style="display:none;" required>
                                        <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details </button>
                                        <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtnRjct" onclick="changeButtonText(this)">Accept </button>
                                      </div>
                                    </div>
                                    <hr>
                                  </div>
                                `;
                                    requestSection.innerHTML += html;
                      
                      
                      
                              }
              
                              console.log(imagePath)
                  
    
    
    
    
                            
    
                          },
                          error: function(xhr, status, error) {
                            console.log(xhr)
                              alert("Oops. Something went wrong!");
                          },
                          complete: function() {
                          }
                        });
            
    
    
           
      
                
          
                
                      },
                      error: function(xhr, status, error) {
                        console.log(xhr)
                          alert("Oops. Something went wrong!");
                      },
                      complete: function() {
                      }
                    });
        
          
        
        
        
        
        
        
        
        
                  });
        
                  
          
            
                },
                error: function() {
                    alert("Oops. Something went wrong!");
                },
                complete: function() {
                }
              });



              
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

$(document).on("click", ".superuser_deactivate", function(e) {

        
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

          const Toast = Swal.mixin({
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
        
          Toast.fire({
            icon: 'success',
            title: 'Churches accepted successfully.'
          });

          
          var requestSection = document.querySelector('#accepted_churches');
          requestSection.innerHTML = '';


          var superuser = new FormData();
          superuser.append("superuser_function", "deactivated");
          superuser.append("data1", "");

          $.ajax({
            url: "ajax/async_superuser.ajax.php",
            method: "POST",
            data: superuser,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
    
       
                var imagePath = ""; // Default value
    
              answer.forEach(function (value, key) {
    
           
    
                var asyncImage = new FormData();
                asyncImage.append("image_purpose", "request");
                asyncImage.append("data1", value["churchID"]);
                asyncImage.append("data2", "");
    
                $.ajax({
                  url: "ajax/async_images.ajax.php",
                  method: "POST",
                  data: asyncImage,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function(image) {
                    console.log(image);

                    var asyncSuperuser = new FormData();
                    asyncSuperuser.append("superuser_function", "admin_details");
                    asyncSuperuser.append("data1",  value["churchID"]);

                    $.ajax({
                      url: "ajax/async_superuser.ajax.php",
                      method: "POST",
                      data: asyncSuperuser,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType: "json",
                      success: function(details) {
                         console.log(details);
  
                          if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                            
                            imagePath = "./views/images/default.png"; // Default value
          
          
          
          
                            const html = `
                            <div class="deactivatedChurch">
                              <div class="d-flex align-items-center gap-3">
                                <div class="team-list">
                                  <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                </div>
                                <div class="flex-grow-1">
                                  <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                    <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                  </span>
                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                    <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                  </span>
                                </div>
                                <div class="">
                                  <button href="javascript:;" class="btn btn-outline-primary rounded-5 btn-sm px-3 btn-hover superuser_activate" value="${value["churchID"]}" >Activate</button>
                                </div>
                              </div>
                              <hr>
                            </div>
                          `;
                              requestSection.innerHTML += html;
                
                
                          } else {
                              imagePath = "./views/UploadAvatar/" + image["Avatar"];
          
                
          
                              const html = `
                              <div class="deactivatedChurch">
                                <div class="d-flex align-items-center gap-3">
                                  <div class="team-list">
                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                  </div>
                                  <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                      <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                    </span>
                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                      <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                    </span>
                                  </div>
                                  <div class="">
                                    <button href="javascript:;" class="btn btn-outline-primary rounded-5 btn-sm px-3 btn-hover superuser_activate" value="${value["churchID"]}" >Activate</button>
                                  </div>
                                </div>
                                <hr>
                              </div>
                            `;
                                requestSection.innerHTML += html;
                  
                  
                  
                          }
          
                          console.log(imagePath)
              




                        

                      },
                      error: function(xhr, status, error) {
                        console.log(xhr)
                          alert("Oops. Something went wrong!");
                      },
                      complete: function() {
                      }
                    });
        


       
  
            
      
            
                  },
                  error: function(xhr, status, error) {
                    console.log(xhr)
                      alert("Oops. Something went wrong!");
                  },
                  complete: function() {
                  }
                });
    
      
    
    
    
    
    
    
    
    
              });
    
              
      
        
            },
            error: function() {
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
          });


          var superuser = new FormData();
          superuser.append("superuser_function", "accepted");
          superuser.append("data1", "");

          $.ajax({
            url: "ajax/async_superuser.ajax.php",
            method: "POST",
            data: superuser,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
    
       
                var imagePath = ""; // Default value
    
              answer.forEach(function (value, key) {
    
           
    
                var asyncImage = new FormData();
                asyncImage.append("image_purpose", "request");
                asyncImage.append("data1", value["churchID"]);
                asyncImage.append("data2", "");
    
                $.ajax({
                  url: "ajax/async_images.ajax.php",
                  method: "POST",
                  data: asyncImage,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function(image) {
                    console.log(image);

                    var asyncSuperuser = new FormData();
                    asyncSuperuser.append("superuser_function", "admin_details");
                    asyncSuperuser.append("data1",  value["churchID"]);

                    $.ajax({
                      url: "ajax/async_superuser.ajax.php",
                      method: "POST",
                      data: asyncSuperuser,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType: "json",
                      success: function(details) {
                         console.log(details);
  
                          if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                            
                            imagePath = "./views/images/default.png"; // Default value
          
          
          
          
                            const html = `
                              <div class="churchApprove">
                                <div class="d-flex align-items-center gap-3">
                                  <div class="team-list">
                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                  </div>
                                  <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                      <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                    </span>
                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                      <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                    </span>
                                    <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary">
                                      <i class="bi bi-calendar-check-fill"></i> ${value['status_date']}
                                    </span>
                                  </div>
                                  <div class="">
                                    <button href="javascript:;" class="btn btn-outline-danger rounded-5 btn-sm px-3 btn-hover superuser_deactivate" value="${value["churchID"]}">Deactivate</button>
                                  </div>
                                </div>
                                <hr>
                              </div>
                            `;
                              requestSection.innerHTML += html;
                
                
                          } else {
                              imagePath = "./views/UploadAvatar/" + image["Avatar"];
          
                
          
                            
                              const html = `
                              <div class="churchApprove">
                                <div class="d-flex align-items-center gap-3">
                                  <div class="team-list">
                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                  </div>
                                  <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                      <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                    </span>
                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                      <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                    </span>
                                    <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary">
                                      <i class="bi bi-calendar-check-fill"></i> ${value['status_date']}
                                    </span>
                                  </div>
                                  <div class="">
                                    <button href="javascript:;" class="btn btn-outline-danger rounded-5 btn-sm px-3 btn-hover superuser_deactivate" value="${value["churchID"]}">Deactivate</button>
                                  </div>
                                </div>
                                <hr>
                              </div>
                            `;
                                requestSection.innerHTML += html;
                  
                  
                  
                          }
          
                          console.log(imagePath)
              




                        

                      },
                      error: function(xhr, status, error) {
                        console.log(xhr)
                          alert("Oops. Something went wrong!");
                      },
                      complete: function() {
                      }
                    });
        


       
  
            
      
            
                  },
                  error: function(xhr, status, error) {
                    console.log(xhr)
                      alert("Oops. Something went wrong!");
                  },
                  complete: function() {
                  }
                });
    
      
    
    
    
    
    
    
    
    
              });
    
              
      
        
            },
            error: function() {
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
          });




        
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

    $(document).on("click", ".superuser_activate", function(e) {
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

            const Toast = Swal.mixin({
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
          
            Toast.fire({
              icon: 'success',
              title: 'Church activated successfully.'
            });

            var requestSection = document.querySelector('#accepted_churches');
            requestSection.innerHTML = '';
  
  
            var superuser = new FormData();
            superuser.append("superuser_function", "deactivated");
            superuser.append("data1", "");
  
            $.ajax({
              url: "ajax/async_superuser.ajax.php",
              method: "POST",
              data: superuser,
              cache: false,
              contentType: false,
              processData: false,
              dataType: "json",
              success: function(answer) {
      
         
                  var imagePath = ""; // Default value
      
                answer.forEach(function (value, key) {
      
             
      
                  var asyncImage = new FormData();
                  asyncImage.append("image_purpose", "request");
                  asyncImage.append("data1", value["churchID"]);
                  asyncImage.append("data2", "");
      
                  $.ajax({
                    url: "ajax/async_images.ajax.php",
                    method: "POST",
                    data: asyncImage,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(image) {
                      console.log(image);
  
                      var asyncSuperuser = new FormData();
                      asyncSuperuser.append("superuser_function", "admin_details");
                      asyncSuperuser.append("data1",  value["churchID"]);
  
                      $.ajax({
                        url: "ajax/async_superuser.ajax.php",
                        method: "POST",
                        data: asyncSuperuser,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(details) {
                           console.log(details);
    
                            if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                              
                              imagePath = "./views/images/default.png"; // Default value
            
            
            
            
                              const html = `
                              <div class="deactivatedChurch">
                                <div class="d-flex align-items-center gap-3">
                                  <div class="team-list">
                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                  </div>
                                  <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                      <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                    </span>
                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                      <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                    </span>
                                  </div>
                                  <div class="">
                                    <button href="javascript:;" class="btn btn-outline-primary rounded-5 btn-sm px-3 btn-hover superuser_activate" value="${value["churchID"]}" >Activate</button>
                                  </div>
                                </div>
                                <hr>
                              </div>
                            `;
                                requestSection.innerHTML += html;
                  
                  
                            } else {
                                imagePath = "./views/UploadAvatar/" + image["Avatar"];
            
                  
            
                                const html = `
                                <div class="deactivatedChurch">
                                  <div class="d-flex align-items-center gap-3">
                                    <div class="team-list">
                                      <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                    </div>
                                    <div class="flex-grow-1">
                                      <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                        <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                      </span>
                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                        <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                      </span>
                                    </div>
                                    <div class="">
                                      <button href="javascript:;" class="btn btn-outline-primary rounded-5 btn-sm px-3 btn-hover superuser_activate" value="${value["churchID"]}" >Activate</button>
                                    </div>
                                  </div>
                                  <hr>
                                </div>
                              `;
                                  requestSection.innerHTML += html;
                    
                    
                    
                            }
            
                            console.log(imagePath)
                
  
  
  
  
                          
  
                        },
                        error: function(xhr, status, error) {
                          console.log(xhr)
                            alert("Oops. Something went wrong!");
                        },
                        complete: function() {
                        }
                      });
          
  
  
         
    
              
        
              
                    },
                    error: function(xhr, status, error) {
                      console.log(xhr)
                        alert("Oops. Something went wrong!");
                    },
                    complete: function() {
                    }
                  });
      
        
      
      
      
      
      
      
      
      
                });
      
                
        
          
              },
              error: function() {
                  alert("Oops. Something went wrong!");
              },
              complete: function() {
              }
            });
  
  
            var superuser = new FormData();
            superuser.append("superuser_function", "accepted");
            superuser.append("data1", "");
  
            $.ajax({
              url: "ajax/async_superuser.ajax.php",
              method: "POST",
              data: superuser,
              cache: false,
              contentType: false,
              processData: false,
              dataType: "json",
              success: function(answer) {
      
         
                  var imagePath = ""; // Default value
      
                answer.forEach(function (value, key) {
      
             
      
                  var asyncImage = new FormData();
                  asyncImage.append("image_purpose", "request");
                  asyncImage.append("data1", value["churchID"]);
                  asyncImage.append("data2", "");
      
                  $.ajax({
                    url: "ajax/async_images.ajax.php",
                    method: "POST",
                    data: asyncImage,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(image) {
                      console.log(image);
  
                      var asyncSuperuser = new FormData();
                      asyncSuperuser.append("superuser_function", "admin_details");
                      asyncSuperuser.append("data1",  value["churchID"]);
  
                      $.ajax({
                        url: "ajax/async_superuser.ajax.php",
                        method: "POST",
                        data: asyncSuperuser,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(details) {
                           console.log(details);
    
                            if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                              
                              imagePath = "./views/images/default.png"; // Default value
            
            
            
            
                              const html = `
                                <div class="churchApprove">
                                  <div class="d-flex align-items-center gap-3">
                                    <div class="team-list">
                                      <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                    </div>
                                    <div class="flex-grow-1">
                                      <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                        <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                      </span>
                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                        <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                      </span>
                                      <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary">
                                        <i class="bi bi-calendar-check-fill"></i> ${value['status_date']}
                                      </span>
                                    </div>
                                    <div class="">
                                      <button href="javascript:;" class="btn btn-outline-danger rounded-5 btn-sm px-3 btn-hover superuser_deactivate" value="${value["churchID"]}">Deactivate</button>
                                    </div>
                                  </div>
                                  <hr>
                                </div>
                              `;
                                requestSection.innerHTML += html;
                  
                  
                            } else {
                                imagePath = "./views/UploadAvatar/" + image["Avatar"];
            
                  
            
                              
                                const html = `
                                <div class="churchApprove">
                                  <div class="d-flex align-items-center gap-3">
                                    <div class="team-list">
                                      <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                    </div>
                                    <div class="flex-grow-1">
                                      <h6 class="mb-1 fw-bold">${value["church_name"]}</h6>
                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                        <i class="bx bx-map-pin"></i> ${details["church_province"]}, ${details["church_city"]}
                                      </span>
                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">
                                        <i class="bx bx-map-pin"></i> ${details["church_barangay"]}, ${details["church_street"]}
                                      </span>
                                      <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary">
                                        <i class="bi bi-calendar-check-fill"></i> ${value['status_date']}
                                      </span>
                                    </div>
                                    <div class="">
                                      <button href="javascript:;" class="btn btn-outline-danger rounded-5 btn-sm px-3 btn-hover superuser_deactivate" value="${value["churchID"]}">Deactivate</button>
                                    </div>
                                  </div>
                                  <hr>
                                </div>
                              `;
                                  requestSection.innerHTML += html;
                    
                    
                    
                            }
            
                            console.log(imagePath)
                
  
  
  
  
                          
  
                        },
                        error: function(xhr, status, error) {
                          console.log(xhr)
                            alert("Oops. Something went wrong!");
                        },
                        complete: function() {
                        }
                      });
          
  
  
         
    
              
        
              
                    },
                    error: function(xhr, status, error) {
                      console.log(xhr)
                        alert("Oops. Something went wrong!");
                    },
                    complete: function() {
                    }
                  });
      
        
      
      
      
      
      
      
      
      
                });
      
                
        
          
              },
              error: function() {
                  alert("Oops. Something went wrong!");
              },
              complete: function() {
              }
            });
  
 

           
         
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







