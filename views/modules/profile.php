

<?php 
require_once "././models/connection.php";

$db = new Connection();
$pdo = $db->connect();

$profID= $_COOKIE['church_id'];
$stmt = $pdo->prepare("SELECT Avatar, Back FROM churches WHERE churchID = :churchID");
$stmt->bindParam(':churchID', $profID, PDO::PARAM_STR);
$stmt->execute();
$profile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data

?>
<main class="page-content">
        <div class="row">
          <div class="col-12 col-lg-8 col-xl-9">
            <div class="card overflow-hidden">
            <img class="profile-cover  bg-dark position-relative mb-4" src="<?php echo "./views/UploadBack/".$profile['Back']?>"   style="background-image: url(views/images/default.png); background-size: cover ; background-repeat: no-repeat; height: 15rem;  background-position: center;">
                <div class="user-profile-avatar position-absolute  translate-middle-x " style="top: 150px;">
                <img src="<?php echo "./views/UploadAvatar/".$profile['Avatar']?>"  width="50" height="50" class="rounded-circle"  style="background-image: url(views/images/default.png); background-size: cover ; background-repeat: no-repeat;   background-position: center;">
                </div>
              </img>
              <div class="card-body">
                <div class="mt-5 d-flex align-items-start justify-content-between">
                  <div class="">
                        
                    <?php
                    $churchid = $_COOKIE['church_id'];
                    // echo $churchid;
                    $profile = (new ControllerAdmin)->ctrShowChurchProfile($churchid);
                    
          
                    foreach($profile as $key => $value){


                      echo '<h3 class="mb-2">'.$value["church_name"].'<sup> <button class=" m-0 p-0 rem_notif btn-primary-outline border-0 bg-transparent text-danger report_spefact" data-bs-toggle="modal" data-bs-target="#ReportModal"><span class="material-symbols-outlined">report</span></button> 
                      <input class="profile_churchAskMembership" type="text" id="church_id" church-name="'.$value["church_name"].'" church-city="'.$value["church_city"].'" church-province="'.$value["church_province"].'" value='.$value["churchID"].' name="church_id" style="display:none;" required>
                      </sup></h3>

                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$value["church_province"].', '.$value["church_city"].'</span>
                      <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$value["church_barangay"].', '.$value["church_street"].'</span>
                      <span class="badge bg-danger bg-danger-subtle text-danger border border-opacity-25 border-danger"><i class="bx bx-phone"> </i>    '.$value["church_num"].'</span>
                      <span class="badge bg-primary bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bx bx-envelope"> </i>    '.$value["church_email"].'</span>
                      <span class="badge bg-primary bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bx bx-church"> </i>    '.$value["religion"].'</span>

                      
                      </div>
                        <div class="row">
                    <div class="col">

                   ';

                    $membership = (new ControllerPublic)->ctrCheckMembership();
                      
                    if (isset($membership['membership_status']) && $membership['membership_status'] == 1) {
                      // if($membership['membership_status'] == 1){
                        echo'
                        <button class="btn btn-danger btn-hover removeMembershipBtn" value="'.$membership['mshipID'].'">Remove Membership</button>';
        
                    }else if (isset($membership['membership_status'])  && $membership['membership_status'] == 0   && $membership['canmship_status'] == 0) {
                      // && ( $membership['rejmship_status'] == 1   || $membership['canmship_status'] == 0) 
                      // if($membership['membership_status'] == 1){
                        echo'
                        <button class="btn btn-danger btn-hover cancelMembershipBtn" value="'.$membership['mshipID'].'">Cancel Request</button>';
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
              <div class="col pt-3 ">
                <div class="card pt-3">
                  <p class="text-center " style="font-size:25px;font-family: 'Montserrat', sans-serif; font-weight:700;">MISSION</p>
                  <div class="card-body">
                    <div><p class="text-center" style="font-size:15px;"><?php
                    $churchid = $_COOKIE['church_id'];
                    // echo $churchid;
                    $profile = (new ControllerAdmin)->ctrShowChurchProfile($churchid);
                    
                    if (empty($profile[0]["mission"])) {
                      echo '<div style="text-align: center; font-size: 24px; display: flex; justify-content: center; align-items: center;">No mission statement available.</div>';
                    } else {
                      foreach($profile as $key => $value){
                        echo ''.$value["mission"].'';
                      }
                    }
                    ?></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col pt-3 ">
                <div class="card pt-3">
                  <p class="text-center " style="font-size:25px;font-family: 'Montserrat', sans-serif; font-weight:700;">VISION</p>
                  <div class="card-body ">
                    <div><p class="text-center "style="font-size:15px;"><?php
                    $churchid = $_COOKIE['church_id'];
                    // echo $churchid;
                    $profile = (new ControllerAdmin)->ctrShowChurchProfile($churchid);
                    if (empty($profile[0]["vision"])) {
                      echo '<div style="text-align: center; font-size: 24px; display: flex; justify-content: center; align-items: center;">No vision statement available.</div>';
                    } else {
                      foreach($profile as $key => $value){
                        echo ''.$value["vision"].'';
                      }
                    }
                    ?></p>
                    </div>
                  </div>
                </div>
              
                
              </div>
                        
            </div>

            <div class="row">

              <div class="col-2">
                <div class="card">
                  <div class="card-body"  id="profile_filter_section">
                      <h6 class="pb-3">Calendar Filters</h6>
                      <div class="form-check form-switch">
                          <input class="form-check-input calendar-filter2" type="checkbox" id="Bible Study" checked style="background-color: #6CAE75; border: 2px solid #6CAE75;">
                          <label class="form-check-label" for="flexSwitchCheckChecked">Bible Study</label>
                      </div>
                      <div class="form-check form-switch">
                          <input class="form-check-input calendar-filter2" type="checkbox" id="Outreach" checked style="background-color: #5285C5; border: 2px solid #5285C5;">
                          <label class="form-check-label" for="flexSwitchCheckChecked">Outreach</label>
                      </div>
                      <div class="form-check form-switch">
                          <input class="form-check-input calendar-filter2" type="checkbox" id="Workshop" checked style="background-color: #F9A646; border: 2px solid #F9A646;"> 
                          <label class="form-check-label" for="flexSwitchCheckChecked">Workshop</label>
                      </div>
                      <div class="form-check form-switch">
                          <input class="form-check-input calendar-filter2" type="checkbox" id="Sunday Worship" checked style="background-color: #A17EBF; border: 2px solid #A17EBF;">
                          <label class="form-check-label" for="flexSwitchCheckChecked">Sunday Worship</label>
                      </div>
                      <div class="form-check form-switch">
                          <input class="form-check-input calendar-filter2" type="checkbox" id="Prayer Meeting" checked style="background-color: #FF7F50; border: 2px solid #FF7F50;">
                          <label class="form-check-label" for="flexSwitchCheckChecked">Prayer Meeting</label>
                      </div>
                      <div class="form-check form-switch">
                          <input class="form-check-input calendar-filter2" type="checkbox" id="Baptismal" checked style="background-color: #4FA1D8; border: 2px solid #4FA1D8;">
                          <label class="form-check-label" for="flexSwitchCheckChecked">Baptismal</label>
                      </div>
                      <div class="form-check form-switch">
                          <input class="form-check-input calendar-filter2" type="checkbox" id="Wedding" checked style="background-color: #D55C88; border: 2px solid #D55C88;">
                          <label class="form-check-label" for="flexSwitchCheckChecked">Wedding</label>
                      </div>

                      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

                                $('#profile_filter_section').append('<div class="form-check form-switch"><input class="form-check-input calendar-filter2" type="checkbox" id="'+ type.type_name+'" checked style="background-color: '+current_color+'; border: 2px solid '+current_color+';"><label class="form-check-label" for="flexSwitchCheckChecked">'+type.type_name+'</label></div>');

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

               <div class="col-10">
                    <div class="card">
                     
                          <div class="card-body">
                            <div class="table-responsive">
                              <div id='calendar2' class="calendar2"></div>
                            </div>
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
                    <?php  
                        $social = (new ControllerChurchSetting)->ctrShowSocialMedia();

                          if (empty($social)) {
                            echo '<div style="text-align: center; font-size: 24px; display: flex; justify-content: center; align-items: center; height: 100vh;">No social media links available.</div>';
                          } else {
                              foreach ($social as $key => $value) {
                                  $socialcategory = $value['socialmedia_category'];
                                  echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                      <i class="bi ';
                                      
                                  // Determine the appropriate icon class based on the social category
                                  switch ($socialcategory) {
                                      case 'Facebook':
                                          echo 'bi-facebook';
                                          break;
                                      case 'Snapchat':
                                          echo 'bi-snapchat';
                                          break;
                                      case 'Instagram':
                                          echo 'bi-instagram';
                                          break;
                                      case 'Twitter':
                                          echo 'bi-twitter';
                                          break;
                                      case 'Tiktok':
                                          echo 'bi-tiktok';
                                          break;
                                      case 'Youtube':
                                          echo 'bi-youtube';
                                          break;
                                      case 'Pinterest':
                                          echo 'bi-pinterest';
                                          break;
                                      default:
                                          echo 'bi-whatsapp';
                                  }
                                  
                                  echo '"></i>
                                      <a href="'.$value['socialmedia'].'" target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
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
                            if (empty($donation)) {
                              echo '<div style="text-align: center; font-size: 24px; display: flex; justify-content: center; align-items: center; height: 100vh;">No donation methods available.</div>';
                            } else {
                              foreach ($donation as $key => $value) {
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