$(document).ready(function() {
    var table = $('#example2').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print']
    } );
 
    table.buttons().container()
        .appendTo( '#example2_wrapper .col-md-6:eq(0)' );


        

        $("#report-range").change(function(){       
            var daterange = $("#report-range").val();
            alert(daterange)
            if(daterange.length <= 10){
                date1=daterange.substring(0,10).split("-").reverse().join("-");
    
            }else{
                date1=daterange.substring(0,10).split("-").reverse().join("-");
                date2=daterange.substring(14,24).split("-").reverse().join("-");
            }
    
            alert(daterange);
    
        
             var reportData = new FormData();
            reportData.append("date1", daterange);
    
            $.ajax({
            url: "ajax/get_event_report.ajax.php",
            method: "POST",
            data: reportData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {
                console.log(answer);
                table.clear().draw();
    
                // Populate the DataTable with new data
                answer.forEach(function(row) {
    
                    table.row.add([row.event_date, row.event_time, row.event_title, row.event_category]);
                });
    
                table.draw();
    
            },
            error: function(xhr, status, error) {
                console.log(error)
                alert("Oops. Something went wrong!");
            },
            complete: function() {
            }
            });
        });

        
} );

