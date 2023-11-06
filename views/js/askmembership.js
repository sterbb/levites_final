$(document).on("click", ".askMembershipBtn", function() {
    var memChurchID = $('.profile_churchAskMembership').val();
    
    var memChurchName = $('.profile_churchAskMembership').attr("church-name");
    var city = $('.profile_churchAskMembership').attr("church-city");
    var province = $('.profile_churchAskMembership').attr("church-province");
    
    var ask = new FormData();
    ask.append("memChurchID", memChurchID);
    ask.append("memChurchName", memChurchName);
    ask.append("city", city);
    ask.append("province", province);

    $.ajax({
      url: "ajax/ask_membership.ajax.php",
      method: "POST",
      data: ask,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "text",
      success: function(answer) {
        console.log(answer);

        var askBtn = $(".askMembershipBtn");

        askBtn.text("Cancel Request");
        askBtn.removeClass("btn-primary");
        askBtn.addClass("btn-danger");
        askBtn.val(answer);
        
        console.log("Before removing askMembershipBtn class:", askBtn.attr("class"));
        askBtn.addClass("cancelMembershipBtn");
        askBtn.removeClass("askMembershipBtn");
        console.log("After adding cancelMembershipBtn class:", askBtn.attr("class"));
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log("Ajax Error:");
        console.log("Status: " + textStatus);
        console.log("Error: " + errorThrown);
        console.log("Response Text: " + jqXHR.responseText);
    },
      complete: function() {
      }
    });
    
  });

  $(document).on("click", ".cancelMembershipBtn", function() {


    var membershipID = $(".cancelMembershipBtn").val();


    var cancel = new FormData();
    cancel.append("membershipID", membershipID);

    $.ajax({
      url: "ajax/cancel_membership.ajax.php",
      method: "POST",
      data: cancel,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "text",
      success: function(answer) {
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
            title: 'Cancel submitted successfully.'
          });
          console.log(answer);
          $("#report_accountID").val('');
        location.reload();

      },
      error: function() {
          alert("Oops. Something went wrong!");
      },
      complete: function() {
      }
    });
    
  });

  $(".removeMembershipBtn").on("click", function() {
    

    var membershipID = $(".removeMembershipBtn").val();


    var cancel = new FormData();
    cancel.append("membershipID", membershipID);

    $.ajax({
      url: "ajax/cancel_membership.ajax.php",
      method: "POST",
      data: cancel,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "text",
      success: function(answer) {
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
            title: 'Remove submitted successfully.'
          });
          console.log(answer);
          $("#report_accountID").val('');
        location.reload();

      },
      error: function() {
          alert("Oops. Something went wrong!");
      },
      complete: function() {
      }
    });
    
    
  });

  

  $(".acceptAllMembers").on('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: 'This will accept all members. Continue?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, accept all',
        cancelButtonText: 'No, cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            var acceptAllData = [];

            $(".acceptMember").each(function() {
                var mshipID = $(this).siblings('input').first().val();
                var acc_id = $(this).siblings('input').first().attr('acc_id');
                var acc_name = $(this).siblings('input').first().attr('acc_name');

                acceptAllData.push({
                    mshipID: mshipID,
                    acc_id: acc_id,
                    acc_name: acc_name
                });
            });

            if (acceptAllData.length > 0) {
                acceptAllMembers(acceptAllData);
            }
        }
    });
});

$(".rejectAllMembers").on('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: 'This will reject all members. Continue?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, reject all',
        cancelButtonText: 'No, cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            var rejectAllData = [];

            $(".rejectMember").each(function() {
                var mshipID = $(this).siblings('input').first().val();
                var acc_id = $(this).siblings('input').first().attr('acc_id');
                var acc_name = $(this).siblings('input').first().attr('acc_name');

                rejectAllData.push({
                    mshipID: mshipID,
                    acc_id: acc_id,
                    acc_name: acc_name
                });
            });

            if (rejectAllData.length > 0) {
                rejectAllMembers(rejectAllData);
            }
        }
    });
});

function acceptAllMembers(dataArray) {
    dataArray.forEach(function(member) {
        var acceptMember = new FormData();
        acceptMember.append("mshipID", member.mshipID);
        acceptMember.append("acc_id", member.acc_id);
        acceptMember.append("acc_name", member.acc_name);

        $.ajax({
            url: "ajax/add_member.ajax.php",
            method: "POST",
            data: acceptMember,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "text",
            success: function(answer) {
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
                    title: 'Accept all submitted successfully.'
                  });
                  console.log(answer);
                  $("#report_accountID").val('');
                location.reload();
              },
            error: function() {
                alert("Oops. Something went wrong!");
            }
        });
    });
}

