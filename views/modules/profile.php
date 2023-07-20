

<main class="page-content">
        <div class="row">
          <div class="col-12 col-lg-8 col-xl-9">
            <div class="card overflow-hidden">
              <div class="profile-cover bg-dark position-relative mb-4">
                <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">
                  <img src="views/images/ch1.jpg" alt="...">
                </div>
              </div>
              <div class="card-body">
                <div class="mt-5 d-flex align-items-start justify-content-between">
                  <div class="">
                        
                    <?php
                    $churchid = $_COOKIE['profileID'];
                    // echo $churchid;
                    $profile = (new ControllerAdmin)->ctrShowChurchProfile($churchid);
                
                    foreach($profile as $key => $value){


                      echo '<h3 class="mb-2">'.$value["church_name"].'</h3>
                      <p class="mb-1">'.$value["church_address"].'</p>
                      <p>'.$value["church_city"].'</p>
                      </div>
                        <div class="row">
                    <div class="col">
                    <input type="text" name="trans_type" id="church_id" church-name="'.$value["church_name"].'" value='.$value["churchID"].' name="church_id" style="display:none;" required>
                    <button class="btn btn-primary btn-hover askMembershipBtn">Ask Membership</button>
                    </div>
                  </div>';
                   }
         
                    
              
      
                    
                    
                    ?>
              
                  
                  <!-- <script>
                    function changeButtonText(button) {
                      if (button.innerText === "Ask Membership") {
                        button.innerText = "Cancel Membership";
                        button.classList.add("btn-danger");
                      } else {
                        button.innerText = "Ask Membership";
                        button.classList.remove("btn-danger");
                      }
                    }
                  </script> -->
                </div>
              </div>
            </div>

                
            <!-- Mission and Vision -->
            <div class="row mb-3">
              <div class="col pt-3 mx-3 me-3">
                <div class="card pt-3">
                  <p class="text-center " style="font-size:25px;font-family: 'Montserrat', sans-serif; font-weight:700;">MISSION</p>
                  <div class="card-body">
                    <div><p class="text-center" style="font-size:15px;"><?php
                    $churchid = $_COOKIE['profileID'];
                    // echo $churchid;
                    $profile = (new ControllerAdmin)->ctrShowChurchProfile($churchid);
                
                    foreach($profile as $key => $value){


                      echo ''.$value["mission"].'';
                   }
                    ?></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col pt-3 mx-3">
                <div class="card pt-3">
                  <p class="text-center " style="font-size:25px;font-family: 'Montserrat', sans-serif; font-weight:700;">VISION</p>
                  <div class="card-body ">
                    <div><p class="text-center "style="font-size:15px;"><?php
                    $churchid = $_COOKIE['profileID'];
                    // echo $churchid;
                    $profile = (new ControllerAdmin)->ctrShowChurchProfile($churchid);
                
                    foreach($profile as $key => $value){


                      echo ''.$value["vision"].'';
                   }
                    ?></p>
                    </div>
                  </div>
                </div>
              
                
              </div>
                        
            </div>

            <div class="card">
              <div class="card-body">
                  <h5 class="mb-2">Calendar of Activities</h5>
                </div>
                <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<div id='calendar2' class="calendar2"></div>
						</div>
					</div>
				</div>
              </div>
            </div>
            
          <div class="col-12 col-lg-4 col-xl-3">
            <div class="card">
              <div class="card-body">
                <h5 class="mb-3">Location</h5>
                  <div id="profile-map" class="gmaps"></div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <h5 class="mb-3">Social Media</h5>
                <a href="   https://www.facebook.com/ollpBata"><p class=""><i class="bi bi-facebook me-2"></i>facebook.com/ollpBata</p></a>
             
                 <p class=""><i class="bi bi-twitter me-2"></i>Twitter</p>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <h5 class="mb-3"><?php
                    $churchid = $_COOKIE['profileID'];
                    // echo $churchid;
                    $profile = (new ControllerAdmin)->ctrShowChurchProfile($churchid);
                
                    foreach($profile as $key => $value){


                      echo ''.$value["donation"].'';
                   }
                    ?></h5>

                <div class="row">
                  <div class="col d-flex align-items-end justify-content-start">
                    <img src="views/images/gcash2.png" alt="GCash" style="height:50px; width:100px; "> 
                  </div>
                  <div class="col d-flex align-items-center justify-content-end">
                    <p class="text-black mb-0" style="font-size:16px;font-family: 'Montserrat', sans-serif; font-weight:600;">09772535688</p>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col d-flex align-items-center justify-content-start">
                    <img src="views/images/pnb.png" alt="pnb" style="height:30px; width: 80px; "> 
                  </div>
                  <div class="col d-flex align-items-end justify-content-end">
                    <p class="text-black mb-0" style="font-size:16px;font-family: 'Montserrat', sans-serif; font-weight:600;">3079 1003 0797</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col d-flex align-items-center justify-content-start">
                    <img src="views/images/bdo.png" alt="pnb" style="height:30px; width: 80px; "> 
                  </div>
                  <div class="col d-flex align-items-end justify-content-end">
                    <p class="text-black mb-0" style="font-size:16px;font-family: 'Montserrat', sans-serif; font-weight:600;">00-3350-0373-69</p>
                  </div>
                </div>
             
             
             

              </div>
            </div>

            
            <div class="card">
              <div class="card-body">
              <div class="mt-3">
                <div class="">
                  <div class="card shadow-none border radius-2">
                    <a href="filestorage">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="font-30 text-primary"><i class="bx bxs-folder"></i>
                          </div>
                          
                        </div>
                        <h6 class="mb-0 text-primary">Public folder</h6>
                        <small>345 files</small>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="">
                  <div class="card shadow-none border radius-15">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="font-30 text-primary"><i class="bx bxs-folder"></i>
                        </div>
                        
                      </div>
                      <h6 class="mb-0 text-primary">Member folder</h6>
                      <small>143 files</small>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>

          </div>
        </div><!--end row-->

</main>