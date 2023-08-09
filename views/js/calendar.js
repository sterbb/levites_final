
$(function(){



  $(document).ready(function() {     // Add event handler to the "Add Member" button

     $(document).on("change", 'input[name*="memberName"], input[name*="memberEmail"]', function () {
      getGroupMembers();
    });
    
    $(".repeater-add-member-btn").on("click", function () {
      // Get the selected option data
      const selectedOption = $("#groupMembersInput option:selected");
      const name = selectedOption.text();
      const email = selectedOption.attr("email");
      const memberId = selectedOption.val();

      // Create the HTML structure for the member
      const memberHTML = `
        <div class="card">
          <div class="card-body">
            <!-- Repeater Content -->
            <div class="item-content">
              <div class="d-flex align-items-end justify-content-end">
                <button class="btn btn-danger remove-btn"><i class="fadeIn animated bx bx-user-minus"></i></button>
              </div>
              <div class="mb-3">
                <label for="inputName${memberId}" class="form-label">Name</label>
                <input type="text" class="form-control memberNamesAddGrop" id="inputName${memberId}" acc_id="${memberId}" placeholder="Name"  data-name="memberName" value="${name}">
              </div>
              <div class="mb-3">
                <label for="inputEmail${memberId}" class="form-label">Email</label>
                <input type="text" class="form-control memberEmailsAddGrop" id="inputEmail${memberId}" placeholder="Email" data-skip-name="true" data-skip-name="true"
                data-name="memberEmail" value="${email}">
              </div>
            </div>
          </div>
        </div>
      `;

      // Append the member HTML to the addMembertoGroupSection div
      $(".addMembertoGroupSection").append(memberHTML);

      // getAllMemberNamesAddGroup();
    });

    // Add event handler for "Remove" buttons (delegated event for dynamically added buttons)
    $(document).on("click", ".remove-btn", function () {
      $(this).closest(".card").remove();
    });



   

    var currentDate = new Date().toLocaleDateString('en-US', {
      year: 'numeric',
      month: 'long',
      day: 'numeric',
    });

    $("#church_calendar_date").text(currentDate);
    $("#dashboard-currentdate").text(currentDate);

  });


    $(".addEventForm").submit(function(e){
        e.preventDefault();


        function formatTimeWithLeadingZero(time) {
          return time < 10 ? `0${time}` : time;
        }
        
        var startHour = parseInt($("#event_time1").val().split(':')[0]);
        var startMinute = parseInt($("#event_time1").val().split(':')[1]);
        var startAMPM = startHour >= 12 ? 'PM' : 'AM';
        
        if (startHour === 0) {
          startHour = 12;
        } else if (startHour > 12) {
          startHour -= 12;
        }
        
        
        var endHour = parseInt($("#event_time2").val().split(':')[0]);
        var endMinute = parseInt($("#event_time2").val().split(':')[1]);
        var endAMPM = endHour >= 12 ? 'PM' : 'AM';
        

        if (endHour === 0) {
          endHour = 12;
        } else if (endHour > 12) {
          endHour -= 12;
        }
       
        var formattedStartMinute = formatTimeWithLeadingZero(startMinute);
        var formattedEndMinute = formatTimeWithLeadingZero(endMinute);
        
        var event_time1 = startHour + ':' + formattedStartMinute + ' ' + startAMPM + ' to ' +
                             endHour + ':' + formattedEndMinute + ' ' + endAMPM;
        
        console.log(event_time1);
  

        // var event_time1 = $("#event_time1").val() + " to " + $("#event_time2").val();
        // var event_time2 = $("#event_time1").val() + " to " + $("#event_time2").val();

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

                location.reload(answer);

                

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
    navLinks: true,
    selectable: true,
    nowIndicator: true,
    dayMaxEvents: true,
    editable: true,
    events: 'models/loadCalenddar.php',     
    eventDidMount: function (info) {
      // Set different colors for different classNames
      if (info.event.classNames.includes("Bible Study")) {
        info.el.style.backgroundColor = '#6CAE75'; // Green
      } else if (info.event.classNames.includes("Outreach")) {
        info.el.style.backgroundColor = '#5285C5'; // Blue
      } else if (info.event.classNames.includes("Workshop")) {
        info.el.style.backgroundColor = '#F9A646'; // Orange
      } else if (info.event.classNames.includes("Sunday Worship")) {
        info.el.style.backgroundColor = '#A17EBF'; // Purple
      } else if (info.event.classNames.includes("Prayer Meeting")) {
        info.el.style.backgroundColor = '#FF7F50'; // Coral 
      } else if (info.event.classNames.includes("Wedding")) {
        info.el.style.backgroundColor = '#D55C88'; // Pinkish-purple
      } else if (info.event.classNames.includes("Baptismal")) {
        info.el.style.backgroundColor = '#4FA1D8'; // Pinkish-purple
      }
    },
    eventClick: function(info){
      alert(moment(info.event.start ).format("YYYY-MM-DD"));
      $('#exampleVerticallycenteredModal').modal('show');
    },
    dateClick: function(info) {
      var event = new Date(info.date);
      const offset = event.getTimezoneOffset();
      event = new Date(event.getTime() - (offset*60*1000));

      var readableDate = event.toDateString();
      readableDate = readableDate.slice(4,15);
      let date = event.toISOString().split('T')[0];
      date = date.slice(0,10);
  

      $('#event_date').val(date);
      podcastDate = date;

      var name = podcastDate;
      var path = currentPath + "/Podcast/" + name + ".mp3";
      checkFileExistenceAndDisplayMessage(path)

      // Array of event categories
      var eventCategories = ["Bible Study", "Outreach", "Workshop", "Sunday Worship", "Prayer Meeting", "Baptismal", "Wedding"];

      function fetchEventData(eventType) {
        var eventData1 = new FormData();
        eventData1.append("date", date);
        eventData1.append("eventType", eventType);
        
        $.ajax({
          url: "ajax/get_event_details.ajax.php",
          method: "POST",
          data: eventData1,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "html",
          success: function(answer) {
            var event_category =  eventType.replace(/\s/g, '');
            $('#' +event_category+ 'Section').html(answer);
          },
          error: function() {
            alert("Oops. Something went wrong!");
          }
        });
      }

      // Loop through the event categories and fetch data for each category
      eventCategories.forEach(function(eventType) {
        fetchEventData(eventType);
      });

      displayEventDetails(readableDate, date);
      $('#displayEventsModal').modal('show');
    }
  });

  calendar.render();

  // Your filtering functions from the previous response
  function applyFilters() {
    var selectedFilters = [];
    filterCheckboxes.forEach(function (checkbox) {
      if (checkbox.checked) {
        selectedFilters.push(checkbox.id);
      }
    });

    calendar.getEvents().forEach(function (event) {
      //gng 100 ko para d mag display bskan wala na filter
      if (selectedFilters.length === 100 || selectedFilters.includes(event.classNames[0])) {
        event.setProp('display', '');
      }
       else {
        event.setProp('display', 'none');
      }
      
    });
    
  }

  // Get all the filter checkboxes
  var filterCheckboxes = document.querySelectorAll('.calendar-filter');

  // Add event listener to each checkbox
  filterCheckboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
      applyFilters();
    });
  });

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

      
      document.cookie = "viewDate=" +date;

      window.location.href = "catdetails";

    }
    
  });
  calendar.render();
  
});




  function getGroupMembers(){
    var arrData1 = [];
    var arrData2 = [];


  
      $('.memberNamesAddGrop').each(function () {
        console.log($(this).val());

        var str = this.value;

        var members = {};
        members.name = str;
        arrData1.push(members);

      });
    


    $('input[name*="memberName"]').each(function(e)
    {
        console.log($(this).val());

        var str = this.value;

        var members = {};
        members.name = str;
        arrData1.push(members);

    });

    $("#groupEventMembersList").val(JSON.stringify(arrData1));
    console.log( $("#groupEventMembersList").val());

    $('.memberEmailsAddGrop').each(function () {
      console.log($(this).val());

      var str = this.value;


      var email = {};
      email.email = str;
      arrData2.push(email);

    });
    

    $('input[name*="memberEmail"]').each(function(e)
    {
        console.log($(this).val());

        var str = this.value;


        var email = {};
        email.email = str;
        arrData2.push(email);

    });
    
    $("#groupEventEmailList").val(JSON.stringify(arrData2));
    console.log( $("#groupEventEmailList").val());
  }


