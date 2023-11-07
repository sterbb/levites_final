$(document).ready(function() {

  
  $(".report_spefact").click(function(){
    var reportID = $(this).siblings('input').first().val();
    $("#report_accountID").val(reportID);
  })

  $(document).on("click", "#reportSubmissionBtn", function() {
    Swal.fire({
        title: 'Confirm Report Submission',
        text: 'Are you sure you want to submit this report?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, submit report',
        cancelButtonText: 'No, cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            // User clicked "Yes," so you can proceed with submitting the report here

            
            var report_type = $("#reportSubmissionType").val();
            var report_subject = $("#reportSubmissionSubject").val();
            var report_description = $("#reportSubmissionDescription").val();
            var report_account = $("#report_accountID").val();

 

            var reportData = new FormData();
            reportData.append("report_type", report_type);
            reportData.append("report_subject", report_subject);
            reportData.append("report_description", report_description);
            reportData.append("report_account", report_account);

            $.ajax({
                url: "ajax/report_submit.ajax.php",
                method: "POST",
                data: reportData,
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
                title: 'Report submitted successfully.'
              });
                    console.log(answer);
                    $("#report_accountID").val('');

                    $("#ReportModal").modal('hide');
                    // Handle success after submitting the report if needed
                },
                error: function(xhr, status, error) {
                    // Handle errors if the AJAX request fails
                    console.error('Error submitting the report:', error);
                },
                complete: function() {
                    // Additional complete actions if needed
                }
            });

            $("#ReportModal").modal('hide');
        }
    });
});

$(document).on("click", ".viewBtnReport", function() {
    // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
    var report_id = $(this).siblings('input').first().val();
    console.log(report_id);
    var ReportData = new FormData();
    ReportData.append("report_id", report_id);


    $.ajax({
        url: "ajax/get_reportDetails.ajax.php",
        method: "POST",
        data: ReportData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(answer) {
          console.log(answer);

          $("#reportSubmissionTypeDetails").val(answer['violation_type']);
          $("#reportSubmissionReportedDetails").val(answer['churchID']);
          $("#reportSubmissionReporterDetails").val(answer['memID']);
          $("#reportSubmissionSubjectDetails").val(answer['violation']);
          $("#reportSubmissionDescriptionDetails").val(answer['violation_description']);
          


          $('#reportDetailsModal').modal('show'); 

        },
        error: function() {
            alert("Oops. Something went wrong!");
        },
        complete: function() {
        }
      });
  });

  $(document).on("click", ".actionBtnReport", function() {
    var report_id = $(this).siblings('input').first().val();

    var reported_id = $(this).siblings('input').first().attr('churchIDwarning');
    var violation = $(this).siblings('input').first().attr('violationtype');

    $(".title_report_ban").text("Take Action (" + reported_id + ')');

    $('#reportedAccountDetails').attr('report_id', report_id);
    $('#reportedAccountDetails').attr('reported_id', reported_id);
    $('#reportedAccountDetails').attr('violation', violation);

    $('#takeActionModal').modal('show'); 
  });

  $(document).on("click", ".deleteReport, .deleteFeedbackBtn", function() {

    var report_id = $(this).siblings('input').first().val();

    Swal.fire({
        title: 'Confirm Deletion',
        text: 'Are you sure you want to delete this item?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it',
        cancelButtonText: 'No, cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            // User clicked "Yes," so you can proceed with the delete action here
            var reportData = new FormData();
            reportData.append("report_id", report_id);

            $.ajax({
                url: "ajax/delete_violation.ajax.php",
                method: "POST",
                data: reportData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function(answer) {
                    // Handle success after deletion
                    console.log('Deletion successful:', answer);
                },
                error: function(xhr, status, error) {
                    // Handle errors if the AJAX request fails
                    console.error('Error deleting item:', error);
                },
                complete: function() {
                    // Additional complete actions if needed
                }
            });
        }
    });
});

