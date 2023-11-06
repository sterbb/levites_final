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

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      });
    
      Toast.fire({
        icon: 'success',
        title: 'Collaboration Request sent succesfully.'
      });

      var asyncCollab = new FormData();
      asyncCollab.append("collabfunction", "request_collab");
      $.ajax({
        url: "ajax/async_collaboration.ajax.php",
        method: "POST",
        data: asyncCollab,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
          alert(answer);
  
    
        },
        error: function() {
            alert("Oops. Something went wrong!");
        },
        complete: function() {
        }
      });


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

$(document).ready(function() {
  $(".acceptAll").on('click', function() {
    Swal.fire({
      title: 'Confirm Acceptance',
      text: 'Are you sure you want to accept all collaboration requests?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, accept all!',
      cancelButtonText: 'No, decline'
    }).then((result) => {
      if (result.isConfirmed) {
        var acceptAllData = [];

        $(".acceptCollab").each(function() {
          var collabID = $(this).siblings('input').first().val();
          var churchID = $(this).siblings('input').first().attr("churchid");
          var church_name = $(this).siblings('input').first().attr("churchname");

          acceptAllData.push({
            collabID: collabID,
            churchID: churchID,
            church_name: church_name
          });
        });

        if (acceptAllData.length > 0) {
          acceptCollabs(acceptAllData);
        }
      }
    });
  });

    $(".acceptCollab").on('click', function() {
        var collabID = $(this).siblings('input').first().val();
        var churchID = $(this).siblings('input').first().attr("churchid");
        var church_name = $(this).siblings('input').first().attr("churchname");

        acceptCollab(collabID, churchID, church_name);
    });

    function acceptCollab(collabID, churchID, church_name) {
        var acceptCollab = new FormData();
        acceptCollab.append("collabID", collabID);
        acceptCollab.append("churchID", churchID);
        acceptCollab.append("church_name", church_name);

        Swal.fire({
            title: 'Confirm Acceptance',
            text: 'Are you sure you want to accept this collaboration request?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, accept it!',
            cancelButtonText: 'No, decline'
        }).then((result) => {
            if (result.isConfirmed) {
                // User confirmed acceptance, proceed with AJAX request
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

                        // Show success toast notification
                        Swal.fire({
                            icon: 'success',
                            title: 'Request Accepted',
                            text: 'The collaboration request has been successfully accepted.',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                        location.reload();

                        var storage = firebase.storage();
                        var folderRef = storage.ref(collabID + "/.placeholder");

                        folderRef.putString("", "raw")
                            .then(function () {
                                console.log("Folder created:", collabID + "/.placeholder");
                            })
                            .catch(function (error) {
                                console.log("Error:", error);
                            });
                    },
                    error: function() {
                        alert("Oops. Something went wrong!");
                    },
                    complete: function() {
                        // Handle any completion tasks if needed
                    }
                });
            }
        });
    }

    function acceptCollabs(dataArray) {
        var acceptAllData = new FormData();
        acceptAllData.append("dataArray", JSON.stringify(dataArray));

        $.ajax({
            url: "ajax/accept_all_collaborations.ajax.php",
            method: "POST",
            data: acceptAllData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "text",
            success: function(answer) {
                console.log(answer);

                // Show success toast notification
                Swal.fire({
                    icon: 'success',
                    title: 'Request Accepted',
                    text: 'All collaboration requests have been successfully accepted.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                location.reload();
            },
            error: function() {
                alert("Oops. Something went wrong!");
            },
            complete: function() {
                // Handle any completion tasks if needed
            }
        });
    }
});


$(".rejectAll").on('click', function() {
  console.log("Clicked Reject All")
  var rejectAllData = [];

  $(".rejectCollab").each(function() {
    var collabID = $(this).siblings('input').first().val();
    var churchID = $(this).siblings('input').first().attr("churchid");
    var church_name = $(this).siblings('input').first().attr("churchname");

    rejectAllData.push({
      collabID: collabID,
      churchID: churchID,
      church_name: church_name
    });
  });

  if (rejectAllData.length > 0) {
    rejectCollabs(rejectAllData);
  }
});

$(".rejectCollab").on('click', function() {
  var collabID = $(this).siblings('input').first().val();
  var churchID = $(this).siblings('input').first().attr("churchid");
  var church_name = $(this).siblings('input').first().attr("churchname");

  rejectCollab(collabID, churchID, church_name);
});

function rejectCollab(collabID, churchID, church_name) {
  var rejectCollab = new FormData();
  rejectCollab.append("collabID", collabID);
  rejectCollab.append("churchID", churchID);
  rejectCollab.append("church_name", church_name);


  Swal.fire({
    title: 'Confirm Rejection',
    text: 'Are you sure you want to reject this collaboration request?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Yes, reject it!',
    cancelButtonText: 'No, keep it'
  }).then((result) => {
    if (result.isConfirmed) {
      // User confirmed rejection, proceed with AJAX request
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

          // Show success toast notification
          Swal.fire({
            icon: 'success',
            title: 'Request Rejected',
            text: 'The collaboration request has been rejected.',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          });

          // Reload the page
          location.reload();
        },
        error: function() {
          alert("Oops. Something went wrong!");
        },
        complete: function() {
          // Handle any completion tasks if needed
        }
      });
    }
  });
}

function rejectCollabs(dataArray) {
  var rejectAllData = new FormData();
  rejectAllData.append("dataArray", JSON.stringify(dataArray));

  Swal.fire({
    title: 'Confirm Rejection',
    text: 'Are you sure you want to reject all collaboration requests?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Yes, reject all!',
    cancelButtonText: 'No, keep them'
  }).then((result) => {
    if (result.isConfirmed) {
      // User confirmed rejection, proceed with AJAX request
      $.ajax({
        url: "ajax/reject_all_collaborations.ajax.php",
        method: "POST",
        data: rejectAllData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
          console.log(answer);
          

          // Show success toast notification
          Swal.fire({
            icon: 'success',
            title: 'Requests Rejected',
            text: 'All collaboration requests have been rejected.',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          });

          // Reload the page
          location.reload();
        },
        error: function() {
          alert("Oops. Something went wrong!");
        },
        complete: function() {
          // Handle any completion tasks if needed
        }
      });
    }
  });
}

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

//Search Churches for Church Collaboratio
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('searchChurch').addEventListener('input', function() {
      searchChurches();
  });
});


function searchChurches() {
  var input, filter, teamList, churchName, i;
  input = document.getElementById('searchChurch');
  filter = input.value.toUpperCase();
  teamList = document.getElementsByClassName('team-list');

  for (i = 0; i < teamList.length; i++) {
      churchName = teamList[i].getAttribute('data-churchname');
      if (churchName.toUpperCase().indexOf(filter) > -1) {
          teamList[i].style.display = '';
      } else {
          teamList[i].style.display = 'none';
      }
  }
}