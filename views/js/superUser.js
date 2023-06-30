
$(function(){

    $(document).ready(function() {
        if(window.location.href === "superuser"){
        alert("hello");
        $.ajax({
            url: "ajax/superuser_getChurches.ajax.php",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "text",
            success: function(answer) {
                alert("helo");
                console.log(answer);
  
            },
            error: function() {
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
          });

        }


        
    });

});