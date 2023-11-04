$(document).ready(function() {

    $("#searchQuery").on("keyup", function() {
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
            displayResults(answer);
      
          },
          error: function(xhr, status, error) {
            //         var errorMessage = xhr.responseText; // Extract the error message
            alert("Error: " + error);
          },
          complete: function() {
          }
        });
      });

  
      function displayResults(results) {
        var searchResultsContainer = $("#searchResults");
        var churchResultsContainer = $("#churchResults");
    
        searchResultsContainer.empty(); // Clear existing search results
        churchResultsContainer.empty(); // Clear existing church results
    
        if (results.length === 0) {
            searchResultsContainer.hide();
            return;
        }
    
        results.forEach(function (element) {
            // Create the search result list item
            var listItem = $("<li>")
                .addClass("list-group-item")
                .text(element.church_name)
                .on("click", function () {
                    $("#searchQuery").val($(this).text());
                    searchResultsContainer.hide();
                });
    
            searchResultsContainer.append(listItem);
        });
    
        searchResultsContainer.show();
    
        // Populate church results
        results.forEach(function (element) {
            var churchCard = $("<div>")
                .addClass("card overflow-hidden")
                .append(
                  $("<div>")
                        .addClass("profile-cover bg-dark position-relative mb-4")
                        .css("background-image", function() {
                            if (element.Back) {
                                return "url('./views/uploadBack/" + element.Back + "')";
                            } else {
                                return "url('./views/images/default.png')";
                            }
                        })
                        .css("height", "15rem")
                        .css("background-size", "cover")
                        .css("background-repeat", "no-repeat")
                        .css("background-position", "center")
                        .append(
                            $("<div>")
                                .addClass("user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x")
                                .append($("<img>").attr("src", function() {
                                    if (element.Avatar) {
                                        return "./views/UploadAvatar/" + element.Avatar;
                                    } else {
                                        return "./views/images/default.png";
                                    }
                                }).attr("alt", "...")
                                )
                        ),
                    $("<div>")
                        .addClass("card-body")
                        .append(
                            $("<div>")
                                .addClass("d-flex align-items-start justify-content-between")
                                .append(
                                    $("<button>")
                                        .addClass("border-0 bg-transparent")
                                        .attr("church_id", element.churchID)
                                        .attr("onclick", "openProfile(this)")
                                        .append(
                                            $("<div>")
                                                .addClass("text-black border-0 text-start")
                                                .append(
                                                    $("<h3>").addClass("mb-2 card-title").text(element.church_name).attr("church_id", element.churchID),
                                                    $("<span>").addClass("badge bg-success bg-success-subtle text-success border border-opacity-25 border-success m-1")
                                                        .append(
                                                            $("<i>").addClass("bx bx-map-pin mr-1"),
                                                            " " + element.church_province + ", " + element.church_city
                                                        ),
                                                    $("<span>").addClass("badge bg-success bg-success-subtle text-success border border-opacity-25 border-success m-1")
                                                        .append(
                                                            $("<i>").addClass("bx bx-map-pin mr-1"),
                                                            " "+ element.church_barangay + ", " + element.church_street
                                                        ),
                                                    $("<span>").addClass("badge bg-danger bg-danger-subtle text-danger border border-opacity-25 border-danger m-1")
                                                    .append(
                                                        $("<i>").addClass("bx bx-phone mr-1"),
                                                        " "+ element.church_num
                                                    ),
                                                    $("<span>").addClass("badge bg-primary bg-primary-subtle text-primary border border-opacity-25 border-primary m-1")
                                                    .append(
                                                        $("<i>").addClass("bx bx-envelope"),
                                                        " "+ element.church_email
                                                    )


                                                       
    
                                                )
                                        )
                                )
                        )
                );
    
            churchResultsContainer.append(churchCard);
        });
    }
    


  });

  
  function openProfile(element){

    var profileid = $(element).attr("church_id");
    var profilename= $(element).attr("church_name");

    document.cookie = "church_id=" + profileid + ";";
    document.cookie = "church_name=" + profilename + ";";

    
    window.location.href = "profile";
  }

  $(document).ready(function() {

    function getCookie(cookieName) {
      const cookiePattern = new RegExp(`(?:(?:^|.*;\\s*)${cookieName}\\s*\\=\\s*([^;]*).*$)|^.*$`);
      const cookieValue = document.cookie.replace(cookiePattern, "$1");
      return cookieValue || null;
      }

      var dateString = getCookie("viewDate");
      var path = getCookie("church_id");

      const dateObject = new Date(dateString);



      const options = { year: 'numeric', month: 'long', day: '2-digit' };


      var previousDate = new Date(dateString); // Create a new Date object to avoid modifying the original one
      previousDate.setDate(dateObject.getDate() - 1);


      var event = new Date(dateString);
      const offset = event.getTimezoneOffset();
      event = new Date(event.getTime() - (offset*60*1000));

      var nxtDay = new Date(event);
      nxtDay.setDate(event.getDate() + 1);

      var prevDay = new Date(event);
      prevDay.setDate(event.getDate() - 1);


      let prevdate = prevDay.toISOString().split('T')[0];
      prevdate = prevdate.slice(0,10);

      let nxtdate = nxtDay.toISOString().split('T')[0];
      nxtdate = nxtdate.slice(0,10);

 

      $('#pubPrevDate').val(prevdate);
      $('#pubNxtDate').val(nxtdate);
  

      const formattedPreviousDate = previousDate.toLocaleDateString('en-US', options);
      console.log(formattedPreviousDate);

      const nextDate = new Date(dateString); // Create a new Date object to avoid modifying the original one
      nextDate.setDate(dateObject.getDate() + 1);
      const formattedNextDate = nextDate.toLocaleDateString('en-US', options);
      console.log(formattedNextDate);

      const formattedDate = dateObject.toLocaleDateString('en-US', options);



    $("#catdetails_prev").text(formattedPreviousDate);

    $("#catdetails_calendar_date").text(formattedDate);
    
    $("#catdetails_adv").text(formattedNextDate);


    // Function to get the download URL of the audio file from Firebase Storage
  async function getAudioDownloadURL() {
    try {
      const storage = firebase.storage();
      const audioRef = storage.ref(path + '/Podcast/' + dateString + '.mp3'); // Replace with the actual path to your audio file in Firebase Storage
      const downloadURL = await audioRef.getDownloadURL();
      return downloadURL;
    } catch (error) {
      console.error('Error getting download URL:', error);
      return null;
    }
  }

  // Function to set the src attribute of the audio element with the download URL
  async function loadAudioPlayer() {
    const audioPlayer = document.getElementById('podcastPlayer');
    const downloadURL = await getAudioDownloadURL();
    if (downloadURL) {
      audioPlayer.src = downloadURL;
    }
  }


  // Call the loadAudioPlayer function to set the audio player source
  loadAudioPlayer();


  });

  function getCookie(cookieName) {
    const cookiePattern = new RegExp(`(?:(?:^|.*;\\s*)${cookieName}\\s*\\=\\s*([^;]*).*$)|^.*$`);
    const cookieValue = document.cookie.replace(cookiePattern, "$1");
    return cookieValue || null;
    }


  // Get a reference to the Firebase Storage service
