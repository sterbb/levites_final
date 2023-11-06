$(document).ready(function() {

  
  $(".report_spefact").click(function(){
    var reportID = $(this).siblings('input').first().val();
    $("#report_accountID").val(reportID);
  })

  $("#reportSubmissionBtn").click(function(){

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
        },
        error: function(xhr, status, error) {
          //         var errorMessage = xhr.responseText; // Extract the error message
          console.log("Error: " + error);
        },
        complete: function() {
        }
      });

      $("#ReportModal").modal('hide');
  });


  $(".viewBtnReport").on('click', function(){
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

  $(".actionBtnReport").on('click', function(){
    var report_id = $(this).siblings('input').first().val();

    var reported_id = $(this).siblings('input').first().attr('churchIDwarning');
    var violation = $(this).siblings('input').first().attr('violationtype');

    $(".title_report_ban").text("Take Action (" + reported_id + ')');

    $('#reportedAccountDetails').attr('report_id', report_id);
    $('#reportedAccountDetails').attr('reported_id', reported_id);
    $('#reportedAccountDetails').attr('violation', violation);

    $('#takeActionModal').modal('show'); 
  });

  $(".deleteReport, .deleteFeedbackBtn").on('click', function(){
    var report_id = $(this).siblings('input').first().val();
    alert(report_id);

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

      },
      error: function(xhr, status, error) {
        //         var errorMessage = xhr.responseText; // Extract the error message
        console.log("Error: " + error);
      },
      complete: function() {
      }
    });


  });

  $(".deleteWarningBtn").on('click', function(){
    var report_id = $(this).siblings('input').first().val();
    alert(report_id);

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


  });





  



  $(".giveWarningBtn").on('click', function(){
    

      var notifcation_type = "Warning";
      var notifcation_title = "Warning Notice";
      var report_id =   $('#reportedAccountDetails').attr('report_id');
      var reported_id =   $('#reportedAccountDetails').attr('reported_id');
      var report_text =  $('#reportedAccountDetails').attr('violation');
      var report =  "Your account is warned due to " + report_text+ '.';



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
              alert(answer);
              $('#takeActionModal').modal('hide'); 

        },
        error: function(xhr, status, error) {
          //         var errorMessage = xhr.responseText; // Extract the error message
          console.log("Error: " + error);
        },
        complete: function() {
        }
      });

  });


  $(".deactivateWrnReportBtn").on('click', function(){
    var church_id =   $('#reportedAccountDetails').attr('reported_id');

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

  $(".deactivateBtn").on('click', function(){

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

  });


  
  



});