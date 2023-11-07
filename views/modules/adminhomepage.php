  <!--start main content-->
  <main class="page-content">   
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4 justify-content-around">
        <div class="col">
            <div class="card radius-10 ">
              <div class="card-body">
                <div class="d-flex align-items-center justify-items-between">


                  <div class="">
                      <p class="mb-1">Bookmarks</p>
                      <h4 class="mb-0 text-warning">
                      <button type="button" data-bs-toggle="modal" data-bs-target="#dashboardWebsite" class="btn btn-outline-warning radius-30 text-center" style=" display: flex; align-items: center; justify-content: center;" data-toggle="tooltip" data-placement="top" title="Manage Bookmark">
                            <i class="fadeIn animated lni lni-bookmark" style="font-size: 0.8em;"></i>
                        </button>
                                     <!-- <i class="lni lni-bookmark" style="font-size:.8em;"></i> -->
                      </h4>
                  </div>

                
                  <div class="ms-auto fs-2 text-danger d-flex align-items-center justify-items-between">
                      <?php 
                          $websites = (new ControllerWebsite)->ctrShowWebsites();

                          $count = 0;

                          foreach ($websites as $key => $value) {

                            if($count == 3){
                                break;
                            }else{
                                if($value['bookmark'] == 1){
                                    echo'<div class="text-center">';
            
                                    echo '<a href="' . $value['website_path'] . '" target="_blank" data-toggle="tooltip" data-placement="bottom" title="'. $value['website_name'].'">';
                                  
                                    if ($value['website_category'] === 'Social Media') {
                                        echo '<img src="views/images/socmed.png" width="60" height="55" >';
                                    } elseif ($value['website_category'] === 'Productivity') {
                                        echo '<img src="views/images/productivity.png" width="60" height="55" >';
                                    } elseif ($value['website_category'] === 'Multimedia') {
                                        echo '<img src="views/images/multimedia.png" width="60" height="55" >';
                                    } else {
                                        echo '<img src="views/images/videocon.png" width="50" height="45" > ';
                                    }
                                    
                                    echo '</a>';
    
                                  echo '</div>';
                                  $count++;
                                };
                            }
                          }

                          if($count == 0){
                            echo '<p class="mb-1 text-warning" style="font-size:.4em;">No available bookmarks</p>';
                            // echo ' <button type="button" data-bs-toggle="modal" data-bs-target="#dashboardWebsite" class="btn btn-outline-dark px-3 radius-30 text-center"><i class="fadeIn animated bx bx-list-plus" style="font-size:1.2em;" data-toggle="tooltip" data-placement="top" title="Manage Bookmark"></i><i class="fadeIn animated bx bx-globe" style="font-size:1.2em; "></i></button> ';
                          }


                      ?>
     
                  </div>
                  
                  <?php 
                      // $websites = (new ControllerWebsite)->ctrShowWebsites();

                      // foreach ($websites as $key => $value) {
                      
                      //   if($value['bookmark'] == 1){
                      //       echo'<div class="text-center">';

                      //       echo '<a href="' . $value['website_path'] . '" target="_blank">';
                          
                      //       if ($value['website_category'] === 'Social Media') {
                      //           echo '<img src="views/images/socmed.png" width="60" height="55" >';
                      //       } elseif ($value['website_category'] === 'Productivity') {
                      //           echo '<img src="views/images/productivity.png" width="60" height="55" >';
                      //       } elseif ($value['website_category'] === 'Multimedia') {
                      //           echo '<img src="views/images/multimedia.png" width="60" height="55" >';
                      //       } else {
                      //           echo '<img src="views/images/videocon.png" width="50" height="45" > ';
                      //       }
                            
                         
                      //       echo '</a>';

                      //     echo '</div>';
                      //   };

                        
                      // }
                  ?>

                  <!-- <div class="ms-auto fs-2 text-warning d-flex align-items-start">
                    <i class="lni lni-bookmark mb-3" style="font-size:.8em;"></i>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#dashboardWebsite" class="btn btn-outline-dark px-3 radius-30 text-center"><i class="fadeIn animated bx bx-list-plus" style="font-size:1.2em;" data-toggle="tooltip" data-placement="top" title="Manage Bookmark"></i><i class="fadeIn animated bx bx-globe" style="font-size:1.2em; "></i></button> 
                  </div> -->
                </div>
                <hr class="my-2">

              </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10" style="max-height:155px;">
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
            <div class="card radius-10" style="max-height:155px;">
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
                                <h6 class="mb-0 fw-bold"><i class="fa-regular fa-calendar-days me-2  text-success"></i>Monthly Events</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="eventsChartDash"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-6">
                <div class="card">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                    <div class="p-2">
                        <h6 class="mb-0 fw-bold"><i class="fa-solid fa-people-roof me-2  text-danger"></i>Monthly Members</h6>

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
                    <h6 class="mb-0 text-uppercase"><i class="fa-solid fa-box-open me-2  text-primary"></i>File Storage</h6>
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
                    <a href="churchcalendar"><button type="button" class="btn btn-outline-dark px-5 radius-30"><i class="far fa-calendar me-2"></i>View Calendar</button></a> 
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

