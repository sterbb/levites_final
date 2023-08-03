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



      
    // // Event handler for search input keyup
    // $("#searchQuery").on("keyup", function() {
    //   var query = $(this).val().trim();
  
    //   alert(query);
    //   if (query === "") {
    //     $("#searchResults").empty().hide();
    //     return;
    //   }
  
    //   // Perform the search
    //   search(query);
    // });
  
    // function search(query) {
    //   $.ajax({
    //     url: "publichomepage.controller.php",
    //     method: "POST",
    //     data: { query: query },
    //     dataType: "json",
    //     success: function(response) {
    //       displayResults(response);
    //     },
    //     error: function(xhr, status, error) {
    //         var errorMessage = xhr.responseText; // Extract the error message
    //         alert("Error: " + errorMessage);
    //       }
    //   });
    // }
  
    function displayResults(results) {
      var searchResultsContainer = $("#searchResults");
      var churchResultsContainer = $("#churchResults");
  
      searchResultsContainer.empty(); // Clear existing search results
      churchResultsContainer.empty(); // Clear existing church results
  
      if (results.length === 0) {
        searchResultsContainer.hide();
        return;
      }
  
      results.forEach(function(element) {
        // Create the search result list item
        var listItem = $("<li>")
          .addClass("list-group-item")
          .text(element.church_name)
          .on("click", function() {
            $("#searchQuery").val($(this).text());
            searchResultsContainer.hide();
          });
  
        searchResultsContainer.append(listItem);
      });
  
      searchResultsContainer.show();
  
      // Populate church results
      results.forEach(function(element) {
        var churchCard = $("<div>")
          .addClass("card overflow-hidden")
          .append(
            $("<div>")
              .addClass("profile-cover bg-dark position-relative mb-4")
              .css("background-image", "url('views/images/SanNic.jpg')")
              .css("height", "250px")
              .append(
                $("<div>")
                  .addClass("user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x")
                  .append($("<img>").attr("src", "views/images/LogoTal.jpg").attr("alt", "..."))
              ),
            $("<div>")
              .addClass("card-body")
              .append(
                $("<div>")
                  .addClass("d-flex align-items-start justify-content-between")
                  .append(
                    $("<button>")
                      .addClass("border-0 bg-transparent") // Add the 'border-0' class to the button
                      .attr("church_id", element.churchID)
                      .attr("onclick", "openProfile(this)")
                      .append(
                      $("<div>")
                        .addClass("text-black border-0 text-start")
                        .append(
                          $("<h3>").addClass("mb-2 card-title").text(element.church_name).attr("church_id", element.churchID),
                          $("<span>").addClass("badge bg-success bg-success-subtle text-success border border-opacity-25 border-success m-1").text(element.church_city),
                          $("<span>").addClass("badge bg-primary bg-primary-subtle text-primary border border-opacity-25 mt-2 border-primary").text(element.church_address)
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
    

    document.cookie = "church_id=" + profileid + ";";
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


      const previousDate = new Date(dateString); // Create a new Date object to avoid modifying the original one
      previousDate.setDate(dateObject.getDate() - 1);
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



