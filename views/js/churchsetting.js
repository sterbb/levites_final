
$("#addDonation").on('click', function(e){
    e.preventDefault();


    var donation_number = $("#donation_number").val();
    var donation_category = $("#donation_category").val();


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
            
      
        },
        error: function() {
            alert("Oops. Something went wrong!");
        },
        complete: function() {
        }
      });

});

$("#SocialMedia").on('click', function(e){
  e.preventDefault();
  

  var socialMedia = $("#socialMedia").val();
  var socialMedia_category = $("#socialMedia_category").val();


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
          
    
      },
      error: function() {
          alert("Oops. Something went wrong!");
      },
      complete: function() {
      }
    });

});


function deleteData(id) {
  // Perform the AJAX request to delete data with the specified id
  $.ajax({
      url: 'ajax/delete_donation.ajax.php', // Replace with the actual server-side script that handles the delete operation
      type: 'POST', // Use POST method to send the id to the server
      data: { id: id }, // Send the id as a parameter to the server
      dataType: 'json', // Expect JSON data in response (optional, if the server returns JSON)
      success: function(response) {
          // Handle the response from the server after successful deletion (if needed)
          console.log('Data deleted successfully:', response);
          // Optionally, update the data list or refresh the page here
          location.reload();  
      },
      error: function(xhr, status, error) {
          // Handle errors, if any, that occur during the AJAX request
          console.error('Error deleting data:', error);
      }
  });
}

function deleteSocial(id) {
  // Perform the AJAX request to delete data with the specified id
  $.ajax({
      url: 'ajax/delete_social.ajax.php', // Replace with the actual server-side script that handles the delete operation
      type: 'POST', // Use POST method to send the id to the server
      data: { id: id }, // Send the id as a parameter to the server
      dataType: 'json', // Expect JSON data in response (optional, if the server returns JSON)
      success: function(response) {
          // Handle the response from the server after successful deletion (if needed)
          console.log('Data deleted successfully:', response);
          // Optionally, update the data list or refresh the page here
          location.reload();  
      },
      error: function(xhr, status, error) {
          // Handle errors, if any, that occur during the AJAX request
          console.error('Error deleting data:', error);
      }
  });
}



 $('#userBack').on('change', function(event) {
  // const file = event.target.files[0];
  // const reader = new FileReader();
  // reader.onload = function(e) {
  //   const backgroundImage = document.getElementById('userBackground');
  //   backgroundImage.style.backgroundImage = `url(${e.target.result})`;
  // }
  // reader.readAsDataURL(file);

  // var userBackFile = $('#userBackground').attr('src');

  const fileInput = document.getElementById('userBack'); // Replace 'yourFileInput' with the actual ID of your file input element
  const file = fileInput.files[0];
  const fileName = file.name; // Extract the file name


  var userBackData = new FormData();
  userBackData.append("userBackFile", fileName);

  $.ajax({
    url: "ajax/church_setting.ajax.php",
    method: "POST",
    data: userBackData,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "text",
    success: function(answer) {
      console.log(answer);
    },
    error: function() {

    },
    complete: function() {
    }
  });
});


$('#userAvatar').on('change', function(event) {
  // const file = event.target.files[0];
  // const reader = new FileReader();
  // reader.onload = function(e) {
  //   const userProfileImage = document.getElementById('userProfileImage');
  //   userProfileImage.src = e.target.result;
  //   alert(userProfileImage.src);
  // }
  // reader.readAsDataURL(file);

  // var userAvatarFile = $('#userAvatar').attr('src');
  // alert(userAvatarFile);

  const fileInput = document.getElementById('userAvatar'); // Replace 'yourFileInput' with the actual ID of your file input element
  const file = fileInput.files[0];
  const fileName = file.name; // Extract the file name


  var userAvatarData = new FormData();
  userAvatarData.append("userAvatarFile", fileName);

  $.ajax({
    url: "ajax/church_setting.ajax.php",
    method: "POST",
    data: userAvatarData,
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





$("#updateChurch").submit(function(e) {
  e.preventDefault();


  var Newchurch_name = $("#NewChurch_name").val();
  var Newchurch_address = $("#Newchurch_address").val();
  var Newcontact = $("#contact").val();
  var Newfname = $("#fname").val();
  var Newlname = $("#lname").val();
  var Newdesignation = $("#designation").val();
  var Newemail = $("#email").val();
  var Newusername = $("#username").val();
  var Newpassword = $("#password").val();
  var Newreligion = $("#religion").val();
  var Newcity = $("#city").val();
  var Newmission = $("#mission").val();
  var Newvision = $("#vision").val();

  var Newchurchnum = $("#church_num").val();




  var updateChurch = new FormData();
  updateChurch.set("Newchurch_name", Newchurch_name);
  updateChurch.set("Newchurch_address", Newchurch_address);
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
          
    
      },
      error: function() {
          alert("Oops. Something went wrong!");
      },
      complete: function() {
      }
    });

});
