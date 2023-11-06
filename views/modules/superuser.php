<!--start main content-->
<main class="page-content" style="height:100vh;">

    <div class="row ">



        <div class="col-12 col-lg-6 col-xl-7 d-flex ">  

            <div class="row">

              <div class="col-12  d-flex ">  
                    <div class="card w-100 mx-10 shadow p-3 mb-5 bg-body rounded  scrollable-left-superuser">
                    <div class="background-image"></div>
                        <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center py-2 px-2">
                                <div class="px-2">
                                    <h6 class="mb-0 fw-bold"> <i class="fadeIn animated bx bx-church text-5"></i>Account Apporval</h6>
                                </div>
                                <!-- MARGIN RIGHT -->
                                <div class="ms-auto me-3">
                                    <input class="form-control px-2 " type="search" id="AccountApprove" placeholder="Search Church">
                                </div>
                                <!-- ALIGN SA CENTER -->
                                <div class="">  
                                        <button class="btn btn-outline-success rounded-5 btn-sm px-3 AccoutAllAccept"><i class="fadeIn animated bx bx-check"></i></button>
                                        <button class="btn btn-outline-danger rounded-5 btn-sm px-3 AccoutAllReject"><i class="fadeIn animated bx bx-x"></i></button>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body " scrollable-y="true">
                        <div>
                        

                            <div class="registration_churches" id="registration_churches">
                            <?php
                                $churches = (new ControllerSuperuser)->ctrShowChurchList(0);
                                $db = new Connection();
                                $pdo = $db->connect();

                                foreach($churches as $key => $value){
                                $stmt = $pdo->prepare("SELECT Avatar FROM churches WHERE churchID = :churchID");
                                $stmt->bindParam(':churchID', $value['churchID'], PDO::PARAM_STR);
                                $stmt->execute();
                                $profile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data
                            
        
                                
                                $imagePath = "views/images/default.png"; // Default value

                                if (!empty($profile['Avatar']) && file_exists($imagePath)) {
                                    $imagePath = "./views/UploadAvatar/".$profile['Avatar'];
                                }

                                
                                $churchid = $value["churchID"] ;
                                $details = (new ControllerSuperuser)->ctrGetChurchDetailsOnly($churchid);
                                echo '
                                <div class="church_container ApproveAccount"> <!-- Wrap each church entry in a container -->
                                    <div class="d-flex align-items-center approval_churches gap-3">
                                    <div class="team-lis">
                                    <img src="'.$imagePath.'" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">'.$value["church_name"].'</h6> 
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$details["church_province"].', '.$details["church_city"].'</span>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$details["church_barangay"].', '.$details["church_street"].'</span>

                                    </div>
                                    <div class="church_div">
                                        <input type="text" name="trans_type" id="church_id" value='.$value["churchID"].' name="church_id" style="display:none;" required>
                                        <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details</button>
                                        <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtn" value="'.$value["church_name"].'" onclick="changeButtonText(this)">Accept</button>
                                        <button type="button" class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectBtn" value="'.$value["church_name"].'">Reject</button>
                                    </div>
                                    </div>
                                    <hr> <!-- Add hr within the container -->
                                </div>
                                ';
                                }
                            ?>

                            </div>      
                        </div>
                        </div>
                    </div>
                </div>


                <div class="col-12  d-flex ">  
                    <div class="card w-100 mx-10 shadow p-3 mb-5 bg-body rounded  scrollable-left-superuser">
                    <div class="background-image"></div>
                        <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center py-2 px-2">
                                <div class="px-2">
                                    <h6 class="mb-0 fw-bold"> <i class="fadeIn animated bx bx-church text-5"></i>Rejected Accounts</h6>
                                </div>
                                <!-- MARGIN RIGHT -->
                                <div class="ms-auto me-3">
                                    <input class="form-control px-2 " type="search"  placeholder="Search Church" id="RejectAccount">
                                </div>
                                <!-- ALIGN SA CENTER -->
                                <div class="">  
                            
                                </div>
                            </div>
                        </div>
                        <div class="card-body" scrollable-y="true">
                        <div>
                        

                            <div class="registration_churches scrollable-left-superuser" id="registration_churches">
                                <?php
                                    $churches = (new ControllerSuperuser)->ctrShowRejectedChurches(0);
                                
                                        $db = new Connection();
                                        $pdo = $db->connect();
        
                                        foreach($churches as $key => $value){
                                        $stmt = $pdo->prepare("SELECT Avatar FROM churches WHERE churchID = :churchID");
                                        $stmt->bindParam(':churchID', $value['churchID'], PDO::PARAM_STR);
                                        $stmt->execute();
                                        $profile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data
                                    
                
                                        
                                        $imagePath = "views/images/default.png"; // Default value
        
                                        if (!empty($profile['Avatar']) && file_exists($imagePath)) {
                                            $imagePath = "./views/UploadAvatar/".$profile['Avatar'];
                                        }
                                        
                                        $details = (new ControllerSuperuser)->ctrGetChurchDetailsOnly($value["churchID"]);


                                        echo '
                                        <div class="AccountReject">
                                            <div class="d-flex align-items-center gap-3 ">
                                                <div class="team-list">
                                                    <img src="'.$imagePath.'" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-bold">'.$value["church_name"].'</h6> 
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$details["church_province"].', '.$details["church_city"].'</span>
                                                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$details["church_barangay"].', '.$details["church_street"].'</span>
                                                </div>
                                                <div class="church_div">
                                                    <input type="text" name="trans_type" id="church_id" value='.$value["churchID"].' name="church_id" style="display:none;" required>
                                                    <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details </button>
                                                    <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtnRjct" onclick="changeButtonText(this)">Accept </button>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        ';
                                    }
                                    // first view button
                                    // <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal">View Details </button>
                                    ?>

                            </div>      
                        </div>
                        </div>
                    </div>
                </div>

            

            </div>

                
        </div>





        <div class="col-12 col-lg-6 col-xl-5 d-flex">
            <div class="card w-100 shadow p-3 mb-5 bg-body rounded  scrollable-right-superuser">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div class="">
                        <h6 class="mb-2 mt-2 fw-bold">Approved Churches</h6>
                        </div>

                        <div class="ms-auto me-3">
                            <input class="form-control px-2 " type="search"  placeholder="Search Church" id="ApproveChurch">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div >


                        <div class="accepted_churches" id="accepted_churches">

                            <?php
                                $churches = (new ControllerSuperuser)->ctrShowDeactivatedChurch();
                                $db = new Connection();
                                $pdo = $db->connect();
    
                                foreach($churches as $key => $value){
                                $stmt = $pdo->prepare("SELECT Avatar FROM churches WHERE churchID = :churchID");
                                $stmt->bindParam(':churchID', $value['churchID'], PDO::PARAM_STR);
                                $stmt->execute();
                                $profile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data
                              
        
                                
                                $imagePath = "views/images/default.png"; // Default value

                                if (!empty($profile['Avatar']) && file_exists($imagePath)) {
                                    $imagePath = "./views/UploadAvatar/".$profile['Avatar'];
                                }

                                    $churchid = $value["churchID"] ;
                                    $details = (new ControllerSuperuser)->ctrGetChurchDetailsOnly($churchid);
                                    
                                    echo '<div class="deactivatedChurch">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="team-list">
                                                <img src="'.$imagePath.'" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                                </div>
                                                <div class="flex-grow-1">
                                                <h6 class="mb-1 fw-bold">'.$value["church_name"].' </h6>
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$details["church_province"].', '.$details["church_city"].'</span>
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$details["church_barangay"].', '.$details["church_street"].'</span>

                                            </div>
                                            <div class="">
                                                <button href="javascript:;"  class="btn btn-outline-primary rounded-5 btn-sm px-3 btn-hover superuser_activate" value="'.$value["churchID"].'" >Activate</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    ';
                                }
                            ?>

               
                            <?php
                            $churches = (new ControllerSuperuser)->ctrShowChurchList(1);
                            $db = new Connection();
                            $pdo = $db->connect();

                            foreach($churches as $key => $value){
                            $stmt = $pdo->prepare("SELECT Avatar FROM churches WHERE churchID = :churchID");
                            $stmt->bindParam(':churchID', $value['churchID'], PDO::PARAM_STR);
                            $stmt->execute();
                            $profile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data
                          
    
                            
                            $imagePath = "views/images/default.png"; // Default value

                            if (!empty($profile['Avatar']) && file_exists($imagePath)) {
                                $imagePath = "./views/UploadAvatar/".$profile['Avatar'];
                            }

                                
                                $churchid = $value["churchID"] ;
                                $details = (new ControllerSuperuser)->ctrGetChurchDetailsOnly($churchid);
                                echo '
                                <div class="churchApprove">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="team-list">
                                            <img src="'.$imagePath.'" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                            </div>
                                            <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-bold">'.$value["church_name"].' </h6>
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$details["church_province"].', '.$details["church_city"].'</span>
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$details["church_barangay"].', '.$details["church_street"].'</span>
                                                <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bi bi-calendar-check-fill"></i>  '.$value['status_date'].'</span>    


                                        </div>
                                        <div class="">
                                            <button href="javascript:;"  class="btn btn-outline-danger rounded-5 btn-sm px-3 btn-hover superuser_deactivate" value="'.$value["churchID"].'">Deactivate</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                ';
                            }
                            ?>

       

                        </div>

                    </div>
                </div>
            </div>
        </div>


        
    </div>



    








    <script>
            function changeButtonText(button) {
                if (button.innerText === "Activate") {
                button.innerText = "Deactivate ";
                button.classList.add("btn-outline-danger");
                } else {
                button.innerText = "Activate";
                button.classList.remove("btn-outline-danger");
                }
            }

            //possible asynchrnous
    </script>

