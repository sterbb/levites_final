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


});