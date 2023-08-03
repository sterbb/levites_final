$(document).ready(function() {

    var currentPath = getCookie('church_id');

    function getCookie(cookieName) {
        const cookiePattern = new RegExp(`(?:(?:^|.*;\\s*)${cookieName}\\s*\\=\\s*([^;]*).*$)|^.*$`);
        const cookieValue = document.cookie.replace(cookiePattern, "$1");
        return cookieValue || null;
    }




        $("#report-range").change(function(){       
            var daterange = $("#report-range").val();
            alert(daterange)
            if(daterange.length <= 10){
                date1=daterange.substring(0,10).split("-").reverse().join("-");
    
            }else{
                date1=daterange.substring(0,10).split("-").reverse().join("-");
                date2=daterange.substring(14,24).split("-").reverse().join("-");
            }
    
    
        
             var reportData = new FormData();
            reportData.append("date1", daterange);
    
            $.ajax({
            url: "ajax/get_event_report.ajax.php",
            method: "POST",
            data: reportData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
                table.clear().draw();
                
                const newColumnNames = ['Date', 'Time', 'Event Title', 'Category'];

                                    // Remove any existing header
                    $('#report-table thead').remove();

                    var existingHeader = $('#report-table thead');

                    // Create a new header row with the updated column names
                    var headerRow = $('<thead>').append(
                        $('<tr>').append(
                        newColumnNames.map((columnName) => $('<th>').text(columnName))
                        )
                    );

                                        // Replace the existing header with the new one
                    if (existingHeader.length) {
                        existingHeader.replaceWith(headerRow);
                    } else {
                        // If no existing header, simply append the new one
                        $('#report-table').append(headerRow);
                    }
    
                // Populate the DataTable with new data
                answer.forEach(function(row) {

    
                    table.row.add([row.event_date, row.event_time, row.event_title, row.event_category]);
                });
    
                table.draw();
                $("#event-graph-section").removeAttr("hidden"); 
                
    
            },
            error: function(xhr, status, error) {
                console.log(error)
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
            });
        });
} );


var table = $('#report-table').DataTable( {
    lengthChange: false,
    buttons: [ 'copy', 'excel', 'pdf', 'print']
} );

table.buttons().container()
    .appendTo( '#report-table_wrapper .col-md-6:eq(0)' );

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
    const totalRow = $('<tr>').append(
      $('<td>').text('Total Size'),
      $('<td>').text(''),
      $('<td>').text(totalSizeInMB + ' MB')
    );
    tableBody.append(totalRow);
  
    // Step 4: Reinitialize the DataTable with the updated data and header
    $('#report-table').DataTable({
      lengthChange: false,
      buttons: ['copy', 'excel', 'pdf', 'print']
    }).buttons().container().appendTo('#report-table_wrapper .col-md-6:eq(0)');
  }
  
  // Inside the $("#report-type").change event handler:
  $("#report-type").change(function (event) {

    var reportType = $("#report-type").val();
  
    if (reportType === "storage") {

      $("#event-graph-section").attr('hidden', "");
      $("#report-category").attr('disabled', "disabled");
      $("#affiliatesReportContainer").removeAttr("hidden"); 
      const newColumnNames = ['File Name', 'File Type', 'File Size'];
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
            console.log(freesize);
        
            valuesList.push(parseFloat(freesize)); 

            console.log(keysList);

            console.log(valuesList);

            var options = {
                series: valuesList,
                chart: {
                    height: 255,
                    type: 'donut',
                },
                legend: {
                    position: 'bottom',
                    show: false,
                },
                plotOptions: {
                    pie: {
                        // customScale: 0.8,
                        donut: {
                            size: '80%'
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
                labels: keysList,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
 
            var churchStorageReportList = document.getElementById('churchStorageReportList');

            // Clear any existing content in the list before populating it.
            churchStorageReportList.innerHTML = '';

            // Create the ApexCharts instance with the same options you have.
            var chart = new ApexCharts(document.querySelector("#churchStorageReport"), options);

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



        
                // Process or display the data as needed for each object
                console.log("CollabID: " + collabID);
                console.log("Church ID 2: " + churchid);
                console.log("Church Name 2: " + churchname);

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
                    console.log(freesize);
                
                    valuesList.push(parseFloat(freesize)); 
        
                    console.log(keysList);
        
                    console.log(valuesList);
        
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



    }
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