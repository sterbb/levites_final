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

  $(document).on('click', '.removeMembershipBtn', function() {
    

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
            title: 'Membership cancelled successfully.'
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

  
  $(document).on('click', '.acceptAllMembers', function() {
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

$(document).on('click', '.rejectAllMembers', function() {
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
                    title: 'Memberships accepted successfully.'
                  });
                  console.log(answer);
                  $("#report_accountID").val('');

                  var asyncCollab = new FormData();
                  asyncCollab.append("collab_section", "membership_request");
                  $.ajax({
                    url: "ajax/async_collaboration.ajax.php",
                    method: "POST",
                    data: asyncCollab,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(answer) {
                      console.log(answer);
            
                        var requestSection = document.querySelector('.membership_request_section');
                        requestSection.innerHTML = '';
                        var imagePath = ""; // Default value
            
                      answer.forEach(function (value, key) {
            
                   
            
                        var asyncImage = new FormData();
                        asyncImage.append("image_purpose", "public");
                        asyncImage.append("data1",  value['memberID']);
                        asyncImage.append("data2", "");
            
                        $.ajax({
                          url: "ajax/async_images.ajax.php",
                          method: "POST",
                          data: asyncImage,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(image) {

                                  if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                    
                                    imagePath = "./views/images/default.png"; // Default value
                  
                  
                  
                  
                                    const html = `
                                      <div class="searchMemReq">
                                          <div class="team-list m-3 churchDiv">
                                              <div class="d-flex align-items-center gap-3">
                                                  <div class="">
                                                      <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                  </div>
                                                  <div class="flex-grow-1">
                                                      <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                  </div>
                                                  <div class="">
                                                      <input type="text" value="${value['mshipID']}" acc_id="${value['memberID']}" acc_name="${value['memberName']}" style="display:none;" required>
                                                      <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                                      <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectMember">Reject</button>
                                                  </div>
                                              </div>
                                              <hr>
                                          </div>
                                      </div>
                                      `;

                                      requestSection.innerHTML += html;
                        
                        
                                  } else {
                                      imagePath = "./views/UploadAvatar/" + image["Avatar"];
                  
                        
                  
                                    
                                      const html = `
                                      <div class="searchMemReq">
                                          <div class="team-list m-3 churchDiv">
                                              <div class="d-flex align-items-center gap-3">
                                                  <div class="">
                                                      <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                  </div>
                                                  <div class="flex-grow-1">
                                                      <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                  </div>
                                                  <div class="">
                                                      <input type="text" value="${value['mshipID']}" acc_id="${value['memberID']}" acc_name="${value['memberName']}" style="display:none;" required>
                                                      <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                                      <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectMember">Reject</button>
                                                  </div>
                                              </div>
                                              <hr>
                                          </div>
                                      </div>
                                      `;

                                      requestSection.innerHTML += html;
                        
                          
                          
                          
                                  }
                  
                                  console.log(imagePath)
                      
        
        
        
        
                                
        
    
        
               
          
                    
              
                    
                          },
                          error: function(xhr, status, error) {
                            console.log(xhr)
                              alert("Oops. Something went wrong!");
                          },
                          complete: function() {
                          }
                        });
            
                      });

                
                    },
                    error: function() {
                        alert("Oops. Something went wrong!");
                    },
                    complete: function() {
                    }
                  });

                  var asyncCollab = new FormData();
                  asyncCollab.append("collab_section", "members");
                  $.ajax({
                    url: "ajax/async_collaboration.ajax.php",
                    method: "POST",
                    data: asyncCollab,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(answer) {
                      console.log(answer);
            
                        var requestSection = document.querySelector('.members_section');
                        requestSection.innerHTML = '';
                        var imagePath = ""; // Default value
            
                      answer.forEach(function (value, key) {
            
                   
            
                        var asyncImage = new FormData();
                        asyncImage.append("image_purpose", "public");
                        asyncImage.append("data1",  value['memberID']);
                        asyncImage.append("data2", "");
            
                        $.ajax({
                          url: "ajax/async_images.ajax.php",
                          method: "POST",
                          data: asyncImage,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(image) {

                                  if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                    
                                    imagePath = "./views/images/default.png"; // Default value
                  
                  
                  
                  
                                    const html = `
                                    <div class="memSearch">
                                        <div class="team-list m-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-bold">${value['memberName']} </h6>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                    <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bi bi-calendar-check-fill"></i> ${value['membershipDate']}</span>
                                                </div>
                                                <div class="">
                                                    <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                    <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeMember">Remove</button>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    `;

                                      requestSection.innerHTML += html;
                        
                        
                                  } else {
                                      imagePath = "./views/UploadAvatar/" + image["Avatar"];
                  
                        
                  
                                    
                                     
                                    const html = `
                                    <div class="memSearch">
                                        <div class="team-list m-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-bold">${value['memberName']} </h6>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                    <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bi bi-calendar-check-fill"></i> ${value['membershipDate']}</span>
                                                </div>
                                                <div class="">
                                                    <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                    <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeMember">Remove</button>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    `;

                                      requestSection.innerHTML += html;
                        
                          
                          
                          
                                  }
                  
                                  console.log(imagePath)
                      
        
        
        
        
                                
        
    
        
               
          
                    
              
                    
                          },
                          error: function(xhr, status, error) {
                            console.log(xhr)
                              alert("Oops. Something went wrong!");
                          },
                          complete: function() {
                          }
                        });
            
                      });

                
                    },
                    error: function() {
                        alert("Oops. Something went wrong!");
                    },
                    complete: function() {
                    }
                  });

                  var asyncCollab = new FormData();
                  asyncCollab.append("collab_section", "reject_membership");
                  $.ajax({
                    url: "ajax/async_collaboration.ajax.php",
                    method: "POST",
                    data: asyncCollab,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(answer) {
                      console.log(answer);
            
                        var requestSection = document.querySelector('.rejected_membership_section');
                        requestSection.innerHTML = '';
                        var imagePath = ""; // Default value
            
                      answer.forEach(function (value, key) {
            
                   
            
                        var asyncImage = new FormData();
                        asyncImage.append("image_purpose", "public");
                        asyncImage.append("data1",  value['memberID']);
                        asyncImage.append("data2", "");
            
                        $.ajax({
                          url: "ajax/async_images.ajax.php",
                          method: "POST",
                          data: asyncImage,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(image) {

                                  if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                    
                                    imagePath = "./views/images/default.png"; // Default value
                  
                  
                  
                  
                                    const html = `
                                    <div class="RejectSearchMem">
                                        <div class="team-list m-3 churchDiv">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                </div>
                                                <div class="">
                                                    <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                    <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                              
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    `;
                                      requestSection.innerHTML += html;
                        
                        
                                  } else {
                                      imagePath = "./views/UploadAvatar/" + image["Avatar"];
                  
                        
                  
                                    
                                      const html = `
                                    <div class="RejectSearchMem">
                                        <div class="team-list m-3 churchDiv">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                </div>
                                                <div class="">
                                                    <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                    <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                    
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    `;

                                      requestSection.innerHTML += html;
                        
                          
                          
                          
                                  }
                  
                                  console.log(imagePath)
                      
        
        
        
        
                                
        
    
        
               
          
                    
              
                    
                          },
                          error: function(xhr, status, error) {
                            console.log(xhr)
                              alert("Oops. Something went wrong!");
                          },
                          complete: function() {
                          }
                        });
            
                      });

                
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
                    title: 'Memberships rejected successfully.'
                  });
                  console.log(answer);
                  $("#report_accountID").val('');
                  var asyncCollab = new FormData();
                  asyncCollab.append("collab_section", "membership_request");
                  $.ajax({
                    url: "ajax/async_collaboration.ajax.php",
                    method: "POST",
                    data: asyncCollab,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(answer) {
                      console.log(answer);
            
                        var requestSection = document.querySelector('.membership_request_section');
                        requestSection.innerHTML = '';
                        var imagePath = ""; // Default value
            
                      answer.forEach(function (value, key) {
            
                   
            
                        var asyncImage = new FormData();
                        asyncImage.append("image_purpose", "public");
                        asyncImage.append("data1",  value['memberID']);
                        asyncImage.append("data2", "");
            
                        $.ajax({
                          url: "ajax/async_images.ajax.php",
                          method: "POST",
                          data: asyncImage,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(image) {

                                  if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                    
                                    imagePath = "./views/images/default.png"; // Default value
                  
                  
                  
                  
                                    const html = `
                                      <div class="searchMemReq">
                                          <div class="team-list m-3 churchDiv">
                                              <div class="d-flex align-items-center gap-3">
                                                  <div class="">
                                                      <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                  </div>
                                                  <div class="flex-grow-1">
                                                      <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                  </div>
                                                  <div class="">
                                                      <input type="text" value="${value['mshipID']}" acc_id="${value['memberID']}" acc_name="${value['memberName']}" style="display:none;" required>
                                                      <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                                      <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectMember">Reject</button>
                                                  </div>
                                              </div>
                                              <hr>
                                          </div>
                                      </div>
                                      `;

                                      requestSection.innerHTML += html;
                        
                        
                                  } else {
                                      imagePath = "./views/UploadAvatar/" + image["Avatar"];
                  
                        
                  
                                    
                                      const html = `
                                      <div class="searchMemReq">
                                          <div class="team-list m-3 churchDiv">
                                              <div class="d-flex align-items-center gap-3">
                                                  <div class="">
                                                      <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                  </div>
                                                  <div class="flex-grow-1">
                                                      <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                  </div>
                                                  <div class="">
                                                      <input type="text" value="${value['mshipID']}" acc_id="${value['memberID']}" acc_name="${value['memberName']}" style="display:none;" required>
                                                      <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                                      <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectMember">Reject</button>
                                                  </div>
                                              </div>
                                              <hr>
                                          </div>
                                      </div>
                                      `;

                                      requestSection.innerHTML += html;
                        
                          
                          
                          
                                  }
                  
                                  console.log(imagePath)
                      
        
        
        
        
                                
        
    
        
               
          
                    
              
                    
                          },
                          error: function(xhr, status, error) {
                            console.log(xhr)
                              alert("Oops. Something went wrong!");
                          },
                          complete: function() {
                          }
                        });
            
                      });

                
                    },
                    error: function() {
                        alert("Oops. Something went wrong!");
                    },
                    complete: function() {
                    }
                  });

                  var asyncCollab = new FormData();
                  asyncCollab.append("collab_section", "reject_membership");
                  $.ajax({
                    url: "ajax/async_collaboration.ajax.php",
                    method: "POST",
                    data: asyncCollab,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(answer) {
                      console.log(answer);
            
                        var requestSection = document.querySelector('.rejected_membership_section');
                        requestSection.innerHTML = '';
                        var imagePath = ""; // Default value
            
                      answer.forEach(function (value, key) {
            
                   
            
                        var asyncImage = new FormData();
                        asyncImage.append("image_purpose", "public");
                        asyncImage.append("data1",  value['memberID']);
                        asyncImage.append("data2", "");
            
                        $.ajax({
                          url: "ajax/async_images.ajax.php",
                          method: "POST",
                          data: asyncImage,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: "json",
                          success: function(image) {

                                  if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                    
                                    imagePath = "./views/images/default.png"; // Default value
                  
                  
                  
                  
                                    const html = `
                                    <div class="RejectSearchMem">
                                        <div class="team-list m-3 churchDiv">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                </div>
                                                <div class="">
                                                    <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                    <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                              
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    `;
                                      requestSection.innerHTML += html;
                        
                        
                                  } else {
                                      imagePath = "./views/UploadAvatar/" + image["Avatar"];
                  
                        
                  
                                    
                                      const html = `
                                    <div class="RejectSearchMem">
                                        <div class="team-list m-3 churchDiv">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                </div>
                                                <div class="">
                                                    <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                    <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                    
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    `;

                                      requestSection.innerHTML += html;
                        
                          
                          
                          
                                  }
                  
                                  console.log(imagePath)
                      
        
        
        
        
                                
        
    
        
               
          
                    
              
                    
                          },
                          error: function(xhr, status, error) {
                            console.log(xhr)
                              alert("Oops. Something went wrong!");
                          },
                          complete: function() {
                          }
                        });
            
                      });

                
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
            }
        });
    });
}
// Individual Accept Member
$(document).on('click', '.acceptMember', function() {
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
                        title: 'Membership accepted successfully.'
                      });
                      console.log(answer);
                      $("#report_accountID").val('');

                      var asyncCollab = new FormData();
                      asyncCollab.append("collab_section", "membership_request");
                      $.ajax({
                        url: "ajax/async_collaboration.ajax.php",
                        method: "POST",
                        data: asyncCollab,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(answer) {
                          console.log(answer);
                
                            var requestSection = document.querySelector('.membership_request_section');
                            requestSection.innerHTML = '';
                            var imagePath = ""; // Default value
                
                          answer.forEach(function (value, key) {
                
                       
                
                            var asyncImage = new FormData();
                            asyncImage.append("image_purpose", "public");
                            asyncImage.append("data1",  value['memberID']);
                            asyncImage.append("data2", "");
                
                            $.ajax({
                              url: "ajax/async_images.ajax.php",
                              method: "POST",
                              data: asyncImage,
                              cache: false,
                              contentType: false,
                              processData: false,
                              dataType: "json",
                              success: function(image) {
 
                                      if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                        
                                        imagePath = "./views/images/default.png"; // Default value
                      
                      
                      
                      
                                        const html = `
                                          <div class="searchMemReq">
                                              <div class="team-list m-3 churchDiv">
                                                  <div class="d-flex align-items-center gap-3">
                                                      <div class="">
                                                          <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                      </div>
                                                      <div class="flex-grow-1">
                                                          <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                          <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                      </div>
                                                      <div class="">
                                                          <input type="text" value="${value['mshipID']}" acc_id="${value['memberID']}" acc_name="${value['memberName']}" style="display:none;" required>
                                                          <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                                          <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectMember">Reject</button>
                                                      </div>
                                                  </div>
                                                  <hr>
                                              </div>
                                          </div>
                                          `;

                                          requestSection.innerHTML += html;
                            
                            
                                      } else {
                                          imagePath = "./views/UploadAvatar/" + image["Avatar"];
                      
                            
                      
                                        
                                          const html = `
                                          <div class="searchMemReq">
                                              <div class="team-list m-3 churchDiv">
                                                  <div class="d-flex align-items-center gap-3">
                                                      <div class="">
                                                          <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                      </div>
                                                      <div class="flex-grow-1">
                                                          <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                          <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                      </div>
                                                      <div class="">
                                                          <input type="text" value="${value['mshipID']}" acc_id="${value['memberID']}" acc_name="${value['memberName']}" style="display:none;" required>
                                                          <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                                          <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectMember">Reject</button>
                                                      </div>
                                                  </div>
                                                  <hr>
                                              </div>
                                          </div>
                                          `;

                                          requestSection.innerHTML += html;
                            
                              
                              
                              
                                      }
                      
                                      console.log(imagePath)
                          
            
            
            
            
                                    
            
        
            
                   
              
                        
                  
                        
                              },
                              error: function(xhr, status, error) {
                                console.log(xhr)
                                  alert("Oops. Something went wrong!");
                              },
                              complete: function() {
                              }
                            });
                
                          });

                    
                        },
                        error: function() {
                            alert("Oops. Something went wrong!");
                        },
                        complete: function() {
                        }
                      });

                      var asyncCollab = new FormData();
                      asyncCollab.append("collab_section", "members");
                      $.ajax({
                        url: "ajax/async_collaboration.ajax.php",
                        method: "POST",
                        data: asyncCollab,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(answer) {
                          console.log(answer);
                
                            var requestSection = document.querySelector('.members_section');
                            requestSection.innerHTML = '';
                            var imagePath = ""; // Default value
                
                          answer.forEach(function (value, key) {
                
                       
                
                            var asyncImage = new FormData();
                            asyncImage.append("image_purpose", "public");
                            asyncImage.append("data1",  value['memberID']);
                            asyncImage.append("data2", "");
                
                            $.ajax({
                              url: "ajax/async_images.ajax.php",
                              method: "POST",
                              data: asyncImage,
                              cache: false,
                              contentType: false,
                              processData: false,
                              dataType: "json",
                              success: function(image) {
 
                                      if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                        
                                        imagePath = "./views/images/default.png"; // Default value
                      
                      
                      
                      
                                        const html = `
                                        <div class="memSearch">
                                            <div class="team-list m-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="">
                                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 fw-bold">${value['memberName']} </h6>
                                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                        <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bi bi-calendar-check-fill"></i> ${value['membershipDate']}</span>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                        <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeMember">Remove</button>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        `;

                                          requestSection.innerHTML += html;
                            
                            
                                      } else {
                                          imagePath = "./views/UploadAvatar/" + image["Avatar"];
                      
                            
                      
                                        
                                         
                                        const html = `
                                        <div class="memSearch">
                                            <div class="team-list m-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="">
                                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 fw-bold">${value['memberName']} </h6>
                                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                        <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bi bi-calendar-check-fill"></i> ${value['membershipDate']}</span>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                        <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeMember">Remove</button>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        `;

                                          requestSection.innerHTML += html;
                            
                              
                              
                              
                                      }
                      
                                      console.log(imagePath)
                          
            
            
            
            
                                    
            
        
            
                   
              
                        
                  
                        
                              },
                              error: function(xhr, status, error) {
                                console.log(xhr)
                                  alert("Oops. Something went wrong!");
                              },
                              complete: function() {
                              }
                            });
                
                          });

                    
                        },
                        error: function() {
                            alert("Oops. Something went wrong!");
                        },
                        complete: function() {
                        }
                      });

                      var asyncCollab = new FormData();
                      asyncCollab.append("collab_section", "reject_membership");
                      $.ajax({
                        url: "ajax/async_collaboration.ajax.php",
                        method: "POST",
                        data: asyncCollab,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(answer) {
                          console.log(answer);
                
                            var requestSection = document.querySelector('.rejected_membership_section');
                            requestSection.innerHTML = '';
                            var imagePath = ""; // Default value
                
                          answer.forEach(function (value, key) {
                
                       
                
                            var asyncImage = new FormData();
                            asyncImage.append("image_purpose", "public");
                            asyncImage.append("data1",  value['memberID']);
                            asyncImage.append("data2", "");
                
                            $.ajax({
                              url: "ajax/async_images.ajax.php",
                              method: "POST",
                              data: asyncImage,
                              cache: false,
                              contentType: false,
                              processData: false,
                              dataType: "json",
                              success: function(image) {
    
                                      if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                        
                                        imagePath = "./views/images/default.png"; // Default value
                      
                      
                      
                      
                                        const html = `
                                        <div class="RejectSearchMem">
                                            <div class="team-list m-3 churchDiv">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="">
                                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                        <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                                  
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        `;
                                          requestSection.innerHTML += html;
                            
                            
                                      } else {
                                          imagePath = "./views/UploadAvatar/" + image["Avatar"];
                      
                            
                      
                                        
                                          const html = `
                                        <div class="RejectSearchMem">
                                            <div class="team-list m-3 churchDiv">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="">
                                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                        <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                        
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        `;
    
                                          requestSection.innerHTML += html;
                            
                              
                              
                              
                                      }
                      
                                      console.log(imagePath)
                          
            
            
            
            
                                    
            
        
            
                   
              
                        
                  
                        
                              },
                              error: function(xhr, status, error) {
                                console.log(xhr)
                                  alert("Oops. Something went wrong!");
                              },
                              complete: function() {
                              }
                            });
                
                          });
    
                    
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
                }
            });
        }
    });
});

