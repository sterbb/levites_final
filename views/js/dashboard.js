$(document).ready(function() {



    var currentPath = getCookie('church_id');

     const folderRef = firebase.storage().ref().child(currentPath);

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
          if(freesize < 500){
            var warn = '<a class="dropdown-item" href="filestorage" id="notificationFileStorage"><div class="d-flex align-items-center"><div class="notify text-warning border"><span class="material-symbols-outlined">hard_drive</span></div><div class="flex-grow-1"><h6 class="msg-name">Local Storage</h6><p class="msg-info">You only have ' +freesize.toFixed(2) +' MB left.</p></div></div></a>';
            $("#notifications").append(warn);
          }

          console.log(freesize + "iya ka?");


      
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


          // Create the ApexCharts instance with the same options you have.
          var chart = new ApexCharts(document.querySelector("#dashboardLocalStorage"), options);
          // Render the chart to ensure the colors are computed.
          chart.render();

      const totalSizeInMB = !isNaN(totalSize) ? (totalSize / (1024 * 1024)).toFixed(2) : 'N/A'; // Convert bytes to megabytes with 2 decimal places or show 'N/A'

      console.log("Total Size:", totalSizeInMB);
      $("#consumedSpace").text(totalSizeInMB + " MB");

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

              createCardDash(collabID, churchname);


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
      
                  var freesize = 200-(totalSize / 1048576).toFixed(2)

                  if(freesize < 100){
                    var warn = '<a class="dropdown-item" href="filestorage" id="notificationFileStorage"><div class="d-flex align-items-center"><div class="notify text-warning border"><span class="material-symbols-outlined">hard_drive</span></div><div class="flex-grow-1"><h6 class="msg-name">'+churchname +'</h6><p class="msg-info">You only have ' +freesize.toFixed(2) +' MB left in your collaboration.</p></div></div></a>';
                    $("#notifications").append(warn);
                  }
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
       

      
                  // Create the ApexCharts instance with the same options you have.
                  var chart = new ApexCharts(document.querySelector("#dashboardLocalStorage-" + collabID), options);
                  // Render the chart to ensure the colors are computed.
                  chart.render();
      

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



  // $(".dashboardaffiliatesSection").click(function(){
//   alert("hell hehehe");
// });


function createCardDash(churchid, churchname) {
    // jQuery code
    var cardTitle = churchname;
    var btnText = "View Storage";
    var btnLink = churchid;

    var card = $('<div>').addClass('card text-center');
    var storageDiv = $('<div>').attr('id', 'dashboardLocalStorage-'+btnLink).addClass('mt-3');
    var cardBody = $('<div>').addClass('card-body');
    var title = $('<h5>').addClass('card-title').text(cardTitle);
    var btn = $('<button>').attr('id', btnLink).attr('value', btnLink).attr('onclick', 'openAffiliateStorage(this)').addClass('btn btn-primary dashboardaffiliatesSection').text(btnText);
    
    cardBody.append(title, btn);
    card.append(storageDiv, cardBody);
    $('#dashboardStorageSection').append(card);
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


















});

