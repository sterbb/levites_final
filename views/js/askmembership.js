$(".askMembershipBtn").on("click", function() {
    var memChurchID = $(this).siblings('input').first().val();
    var memChurchName = $(this).siblings('input').first().attr("church-name");
    
    alert(memChurchName)

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

  

  $(".acceptMember").on('click', function(){
    // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
    var mshipID = $(this).siblings('input').first().val();
    console.log(mshipID);
  
    
    var acceptMember = new FormData();
    acceptMember.append("mshipID", mshipID);
  
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
    console.log(mshipID);
    
    
    var rejectMember = new FormData();
    rejectMember.append("mshipID", mshipID);
    
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
    
          location.reload();
    
          
      
      
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
        