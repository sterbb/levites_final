$(".askMembershipBtn").on("click", function() {
    var memChurchID = $(this).siblings('input').first().val();
    var memChurchName = $(this).siblings('input').first().attr("church-name");
    

    var ask = new FormData();
    ask.append("memChurchID", memChurchID);
    ask.append("memChurchName", memChurchName);

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
        location.reload();

      },
      error: function() {
          alert("Oops. Something went wrong!");
      },
      complete: function() {
      }
    });
    
  });

  $(".cancelMembershipBtn").on("click", function() {


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
        console.log(answer);
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
        console.log(answer);
        location.reload();

      },
      error: function() {
          alert("Oops. Something went wrong!");
      },
      complete: function() {
      }
    });
    
    
  });

  

  $(".acceptMember").on('click', function(){
    // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
    var mshipID = $(this).siblings('input').first().val();
    var acc_id = $(this).siblings('input').first().attr('acc_id');
    var acc_name = $(this).siblings('input').first().attr('acc_name');

  
    
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
          console.log(answer)
          location.reload();

        },
        error: function() {
            alert("Oops. Something went wrong!");
        },
        complete: function() {
        }
      });
  });
  

  $(".rejectMember").on('click', function(){
    // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
    var mshipID = $(this).siblings('input').first().val();
    var acc_id = $(this).siblings('input').first().attr('acc_id');
    var acc_name = $(this).siblings('input').first().attr('acc_name');

  
    
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
        dataType: "json",
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


    $(".removeMember").on('click', function(){
        // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
        var mshipID = $(this).siblings('input').first().val();
        console.log(mshipID);
        
        
        var removeMember = new FormData();
        removeMember.append("mshipID", mshipID);
        
        $.ajax({
            url: "ajax/remove_member.ajax.php",
            method: "POST",
            data: removeMember,
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
        