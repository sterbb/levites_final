<?php 

if(isset($_COOKIE["acc_type"])){
  if($_COOKIE["acc_type"]  == "admin"){
    echo"<style>.public{display:none !important;}</style>";
    echo"<style>.superuser{display:none !important;}</style>";
  }elseif($_COOKIE["acc_type"]  == "subuser"){
    echo"<style>.public{display:none !important;}</style>";
    echo"<style>.superuser{display:none !important;}</style>";
    echo"<style>.churchadmin{display:none !important;}</style>";

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

}

?>
<!--start header-->
<header class="top-header">
      <nav class="navbar navbar-expand justify-content-between">
          <div class="btn-toggle-menu">
            <span class="material-symbols-outlined">menu</span>
          </div>

            <ul class="navbar-nav top-right-menu gap-2">
           
              <li class="nav-item dark-mode">
                <button class="nav-link dark-mode-icon" id="theme-switcher"><span class="material-symbols-outlined">dark_mode</span></button>
              </li>
              <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                  <div class="position-relative">
                    <span class="notify-badge">3</span>
                    <span class="material-symbols-outlined">
                      notifications_none
                      </span>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end mt-lg-2" >
                  <a href="javascript:;">
                    <div class="msg-header">
                      <p class="msg-header-title">Notifications</p>
    
                    </div>
                  </a>
                  <div class="header-notifications-list overflow-x-hidden" id="notifications">

                    <a class="dropdown-item" href="requests">
                      <div class="d-flex align-items-center">
                        <div class="notify text-primary border">
                          <span class="material-symbols-outlined">
                          account_circle
                            </span>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="msg-name">Membership <span class="msg-time float-end " ></h6>

                            <?php 
                              $requests = (new CollaborationController)->ctrshowMembership(); 

                              $count = count($requests);

                              echo "<p class='msg-info'>You have ".$count." pending membership request.</p>";
                            ?>
                         
                        </div>
                      </div>
                    </a>

                    <a class="dropdown-item" href="requests">
                      <div class="d-flex align-items-center">
                        <div class="notify text-primary border">
                          <span class="material-symbols-outlined">
                          account_circle
                            </span>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="msg-name">Church Collaboration <span class="msg-time float-end " ></h6>

                            <?php 
                                   $requests = (new CollaborationController)->ctrshowRequests();

                              $count = count($requests);

                              echo "<p class='msg-info'>You have ".$count." pending membership request.</p>";
                            ?>
                         
                        </div>
                      </div>
                    </a>
                    
                    <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleDangerModal">
                      <div class="d-flex align-items-center">
                        <div class="notify text-danger border">
                          <span class="material-symbols-outlined">
                            report
                            </span>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="msg-name">Admin(TBD)></h6>
                          <p class="msg-info">We are notifying you that you are having...</p>
                        </div>
                      </div>
                    </a>
                    
                    <a class="dropdown-item" href="javascript:;">
                      <div class="d-flex align-items-center">
                        <div class="notify text-info border">
                          <span class="material-symbols-outlined">
                            approval_delegation
                            </span>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="msg-name">Request (TBD)</h6>
                          <p class="msg-info">Our Lady of the Miraculous accepted collaboration</p>
                        </div>
                      </div>
                    </a>

                    <a class="dropdown-item" href="filestorage" id="notificationFileStorage">
                      <div class="d-flex align-items-center">
                        <div class="notify text-warning border">
                          <span class="material-symbols-outlined">
                            hard_drive
                            </span>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="msg-name">File Storage</h6>
                          <p class="msg-info">There are 500 MB left in your sto...</p>
                        </div>
                      </div>
                    </a>

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
                        <h5 class="mb-0 user-name"><?php echo $_COOKIE["acc_name"]?></h5>
                        <p class="mb-0 user-designation"><?php echo ucfirst($_COOKIE["acc_type"])?></p>
                      </div>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end">

                      <li class="admin"><a class="dropdown-item" href="churchsettings"><span class="material-symbols-outlined me-2">
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
                  <div class="modal fade" id="exampleDangerModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog">
                      <div class="modal-content bg-danger">
                        <div class="modal-header">
                          <h5 class="modal-title text-white">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                          <p></p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
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
         <p>         Rest assured that you can plead to activate your account by contacting us. If you have any further questions or concerns, please contact us on jajajo@gmail.com</p>
        
      </div>
      <div class="modal-footer d-flex justify-content-center align-items-center">
        <div class="text-center d-flex justify-content-center align-items-center">
            <button type="submit" id="passwordLock"  class="btn btn-danger passwordLock ">close</button>
        </div>
    </div>
    </form>
    </div>
  </div>
</div>