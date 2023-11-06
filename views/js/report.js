

$(document).ready(function() {

  var currentPath = getCookie('church_id');

  function getCookie(cookieName) {
      const cookiePattern = new RegExp(`(?:(?:^|.*;\\s*)${cookieName}\\s*\\=\\s*([^;]*).*$)|^.*$`);
      const cookieValue = document.cookie.replace(cookiePattern, "$1");
      return cookieValue || null;
  }

  
  $("#report-range").change(function() {
    var daterange = $("#report-range").val();

    if (daterange.length <= 10) {
      date1 = daterange.substring(0, 10);
      date2 = daterange.substring(0, 10);
    } else {
      date1 = daterange.substring(0, 10);
      date2 = daterange.substring(14, 24);
    }
  
    var reportData = new FormData();
    reportData.append("date1", date1);
    reportData.append("date2", date2);

    $.ajax({
      url: "ajax/get_event_report.ajax.php",
      method: "POST",
      data: reportData,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer) {
        console.log(answer);
        const newColumnNames = ['Date', 'Time', 'Event Title', 'Category', 'Venue', 'Location'];
        const data = answer; // Assuming your AJAX response contains file information
        
        $("#event-graph-section").removeAttr('hidden');

        reinitializeDataTableEvents(newColumnNames, data);
        
      },
      error: function(xhr, status, error) {
        console.log(error);
        alert("Oops. Something went wrong!");
      },
      complete: function() {}
    });
  });



$('#report-category').on('change', function() {
var selectedValue = $(this).val();

var daterange = $("#report-range").val();

    if (daterange.length <= 10) {
      date1 = daterange.substring(0, 10);
      date2 = daterange.substring(0, 10);
    } else {
      date1 = daterange.substring(0, 10);
      date2 = daterange.substring(14, 24);
    }


    var reportData = new FormData();
    reportData.append("date1", date1);
    reportData.append("date2", date2);
    reportData.append("selectedValue", selectedValue);

    $.ajax({
      url: "ajax/get_event_report_category.ajax.php",
      method: "POST",
      data: reportData,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer) {
        console.log(answer);

        const newColumnNames = ['Date', 'Time', 'Event Title', 'Category', 'Venue', 'Location'];
        const data = answer; // Assuming your AJAX response contains file information
        $("#event-graph-section").removeAttr('hidden');
        reinitializeDataTableEvents(newColumnNames, data);
      },
      error: function(xhr, status, error) {
        console.log(error);
        alert("Oops. Something went wrong!");
      },
      complete: function() {}
    });
});

function getReportTextTitle(){
var reportType = $("#report-type").val();

  console.log(reportType);
  if(reportType === "events"){
    return   "Events Held";
  }else if( reportType === "members"){
    return  "Affiliated Members";
  }else{
    return "File Storage Report";
  }

}




var table = $('#report-table').DataTable({

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
                  text: getReportTextTitle() + " Report",
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
});

