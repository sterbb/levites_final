$(function(){

  $("#publicRegistrationForm").submit(function(e){
      e.preventDefault();

      var username  = $("#pubUsername").val();
      var password = $("#pubPassword").val();
      var fname = $("#pubfname").val();
      var lname = $("#publname").val();
      var religion = $("#pubReligion").val();
      var email = $("#pubEmail").val();

      var registerData = new FormData();
      registerData.append("user_email",email);
      registerData.append("user_username", username);
      registerData.append("user_password", password);
      registerData.append("user_fname", fname);
      registerData.append("user_lname", lname);
      registerData.append("user_religion", religion);
      registerData.append("user_email", email);


        $.ajax({
                url: "ajax/register_account.ajax.php",
                method: "POST",
                data: registerData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "text",
                beforeSend: function() {
                  //begin spinner
                  $('.overlay').show();
               },
                success: function(answer) {
                  console.log(answer);
                  window.location.href='verifyEmail';
                },
                error: function() {
                    alert("Oops. Something went wrong!");
                },
                complete: function() {
                }
            });

  });




  $("#churchRegistrationForm").submit(function(e){
    e.preventDefault();

    
    var fname  = $("#church_pfname").val();
    var lname  = $("#church_plname").val();
    var designation  = $("#church_designation").val();
    var telnum  = $("#church_pnum").val();


    var churchName  = $("#church_name").val();
    var churchAddress  = $("#church_address").val();
    var religion  = $("#church_religion").val();
    var city  = $("#church_city").val();
    var contactNum  = $("#church_num").val();


    var username  = $("#church_username").val();
    var password = $("#church_password").val();
    var email = $("#church_email").val();
    var church_proof = $("#church_prof").prop("files");
    var user_proof = $("#user_prof").prop("files"); 


      var proofData = new FormData(this);
      $.ajax({
        url: "models/sendChurchProof.php",
        method: "POST",
        data: proofData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        beforeSend: function() {
          //begin spinner
          $('.overlay').show();
       },
        success: function(answer) {
          console.log(answer);
          // window.location.href='verifyEmail';
        },
        error: function() {
            alert("Oops. Something went wrong!");
        },
        complete: function() {
        }
      });
  
      
    
    var registerData = new FormData();

    registerData.append("church_fname",fname);
    registerData.append("church_lname",lname);
    registerData.append("church_designation",designation);
    registerData.append("church_telnum",telnum);


    registerData.append("church_name",churchName);
    registerData.append("church_address",churchAddress);
    registerData.append("church_city", city);
    registerData.append("church_religion",religion);
    registerData.append("church_cotnum",contactNum);



    registerData.append("church_email",email);
    registerData.append("church_username", username);
    registerData.append("church_password", password);
    registerData.append("church_proof", church_proof);
    registerData.append("user_proof", user_proof);

    

      $.ajax({
          url: "ajax/register_church.ajax.php",
          method: "POST",
          data: registerData,
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
            $('.overlay').hide();
          }
      });


  });
    


    $(document).ready(function() {
      $(".verification-input input").keyup(function(e) {
        var maxLength = parseInt($(this).attr("maxlength"));
        var currentLength = $(this).val().length;
    
        if (e.keyCode === 8 && currentLength === 0) {
          // Find the previous input field
          var $prevInput = $(this).prev("input");
          
          // Check if there is a previous input field
          if ($prevInput.length > 0) {
            // Focus on the previous input field
            $prevInput.focus();
          }
        } else if (currentLength === maxLength) {
          // Find the next input field
          var $nextInput = $(this).next("input");
          
          // Check if there is a next input field
          if ($nextInput.length > 0) {
            // Focus on the next input field
            $nextInput.focus();
          } else {
            // If there is no next input field, trigger the verification process
            var code = $(".verification-input input")
              .map(function() {
                return $(this).val();
              })
              .get()
              .join("");
    
            $.ajax({
              url: "ajax/verify_registration.ajax.php",
              method: "POST",
              data: { code: code.trim() },
              dataType: "text",
              success: function(answer) {
                console.log(answer);
                if (answer == "success") {
                  window.location.href = 'login';
                } else {
                  var alertHTML = '<div class="alert alert-container border-0 border-danger border-start border-4 bg-danger-subtle alert-dismissible fade show py-2 m-0 mt-2" style:>';
                  alertHTML += '<div class="d-flex align-items-center">';
                  alertHTML += '<div class="fs-3 text-danger"><i class="bx bx-error"></i></div>';
                  alertHTML += '<div class="ms-3">';
                  alertHTML += '<div class="text-danger">Code does not match.</div>';
                  alertHTML += '</div></div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                   // Append the alert HTML to a container element
                $('#alertContainer').html(alertHTML);
                }
              },
              error: function() {
                alert("Oops. Something went wrong!");
              }
            });
          }
        }
      });
    });

      $("#loginForm").submit(function(e){
        e.preventDefault();
        var login_username =  $("#login_username").val();
        var login_password = $("#login_password").val();
      

        var loginData = new FormData();
        loginData.append("login_username", login_username);
        loginData.append("login_password", login_password);

        $.ajax({
          url: "ajax/login_authenticate_account.ajax.php",
          method: "POST",
          data: loginData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "text",
          beforeSend: function() {
            //begin spinner
            $('.overlay').show();
         },
          success: function(answer) {
            console.log(answer);

                //islan pa  
                // document.cookie = 'type =' +answer; 

                if(answer == "admin"){
                window.location.href= 'adminhomepage';
                }else if(answer == "public"){
                window.location.href='publichomepage';
                }else if(answer == "superuser"){
                window.location.href='superuser';
                }else if(answer == "subuser"){
                window.location.href='adminhomepage';
                }else if(answer == "publicSub"){
                  window.location.href='adminhomepage';
                }else{
                  $('.overlay').hide();
                   // Show an alert for invalid account
                  var alertHTML = '<div class="alert alert-container border-0 border-danger border-start border-4 bg-danger-subtle alert-dismissible fade show py-2 m-0 mt-2" style:>';
                  alertHTML += '<div class="d-flex align-items-center">';
                  alertHTML += '<div class="fs-3 text-danger"><i class="bx bx-error"></i></div>';
                  alertHTML += '<div class="ms-3">';
                  alertHTML += '<div class="text-danger">Invalid account credentials. Please try again.</div>';
                  alertHTML += '</div></div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                   // Append the alert HTML to a container element
                $('#alertContainer').html(alertHTML);
                }
          },
          error: function() {
              alert("Oops. Something went wrong!");
              
              
          },
          complete: function() {
            $('.overlay').hide();
          }
        });
      });

      $("#resendBtn").click(function(){

        $.ajax({
          url: "ajax/resend_verification.ajax.php",
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

      $("#forgotForm").submit(function(e){
        e.preventDefault();

        var forgot_email = $("#forgot_email").val();

        var forgotData = new FormData();
        forgotData.append("forgot_email", forgot_email);
        
        $.ajax({
          url: "ajax/forgot_password.ajax.php",
          method: "POST",
          data: forgotData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "text",
          beforeSend: function() {
            //begin spinner
            $('.overlay').show();
          },
          success: function(answer) {

            console.log(answer);
            if(answer == "success"){
              window.location.href= 'verifyForget';
            }
          },
          error: function() {
              alert("Oops. Something went wrong!");
          },
          complete: function() {
            $('.overlay').hide();
          }
        });
      });


      $(document).ready(function() {
        $(".forget-input input").keyup(function(e) {
          var maxLength = parseInt($(this).attr("maxlength"));
          var currentLength = $(this).val().length;
      
          if (e.keyCode === 8 && currentLength === 0) {
            // Find the previous input field
            var $prevInput = $(this).prev("input");
            
            // Check if there is a previous input field
            if ($prevInput.length > 0) {
              // Focus on the previous input field
              $prevInput.focus();
            }
          } else if (currentLength === maxLength) {
            // Find the next input field
            var $nextInput = $(this).next("input");
            
            // Check if there is a next input field
            if ($nextInput.length > 0) {
              // Focus on the next input field
              $nextInput.focus();
            } else {
              // If there is no next input field, trigger the verification process
              var code = $(".forget-input input")
                .map(function() {
                  return $(this).val();
                })
                .get()
                .join("");
      
              $.ajax({
                url: "ajax/verify_registration.ajax.php",
                method: "POST",
                data: { code: code.trim() },
                dataType: "text",
                success: function(answer) {
                  console.log(answer);
                  if (answer == "success") {
                    window.location.href = 'resetpassword';
                  } else {
                    alert("Code does not match");
                  }
                },
                error: function() {
                  alert("Oops. Something went wrong!");
                }
              });
            }
          }
        });
      });

      $("#forgotPasswordForm").submit(function(e){
        e.preventDefault();

        var forgot_password= $("#forgot_password").val();


        var forgotData = new FormData();
        forgotData.append("forgot_password", forgot_password);
        
        $.ajax({
          url: "ajax/reset_password.ajax.php",
          method: "POST",
          data: forgotData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "text",
          beforeSend: function() {
            //begin spinner
            $('.overlay').show();
         },
          success: function(answer) {
            console.log(answer);
            if(answer == "success"){
              window.location.href= 'login';
            }
          },
          error: function() {
              alert("Oops. Something went wrong!");
          },
          complete: function() {
            $('.overlay').hide();
          }
        });
      });
});

//when agree on terms
const agreeButton = document.getElementById('agree');
const checkboxes = document.querySelectorAll('#church_terms, #public_terms');

agreeButton.addEventListener('click', function() {
  checkboxes.forEach(function(checkbox) {
    checkbox.checked = true;
  });
});