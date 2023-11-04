
<main class="page-content" style="height:100vh;">

<?php 
require_once "././models/connection.php";
require_once "././models/upload.php";

$db = new Connection();
$pdo = $db->connect();
$accID = $_COOKIE['acc_id'];
// Fetch the current avatar file name from the database
$stmt = $pdo->prepare("SELECT Avatar FROM account WHERE AccountID = :AccountID");
$stmt->bindParam(':AccountID', $accID, PDO::PARAM_STR);
$stmt->execute();
$pubProfile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data



?>

<form method="POST" id="Pubform" enctype="multipart/form-data">
    <div class="d-flex justify-content-center align-items-center">  
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-5">
            <div class="card border-2 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="user-profile-avatar translate-middle-x">
                            <img id="UserPublicImage" src="<?php echo "./views/UploadAvatar/".$pubProfile['Avatar']?>" style="background-image: url(views/images/default.png); background-size: cover; background-repeat: no-repeat; background-position: center;">
                        </div>
                        <div class="ml-3">
                            <h2 class="mb-3 text-center">
                                <?php
                                $public = (new ControllerPublic)->ctrShowPublic();
                                foreach($public as $key => $value){
                                    $fullName = $value['fname'] . ' ' . $value['lname'];
                                    echo '<div class="row mb-2">
                                              <div class="col-12 text-center"> ' . $fullName . ' </div>
                                          </div>';
                                }
                                ?>
                            </h2>
                            <div class="form-group border-0">
                                <div class="row mb-2">
                                    <span class="form-group-text" value="..."><i class="fas fa-envelope"></i>&nbsp;&nbsp;&nbsp;<?php echo $value['acc_email']; ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row mb-2">
                                    <span class="form-group-text" value="..."><i class="fas fa-phone"></i>&nbsp;&nbsp;&nbsp;<?php echo $value['acc_contact']; ?></span>
                                </div>
                            </div>
                            <input type="file" id="publicAvatar" name="publicAvatar" class="position-absolute" style="top: 220px; left: 140px; opacity: 0;">
                            <label for="publicAvatar" class="position-absolute btn btn-secondary rounded-circle" style="top: 120px; left: 150px; font-size: 18px;">
                                <i class="fadeIn animated bx bx-upload"></i>
                            </label>
                            <div class="text-start mt-4">
                                <input type="submit" class="btn btn-outline-primary mt-1" value="Save Profile" style="display: none;" id="PublicProfile">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



    <div class="d-flex justify-content-center align-items-center" >     
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
            <div class="row">
                <div class="col">
                    <div class="card border-3 rounded-4">
                   
                        <div class="card-body">
                            <div class="form-body g-3  p-4">
                                
                                
                                <form id="updatePublic" method="POST" autocomplete="nope" class="row g-3">
                                   

                                    <?php  $public = (new ControllerPublic)->ctrShowPublic();
                                        foreach($public as $key => $value){                  
                                        }
                                            ?>
                                        <div class="row g-2">
                                            <div class="col-12">
                                                <label for="pub_username" class="form-label">Username</label>
                                                <input type="text" class="form-control border-3" id="pub_username" placeholder="Enter Username" value="<?php echo $value['acc_username'] ?>">
                                            </div>
                                            
                                        </div>

                                        <div class="row g-2">
                                            <div class="col-6">
                                                <label for="pub_password" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-3" id="pub_password" placeholder="Enter Password" value="<?php echo $value['acc_password'] ?>">
                                                </div>
                                            </div> 

                                            <div class="col-6">
                                                <label for="pub_password" class="form-label">Confirm Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0 border-3" id="pub_password" placeholder="Enter Password" value="<?php echo $value['acc_password'] ?>">
                                                    <a href="javascript:;" class="input-group-text bg-transparent border-3"><i class="bi bi-eye-slash-fill"></i></a>
                                                </div>
                                            </div> 
                                        </div>    
                                            

                                        <div class="row g-2">
                                            <div class="col-12">
                                                <label for="pub_email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control border-3" id="pub_email" placeholder="Enter Email Address" value="<?php echo $value['acc_email'] ?>">
                                            </div> 
                                        </div>
                                        

                                        <div class="row g-2">
                                            <div class="col-6">
                                                <label for="pub_fname" class="form-label">Name</label>
                                                <input type="text" class="form-control border-3" id="pub_fname" placeholder="Enter First Name" value="<?php echo $value['fname'] ?>">
                                            </div>

                                            <div class="col-6">
                                                <label for="pub_lname" class="form-label">Last Name</label>
                                                <input type="text" class="form-control border-3" id="pub_lname" placeholder="Enter Last Name" value="<?php echo $value['lname'] ?>">
                                            </div>


                                            <div class="col-6">
                                                <label for="pub_religion" class="form-label">Religion</label>
                                                <select class="form-select border-3" id="pub_religion" aria-label="Default select example" >
                                                    <?php
                                                    $public = (new ControllerPublic)->ctrShowPublic();
                                                    $selectedReligion = $public[0]['religion']; // Assuming there's only one admin in the result
                                                    ?>
                                                    <option value="Catholic" <?php if ($selectedReligion == 'Catholic') echo 'selected'; ?>>Catholic</option>
                                                    <option value="Baptist" <?php if ($selectedReligion == 'Baptist') echo 'selected'; ?>>Baptist</option>
                                                    <option value="Born Again" <?php if ($selectedReligion == 'Born Again') echo 'selected'; ?>>Born Again</option>
                                                    <option value="Aglipay" <?php if ($selectedReligion == 'Aglipay') echo 'selected'; ?>>Aglipay</option>
                                                    <option value="Jehovah's" <?php if ($selectedReligion == 'jehovah') echo 'selected'; ?>>jehovah's</option>
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label for="pub_contact" class="form-label">Contact Details</label>
                                                <input type="text" class="form-control border-3" id="pub_contact" placeholder="Enter Contacts" value="<?php echo $value['acc_contact'] ?>" >
                                            </div>

                                        
                                        </div>
                                       

                                        <div class="row g-2 mt-4 align-items-end d-flex justify-content-end">
                                            

                                            <div class="col-2">
                                                <div class="d-grid">
                                                    <button type="button" id="pub_clear" class="btn btn-outline-danger border-1">Clear</button>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-outline-success border-1">Save</button>
                                                </div>
                                            </div>
                                        </div>
                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
 </main>