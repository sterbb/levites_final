<style>

</style>

<!--start main content-->
<main class="page-content">
    <div class="col ">
      <!-- Modal -->
      <div class="modal fade" id="displayEventsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-body ">
            <div class="card">
              <div class="card-body pt-3">
               <div class="d-flex text-right justify-content-end align-self-center pl-10 " style="float: right;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <ul class="nav nav-tabs nav-primary justify-content-between" role="tablist">
                  
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true" style="font-size:1.1em;">
                      <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="fadeIn animated bx bx-calendar"></i></i>
                        </div>
                        <div class="tab-title">View</div>
                      </div>
                    </a>
                  </li>

                  <div class="d-flex justify-content-center align-items-center text-center pb-1">
                    <button class="btn btn-white  me-3" id="prevDateCalendar"><i class="bx bx-chevron-left me-0"></i></button>
                    <h6 id="eventDateModal"></h6>
                    <button class="btn btn-white  ms-3" id="nextDateCalendar"><i class="bx bx-chevron-right me-0"></i></button>
                  </div>

                  <li class="nav-item mr-1" role="presentation" style="float:right; margin-right:20px;">
                    <a class="nav-link btn btn-outline-success"  style="font-size:1.1em;">
                      <div class="d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#AddEvents">
                        <div class="tab-icon"><i class="fadeIn animated bx bx-calendar-plus"></i></i>
                        </div>
                        <div class="tab-title">Add</div>
                      </div>
                    </a>
                  </li>

                </ul>

      

            
                <div class="tab-content py-3" >

                  <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                    <div class="row g-3">
                        <div class="col-12 col-lg-3">

       
                        <div class="nav flex-column nav-pills border rounded vertical-pills event_type_list d-flex flex-column overflow-auto" style="max-height: 350px;">
                              <button class="nav-link active px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#BibleStudySection" type="button"><i class="fas fa-book-open me-2" style="color:#6CAE75;"></i>Bible Study</button>
                              <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#OutreachSection" type="button"><i class="fas fa-hands-helping me-2" style="color:#5285C5;"></i>Outreach</button>
                              <button class="nav-link  px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#WorkshopSection" type="button"><i class="fas fa-tools me-2" style="color:#F9A646;"></i>Workshop</button>
                              <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#SundayWorshipSection" type="button"><i class="fas fa-church me-2" style="color:#A17EBF;"></i>Sunday Worship</button>
                              <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#PrayerMeetingSection" type="button"><i class="fas fa-praying-hands me-2" style="color:#FF7F50;"></i>Prayer Meeting</button>
                              <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#BaptismalSection" type="button"><i class="fas fa-water me-2" style="color:#4FA1D8;"></i>Baptismal</button>
                              <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#WeddingSection" type="button"><i class="fas fa-ring me-2" style="color:#D55C88;"></i>Wedding</button>




                        
                      
                                  <!-- // $eventype = (new ControllerCalendar)->ctrShowEventType();
                                  // foreach($eventype as $key => $value){
                                  //   echo ' <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#'.$value["type_name"].'" type="button"><i class="fas fa-ring me-2"></i>'.$value["type_name"].'</button>';
                                  // }; -->
                                  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                <script>
            
                                    $(document).ready(function() {

                                      
                                        var randomColors = [
                                          "#E9967A",
                                          "#4B0082",
                                          "#8B4513",
                                          "#DDA0DD",
                                          "#20B2AA",
                                          "#B0C4DE",
                                          "#00FF00",
                                          "#FF00FF",
                                          "#800000",
                                          "#008080",
                                          "#FFD700",
                                          "#ADFF2F",
                                          "#FFE4B5",
                                          "#FA8072",
                                          "#00FA9A",
                                          "#D2691E",
                                          "#800080",
                                          "#008000",
                                          "#2E8B57",
                                          "#C71585"
                                        ];
                                                          
                                        var colorIndex = 0;

      
                                      
                                      // Your Ajax code here
                                      $.ajax({
                                        url: 'models/showEventTypes.php',
                                        method: 'GET',
                                        dataType: 'json',
                                        success: function(response) {
                                                            
                                          var eventsList = '';
                          
                                          response.forEach((type) =>{

                                            if(colorIndex == randomColors.length){
                                            colorIndex = 0;
                                          }

                                          var current_color = randomColors[colorIndex];

                                            eventsList +=
                                            '<button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#'+ type.type_name.replace(/\s/g, '') +'Section" type="button"><i class="fas fa-regular fa-calendar-days me-2" style="color:'+current_color+ ';"></i>'+ type.type_name +'</button>';

                                            colorIndex++;
                                          });

                                          $('.event_type_list').find('[data-bs-target="#WeddingSection"]').after(eventsList);
                                        },
                                        error: function(xhr, status, error) {
                                          // Handle errors, if any
                                          console.log('Error:', error);
                                        }
                                      });
                                    });
                              </script>
                  
                          
                              <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#AddType" type="button"><i class="lni lni-plus me-2 "></i>Manage Event Types</button>  
                            </div>
            
                          
                          <div class="col-12 col-lg-12 text-center mt-5">
                            <h5 for="Collection" class="form-label fw-bold mb-3"><i class="lni lni-mic"></i>Podcast</h5>
                            <h6 id="podcastMessage" class="text-success mt-2" style="display: none;">A podcast already exists</h6>  
                            <input type="file" class="form-control" id="podcast_file" accept=".mp3, .wav, .ogg">

                            <button type="button" class="btn btn-secondary mt-3 border-0" style="background: linear-gradient(to right, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%);" id="uploadPodcast">Upload<i class='upicon bx bx-download' ></i>
                          </div>
                          
                        </div>
                        <div class="col-12 col-lg-9 border">

                         
                          
                          <div class="tab-content overflow-auto p-3" id="event_details_section" style="overflow-x: hidden !important; max-height: 50vh; "> 

                            <div class="tab-pane fade show active" id="BibleStudySection">
                             
                            </div>


                            <div class="tab-pane fade" id="OutreachSection">
    
                            </div>


                            <div class="tab-pane fade " id="WorkshopSection">

                              
                            </div>


                            <div class="tab-pane fade" id="SundayWorshipSection">
                              
                            </div>
                            
                            <div class="tab-pane fade" id="PrayerMeetingSection">
                
                            </div>

                            <div class="tab-pane fade" id="BaptismalSection">
                     
                            </div>

                            <div class="tab-pane fade" id="WeddingSection">
                     
                            </div>

                            <script>
            
                              $(document).ready(function() {
                                // Your Ajax code here
                                $.ajax({
                                  url: 'models/showEventTypes.php',
                                  method: 'GET',
                                  dataType: 'json',
                                  success: function(response) {
                                    response.forEach((type) =>{           
                                      $('#event_details_section').append('<div class="tab-pane fade" id="'+ type.type_name.replace(/\s/g, '') +'Section"></div>');
                                    });
                                  },
                                  error: function(xhr, status, error) {
                                    // Handle errors, if any
                                    console.log('Error:', error);
                                  }
                                });
                              });
                            </script>



                            <div class="tab-pane fade" id="AddType">

  
                                <div class="row g-3 ">

                                  <div class="col d-flex flex-column justify-content-center border border-2 overflow-hidden">
                                    <p>Add Event Type</p>
                                    <label class="mt-3">Event Type Name</label>
                                    <input id= "type_name" class="form-control" type="text" placeholder="">
                                    <div class="d-flex justify-content-center mt-3">
                                      <button type="button" class="btn btn-danger me-3">Clear </button>
                                      <button id="AddEventType" type="button" class="btn btn-success me-3">Add</button>  
                                    </div>
                 
                                  </div>

                                  <div class="col  border border-2 overflow-auto created_eventtypes_section" style="max-height:500px;">
                                    <p>Created Event Types</p>

                                      <script>
              
                                  
                                        // Your Ajax code here
                                        $.ajax({
                                          url: 'models/showEventTypes.php',
                                          method: 'GET',
                                          dataType: 'json',
                                          success: function(response) {
                                            response.forEach((type) =>{           
                                              $('.created_eventtypes_section').append('<div class="d-flex align-items-center justify-content-between py-2 px-2 border-bottom"><div class="px-2"><h6 class="mb-0 fw-bold"> <i class="fadeIn animated bx bx-church fs-4 m-2"></i>'+ type.type_name+'</h6></div><button class="btn btn-outline-danger rounded-5 btn-sm px-3 deleteEventType" value="'+ type.type_name+'"><i class="fadeIn animated bx bx-x"></i></button></div></div>');
                                            });
                                          },
                                          error: function(xhr, status, error) {
                                            // Handle errors, if any
                                            console.log('Error:', error);
                                          }
                                        });
                           
                                    </script>

            
                            

                                 
                                  </div>

                                </div>

                             
                                
                              </div>

                       
                            </div>

                             

                           
                            </div>

                          </div>
                        </div>
                      </div>

                  </div>

               
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>


      <div class="row">
        <div class="col-12 col-lg-3">
          <div class="card">
            
                <div class="card-body d-flex justify-content-around align-items-center">
                    <h6 class="mb-0 text-uppercase" style="font-family: 'Montserrat', sans-serif; font-weight:700; font-size:1.5em;" id="church_calendar_date"></h6>
                    <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Add Event" data-bs-toggle="modal" data-bs-target="#AddEvents" id="addEventTodayBtn"><i class="fadeIn animated bx bx-calendar-plus"></i></button>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <script>
                  // List of Bootstrap background color classes
                    const colorClasses = [
                      'bg-primary',
                      'bg-secondary',
                      'bg-success',
                      'bg-danger',
                      'bg-warning',
                      'bg-info',
                      'bg-light',
                      'bg-dark',
                    ];

                    function getNextColorClass(currentIndex) {
                      // Calculate the index of the next color class
                      const nextIndex = (currentIndex + 1) % colorClasses.length;

                      // Return the next color class
                      return colorClasses[nextIndex];
                    }

                    $(document).ready(function() {
                      // Your Ajax code here
                      $.ajax({
                        url: 'models/showCurrentEvents.php',
                        method: 'GET',
                        dataType: 'json',
                        success: function(response) {
                          var eventsList = '';
                          var currentIndex = -1; // Initialize the index of the current color class

                          $.each(response, function(index, event) {
                            // Get the next background color class
                            const nextColorClass = getNextColorClass(currentIndex);
                            currentIndex = (currentIndex + 1) % colorClasses.length; // Update the current index

                            eventsList +=
                              '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent">' +
                              event.event_title +
                              '<span class="badge rounded-pill ' + nextColorClass + '">' +
                              event.event_time +
                              '</span></li>';
                          });

                          $('#current_eventList').html(eventsList);
                        },
                        error: function(xhr, status, error) {
                          // Handle errors, if any
                          console.log('Error:', error);
                        }
                      });
                    });
              </script>

                <ul class="list-group list-group-flush mb-0" id="current_eventList">

              </ul>


          </div>
          

          <div class="card">
            <div class="card-body" id="calendar_filter_section">
                <h6>Calendar Filters</h6>
                <div class="form-check form-switch">
                    <input class="form-check-input calendar-filter" type="checkbox" id="Bible Study" checked style="background-color: #6CAE75; border: 2px solid #6CAE75;">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Bible Study</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input calendar-filter" type="checkbox" id="Outreach" checked style="background-color: #5285C5; border: 2px solid #5285C5;">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Outreach</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input calendar-filter" type="checkbox" id="Workshop" checked style="background-color: #F9A646; border: 2px solid #F9A646;"> 
                    <label class="form-check-label" for="flexSwitchCheckChecked">Workshop</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input calendar-filter" type="checkbox" id="Sunday Worship" checked style="background-color: #A17EBF; border: 2px solid #A17EBF;">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Sunday Worship</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input calendar-filter" type="checkbox" id="Prayer Meeting" checked style="background-color: #FF7F50; border: 2px solid #FF7F50;">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Prayer Meeting</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input calendar-filter" type="checkbox" id="Baptismal" checked style="background-color: #4FA1D8; border: 2px solid #4FA1D8;">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Baptismal</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input calendar-filter" type="checkbox" id="Wedding" checked style="background-color: #D55C88; border: 2px solid #D55C88;">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Wedding</label>
                </div>

              <script>

                  // Your Ajax code here
                  $.ajax({
                    url: 'models/showEventTypes.php',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {

                      var randomColors = [
                        "#E9967A",
                        "#4B0082",
                        "#8B4513",
                        "#DDA0DD",
                        "#20B2AA",
                        "#B0C4DE",
                        "#00FF00",
                        "#FF00FF",
                        "#800000",
                        "#008080",
                        "#FFD700",
                        "#ADFF2F",
                        "#FFE4B5",
                        "#FA8072",
                        "#00FA9A",
                        "#D2691E",
                        "#800080",
                        "#008000",
                        "#2E8B57",
                        "#C71585"
                      ];
                                        
                      var colorIndex = 0;

                      response.forEach((type) =>{

                        if(colorIndex == randomColors.length){
                          colorIndex = 0;
                        }

                        var current_color = randomColors[colorIndex];

                        $('#calendar_filter_section').append('<div class="form-check form-switch"><input class="form-check-input calendar-filter" type="checkbox" id="'+ type.type_name+'" checked style="background-color: '+current_color+'; border: 2px solid '+current_color+'  ;"><label class="form-check-label" for="flexSwitchCheckChecked">'+ type.type_name+'</label></div>');

                        colorIndex++;
                      });
                    },
                    error: function(xhr, status, error) {
                      // Handle errors, if any
                      console.log('Error:', error);
                    }
                  });
          
                </script>

            </div>
          </div>
        </div>
        <div class="col-12 col-lg-9">
          <div class="card">
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!--end row-->
    </main>
     <!--end main content-->  



