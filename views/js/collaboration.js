function search(query) {
  var results = [];
  query = query.toLowerCase();

  var donationData = new FormData();
  donationData.append("donation_number", donation_number);
 
  
  $.ajax({
    url: "collaboration.controller.php",
    method: "GET",
    data: {
      method: "searchChurches",
      query: query
    },
    dataType: "json",
    success: function(response) {
      results = response;
      displayResults(results);
    },
    error: function() {
      alert("Oops. Something went wrong!");
    }
  });

  return results;
}


$("#searchBar").on("keyup", function() {
  var churchName = $(this).val().trim();
  var searchResults = $("#searchResults");

  if (churchName === "") {
    searchResults.empty();
    searchResults.hide(); // Hide the dropdown-menu
    return;
  }

  var churchData = new FormData();
  churchData.append("churchName", churchName);

  $.ajax({
    url: "ajax/searchChurch.ajax.php",
    method: "POST",
    data: churchData,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(answer) {
      console.log(answer);

      searchResults.empty(); // Clear existing search results

      answer.forEach(function(element) {
        var listItem = $("<li>").addClass("list-group-item").text(element.church_name).attr("church_id", element.churchID);
        searchResults.append(listItem);

        // Autocomplete input field on click
        listItem.on("click", function() {
          $("#searchBar").val($(this).text());
          $("#searchBar").attr("church_id", $(this).attr("church_id"));
          searchResults.hide(); // Hide the dropdown-menu
        });
      });

      searchResults.show(); // Show the dropdown-menu
    },
    error: function() {
      alert("Oops. Something went wrong!");
    },
    complete: function() {
    }
  });
});


$("#sendRequestBtn").on("click", function() {
  var churchName = $("#searchBar").val();
  var churchID = $("#searchBar").attr("church_id");

  var churchData = new FormData();
  churchData.append("churchName", churchName);
  churchData.append("churchid2", churchID);



  // Show a SweetAlert confirmation dialog
  Swal.fire({
    title: 'Confirmation',
    text: 'Are you sure you want to send a collaboration request to this church?',
    icon: 'info',
    showCancelButton: true,
    confirmButtonText: 'Yes, send request',
    cancelButtonText: 'No, cancel'
  }).then((result) => {
    if (result.isConfirmed) {
      // The user clicked the confirm button

      $.ajax({
        url: "ajax/add_collaboration.ajax.php",
        method: "POST",
        data: churchData,
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
          title: 'Collaboration Request sent succesfully.'
        });

      var asyncCollab = new FormData();
      asyncCollab.append("collab_section", "request");
      $.ajax({
        url: "ajax/async_collaboration.ajax.php",
        method: "POST",
        data: asyncCollab,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(answer) {

            var requestSection = document.querySelector('.pending_section_admin');
            requestSection.innerHTML = '';
            var imagePath = ""; // Default value

          answer.forEach(function (value, key) {

       

            var asyncImage = new FormData();
            asyncImage.append("image_purpose", "request");
            asyncImage.append("data1",  value['churchid2']);
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
   

                if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                  
                  imagePath = "./views/images/default.png"; // Default value




                  var html = `
                      <div class="searchRequestChurch">
                          <div class="team-list reqlist m-3">
                              <div class="d-flex align-items-center gap-3">
                                  <div class="">
                                      <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                  </div>
                                  <div class="flex-grow-1">
                                      <h6 class="mb-1 fw-bold">${value.churchname2}</h6>
                                      <span class="badge bg-warning bg-warning-subtle text-warning border border-opacity-25 border-warning">Pending Request</span>
                                  </div>
                                  <div class="">
                                      <input type="text" id="church_id" value="${value.collabID}" churchid="${value.churchid2}" churchname="${value.churchname2}" style="display:none;">
                                      <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                      <button class="btn btn-outline-danger rounded-5 btn-sm px-3cancelPending">Cancel </button>
                                  </div>
                              </div>
                              <hr>
                          </div>
                      </div>`;
      
                    requestSection.innerHTML += html;
      
      
                } else {
                    imagePath = "./views/UploadAvatar/" + image["Avatar"];

       

                    var html = `
                        <div class="searchRequestChurch">
                            <div class="team-list reqlist m-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">${value.churchname2}</h6>
                                        <span class="badge bg-warning bg-warning-subtle text-warning border border-opacity-25 border-warning">Pending Request</span>
                                    </div>
                                    <div class="">
                                        <input type="text" id="church_id" value="${value.collabID}" churchid="${value.churchid2}" churchname="${value.churchname2}" style="display:none;">
                                        <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                        <button class="btn btn-outline-danger rounded-5 btn-sm px-3 cancelPending">Cancel </button>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>`;
        
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

  








          });

          
  
    
        },
        error: function() {
            alert("Oops. Something went wrong!");
        },
        complete: function() {
        }
      });

      $("#exampleVerticallycenteredModal").modal('hide');
        $("#report_accountID").val('');

        $("#searchBar").val('');

          // You can handle the response as needed
        },
        error: function() {
          alert("Oops. Something went wrong!");
        },
        complete: function() {
          // You can add any completion logic here
        }
      });
    }
  });
});


