$("#addDonation").on('click', function(e) {
    e.preventDefault();

    var donation_number = $("#donation_number").val();
    var donation_category = $("#donation_category").val();

    // Regular expression to allow only numeric values
    var numberPattern = /^[\d\-_() #+]+$/;



    if (!donation_number.match(numberPattern)) {
        // Show an error message if donation_number contains non-numeric characters
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Donation number should contain only numeric characters.',
        });
    } else if (donation_number.trim() === "") {
        // Show an error message if donation_number is empty
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Donation number is required in this field.',
        });
    } else {
        // Show a confirmation dialog using Swal
        Swal.fire({
            title: 'Confirm Add Donation',
            text: 'Are you sure you want to add this donation?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'No, cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // User clicked "Yes," so proceed with the add operation

                var donationData = new FormData();
                donationData.append("donation_number", donation_number);
                donationData.append("donation_category", donation_category);

                $.ajax({
                    url: "ajax/add_donation.ajax.php",
                    method: "POST",
                    data: donationData,
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
                            text: 'Donation added successfully!',
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Reload the system when the "OK" button is clicked
                                location.reload();
                            }
                        });

                        // You can add more logic here if needed.
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Oops. Something went wrong!',
                        });
                    },
                    complete: function() {
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // User clicked "No" or closed the dialog, do nothing
            }
        });
    }
});

$("#SocialMedia").on('click', function(e) {
    e.preventDefault();

    var socialMedia = $("#socialMedia").val();
    var socialMedia_category = $("#socialMedia_category").val();

    // Regular expression to validate a valid website URL with a domain name
    var urlPattern = /^(https?:\/\/)?[\w.-]+\.[a-zA-Z]{2,}(\S*)?$/;

    if (!socialMedia.match(urlPattern)) {
        // Show an error message if socialMedia is not a valid website URL
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please enter a valid website URL with a domain name.',
        });
    } else if (socialMedia.trim() === "") {
        // Show an error message if socialMedia is empty
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Social media is required in this field.',
        });
    } else {
        // Show a confirmation dialog using Swal
        Swal.fire({
            title: 'Confirm Add',
            text: 'Are you sure you want to add this social media?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'No, cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // User clicked "Yes," so proceed with the add operation

                var SocialAdd = new FormData();
                SocialAdd.append("socialMedia", socialMedia);
                SocialAdd.append("socialMedia_category", socialMedia_category);

                $.ajax({
                    url: "ajax/add_socialMedia.ajax.php",
                    method: "POST",
                    data: SocialAdd,
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
                            text: 'Social Media added successfully!',
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Reload the system when the "OK" button is clicked
                                location.reload();
                            }
                        });

                        // You can add more logic here if needed.
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Oops. Something went wrong!',
                        });
                    },
                    complete: function() {
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // User clicked "No" or closed the dialog, do nothing
            }
        });
    }
});


function deleteData(id) {
  // Show a confirmation dialog using Swal
  Swal.fire({
      title: 'Confirm Delete',
      text: 'Are you sure you want to delete this donation?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel',
  }).then((result) => {
      if (result.isConfirmed) {
          // User clicked "Yes," so proceed with the delete operation

          // Perform the AJAX request to delete data with the specified id
          $.ajax({
              url: 'ajax/delete_donation.ajax.php', // Replace with the actual server-side script that handles the delete operation
              type: 'POST', // Use POST method to send the id to the server
              data: { id: id }, // Send the id as a parameter to the server
              dataType: 'json', // Expect JSON data in response (optional, if the server returns JSON)
              success: function(response) {
                  // Handle the response from the server after successful deletion (if needed)
                  console.log('Donation deleted successfully:', response);
                  // Optionally, update the data list or refresh the page here
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
                    title: 'Donation deleted successfully.'
                  });
                  $("#report_accountID").val('');
                    location.reload();
        
                  
              },
              error: function(xhr, status, error) {
                  // Handle errors, if any, that occur during the AJAX request
                  console.error('Error deleting data:', error);
              }
          });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
          // User clicked "No" or closed the dialog, do nothing
      }
  });
}

function deleteSocialMedia(id) {
    // Show a confirmation dialog using Swal
    Swal.fire({
        title: 'Confirm Delete',
        text: 'Are you sure you want to delete this social media?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            // User clicked "Yes," so proceed with the delete operation
  
            // Perform the AJAX request to delete data with the specified id
            $.ajax({
                url: 'ajax/delete_social.ajax.php', // Replace with the actual server-side script that handles the delete operation
                type: 'POST', // Use POST method to send the id to the server
                data: { id: id }, // Send the id as a parameter to the server
                dataType: 'text', // Expect JSON data in response (optional, if the server returns JSON)
                success: function(response) {
                    // Handle the response from the server after successful deletion (if needed)
                    console.log('Social Media deleted successfully:', response);
  
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
                      title: 'Social media deleted successfully.'
                    });
                    $("#report_accountID").val('');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle errors, if any, that occur during the AJAX request
                    console.log(xhr);
                    console.error('Error deleting data:', error);
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // User clicked "No" or closed the dialog, do nothing
        }
    });
  }
  


