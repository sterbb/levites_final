
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

    $("#groupAddBtn").click(function(e){
      e.preventDefault();

      getGroupMembers(); 
      var group_name = $("#groupName").val();
      var group_members = $("#groupEventMembersList").val();
      var members_email = $("#groupEventEmailList").val();


      var groupData = new FormData();
        
      groupData.append("group_name", group_name);
      groupData.append("group_members", group_members);
      groupData.append("members_email", members_email);

      $.ajax({
          url: "ajax/calendar_group_add.ajax.php",
          method: "POST",
          data: groupData,
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

    })

    

    


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
    events: 'models/loadCalenddar.php',
    eventClick: function(info){
     
      alert(moment(info.event.start ).format("YYYY-MM-DD"));
      $('#exampleVerticallycenteredModal').modal('show');
    }
    ,
    dateClick: function(info) {
      
      var event = new Date(info.date);



      const offset = event.getTimezoneOffset();

      event = new Date(event.getTime() - (offset*60*1000));
      var readableDate = event.toDateString();
      readableDate = readableDate.slice(4,15);
      
      let date = event.toISOString().split('T')[0]
      date = date.slice(0,11);
      alert(date);  

      displayEventDetails(readableDate, date);

      $('#displayEventsModal').modal('show');
    }
    
  });
  calendar.render();
});

function getGroupMembers(){
  var arrData1 = [];
  var arrData2 = [];

  $('input[name*="memberName"]').each(function(e)
  {
      console.log($(this).val());

      var str = this.value;




      
      var members = {};
      members.name = str;
      arrData1.push(members);

      
  });

  $("#groupEventMembersList").val(JSON.stringify(arrData1));

  
  $('input[name*="memberEmail"]').each(function(e)
  {
      console.log($(this).val());

      var str = this.value;




      
      var email = {};
      email.emaiil = str;
      arrData2.push(email);

      
  });
  
  $("#groupEventEmailList").val(JSON.stringify(arrData2));
   


}





function displayEventDetails(readableDate ,date){

  $("#eventDateModal").text(readableDate);

  // $.ajax({
  //   url: "ajax/event_add.ajax.php",
  //   method: "POST",
  //   data: eventData,
  //   cache: false,
  //   contentType: false,
  //   processData: false,
  //   dataType: "text",
  //   success: function(answer) {
  //     console.log(answer);
        
  
  //   },
  //   error: function() {
  //       alert("Oops. Something went wrong!");
  //   },
  //   complete: function() {
  //   }
  // });
}