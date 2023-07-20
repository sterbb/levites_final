<!--start sidebar-->

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

  echo $_COOKIE['acc_type'];
}






?>
<aside class="sidebar-wrapper">
          <div class="sidebar-header">
            <div class="logo-icon">
              <img src="views/images/try.png" class="logo-img" alt="">
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
                <li class="admin" >
                  <a href="adminhomepage">
                    <div class="parent-icon"><span class="material-symbols-outlined">home</span>
                    </div>
                    <div class="menu-title hidden">Dashboard</div>
                  </a>
                </li>

                <li class="admin">
                  <a href="websiteorg">
                    <div class="parent-icon"><i class='bx bx-customize' ></i>
                    </div>
                    <div class="menu-title">Website Organizer</div>
                  </a>
                </li>
                
                <li class="admin calendar">
                  <a href="churchcalendar">
                    <div class="parent-icon"><span class="material-symbols-outlined">
                      calendar_add_on
                      </span> 
                    </div>
                    <div class="menu-title hidden">Calendar of Activities</div>
                  </a>
                </li>
                
                
                <li class="admin-public" >
                  <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><span class="material-symbols-outlined">
                    lyrics
                    </span>
                    </div>
                    <div class="menu-title hidden" >Songs and Lyrics</div>
                  </a>
                  <ul >
                    <li><a href="slhomepage" ><span class="material-symbols-outlined">arrow_right</span>Song and Lyrics Homepage</a></li>         
                    <li > <a href="songlist"><span class="material-symbols-outlined">arrow_right</span>Song List</a></li>
                    <li ><a href="lyrics"><span class="material-symbols-outlined">arrow_right</span>Lyrics</a></li> 
                  </ul>
                </li>

                <li class="admin-public storage">
                  <a href="filestorage">
                    <div class="parent-icon"><span class="material-symbols-outlined">
                     hard_drive
                      </span> 
                    </div>
                    <div class="menu-title hidden">File Storage</div>
                  </a>
                </li>

                <li class="admin request" >
                  <a href="requests ">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-comment-dots"></i>
                    </div>
                    <div class="menu-title hidden">Requests</div>
                  </a>
                </li>

                <li class="admin">
                  <a href="reportgen">
                    <div class="parent-icon"><i class="lni lni-graph"></i>
                    </div>
                    <div class="menu-title hidden">Reports</div>
                  </a>
                </li>


              

                <li class="churchadmin">
                  <a href="accounts">
                    <div class="parent-icon"><i class="lni lni-users"></i>
                    </div>
                    <div class="menu-title hidden">Accounts</div>
                  </a>
                </li>
              

                
                 

                <li class="public" >
                    <a href="javascript:;" class="has-arrow">
                      <div class="parent-icon"><span class="material-symbols-outlined">
                        public
                        </span>
                      </div>
                      <div class="menu-title ">Public Pages View</div>
                    </a>
                    <ul>
    
                      <li> <a href="publichomepage"><span class="material-symbols-outlined">arrow_right</span>Public Homepage</a>
                      </li>
                      <li> <a href="catdetails"><span class="material-symbols-outlined">arrow_right</span>Calendar Details</a>
                      </li>
                      
                    </ul>
                </li>

                <li class="superuser" >
                    <a href="javascript:;" class="has-arrow">
                      <div class="parent-icon"><span class="material-symbols-outlined">
                      hdr_auto
                      </span>
                      </div>
                      <div class="menu-title ">Super User View</div>
                    </a>
                    <ul>
                      <li> <a href="superuser"><span class="material-symbols-outlined">arrow_right</span>Church Verification</a>
                      </li>
                      
                    </ul>
                </li>
              
              </ul>
              <!--end navigation-->
           

          </div>

</aside>
