
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
      alert("Oops. Something went wrong!");
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
  alert(fileName)

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
  alert('hello');

  var Newchurch_name = $("#NewChurch_name").val();
  var Newchurch_address = $("#Newchurch_address").val();
  var Newcontact = $("#contact").val();
  var Newfname = $("#fname").val();
  var Newlname = $("#lname").val();
  var Newdesignation = $("#designation").val();
  // var Newemail = $("#email").val();
  var Newusername = $("#username").val();
  var Newpassword = $("#password").val();
  // var Newreligion = $("#religion").val();
  // var Newcity = $("#city").val();
  // var Newmission = $("#mission").val();
  // var Newvision = $("#vision").val();




  var updateChurch = new FormData();
  updateChurch.set("Newchurch_name", Newchurch_name);
  updateChurch.set("Newchurch_address", Newchurch_address);
  updateChurch.set("Newcontact", Newcontact);
  updateChurch.set("Newfname", Newfname);
  updateChurch.set("Newlname", Newlname);
  updateChurch.set("Newdesignation", Newdesignation);
  // updateChurch.set("Newemail", Newemail);
  updateChurch.set("Newusername", Newusername);
  updateChurch.set("Newpassword", Newpassword);
  // updateChurch.set("Newreligion", Newreligion);
  // updateChurch.set("Newcity", Newcity);
  // updateChurch.set("Newmission", Newmission);
  // updateChurch.set("Newvision", Newvision);



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
