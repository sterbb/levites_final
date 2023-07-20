$(".UserAccountForm").submit(function(e) {
    e.preventDefault();

    var user_name = $("#user-name").val();
    var user_password = $("#user-password").val();

    var account_type = "";

    var c = $("#calendar_access").val();
    var s = $("#storage_access").val();
    var r = $("#request_access").val();
    
    if ($("#calendar_access").is(":checked")) {
        account_type += c;
      }

      if ($("#storage_access").is(":checked")) {
        account_type += s;
      }

      if ($("#request_access").is(":checked")) {
        account_type += r;
      }



    if (user_name.trim() === "" || user_password.trim() === "") {
        // Display an error message using SweetAlert
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please fill in the required fields: Playlist Name',
        });
    } else {
        var userData = new FormData();
        userData.append("user-name", user_name);
        userData.append("user-password", user_password);
        userData.append("account_type", account_type);


        $.ajax({
            url: "ajax/account_Addmember.ajax.php",
            method: "POST",
            data: userData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "text",
            success: function(answer) {
                clearFields();

                // Close the modal form
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Playlist added successfully!',
                });
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            },
            complete: function() {
                // Handle any completion tasks if needed
            }
        });
    }
});

// CLEAR INPUT
$(".UserAccountForm").reset(function() {

    alert("hello");
    clear();
});

function clear(){
    alert("hello");
    $("#user-name").focus();
    swal.fire({
        icon: 'question',
        title: 'Do you want to reset user details?',
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'Cancel!',
        confirmButtonClass: 'btn btn-outline-success',
        cancelButtonClass: 'btn btn-outline-danger',
        allowOutsideClick: false,
        buttonsStyling: false
    }).then(function(result) {
        console.log(result.value);
        if (result.value) {
            clearFields();
        }
    });
}


function clearFields() {
    $("#user-name").val('');
    $("#user-password").val('');
    $("#con-password").val('');
  
}