<div class="modal fade" id="dashboardWebsite" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header text-white" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">
            <h5 class="modal-title">Manage Bookmarks</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <input type="hidden" name="dashgroupWebsiteList" id="dashgroupWebsiteList">

        <div class="modal-body">
            <div class="row">
                <div class="row mt-3 mb-1">
              
                   
                    <div class=" d-flex justify-content-between align-items-center mt-4">
                        <h6>Social Media</h6>
                     
                       
                    </div>
                    <hr>

                    <div class="row mb-2 ">

          
                        <?php 
                            $websites = (new ControllerWebsite)->ctrShowWebsites();
                            foreach($websites as $key => $value) {
                                
                                $websiteCategory = $value['website_category'];
                                
                                if ($websiteCategory === 'Social Media') {

                                    echo '
                                    <div class="col-3 text-center">
                                        <div class="card">
                                            <img src="views/images/socmed.png" class="mx-auto d-block mt-3"  style="width:90px; height:90px;">
                                            <p style="font-size: 1.5em;"  class="mt-3" >'.$value['website_name'].'</p>
                                            <div class="card-body">
                                                <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top: -20px;">';
    
                                                if($value['bookmark'] == 0){
                                                    echo'  <input class="form-check-input border-2 border-success dashNewSM" name="dashcur_websites" type="checkbox" value="'.$value['website_name'].'#'.$value['website_path'].'#'. $value['website_category'].'" group="dashwebsitesGroup" id="dashcur_websites" style="font-size: 2em;">';
                                                }else{
                                                    echo' <input class="form-check-input border-2 border-success dashNewSM" name="dashcur_websites" type="checkbox" value="'.$value['website_name'].'#'.$value['website_path'].'#'. $value['website_category'].'" group="dashwebsitesGroup" id="dashcur_websites" style="font-size: 2em;" checked>';
                                                }
                                                   
                                    echo'
                                                </div>
                                            </div>
                                        </div>
                                    </div>'
                                    ;
                                }

                                
                           
                            }
                    
                        ?>
                    </div>
                </div>

           
                <div class="row mb-2">
                        <div class=" d-flex justify-content-between align-items-center">
                        <h6>Productivity</h6>
                         
                    </div>
                    <hr>
                    <div class="row mb-2">
                            

                    <?php 
                        $websites = (new ControllerWebsite)->ctrShowWebsites();
                        foreach($websites as $key => $value) {
                      
                            
                            $websiteCategory = $value['website_category'];
                            
                           if ($websiteCategory === 'Productivity') {
                            

                                echo '
                                <div class="col-3 text-center">
                                    <div class="card">
                                        <img src="views/images/productivity.png" class="mx-auto d-block mt-3"  style="width:90px; height:90px;">
                                        <p style="font-size: 1.5em;"  class="mt-3" >'.$value['website_name'].'</p>
                                        <div class="card-body">
                                            <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top: -20px;">';

                                            if($value['bookmark'] == 0){
                                                echo'  <input class="form-check-input border-2 border-success NewPro" name="dashcur_websites" type="checkbox" value="'.$value['website_name'].'#'.$value['website_path'].'#'. $value['website_category'].'" group="dashwebsitesGroup" id="dashcur_websites" style="font-size: 2em;">';
                                            }else{
                                                echo' <input class="form-check-input border-2 border-success NewPro" name="dashcur_websites" type="checkbox" value="'.$value['website_name'].'#'.$value['website_path'].'#'. $value['website_category'].'" group="dashwebsitesGroup" id="dashcur_websites" style="font-size: 2em;" checked>';
                                            }
                                               
                                echo'
                                            </div>
                                        </div>
                                    </div>
                                </div>'
                                ;
                                
                            }
                     
                            
                            
                        }
                        ?>
                    </div>

                </div>

                <div class="row mb-2">
                        <div class=" d-flex justify-content-between align-items-center">
                        <h6>Multimedia</h6>
 
                         
                    </div>
                    <hr>
                    <div class="row mb-2">
                            

                    <?php 
                        $websites = (new ControllerWebsite)->ctrShowWebsites();
                        foreach($websites as $key => $value) {
                      
                            
                            $websiteCategory = $value['website_category'];
                            
                           if ($websiteCategory === 'Multimedia') {
                            

                                echo '
                                <div class="col-3 text-center">
                                    <div class="card">
                                        <img src="views/images/multimedia.png" class="mx-auto d-block mt-3"  style="width:90px; height:90px;">
                                        <p style="font-size: 1.5em;"  class="mt-3" >'.$value['website_name'].'</p>
                                        <div class="card-body">
                                            <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top: -20px;">';

                                            if($value['bookmark'] == 0){
                                                echo'  <input class="form-check-input border-2 border-success dashNewMedia" name="dashcur_websites" type="checkbox" value="'.$value['website_name'].'#'.$value['website_path'].'#'. $value['website_category'].'" group="dashwebsitesGroup" id="dashcur_websites" style="font-size: 2em;">';
                                            }else{
                                                echo' <input class="form-check-input border-2 border-success dashNewMedia" name="dashcur_websites" type="checkbox" value="'.$value['website_name'].'#'.$value['website_path'].'#'. $value['website_category'].'" group="dashwebsitesGroup" id="dashcur_websites" style="font-size: 2em;" checked>';
                                            }
                                               
                                echo'
                                            </div>
                                        </div>
                                    </div>
                                </div>'
                                ;
                            }
                     
                            
                            
                        }
                        ?>
                    </div>

                </div>

                <div class="row mb-2">
                        <div class=" d-flex justify-content-between align-items-center">
                        <h6>Video Conference</h6>
                    </div>
                    <hr>
                    <div class="row mb-2">
                            

                    <?php 
                        $websites = (new ControllerWebsite)->ctrShowWebsites();
                        foreach($websites as $key => $value) {
                      
                            
                            $websiteCategory = $value['website_category'];
                            
                           if ($websiteCategory === 'Video Conference') {
                            
                                echo '
                                <div class="col-3 text-center">
                                    <div class="card">
                                        <img src="views/images/videocon.png" class="mx-auto d-block mt-3"  style="width:90px; height:90px;">
                                        <p style="font-size: 1.5em;"  class="mt-3" >'.$value['website_name'].'</p>
                                        <div class="card-body">
                                            <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top: -20px;">';

                                            if($value['bookmark'] == 0){
                                                echo'  <input class="form-check-input border-2 border-success dashNewVid" name="dashcur_websites" type="checkbox" value="'.$value['website_name'].'#'.$value['website_path'].'#'. $value['website_category'].'" group="dashwebsitesGroup" id="dashcur_websites" style="font-size: 2em;">';
                                            }else{
                                                echo' <input class="form-check-input border-2 border-success dashNewVid" name="dashcur_websites" type="checkbox" value="'.$value['website_name'].'#'.$value['website_path'].'#'. $value['website_category'].'" group="dashwebsitesGroup" id="dashcur_websites" style="font-size: 2em;" checked>';
                                            }
                                               
                                echo'
                                            </div>
                                        </div>
                                    </div>
                                </div>'
                                ;
                            }
                     
                            
                            
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn text-white" id="dashaddGroupBtn"  style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">Save</button>
        </div>
        </div>
    </div>
    </div>
</div>