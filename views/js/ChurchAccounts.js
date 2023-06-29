






//helper 
$(function() {

    $('#churchAccounts-form input[id^="num"]').on("keypress", function(e) {
        return _helper.isNumeric(e) ? true : e.preventDefault();
    });

    $('#churchAccounts-form input[id^="tns"]').on("keypress", function(e) {
        return _helper.allChars(e) ? true : e.preventDefault();
    });

});


// //Save Church Accounts
// $("#churchAccounts-form").submit(function(e){
//     e.preventDefault();
//     if($(".churchAccountsForm").valid()){
//         AddChurchAccounts();
//     }
// });


//Add church Accounts
function AddChurchAccounts(){
    if($('#trans_type').val()== 'New'){
        var title = "DO YOU WANT TO SAVE NEW Account?";
        var text = "";
    } else {
        var title = "Do you want to update Account details?";
        var text = "";
    }

    swal.fire({
        title: title,
        icon: 'question',
        text: text,
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Save it!',
        cancelButtonText: 'Cancel!',
        confirmButtonClass: 'btn btn-outline-success',
        cancelButtonClass: 'btn btn-outline-danger',
        allowOutsideClick: false,
        buttonsStyling: false

    }).then(function(result) {
        if (result.value) {
            var trans_type = $("#trans_type").val();
            var churchID = $("#churchID").val();
            var username = $("#tns-username").val();
            /*var password = $("#tns-password").val();
            var email = $("#txt-email").val();
            var churchName = $("#tns-churchName").val();
            var religion = $("#tns-religion").val();
            var churchAddress = $("#tns-churchAddress").val();
            var city = $("#tns-city").val();
            var telnum = $("#num-telnum").val();
            var country = $("#tns-country").val();
            var profleg = $("#profleg").val();
            var agree = $("#agree").val();*/






            var accounts = new FormData();
            accounts.append("churchID", churchID);
            accounts.append("username", username);
        /*accounts.append("trans_type", trans_type);
            accounts.append("password", password);
            accounts.append("email", email);
            accounts.append("churchName", churchName);
            accounts.append("telnum", telnum);
            accounts.append("religion", religion);
            accounts.append("churchAddress", churchAddress);
            accounts.append("city", city);
            accounts.append("country", country);
            accounts.append("profleg", profleg);
            accounts.append("agree", agree); */
            


            $.ajax({
                url: "ajax/church_save_account.ajax.php",
                method: "POST",
                data: accounts,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function(answer) {
                    initialize();

                    var table = $('.churchAccountsTable').DataTable();

                    table.ajax.reload();

                },
                error: function() {
                    alert("Oops. Something went wrong!");
                },
                complete: function() {
                    swal.fire({
                        icon: 'success',
                        title: 'Account details successfully saved!',
                        type: 'success',
                        confirmButtonText: 'Got it!',
                        confirmButtonClass: 'btn btn-outline-success',
                        allowOutsideClick: false,
                        buttonsStyling: false
                    }).then(function(result) {
                        if (result.value) {

                        }
                    })
                }
            })
        }
    });

    
}