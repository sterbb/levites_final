  <!--start main content-->
  <main class="page-content">   
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4 justify-content-around">
        <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="">
                    <p class="mb-1">Total Views</p>
                    <h4 class="mb-0 text-primary">1,045</h4>
                  </div>
                  <div class="ms-auto fs-2 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-primary"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                  </div>
                </div>
                <hr class="my-2">

              </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="">
                    <p class="mb-1">Total Members</p>
                    <h4 class="mb-0 text-danger">
                    <?php

                        $result = (new CollaborationController)->ctrTotalMember();

                        if (isset($result)) {
                            // Get the total member count
                            $totalMemberCount = $result;

                            // You can now use the $totalMemberCount variable as needed
                            echo  $totalMemberCount;
                        } else {
                            echo "Error fetching data.";
                        }
                        ?>


                    </h4>
                  </div>
                  <div class="ms-auto fs-2 text-danger">
                    <i class="lni lni-users" style="font-size:1.3em;"></i>
                  </div>
                </div>
                <hr class="my-2">
         
              </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="">
                    <p class="mb-1">Events This Month</p>
                    <h4 class="mb-0 text-success">
                    <?php

                        $event = (new ControllerUserAccount)->ctrTotalEvent();

                        if (isset($event)) {
                            // Get the total member count
                            $totalEvent = $event;

                            // You can now use the $totalMemberCount variable as needed
                            echo  $totalEvent;
                        } else {
                            echo "Error fetching data.";
                        }
                                                                                                                                                


                        ?>




                    </h4>
                  </div>
                  <div class="ms-auto fs-2 text-success">
                    <i class="fadeIn animated bx bx-calendar-event"></i>
                  </div>
                </div>
                <hr class="my-2">

              </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="">
                    <p class="mb-1">Storage Consumed</p>
                    <h4 class="mb-0 text-primary" id="consumedSpace"></h4>
                  </div>
                  <div class="ms-auto fs-2 text-primary">
                    <i class="fadeIn animated bx bx-folder"></i>
                  </div>
                </div>
                <hr class="my-2">
  
              </div>
            </div>
        </div>

    </div><!--end row-->
    <div class="row">
        
            <div class="col-12 col-lg-12 col-xl-6">
                <div class="card ">
                    <div class="card-header bg-transparent h-100">
                        <div class="d-flex align-items-center">
                            <div class="p-2">
                                <h6 class="mb-0 fw-bold">Monthly Views</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chart3"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-6">
                <div class="card">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                    <div class="p-2">
                        <h6 class="mb-0 fw-bold">Monthly Members</h6>

                    </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="memberDate"></div>
                </div>
                </div>
            </div>
    
        </div>

    </div><!--end row-->
    


    <div class="row">

        <div class="col-8" >
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 text-uppercase">File Storage</h6>
                    <div class="my-3 border-top"></div>
                    
                    <div class="row row-cols-1 row-cols-lg-2 g-3" id="dashboardStorageSection">

                        <div class="col">
                            <div class="card text-center">
                        
                                <div id="dashboardLocalStorage" class="mt-3"></div>

                                <div class="card-body">
                                    <h5 class="card-title">Local Storage</h5>
                                    <a href="filestorage" class="btn btn-primary">View Storage</a>
                                </div>
                            </div>
                        </div>



                    
                    </div><!--end row-->
                </div>
            </div>
        </div>


        <div class="col-4">
         <div class="card">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <h6 class="mb-0 text-uppercase" id="dashboard-currentdate"></h6>
                    <a href="churchcalendar"><button type="button" class="btn btn-outline-dark px-5 radius-30">View Calendar</button></a> 
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
                                if(response == ""){

                                  eventsList =
                                    '<li class="list-group-item border-top d-flex justify-content-center align-items-center bg-transparent"> No Events</li>';
                                  $('#current_eventList').html(eventsList);
                                }else{

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
                                  
                                }

                            },
                            error: function(xhr, status, error) {
                              // Handle errors, if any
                              console.log('Error:', error);
                            }
                          });
                        });
                    </script>





                    <ul class="list-group list-group-flush mb-0"  id="current_eventList">
                        <!-- <li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent">Wedding<span class="badge bg-success rounded-pill">7:45 A.M.</span>
                        </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Baptism<span class="badge bg-primary rounded-pill">8:50 A.M.</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Workshop<span class="badge bg-danger rounded-pill">7:45 P.M.</span>
                    </li> -->
                    </ul>
          </div>        
        </div>


    </div>
    
               
                    

</main>
<!--end main content-->