const storage = firebase.storage();

// Function to handle the download
function downloadPodcast() {
  var dateString = getCookie("viewDate");
  var path = getCookie("church_id");


  // Replace 'path/to/your/file' with the actual path to the file in Firebase Storage
  const fileRef = storage.ref(path + "/Podcast/" + dateString + ".mp3");

// Get the download URL for the file
  fileRef.getDownloadURL()
    .then((url) => {
      // Create an anchor element
      const downloadLink = document.createElement('a');
      downloadLink.href = url;

      // Set the custom file name for the downloaded file
      downloadLink.setAttribute('download', "Podcast-" + dateString +".mp3");

      // Append the anchor element to the document (this does not display the element on the page)
      document.body.appendChild(downloadLink);

      // Simulate a click on the anchor element to trigger the download
      downloadLink.click();

      // Clean up: remove the anchor element from the document
      document.body.removeChild(downloadLink);
    })
    .catch((error) => {
      // Handle any errors that may occur during the process
      console.error('Error downloading file:', error);
    }); 
}

$("#pubPrevDate, #pubNxtDate").on('click', function(){

  document.cookie = "viewDate=" +$(this).val();

  window.location.href = "catdetails";
});


// function getLocation() {
//   if ("geolocation" in navigator) {
//     // The browser supports geolocation
//     navigator.geolocation.getCurrentPosition(successCallback, errorCallback, { enableHighAccuracy: true });
//   } else {
//     // Geolocation is not supported in this browser
//     // document.getElementById("locationData").textContent = "Geolocation is not supported in this browser.";
//   }
// }

// function successCallback(position) {
//   var latitude = position.coords.latitude;
//   var longitude = position.coords.longitude;
//   alert(latitude +" - " +longitude);
// }

// function errorCallback(error) {
//   switch (error.code) {
//     case error.PERMISSION_DENIED:
//       document.getElementById("locationData").textContent = "User denied the request for Geolocation.";
//       break;
//     case error.POSITION_UNAVAILABLE:
//       document.getElementById("locationData").textContent = "Location information is unavailable.";
//       break;
//     case error.TIMEOUT:
//       document.getElementById("locationData").textContent = "The request to get user location timed out.";
//       break;
//     case error.UNKNOWN_ERROR:
//       document.getElementById("locationData").textContent = "An unknown error occurred.";
//       break;
//   }
// }

// // Automatically call the getLocation() function when the page loads
// getLocation();