function rejectAllMembers(dataArray) {
    dataArray.forEach(function(member) {
        var rejectMember = new FormData();
        rejectMember.append("mshipID", member.mshipID);
        rejectMember.append("acc_id", member.acc_id);
        rejectMember.append("acc_name", member.acc_name);

        $.ajax({
            url: "ajax/reject_member.ajax.php",
            method: "POST",
            data: rejectMember,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "text",
            success: function(answer) {
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
                    title: 'Reject all submitted successfully.'
                  });
                  console.log(answer);
                  $("#report_accountID").val('');
                location.reload();
              },
            error: function() {
                alert("Oops. Something went wrong!");
            }
        });
    });
}
// Individual Accept Member
$(".acceptMember").on('click', function() {
    var mshipID = $(this).siblings('input').first().val();
    var acc_id = $(this).siblings('input').first().attr('acc_id');
    var acc_name = $(this).siblings('input').first().attr('acc_name');

    Swal.fire({
        title: 'Are you sure?',
        text: 'This will accept the member. Continue?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, accept',
        cancelButtonText: 'No, cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            var acceptMember = new FormData();
            acceptMember.append("mshipID", mshipID);
            acceptMember.append("acc_id", acc_id);
            acceptMember.append("acc_name", acc_name);

            $.ajax({
                url: "ajax/add_member.ajax.php",
                method: "POST",
                data: acceptMember,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function(answer) {
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
                        title: 'Accept submitted successfully.'
                      });
                      console.log(answer);
                      $("#report_accountID").val('');
                    location.reload();
                },
                error: function() {
                    alert("Oops. Something went wrong!");
                }
            });
        }
    });
});

// Individual Reject Member
$(".rejectMember").on('click', function() {
    var mshipID = $(this).siblings('input').first().val();
    var acc_id = $(this).siblings('input').first().attr('acc_id');
    var acc_name = $(this).siblings('input').first().attr('acc_name');

    Swal.fire({
        title: 'Are you sure?',
        text: 'This will reject the member. Continue?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, reject',
        cancelButtonText: 'No, cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            var rejectMember = new FormData();
            rejectMember.append("mshipID", mshipID);
            rejectMember.append("acc_id", acc_id);
            rejectMember.append("acc_name", acc_name);

            $.ajax({
                url: "ajax/reject_member.ajax.php",
                method: "POST",
                data: rejectMember,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function(answer) {
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
                        title: 'Reject submitted successfully.'
                      });
                      console.log(answer);
                      $("#report_accountID").val('');
                    location.reload();
                },
                error: function() {
                    alert("Oops. Something went wrong!");
                }
            });
        }
    });
});



$(".removeMember").on('click', function () {
    var mshipID = $(this).siblings('input').first().val();

    // Show a SweetAlert confirmation dialog
    Swal.fire({
        title: 'Confirmation',
        text: 'Are you sure you want to remove this member?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, remove member',
        cancelButtonText: 'No, cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // The user clicked the confirm button

            var removeMember = new FormData();
            removeMember.append("mshipID", mshipID);

            $.ajax({
                url: "ajax/remove_member.ajax.php",
                method: "POST",
                data: removeMember,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function (answer) {
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
                        title: 'Remove submitted successfully.'
                      });
                      console.log(answer);
                      $("#report_accountID").val('');
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.log(xhr);
                    alert("Oops. Something went wrong!");
                },
                complete: function () {
                    // You can add any completion logic here
                }
            });
        }
    });
});




// Member Request Search

$(document).ready(function() {
    $("#searchMem").on("keyup", function() {
      var searchText = $(this).val().toLowerCase(); // Get the text entered in the search input
  
      // Loop through each div with class "church_container"
      $(".searchMemReq").each(function() {
        var churchName = $(this).find(".flex-grow-1 .fw-bold").text().toLowerCase(); // Get the church name
        var isVisible = churchName.includes(searchText); // Check if church name contains search text
  
        // Toggle visibility based on search text
        $(this).toggle(isVisible);
      });
    });
  });


// Member Only Search
  $(document).ready(function() {
    $("#memberSearch").on("keyup", function() {
      var searchText = $(this).val().toLowerCase(); // Get the text entered in the search input
  
      // Loop through each div with class "church_container"
      $(".memSearch").each(function() {
        var churchName = $(this).find(".flex-grow-1 .fw-bold").text().toLowerCase(); // Get the church name
        var isVisible = churchName.includes(searchText); // Check if church name contains search text
  
        // Toggle visibility based on search text
        $(this).toggle(isVisible);
      });
    });
  });

// Member Rejected Search
  $(document).ready(function() {
    $("#rejectMemSearch").on("keyup", function() {
      var searchText = $(this).val().toLowerCase(); // Get the text entered in the search input
  
      // Loop through each div with class "church_container"
      $(".RejectSearchMem").each(function() {
        var churchName = $(this).find(".flex-grow-1 .fw-bold").text().toLowerCase(); // Get the church name
        var isVisible = churchName.includes(searchText); // Check if church name contains search text
  
        // Toggle visibility based on search text
        $(this).toggle(isVisible);
      });
    });
  });

  