function displayEventDetails(readableDate ,date){

  $("#eventDateModal").text(readableDate);
  
  
}

function sendGroupEmail(element){
  var group_name = $(element).attr('id');

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

var currentPath = getCookie("church_id");
var podcastDate;

function getCookie(cookieName) {
  const cookiePattern = new RegExp(`(?:(?:^|.*;\\s*)${cookieName}\\s*\\=\\s*([^;]*).*$)|^.*$`);
  const cookieValue = document.cookie.replace(cookiePattern, "$1");
  return cookieValue || null;
  }

// Add click event handler to the button
$('#uploadPodcast').click(function() {
  // Get the selected file from the file input
  const fileInput = $('#podcast_file')[0];
  if (fileInput.files.length > 0) {
    // Get the selected file
    const selectedFile = fileInput.files[0];
    
    // Get the file name
    const fileName = selectedFile.name;
    // Alert the file name

      // get file
      var file = selectedFile;
      // change file name so cannot overwrite
      var name = podcastDate;
      var path = currentPath + "/Podcast/" + name + ".mp3";

        // Set metadata
    var metadata = {
      customMetadata: {
        createdBy: getCookie('acc_name'), 
      }
    };

      // now upload
      var storageRef = firebase.storage().ref(path);
      var uploadTask = storageRef.put(file, metadata);

      var storage = firebase.storage();
      var podcastPlaceholder = storage.ref(currentPath + "/Podcast/.placeholder");

      var metadata = {
        customMetadata: {
          createdBy: getCookie('acc_name'),
          // Add more custom metadata properties as needed
        }
      };

      podcastPlaceholder
        .putString("", "raw", metadata)
        .then(function () {
          console.log("Subfolder created:", path);
        })
        .catch(function (error) {
          console.log("Error:", error);
        });


  } else {
    // Alert if no file is selected
    alert('Please select a file.');
  }
});

function checkFileExistenceAndDisplayMessage(filePath) {
  var storageRef = firebase.storage().ref(filePath);

  return storageRef
    .getMetadata()
    .then(function(metadata) {
      // The file exists, display the message
      document.getElementById('podcastMessage').style.display = 'block';
    })
    .catch(function(error) {
      // If the file does not exist or an error occurs, handle the error here
      if (error.code === 'storage/object-not-found') {
        // The file does not exist, hide the message
        document.getElementById('podcastMessage').style.display = 'none';
      } else {
        console.error('Error getting file metadata:', error);
        document.getElementById('podcastMessage').style.display = 'none';
      }
    });
}


function downloadLinkedFile(element){


  var path = $(element).attr('value');
  var storage = firebase.storage();
  var fileRef = storage.ref(path);

  fileRef
  .getDownloadURL()
  .then(function (downloadURL) {
    var link = document.createElement('a');
    link.href = downloadURL;
    link.setAttribute('download', fileRef.name);
    link.style.display = 'none';

    // Append the link to the document body
    document.body.appendChild(link);

    // Programmatically trigger the download
    link.click();

    // Remove the link from the document body
    document.body.removeChild(link);

  })
  .catch(function (error) {
    console.log('Error:', error);
  });

}

$('#addEventTodayBtn').click(function(){
  let currentDate = new Date().toJSON().slice(0, 10);
$("#event_date").val(currentDate);

});



function editEventDetails(element){

  var event_id = $(element).attr('eventid');


  console.log(event_id);

  var eventData = new FormData();
  eventData.append("event_id", event_id);

  $.ajax({
    url: "ajax/get_eventDetails.ajax.php",
    method: "POST",
    data: eventData,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(answer) {
    console.log(answer);


    $("#churchevent_id").val(answer[0]);

    $("#edit_event_title").val(answer[1]);

    $("#edit_event_type").val(answer[2]);

    $("#edit_event_date").val(answer[3]);

    var timeRange = answer[4]; // Assuming answer[4] contains something like "11:00 AM to 5:00 PM"
    var times = timeRange.split(" to ");
    
    var startTime = times[0]; // "11:00 AM"
    var endTime = times[1];   // "5:00 PM"
    
    // Set the values to the input elements
    $("#edit_event_time1").val(startTime);


    $("#edit_event_time2").val(endTime);

    $("#edit_event_venue").val(answer[6]);

    $("#edit_event_location").val(answer[7]);

    $("#edit_event_announcement").val(answer[8]);





    $('#EditEvents').modal('show'); 

    



    },
    error: function() {
        alert("Oops. Something went wrong!");
    },
    complete: function() {
    }
  });



};

function NewEditEvent() {

  var event_id = $("#churchevent_id").val() 


  var new_title = $("#edit_event_title").val(); 

  var new_date = $("#edit_event_date").val();

  var new_category = $("#edit_event_type").val();

  var new_venue = $("#edit_event_venue").val();

  var new_location = $("#edit_event_location").val();

  var new_announcement = $("#edit_event_announcement").val();


  function formatTimeWithLeadingZero(time) {
    return time < 10 ? `0${time}` : time;
  }
  
  var startHour = parseInt($("#edit_event_time1").val().split(':')[0]);
  var startMinute = parseInt($("#edit_event_time1").val().split(':')[1]);
  var startAMPM = startHour >= 12 ? 'PM' : 'AM';
  
  if (startHour === 0) {
    startHour = 12;
  } else if (startHour > 12) {
    startHour -= 12;
  }
  
  var endHour = parseInt($("#edit_event_time2").val().split(':')[0]);
  var endMinute = parseInt($("#edit_event_time2").val().split(':')[1]);
  var endAMPM = endHour >= 12 ? 'PM' : 'AM';
  
  if (endHour === 0) {
    endHour = 12;
  } else if (endHour > 12) {
    endHour -= 12;
  }
  
  var formattedStartMinute = formatTimeWithLeadingZero(startMinute);
  var formattedEndMinute = formatTimeWithLeadingZero(endMinute);
  
  var new_eventtime1 = startHour + ':' + formattedStartMinute + ' ' + startAMPM + ' to ' +
                       endHour + ':' + formattedEndMinute + ' ' + endAMPM;
  
  console.log(new_eventtime1);



  var updateEvents = new FormData();
  updateEvents.set("event_id", event_id); 

  updateEvents.set("new_title", new_title);

  updateEvents.set("new_date", new_date);

  updateEvents.set("new_category", new_category);

  updateEvents.set("new_venue", new_venue);

  updateEvents.set("new_location", new_location);

  updateEvents.set("new_announcement", new_announcement);

  updateEvents.set("new_eventtime1", new_eventtime1);




  $.ajax({
      url: "ajax/update_eventDetails.ajax.php",
      method: "POST",
      data: updateEvents,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "text",
      success: function(answer) {
          // Load the content into the modal
          location.reload(answer);

  




        },
      error: function() {
          alert("Oops. Something went wrong!");
      }
  });


};


function deleteEvents(element) {

  var eventID = $(element).attr('id');

  var deleteEvent = new FormData();
  deleteEvent.append("eventID", eventID);

  //it is just the same because it is updating
  $.ajax({
      url: "ajax/delete_eventDetails.ajax.php",
      method: "POST",
      data: deleteEvent,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "text",
      success: function(answer) {
          console.log(answer);
          location.reload();


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
