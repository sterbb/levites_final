

    $(document).ready(function() {
        if(window.location.href === "superuser"){

        $.ajax({
            url: "ajax/superuser_getChurches.ajax.php",
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

        }


        
    });

    $(".viewBtn").on('click', function(){
        // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
        var church_id = $(this).siblings('input').first().val();
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

              $("#superuser_churchID").val(answer[0]);

              $('#superuserModal').modal('show'); 

            },
            error: function() {
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
          });
    });


    function myFunction(){
        // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
        var church_id = $(this).siblings('input').first().val();
        console.log(church_id);
        
        var churchData = new FormData();
        churchData.append("church_id", church_id);

        $.ajax({
            url: "ajax/accept_church.ajax.php",
            method: "POST",
            data: churchData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
              console.log(answer);

              $("superuser_churchID").val(answer[0]);
              
              $("#accepted_churches").load(location.href + ' #accepted_churches');
              $("#registration_churches").load('superuser' + ' #registration_churches');
          
            },
            error: function() {
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
          });
    }

    $(".acceptBtn").on('click', function(){
        // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
        var church_id = $(this).siblings('input').first().val();
        console.log(church_id);
        
        var churchData = new FormData();
        churchData.append("church_id", church_id);

        $.ajax({
            url: "ajax/accept_church.ajax.php",
            method: "POST",
            data: churchData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
              console.log(answer);

              $("superuser_churchID").val(answer[0]);
              

              location.reload();
          
            },
            error: function() {
                alert("Oops. Something went wrong!");
            },
            complete: function() {
          
            }
          });

          // $("#accepted_churches").load('template' + ' #accepted_churches');
          // $("#registration_churches").load('template'+ ' #registration_churches');
    });

    $(".rejectBtn").on('click', function(){
        // var parentid=  $(this).closest("div.church_div").find("input[name='church_id']").val();
        var church_id = $(this).siblings('input').first().val();
        console.log(church_id);
        
        var churchData = new FormData();
        churchData.append("church_id", church_id);

        $.ajax({
            url: "ajax/reject_church.ajax.php",
            method: "POST",
            data: churchData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
              console.log(answer);

              $("#superuser_churchID").val(answer[0]);

              // $(".accepted_churches").load(location.href + ' .accepted_churches');
              // $(".registration_churches").load(location.href + ' .registration_churches');

              location.reload();

              
          
          
            },
            error: function() {
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
          });
    });

