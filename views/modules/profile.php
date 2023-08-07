

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
                    $churchid = $_COOKIE['church_id'];
                    // echo $churchid;
                    $profile = (new ControllerAdmin)->ctrShowChurchProfile($churchid);
                    
          
                    foreach($profile as $key => $value){


                      echo '<h3 class="mb-2">'.$value["church_name"].'</h3>
                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">'.$value["church_address"].'</span>
                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">'.$value["church_city"].'</span>
                      </div>
                        <div class="row">
                    <div class="col">
                    <input type="text" name="trans_type" id="church_id" church-name="'.$value["church_name"].'" value='.$value["churchID"].' name="church_id" style="display:none;" required>';

                    $membership = (new ControllerPublic)->ctrCheckMembership();
                      
                    if (isset($membership['membership_status'])) {
                      // if($membership['membership_status'] == 1){
                        echo'
                        <button class="btn btn-danger btn-hover rejectMembershipBtn">Cancel Membership</button>';
                      // }else{
                      //   echo'
                      //   <button class="btn btn-primary btn-hover askMembershipBtn">Ask Membership</button>';
                      // }
                    }else{
                      echo'
                      <button class="btn btn-primary btn-hover askMembershipBtn">Ask Membership</button>';
                    }
                 

      

                    echo'
                    </div>
                    </div>';
                   }
         
                    
              
      
                    
                    
                    ?>
              
  
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
                    $churchid = $_COOKIE['church_id'];
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
                    $churchid = $_COOKIE['church_id'];
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


            <style>
  /* Custom CSS to style the icons with different colors */
  .bi-facebook { color: #1877F2; }
  .bi-snapchat { color: #FFFC00; }
  .bi-instagram { color: #E4405F; }
  .bi-twitter { color: #1DA1F2; }
  .bi-tiktok { color: #000000; }
  .bi-youtube { color: #FF0000; }
  .bi-pinterest { color: #E60023; }
  .bi-whatsapp { color: #25D366; }
</style>

            <div class="card">
              <div class="card-body">
                <h5 class="mb-3">Social Media</h5>
                <ul class="list-group list-group-flush mb-0" style="overflow-y: scroll; height: 290px;">
                    <?php  $social = (new ControllerChurchSetting)->ctrShowSocialMedia();
                                foreach($social as $key => $value){

                                    $socialcategory = $value['socialmedia_category'];

                                        if ($socialcategory === 'Facebook') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-facebook"></i>                                                
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                              
                                                
                                            </li>';
                                        } elseif ($socialcategory === 'Snapchat') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-snapchat"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                              
                                            </li>';
                                        } elseif ($socialcategory === 'Instagram') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-instagram"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                              
                                            </li>';
                                        } elseif ($socialcategory === 'Twitter') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-twitter"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                               
                                            </li>';

                                        }elseif ($socialcategory === 'Tiktok') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-tiktok"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                              
                                            </li>';


                                        }elseif ($socialcategory === 'Youtube') {
                                                echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                    <i class="bi bi-youtube"></i>
                                                    <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                  
                                                </li>';

                                        }elseif ($socialcategory === 'Pinterest') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-pinterest"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                               
                                            </li>';

                                        } else {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-whatsapp"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:200px;">'.$value['socialmedia'].'</p></a>
                                              
                                            </li>';
                                        }
                                        
                                    }
                                ?>
                            </ul>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <h5 class="mb-3">Donation</h5>
             
                  
                <ul class="list-group list-group-flush mb-0" style="overflow-y: scroll; height: 265px;" >
                    <?php  $donation = (new ControllerChurchSetting)->ctrShowDonation();
                                foreach($donation as $key => $value){

                                    $websiteCategory = $value['donation_category'];

                                        if ($websiteCategory === 'GCash') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <img src="views/images/gcash.png" style="height:50px; width:100px;" alt="GCASH">
                                                <p class="pt-3" style="color:black;">'.$value["donation_number"].'</p> 
                                                
                                            </li>';
                                        } elseif ($websiteCategory === 'PNB') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <img src="views/images/pnb.png" style="height:25px; width:100px;" alt="PNB">
                                                <p class="pt-3" style="color:black;">'.$value["donation_number"].'</p> 
                                            </li>';
                                        } elseif ($websiteCategory === 'BDO') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <img src="views/images/bdo.png" style="height:25px; width:100px;" alt="BDO">
                                                <p class="pt-3" style="color:black;">'.$value["donation_number"].'</p> 
                                            </li>';
                                        } elseif ($websiteCategory === 'Metrobank') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <img src="views/images/metrobank.png" style="height:30px; width:100px;" alt="METROBANK">
                                                <p class="pt-3" style="color:black;">'.$value["donation_number"].'</p>
                                            </li>';
                                        } else {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <img src="views/images/bpi.png" style="height:30px; width:100px;" alt="BPI">
                                                <p class="pt-3" style="color:black;">'.$value["donation_number"].'</p> 
                                            </li>';
                                        }
                                        
                                    }
                                    
                            
                                    
                                    
                                    
                                    
                            

                                ?>

                        
    
                     </ul>
             
             

              </div>
            </div>

            
            <div class="card">
              <div class="card-body">
              <div class="mt-3">
                <div class="">
                  <div class="card shadow-none border radius-2">

                    <div >
                      <div class="card-body cursor-pointer" onclick="publicFolder(this)">
                        <div class="d-flex align-items-center">
                          <div class="font-30 text-primary"><i class="bx bxs-folder"></i>
                          </div>
                        </div>
                        <h6 class="mb-0 text-primary">Public folder</h6>
                    </div>

                  </div>   
                </div>

                </div>
                <div class="">

                <?php 

                  $member = (new ControllerPublic)->ctrCheckMembership();

                  if (isset($member['membership_status'])) {
                      // The 'membership_status' column exists and is not null
                      $status = $member['membership_status'];
                      if($status == 1){
                        echo '
                        <div class="card shadow-none border radius-15 cursor-pointer" onclick="memberFolder(this)">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="font-30 text-primary"><i class="bx bxs-folder"></i>
                            </div>
                          </div>
                          <h6 class="mb-0 text-primary">Members Folder</h6>
                        </div>
                      </div>';
                      };
                      // Your code here
                  } else {
                      // The 'membership_status' column is either not existing or null
                      // Handle the case when 'membership_status' is not found or is null
                  }


        
                
                ?>

                  
                </div>
              </div>
              </div>
            </div>

          </div>
        </div><!--end row-->

</main>