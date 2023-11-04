
$("#updatePublic").submit(function(e) {
  e.preventDefault();

  var public_username = $("#pub_username").val();
  var public_password = $("#pub_password").val();
  var public_email = $("#pub_email").val();
  var public_fname = $("#pub_fname").val();
  var public_lname = $("#pub_lname").val();
  var public_religion = $("#pub_religion").val();
  var public_contact = $("#pub_contact").val();

  // Check if any input field is empty
  if (
      public_username.trim() === "" ||
      public_password.trim() === "" ||
      public_email.trim() === "" ||
      public_fname.trim() === "" ||
      public_lname.trim() === "" ||
      public_religion.trim() === "" ||
      public_contact.trim() === ""
  ) {
      Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'All fields are required.',
      });
  } else {
      // Show a confirmation dialog using Swal
      Swal.fire({
          title: 'Confirm Update',
          text: 'Are you sure you want to update this public data?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes, update it!',
          cancelButtonText: 'No, cancel',
      }).then((result) => {
          if (result.isConfirmed) {
              // User clicked "Yes," so proceed with the update operation

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

                      // Display a success Swal notification with a confirm button
                      Swal.fire({
                          icon: 'success',
                          title: 'Success',
                          text: 'Public data updated successfully!',
                          confirmButtonText: 'OK',
                      }).then((result) => {
                          if (result.isConfirmed) {
                              // You can specify your desired action, e.g., redirect or reload the page
                              location.reload();
                          }
                      });
                  },
                  error: function() {
                      Swal.fire({
                          icon: 'error',
                          title: 'Error',
                          text: 'Oops. Something went wrong!',
                      });
                  },
                  complete: function() {
                      // Additional complete actions
                  }
              });
          } else if (result.dismiss === Swal.DismissReason.cancel) {
              // User clicked "No" or closed the dialog, do nothing
          }
      });
  }
});



  
$('#publicAvatar').on('change', function(event) {
  //   const file = event.target.files[0];
  //   const reader = new FileReader();
  //   reader.onload = function(e) {
  //     const userProfileImage = document.getElementById('userProfileImage');
  //     userProfileImage.src = e.target.result;
  //     alert(userProfileImage.src);
  //   }
  //   reader.readAsDataURL(file);
  
  //   var userAvatarFile = $('#userAvatar').attr('src');
  //   alert(userAvatarFile);
  
    
      const file = event.target.files[0];
      const reader = new FileReader();
      reader.onload = function (e) {
          const userProfileImage = document.getElementById('UserPublicImage');
          userProfileImage.src = e.target.result;
      }
      reader.readAsDataURL(file);

      toggleSaveButtonVisibility();
  
     
  });
  

  // Function to toggle the "Save Profile" button visibility
function toggleSaveButtonVisibility() {
  const userPubAvatar = document.getElementById('publicAvatar');
  const savePubProfileButton = document.getElementById('PublicProfile');
  
  if (userPubAvatar.files.length > 0) {
    savePubProfileButton.style.display = 'block';
  } else {
    savePubProfileButton.style.display = 'none';
  }
}