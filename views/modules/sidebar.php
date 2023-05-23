<!--start sidebar-->

<?php
$account_type = "admin";
?>
<aside class="sidebar-wrapper">
          <div class="sidebar-header">
            <div class="logo-icon">
              <img src="views/images/logo.png" class="logo-img" alt="">
            </div>
            <div class="logo-name flex-grow-1">
              <h5 class="mb-0 cursor-pointer">Levites</h5>
            </div>
            <div class="sidebar-close ">
              <span class="material-symbols-outlined">close</span>
            </div>
          </div>
          <div class="sidebar-nav" data-simplebar="true">
            
              <!--navigation-->
              <ul class="metismenu" id="menu">
                <li>
                  <a href="adminhomepage">
                    <div class="parent-icon"><span class="material-symbols-outlined">home</span>
                    </div>
                    <div class="menu-title">Dashboard</div>
                  </a>
                </li>

                <li>
                  <a href="adminhomepage">
                    <div class="parent-icon"><span class="material-symbols-outlined">home</span>
                    </div>
                    <div class="menu-title">Application Organizer</div>
                  </a>
                </li>


                <li>
                  <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><span class="material-symbols-outlined">
                    calendar_add_on
                    </span>
                    </div>
                    <div class="menu-title">Calendar of Activities</div>
                  </a>
                  <ul>
                    <li> <a href="churchcalendar"><span class="material-symbols-outlined">arrow_right</span>Calendar View</a>
                    </li>
                  </ul>
                </li>
                
                
                <li>
                  <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">
                    lyrics
                    </span>
                    </div>
                    <div class="menu-title">Songs and Lyrics</div>
                  </a>
                  <ul>
                  <li><a href="slhomepage" ><span class="material-symbols-outlined">arrow_right</span>Song and Lyrics Homepage</a></li>       
                    <li><a class="has-arrow" href="javascript:;"><span class="material-symbols-outlined">arrow_right</span>Song Pages</a>
                      <ul>
                      <li> <a href="songlist"><span class="material-symbols-outlined">arrow_right</span>Song List</a></li>
                        <li><a href="lyrics"><span class="material-symbols-outlined">arrow_right</span>Lyrics</a></li> 
                      </ul>
                    </li>
                  </ul>
                </li>

                <li>
                  <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">
                    hard_drive
                    </span>
                    </div>
                    <div class="menu-title">File Storage</div>
                  </a>
                  <ul>
                    <li> <a href="filestorage"><span class="material-symbols-outlined">arrow_right</span>File Storage View</a>
                    </li>
                  </ul>
                </li>


                <li>
                  <a href="accounts">
                    <div class="parent-icon"><i class="lni lni-users"></i>
                    </div>
                    <div class="menu-title">Accounts</div>
                  </a>
                </li>

                <li>
                  <a href="requests ">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-comment-dots"></i>
                    </div>
                    <div class="menu-title">Requests</div>
                  </a>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                      <div class="parent-icon"><span class="material-symbols-outlined">rate_review</span>
                      </div>
                      <div class="menu-title">Reports</div>
                    </a>
                    <ul>
                      <li> <a href="reportgen"><span class="material-symbols-outlined">arrow_right</span>Report View</a>
                      </li>
                    </ul>
                </li>

                <li class="menu-label">Others </li>
                
                 

                <li>
                    <a href="javascript:;" class="has-arrow">
                      <div class="parent-icon"><span class="material-symbols-outlined">
                        public
                        </span>
                      </div>
                      <div class="menu-title">Public Pages View</div>
                    </a>
                    <ul>
                      <li> <a href="publichomepage"><span class="material-symbols-outlined">arrow_right</span>Public Homepage</a>
                      </li>
                      <li> <a href="churchpage"><span class="material-symbols-outlined">arrow_right</span>Church Calendar</a>
                      </li>
                      <li> <a href="profile"><span class="material-symbols-outlined">arrow_right</span>Church Details 2</a>
                      </li>
                      <li> <a href="catdetails"><span class="material-symbols-outlined">arrow_right</span>Calendar Details</a>
                      </li>
                      
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                      <div class="parent-icon"><span class="material-symbols-outlined">
                      hdr_auto
                      </span>
                      </div>
                      <div class="menu-title">Super User View</div>
                    </a>
                    <ul>
                      <li> <a href="superuser"><span class="material-symbols-outlined">arrow_right</span>Church Verification</a>
                      </li>
                    </ul>
                </li>
                

                <li>
                    <a href="javascript:;" class="has-arrow">
                      <div class="parent-icon"><span class="material-symbols-outlined">
                      hdr_auto
                      </span>
                      </div>
                      <div class="menu-title">Account Settings</div>
                    </a>
                    <ul>
                      <li> <a href="publicsettings"><span class="material-symbols-outlined">arrow_right</span>My Account</a>
                      </li>
                    </ul>
                </li>
                

                

              
              </ul>
              <!--end navigation-->
           

          </div>
          <div class="sidebar-bottom dropdown dropup-center dropup">
              <div class="dropdown-toggle d-flex align-items-center px-3 gap-3 w-100 h-100" data-bs-toggle="dropdown">
                <div class="user-img">
                   <img src="views/assets/images/avatars/03.png" alt="">
                </div>
                <div class="user-info">
                  <h5 class="mb-0 user-name">Jhon Maxwell</h5>
                  <p class="mb-0 user-designation">UI Engineer</p>
                </div>
              </div>
              <ul class="dropdown-menu dropdown-menu-end">

                <li><a class="dropdown-item" href="login"><span class="material-symbols-outlined me-2">
                  logout
                  </span><span>Account Settings</span></a>
                </li>
               
                <li><a class="dropdown-item" href="login"><span class="material-symbols-outlined me-2">
                  logout
                  </span><span>Logout</span></a>
                </li>
              </ul>
          </div>
     </aside>
     <!--end sidebar-->z
