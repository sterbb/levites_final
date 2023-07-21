
$(function(){

  let currentDate = new Date().toJSON().slice(0, 10);

  $(document).ready(function() {

    var currentDate = new Date().toLocaleDateString('en-US', {
      year: 'numeric',
      month: 'long',
      day: 'numeric',
    });

    $("#church_calendar_date").text(currentDate);

  });


    $(".addEventForm").submit(function(e){
        e.preventDefault();
   

        var event_time1 = $("#event_time1").val() + " to " + $("#event_time2").val();
        var event_time2 = $("#event_time1").val() + " to " + $("#event_time2").val();

        var daterange = $("#event_date").val();
        var date1; 
        var date2;

        //tba
        if(daterange.length <= 10){
          date1=daterange.substring(0,10).split("-").reverse().join("-");
        }else{
            date1=daterange.substring(0,10).split("-").reverse().join("-");
            date2=daterange.substring(14,24).split("-").reverse().join("-");
        }
  

        var event_title = $("#event_title").val();
        var event_type = $("#event_type").val();

        var event_venue = $("#event_venue").val();
        var event_location = $("#event_location").val();
        var event_announcement = $("#event_announcement").val();
        var eventID;

          var eventData = new FormData();
          
          eventData.append("event_title", event_title);
          eventData.append("event_type", event_type);
          eventData.append("event_time", event_time1);
          //tbc
          eventData.append("event_date", daterange);
          eventData.append("event_venue", event_venue);
          eventData.append("event_location", event_location);
          eventData.append("event_announcement", event_announcement);


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
                eventID = answer;

                

                  // Select all elements with the class "add_group_event"
                  $(".add_group_event").each(function () {
                    // Initialize arrays to store the names and emails for each group
                    var groupNames = [];
                    var groupEmails = [];

                    // Get the group name for the current card
                    var groupName = $(this).find(".card-title").text().trim();

                    // Loop through the list items within the current card
                    $(this).find("."+groupName+"-items").each(function () {
                      // Get the name for each list item
                      var name = $(this).text().trim();
                      groupNames.push(name);

                      // Get the email from the "data-email" attribute for each list item
                      var email = $(this).attr("email");
                      groupEmails.push(email);
                    });

                    // Create an object to store the data for the current group
                    var groupData = {
                      groupName: groupName,
                      names: groupNames,
                      emails: groupEmails,
                    };



                  var groupDataSet = new FormData();
                  groupDataSet.append("eventID", eventID);
                  groupDataSet.append("group_name", groupData.groupName);
                  groupDataSet.append("group_members", JSON.stringify(groupData.names));
                  groupDataSet.append("members_email", JSON.stringify(groupData.emails));
                  //tbc
                  groupDataSet.append("event_date", daterange);
                  groupDataSet.append("event_time", event_time1);
                  groupDataSet.append("event_title", event_title);
                  groupDataSet.append("event_venue", event_venue);
                  groupDataSet.append("event_location", event_location);


                  $.ajax({
                      url: "ajax/calendar_group_add.ajax.php",
                      method: "POST",
                      data: groupDataSet,
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
      var group_members = JSON.parse($("#groupEventMembersList").val());
      var members_email = JSON.parse($("#groupEventEmailList").val());




        // Create the HTML for the new div with the values
        var newGroupDiv = `
        <div class="col">
          <div class="card add_group_event" id="${group_name}">
            <div class="card-body border-bottom d-flex justify-content-between align-items-center">
              <h5 class="card-title inline">${group_name}</h5>
            </div>
            <ul class="list-group list-group-flush">
              ${group_members
                .map((member, index) => {
                  // Get email for each member from members_email array
                  const email = members_email[index]?.email || '';
                  return `<li class="list-group-item ${group_name}-items" email="${email}">${member.name}</li>`;
                })
                .join("")}
            </ul>
          </div>
        </div>
      `;  

        // Append the new group div to the container
        $("#add_group_preview").append(newGroupDiv);

        $('#addGroupModal').modal('hide');
        $('#AddEvents').modal('show');

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


      var eventType = "Bible Study";

      displayEventDetails(readableDate, date);

      var eventData = new FormData();
      eventData.append("date", date);
      eventData.append("eventType", eventType);

      $.ajax({
          url: "ajax/get_event_details.ajax.php",
          method: "POST",
          data: eventData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "html",
          success: function(answer) {
            $('#WorkshopSection').html(answer);
            
        
          },
          error: function() {
              alert("Oops. Something went wrong!");
          },
          complete: function() {
          }
        });

      

      $('#displayEventsModal').modal('show');
    }
    
  });
  calendar.render();
  
});





document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar2');
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
      
      document.cookie = "viewDate=" +date;

      window.location.href = "catdetails";


      // var eventType = "Bible Study";

      // displayEventDetails(readableDate, date);

      // var eventData = new FormData();
      // eventData.append("date", date);
      // eventData.append("eventType", eventType);

      // $.ajax({
      //     url: "ajax/get_event_details.ajax.php",
      //     method: "POST",
      //     data: eventData,
      //     cache: false,
      //     contentType: false,
      //     processData: false,
      //     dataType: "html",
      //     success: function(answer) {
      //       $('#WorkshopSection').html(answer);
            
        
      //     },
      //     error: function() {
      //         alert("Oops. Something went wrong!");
      //     },
      //     complete: function() {
      //     }
      //   });

      

      // $('#displayEventsModal').modal('show');
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
      email.email = str;
      arrData2.push(email);

  });
  
  $("#groupEventEmailList").val(JSON.stringify(arrData2));

}


function displayEventDetails(readableDate ,date){

  $("#eventDateModal").text(readableDate);
  
}

function sendGroupEmail(element){
  var group_name = $(element).attr('id');
  alert(group_name);

  $("."+group_name+'-items').each(function() {
    var email = $(this).attr("email");
    var event_date = $(this).attr("event_date");
    var event_title = $(this).attr("event_title");
    var event_time = $(this).attr("event_time");
    console.log("Email:", email);

    var email = new FormData();
    email.append("email",email);
    email.append("group_name",group_name);
    email.append("event_date",event_date);
    email.append("event_title",event_title);
    email.append("event_time",event_time);


    
  $.ajax({
    url: "models/sendGroupEmail.php",
    method: "POST",
    data: email,
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


    // Your email sending logic...
    // Replace the console.log with your actual email sending code
  });


}