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
          url: "ajax/add_collaboration.ajax.php",
          method: "POST",
          data: churchData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(answer) {
            displayResults(answer);
      
          },
          error: function() {
            alert("Oops. Something went wrong!");
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

    // function openProfile(element){
    //   alert("hi");
    //   var profileid = element.attr("church_id");
    //   alert(profileid);
    //   document.cookie = "profileID="+ element.attr("church_id")+";";

    // }
  });

  
  function openProfile(element){
    alert(element);
    var profileid = $(element).attr("church_id");
    
    alert(profileid);
    document.cookie = "profileID="+ profileid+ ";";
    window.location.href = "profile";
  }

  
  