</main>

 <!-- Modal -->
 <div class="modal fade" id="superuserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Church Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body church_details_div">
                <div class="form-body g-3">
                    <form role="form" id="churchAccounts-form " method="POST" autocomplete="nope" class="churchAccountsForm row g-3">
                        <input type="text" name="trans_type" id="trans_type" value="New" style="display:none;" required>
                        <div class="col-md-2 form-group pt-3 pr-3" style="display:block;" hidden>
                                <label for="churchID" class="form-label">ID</label>
                                <input id="superuser_churchID" class="form-control" name="superuser_churchID" type="text" style="font-size:1em;"readonly >
                        </div>

                        <div class="row g-3">        
                            <div class="col-8">
                                <label for="inputChurchName" class="form-label">Church Name</label>
                                <input type="text" class="form-control border-3" id="church_name" name="churchName" placeholder="Our Lady of Peace and Good Voyage" value="Our Lady of Peace and Good Voyage" readonly>
                            </div>    

                            <div class="col-4">
                                <label for="inputReligion" class="form-label">Religion</label>
                                <input type="text" class="form-control border-3" id="church_religion" name="religion" aria-label="Default select example" readonly>
                            </div>
         
                        </div>
                        
                        <div class="row g-3">     

                            <div class="col-8">
                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                <input type="email" class="form-control border-3" id="church_email" name="email" placeholder="example@user.com" value="ourladyofpeaceandgoodvoyage001@gmail.com" readonly>
                            </div> 

                
                            <div class="col-4">
                                <label for="inputNum" class="form-label">Telephone Number</label>
                                <input type="text" class="form-control border-3" id="church_telnum" name="telnum" placeholder="432-0048" value="432-0048" readonly>
                            </div>

                        </div>


                        <div class="row g-3">
                            <div class="col-4">
                                <label for="church_region" class="form-label">Region</label>
                                <input type="text" class="form-control border-3" id="church_region" name="church_region" readonly>
                            </div>

                            <div class="col-4">
                                <label for="church_province" class="form-label">Province</label>
                                <input type="text" class="form-control border-3" id="church_province" name="country"  readonly>
                            </div>

                            <div class="col-4">
                                <label for="City" class="form-label">City</label>
                                <input type="text" class="form-control border-3" id="church_city" name="country" readonly>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-4">
                                <label for="church_barangay" class="form-label">Barangay</label>
                                <input type="text" class="form-control border-3" id="church_barangay" name="church_barangay"  readonly>
                            </div>

                            <div class="col-8">
                                <label for="church_street" class="form-label">Street</label>
                                <input type="text" class="form-control border-3" id="church_street" name="church_street"readonly>
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
<!-- Modal -->
