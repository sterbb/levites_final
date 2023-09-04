<?php 

if(isset($_COOKIE["acc_type"])){
  if($_COOKIE["acc_type"]  == "admin"){
    echo"<style>.public{display:none !important;}</style>";
    echo"<style>.superuser{display:none !important;}</style>";
  }elseif($_COOKIE["acc_type"]  == "subuser"){
    echo"<style>.public{display:none !important;}</style>";
    echo"<style>.superuser{display:none !important;}</style>";
    echo"<style>.churchadmin{display:none !important;}</style>";
    echo"<style>.admin_settings{display:none !important;}</style>";
    

    $acc_res = $_COOKIE['acc_restriction'];

    if(strpos($acc_res, 'C') === false){
      echo"<style>.calendar{display:none !important;}</style>";
    }
    if(strpos($acc_res, 'S') === false){
      echo"<style>.storage{display:none !important;}</style>";
    }
    if(strpos($acc_res, 'R') === false  ){
      echo"<style>.request{display:none !important;}</style>";
    }

  }elseif($_COOKIE["acc_type"] == "superuser"){
    echo"<style>.admin{display:none !important;}</style>";
    echo"<style>.public{display:none !important;}</style>";
    echo"<style>.churchadmin{display:none !important;}</style>";
    echo"<style>.admin-public{display:none !important;}</style>";
  }elseif($_COOKIE["acc_type"]  == "public"){
    echo"<style>.admin{display:none !important;}</style>";
    echo"<style>.superuser{display:none !important;}</style>";
    echo"<style>.churchadmin{display:none !important;}</style>";
  }
  elseif($_COOKIE["acc_type"]  == "publicSub"){
  
    echo"<style>.superuser{display:none !important;}</style>";
    echo"<style>.churchadmin{display:none !important;}</style>";
    echo"<style>.admin_settings{display:none !important;}</style>";
    

    $acc_res = $_COOKIE['acc_restriction'];

    if(strpos($acc_res, 'C') === false){
      echo"<style>.calendar{display:none !important;}</style>";
    }
    if(strpos($acc_res, 'S') === false){
      echo"<style>.storage{display:none !important;}</style>";
    }
    if(strpos($acc_res, 'R') === false  ){
      echo"<style>.request{display:none !important;}</style>";
    }

  }

}

//publicSub kulang 

