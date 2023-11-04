 $(function () {

   // chart 1
   var options = {
    series: [{
      name: 'Data',
      data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    }],
    chart: {
      foreColor: '#9ba7b2',
      height: 290,
      type: 'area',
      zoom: {
        enabled: false
      },
      toolbar: {
        show: false
      },
    },
    stroke: {
      width: 3,
      curve: 'smooth'
    },
    plotOptions: {
      bar: {
        horizontal: !1,
        columnWidth: "30%",
        endingShape: "rounded"
      }
    },
    grid: {
      borderColor: 'rgba(255, 255, 255, 0.15)',
      strokeDashArray: 4,
      yaxis: {
        lines: {
          show: true
        }
      }
    },
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'light',
        type: 'vertical',
        shadeIntensity: 0.5,
        gradientToColors: ['#01e195'],
        inverseColors: false,
        opacityFrom: 0.8,
        opacityTo: 0.2,
      }
      },
    colors: ['#0d6efd'],
    dataLabels: {
      enabled: false,
      enabledOnSeries: [0]
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

    },
  };
  
  function updateChartData(newData) {
    // Update the data of the first data series
    options.series[0].data = newData;
    // Update the chart with the new data
    chart.updateOptions(options);
  }
  
  
  // Function to fetch event counts from the server and update the chart data
  function fetchEventCounts(type) {
    var month = $("#month_report").val();
    var year = $("#year_report").val();
    var church_status = $("#church_status_adminreport").val();
    // var report = $("#admin_report-type").val();

      var reportData = new FormData();
      reportData.append("month", JSON.stringify(month));
      reportData.append("year", JSON.stringify(year));
     

      if(type == "users"){

        $.ajax({
          url: 'ajax/get_registeredusers_report.ajax.php',
          method: "POST",
          data: reportData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(data) {
            console.log(data); // Check the event dates in the browser console
      
            var affiliadted = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // Initialize with 0 for each month
      
            data.forEach(function(users) {
              var date = users.created_at.split(" ")[0];
              var dateParts = date.split('-'); // Split the date string into an array
              if (dateParts.length === 3) {
                var eventMonth = parseInt(dateParts[1]) - 1; // Month is 0-indexed in JavaScript Date object
                affiliadted[eventMonth]++;
              }
            });
    
      
            // Update the chart with the new data
            updateChartData(affiliadted);

          },
          error: function(xhr, status, error) {
            console.error('Error fetching event counts:', error);
          }
        });

      }else if(type == "churches"){

 
         reportData.append("church_status", church_status);
      $.ajax({
          url: "ajax/get_churchesreport.ajax.php",
          method: "POST",
          data: reportData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(data) {
            console.log(data); // Check the event dates in the browser console
      
            var affiliadted = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // Initialize with 0 for each month
      
            data.forEach(function(users) {
              // var date = users.status_date.split(" ")[0];
              var dateParts = users.status_date.split('-'); // Split the date string into an array
              if (dateParts.length === 3) {
                var eventMonth = parseInt(dateParts[1]) - 1; // Month is 0-indexed in JavaScript Date object
                affiliadted[eventMonth]++;
              }
            });
    
      
            // Update the chart with the new data
            updateChartData(affiliadted);

          },
          error: function(xhr, status, error) {
            console.error('Error fetching event counts:', error);
          }
        });

      }else if(type == "collab"){
        reportData.append("church_status", church_status);
        $.ajax({
          url: "ajax/get_collaborationreport.ajax.php",
          method: "POST",
          data: reportData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(data) {
            console.log(data); // Check the event dates in the browser console
      
            var affiliadted = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // Initialize with 0 for each month
      
            data.forEach(function(users) {
        
              var dateParts = users.collabdate.split('-'); // Split the date string into an array
              if (dateParts.length === 3) {
                var eventMonth = parseInt(dateParts[1]) - 1; // Month is 0-indexed in JavaScript Date object
                affiliadted[eventMonth]++;
              }
            });
    
      
            // Update the chart with the new data
            updateChartData(affiliadted);

          },
          error: function(xhr, status, error) {
            console.error('Error fetching event counts:', error);
          }
        });
      }else{

        var affiliadted = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // Initialize with 0 for each month
        updateChartData(affiliadted);
      }



  }
  
  // Create the chart and render it
  var chart = new ApexCharts(document.querySelector("#adminChart"), options);
  chart.render();
  
  // Call the function to fetch event counts and update the chart


    $('#month_report').select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        closeOnSelect: false,
    } );    

    $('#year_report').select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        closeOnSelect: false,
    } );    


    $("#month_report, #year_report, #church_status_adminreport" ).change(function() {
        var month = $("#month_report").val();
        var year = $("#year_report").val();
        var church_status = $("#church_status_adminreport").val();
        var report = $("#admin_report-type").val();

        console.log(report);
        console.log(year);
        console.log(month);

        if ((month.length !== 0 && year.length !== 0)){ 
          console.log(year);
          var reportData = new FormData();
          reportData.append("month", JSON.stringify(month));
          reportData.append("year", JSON.stringify(year));

          if( report == 'users'){
            $.ajax({
              url: "ajax/get_registeredusers_report.ajax.php",
              method: "POST",
              data: reportData,
              cache: false,
              contentType: false,
              processData: false,
              dataType: "json",
              success: function(answer) {
       
                const newColumnNames = ['Date', 'Name', 'Religion', 'Email'];
                const data = answer; // Assuming your AJAX response contains file information
      
                reinitializeDataTableEvents(newColumnNames, data, report);
                fetchEventCounts('users');
              },
              error: function(xhr, status, error) {
                console.log(error);
                alert("Oops. Something went wrong!");
              },
              complete: function() {}
            });
          }else if(report == 'churches'){
            console.log(year);
            reportData.append("church_status", church_status);

            $.ajax({
              url: "ajax/get_churchesreport.ajax.php",
              method: "POST",
              data: reportData,
              cache: false,
              contentType: false,
              processData: false,
              dataType: "json",
              success: function(answer) {
                console.log(answer);
                console.log(church_status);
                const newColumnNames = ['Date', 'Church', 'Religion', 'Email', 'Status'];
                const data = answer; // Assuming your AJAX response contains file information
      
                reinitializeDataTableEvents(newColumnNames, data, report);
                fetchEventCounts('churches');
              },
              error: function(xhr, status, error) {
                console.log(error);
                alert("Oops. Something went wrong!");
              },
              complete: function() {}
            });
          }else{
            reportData.append("church_status", church_status);

            $.ajax({
              url: "ajax/get_collaborationreport.ajax.php",
              method: "POST",
              data: reportData,
              cache: false,
              contentType: false,
              processData: false,
              dataType: "json",
              success: function(answer) {
                console.log(answer);
                console.log(church_status);
                const newColumnNames = ['Date', 'Requestor', 'Requestee', 'Status'];
                const data = answer; // Assuming your AJAX response contains file information
      
                reinitializeDataTableEvents(newColumnNames, data, report);
                fetchEventCounts('collab');
              },
              error: function(xhr, status, error) {
                console.log(error);
                alert("Oops. Something went wrong!");
              },
              complete: function() {}
            });
          }


        }else{
          if($("#admin_report-type").val() == 'users'){
            var emptyArray = [];
            var reportType = 'users';
            const newColumnNames = ['Date', 'Name', 'Religion', 'Email'];
            reinitializeDataTableEvents(newColumnNames, emptyArray, report);
            fetchEventCounts('');
          }else if($("#admin_report-type").val() == 'churches'){
            var emptyArray = [];
            var reportType = 'churches';
            const newColumnNames = ['Date', 'Church', 'Religion', 'Email', 'Status'];
            reinitializeDataTableEvents(newColumnNames, emptyArray, report);
            fetchEventCounts('');
          }else{
      
            var emptyArray = [];
            var reportType = 'collaboration';
            const newColumnNames = ['Date', 'Requestor', 'Requestee', 'Status'];
            reinitializeDataTableEvents(newColumnNames, emptyArray, report);
            fetchEventCounts('');
          }
        }
        
      });

      $("#admin_report-type").change(function() {
          $('#month_report').val('1').trigger('change'); // Clear the year_report
          $('#year_report').val('1').trigger('change'); // Clear the year_report
          $("#church_status_adminreport").val('');
        if($("#admin_report-type").val() == 'users'){
          var emptyArray = [];
          var reportType = 'users';
          $("#church_status_adminreport").attr('disabled', 'disabled');
          const newColumnNames = ['Date', 'Name', 'Religion', 'Email'];
          reinitializeDataTableEvents(newColumnNames, emptyArray, reportType);
        }else if($("#admin_report-type").val() == 'churches'){
          $("#church_status_adminreport").removeAttr('disabled');
          var emptyArray = [];
          var reportType = 'churches';
          const newColumnNames = ['Date', 'Church', 'Religion', 'Email', 'Status'];
          reinitializeDataTableEvents(newColumnNames, emptyArray, reportType);
        }else{
          $("#church_status_adminreport").removeAttr('disabled');
          var emptyArray = [];
          var reportType = 'collaboration';
          const newColumnNames = ['Date', 'Requestor', 'Requestee', 'Status'];
          reinitializeDataTableEvents(newColumnNames, emptyArray, reportType);
        }
      });

})

  var table = $('#adminreport-table').DataTable({
  
    lengthChange: false,
    buttons: [
      {
        extend: 'excel', // Add the Excel export button
        text: 'Export to Excel',
        title: new Date().toISOString().slice(0, 10) + "-levites-report", // Set the title for Excel file
        // ... (customize Excel export settings if needed)
      },
        {
            extend: 'pdf',
            text: 'Export to PDF',
            sAutoWidth: true, // Automatically adjust column widths
            title: new Date().toISOString().slice(0, 10) + "-levites-report", // Set the title of the PDF
            customize: function (doc) {
                // For example, you can adjust margins, page size, etc.
                doc.pageMargins = [60, 60, 60, 60]; // top, left, bottom, right
                doc.defaultStyle.fontSize = 10; // adjust font size
  
           // Move the title to the top of the content
                  doc.content.splice(0, 1);
  
                  // Add the title back with custom styling
                  doc.content.unshift({
                      text: getReportTextTitleAdmin() + " Report",
                      style: 'title', // You can define a custom style for the title
                      margin: [0, 0, 0, 0] // Top, right, bottom, left margin
                  });
  
                  // Add additional text below the title
                  doc.content.splice(1, 0, {
                    text: "(" +$("#report-range").val() + ")",
                    style: 'subheader', // You can define a custom style for the text
                    alignment: 'center', // Center the text horizontally
                    margin: [0, 0, 0, 15] // Top, right, bottom, left margin
                    
                });

              

              doc.styles.tableHeader = {
                fillColor: 'gray', // Change header background color to blue
                bold: true, // make header text bold
                color: 'white', // header text color
                alignment: 'center', // header text alignment
                margin: [0, 10, 0, 10], // top, left, bottom, right margin
                border: [0, 1, 1, 1], // Add a border to the header cells (top, left, right, bottom)
                borderColor: 'blue', // Border color
                fontSize: 12, // Increase the font size (adjust as needed)
                cellVerticalAlignment: 'middle', // Center the header cells vertically
              };
  
       
              doc.styles.tableBody = {  
                alignment: 'center', // Center the content horizontally
                cellVerticalAlignment: 'middle', // Center the content vertically
                // margin: [10, 5, 10, 5], // top, left, bottom, right margin
                padding: [10, 30, 10, 30], // Add padding (top, right, bottom, left)
              };
        
  
              // Apply styles to table header
              doc.content[2].table.headerRows = 1; // Update the index to 2
              doc.content[2].table.body[0].forEach(function (cell, cellIndex) {
                cell.style = 'tableHeader'; // Apply the table header style to the first row of the body
              });
  
              // Apply styles to table body cells (excluding header row)
              doc.content[2].table.body.slice(1).forEach(function (row) {
                row.forEach(function (cell) {
                    cell.style = 'tableBody'; // Apply the table body style to all cells in the body (excluding header row)
                });
              });
  
                var objLayout = {};
                objLayout['hLineWidth'] = function(i) { return .5; };
                objLayout['vLineWidth'] = function(i) { return .5; };
                objLayout['hLineColor'] = function(i) { return '#aaa'; };
                objLayout['vLineColor'] = function(i) { return '#aaa'; };
                objLayout['paddingLeft'] = function(i) { return 8; };
                objLayout['paddingRight'] = function(i) { return 8; };
                doc.content[2].layout = objLayout;
  
                
  
                // Create a data URL for the local image
                var img = new Image();
                img.src = 'views/images/leviteslogo.png';
  
  
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');
  
                // Calculate the aspect ratio of the original image
                // var aspectRatio = img.width / img.height;
  
                // // Calculate the new dimensions while maintaining aspect ratio
                // if (aspectRatio > 1) {
                    canvas.width = img.width;
                    canvas.height = img.height;
                // } else {
                //     canvas.width = maxHeight * aspectRatio;
                //     canvas.height = maxHeight;
                // }
  
                // // Draw the resized image onto the canvas
                // var xOffset = (maxWidth - canvas.width) / 2; // Center horizontally
                // var yOffset = (maxHeight - canvas.height) / 2; // Center vertically
                ctx.drawImage(img, 0,0);
  
                var dataURL = canvas.toDataURL('image/png');
  
                // Add title with centered and resized image data URL
                doc.content.splice(0, 0, {
                  image: dataURL,
                  width: 100, // Set the width of the image
                  height: 50, // Set the height of the image
                  margin: [0, 0, 0, 10], // Add margin to the image
                  alignment: 'center' // Center the image
                });
  
                  // Define custom styles for the borders
                  doc.styles.leftBorder = {
                  border: [1, 0, 0, 0], // left, top, right, bottom
                  borderColor: 'black'
              };
              doc.styles.bottomBorder = {
                  border: [0, 0, 0, 1], // left, top, right, bottom
                  borderColor: 'black'
              };
  
                  // Define a custom footer with logo and text
                  var footer = function (currentPage, pageCount) {
                    return {
                        columns: [
                            { text: 'Levites', alignment: 'left' },
                            { text: 'Page ' + currentPage.toString() + ' of ' + pageCount.toString(), alignment: 'right' }
                        ],
                        margin: [40, 10, 40, 0]
                    };
                };
  
                // Assign the custom footer to the doc
                doc.footer = footer;
            }
        }
    ]
  });

  table.buttons().container()
      .appendTo( '#adminreport-table_wrapper .col-md-6:eq(0)' );


