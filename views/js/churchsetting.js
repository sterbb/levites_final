
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