?>
<!--start header-->
<header class="top-header">
      <nav class="navbar navbar-expand justify-content-between">
          <div class="btn-toggle-menu">
            <span class="material-symbols-outlined">menu</span>
          </div>

            <ul class="navbar-nav top-right-menu gap-2">

             <li class="nav-item">
                <button class="nav-link" data-bs-toggle="modal" data-bs-target="#ReportModal"><span class="material-symbols-outlined">warning</span></button>
              </li>
           
              <li class="nav-item dark-mode">
                <button class="nav-link dark-mode-icon" id="theme-switcher"><span class="material-symbols-outlined">dark_mode</span></button>
              </li>

              <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret notification-btn"  data-bs-toggle="dropdown">
                  <div class="position-relative">
                    <span class="notify-badge">
                      <?php
                        if($_COOKIE["acc_type"]  == "public"){
                          $notif = (new ControllerNotifications)->ctrGetCollaborationNotifPUblic();
                        }else{
                          $notif = (new ControllerNotifications)->ctrGetCollaborationNotif();
                        }

                        $count = 0;
                        foreach($notif as $key => $value){
                          if($value['notification_status'] == 0){
                            $count++;
                          }
                        }
                  
                        echo $count;
                      ?>
                  </span>
                    <span class="material-symbols-outlined">
                      notifications_none
                      </span>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end mt-2" >
                  <a href="javascript:;">
                    <div class="msg-header">
                      <p class="msg-header-title">Notifications</p>
    
                    </div>
                  </a>
                  <div class="header-notifications-list overflow-x-hidden" id="notifications">

                    <a class="dropdown-item admin" href="requests">
                      <div class="d-flex align-items-center">
                        <div class="notify text-primary border">
                          <span class="material-symbols-outlined">
                          account_circle
                            </span>
                        </div>
                        <div class="flex-grow-1">
                        

                            <?php 
                                if($_COOKIE["acc_type"]  != "public" && $_COOKIE["acc_type"]  != "superuser"){
    
                                  $requests = (new CollaborationController)->ctrshowMembership(); 

                                  $count = count($requests);

                                  if($count == 0){
                                    echo '<h6 class="msg-name">Membership <span class="msg-time float-end"></h6>';
                                  }else{
                                    echo '<h6 class="msg-name">Membership <sup style="display: inline-block; width: 5px; height: 5px; border-radius: 50%; background-color: blue; text-align: center; line-height: 20px; color: white;">
                                    </sup><span class="msg-time float-end " ></h6>';
                            
                                  }

                                  echo "<p class='msg-info'>You have ".$count." pending membership request.</p>";
                                }
                            ?>
                         
                        </div>
                      </div>
                    </a>

                    <a class="dropdown-item admin" href="requests">
                      <div class="d-flex align-items-center">
                        <div class="notify text-primary border">
                          <span class="material-symbols-outlined">
                          account_circle
                            </span>
                        </div>
                        <div class="flex-grow-1">
                        
                            <?php 
                              if($_COOKIE["acc_type"]  != "public" && $_COOKIE["acc_type"]  != "superuser"){
                                $requests = (new CollaborationController)->ctrshowRequests();

                                $count = count($requests);

                                if($count == 0){
                                    echo '<h6 class="msg-name">Church Collaboration <span class="msg-time float-end"></h6>';
                                }else{
                                  echo '<h6 class="msg-name">Church Collaboration <sup style="display: inline-block; width: 5px; height: 5px; border-radius: 50%; background-color: blue; text-align: center; line-height: 20px; color: white;">
                                  </sup><span class="msg-time float-end"></h6>';
                                }
                                
                                echo "<p class='msg-info'>You have ".$count." pending membership request.</p>";
                              }
                            ?>
                         
                        </div>
                      </div>
                    </a>

                    <div id="notifications-storage"></div>
                    
             
                
                    <?php 
                    if($_COOKIE["acc_type"]  == "public"){
                      $notif = (new ControllerNotifications)->ctrGetCollaborationNotifPUblic();
                    }else{
                      $notif = (new ControllerNotifications)->ctrGetCollaborationNotif();
                    }
             
                    foreach($notif as $key => $value){

                      if($value['notification_type'] == "Rejected"){
                        if(str_contains($value['notification_title'], 'Request') || str_contains($value['notification_title'], 'Church')){
                          echo'<a class="dropdown-item" href="requests">';
                        }else if(str_contains($value['notification_title'], 'Membership')){
                          echo'<a class="dropdown-item" href="membership">';
                        }
                        echo '
                          <div class="d-flex align-items-center" >
                          <div class="notify text-danger border">
                          <span class="material-symbols-outlined">
                          do_not_disturb_on
                          </span>
                          </div>
                          <div class="flex-grow-1" >';
                          if($value['notification_status'] == 0){
                            echo'
                                  <h6 class="msg-name">'.$value['notification_title'].' <sup style="display: inline-block; width: 5px; height: 5px; border-radius: 50%; background-color: blue; text-align: center; line-height: 20px; color: white;">
                                  </sup></h6>
                                  <p class="msg-info">'.$value['notification_text'].'</p>
                                </div>
                              </div>
                            </a>
                            ';
                          }else{
                            echo'
                                  <h6 class="msg-name">'.$value['notification_title'].'</h6>
                                  <p class="msg-info">'.$value['notification_text'].'</p>
                                </div>
                              </div>
                            </a>
                            ';
                          }
                       
                      }else if ($value['notification_type'] == "Accepted"){
                        echo '         <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center">
                          <div class="notify text-success border">
                          <span class="material-symbols-outlined">
                          check_circle
                          </span>
                          </div>
                          <div class="flex-grow-1">';
                          if($value['notification_status'] == 0){
                            echo'
                                  <h6 class="msg-name">'.$value['notification_title'].' <sup style="display: inline-block; width: 5px; height: 5px; border-radius: 50%; background-color: blue; text-align: center; line-height: 20px; color: white;">
                                  </sup></h6>
                                  <p class="msg-info">'.$value['notification_text'].'</p>
                                </div>
                              </div>
                            </a>
                            ';
                          }else{
                            echo'
                                  <h6 class="msg-name">'.$value['notification_title'].'</h6>
                                  <p class="msg-info">'.$value['notification_text'].'</p>
                                </div>
                              </div>
                            </a>
                            ';
                          }
                      }else{
                        echo 'hehe';
                      }

                    }
                    
                    ?>

          

                  </div>

                </div>
              </li>
              <li class="nav-item dropdown ">
                <div class="dropdown dropdown-center dropdown navbar-upperright">
                    <div class="dropdown-toggle d-flex align-items-center px-3 gap-3" data-bs-toggle="dropdown">
                      <div class="user-img">
                        <img src="views/images/ch3.3.png" alt="">
                      </div>
                      <div class="user-info">
                        <h5 class="mb-0 user-name"><?php
                          if($_COOKIE['acc_type'] == "superuser" ){
                            echo "Levites";
                          }else{
                            echo $_COOKIE["acc_name"];
                          }
                          ?>
                         
                        </h5>
                        <?php
                        if($_COOKIE['acc_type'] == "admin" || $_COOKIE['acc_type'] == "subuser" ||$_COOKIE['acc_type'] == "publicSub" ){
                            echo '<p class="mb-0 user-designation">'.$_COOKIE['church_name'] .' - '. ucfirst($_COOKIE["acc_type"]).'</p>';
                        }else{
                          echo '<p class="mb-0 user-designation">'.ucfirst($_COOKIE["acc_type"]).'</p>';
                        }
                        ?>
                
                      </div>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end">

                      <li class="admin admin_settings"><a class="dropdown-item" href="churchsettings"><span class="material-symbols-outlined me-2">
                        settings
                        </span><span>Church Account Settings</span></a>
                      </li>

                      <li class="public"><a class="dropdown-item" href="publicsettings"><span class="material-symbols-outlined me-2">
                        settings
                        </span><span>Public Account Settings</span></a>
                      </li>

                      
                    
                      <li><a class="dropdown-item" href="login"><span class="material-symbols-outlined me-2">
                        logout
                        </span><span>Logout</span></a>
                      </li>
                    </ul>
                </div>

              </li>
           
            </ul>


            
       </nav>

     </header>
     <!--end header-->  

