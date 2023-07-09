
$(function(){

    $(".addEventForm").submit(function(e){
        e.preventDefault();
   

        var event_time = $("#event_time1").val() + " to " + $("#event_time2").val();

        var event_date = $("#event_date").val();

        var event_title = $("#event_title").val();
        var event_type = $("#event_type").val();

        var eventData = new FormData();
        
        eventData.append("event_title", event_title);
        eventData.append("event_type", event_type);
        eventData.append("event_time", event_time);
        eventData.append("event_date", event_date);


        $.ajax({
            url: "ajax/event_add.ajax.php",
            method: "POST",
            data: eventData,
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

    

    


});


document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');
  let currentDate = new Date().toJSON().slice(0, 10);
  var calendar = new FullCalendar.Calendar(calendarEl, {
    themeSystem: 'Litera',
    headerToolbar: {
      left: 'prev today',
      center: 'title',
      right: 'dayGridMonth,listWeek next'
    },
    initialView: 'dayGridMonth',
    initialDate: currentDate,
    navLinks: true, // can click day/week names to navigate views
    selectable: true,
    nowIndicator: true,
    dayMaxEvents: true, // allow "more" link when too many events
    editable: true,
    selectable: true,
    businessHours: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: [{
      title: 'Instrument Workshop',
      start: '2023-05-01T10:30:00',
      end: '2023-05-01T11:30:00'
    },{
      title: 'Technical Workshop',
      start: '2023-05-01T16:30:00',
    },{
      title: 'Media Workshop',
      start: '2023-05-01T13:00:00',
    }, {
      title: 'Offering Prayer',
      start: '2023-05-07',
      end: '2023-05-10'
    }, {
      // groupId: 999,
      // title: 'Event Time',
      // start: '2020-09-09T16:00:00'
    }, {
      // groupId: 999,
      // title: 'Event Time',
      // start: '2020-09-16T16:00:00'
    }, {
      title: 'Bible Study',
      start: '2023-05-11',
      end: '2023-05-13'
    }, {
      title: 'Outreach Program',
      start: '2023-05-12T10:30:00',
      end: '2023-05-12T12:30:00'
    }, {
      title: 'Media Seminar',
      start: '2023-05-12T12:00:00'
    }, {
      title: 'Instrument Workshop',
      start: '2023-05-12T14:30:00'
    }, {
      title: 'Bible Study',
      start: '2023-05-12T17:30:00'
    }, {
      title: 'Meeting',
      start: '2023-05-12T20:00:00'
    }, {
      // title: 'Event Time',
      // start: '2020-09-13T07:00:00'
    }, {
      title: 'Church Anniversary',
      url: 'http://google.com/',
      start: '2023-05-28',
    }, {
      title: 'Church Anniversary',
      id: '2333',
      start: '2023-07-09',
    }],
    eventClick: function(info){
     
      alert(moment(info.event.start ).format("YYYY-MM-DD"));
      $('#exampleVerticallycenteredModal').modal('show');
    }
    ,
    dateClick: function(info) {

      

      alert(info.date);
      $('#exampleVerticallycenteredModal').modal('show');
    }
    
  });
  calendar.render();
});