function reinitializeDataTableEvents(newColumnNames, eventsInfo, reportType) {
    // Step 1: Destroy the existing DataTable instance
    if ($.fn.DataTable.isDataTable('#adminreport-table')) {
      $('#adminreport-table').DataTable().destroy();
    }
  
    // Step 2: Build the new header
    $('#adminreport-table thead').remove();
    const headerRow = $('<thead>').append(
      $('<tr>').append(
        newColumnNames.map((columnName) => $('<th>').text(columnName))
      )
    );
    $('#adminreport-table').append(headerRow);
  
    // Step 3: Create rows with the updated content
    $('#adminreport-table tbody').empty();
    const tableBody = $('#adminreport-table tbody');
      if(reportType == "users"){
        eventsInfo.forEach((event) => {
          const { fname, lname, religion,created_at, acc_email } = event;
          const tableRow = $('<tr>').append(
              $('<td>').text(created_at.split(" ")[0]),
              $('<td>').text(fname + lname),
              $('<td>').text(religion),
              $('<td>').text(acc_email),
          );
          tableBody.append(tableRow);
        });
      }else if(reportType == "churches"){
        eventsInfo.forEach((event) => {

          const { status_date, church_name, religion,church_email, church_status, rejected_status} = event;
          var status = '';
          if(church_status == 1 && rejected_status == 0){
            status = 'Accepted';
          }else if(church_status == 0 && rejected_status == 1){
            status = 'Rejected';
          }else if(church_status == 1 && rejected_status == 1){
            status = 'Deactivated';
          }else if(church_status == 0 && rejected_status == 0){
            status = 'Waitlist';
          }

          const tableRow = $('<tr>').append(
              $('<td>').text(status_date),
              $('<td>').text(church_name),
              $('<td>').text(religion),
              $('<td>').text(church_email),
              $('<td>').text(status),
          );
          tableBody.append(tableRow);
        });
      }else{
        eventsInfo.forEach((event) => {
          const { collabdate, churchname1, churchname2,collab_status, reject_status} = event;
          var status = '';
          if(collab_status == 1 && reject_status == 0){
            status = 'Accepted';
          }else if(collab_status == 0 && reject_status == 1){
            status = 'Rejected';
          }else if(collab_status == 1 && reject_status == 1){
            status = 'Deactivated';
          }else if(collab_status == 0 && reject_status == 0){
            status = 'Waitlist';
          }

          const tableRow = $('<tr>').append(
              $('<td>').text(collabdate),
              $('<td>').text(churchname1),
              $('<td>').text(churchname2),
              $('<td>').text(status),
          );
          tableBody.append(tableRow);
        });
      }

  
    // Step 4: Reinitialize the DataTable with the updated data and header
    $('#adminreport-table').DataTable({
          
      lengthChange: false,
      buttons: [
        {
          extend: 'excel', // Add the Excel export button
          text: 'Export to Excel',
          title: new Date().toISOString().slice(0, 10) + "-levites-report", // Set the title for Excel file
          // ... (customize Excel export settings if needed)
      },
      {
          extend: 'pdf',
          text: 'Export to PDF',
          sAutoWidth: true, // Automatically adjust column widths
          title: new Date().toISOString().slice(0, 10) + "-levites-report", // Set the title of the PDF
          customize: function (doc) {
            
              // For example, you can adjust margins, page size, etc.
              doc.pageMargins = [60, 60, 60, 60]; // top, left, bottom, right
              doc.defaultStyle.fontSize = 10; // adjust font size

         // Move the title to the top of the content
                doc.content.splice(0, 1);

                // Add the title back with custom styling
                doc.content.unshift({
                    text: getReportTextTitleAdmin() + " Report",
                    style: 'title', // You can define a custom style for the title
                    margin: [0, 0, 0, 0] // Top, right, bottom, left margin
                });
                var currentDate = new Date();

                // You can format the date as needed, for example, to get the current date in ISO format (YYYY-MM-DD):
                var currentISODate = currentDate.toISOString().slice(0, 10);

                // Add additional text below the title
                doc.content.splice(1, 0, {
                  text: "(" + currentISODate + ")",
                  style: 'subheader', // You can define a custom style for the text
                  alignment: 'center', // Center the text horizontally
                  margin: [0, 0, 0, 15] // Top, right, bottom, left margin
                });

            doc.styles.tableHeader = {
              fillColor: 'gray', // Change header background color to blue
              bold: true, // make header text bold
              color: 'white', // header text color
              alignment: 'center', // header text alignment
              margin: [0, 7, 0, 7], // top, left, bottom, right margin
              border: [0, 1, 1, 1], // Add a border to the header cells (top, left, right, bottom)
              borderColor: 'blue', // Border color
              fontSize: 12, // Increase the font size (adjust as needed)
              cellVerticalAlignment: 'middle', // Center the header cells vertically
            };
            

            if($("#admin_report-type").val() == 'churches'){
              doc.styles.tableBody = {  
                alignment: 'center', // Center the content horizontally
                cellVerticalAlignment: 'middle', // Center the content vertically
                // margin: [3, 0, 3, 0], // top, left, bottom, right margin
                padding: [5, 5, 5, 100], // Add padding (top, right, bottom, left)
              };
            }else if($("#admin_report-type").val() == 'users'){
              doc.styles.tableBody = {  
                alignment: 'center', // Center the content horizontally
                cellVerticalAlignment: 'middle', // Center the content vertically
                margin: [15, 7, 15, 7], // top, left, bottom, right margin
                // padding: [0, 50, 0, 100], // Add padding (top, right, bottom, left)
                
              };
            }else{
              doc.styles.tableBody = {  
                alignment: 'center', // Center the content horizontally
                cellVerticalAlignment: 'middle', // Center the content vertically
                margin: [7, 2, 7, 2], // top, left, bottom, right margin
                padding: [20, 30, 10, 100], // Add padding (top, right, bottom, left)
              };
            }


          
            // Apply styles to table header
            doc.content[2].table.headerRows = 1; // Update the index to 2
            doc.content[2].table.body[0].forEach(function (cell, cellIndex) {
              cell.style = 'tableHeader'; // Apply the table header style to the first row of the body
            });

               // Initialize the table widths array if it's undefin
            
            // Apply styles to table body cells (excluding header row)
            doc.content[2].table.body.slice(1).forEach(function (row) {
              row.forEach(function (cell) {
                  cell.style = 'tableBody'; // Apply the table body style to all cells in the body (excluding header row)
              });
            });

              var objLayout = {};
              objLayout['hLineWidth'] = function(i) { return .5; };
              objLayout['vLineWidth'] = function(i) { return .5; };
              objLayout['hLineColor'] = function(i) { return '#aaa'; };
              objLayout['vLineColor'] = function(i) { return '#aaa'; };
              objLayout['paddingLeft'] = function(i) { return 8; };
              objLayout['paddingRight'] = function(i) { return 8; };
              doc.content[2].layout = objLayout;
              doc.content[2].table.widths = 'auto';
              

              // Create a data URL for the local image
              var img = new Image();
              img.src = 'views/images/try.png';

              var canvas = document.createElement('canvas');
              var ctx = canvas.getContext('2d');

                  canvas.width = img.width;
                  canvas.height = img.height;
  
              ctx.drawImage(img, 0, 0);

              var dataURL = canvas.toDataURL('image/png');

              // Add title with centered and resized image data URL
              doc.content.splice(0, 0, {
                  width: 80, // Set the width of the image
                  height: 50, // Set the height of the image
                  margin: [0, 0, 0, 10], // Add margin to the image
                  alignment: 'center', // Center the image
                  image: dataURL
              });

                // Define custom styles for the borders
                doc.styles.leftBorder = {
                border: [1, 0, 0, 0], // left, top, right, bottom
                borderColor: 'black'
            };
            doc.styles.bottomBorder = {
                border: [0, 0, 0, 1], // left, top, right, bottom
                borderColor: 'black'
            };

                // Define a custom footer with logo and text
                var footer = function (currentPage, pageCount) {
                  return {
                      columns: [
                          { text: 'Levites', alignment: 'left' },
                          { text: 'Page ' + currentPage.toString() + ' of ' + pageCount.toString(), alignment: 'right' }
                      ],
                      margin: [40, 10, 40, 0]
                  };
                };

                // Assign the custom footer to the doc
                doc.footer = footer;
            }
        }
      ]
    }).buttons().container().appendTo('#adminreport-table_wrapper .col-md-6:eq(0)');


function getReportTextTitleAdmin(){
  var reportType = $("#admin_report-type").val();

    console.log(reportType);
    if(reportType === "users"){
      return   "Registered Users";
    }else if( reportType === "churches"){
      return  "Church";
    }else{
      return "Collaboration";
    }

}
      
}


