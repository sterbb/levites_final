function search(query) {
  var results = [];
  query = query.toLowerCase();

    var donationData = new FormData();
    donationData.append("donation_number", donation_number);
   
    
    $.ajax({
      url: "collaboration.controller.php",
      method: "GET",
      data: {
        method: "searchChurches",
        query: query
      },
      dataType: "json",
      success: function(response) {
        results = response;
        displayResults(results);
      },
      error: function() {
        alert("Oops. Something went wrong!");
      }
    });
  
    return results;
  }
  
  $("#searchBar").on("keyup", function() {
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
        console.log(answer);
  
        searchResults.empty(); // Clear existing search results
  
        answer.forEach(function(element) {
          var listItem = $("<li>").addClass("list-group-item").text(element.church_name);
          searchResults.append(listItem);
  
          // Autocomplete input field on click
          listItem.on("click", function() {
            $("#searchBar").val($(this).text());
            searchResults.hide(); // Hide the dropdown-menu
          });
        });
  
        searchResults.show(); // Show the dropdown-menu
      },
      error: function() {
        alert("Oops. Something went wrong!");
      },
      complete: function() {
      }
    });
  });
  
  $("#sendRequestBtn").on("click", function() {
    var churchName = $("#searchBar").val().trim();
    
    if (churchName !== "") {
      var requestItem = $("<div>").addClass("d-flex align-items-center gap-3");
      var churchImage = $("<div>").append($("<img>").attr("src", "views/images/ch3.jpg").attr("alt", "").attr("width", "50").attr("height", "50").addClass("rounded-circle"));
      var churchInfo = $("<div>").addClass("flex-grow-1").append($("<h6>").addClass("mb-1 fw-bold").text(churchName)).append($("<span>").addClass("badge bg-warning bg-warning-subtle text-warning border border-opacity-25 border-warning").text("Pending Request"));
      var cancelButton = $("<div>").append($("<button>").addClass("btn btn-outline-danger rounded-5 btn-sm px-3").text("Cancel"));
      requestItem.append(churchImage, churchInfo, cancelButton);
      $(".reqlist").append(requestItem).append($("<hr>"));
      
      // Clear input field and hide dropdown-menu
      $("#searchBar").val("");
      $("#searchResults").empty().hide();
    }
  });
  $("#searchBar").on("keyup", function() {
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
        console.log(answer);
  
        searchResults.empty(); // Clear existing search results
  
        answer.forEach(function(element) {
          var listItem = $("<li>").addClass("list-group-item").text(element.church_name);
          searchResults.append(listItem);
  
          // Autocomplete input field on click
          listItem.on("click", function() {
            $("#searchBar").val($(this).text());
            searchResults.hide(); // Hide the dropdown-menu
          });
        });
  
        searchResults.show(); // Show the dropdown-menu
      },
      error: function() {
          alert("Oops. Something went wrong!");
      },
      complete: function() {
      }
    });
  });
  
  $("#sendRequestBtn").on("click", function() {
    var churchName = $("#searchBar").val().trim();
    
    if (churchName !== "") {
      var requestItem = $("<div>").addClass("d-flex align-items-center gap-3");
      var churchImage = $("<div>").append($("<img>").attr("src", "views/images/ch3.jpg").attr("alt", "").attr("width", "50").attr("height", "50").addClass("rounded-circle"));
      var churchInfo = $("<div>").addClass("flex-grow-1").append($("<h6>").addClass("mb-1 fw-bold").text(churchName)).append($("<span>").addClass("badge bg-warning bg-warning-subtle text-warning border border-opacity-25 border-warning").text("Pending Request"));
      var cancelButton = $("<div>").append($("<button>").addClass("btn btn-outline-danger rounded-5 btn-sm px-3").text("Cancel"));
      requestItem.append(churchImage, churchInfo, cancelButton);
      $(".reqlist").append(requestItem).append($("<hr>"));
      
      // Clear input field and hide dropdown-menu
      $("#searchBar").val("");
      $("#searchResults").empty().hide();
    }
  });
    