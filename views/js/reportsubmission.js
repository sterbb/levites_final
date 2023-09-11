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




});