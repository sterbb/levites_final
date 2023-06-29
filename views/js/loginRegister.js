$(function(){


    $("#publicRegistrationForm").submit(function(e){
        e.preventDefault();
        alert("ddd");

        var username  = $("#pubUsername").val();
        var password = $("#pubPassword").val();
        var email = $("#pubEmail").val();
        alert(email + username + password);
    
        

        var registerData = new FormData();
        registerData.append("user_email",email);
        registerData.append("user_username", username);
        registerData.append("user_password", password);

        $.ajax({
                url: "ajax/register_account.ajax.php",
                method: "POST",
                data: registerData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "text",
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
      alert("ddd");
      e.preventDefault();
   

      var username  = $("#church_username").val();
      var password = $("#church_password").val();
      var email = $("#church_email").val();
      var church_proof = $("#church_prof").prop("files");
      alert(JSON.stringify(church_proof));
      var user_proof = $("#user_prof").prop("files"); 
      alert(email + username + password);


      var proofData = new FormData(this);
      $.ajax({
        url: "models/sendChurchProof.php",
        method: "POST",
        data: proofData,
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
  
      
      var registerData = new FormData();
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
            window.location.href='verifyEmail';
          },
          error: function() {
              alert("Oops. Something went wrong!");
          },
          complete: function() {
          }
      });

 
    });


  

    $("#verification_code").keyup(function(){
      var code = $("#verification_code").val();
      if(code.length == 5){
        alert(code.length);
        var codeData = new FormData();
        codeData.append("code", code);

        $.ajax({
                url: "ajax/verify_registration.ajax.php",
                method: "POST",
                data: codeData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function(answer) {
                  console.log(answer);
                  if(answer == "success"){
                    window.location.href='login';
                  }else{
                    alert("code does not match");
                  }
      
                },
                error: function() {
                    alert("Oops. Something went wrong!");
                },
                complete: function() {
                }
            });

      }



    });

      $("#loginForm").submit(function(e){
        e.preventDefault();
        var login_username =  $("#login_username").val();
        var login_password = $("#login_password").val();
        alert(login_password + login_username)

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
          success: function(answer) {
            console.log(answer);
            if(answer== "success"){
                //islan pa  
                // document.cookie = 'type =' +answer; 
                if(answer == "success"){
                
                window.location.href='adminhomepage';
                }else if(answer == "public"){
                window.location.href='publichomepage';
                }else if(answer == "superuser"){
                window.location.href='superuser';
                }else if(answer == "subuser"){
                window.location.href='adminhomepage';
                }
             
             
            }else{
              alert("sad");
            }

        
        
          },
          error: function() {
              alert("Oops. Something went wrong!");
          },
          complete: function() {
          }
        });
      });

      $("#resendBtn").click(function(){
        alert("hello")

        $.ajax({
          url: "ajax/resend_verification.ajax.php",
          cache: false,
          contentType: false,
          processData: false,
          dataType: "text",
          success: function(answer) {


        
        
          },
          error: function() {
              alert("Oops. Something went wrong!");
          },
          complete: function() {
          }
        });
        
      });




});