<!-- Modal -->
<div class="modal fade" id="exampleModalDefault" tabindex="-1">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Accounts</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">We are notifying that you created a user with access in file storage. The username is JayCobb and password is ******534. to modify your sub-user credentials, kindly go to your accounts in the sidebar menu. Thank you!</div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade " id="ReportModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content ">
      
      <div class="modal-header">
        <h5 class="modal-title">Report Submission</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-5">
            <label for="reportSubmissionType" class="form-label fw-bold" >Report Type</label>
            <select class="form-select border-3" id="reportSubmissionType" aria-label="Default select example">
            <option value="" disabled selected hidden></option>
            <optgroup label="User Feedback">
              <option value="Feedback">Feedback</option>
              <option value="Bug Report">Bug Report</option>
            </optgroup>
            <!-- <option value="" disabled></option> -->
   

            <optgroup label="Violations">
              <option value="Inappropriate Content">Inappropriate Content</option>
              <option value="Offensive Language">Offensive Language</option>
              <option value="Hate Speech">Hate Speech</option>
          </optgroup>
            </select>
          </div>
          <div class="col-7">
            <label for="Collection" class="form-label fw-bold">Subject</label>
            <input type="text" class="form-control" id="reportSubmissionSubject" placeholder="">
          </div>
        </div>
        <div class="row p-3">
          <label for="Collection" class="form-label fw-bold">Description</label>
          <textarea class="form-control py-2" id="reportSubmissionDescription" rows="3" style="height: 124px;"></textarea>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" id="reportSubmissionBtn" class="btn btn-light">Submit</button>
      </div>
    </div>
  </div>
</div>

                  <!-- Modal -->
<div class="modal fade" id="lockScreen" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form role="form" id="lockscreen-form" method="POST" autocomplete="nope" class="lockscreenForm"> 
      <div class="modal-body">
        <div class="text-center">
        <i class="bx bx-lock-alt" style="font-size:80px;"></i>
         <p class="">YOUR ACCOUNT HAS BEEN DEACTIVATED!</p>
         </div>
         <p>  We have noticed that there are some reports(explicit content at file storage) on your account . Your account will be private for the moment as we analyze your issue.
         </p>
         <p>Rest assured that you can plead to activate your account by contacting us. If you have any further questions or concerns, please contact us on levites@gmail.com</p>
        
      </div>
    </form>
    </div>
  </div>
</div>