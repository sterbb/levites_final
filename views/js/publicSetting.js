
$("#updatePublic").submit(function(e) {
    e.preventDefault();
    alert('hello');
  
    var public_username = $("#pub_username").val();
    var public_password = $("#pub_password").val();
    var public_email = $("#pub_email").val();

    var public_fname = $("#pub_fname").val();
    var public_lname = $("#pub_lname").val();
    var public_religion = $("#pub_religion").val();
    var public_contact = $("#pub_contact").val();




  
    var updatePublic = new FormData();
    updatePublic.set("public_username", public_username);
    updatePublic.set("public_password", public_password);
    updatePublic.set("public_email", public_email);

    updatePublic.set("public_fname", public_fname);
    updatePublic.set("public_lname", public_lname);
    updatePublic.set("public_religion", public_religion);
    updatePublic.set("public_contact", public_contact);

  

    $.ajax({
        url: "ajax/update_public.ajax.php",
        method: "POST",
        data: updatePublic,
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