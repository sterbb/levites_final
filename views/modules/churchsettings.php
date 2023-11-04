<main class="page-content"> 
<?php 
require_once "././models/connection.php";
require_once "././models/upload.php";

$db = new Connection();
$pdo = $db->connect();
$churchid = $_COOKIE['church_id'];
// Fetch the current avatar file name from the database
$stmt = $pdo->prepare("SELECT Avatar, Back FROM churches WHERE churchID = :churchID");
$stmt->bindParam(':churchID', $churchid, PDO::PARAM_STR);
$stmt->execute();
$profile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data




?>


<form method="POST" id="form" enctype="multipart/form-data">
    <div class="card overflow-hidden">

   
        <img class="position-relative mb-4 border-bottom"  src="<?php echo "./views/UploadBack/".$profile['Back']?>" id="userBackground" name="userBackFile" style="background-image: url(views/images/default.png); background-size: cover ; background-repeat: no-repeat; height: 15rem;  background-position: center;">
        <input type="file" id="userBack" name="userBack" class="position-absolute" style="top: 220; right: 140px; opacity: 0;" >
        <label for="userBack" class="position-absolute btn btn-secondary rounded-circle" style="top: 220px; right: 140px; font-size: 18px;">
            <i class="fadeIn animated bx bx-upload"></i>
        </label>
        
        <div class="user-profile-avatar  position-absolute translate-middle-x "  style="top: 120px; ">
            <img id="userProfileImage" src="<?php echo "./views/UploadAvatar/".$profile['Avatar']?>" style="background-image: url(views/images/default.png); background-size: cover ; background-repeat: no-repeat;   background-position: center;"  >
        </div>
            
        <input type="file" id="userAvatar" name="userAvatar" class="position-absolute" style="top: 220px; left: 140px; opacity: 0;" >
        <label for="userAvatar" class="position-absolute btn btn-secondary rounded-circle" style="top: 220px; left: 140px; font-size: 18px;">
            <i class="fadeIn animated bx bx-upload"></i>
        </label>

      
        </img>
        




 <!-- <script>
    // Get the file input elements
    const userBack = document.getElementById('userBack');
    const userAvatar = document.getElementById('userAvatar');

    // Handle file upload for background image
    userBack.addEventListener('change', function (event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function (e) {
            const backgroundImage = document.getElementByName('userBackFile');
            backgroundImage.style.backgroundImage = `url(${e.target.result})`;
        }
        reader.readAsDataURL(file);
    });

    // Handle file upload for user profile image
    userAvatar.addEventListener('change', function (event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function (e) {
            const userProfileImage = document.getElementById('userProfileImage');
            userProfileImage.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }); 

</script>  -->




    <div class="card-body">
    <div class="d-flex align-items-start justify-content-between">
        <div class="">
            
        <h2 class="mb-2"><?php   $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
             foreach($admin as $key => $value){
                echo $value['church_name'];
             }
        ?></h2>
            <div class="">

                        <?php   $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                        foreach($admin as $key => $value){
                            echo '
                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$value["church_province"].', '.$value["church_city"].'</span>
                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$value["church_barangay"].', '.$value["church_street"].'</span>
                            <span class="badge bg-danger bg-danger-subtle text-danger border border-opacity-25 border-danger"><i class="bx bx-phone"> </i>    '.$value["church_num"].'</span>
                            <span class="badge bg-primary bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bx bx-envelope"> </i>    '.$value["church_email"].'</span>

                            ';
                        }
                    ?>
              
            </div>
        </div>
            <div class="row">
                <div class="position-end">
                    <div class="d-inline-block">
                        <input type="submit" class="btn btn-outline-primary mt-1" value="Save Profile" style="display: none;" id="SaveAdminProfile">
                    </div>
                    <a href="javascript:;" class="btn btn-outline-danger"><i class="bi bi-person-x"></i>Deactivate Account</a>
                </div>
            </div>

        </div>  
    </div>
</div>
</form>


   


    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-body p-4">
                    <form id="updateChurch" method="POST">
                        <div class="row mb-3">
                            <label for="NewChurch_name" class="col-sm-3 col-form-label">Church Name *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="NewChurch_name" value="<?php $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                foreach($admin as $key => $value){
                                    echo $value['church_name'];
                                    
                                    
                                }
                                ?>" placeholder="Enter Your Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contact" class="col-sm-3 col-form-label">Contact Details *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="contact" name="phone" placeholder="Phone No" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['acc_contact'];
                                }
                                ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fname" class="col-sm-3 col-form-label">First Name *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['fname'];
                                }
                                ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="lname" class="col-sm-3 col-form-label">Last Name *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['lname'];
                                }
                                ?>">
                            </div>
                        </div>
                        <div class="row mb-3">

                        <label for="designation" class="col-sm-3 col-form-label">Designation *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['designation'];
                                }
                                ?>">
                            </div>
                        </div>

                     
                        <div class="row mb-3">
                            <label for="email" class="col-sm-3 col-form-label">Email Address *</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                foreach($admin as $key => $value){
                                    echo $value['church_email'];
                                }
                                ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="church_num" class="col-sm-3 col-form-label">Church Number *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="church_num" name="church_num" placeholder="Church Number" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                foreach($admin as $key => $value){
                                    echo $value['church_num'];
                                }
                                ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-sm-3 col-form-label">Username *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['acc_username'];
                                }
                                ?>" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-sm-3 col-form-label"> Password *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Choose Password" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['acc_password'];
                                }
                                ?>" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="conpassword" class="col-sm-3 col-form-label">Confirm Password *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="conpassword" name="confirm_password" placeholder="Confirm Password" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['acc_password'];
                                }
                                ?>" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputReligion" class="col-sm-3 col-form-label">Religion <sup style="color:red;">*</sup></label>
                            <div class="col-sm-9">
                                <select class="form-select" id="religion" name="religion" aria-label="Default select example">
                                    <?php
                                        $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                        $selectedReligion = $admin[0]['religion']; // Assuming there's only one admin in the result
                                    ?>
                                    <optgroup label="Christianity">
                                        <option value="Aglipay" <?php if ($selectedReligion == 'Aglipay') echo 'selected'; ?>>Aglipay</option>
                                        <option value="Ang Dating Daan" <?php if ($selectedReligion == 'Ang Dating Daan') echo 'selected'; ?>>Ang Dating Daan</option>
                                        <option value="Baptist" <?php if ($selectedReligion == 'Baptist') echo 'selected'; ?>>Baptist</option>
                                        <option value="Catholic" <?php if ($selectedReligion == 'Catholic') echo 'selected'; ?>>Catholic</option>
                                        <option value="Iglesia ni Cristo" <?php if ($selectedReligion == 'Iglesia ni Cristo') echo 'selected'; ?>>Iglesia ni Cristo</option>
                                        <option value="Jehovah's Witnesses" <?php if ($selectedReligion == "Jehovah's Witnesses") echo 'selected'; ?>>Jehovah's Witnesses</option>
                                    </optgroup>
                                    <optgroup label="Islam">
                                        <option value="Sunni Islam" <?php if ($selectedReligion == 'Sunni Islam') echo 'selected'; ?>>Sunni Islam</option>
                                        <option value="Shia Islam" <?php if ($selectedReligion == 'Shia Islam') echo 'selected'; ?>>Shia Islam</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        


                        

                        <div class="row  mb-3">
                            <label for="church_region" class="col-sm-3 col-form-label">Region <sup style='color:red;'>  *</sup></label>
                            <div class="col-sm-9">
                                <select name="church_region" class="form-select" id="church_region" required>
                                    <?php
                                    $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                    foreach ($admin as $value) {
                                        $selected = ''; // Initialize the selected attribute
                                        if ($value['church_region'] == $selected) {
                                            $selected = 'selected'; // Set selected if it matches the selected value
                                        }
                                        echo "<option value='{$value['church_region']}' $selected>{$value['church_region']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                   
                            <label for="church_province" class="col-sm-3 col-form-label">Province <sup style='color:red;'>  *</sup></label>
                            <div class="col-sm-9">
                                <select name="church_province" class="form-select" id="church_province" required></select>
                                <input type="hidden" class="form-control " name="church_province_text" id="church_province_text" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="church_city" class="col-sm-3 col-form-label">City <sup style='color:red;'>  *</sup></label>
                            <div class="col-sm-9">
                                <select name="church_city" class="form-select " id="church_city" required></select>
                                <input type="hidden" class="form-control " name="church_city_text" id="church_city_text" required>
                            </div>
                            <label for="church_barangay" class="col-sm-3 col-form-label">Barangay <sup style='color:red;'>  *</sup></label>
                            <div class="col-sm-9">
                                <select name="church_barangay" class="form-select " id="church_barangay" required></select>
                                <input type="hidden" class="form-control " name="church_barangay_text" id="church_barangay_text" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Newchurch_street" class="col-sm-3 col-form-label">Street <sup style='color:red;'>  *</sup></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control " id="Newchurch_street" name="Newchurch_street" placeholder="e.g. Henares" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                foreach($admin as $key => $value){
                                    echo $value['church_street'];
                                }
                                ?>" >
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="church_num" class="col-sm-3 col-form-label">Church Contact *</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="church_num" name="church_num" placeholder="Enter Church Number"  value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                    foreach($admin as $key => $value){
                                        echo $value['church_num'];
                                    }
                                ?>" >
                            </div>
                        </div>


                    
                                        <hr>
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="mt-1 text-start align-items-start justify-content-start">
                                    <button type="submit" class="btn text-white" name="submit" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">Update Profile</button>
                                </div>
                            </div>
                        </div>
                        
                    

                </div>
            </div>

            <div class="row">
                    <div class="col-6">
                            <div class="card">
                                <h2 class="text-center pt-3 mb-0  ">MISSION</h2>
                                <div class="card-body d-flex justify-content-around align-items-center">
                                    <textarea class="form-control" id="mission"  placeholder="" rows="3" style="height: 250px;"><?php   $mission = (new ControllerAdmin)->ctrShowChurchAdmin();
                                            foreach($mission as $key => $value){
                                                echo $value['mission'];
                                            }
                                            ?></textarea>
                                </div>
                            </div>
                    

                    </div>


                    <div class="col-6">
                        <div class="card">
                                <h2 class="text-center pt-3 mb-0 ">VISION</h2>
                            <div class="card-body d-flex justify-content-around align-items-center">
                                <textarea class="form-control" id="vision" placeholder=""  rows="3" style="height: 250px;"><?php  $vision = (new ControllerAdmin)->ctrShowChurchAdmin();
                                            foreach($vision as $key => $value){
                                                echo $value['vision'];
                                            }
                                            ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    

        <div class="col">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                    <h5 class="">Add Your Location &nbsp;<button type="button" id="updateChurchloc" class="btn btn-outline-success align-items-end justify-content-end"><i class="fadeIn animated bx bx-plus"></i></button></h5>

                        <div id="marker-map" class="gmaps mb-3"></div>

                    </div>
                </div>
            </div>

  

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">  
                            <div class="col-4">
                                <select class="form-select" aria-label="Default select example" id="socialMedia_category">
                                    <option selected="" value="Facebook">Facebook</option>
                                    <option value="Snapchat">Snapchat</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Twitter">Twitter</option>
                                    <option value="Tiktok">Tiktok</option>
                                    <option value="Youtube">Youtube</option>
                                    <option value="Pinterest">Pinterest</option>
                                    <option value="WhatsApp">WhatsApp</option>

                                </select>
                            </div>

                            <div class="col-6">
                                <input class="form-control" type="text" placeholder="Enter Link" id="socialMedia" aria-label="default input example">
                            </div>


                            <div class="col-1">
                                <button type="button" id="SocialMedia" class="btn btn-outline-success"><i class="fadeIn animated bx bx-plus"></i></button>
                            </div>
                        </div>           
                    </div>
                    <ul class="list-group list-group-flush mb-0" style="overflow-y: scroll; height: 285px;">
                    <?php  $social = (new ControllerChurchSetting)->ctrShowSocialMedia();
                                foreach($social as $key => $value){

                                    $socialcategory = $value['socialmedia_category'];

                                        if ($socialcategory === 'Facebook') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="fab fa-facebook" style="color: #1877F2;"></i>                                                
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocialMedia('.$value["id"].')">
                                                </button>
                                                
                                            </li>';
                                        } elseif ($socialcategory === 'Snapchat') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="fab fa-snapchat" style="color: #FFFC00;"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocialMedia('.$value["id"].')">
                                                </button>
                                            </li>';
                                        } elseif ($socialcategory === 'Instagram') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="fab fa-instagram" style="color: #E4405F;"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocialMedia('.$value["id"].')">
                                                </button>
                                            </li>';
                                        } elseif ($socialcategory === 'Twitter') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="fab fa-twitter" style="color: #1DA1F2;"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocialMedia('.$value["id"].')">
                                                </button>
                                            </li>';

                                        }elseif ($socialcategory === 'Tiktok') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="fab fa-tiktok" style="color: #000000;"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocialMedia('.$value["id"].')">
                                                </button>
                                            </li>';


                                        }elseif ($socialcategory === 'Youtube') {
                                                echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                    <i class="fab fa-youtube" style="color: #FF0000;"></i>
                                                    <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                    <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocialMedia('.$value["id"].')">
                                                    </button>
                                                </li>';

                                        }elseif ($socialcategory === 'Pinterest') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="fab fa-pinterest" style="color: #E60023;"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocialMedia('.$value["id"].')">
                                                </button>
                                            </li>';

                                        } else {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="fab fa-whatsapp" style="color: #25D366;"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocialMedia('.$value["id"].')">
                                                </button>
                                            </li>';
                                        }
                                        
                                    }
                                ?>
                            </ul>

                </div>
            </div>




            <div class="row">
                <div class="card">
                    <div class="card-body d-flex justify-content-around align-items-center">
                        <div class="row">
                            <div class="col-4">
                                <select class="form-select" aria-label="Default select example" id="donation_category">
                                    <option selected="" value="GCash">GCash</option>
                                    <option value="PNB">PNB</option>
                                    <option value="BDO">BDO</option>
                                    <option value="Metrobank">Metrobank</option>
                                    <option value="BPI">BPI</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" placeholder="" id="donation_number" aria-label="default input example">
                            </div>
                            <div class="col-1">
                                <button type="button" id="addDonation" class="btn btn-outline-success"><i class="fadeIn animated bx bx-plus"></i></button>
                            </div>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush mb-0" style="overflow-y: scroll; height: 265px;" >
                    <?php  $donation = (new ControllerChurchSetting)->ctrShowDonation();
                                foreach($donation as $key => $value){

                                    $websiteCategory = $value['donation_category'];

                                        if ($websiteCategory === 'GCash') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <img src="views/images/gcash.png" style="height:50px; width:100px;" alt="GCASH">
                                                <p class="pt-3" style="color:black;">'.$value["donation_number"].'</p> <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red;"  onclick="deleteData('.$value["id"].')">
                                                </button>
                                                
                                            </li>';
                                        } elseif ($websiteCategory === 'PNB') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <img src="views/images/pnb.png" style="height:25px; width:100px;" alt="PNB">
                                                <p class="pt-3" style="color:black;">'.$value["donation_number"].'</p> <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteData('.$value["id"].')">
                                                </button>
                                            </li>';
                                        } elseif ($websiteCategory === 'BDO') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <img src="views/images/bdo.png" style="height:25px; width:100px;" alt="BDO">
                                                <p class="pt-3" style="color:black;">'.$value["donation_number"].'</p> <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red;" onclick="deleteData('.$value["id"].')">
                                                </button>
                                            </li>';
                                        } elseif ($websiteCategory === 'Metrobank') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <img src="views/images/metrobank.png" style="height:30px; width:100px;" alt="METROBANK">
                                                <p class="pt-3" style="color:black;">'.$value["donation_number"].'</p> <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red;" onclick="deleteData('.$value["id"].')">
                                                </button>
                                            </li>';
                                        } else {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <img src="views/images/bpi.png" style="height:30px; width:100px;" alt="BPI">
                                                <p class="pt-3" style="color:black;">'.$value["donation_number"].'</p> <button type="button" class="btn bi bi-x-circle border-0"  style="cursor: pointer; color: red;" onclick="deleteData('.$value["id"].')">
                                                </button>
                                            </li>';
                                        }
                                        
                                    }
                                    
                            
                                    
                                    
                                    
                                    
                            

                                ?>

                        
    
                     </ul>
                </div>
            </div>

        </div>
    
        </div>
    <!--end row-->

  

    </form>
  
</main>


<!-- 
<script>
    // Get the file input elements
    const userBack = document.getElementById('userBack');
    const userAvatar = document.getElementById('userAvatar');

    // Handle file upload for background image
    userAvatar.addEventListener('change', function (event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function (e) {
            const backgroundImage = document.getElementById('userBackground');
            backgroundImage.style.backgroundImage = `url(${e.target.result})`;
        }
        reader.readAsDataURL(file);
    });

    // Handle file upload for user profile image
    userBack.addEventListener('change', function (event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function (e) {
            const userProfileImage = document.getElementById('userProfileImage');
            userProfileImage.src = e.target.result;
        }
        reader.readAsDataURL(file);
    });

</script> -->

