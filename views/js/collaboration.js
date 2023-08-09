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
    url: "ajax/searchChurch.ajax.php",
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
  var churchID = $(this).siblings('input').first().attr("churchid");
  var church_name = $(this).siblings('input').first().attr("churchname");


  
  var acceptCollab = new FormData();
  acceptCollab.append("collabID", collabID);
  acceptCollab.append("churchID", churchID);
  acceptCollab.append("church_name", church_name);

  $.ajax({
      url: "ajax/accept_collaboration.ajax.php",
      method: "POST",
      data: acceptCollab,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "text",
      success: function(answer) {
        console.log(answer);

        // var storage = firebase.storage();
        // var folderRef = storage.ref(collabID + "/.placeholder");
      
        // folderRef
        //   .putString("", "raw")
        //   .then(function () {
        //     console.log("Folder created:", collabID + "/.placeholder");
        //   })
        //   .catch(function (error) {
        //     console.log("Error:", error);
        //   });

        //   // location.reload();

        
    
    
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
var churchID = $(this).siblings('input').first().attr("churchid");
var church_name = $(this).siblings('input').first().attr("churchname");
console.log(church_name);


var rejectCollab = new FormData();
rejectCollab.append("collabID", collabID);
rejectCollab.append("churchID", churchID);
rejectCollab.append("church_name", church_name);  

$.ajax({
    url: "ajax/reject_collaboration.ajax.php",
    method: "POST",
    data: rejectCollab,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "text",
    success: function(answer) {
      console.log(answer);

      // $("#superuser_churchID").val(answer[0]);

      // // $(".accepted_churches").load(location.href + ' .accepted_churches');
      // // $(".registration_churches").load(location.href + ' .registration_churches');

      // location.reload();

      
  
  
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

$(".viewBtnAdmin").on('click', function(){
  // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
  var church_id = $(this).siblings('input').first().attr('churchid');
  console.log(church_id);


var churchData = new FormData();
churchData.append("church_id", church_id);


$.ajax({
    url: "ajax/get_churchDetails.ajax.php",
    method: "POST",
    data: churchData,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(answer) {
      console.log(answer);

      $("#admin_churchID").val(answer[0]);

      $("#admin_church_name").val(answer[1]);

      $("#admin_church_email").val(answer[2]);

      $("#admin_church_telnum").val(answer[3]);

      $("#admin_church_address").val(answer[4]);

      $("#admin_church_city").val(answer[5]);

      $("#admin_church_religion").val(answer[6]);


      

      $('#churchAdminModal').modal('show'); 

    },
    error: function() {
        alert("Oops. Something went wrong!");
    },
    complete: function() {
    }
  });

});