$(document).on("click", ".deleteWarningBtn", function() {

    Swal.fire({
      title: 'Confirm Warning',
      text: 'Are you sure you want to delete this warning?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete warning',
      cancelButtonText: 'No, cancel',
  }).then((result) => {
      if (result.isConfirmed) {

    var report_id = $(this).siblings('input').first().val();
  

    var reportData = new FormData();
    reportData.append("report_id", report_id);

    $.ajax({
      url: "ajax/delete_warning_violation.ajax.php",
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

      }
  });
});




$(document).on("click", ".giveWarningBtn", function() {
    Swal.fire({
        title: 'Confirm Warning',
        text: 'Are you sure you want to give a warning?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, give a warning',
        cancelButtonText: 'No, cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            // User clicked "Yes," so you can proceed with giving a warning here
            var notifcation_type = "Warning";
            var notifcation_title = "Warning Notice";
            var report_id = $('#reportedAccountDetails').attr('report_id');
            var reported_id = $('#reportedAccountDetails').attr('reported_id');
            var report_text = $('#reportedAccountDetails').attr('violation');
            var report = "Your account is warned due to " + report_text + '.';

            var reportData = new FormData();
            reportData.append("notifcation_type", notifcation_type);
            reportData.append("notifcation_title", notifcation_title);
            reportData.append("reported_id", reported_id);
            reportData.append("report", report);
            reportData.append("report_id", report_id);

            $.ajax({
                url: "ajax/notification_warning.ajax.php",
                method: "POST",
                data: reportData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function(answer) {
                  console.log(answer)
                    $('#takeActionModal').modal('hide');

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
                      title: 'Warning sent successfully.'
                    });
         

                    var asyncCollab = new FormData();
                    asyncCollab.append("reportFunction", "violations");



                    $.ajax({
                      url: "ajax/async_reports.ajax.php",
                      method: "POST",
                      data: asyncCollab,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType: "json",
                      success: function(answer) {
        
                          var requestSection = document.querySelector('.violations_warning_section');
                          requestSection.innerHTML = '';
                          var imagePath = ""; // Default value
              
                        answer.forEach(function (value, key) {
              
                     
              
                          var asyncImage = new FormData();
                          asyncImage.append("image_purpose", "request");
                          asyncImage.append("data1",  value['churchID']);
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
                              asyncSuperuser.append("data1",  value['churchID']);
          
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
                                      <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                          <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                        </div>
                                        <div class="flex-grow-1">
                                          <h6 class="mb-1 fw-bold">${value['violation']}</h6>
                                        </div>
                                        <div class="church_div">
                                          <input type="text" name="trans_type" id="report_id" value="${value['reportID']}" churchIDwarning="${value['churchID']}" violationtype="${value['violation_type']}" style="display:none;" required>
                                          <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnReport" value="hello">View Details</button>
                                          <button type="button" class="btn btn-outline-danger rounded-5 btn-sm pr-3 deleteReport">Delete</button>
                                          <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 actionBtnReport">Take Action</button>
                                        </div>
                                      </div>
                                      <hr>
                                    `;
                                        requestSection.innerHTML += html;
                          
                          
                                    } else {
                                        imagePath = "./views/UploadAvatar/" + image["Avatar"];
                    
                          
                    
                                        const html = `
                                        <div class="d-flex align-items-center gap-3">
                                          <div class="">
                                            <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                          </div>
                                          <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-bold">${value['violation']}</h6>
                                          </div>
                                          <div class="church_div">
                                            <input type="text" name="trans_type" id="report_id" value="${value['reportID']}" churchIDwarning="${value['churchID']}" violationtype="${value['violation_type']}" style="display:none;" required>
                                            <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnReport" value="hello">View Details</button>
                                            <button type="button" class="btn btn-outline-danger rounded-5 btn-sm pr-3 deleteReport">Delete</button>
                                            <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 actionBtnReport">Take Action</button>
                                          </div>
                                        </div>
                                        <hr>
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


                    var asyncCollab = new FormData();
                    asyncCollab.append("reportFunction", "warned");

                    $.ajax({
                      url: "ajax/async_reports.ajax.php",
                      method: "POST",
                      data: asyncCollab,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType: "json",
                      success: function(answer) {
        
                          var requestSection = document.querySelector('.warned_section');
                          requestSection.innerHTML = '';
                          var imagePath = ""; // Default value
              
                        answer.forEach(function (value, key) {

                          const recipientDict = {};

                          answer.forEach(report => {
                            if (report.recipientID) {
                              const recipientID = report.recipientID;

                              if (!recipientDict[recipientID]) {
                                recipientDict[recipientID] = {
                                  Count: 0,
                                  Violation: [],
                                };
                              }

                              recipientDict[recipientID].Count++;
                              recipientDict[recipientID].Violation.push(report.notification_text);
                            }
                          });
                          
              

                          var asyncImage = new FormData();
                          asyncImage.append("image_purpose", "request");
                          asyncImage.append("data1",  value['recipientID']);
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
                              asyncSuperuser.append("data1",  value['recipientID']);
          
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

                                      

                                      
                    
              
                                        for (const key in recipientDict) {
                                          if (recipientDict.hasOwnProperty(key)) {
                                              const value = recipientDict[key];
                                              const badge = `<sup class="badge rounded-circle bg-warning" style="font-size:.8em; margin-left:.5em;">${value.Count}</sup>`;
                                      
                                              var html = `
                                              <div class="d-flex align-items-center gap-3">
                                                  <div class="">
                                                      <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                  </div>
                                                  <div class="flex-grow-1">
                                                      <h6 class="mb-1 fw-bold">${key}${badge}</h6>
                                                  </div>
                                                  <div class="church_div">
                                                      <input type="text" name="trans_type" id="warned_report_id" value="${key}" style="display:none;" required="">
                                                      <button type="button" class="btn btn-outline-danger rounded-5 btn-sm pr-3 deleteWarningBtn">Delete </button>
                                                      <button type="button" class="btn btn-outline-warning rounded-5 btn-sm pr-3 deactivateBtn">Deactivate </button>
                                                  </div>
                                                  </div>
                                                  <hr>
                                              `;

                                              requestSection.innerHTML += html;
                          
                                      
                                              // Append the container to your HTML element.
                                              // For example, if you have a div with id "recipientContainer", you can do:
                                              // document.getElementById('recipientContainer').appendChild(container);
                                          }
                                      }
                              
                          
                                    } else {
                                        imagePath = "./views/UploadAvatar/" + image["Avatar"];
                    
                          
                    
                                        const html = `
                                        <div class="d-flex align-items-center gap-3">
                                          <div class="">
                                            <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                          </div>
                                          <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-bold">${value['violation']}</h6>
                                          </div>
                                          <div class="church_div">
                                            <input type="text" name="trans_type" id="report_id" value="${value['reportID']}" churchIDwarning="${value['churchID']}" violationtype="${value['violation_type']}" style="display:none;" required>
                                            <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnReport" value="hello">View Details</button>
                                            <button type="button" class="btn btn-outline-danger rounded-5 btn-sm pr-3 deleteReport">Delete</button>
                                            <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 actionBtnReport">Take Action</button>
                                          </div>
                                        </div>
                                        <hr>
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
                    // Handle errors if the AJAX request fails
                    console.error('Error giving a warning:', error);
                },
                complete: function() {
                    // Additional complete actions if needed
                }
            });
        }
    });
});

$(document).on("click", ".deactivateWrnReportBtn", function() {
  Swal.fire({
      title: 'Confirm Deactivation',
      text: 'Are you sure you want to deactivate this account?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, deactivate',
      cancelButtonText: 'No, cancel',
  }).then((result) => {
      if (result.isConfirmed) {
          // User clicked "Yes," so you can proceed with deactivating the account here
          var church_id = $('#reportedAccountDetails').attr('reported_id');

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
                  // Handle success after deactivating the account
                  console.log('Account deactivated successfully:', answer);
                  // You can perform further actions, such as showing a success message.
              },
              error: function(xhr, status, error) {
                  // Handle errors if the AJAX request fails
                  console.error('Error deactivating the account:', error);
              },
              complete: function() {
                  // Additional complete actions if needed
              }
          });
      }
  });
});

$(document).on("click", ".deactivateBtn", function() {
    Swal.fire({
      title: 'Confirm Deactivation',
      text: 'Are you sure you want to deactivate this account?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, deactivate',
      cancelButtonText: 'No, cancel',
  }).then((result) => {
      if (result.isConfirmed) {

        var church_id = $(this).siblings('input').first().val();
        
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

      };

    });
    
  });
});