$(document).on('click', '.cancelPending', function() {
  var collabID = $(this).siblings('input').first().val();

  // Show a SweetAlert confirmation dialog
  Swal.fire({
    title: 'Are you sure?',
    text: 'Do you really want to cancel this request?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, cancel it!',
    cancelButtonText: 'No, keep it'
  }).then((result) => {
    if (result.isConfirmed) {
      // The user clicked the confirm button
      var cancelStatus = new FormData();
      cancelStatus.append("collabID", collabID);

      $.ajax({
        url: "ajax/cancel_request.ajax.php",
        method: "POST",
        data: cancelStatus,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
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
            title: 'Request cancelled successfully.'
          });

          $("#report_accountID").val('');

          var asyncCollab = new FormData();
          asyncCollab.append("collab_section", "request");
          $.ajax({
            url: "ajax/async_collaboration.ajax.php",
            method: "POST",
            data: asyncCollab,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
    
                var requestSection = document.querySelector('.pending_section_admin');
                requestSection.innerHTML = '';
                var imagePath = ""; // Default value
    
              answer.forEach(function (value, key) {
    
           
    
                var asyncImage = new FormData();
                asyncImage.append("image_purpose", "request");
                asyncImage.append("data1",  value['churchid2']);
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
       
    
                    if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                      
                      imagePath = "./views/images/default.png"; // Default value
    
    
    
    
                      var html = `
                          <div class="searchRequestChurch">
                              <div class="team-list reqlist m-3">
                                  <div class="d-flex align-items-center gap-3">
                                      <div class="">
                                          <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                      </div>
                                      <div class="flex-grow-1">
                                          <h6 class="mb-1 fw-bold">${value.churchname2}</h6>
                                          <span class="badge bg-warning bg-warning-subtle text-warning border border-opacity-25 border-warning">Pending Request</span>
                                      </div>
                                      <div class="">
                                          <input type="text" id="church_id" value="${value.collabID}" churchid="${value.churchid2}" churchname="${value.churchname2}" style="display:none;">
                                          <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                          <button class="btn btn-outline-danger rounded-5 btn-sm px-3cancelPending">Cancel </button>
                                      </div>
                                  </div>
                                  <hr>
                              </div>
                          </div>`;
          
                        requestSection.innerHTML += html;
          
          
                    } else {
                        imagePath = "./views/UploadAvatar/" + image["Avatar"];
    
           
    
                        var html = `
                            <div class="searchRequestChurch">
                                <div class="team-list reqlist m-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-bold">${value.churchname2}</h6>
                                            <span class="badge bg-warning bg-warning-subtle text-warning border border-opacity-25 border-warning">Pending Request</span>
                                        </div>
                                        <div class="">
                                            <input type="text" id="church_id" value="${value.collabID}" churchid="${value.churchid2}" churchname="${value.churchname2}" style="display:none;">
                                            <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                            <button class="btn btn-outline-danger rounded-5 btn-sm px-3 cancelPending">Cancel </button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>`;
            
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
        }
      });
    }
  });
});

$(document).ready(function() {
  $(document).on('click', '.acceptAll', function() {
    Swal.fire({
      title: 'Confirm Acceptance',
      text: 'Are you sure you want to accept all collaboration requests?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, accept all!',
      cancelButtonText: 'No, decline'
    }).then((result) => {
      if (result.isConfirmed) {
        var acceptAllData = [];

        $(".acceptCollab").each(function() {
          var collabID = $(this).siblings('input').first().val();
          var churchID = $(this).siblings('input').first().attr("churchid");
          var church_name = $(this).siblings('input').first().attr("churchname");

          acceptAllData.push({
            collabID: collabID,
            churchID: churchID,
            church_name: church_name
          });
        });

        if (acceptAllData.length > 0) {
          acceptCollabs(acceptAllData);
        }
      }
    });
  });
  
  $(document).on('click', '.acceptCollab', function() {
        var collabID = $(this).siblings('input').first().val();
        var churchID = $(this).siblings('input').first().attr("churchid");
        var church_name = $(this).siblings('input').first().attr("churchname");

        acceptCollab(collabID, churchID, church_name);
    });

    function acceptCollab(collabID, churchID, church_name) {
        var acceptCollab = new FormData();
        acceptCollab.append("collabID", collabID);
        acceptCollab.append("churchID", churchID);
        acceptCollab.append("church_name", church_name);

        Swal.fire({
            title: 'Confirm Acceptance',
            text: 'Are you sure you want to accept this collaboration request?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, accept it!',
            cancelButtonText: 'No, decline'
        }).then((result) => {
            if (result.isConfirmed) {
                // User confirmed acceptance, proceed with AJAX request
                $.ajax({
                    url: "ajax/accept_collaboration.ajax.php",
                    method: "POST",
                    data: acceptCollab,
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
                          title: 'Collaboration accepted successfully.'
                        });
             

                        var storage = firebase.storage();
                        var folderRef = storage.ref(collabID + "/.placeholder");

                        folderRef.putString("", "raw")
                            .then(function () {
                                console.log("Folder created:", collabID + "/.placeholder");
                            })
                            .catch(function (error) {
                                console.log("Error:", error);
                            });

                            var asyncCollab = new FormData();
                            asyncCollab.append("collab_section", "church_collab");
                            $.ajax({
                              url: "ajax/async_collaboration.ajax.php",
                              method: "POST",
                              data: asyncCollab,
                              cache: false,
                              contentType: false,
                              processData: false,
                              dataType: "json",
                              success: function(answer) {
                                console.log(answer);
                      
                                  var requestSection = document.querySelector('#churchList');
                                  requestSection.innerHTML = '';
                                  var imagePath = ""; // Default value
                      
                                answer.forEach(function (value, key) {
                      
                             
                      
                                  var asyncImage = new FormData();
                                  asyncImage.append("image_purpose", "request");
                                  asyncImage.append("data1",  value['churchid1']);
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
                                      asyncSuperuser.append("data1",  value['churchid1']);
                  
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
                            
                            
                            
                            
                                              const churchCollabHTML = `
                                              <div class="church_Collab">
                                                  <div class="team-list m-3" data-churchname="${value['churchname1']}">
                                                      <div class="d-flex align-items-center gap-3">
                                                          <div class="">
                                                              <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                          </div>
                                                          <div class="flex-grow-1">
                                                              <h6 class="mb-1 fw-bold">${value['churchname1']}</h6>
                                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                                          </div>
                                                          <div class="">
                                                              <input type="text" id="church_id" value="${value['collabID']}" churchid="${value['churchid1']}" churchname="${value['churchname1']}" style="display:none;">
                                                              <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                                              <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptCollab">Accept</button>
                                                              <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectCollab">Reject</button>
                                                          </div>
                                                      </div>
                                                      <hr>
                                                  </div>
                                              </div>
                                              `;
                                                requestSection.innerHTML += churchCollabHTML;
                                  
                                  
                                            } else {
                                                imagePath = "./views/UploadAvatar/" + image["Avatar"];
                            
                                  
                            
                                                const churchCollabHTML = `
                                                <div class="church_Collab">
                                                    <div class="team-list m-3" data-churchname="${value['churchname1']}">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="">
                                                                <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h6 class="mb-1 fw-bold">${value['churchname1']}</h6>
                                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                                            </div>
                                                            <div class="">
                                                                <input type="text" id="church_id" value="${value['collabID']}" churchid="${value['churchid1']}" churchname="${value['churchname1']}" style="display:none;">
                                                                <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                                                <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptCollab">Accept</button>
                                                                <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectCollab">Reject</button>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                `;
                                                  requestSection.innerHTML += churchCollabHTML;
                                    
                                    
                                    
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

                            var asyncCollab = new FormData();
                            asyncCollab.append("collab_section", "accepted_collab");
                            $.ajax({
                              url: "ajax/async_collaboration.ajax.php",
                              method: "POST",
                              data: asyncCollab,
                              cache: false,
                              contentType: false,
                              processData: false,
                              dataType: "json",
                              success: function(answer) {
                                console.log(answer);
                      
                                  var requestSection = document.querySelector('.accepted_collab_section');
                                  requestSection.innerHTML = '';
                                  var imagePath = ""; // Default value
                      
                                answer.forEach(function (value, key) {

                                  var churchid, churchname;

                                  if (value['churchid1'] !== undefined && value['churchname1'] !== undefined) {
                                      churchid = value['churchid1'];
                                      churchname = value['churchname1'];
                                  } else if (value['churchid2'] !== undefined && value['churchname2'] !== undefined) {
                                      churchid = value['churchid2'];
                                      churchname = value['churchname2'];
                                  }
                      
                             
                      
                                  var asyncImage = new FormData();
                                  asyncImage.append("image_purpose", "request");
                                  asyncImage.append("data1",  churchid);
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
                                      asyncSuperuser.append("data1",  churchid);
                  
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
                                              <div class="Affill_church_Collab">
                                                  <div class="team-list m-3">
                                                      <div class="d-flex  align-items-center gap-3">
                                                          <div class="">
                                                              <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                          </div>
                                                          <div class="flex-grow-1">
                                                              <h6 class="mb-1 fw-bold">${churchname}</h6>
                                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    ${details["church_province"]}, ${details["church_city"]}</span>
                                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    ${details["church_barangay"]}, ${details["church_street"]}</span>
                                                              <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bi bi-calendar-check-fill"></i>  ${value['collabdate']}</span>
                                                          </div>
                                                          <div class="">
                                                              <input type="text" name="trans_type" id="church_id" value="${value['collabID']}" name="church_id" style="display:none;" required>
                                                              <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeCollab">Remove</button>
                                                          </div>
                                                      </div>
                                                      <hr>
                                                  </div>
                                              </div>
                                              `;
                                              
                                                requestSection.innerHTML += html;
                                  
                                  
                                            } else {
                                                imagePath = "./views/UploadAvatar/" + image["Avatar"];
                            
                                  
                            
                                                const html = `
                                                <div class="Affill_church_Collab">
                                                    <div class="team-list m-3">
                                                        <div class="d-flex  align-items-center gap-3">
                                                            <div class="">
                                                                <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h6 class="mb-1 fw-bold">${churchname}</h6>
                                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    ${details["church_province"]}, ${details["church_city"]}</span>
                                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    ${details["church_barangay"]}, ${details["church_street"]}</span>
                                                                <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bi bi-calendar-check-fill"></i>  ${value['collabdate']}</span>
                                                            </div>
                                                            <div class="">
                                                                <input type="text" name="trans_type" id="church_id" value="${value['collabID']}" name="church_id" style="display:none;" required>
                                                                <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeCollab">Remove</button>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
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
    }

    function acceptCollabs(dataArray) {
        var acceptAllData = new FormData();
        acceptAllData.append("dataArray", JSON.stringify(dataArray));

        $.ajax({
            url: "ajax/accept_all_collaborations.ajax.php",
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
                  title: 'All collaboration requests have been accepted successfully.'
                });

                var asyncCollab = new FormData();
                asyncCollab.append("collab_section", "church_collab");
      
                $.ajax({
                  url: "ajax/async_collaboration.ajax.php",
                  method: "POST",
                  data: asyncCollab,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function(answer) {
                    console.log(answer);
          
                      var requestSection = document.querySelector('#churchList');
                      requestSection.innerHTML = '';
                      var imagePath = ""; // Default value
          
                    answer.forEach(function (value, key) {
          
                 
          
                      var asyncImage = new FormData();
                      asyncImage.append("image_purpose", "request");
                      asyncImage.append("data1",  value['churchid1']);
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
                          asyncSuperuser.append("data1",  value['churchid1']);
      
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
                
                
                
                
                                  const churchCollabHTML = `
                                  <div class="church_Collab">
                                      <div class="team-list m-3" data-churchname="${value['churchname1']}">
                                          <div class="d-flex align-items-center gap-3">
                                              <div class="">
                                                  <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                              </div>
                                              <div class="flex-grow-1">
                                                  <h6 class="mb-1 fw-bold">${value['churchname1']}</h6>
                                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                              </div>
                                              <div class="">
                                                  <input type="text" id="church_id" value="${value['collabID']}" churchid="${value['churchid1']}" churchname="${value['churchname1']}" style="display:none;">
                                                  <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                                  <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptCollab">Accept</button>
                                                  <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectCollab">Reject</button>
                                              </div>
                                          </div>
                                          <hr>
                                      </div>
                                  </div>
                                  `;
                                    requestSection.innerHTML += churchCollabHTML;
                      
                      
                                } else {
                                    imagePath = "./views/UploadAvatar/" + image["Avatar"];
                
                      
                
                                    const churchCollabHTML = `
                                    <div class="church_Collab">
                                        <div class="team-list m-3" data-churchname="${value['churchname1']}">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-bold">${value['churchname1']}</h6>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                                </div>
                                                <div class="">
                                                    <input type="text" id="church_id" value="${value['collabID']}" churchid="${value['churchid1']}" churchname="${value['churchname1']}" style="display:none;">
                                                    <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                                    <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptCollab">Accept</button>
                                                    <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectCollab">Reject</button>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    `;
                                      requestSection.innerHTML += churchCollabHTML;
                        
                        
                        
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

                var asyncCollab = new FormData();
                asyncCollab.append("collab_section", "accepted_collab");
                $.ajax({
                  url: "ajax/async_collaboration.ajax.php",
                  method: "POST",
                  data: asyncCollab,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function(answer) {
                    console.log(answer);
          
                      var requestSection = document.querySelector('.accepted_collab_section');
                      requestSection.innerHTML = '';
                      var imagePath = ""; // Default value
          
                    answer.forEach(function (value, key) {

                      var churchid, churchname;

                      if (value['churchid1'] !== undefined && value['churchname1'] !== undefined) {
                          churchid = value['churchid1'];
                          churchname = value['churchname1'];
                      } else if (value['churchid2'] !== undefined && value['churchname2'] !== undefined) {
                          churchid = value['churchid2'];
                          churchname = value['churchname2'];
                      }
          
                 
          
                      var asyncImage = new FormData();
                      asyncImage.append("image_purpose", "request");
                      asyncImage.append("data1",  churchid);
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
                          asyncSuperuser.append("data1",  churchid);
      
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
                                  <div class="Affill_church_Collab">
                                      <div class="team-list m-3">
                                          <div class="d-flex  align-items-center gap-3">
                                              <div class="">
                                                  <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                              </div>
                                              <div class="flex-grow-1">
                                                  <h6 class="mb-1 fw-bold">${churchname}</h6>
                                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    ${details["church_province"]}, ${details["church_city"]}</span>
                                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    ${details["church_barangay"]}, ${details["church_street"]}</span>
                                                  <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bi bi-calendar-check-fill"></i>  ${value['collabdate']}</span>
                                              </div>
                                              <div class="">
                                                  <input type="text" name="trans_type" id="church_id" value="${value['collabID']}" name="church_id" style="display:none;" required>
                                                  <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeCollab">Remove</button>
                                              </div>
                                          </div>
                                          <hr>
                                      </div>
                                  </div>
                                  `;
                                  
                                    requestSection.innerHTML += html;
                      
                      
                                } else {
                                    imagePath = "./views/UploadAvatar/" + image["Avatar"];
                
                      
                
                                    const html = `
                                    <div class="Affill_church_Collab">
                                        <div class="team-list m-3">
                                            <div class="d-flex  align-items-center gap-3">
                                                <div class="">
                                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-bold">${churchname}</h6>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    ${details["church_province"]}, ${details["church_city"]}</span>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    ${details["church_barangay"]}, ${details["church_street"]}</span>
                                                    <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bi bi-calendar-check-fill"></i>  ${value['collabdate']}</span>
                                                </div>
                                                <div class="">
                                                    <input type="text" name="trans_type" id="church_id" value="${value['collabID']}" name="church_id" style="display:none;" required>
                                                    <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeCollab">Remove</button>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
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

$(document).on('click', '.rejectAll', function() {
  console.log("Clicked Reject All")
  var rejectAllData = [];

  $(".rejectCollab").each(function() {
    var collabID = $(this).siblings('input').first().val();
    var churchID = $(this).siblings('input').first().attr("churchid");
    var church_name = $(this).siblings('input').first().attr("churchname");

    rejectAllData.push({
      collabID: collabID,
      churchID: churchID,
      church_name: church_name
    });
  });

  if (rejectAllData.length > 0) {
    rejectCollabs(rejectAllData);
  }
});

$(document).on('click', '.rejectCollab', function() {
  var collabID = $(this).siblings('input').first().val();
  var churchID = $(this).siblings('input').first().attr("churchid");
  var church_name = $(this).siblings('input').first().attr("churchname");

  rejectCollab(collabID, churchID, church_name);
});

function rejectCollab(collabID, churchID, church_name) {
  var rejectCollab = new FormData();
  rejectCollab.append("collabID", collabID);
  rejectCollab.append("churchID", churchID);
  rejectCollab.append("church_name", church_name);


  Swal.fire({
    title: 'Confirm Rejection',
    text: 'Are you sure you want to reject this collaboration request?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, reject it!',
    cancelButtonText: 'No, keep it'
  }).then((result) => {
    if (result.isConfirmed) {
      // User confirmed rejection, proceed with AJAX request
      $.ajax({
        url: "ajax/reject_collaboration.ajax.php",
        method: "POST",
        data: rejectCollab,
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
            title: 'Collaboration rejected successfully.'
          });

          var asyncCollab = new FormData();
          asyncCollab.append("collab_section", "church_collab");

          $.ajax({
            url: "ajax/async_collaboration.ajax.php",
            method: "POST",
            data: asyncCollab,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
              console.log(answer);
    
                var requestSection = document.querySelector('#churchList');
                requestSection.innerHTML = '';
                var imagePath = ""; // Default value
    
              answer.forEach(function (value, key) {
    
           
    
                var asyncImage = new FormData();
                asyncImage.append("image_purpose", "request");
                asyncImage.append("data1",  value['churchid1']);
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
                    asyncSuperuser.append("data1",  value['churchid1']);

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
          
          
          
          
                            const churchCollabHTML = `
                            <div class="church_Collab">
                                <div class="team-list m-3" data-churchname="${value['churchname1']}">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-bold">${value['churchname1']}</h6>
                                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                        </div>
                                        <div class="">
                                            <input type="text" id="church_id" value="${value['collabID']}" churchid="${value['churchid1']}" churchname="${value['churchname1']}" style="display:none;">
                                            <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                            <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptCollab">Accept</button>
                                            <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectCollab">Reject</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            `;
                              requestSection.innerHTML += churchCollabHTML;
                
                
                          } else {
                              imagePath = "./views/UploadAvatar/" + image["Avatar"];
          
                
          
                              const churchCollabHTML = `
                              <div class="church_Collab">
                                  <div class="team-list m-3" data-churchname="${value['churchname1']}">
                                      <div class="d-flex align-items-center gap-3">
                                          <div class="">
                                              <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                          </div>
                                          <div class="flex-grow-1">
                                              <h6 class="mb-1 fw-bold">${value['churchname1']}</h6>
                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                          </div>
                                          <div class="">
                                              <input type="text" id="church_id" value="${value['collabID']}" churchid="${value['churchid1']}" churchname="${value['churchname1']}" style="display:none;">
                                              <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                              <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptCollab">Accept</button>
                                              <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectCollab">Reject</button>
                                          </div>
                                      </div>
                                      <hr>
                                  </div>
                              </div>
                              `;
                                requestSection.innerHTML += churchCollabHTML;
                  
                  
                  
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

          // Rejected Collaboration Section
          var asyncCollab = new FormData();
          asyncCollab.append("collab_section", "reject_collab");

            $.ajax({
              url: "ajax/async_collaboration.ajax.php",
              method: "POST",
              data: asyncCollab,
              cache: false,
              contentType: false,
              processData: false,
              dataType: "json",
              success: function(answer) {
                console.log(answer);
      
                  var requestSection = document.querySelector('.rejected_collab_section');
                  requestSection.innerHTML = '';
                  var imagePath = ""; // Default value
      
                answer.forEach(function (value, key) {

                  var churchid, churchname;

                  if (value['churchid1'] !== undefined && value['churchname1'] !== undefined) {
                    churchid = value['churchid1'];
                    churchname = value['churchname1'];
                } else if (value['churchid2'] !== undefined && value['churchname2'] !== undefined) {
                    churchid = value['churchid2'];
                    churchname = value['churchname2'];
                }
            
      
                  var asyncImage = new FormData();
                  asyncImage.append("image_purpose", "request");
                  asyncImage.append("data1", churchid);
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
                      asyncSuperuser.append("data1",  churchid);

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
            
            
            
                                  const rejectChurchCollabHTML = `
                                  <div class="Reject_church_Collab">
                                      <div class="team-list pb-2 m-3">
                                          <div class="d-flex align-items-center gap-3">
                                              <div class="">
                                                  <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                              </div>
                                              <div class="flex-grow-1">
                                                  <h6 class="mb-1 fw-bold">${churchname}</h6>
                                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                                  <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary">${value['collabdate']}</span>
                                              </div>
                                              <div class="">
                                                  <input type="text" id="church_id" value="${value['collabID']}" churchid="${churchid}" style="display:none;">
                                                  <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                              </div>
                                          </div>
                                      </div>
                                      <hr>
                                  </div>
                              `;
                                requestSection.innerHTML += rejectChurchCollabHTML;
                  
                  
                            } else {
                                imagePath = "./views/UploadAvatar/" + image["Avatar"];
            
                  
            
                                const rejectChurchCollabHTML = `
                                <div class="Reject_church_Collab">
                                    <div class="team-list pb-2 m-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="">
                                                <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1 fw-bold">${churchname}</h6>
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                                <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary">${value['collabdate']}</span>
                                            </div>
                                            <div class="">
                                                <input type="text" id="church_id" value="${value['collabID']}" churchid="${churchid}" style="display:none;">
                                                <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            `;
                              requestSection.innerHTML += rejectChurchCollabHTML;
                    
                    
                    
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
}

function rejectCollabs(dataArray) {
  var rejectAllData = new FormData();
  rejectAllData.append("dataArray", JSON.stringify(dataArray));

  Swal.fire({
    title: 'Confirm Rejection',
    text: 'Are you sure you want to reject all collaboration requests?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, reject all!',
    cancelButtonText: 'No, keep them'
  }).then((result) => {
    if (result.isConfirmed) {
      // User confirmed rejection, proceed with AJAX request
      $.ajax({
        url: "ajax/reject_all_collaborations.ajax.php",
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
            title: 'All collaboration requests have been rejected successfully.'
          });

          var asyncCollab = new FormData();
          asyncCollab.append("collab_section", "church_collab");

          $.ajax({
            url: "ajax/async_collaboration.ajax.php",
            method: "POST",
            data: asyncCollab,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
              console.log(answer);
    
                var requestSection = document.querySelector('#churchList');
                requestSection.innerHTML = '';
                var imagePath = ""; // Default value
    
              answer.forEach(function (value, key) {
    
           
    
                var asyncImage = new FormData();
                asyncImage.append("image_purpose", "request");
                asyncImage.append("data1",  value['churchid1']);
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
                    asyncSuperuser.append("data1",  value['churchid1']);

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
          
          
          
          
                            const churchCollabHTML = `
                            <div class="church_Collab">
                                <div class="team-list m-3" data-churchname="${value['churchname1']}">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-bold">${value['churchname1']}</h6>
                                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                        </div>
                                        <div class="">
                                            <input type="text" id="church_id" value="${value['collabID']}" churchid="${value['churchid1']}" churchname="${value['churchname1']}" style="display:none;">
                                            <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                            <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptCollab">Accept</button>
                                            <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectCollab">Reject</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            `;
                              requestSection.innerHTML += churchCollabHTML;
                
                
                          } else {
                              imagePath = "./views/UploadAvatar/" + image["Avatar"];
          
                
          
                              const churchCollabHTML = `
                              <div class="church_Collab">
                                  <div class="team-list m-3" data-churchname="${value['churchname1']}">
                                      <div class="d-flex align-items-center gap-3">
                                          <div class="">
                                              <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                          </div>
                                          <div class="flex-grow-1">
                                              <h6 class="mb-1 fw-bold">${value['churchname1']}</h6>
                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                              <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                          </div>
                                          <div class="">
                                              <input type="text" id="church_id" value="${value['collabID']}" churchid="${value['churchid1']}" churchname="${value['churchname1']}" style="display:none;">
                                              <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                              <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptCollab">Accept</button>
                                              <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectCollab">Reject</button>
                                          </div>
                                      </div>
                                      <hr>
                                  </div>
                              </div>
                              `;
                                requestSection.innerHTML += churchCollabHTML;
                  
                  
                  
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

                   // Rejected Collaboration Section
                   var asyncCollab = new FormData();
                   asyncCollab.append("collab_section", "reject_collab");
         
                     $.ajax({
                       url: "ajax/async_collaboration.ajax.php",
                       method: "POST",
                       data: asyncCollab,
                       cache: false,
                       contentType: false,
                       processData: false,
                       dataType: "json",
                       success: function(answer) {
                         console.log(answer);
               
                           var requestSection = document.querySelector('.rejected_collab_section');
                           requestSection.innerHTML = '';
                           var imagePath = ""; // Default value
               
                         answer.forEach(function (value, key) {
         
                           var churchid, churchname;
         
                           if (value['churchid1'] !== undefined && value['churchname1'] !== undefined) {
                             churchid = value['churchid1'];
                             churchname = value['churchname1'];
                         } else if (value['churchid2'] !== undefined && value['churchname2'] !== undefined) {
                             churchid = value['churchid2'];
                             churchname = value['churchname2'];
                         }
                     
               
                           var asyncImage = new FormData();
                           asyncImage.append("image_purpose", "request");
                           asyncImage.append("data1", churchid);
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
                               asyncSuperuser.append("data1",  churchid);
         
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
                     
                     
                     
                                           const rejectChurchCollabHTML = `
                                           <div class="Reject_church_Collab">
                                               <div class="team-list pb-2 m-3">
                                                   <div class="d-flex align-items-center gap-3">
                                                       <div class="">
                                                           <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                       </div>
                                                       <div class="flex-grow-1">
                                                           <h6 class="mb-1 fw-bold">${churchname}</h6>
                                                           <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                                           <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                                           <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary">${value['collabdate']}</span>
                                                       </div>
                                                       <div class="">
                                                           <input type="text" id="church_id" value="${value['collabID']}" churchid="${churchid}" style="display:none;">
                                                           <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                                       </div>
                                                   </div>
                                               </div>
                                               <hr>
                                           </div>
                                       `;
                                         requestSection.innerHTML += rejectChurchCollabHTML;
                           
                           
                                     } else {
                                         imagePath = "./views/UploadAvatar/" + image["Avatar"];
                     
                           
                     
                                         const rejectChurchCollabHTML = `
                                         <div class="Reject_church_Collab">
                                             <div class="team-list pb-2 m-3">
                                                 <div class="d-flex align-items-center gap-3">
                                                     <div class="">
                                                         <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                     </div>
                                                     <div class="flex-grow-1">
                                                         <h6 class="mb-1 fw-bold">${churchname}</h6>
                                                         <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                                         <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                                         <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary">${value['collabdate']}</span>
                                                     </div>
                                                     <div class="">
                                                         <input type="text" id="church_id" value="${value['collabID']}" churchid="${churchid}" style="display:none;">
                                                         <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                                     </div>
                                                 </div>
                                             </div>
                                             <hr>
                                         </div>
                                     `;
                                       requestSection.innerHTML += rejectChurchCollabHTML;
                             
                             
                             
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
}

$(document).on('click', '.removeCollab', function() {
  var collabID = $(this).siblings('input').first().val();

  // Show a SweetAlert confirmation dialog
  Swal.fire({
      title: 'Confirmation',
      text: 'Are you sure you want to remove this collaboration?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, remove collaboration',
      cancelButtonText: 'No, cancel'
  }).then((result) => {
      if (result.isConfirmed) {
          // The user clicked the confirm button

          var removeCollab = new FormData();
          removeCollab.append("collabID", collabID);

          $.ajax({
              url: "ajax/remove_collaboration.ajax.php",
              method: "POST",
              data: removeCollab,
              cache: false,
              contentType: false,
              processData: false,
              dataType: "json",
              success: function (answer) {
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
                  title: 'Collaboration removed successfully.'
                });
                console.log(answer);
                $("#report_accountID").val('');

                var asyncCollab = new FormData();
                asyncCollab.append("collab_section", "church_collab");
                $.ajax({
                  url: "ajax/async_collaboration.ajax.php",
                  method: "POST",
                  data: asyncCollab,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function(answer) {
                    console.log(answer);
          
                      var requestSection = document.querySelector('#churchList');
                      requestSection.innerHTML = '';
                      var imagePath = ""; // Default value
          
                    answer.forEach(function (value, key) {
          
                 
          
                      var asyncImage = new FormData();
                      asyncImage.append("image_purpose", "request");
                      asyncImage.append("data1",  value['churchid1']);
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
                          asyncSuperuser.append("data1",  value['churchid1']);
      
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
                
                
                
                
                                  const churchCollabHTML = `
                                  <div class="church_Collab">
                                      <div class="team-list m-3" data-churchname="${value['churchname1']}">
                                          <div class="d-flex align-items-center gap-3">
                                              <div class="">
                                                  <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                              </div>
                                              <div class="flex-grow-1">
                                                  <h6 class="mb-1 fw-bold">${value['churchname1']}</h6>
                                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                              </div>
                                              <div class="">
                                                  <input type="text" id="church_id" value="${value['collabID']}" churchid="${value['churchid1']}" churchname="${value['churchname1']}" style="display:none;">
                                                  <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                                  <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptCollab">Accept</button>
                                                  <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectCollab">Reject</button>
                                              </div>
                                          </div>
                                          <hr>
                                      </div>
                                  </div>
                                  `;
                                    requestSection.innerHTML += churchCollabHTML;
                      
                      
                                } else {
                                    imagePath = "./views/UploadAvatar/" + image["Avatar"];
                
                      
                
                                    const churchCollabHTML = `
                                    <div class="church_Collab">
                                        <div class="team-list m-3" data-churchname="${value['churchname1']}">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-bold">${value['churchname1']}</h6>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_province']}, ${details['church_city']}</span>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"></i> ${details['church_barangay']}, ${details['church_street']}</span>
                                                </div>
                                                <div class="">
                                                    <input type="text" id="church_id" value="${value['collabID']}" churchid="${value['churchid1']}" churchname="${value['churchname1']}" style="display:none;">
                                                    <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                                    <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptCollab">Accept</button>
                                                    <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectCollab">Reject</button>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    `;
                                      requestSection.innerHTML += churchCollabHTML;
                        
                        
                        
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

                var asyncCollab = new FormData();
                asyncCollab.append("collab_section", "accepted_collab");
                $.ajax({
                  url: "ajax/async_collaboration.ajax.php",
                  method: "POST",
                  data: asyncCollab,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function(answer) {
                    console.log(answer);
          
                      var requestSection = document.querySelector('.accepted_collab_section');
                      requestSection.innerHTML = '';
                      var imagePath = ""; // Default value
          
                    answer.forEach(function (value, key) {

                      var churchid, churchname;

                      if (value['churchid1'] !== undefined && value['churchname1'] !== undefined) {
                          churchid = value['churchid1'];
                          churchname = value['churchname1'];
                      } else if (value['churchid2'] !== undefined && value['churchname2'] !== undefined) {
                          churchid = value['churchid2'];
                          churchname = value['churchname2'];
                      }
          
                 
          
                      var asyncImage = new FormData();
                      asyncImage.append("image_purpose", "request");
                      asyncImage.append("data1",  churchid);
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
                          asyncSuperuser.append("data1",  churchid);
      
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
                                  <div class="Affill_church_Collab">
                                      <div class="team-list m-3">
                                          <div class="d-flex  align-items-center gap-3">
                                              <div class="">
                                                  <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                              </div>
                                              <div class="flex-grow-1">
                                                  <h6 class="mb-1 fw-bold">${churchname}</h6>
                                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    ${details["church_province"]}, ${details["church_city"]}</span>
                                                  <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    ${details["church_barangay"]}, ${details["church_street"]}</span>
                                                  <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bi bi-calendar-check-fill"></i>  ${value['collabdate']}</span>
                                              </div>
                                              <div class="">
                                                  <input type="text" name="trans_type" id="church_id" value="${value['collabID']}" name="church_id" style="display:none;" required>
                                                  <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeCollab">Remove</button>
                                              </div>
                                          </div>
                                          <hr>
                                      </div>
                                  </div>
                                  `;
                                  
                                    requestSection.innerHTML += html;
                      
                      
                                } else {
                                    imagePath = "./views/UploadAvatar/" + image["Avatar"];
                
                      
                
                                    const html = `
                                    <div class="Affill_church_Collab">
                                        <div class="team-list m-3">
                                            <div class="d-flex  align-items-center gap-3">
                                                <div class="">
                                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-bold">${churchname}</h6>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    ${details["church_province"]}, ${details["church_city"]}</span>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    ${details["church_barangay"]}, ${details["church_street"]}</span>
                                                    <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bi bi-calendar-check-fill"></i>  ${value['collabdate']}</span>
                                                </div>
                                                <div class="">
                                                    <input type="text" name="trans_type" id="church_id" value="${value['collabID']}" name="church_id" style="display:none;" required>
                                                    <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeCollab">Remove</button>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
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
              error: function () {
                  alert("Oops. Something went wrong!");
              },
              complete: function () {
                  // You can add any completion logic here
              }
          });
      }
  });
});






$(document).on('click', '.viewBtnAdmin', function() {
  // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
  var church_id = $(this).siblings('input').first().attr('churchid');
  console.log(church_id);


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

      $("#admin_churchID").val(answer[0]);

      $("#admin_church_name").val(answer[1]);

      $("#admin_church_email").val(answer[2]);

      $("#admin_church_telnum").val(answer[3]);

      $("#admin_church_address").val(answer[4]);

      $("#admin_church_city").val(answer[5]);

      $("#admin_church_religion").val(answer[6]);


      

      $('#churchAdminModal').modal('show'); 

    },
    error: function() {
        alert("Oops. Something went wrong!");
    },
    complete: function() {
    }
  });

});

//Search Churches for Church Collaboratio
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('searchChurch').addEventListener('input', function() {
      searchChurches();
  });
});


function searchChurches() {
  var input, filter, teamList, churchName, i;
  input = document.getElementById('searchChurch');
  filter = input.value.toUpperCase();
  teamList = document.getElementsByClassName('team-list');

  for (i = 0; i < teamList.length; i++) {
      churchName = teamList[i].getAttribute('data-churchname');
      if (churchName.toUpperCase().indexOf(filter) > -1) {
          teamList[i].style.display = '';
      } else {
          teamList[i].style.display = 'none';
      }
  }
}

// Church Collaboration Search
$(document).ready(function() {
  $("#searchChurchCollab").on("keyup", function() {
    var searchText = $(this).val().toLowerCase(); // Get the text entered in the search input

    // Loop through each div with class "church_container"
    $(".church_Collab").each(function() {
      var churchName = $(this).find(".flex-grow-1 .fw-bold").text().toLowerCase(); // Get the church name
      var isVisible = churchName.includes(searchText); // Check if church name contains search text

      // Toggle visibility based on search text
      $(this).toggle(isVisible);
    });
  });
});


// Church Rejected Search

$(document).ready(function() {
  $("#searchChurchRejectCollab").on("keyup", function() {
    var searchText = $(this).val().toLowerCase(); // Get the text entered in the search input

    // Loop through each div with class "church_container"
    $(".Reject_church_Collab").each(function() {
      var churchName = $(this).find(".flex-grow-1 .fw-bold").text().toLowerCase(); // Get the church name
      var isVisible = churchName.includes(searchText); // Check if church name contains search text

      // Toggle visibility based on search text
      $(this).toggle(isVisible);
    });
  });
});

// Church Affilliated Search

$(document).ready(function() {
  $("#searchAffillChurch").on("keyup", function() {
    var searchText = $(this).val().toLowerCase(); // Get the text entered in the search input

    // Loop through each div with class "church_container"
    $(".Affill_church_Collab").each(function() {
      var churchName = $(this).find(".flex-grow-1 .fw-bold").text().toLowerCase(); // Get the church name
      var isVisible = churchName.includes(searchText); // Check if church name contains search text

      // Toggle visibility based on search text
      $(this).toggle(isVisible);
    });
  });
});

// Church Request Search

$(document).ready(function() {
  $("#search_Request").on("keyup", function() {
    var searchText = $(this).val().toLowerCase(); // Get the text entered in the search input

    // Loop through each div with class "church_container"
    $(".searchRequestChurch").each(function() {
      var churchName = $(this).find(".flex-grow-1 .fw-bold").text().toLowerCase(); // Get the church name
      var isVisible = churchName.includes(searchText); // Check if church name contains search text

      // Toggle visibility based on search text
      $(this).toggle(isVisible);
    });
  });
});








