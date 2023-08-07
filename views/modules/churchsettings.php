<main class="page-content"> 

<div class="card overflow-hidden">
    
    <div class="position-relative mb-4 border-bottom"   id="userBackground" name="userBackFile" style="background-image: url(views/images/default.png); background-size: cover; background-repeat: no-repeat; height: 10rem;  background-position: center;">


        <?php   
        // $avatarUrl = (new ControllerAdmin)->ctrShowChurchAdmin();
        //     foreach($avatarUrl as $key => $value){
        //         $avatarUrl = $value['avatar'];
        //     }
            ?>
        <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">
            <img id="userProfileImage" src="views/images/default.png" id="image">
        </div>

        <input type="file" id="userAvatar" name="userAvatar" class="position-absolute" style="top: 190px; left: 140px; opacity: 0;" accept=".jpg, .jpeg, .png">
       
        <label for="userAvatar" class="position-absolute btn btn-secondary rounded-circle" style="top: 190px; left: 140px; font-size: 18px;">
            <i class="fadeIn animated bx bx-upload"></i>
        </label>

        <input type="file" id="userBack" class="position-absolute" style="top: 140px; right: 140px; opacity: 0;">
        <label for="userBack" class="position-absolute btn btn-secondary rounded-circle" style="top: 140px; right: 140px; font-size: 20px;">
            <i class="fadeIn animated bx bx-upload"></i>
        </label>
    </div>

    

<script>
    // Get the file input elements
    // const userBack = document.getElementById('userBack');
    const userAvatar = document.getElementById('userAvatar');

    // Handle file upload for background image
    // userBack.addEventListener('change', function (event) {
    //     const file = event.target.files[0];
    //     const reader = new FileReader();
    //     reader.onload = function (e) {
    //         const backgroundImage = document.getElementById('userBackground');
    //         backgroundImage.style.backgroundImage = `url(${e.target.result})`;
    //     }
    //     reader.readAsDataURL(file);
    // });

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

</script>

    <div class="card-body">
    <div class="mt-5 d-flex align-items-start justify-content-between">
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
                                <span class="badge rounded-pill bg-primary">'.$value['church_address'].', '.$value['church_city'].'</span>

                            ';
                        }
                    ?>
              
            </div>
        </div>
        <div class="">
                     <a href="javascript:;" class="btn btn-danger"><i class="bi bi-person-x"></i>Deactivate Account</a>
                  </div>
    </div>  
    </div>
</div>


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
                                <label for="Newchurch_address" class="col-sm-3 col-form-label">Church Address *</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control border-3" id="Newchurch_address" name="churchAddress" placeholder="Enter Your Address" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                foreach($admin as $key => $value){
                                    echo $value['church_address'];
                                }
                                ?>">
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
                            <label for="inputReligion"  class="col-sm-3 col-form-label">Religion *</label>
                            <div class="col-sm-9">
                                <select class="form-select border-3" id="religion" name="religion" aria-label="Default select example">
                                    <?php
                                    $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                    $selectedReligion = $admin[0]['religion']; // Assuming there's only one admin in the result
                                    ?>
                                    <option value="Catholic" <?php if ($selectedReligion == 'Catholic') echo 'selected'; ?>>Catholic</option>
                                    <option value="Baptist" <?php if ($selectedReligion == 'Baptist') echo 'selected'; ?>>Baptist</option>
                                    <option value="Born Again" <?php if ($selectedReligion == 'Born Again') echo 'selected'; ?>>Born Again</option>
                                    <option value="Aglipay" <?php if ($selectedReligion == 'Aglipay') echo 'selected'; ?>>Aglipay</option>
                                    <option value="Jehovah's" <?php if ($selectedReligion == 'jehovah') echo 'selected'; ?>>jehovah's</option>
                                </select>
                            </div>
                        </div>


                        
                        <div class="row mb-3">
                                <label for="city" class="col-sm-3 col-form-label">City *</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control border-3" id="city" name="city" placeholder="Enter Your City"  value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                    foreach($admin as $key => $value){
                                        echo $value['church_city'];
                                    }
                                    ?>" >
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="church_num" class="col-sm-3 col-form-label">Church Contact *</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control border-3" id="church_num" name="church_num" placeholder="Enter Church Number"  value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                    foreach($admin as $key => $value){
                                        echo $value['church_num'];
                                    }
                                ?>" >
                            </div>
                        </div>


                    

                        <div class="row mb-3">
                            <div class="col-sm-9">
                                <div class="text-end align-items-end justify-content-end">
                                    <button type="submit" class="btn text-white" name="submit" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">Submit</button>
                                    <button type="reset" class="btn btn-outline-danger">Reset</button>
                                </div>
                            </div>
                        </div>
                        
                    

                </div>
            </div>

            <div class="row">
                    <div class="col-6">
                            <div class="card">
                                <h2 class="text-center pt-3 mb-0   ">MISSION</h2>
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
                    <h5 class="mb-3">Location <button type="button" id="updateChurchloc" class="btn btn-outline-success align-items-end justify-content-end"><i class="fadeIn animated bx bx-plus"></i></button></h5>

                        <div id="marker-map" class="gmaps"></div>

                    </div>
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
                    <ul class="list-group list-group-flush mb-0" style="overflow-y: scroll; height: 290px;">
                    <?php  $social = (new ControllerChurchSetting)->ctrShowSocialMedia();
                                foreach($social as $key => $value){

                                    $socialcategory = $value['socialmedia_category'];

                                        if ($socialcategory === 'Facebook') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-facebook"></i>                                                
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocial('.$value["id"].')">
                                                </button>
                                                
                                            </li>';
                                        } elseif ($socialcategory === 'Snapchat') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-snapchat"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocial('.$value["id"].')">
                                                </button>
                                            </li>';
                                        } elseif ($socialcategory === 'Instagram') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-instagram"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocial('.$value["id"].')">
                                                </button>
                                            </li>';
                                        } elseif ($socialcategory === 'Twitter') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-twitter"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocial('.$value["id"].')">
                                                </button>
                                            </li>';

                                        }elseif ($socialcategory === 'Tiktok') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-tiktok"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocial('.$value["id"].')">
                                                </button>
                                            </li>';


                                        }elseif ($socialcategory === 'Youtube') {
                                                echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                    <i class="bi bi-youtube"></i>
                                                    <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                    <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocial('.$value["id"].')">
                                                    </button>
                                                </li>';

                                        }elseif ($socialcategory === 'Pinterest') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-pinterest"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocial('.$value["id"].')">
                                                </button>
                                            </li>';

                                        } else {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <i class="bi bi-whatsapp"></i>
                                                <a href="'.$value['socialmedia'].'"  target="_blank"><p style="width:250px;">'.$value['socialmedia'].'</p></a>
                                                <button type="button" class="btn bi bi-x-circle border-0" style="cursor: pointer; color: red; " onclick="deleteSocial('.$value["id"].')">
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