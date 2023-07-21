<main class="page-content"> 

<div class="card overflow-hidden">
    
    <div class="position-relative mb-4 border-bottom"   id="userBackground" name="userBackFile" style="background-image: url(views/images/default.png); background-size: cover; background-repeat: no-repeat; height: 10rem;  background-position: center;">


        <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">
            <img id="userProfileImage" src="views/images/default.png">
        </div>
        <input type="file" id="userAvatar" name="userAvatarFile" class="position-absolute" style="top: 190px; left: 140px; opacity: 0;">
        <label for="userAvatar" class="position-absolute btn btn-secondary rounded-circle" style="top: 190px; left: 140px; font-size: 18px;">
            <i class="fadeIn animated bx bx-upload"></i>
        </label>

        <input type="file" id="userBack" class="position-absolute" style="top: 140px; right: 140px; opacity: 0;">
        <label for="userBack" class="position-absolute btn btn-secondary rounded-circle" style="top: 140px; right: 140px; font-size: 20px;">
            <i class="fadeIn animated bx bx-upload"></i>
        </label>
    </div>

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
                            <label for="input35" class="col-sm-3 col-form-label">Church Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="NewChurch_name" value="<?php $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                foreach($admin as $key => $value){
                                    echo $value['church_name'];
                                    
                                    
                                }
                                ?>" placeholder="Enter Your Name">
                            </div>
                        </div>
                        <div class="row mb-3">
                                <label for="inputAddress" class="form-label">Church Address *</label>
                                <input type="text" class="form-control border-3" id="Newchurch_address" name="churchAddress" placeholder="Enter Your Address" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                foreach($admin as $key => $value){
                                    echo $value['church_address'];
                                }
                                ?>">
                        </div>
                        <div class="row mb-3">
                            <label for="input36" class="col-sm-3 col-form-label">Contact Details</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="contact" name="phone" placeholder="Phone No" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['acc_contact'];
                                }
                                ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input37a" class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['fname'];
                                }
                                ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input37a" class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['lname'];
                                }
                                ?>">
                            </div>
                        </div>
                        <div class="row mb-3">

                        <label for="input37a" class="col-sm-3 col-form-label">Designation</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['designation'];
                                }
                                ?>">
                            </div>
                        </div>

                     
                        <div class="row mb-3">
                            <label for="input37a" class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                foreach($admin as $key => $value){
                                    echo $value['church_email'];
                                }
                                ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="input37" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Email Address" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['acc_username'];
                                }
                                ?>" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input38" class="col-sm-3 col-form-label"> Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Choose Password" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['acc_password'];
                                }
                                ?>" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input38a" class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="password" name="confirm_password" placeholder="Confirm Password" value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAccount();
                                foreach($admin as $key => $value){
                                    echo $value['acc_password'];
                                }
                                ?>" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputReligion" class="form-label">Religion *</label>
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
                        <div class="row mb-3">
                                <label for="inputCity" class="form-label">City *</label>
                                <input type="text" class="form-control border-3" id="city" name="city" placeholder="Enter Your City"  value="<?php   $admin = (new ControllerAdmin)->ctrShowChurchAdmin();
                                foreach($admin as $key => $value){
                                    echo $value['church_city'];
                                }
                                ?>" >
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

                    <ul class="list-group list-group-flush mb-0" >
                    <?php  $donation = (new ControllerChurchSetting)->ctrShowDonation();
                                foreach($donation as $key => $value){

                                    $websiteCategory = $value['donation_category'];

                                        if ($websiteCategory === 'GCash') {
                                            echo '<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent" value="">
                                                <img src="views/images/gcash2.png" style="height:50px; width:100px;" alt="GCASH">
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

    <div class="row">
        <div class="col">

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


        <div class="col">
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
    </form>
    
  
</main>

<script> 

function deleteData(id) {
    // Perform the AJAX request to delete data with the specified id
    $.ajax({
        url: 'ajax/delete_donation.ajax.php', // Replace with the actual server-side script that handles the delete operation
        type: 'POST', // Use POST method to send the id to the server
        data: { id: id }, // Send the id as a parameter to the server
        dataType: 'json', // Expect JSON data in response (optional, if the server returns JSON)
        success: function(response) {
            // Handle the response from the server after successful deletion (if needed)
            console.log('Data deleted successfully:', response);
            // Optionally, update the data list or refresh the page here
            location.reload();
        },
        error: function(xhr, status, error) {
            // Handle errors, if any, that occur during the AJAX request
            console.error('Error deleting data:', error);
        }
    });
}

</script>



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