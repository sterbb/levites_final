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
        var listItem = $("<li>").addClass("list-group-item").text(element.church_name).attr("church_id", element.churchID);
        searchResults.append(listItem);

        // Autocomplete input field on click
        listItem.on("click", function() {
          $("#searchBar").val($(this).text());
          $("#searchBar").attr("church_id", $(this).attr("church_id"));
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
  var churchName = $("#searchBar").val();
  var churchID = $("#searchBar").attr("church_id");
  alert(churchName);
  alert(churchID);

  var churchData = new FormData();
  churchData.append("churchName", churchName);
  churchData.append("churchid2", churchID);

  $.ajax({
    url: "ajax/add_collaboration.ajax.php",
    method: "POST",
    data: churchData,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "text",
    success: function(answer) {
      console.log(answer);

    },
    error: function() {
        alert("Oops. Something went wrong!");
    },
    complete: function() {
    }
  });
  
});
  
$('.cancelPending').on('click', function(){
  var collabID = $(this).siblings('input').first().val();
  console.log(collabID);

  var cancelStatus = new FormData();
  cancelStatus.append("collabID", collabID);

  $.ajax({
    url: "ajax/cancel_request.ajax.php",
    method: "POST",
    data: cancelStatus,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(answer) {
      console.log(answer);

      // $("superuser_churchID").val(answer[0]);
      

      location.reload();
  
    },
    error: function() {
        alert("Oops. Something went wrong!");
    },
    complete: function() {
  
    }
  });
}
)

$(".acceptCollab").on('click', function(){
  // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
  var collabID = $(this).siblings('input').first().val();
  console.log(collabID);

  
  var acceptCollab = new FormData();
  acceptCollab.append("collabID", collabID);

  $.ajax({
      url: "ajax/accept_collaboration.ajax.php",
      method: "POST",
      data: acceptCollab,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer) {
        console.log(collabID);

        var storage = firebase.storage();
        var folderRef = storage.ref(collabID + "/.placeholder");
      
        folderRef
          .putString("", "raw")
          .then(function () {
            console.log("Folder created:", collabID + "/.placeholder");
          })
          .catch(function (error) {
            console.log("Error:", error);
          });

          // location.reload();

        
    
    
      },
      error: function() {
          alert("Oops. Something went wrong!");
      },
      complete: function() {
      }
    });
});

$(".rejectCollab").on('click', function(){
// var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
var collabID = $(this).siblings('input').first().val();
console.log(collabID);


var rejectCollab = new FormData();
rejectCollab.append("collabID", collabID);

$.ajax({
    url: "ajax/reject_collaboration.ajax.php",
    method: "POST",
    data: rejectCollab,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(answer) {
      console.log(answer);

      // $("#superuser_churchID").val(answer[0]);

      // // $(".accepted_churches").load(location.href + ' .accepted_churches');
      // // $(".registration_churches").load(location.href + ' .registration_churches');

      location.reload();

      
  
  
    },
    error: function() {
        alert("Oops. Something went wrong!");
    },
    complete: function() {
    }
  });
});

$(".removeCollab").on('click', function(){
// var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
var collabID = $(this).siblings('input').first().val();
console.log(collabID);


var removeCollab = new FormData();
removeCollab.append("collabID", collabID);

$.ajax({
    url: "ajax/remove_collaboration.ajax.php",
    method: "POST",
    data: removeCollab,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(answer) {
      console.log(answer);

      // $("#superuser_churchID").val(answer[0]);

      // // $(".accepted_churches").load(location.href + ' .accepted_churches');
      // // $(".registration_churches").load(location.href + ' .registration_churches');

      location.reload();

      
  
  
    },
    error: function() {
        alert("Oops. Something went wrong!");
    },
    complete: function() {
    }
  });
});