// Individual Reject Member
$(document).on('click', '.rejectMember', function() {
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
                        title: 'Member rejected successfully.'
                      });
                      console.log(answer);
                      $("#report_accountID").val('');
                    
                      var asyncCollab = new FormData();
                      asyncCollab.append("collab_section", "membership_request");
                      $.ajax({
                        url: "ajax/async_collaboration.ajax.php",
                        method: "POST",
                        data: asyncCollab,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(answer) {
                          console.log(answer);
                
                            var requestSection = document.querySelector('.membership_request_section');
                            requestSection.innerHTML = '';
                            var imagePath = ""; // Default value
                
                          answer.forEach(function (value, key) {
                
                       
                
                            var asyncImage = new FormData();
                            asyncImage.append("image_purpose", "public");
                            asyncImage.append("data1",  value['memberID']);
                            asyncImage.append("data2", "");
                
                            $.ajax({
                              url: "ajax/async_images.ajax.php",
                              method: "POST",
                              data: asyncImage,
                              cache: false,
                              contentType: false,
                              processData: false,
                              dataType: "json",
                              success: function(image) {
    
                                      if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                        
                                        imagePath = "./views/images/default.png"; // Default value
                      
                      
                      
                      
                                        const html = `
                                          <div class="searchMemReq">
                                              <div class="team-list m-3 churchDiv">
                                                  <div class="d-flex align-items-center gap-3">
                                                      <div class="">
                                                          <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                      </div>
                                                      <div class="flex-grow-1">
                                                          <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                          <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                      </div>
                                                      <div class="">
                                                          <input type="text" value="${value['mshipID']}" acc_id="${value['memberID']}" acc_name="${value['memberName']}" style="display:none;" required>
                                                          <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                                          <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectMember">Reject</button>
                                                      </div>
                                                  </div>
                                                  <hr>
                                              </div>
                                          </div>
                                          `;
    
                                          requestSection.innerHTML += html;
                            
                            
                                      } else {
                                          imagePath = "./views/UploadAvatar/" + image["Avatar"];
                      
                            
                      
                                        
                                          const html = `
                                          <div class="searchMemReq">
                                              <div class="team-list m-3 churchDiv">
                                                  <div class="d-flex align-items-center gap-3">
                                                      <div class="">
                                                          <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                      </div>
                                                      <div class="flex-grow-1">
                                                          <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                          <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                      </div>
                                                      <div class="">
                                                          <input type="text" value="${value['mshipID']}" acc_id="${value['memberID']}" acc_name="${value['memberName']}" style="display:none;" required>
                                                          <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                                          <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectMember">Reject</button>
                                                      </div>
                                                  </div>
                                                  <hr>
                                              </div>
                                          </div>
                                          `;
    
                                          requestSection.innerHTML += html;
                            
                              
                              
                              
                                      }
                      
                                      console.log(imagePath)
                          
            
                   
                              },
                              error: function(xhr, status, error) {
                                console.log(xhr)
                                  alert("Oops. Something went wrong!");
                              },
                              complete: function() {
                              }
                            });
                
                          });
    
                    
                        },
                        error: function() {
                            alert("Oops. Something went wrong!");
                        },
                        complete: function() {
                        }
                      });

                      var asyncCollab = new FormData();
                      asyncCollab.append("collab_section", "reject_membership");
                      $.ajax({
                        url: "ajax/async_collaboration.ajax.php",
                        method: "POST",
                        data: asyncCollab,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(answer) {
                          console.log(answer);
                
                            var requestSection = document.querySelector('.rejected_membership_section');
                            requestSection.innerHTML = '';
                            var imagePath = ""; // Default value
                
                          answer.forEach(function (value, key) {
                
                       
                
                            var asyncImage = new FormData();
                            asyncImage.append("image_purpose", "public");
                            asyncImage.append("data1",  value['memberID']);
                            asyncImage.append("data2", "");
                
                            $.ajax({
                              url: "ajax/async_images.ajax.php",
                              method: "POST",
                              data: asyncImage,
                              cache: false,
                              contentType: false,
                              processData: false,
                              dataType: "json",
                              success: function(image) {
    
                                      if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                        
                                        imagePath = "./views/images/default.png"; // Default value
                      
                      
                      
                      
                                        const html = `
                                        <div class="RejectSearchMem">
                                            <div class="team-list m-3 churchDiv">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="">
                                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                        <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                                  
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        `;
                                          requestSection.innerHTML += html;
                            
                            
                                      } else {
                                          imagePath = "./views/UploadAvatar/" + image["Avatar"];
                      
                            
                      
                                        
                                          const html = `
                                        <div class="RejectSearchMem">
                                            <div class="team-list m-3 churchDiv">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="">
                                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                        <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                        
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        `;
    
                                          requestSection.innerHTML += html;
                            
                              
                              
                              
                                      }
                      
                                      console.log(imagePath)
                          
            
            
            
            
                                    
            
        
            
                   
              
                        
                  
                        
                              },
                              error: function(xhr, status, error) {
                                console.log(xhr)
                                  alert("Oops. Something went wrong!");
                              },
                              complete: function() {
                              }
                            });
                
                          });
    
                    
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
                }
            });
        }
    });
});