table.buttons().container()
  .appendTo( '#report-table_wrapper .col-md-6:eq(0)' );


  function reinitializeDataTableEmpty(newColumnNames) {
    // Step 1: Destroy the existing DataTable instance
    if ($.fn.DataTable.isDataTable('#report-table')) {
        $('#report-table').DataTable().destroy();
    }

    // Step 2: Build the new header
    $('#report-table thead').remove();
    const headerRow = $('<thead>').append(
        $('<tr>').append(
            newColumnNames.map((columnName) => $('<th>').text(columnName)) // Append the newColumnNames here
        )
    );
    $('#report-table').append(headerRow);

    // Step 3: Create rows with the updated content
    $('#report-table tbody').empty();

    // ... Add your new rows and data here

    // Step 4: Reinitialize the DataTable with the updated data and header
    $('#report-table').DataTable({
        
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
                  text: getReportTextTitle() + " Report",
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
    }).buttons().container().appendTo('#report-table_wrapper .col-md-6:eq(0)');
}
// Function to reinitialize the DataTable with new data and header
function reinitializeDataTable(newColumnNames, filesInfo, totalSize) {
  // Step 1: Destroy the existing DataTable instance
  if ($.fn.DataTable.isDataTable('#report-table')) {
    $('#report-table').DataTable().destroy();
  }

  // Step 2: Build the new header
  $('#report-table thead').remove();
  const headerRow = $('<thead>').append(
    $('<tr>').append(
      newColumnNames.map((columnName) => $('<th>').text(columnName))
    )
  );
  $('#report-table').append(headerRow);

  // Step 3: Create rows with the updated content
  $('#report-table tbody').empty();
  const tableBody = $('#report-table tbody');
  filesInfo.forEach((fileInfo) => {
    const { fileName, fileType, sizeInBytes } = fileInfo;
    const sizeInMB = (sizeInBytes / (1024 * 1024)).toFixed(2);
    const tableRow = $('<tr>').append(
      $('<td>').text(fileName),
      $('<td>').text(fileType),
      $('<td>').text(`${sizeInMB} MB`)
    );
    tableBody.append(tableRow);
  });

  // Add the "Total Size" row
  const totalSizeInMB = !isNaN(totalSize) ? (totalSize / (1024 * 1024)).toFixed(2) : 'N/A';
  const totalRow = $('<tr>').addClass('total-size-row').append(
    $('<td>').text('Total Size'),
    $('<td>').text(''),
    $('<td>').text(totalSizeInMB + ' MB')
  );
  tableBody.append(totalRow);
  // tableBody.append(totalRow);

  // Step 4: Reinitialize the DataTable with the updated data and header
  $('#report-table').DataTable({
    lengthChange: false,
     order: [[1, 'desc']], // Sort by the first column in ascending order
      columnDefs: [
        { targets: 'total-size-row', orderable: false }, // Add the 'no-sort' class to the "Total Size" row
      ],
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
              doc.pageMargins = [75, 20, 20, 20]; // top, left, bottom, right
              doc.defaultStyle.fontSize = 10; // adjust font size

        
                // Move the title to the top of the content
                doc.content.splice(0, 1);

                // Add the title back with custom styling
                doc.content.unshift({
                    text: getReportTextTitle() + " Report",
                    style: 'title', // You can define a custom style for the title
                    margin: [0, 5, 0, 0] // Top, right, bottom, left margin
                });

                var currentDate = new Date();

                // You can format the date as needed, for example, to get the current date in ISO format (YYYY-MM-DD):
                var currentISODate = currentDate.toISOString().slice(0, 10);


                // Add additional text below the title
                doc.content.splice(1, 0, {
                  text: "(" +currentISODate+ ")",
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
            };

            doc.styles.tableBody = {  
              alignment: 'center', // Center the content horizontally
              cellVerticalAlignment: 'middle', // Center the content vertically
               margin: [0, 5, 0, 5], // left, top, right, bottom margin
              padding: [10, 50, 10, 50], // Add padding (top, right, bottom, left)
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
              objLayout['paddingLeft'] = function(i) { return 15; };
              objLayout['paddingRight'] = function(i) { return 15; };
                doc.content[2].layout = objLayout;
    

              

             
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
  }).buttons().container().appendTo('#report-table_wrapper .col-md-6:eq(0)');

  
}


function reinitializeDataTableEvents(newColumnNames, eventsInfo) {
  // Step 1: Destroy the existing DataTable instance
  if ($.fn.DataTable.isDataTable('#report-table')) {
    $('#report-table').DataTable().destroy();
  }

  // Step 2: Build the new header
  $('#report-table thead').remove();
  const headerRow = $('<thead>').append(
    $('<tr>').append(
      newColumnNames.map((columnName) => $('<th>').text(columnName))
    )
  );
  $('#report-table').append(headerRow);

  // Step 3: Create rows with the updated content
  $('#report-table tbody').empty();
  const tableBody = $('#report-table tbody');
  eventsInfo.forEach((event) => {
      const { event_date, event_date2, event_time, event_time2, event_title, event_category, event_venue, event_location } = event;
      var date;

      var time = event_time +" - "+ event_time2;
      if(event_date == event_date2){
        date = event_date;
      }else{
        date = event_date + " to " +event_date2; 
      }
      const tableRow = $('<tr>').append(
          $('<td>').text(date),
          $('<td>').text(time),
          $('<td>').text(event_title),
          $('<td>').text(event_category),
          $('<td>').text(event_venue),
          $('<td>').text(event_location),
      );
      tableBody.append(tableRow);
  });

  // Step 4: Reinitialize the DataTable with the updated data and header
  $('#report-table').DataTable({
        
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
                  text: getReportTextTitle() + " Report",
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
            margin: [5, 10, 5, 10], // top, left, bottom, right margin
            border: [0, 1, 1, 1], // Add a border to the header cells (top, left, right, bottom)
            borderColor: 'blue', // Border color
            fontSize: 12, // Increase the font size (adjust as needed)
            cellVerticalAlignment: 'middle', // Center the header cells vertically
          };

          doc.styles.tableBody = {  
            alignment: 'center', // Center the content horizontally
            cellVerticalAlignment: 'middle', // Center the content vertically
            margin: [0, 10, 0, 10], // top, left, bottom, right margin
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
  }).buttons().container().appendTo('#report-table_wrapper .col-md-6:eq(0)');
}


function reinitializeDataTableMembers(newColumnNames, filesInfo) {
  // Step 1: Destroy the existing DataTable instance
  if ($.fn.DataTable.isDataTable('#report-table')) {
    $('#report-table').DataTable().destroy();
  }

  // Step 2: Build the new header
  $('#report-table thead').remove();
  const headerRow = $('<thead>').append(
    $('<tr>').append(
      newColumnNames.map((columnName) => $('<th>').text(columnName))
    )
  );
  $('#report-table').append(headerRow);

  // Step 3: Create rows with the updated content
  $('#report-table tbody').empty();
  const tableBody = $('#report-table tbody');
  filesInfo.forEach((fileInfo) => {
    const { membershipDate, memberName, memberEmail } = fileInfo;
    const tableRow = $('<tr>').append(
      $('<td>').text(membershipDate),
      $('<td>').text(memberName),
      $('<td>').text(memberEmail)
    );
    tableBody.append(tableRow);
  });


  // Step 4: Reinitialize the DataTable with the updated data and header
  $('#report-table').DataTable({
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
                    text: getReportTextTitle() + " Report",
                    style: 'title', // You can define a custom style for the title
                    margin: [0, 0, 0, 0] // Top, right, bottom, left margin
                });

                var currentDate = new Date();

                // You can format the date as needed, for example, to get the current date in ISO format (YYYY-MM-DD):
                var currentISODate = currentDate.toISOString().slice(0, 10);

                // Add additional text below the title
                doc.content.splice(1, 0, {
                  text: "(" +currentISODate + ")",
                  style: 'subheader', // You can define a custom style for the text
                  alignment: 'center', // Center the text horizontally
                  margin: [0, 0, 0, 15] // Top, right, bottom, left margin
                  
              });

            doc.styles.tableHeader = {
              fillColor: 'gray', // Change header background color to blue
              bold: true, // make header text bold
              color: 'white', // header text color
              alignment: 'center', // header text alignment
              margin: [0, 8, 0, 8], // top, left, bottom, right margin
              border: [0, 1, 1, 1], // Add a border to the header cells (top, left, right, bottom)
              borderColor: 'blue', // Border color
              fontSize: 12, // Increase the font size (adjust as needed)
            };

            doc.styles.tableBody = {  
              alignment: 'center', // Center the content horizontally
              cellVerticalAlignment: 'middle', // Center the content vertically
              margin: [5, 5, 5, 5], // top, left, bottom, right margin
              padding: [10, 10, 10, 10], // Add padding (top, right, bottom, left)
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
              objLayout['paddingLeft'] = function(i) { return 35; };
              objLayout['paddingRight'] = function(i) { return 35; };
              doc.content[2].layout = objLayout;

              

             
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
  }).buttons().container().appendTo('#report-table_wrapper .col-md-6:eq(0)');
}




// Inside the $("#report-type").change event handler:
$("#report-type").change(function (event) {

  var reportType = $("#report-type").val();


  if (reportType === "storage") {

    $("#event-graph-section").attr('hidden', "");
    $("#report-range").val("");
    $("#report-range").attr('disabled', "disabled");
    $("#report-category").attr('disabled', "disabled");
    $("#affiliatesReportContainer").removeAttr("hidden"); 
    $("#currentStorageReport").removeAttr("hidden"); 

    $("#church-label-change").text('File Storage');
    $("#report-church").removeAttr('disabled');
    const newColumnNames = ['File Name', 'File Type', 'File Size'];

      // for my storage
    const folderRef = firebase.storage().ref().child(currentPath);

    Promise.all([
      getFilesInfo(folderRef),
      calculateSubfolderSizeReport(folderRef)
    ])
      .then(([filesInfo, { totalSize }]) => {
        reinitializeDataTable(newColumnNames, filesInfo, totalSize);
      })
      .catch((error) => {
        console.error('Error retrieving files information:', error);
      });

      calculateSubfolderSizeReport(folderRef)
      .then(({ totalSize, fileSizeByExtension }) => {

          var keysList = [];
          $.each(fileSizeByExtension, function(key) {
            keysList.push(key.toUpperCase());
          });
          keysList.push("Free Space");
      

          var valuesList = [];
          $.each(fileSizeByExtension, function(key, value) {
              var valueInMB = (value / 1048576).toFixed(2); // Convert bytes to megabytes and fix to 2 decimal places
              valuesList.push(parseFloat(valueInMB)); 
          });

          var freesize = 1024-(totalSize / 1048576).toFixed(2)
      
          valuesList.push(parseFloat(freesize)); 

          var options = {
            series: valuesList,
            chart: {
              foreColor: '#9ba7b2',
              height: 500,
              type: 'pie',
              toolbar: {
                show: false // Hide the default toolbar (if not needed)
              }
            },
            labels: keysList,
            legend: {
              position: 'right', // Position the legend at the bottom
              fontSize: '14px', // Set the font size for the legend
              offsetY: 8 // Adjust the offset for better spacing
            },
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  height: 360
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
          };

          // Create the ApexCharts instance with the same options you have.
          var chart = new ApexCharts(document.querySelector("#churchStorageReport"), options);

          // Render the chart to ensure the colors are computed.
          chart.render();

                // Create the ApexCharts instance with the same options you have.
          var chart2 = new ApexCharts(document.querySelector("#currentchurchStorageReport"), options);

          // Render the chart to ensure the colors are computed.
          chart2.render();

                   
          var churchStorageReportList = document.getElementById('currentchurchStorageReportList');
      
          // Clear any existing content in the list before populating it.
          churchStorageReportList.innerHTML = '';
          // Get the colors set by ApexCharts for the data points.
          var apexChartColors = chart.w.globals.colors;

          // Loop through the keysList and valuesList arrays to create li elements and append them to the ul element.
          for (var i = 0; i < keysList.length; i++) {
          var li = document.createElement('li');
          li.classList.add('list-group-item', 'border-top', 'd-flex', 'justify-content-between', 'align-items-center', 'bg-transparent');

          var spanKey = document.createElement('span');
          spanKey.textContent = keysList[i];

          var spanValue = document.createElement('span');
          spanValue.classList.add('badge', 'rounded-pill');

          // Set the background color of the spanValue based on the color from ApexCharts.
          spanValue.style.backgroundColor = apexChartColors[i % apexChartColors.length];

          spanValue.textContent = valuesList[i].toFixed(1) + ' MB';

          li.appendChild(spanKey);
          li.appendChild(spanValue);
          churchStorageReportList.appendChild(li);
          }    

      const totalSizeInMB = !isNaN(totalSize) ? (totalSize / (1024 * 1024)).toFixed(2) : 'N/A'; // Convert bytes to megabytes with 2 decimal places or show 'N/A'

      console.log("Total Size:", totalSizeInMB);

      // fileSizeByExtension contains the size per file extension
      console.log("File Size by Extension:", fileSizeByExtension);
      })
      .catch((error) => {
      console.error('Error calculating folder size:', error);
      });



      var church_id = getCookie('church_id');

      var getAffilaites = new FormData();
      getAffilaites.append("church_id",church_id);

      $.ajax({
          url: "ajax/report_getAffiliates.ajax.php",
          method: "POST",
          data: getAffilaites,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(answer) {

            answer.forEach(function(value) {
              // Access the properties of each object
              // Assuming 'value' is an object received from the server containing the data
              var churchid = value.churchid1 || value.churchid2;
              var churchname = value.churchname1 || value.churchname2;



              var collabID = value.collabID;

              createCard(collabID, churchname);


              const folderRefAff = firebase.storage().ref().child(collabID);

              calculateSubfolderSizeReport(folderRefAff)
              .then(({ totalSize, fileSizeByExtension }) => {
      
                  var keysList = [];
                  $.each(fileSizeByExtension, function(key) {
                    keysList.push(key.toUpperCase());
                  });
                  keysList.push("Free Space");
              
      
                  var valuesList = [];
                  $.each(fileSizeByExtension, function(key, value) {
                      var valueInMB = (value / 1048576).toFixed(2); // Convert bytes to megabytes and fix to 2 decimal places
                      valuesList.push(parseFloat(valueInMB)); 
                  });
      
                  var freesize = 1024-(totalSize / 1048576).toFixed(2)
              
                  valuesList.push(parseFloat(freesize)); 
    
      
                  var options = {


                    series: valuesList,
                    chart: {
                      foreColor: '#9ba7b2',
                      height: 330,
                      type: 'pie',
                    },
                    labels: keysList,
                    responsive: [{
                      breakpoint: 480,
                      options: {
                        chart: {
                          height: 360
                        },
                        legend: {
                          position: 'bottom'
                        }
                      }
                    }]

                  };
       
                  var churchStorageReportList = document.getElementById('churchStorageReportList-' + collabID);
      
                  // Clear any existing content in the list before populating it.
                  churchStorageReportList.innerHTML = '';
      
                  // Create the ApexCharts instance with the same options you have.
                  var chart = new ApexCharts(document.querySelector("#churchStorageReport-" + collabID), options);
      
                  // Render the chart to ensure the colors are computed.
                  chart.render();
      
                  // Get the colors set by ApexCharts for the data points.
                  var apexChartColors = chart.w.globals.colors;
      
                  // Loop through the keysList and valuesList arrays to create li elements and append them to the ul element.
                  for (var i = 0; i < keysList.length; i++) {
                  var li = document.createElement('li');
                  li.classList.add('list-group-item', 'border-top', 'd-flex', 'justify-content-between', 'align-items-center', 'bg-transparent');
      
                  var spanKey = document.createElement('span');
                  spanKey.textContent = keysList[i];
      
                  var spanValue = document.createElement('span');
                  spanValue.classList.add('badge', 'rounded-pill');
      
                  // Set the background color of the spanValue based on the color from ApexCharts.
                  spanValue.style.backgroundColor = apexChartColors[i % apexChartColors.length];
      
                  spanValue.textContent = valuesList[i].toFixed(1) + ' MB';
      
                  li.appendChild(spanKey);
                  li.appendChild(spanValue);
                  churchStorageReportList.appendChild(li);
                  }    
      
              const totalSizeInMB = !isNaN(totalSize) ? (totalSize / (1024 * 1024)).toFixed(2) : 'N/A'; // Convert bytes to megabytes with 2 decimal places or show 'N/A'
      
              console.log("Total Size:", totalSizeInMB);
      
              // fileSizeByExtension contains the size per file extension
              console.log("File Size by Extension:", fileSizeByExtension);
              })
              .catch((error) => {
              console.error('Error calculating folder size:', error);
              });

            });
            
          },
          error: function() {
              alert("Oops. Something went wrong!");
          },
          complete: function() {
          }
      });



  }else if (reportType === "members") {


      $("#event-graph-section").attr('hidden', "");
      $("#currentStorageReport").attr('hidden', "");
      $("#affiliatesReportContainer").attr('hidden', "");
      $("#report-category").attr('disabled', "disabled");
      $("#report-range").attr('disabled', "disabled");
      $("#report-church").attr('disabled', "disabled");
      $("#affiliated-graph-section").removeAttr("hidden");   


      var reportData = new FormData();
 
  
      $.ajax({
        url: "ajax/get_memberReport.ajax.php",
        method: "POST",
        data: reportData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(answer) {
          const newColumnNames = ['Date', 'Name', 'Email'];
          const data = answer; // Assuming your AJAX response contains file information

          reinitializeDataTableMembers(newColumnNames, data);
        },
        error: function(xhr, status, error) { 
          console.log(error);
          alert("Oops. Something went wrong!");
        },
        complete: function() {}
      });


      $(function () {
        // chart 1
        var options = {
          series: [{
            name: 'Affiliated Member',
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
        function fetchEventCounts() {
          $.ajax({
            url: 'ajax/get_memberReport.ajax.php',
            method: 'POST',
            dataType: 'json',
            success: function(data) {
              console.log(data); // Check the event dates in the browser console
        
              var affiliadted = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // Initialize with 0 for each month
        
              data.forEach(function(event) {
                var dateParts = event.membershipDate.split('-'); // Split the date string into an array
                if (dateParts.length === 3) {
                  var eventMonth = parseInt(dateParts[1]) - 1; // Month is 0-indexed in JavaScript Date object
                  affiliadted[eventMonth]++;
                }
              });
        
              console.log(affiliadted);
        
              // Update the chart with the new data
              updateChartData(affiliadted);
        
              
            
            },
            error: function(xhr, status, error) {
              console.error('Error fetching event counts:', error);
            }
          });
        }
        
        // Create the chart and render it
        var chart = new ApexCharts(document.querySelector("#AffMem"), options);
        chart.render();
        
        // Call the function to fetch event counts and update the chart
        fetchEventCounts();
      });
      
  }else{
 

      $("#event-graph-section").attr('hidden', '');
      $("#affiliated-graph-section").attr('hidden', "");
      $("#affiliatesReportContainer").attr('hidden', "");
      $("#currentStorageReport").attr('hidden', "");
      
      
      $("#report-category").removeAttr('disabled');
      $("#report-range").removeAttr('disabled');

      $("#church-label-change").text('File Storage');
      $("#church-label-change").attr('disabled', 'disabled');
      $("#report-church").attr('disabled', 'disabled');

      $('#report-table tbody').empty();
      const newColumnNames = ['Date', 'Time', 'Event Title', 'Category', 'Venue', 'Location'];
      reinitializeDataTableEmpty(newColumnNames);


  }


});

$("#report-church").change(function(e){
  const newColumnNames = ['File Name', 'File Type', 'File Size'];
   
  if($("#report-church").val() == ""){
    var selectedFolderStorage = getCookie('church_id');
  }else{
    var selectedFolderStorage = $("#report-church").val();

  }

  $("#currentStorageName").text($("#report-church option:selected").text());
  

  $("#currentchurchStorageReport").empty();


  const selectedStorage = firebase.storage().ref().child(selectedFolderStorage);

  Promise.all([
    getFilesInfo(selectedStorage),
    calculateSubfolderSizeReport(selectedStorage)
  ])
    .then(([filesInfo, { totalSize }]) => {
      reinitializeDataTable(newColumnNames, filesInfo, totalSize);
    })
    .catch((error) => {
      console.error('Error retrieving files information:', error);
    });

    calculateSubfolderSizeReport(selectedStorage)
    .then(({ totalSize, fileSizeByExtension }) => {

        var keysList = [];
        $.each(fileSizeByExtension, function(key) {
          keysList.push(key.toUpperCase());
        });
        keysList.push("Free Space");
    

        var valuesList = [];
        $.each(fileSizeByExtension, function(key, value) {
            var valueInMB = (value / 1048576).toFixed(2); // Convert bytes to megabytes and fix to 2 decimal places
            valuesList.push(parseFloat(valueInMB)); 
        });

        var freesize = 1024-(totalSize / 1048576).toFixed(2)
    
        valuesList.push(parseFloat(freesize)); 

        var options = {
          series: valuesList,
          chart: {
            foreColor: '#9ba7b2',
            height: 500,
            type: 'pie',
            toolbar: {
              show: false // Hide the default toolbar (if not needed)
            }
          },
          labels: keysList,
          legend: {
            position: 'right', // Position the legend at the bottom
            fontSize: '14px', // Set the font size for the legend
            offsetY: 8 // Adjust the offset for better spacing
          },
          responsive: [{
            breakpoint: 480,
            options: {
              chart: {
                height: 360
              },
              legend: {
                position: 'bottom'
              }
            }
          }]
        };

                    // Destroy the existing chart instance (if it exists)


          // Create the ApexCharts instance with the same options you have.
          var chart_current = new ApexCharts(document.querySelector("#currentchurchStorageReport"), options);

          // Render the chart to ensure the colors are computed.
          chart_current.render();
      
        var churchStorageReportList = document.getElementById('currentchurchStorageReportList');

        // Clear any existing content in the list before populating it.
        churchStorageReportList.innerHTML = '';

      

        // Get the colors set by ApexCharts for the data points.
        var apexChartColors = chart_current.w.globals.colors;

        // Loop through the keysList and valuesList arrays to create li elements and append them to the ul element.
        for (var i = 0; i < keysList.length; i++) {
        var li = document.createElement('li');
        li.classList.add('list-group-item', 'border-top', 'd-flex', 'justify-content-between', 'align-items-center', 'bg-transparent');

        var spanKey = document.createElement('span');
        spanKey.textContent = keysList[i];

        var spanValue = document.createElement('span');
        spanValue.classList.add('badge', 'rounded-pill');

        // Set the background color of the spanValue based on the color from ApexCharts.
        spanValue.style.backgroundColor = apexChartColors[i % apexChartColors.length];

        spanValue.textContent = valuesList[i].toFixed(1) + ' MB';

        li.appendChild(spanKey);
        li.appendChild(spanValue);
        churchStorageReportList.appendChild(li);
        }    
        


    })
    .catch((error) => {
    console.error('Error calculating folder size:', error);
    });

});

function createCard(churchid, churchname) {
  var card = $('<div></div>').addClass('col-lg-4').append(
    $('<div></div>').addClass('card').append(
      $('<div></div>').addClass('card-header bg-transparent').append(
        $('<div></div>').addClass('d-flex align-items-center').append(
          $('<div></div>').append(
            $('<h6></h6>').addClass('mb-0 fw-bold').text(churchname)
          )
        )
      )
    ).append(
      $('<div></div>').addClass('card-body').append(
        $('<div></div>').attr('id', 'churchStorageReport-' +churchid).css({ 'width': '100%', 'max-width': '600px' })
      )
    ).append(
      $('<div></div>').addClass('card-header bg-transparent').css({ 'overflow-y': 'scroll', 'height': '100px' }).append(
        $('<ul></ul>').addClass('list-group list-group-flush mb-0').attr('id', 'churchStorageReportList-'+churchid)
      )
    )
  );

  // Append the created card to the desired container
  $('#affiliatesReportContainer').append(card);
}


function getCookie(cookieName) {
  const cookiePattern = new RegExp(`(?:(?:^|.*;\\s*)${cookieName}\\s*\\=\\s*([^;]*).*$)|^.*$`);
  const cookieValue = document.cookie.replace(cookiePattern, "$1");
  return cookieValue || null;
}






async function calculateSubfolderSizeReport(prefixRef) {
  const fileRefs = await prefixRef.listAll();
  let subfolderSize = 0;
  let fileSizeByExtension = {};

  await Promise.all(
    fileRefs.items.map(async (fileRef) => {
      const fileInfo = await getFileInfo(fileRef);
      if (fileInfo.fileType !== 'placeholder') {
        subfolderSize += fileInfo.sizeInBytes;
        updateFileSizeByExtension(fileSizeByExtension, fileInfo);
      }
    })
  );

  await Promise.all(
    fileRefs.prefixes.map(async (subPrefixRef) => {
      const subFolderSizes = await calculateSubfolderSizeReport(subPrefixRef);
      subfolderSize += subFolderSizes.totalSize;
      mergeFileSizeByExtension(fileSizeByExtension, subFolderSizes.fileSizeByExtension);
    })
  );

  return {
    totalSize: subfolderSize,
    fileSizeByExtension,
  };
}


function updateFileSizeByExtension(fileSizeByExtension, fileInfo) {
  const { fileType, sizeInBytes } = fileInfo;
  if (!fileSizeByExtension[fileType]) {
    fileSizeByExtension[fileType] = 0;
  }
  fileSizeByExtension[fileType] += sizeInBytes;
}

function mergeFileSizeByExtension(target, source) {
  for (const fileType in source) {
    if (!target[fileType]) {
      target[fileType] = 0;
    }
    target[fileType] += source[fileType];
  }
}


async function getFileSize(fileRef) {
  try {
    const metadata = await fileRef.getMetadata();
    const sizeInBytes = metadata.size;
    return sizeInBytes;
  } catch (error) {
    console.log('Error retrieving file size:', error);
    throw error;
  }
}

// New function to get file information
async function getFileInfo(fileRef) {
  try {
    const metadata = await fileRef.getMetadata();
    const fileName = metadata.name;
    const fileType = getFileType(fileName);
    const sizeInBytes = metadata.size;
    const sizeInKilobytes = sizeInBytes / 1024;

    return {
      fileName,
      fileType,
      sizeInBytes,
      sizeInKilobytes
    };
  } catch (error) {
    console.log('Error retrieving file info:', error);
    throw error;
  }
}

// New function to get file type from the file name
function getFileType(fileName) {
  const parts = fileName.split('.');
  return parts.length > 1 ? parts[parts.length - 1].toLowerCase() : 'unknown';
}

// New function to get files information (including subfolders)
async function getFilesInfo(prefixRef) {
  const fileRefs = await prefixRef.listAll();
  let filesInfo = [];

  await Promise.all(
    fileRefs.items.map(async (fileRef) => {
      const fileInfo = await getFileInfo(fileRef);
      if (fileInfo.fileType !== 'placeholder') {
        filesInfo.push(fileInfo);
      }
    })
  );

  await Promise.all(
    fileRefs.prefixes.map(async (subPrefixRef) => {
      const subFilesInfo = await getFilesInfo(subPrefixRef);
      filesInfo = filesInfo.concat(subFilesInfo);
    })
  );

  return filesInfo;
}




$(function () {
  // chart 1
  var options = {

      series: [{
           name: 'Events',
          data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0] 
      }],
      chart: {
          foreColor: '#9ba7b2',
          height: 330,
          type: 'bar',
          zoom: {
              enabled: false
          },
          toolbar: {
              show: false
          },
      },
      stroke: {
          width: 0,
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
              inverseColors: true,
              opacityFrom: 1,
              opacityTo: 1,
          }
      },
      colors: ['#0d6efd'],
      dataLabels: {
          enabled: false,
          enabledOnSeries: [0] // Set to [0] to target the first (and only) series
      },
      xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      },
  };
  
  // Function to update the chart data
  function updateChartData(newData) {
      // Update the data of the first data series
      options.series[0].data = newData;
      
      // Update the chart with the new data
      chart.updateOptions(options);
  }
  
  
  // Function to fetch event counts from the server and update the chart data
  function fetchEventCounts() {
      $.ajax({
          url: 'ajax/get_churchReport.ajax.php',
          method: 'POST',
          dataType: 'json',
          success: function(data) {
              console.log(data); // Check the event dates in the browser console
  
              var eventCounts = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // Initialize with 0 for each month
  
              data.forEach(function(event) {
                  var dateParts = event.event_date.split('-'); // Split the date string into an array
                  if (dateParts.length === 3) {
                      var eventMonth = parseInt(dateParts[1]) - 1; // Month is 0-indexed in JavaScript Date object
                      eventCounts[eventMonth]++;
                  }
              });
  
              console.log(eventCounts);
  
              // Update the chart with the new data
              updateChartData(eventCounts);
  
        
      
          },
          error: function(xhr, status, error) {
              console.error('Error fetching event counts:', error);
          }
      });
  }
  
  // Create the chart and render it
  var chart = new ApexCharts(document.querySelector("#report"), options);
  chart.render();


  
  // Call the function to fetch event counts and update the chart
  fetchEventCounts();
  
  
  
  
  });

} );