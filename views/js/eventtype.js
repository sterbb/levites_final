$('#AddEventType').click(function(e) {
    e.preventDefault();
   

    var type_name = $("#type_name").val();
    alert(type_name);

    var addEventType = new FormData();

    addEventType.append("type_name", type_name);

    $.ajax({
        url: "ajax/event_type.ajax.php",
        method: "POST",
        data: addEventType,
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
            // Handle any completion tasks if needed
        }
    });
    
});