<div class="col">
  <!-- Modal -->
  <div class="modal fade" id="addGroupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Group</h5>
          <button type="button" class="btn-close" aria-label="Close" data-bs-toggle="modal" data-bs-target="#AddEvents"></button>
        </div>
        <!-- <form role="form" id="addGroupForm" method="POST" autocomplete="nope" class="addGroupForm row g-3"> -->
          <div class="modal-body">
            <div class="col-12 "> 
              <label for="Collection" class="form-label fw-bold">Group Name</label>
              <input type="text" class="form-control" id="groupName" placeholder="">
            </div>

            <input type="text" name="groupEventMembersList" id="groupEventMembersList" hidden>
            <input type="text" name="groupEventEmailList" id="groupEventEmailList" hidden>

            <div class="mt-3">
                  <!-- Repeater Html Start -->
              <div id="repeater">
       
              
                <!-- Repeater Heading -->

                <div class="d-flex justify-content-between align-items-center mb-3">            
                  <h6 class="mb-0">Add Member</h6>
                  <select name="" id="groupMembersInput" class="form-select border-3" >
                    <?php
                    $memBer = (new ControllerUserAccount)->ctrShowUserAccount();
                    foreach($memBer as $key => $value){
                      echo '<option email="'.$value['memberEmail'].'" value="'.$value['memberID'].'">'.$value['memberName'].'</option>';
                    };
                    ?>
                  </select>
                  <button class="me-0 btn btn-success repeater-add-member-btn"><i class="fadeIn animated bx bx-user-plus"></i></button>
                </div>

                <div class="addMembertoGroupSection">

                </div>

              <hr>

              <div class="d-flex justify-content-between align-items-center mb-3">            
                  <h6 class="mb-0">Add Person</h6>
              
                  <button class="me-0 btn btn-success repeater-add-btn"><i class="fadeIn animated bx bx-user-plus"></i></button>
              </div>

                <!-- Repeater Items -->
                <div class="items" data-group="members"> 
                  <div class="card">
                    <div class="card-body">
                      <!-- Repeater Content -->
                      <div class="item-content">
                        <div class="d-flex align-items-end  justify-content-end">
                        <button class="btn btn-danger remove-btn "><i class="fadeIn animated bx bx-user-minus"></i></button>
                        </div>
                    
                        <div class="mb-3">
                          <label for="inputName1" class="form-label">Name</label>
                        
                          <input type="text" class="form-control" id="inputName1" placeholder="Name" data-name="memberName">
                        </div>
                        <div class="mb-3">
                          <label for="inputEmail1" class="form-label">Email</label>
                          <input type="text" class="form-control" id="inputEmail1" placeholder="Email" data-skip-name="true"
                            data-name="memberEmail">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


              </div>
              <!-- Repeater End -->
            

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" aria-label="Close" data-bs-toggle="modal" data-bs-target="#AddEvents">Close</button>
            <button type="button" class="btn btn-primary"  id="groupAddBtn">Save changes</button>
          </div>
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>