// Function to handle file input change and display the uploaded image
// JavaScript code to toggle the "Save Admin Profile" button visibility
const userBack = document.getElementById('userBack');
const userAvatar = document.getElementById('userAvatar');
const saveProfileButton = document.getElementById('SaveAdminProfile');

userBack.addEventListener('change', toggleSaveButtonVisibility);

userBack.addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
        const userBackground = document.getElementById('userBackground')
        userBackground.src = e.target.result;
    }
    reader.readAsDataURL(file);
});

userAvatar.addEventListener('change', toggleSaveButtonVisibility);

userAvatar.addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
        const userProfileImage = document.getElementById('userProfileImage');
        userProfileImage.src = e.target.result;

    }
    reader.readAsDataURL(file);
});

function toggleSaveButtonVisibility() {
    if (userBack.files.length > 0 || userAvatar.files.length > 0) {
        saveProfileButton.style.display = 'block';
    } else {
        saveProfileButton.style.display = 'none';
    }
}

$("#updateChurch").submit(function(e) {
  e.preventDefault();

  var Newchurch_name = $("#NewChurch_name").val();

  var Newregion  = $("#church_region_text").val();
  var Newprovince  = $("#church_province_text").val();
  var Newcity  = $("#church_city_text").val();
  var Newbarangay  = $("#church_barangay_text").val();
  var Newstreet  = $("#newchurch_street").val();


  var confirm_password  = $("#conpassword").val();


  var Newcontact = $("#contact").val();
  var Newfname = $("#fname").val();
  var Newlname = $("#lname").val();
  var Newdesignation = $("#designation").val();
  var Newemail = $("#email").val();
  var Newusername = $("#username").val();
  var Newpassword = $("#password").val();
  var Newreligion = $("#religion").val();
  var Newmission = $("#mission").val();
  var Newvision = $("#vision").val();
  var Newchurchnum = $("#church_num").val();

  // Check if any input field is empty
  if (
      Newchurch_name.trim() === "" ||

    //   Newregion.trim() === "" ||
    //   Newprovince.trim() === "" ||
    //   Newbarangay.trim() === "" ||
    //   Newstreet.trim() === "" ||


      Newcontact.trim() === "" ||
      Newfname.trim() === "" ||
      Newlname.trim() === "" ||
      Newdesignation.trim() === "" ||
      Newemail.trim() === "" ||
      Newusername.trim() === "" ||
      Newpassword.trim() === "" ||
      Newreligion.trim() === "" ||
    //   Newcity.trim() === "" ||
      Newchurchnum.trim() === ""
  ) {
      Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'All fields are required.',
      });
  }else if (Newpassword !== confirm_password) { // Check if passwords don't match
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "Passwords do not match.",
    });
    } else {
      // Show a confirmation dialog using Swal
      Swal.fire({
          title: 'Confirm Update',
          text: 'Are you sure you want to update this church?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes, update it!',
          cancelButtonText: 'No, cancel',
      }).then((result) => {
          if (result.isConfirmed) {
              // User clicked "Yes," so proceed with the update operation

              var updateChurch = new FormData();
              updateChurch.set("Newchurch_name", Newchurch_name);

              updateChurch.set("Newregion", Newregion);
              updateChurch.set("Newprovince", Newprovince);
              updateChurch.set("Newbarangay", Newbarangay);
              updateChurch.set("Newstreet", Newstreet);


              updateChurch.set("Newcontact", Newcontact);
              updateChurch.set("Newfname", Newfname);
              updateChurch.set("Newlname", Newlname);
              updateChurch.set("Newdesignation", Newdesignation);
              updateChurch.set("Newemail", Newemail);
              updateChurch.set("Newusername", Newusername);
              updateChurch.set("Newpassword", Newpassword);
              updateChurch.set("Newreligion", Newreligion);
              updateChurch.set("Newcity", Newcity);
              updateChurch.set("Newmission", Newmission);
              updateChurch.set("Newvision", Newvision);
              updateChurch.set("Newchurchnum", Newchurchnum);

              $.ajax({
                  url: "ajax/update_church.ajax.php",
                  method: "POST",
                  data: updateChurch,
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
                          text: 'Church updated successfully!',
                          confirmButtonText: 'OK',
                          
                      }).then((result) => {
                          if (result.isConfirmed) {
                              // Reload the page when the "OK" button is clicked
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
                  }
              });
          } else if (result.dismiss === Swal.DismissReason.cancel) {
              // User clicked "No" or closed the dialog, do nothing
          }
      });
  }
});