$(document).on('click', '.removeMember', function() {
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
                        title: 'Member removed successfully.'
                      });
                      console.log(answer);
                      $("#report_accountID").val('');

                      var asyncCollab = new FormData();
                      asyncCollab.append("collab_section", "membership_request");
                      $.ajax({
                        url: "ajax/async_collaboration.ajax.php",
                        method: "POST",
                        data: asyncCollab,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(answer) {
                          console.log(answer);
                
                            var requestSection = document.querySelector('.membership_request_section');
                            requestSection.innerHTML = '';
                            var imagePath = ""; // Default value
                
                          answer.forEach(function (value, key) {
                
                       
                
                            var asyncImage = new FormData();
                            asyncImage.append("image_purpose", "public");
                            asyncImage.append("data1",  value['memberID']);
                            asyncImage.append("data2", "");
                
                            $.ajax({
                              url: "ajax/async_images.ajax.php",
                              method: "POST",
                              data: asyncImage,
                              cache: false,
                              contentType: false,
                              processData: false,
                              dataType: "json",
                              success: function(image) {
    
                                      if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                        
                                        imagePath = "./views/images/default.png"; // Default value
                      
                      
                      
                      
                                        const html = `
                                          <div class="searchMemReq">
                                              <div class="team-list m-3 churchDiv">
                                                  <div class="d-flex align-items-center gap-3">
                                                      <div class="">
                                                          <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                      </div>
                                                      <div class="flex-grow-1">
                                                          <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                          <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                      </div>
                                                      <div class="">
                                                          <input type="text" value="${value['mshipID']}" acc_id="${value['memberID']}" acc_name="${value['memberName']}" style="display:none;" required>
                                                          <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                                          <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectMember">Reject</button>
                                                      </div>
                                                  </div>
                                                  <hr>
                                              </div>
                                          </div>
                                          `;
    
                                          requestSection.innerHTML += html;
                            
                            
                                      } else {
                                          imagePath = "./views/UploadAvatar/" + image["Avatar"];
                      
                            
                      
                                        
                                          const html = `
                                          <div class="searchMemReq">
                                              <div class="team-list m-3 churchDiv">
                                                  <div class="d-flex align-items-center gap-3">
                                                      <div class="">
                                                          <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                      </div>
                                                      <div class="flex-grow-1">
                                                          <h6 class="mb-1 fw-bold">${value['memberName']}</h6>
                                                          <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                      </div>
                                                      <div class="">
                                                          <input type="text" value="${value['mshipID']}" acc_id="${value['memberID']}" acc_name="${value['memberName']}" style="display:none;" required>
                                                          <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept</button>
                                                          <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectMember">Reject</button>
                                                      </div>
                                                  </div>
                                                  <hr>
                                              </div>
                                          </div>
                                          `;
    
                                          requestSection.innerHTML += html;
                            
                              
                              
                              
                                      }
                      
                                      console.log(imagePath)
                          
            
            
            
            
                                    
            
        
            
                   
              
                        
                  
                        
                              },
                              error: function(xhr, status, error) {
                                console.log(xhr)
                                  alert("Oops. Something went wrong!");
                              },
                              complete: function() {
                              }
                            });
                
                          });
    
                    
                        },
                        error: function() {
                            alert("Oops. Something went wrong!");
                        },
                        complete: function() {
                        }
                      });
    
                      var asyncCollab = new FormData();
                      asyncCollab.append("collab_section", "members");
                      $.ajax({
                        url: "ajax/async_collaboration.ajax.php",
                        method: "POST",
                        data: asyncCollab,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(answer) {
                          console.log(answer);
                
                            var requestSection = document.querySelector('.members_section');
                            requestSection.innerHTML = '';
                            var imagePath = ""; // Default value
                
                          answer.forEach(function (value, key) {
                
                       
                
                            var asyncImage = new FormData();
                            asyncImage.append("image_purpose", "public");
                            asyncImage.append("data1",  value['memberID']);
                            asyncImage.append("data2", "");
                
                            $.ajax({
                              url: "ajax/async_images.ajax.php",
                              method: "POST",
                              data: asyncImage,
                              cache: false,
                              contentType: false,
                              processData: false,
                              dataType: "json",
                              success: function(image) {
    
                                      if (image["Avatar"] === null || image["Avatar"] === undefined || image["Avatar"] === "") {
                                        
                                        imagePath = "./views/images/default.png"; // Default value
                      
                      
                      
                      
                                        const html = `
                                        <div class="memSearch">
                                            <div class="team-list m-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="">
                                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 fw-bold">${value['memberName']} </h6>
                                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                        <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bi bi-calendar-check-fill"></i> ${value['membershipDate']}</span>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                        <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeMember">Remove</button>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        `;
    
                                          requestSection.innerHTML += html;
                            
                            
                                      } else {
                                          imagePath = "./views/UploadAvatar/" + image["Avatar"];
                      
                            
                      
                                        
                                         
                                        const html = `
                                        <div class="memSearch">
                                            <div class="team-list m-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="">
                                                        <img src="${imagePath}" width="50" height="50" class="rounded-circle border-2 border" alt="..." style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 fw-bold">${value['memberName']} </h6>
                                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-envelope"> </i> ${value['memberEmail']}</span>
                                                        <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bi bi-calendar-check-fill"></i> ${value['membershipDate']}</span>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" name="trans_type" id="church_id" value="${value['mshipID']}" name="church_id" style="display:none;" required>
                                                        <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeMember">Remove</button>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        `;
    
                                          requestSection.innerHTML += html;
                            
                              
                              
                              
                                      }
                      
                                      console.log(imagePath)
                          
            
            
            
            
                                    
            
        
            
                   
              
                        
                  
                        
                              },
                              error: function(xhr, status, error) {
                                console.log(xhr)
                                  alert("Oops. Something went wrong!");
                              },
                              complete: function() {
                              }
                            });
                
                          });
    
                    
                        },
                        error: function() {
                            alert("Oops. Something went wrong!");
                        },
                        complete: function() {
                        }
                      });
                        

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

  