<div class="col" >
  <!-- Modal -->
  <div class="modal fade" id="AddEvents" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Event</h5>
          <button type="button" class="btn-close" aria-label="Close" data-bs-toggle="modal" data-bs-target="#displayEventsModal"></button>
        </div>
        <form role="form" id="addEventForm" method="POST" autocomplete="nope" class="addEventForm">
          <div class="modal-body" style="overflow-y:scroll; height: 60vh; ">
            <div >
              <div class="row">
                <div class="col-4">
                      <label for="inputReligion" class="form-label fw-bold" >Event Type</label>
                      <select class="form-select border-3" id="event_type" aria-label="Default select example">
                      <option selected="" value="Bible Study">Bible Study</option>
                      <option value="Outreach">Outreach</option>
                      <option value="Workshop">Workshop</option>
                      <option value="Sunday Worship">Sunday Worship</option>
                      <option value="Prayer Meeting">Prayer Meeting</option>
                      <option value="Baptismal">Baptismal</option>
                      <option value="Wedding">Wedding</option>

                      <script>
                            $(document).ready(function() {
                              // Your Ajax code here
                              $.ajax({
                                url: 'models/showEventTypes.php',
                                method: 'GET',
                                dataType: 'json',
                                success: function(response) {
                                                    
                                  response.forEach((type) =>{
                                    $('#event_type').append('<option value="'+type.type_name+'"> '+type.type_name+' </option>');

                                  });
                                },
                                error: function(xhr, status, error) {
                                  // Handle errors, if any
                                  console.log('Error:', error);
                                }
                              });
                            });
                      </script>

                      </select>
                  </div>  
                  <div class="col-8"> 
                      <label for="Collection" class="form-label fw-bold">Event Title</label>
                      <input type="text" class="form-control" id="event_title" placeholder="">
                  </div>

              </div>
                <div class="row mt-3">
                    <div class="col-6">
                      <label class="form-label fw-bold">Date Range </label><span class="text-grey" style="font-size: 11px"> (Double click the day to add Date)</span>
                      <input type="text" class="form-control date-range" id="event_date" />
                      
                    </div>
                    <div class="col-3">
                      <label for="Collection" class="form-label fw-bold">Time Range</label>
                      <input type="text" class="form-control time-picker" id="event_time1"/>
                    </div>
                    <div class="col-3">
                      <label for="Collection" class="form-label fw-bold">&nbsp</label>
                      <input type="text" class="form-control time-picker" id="event_time2"/>
                    </div>    
                </div>
                <div class="row">
                  <div class="col-6 "> 
                      <label for="Collection" class="form-label fw-bold">Venue</label>
                      <input type="text" class="form-control" id="event_venue" placeholder="">
                  </div>

                  <div class="col-6 "> 
                      <label for="event_location" class="form-label fw-bold">Location</label>
                      <input type="text" class="form-control" id="event_location" placeholder="">
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 ">
                      <label for="event_announcement" class="form-label fw-bold">Announcement</label>
                      <textarea class="form-control" id="event_announcement" rows="5"></textarea>
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-end mt-3">
                  <button type="button" class="btn btn-outline-dark px-5 radius-30 text-center" data-bs-toggle="modal" data-bs-target="#addGroupModal"><i class="fadeIn animated bx bx-plus"></i><i class="fadeIn animated bx bx-group"></i>&nbsp;Add Group</button>
                </div>

                <div class="row row-cols-1 row-cols-lg-3 g-3 border-bottom pb-3 pt-3" id="add_group_preview">

                </div>
                
              </div>
          </div>

          <div class="modal-footer">
            <div class="row pt-3">
              <div class="col d-flex justify-content-end">
              <button type="button" id="clearFields" class="btn btn-danger me-3">Clear </button>
                <button type="submit" class="btn btn-success me-3">Save</button>
              </div>     
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="col" >
  <!-- Modal -->
  <div class="modal fade" id="EditEvents" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Event</h5>
          <button type="button" class="btn-close" aria-label="Close" data-bs-toggle="modal" data-bs-target="#displayEventsModal"></button>
        </div>
        <form role="form" id="" method="POST" autocomplete="nope" class="">
          <div class="modal-body" style="overflow-y:scroll; height: 60vh; ">
            <div >
              <div class="row">

              <input type="text" class="form-control" id="churchevent_id"  placeholder="" style="display:none;">

                <div class="col-4">
                      <label for="inputReligion" class="form-label fw-bold" >Event Type</label>
                      <select class="form-select border-3" id="edit_event_type" aria-label="Default select example">
                      <option selected="" value="Bible Study">Bible Study</option>
                      <option value="Outreach">Outreach</option>
                      <option value="Workshop">Workshop</option>
                      <option value="Sunday Worship">Sunday Worship</option>
                      <option value="Prayer Meeting">Prayer Meeting</option>
                      <option value="Baptismal">Baptismal</option>
                      <option value="Wedding">Wedding</option>

                      <script>
                            $(document).ready(function() {
                              // Your Ajax code here
                              $.ajax({
                                url: 'models/showEventTypes.php',
                                method: 'GET',
                                dataType: 'json',
                                success: function(response) {
                                                    
                                  response.forEach((type) =>{
                                    $('#edit_event_type').append('<option value="'+type.type_name+'"> '+type.type_name+' </option>');

                                  });
                                },
                                error: function(xhr, status, error) {
                                  // Handle errors, if any
                                  console.log('Error:', error);
                                }
                              });
                            });
                      </script>
                      </select>
                  </div>  
                  <div class="col-8"> 
                      <label for="Collection" class="form-label fw-bold">Event Title</label>
                      <input type="text" class="form-control " id="edit_event_title" placeholder="">
                  </div>

              </div>
                <div class="row mt-3">
                    <div class="col-6">
                      <label class="form-label fw-bold">Date Range </label><span class="text-grey" style="font-size: 11px"> (Double click the day to add Date)</span>
                      <input type="text" class="form-control date-range" id="edit_event_date" />
                      
                    </div>
                    <div class="col-3">
                      <label for="Collection" class="form-label fw-bold">Time Range</label>
                      <input type="text" class="form-control time-picker" id="edit_event_time1"/>
                    </div>
                    <div class="col-3">
                      <label for="Collection" class="form-label fw-bold">&nbsp</label>
                      <input type="text" class="form-control time-picker" id="edit_event_time2"/>
                    </div>    
                </div>
                <div class="row">
                  <div class="col-6 "> 
                      <label for="Collection" class="form-label fw-bold">Venue</label>
                      <input type="text" class="form-control" id="edit_event_venue" placeholder="">
                  </div>

                  <div class="col-6 "> 
                      <label for="event_location" class="form-label fw-bold">Location</label>
                      <input type="text" class="form-control" id="edit_event_location" placeholder="">
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 ">
                      <label for="event_announcement" class="form-label fw-bold">Announcement</label>
                      <textarea class="form-control" id="edit_event_announcement" rows="5"></textarea>
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-end mt-3">
                  <button type="button" class="btn btn-outline-dark px-5 radius-30 text-center" data-bs-toggle="modal" data-bs-target="#addGroupModal"><i class="fadeIn animated bx bx-plus"></i><i class="fadeIn animated bx bx-group"></i>&nbsp;Add Group</button>
                </div>

                <div class="row row-cols-1 row-cols-lg-3 g-3 border-bottom pb-3 pt-3" id="add_group_preview">

                </div>
                
              </div>
          </div>

          <div class="modal-footer">
            <div class="row pt-3">
              <div class="col d-flex justify-content-end">
                <button type="button" id="clearFields" class="btn btn-danger me-3">Clear </button>
                <button type="button" onclick="NewEditEvent(this)"  class="btn btn-success me-3">Save</button>
              </div>     
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


