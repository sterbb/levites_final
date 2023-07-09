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
                <div class="dropdown-menu dropdown-menu-end mt-lg-2">
                  <a href="javascript:;">
                    <div class="msg-header">
                      <p class="msg-header-title">Notifications</p>
                      <p class="msg-header-clear ms-auto">Marks all as read</p>
                    </div>
                  </a>
                  <div class="header-notifications-list" >
                    <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModalDefault">
                      <div class="d-flex align-items-center">
                        <div class="notify text-primary border">
                          <span class="material-symbols-outlined">
                          account_circle
                            </span>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="msg-name">Accounts <span class="msg-time float-end " > 2 min
                              ago</span></h6>
                          <p class="msg-info">Created a user with level access in...</p>
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
                          <h6 class="msg-name">Admin<span class="msg-time float-end">3 days
                              ago</span></h6>
                          <p class="msg-info">We are notifying you that you are having...</p>
                        </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="javascript:;">
                      <div class="d-flex align-items-center">
                        <div class="notify text-success border">
                          <span class="material-symbols-outlined">
                            event_available
                            </span>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="msg-name">Calendar of Activities<span class="msg-time float-end">2 weeks
                              ago</span></h6>
                          <p class="msg-info">Event added in "Instrument Workshop"..</p>
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
                          <h6 class="msg-name">Request<span class="msg-time float-end">1 month ago</span></h6>
                          <p class="msg-info">Accepted "Our Lady of the Miraculous...</p>
                        </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="javascript:;">
                      <div class="d-flex align-items-center">
                        <div class="notify text-warning border">
                          <span class="material-symbols-outlined">
                            hard_drive
                            </span>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="msg-name">File Storage<span class="msg-time float-end">2 month ago</span></h6>
                          <p class="msg-info">There are 500 MB left in your sto...</p>
                        </div>
                      </div>
                    </a>
                  </div>
                  <a href="javascript:;">
                    <div class="text-center msg-footer">View All</div>
                  </a>
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
                        <p class="mb-0 user-designation"><?php echo $_COOKIE["church_id"]?></p>
                      </div>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end">

                      <li><a class="dropdown-item" href="churchsettings"><span class="material-symbols-outlined me-2">
                        settings
                        </span><span>Church Account Settings</span></a>
                      </li>

                      <li><a class="dropdown-item" href="publicsettings"><span class="material-symbols-outlined me-2">
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