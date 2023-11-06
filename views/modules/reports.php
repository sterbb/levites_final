<main class="page-content">


   
    <div class="row py-3">

        <div class="col-12 col-lg-6 col-xl-6 d-flex "> 

            <div class="row">
                <div class="col-12 col-lg-12 col-xl-12 d-flex ">  
                    <div class="card w-100 mx-10 mb-0">
                        <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center">
                                <div class="">
                                <h6 class="mb-0 fw-bold"><i class="fadeIn animated lni lni-warning m-2"></i>Violations</h6>
                                </div>
                                <div class="ms-auto me-2">
                                        <input class="form-control px-2 " type="search"  placeholder="Search">
                                    </div>
                            </div>
                        </div>
                        <div class="card-body" scrollable-y="true">
                            <?php 
                                    
                                        $reports  = (new ControllerReportSubmission)->ctrgetSubmissions(1);
                                        
                                        $db = new Connection();
                                        $pdo = $db->connect();
                                        foreach($reports as $key => $value){
                                        
                                        $ID = $value['memID'];
                                        $imagePath = "views/images/default.png"; // Default value
                                        
                                        if ($ID) {
                                            $stmt = $pdo->prepare("SELECT Avatar FROM churches WHERE accID = :accID");
                                            $stmt->bindParam(':accID', $ID, PDO::PARAM_STR);
                                            $stmt->execute();
                                            $profile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data
                                        
                                            if (!empty($profile['Avatar']) && file_exists($imagePath)) {
                                                $imagePath = "./views/UploadAvatar/" . $profile['Avatar'];
                                            }
                                        } else {
                                            // If the user is not an admin, you can fetch the avatar from the "account" table here
                                            $stmt = $pdo->prepare("SELECT Avatar FROM account WHERE AccountID = :AccountID");
                                            $stmt->bindParam(':AccountID',$ID, PDO::PARAM_STR);
                                            $stmt->execute();
                                            $profile = $stmt->fetch(PDO::FETCH_ASSOC);
                                        
                                            if (!empty($profile['Avatar']) && file_exists($imagePath)) {
                                                $imagePath = "./views/UploadAvatar/" . $profile['Avatar'];
                                            }
                                        }
                                        
                                                



                                    echo '
                                            <div class="d-flex align-items-center gap-3">
                                            <div class="">
                                                <img src="'.$imagePath.'" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1 fw-bold">'.$value['violation'].'</h6> 
                                            </div>
                                            <div class="church_div">
                                                <input type="text" name="trans_type" id="report_id" value="'.$value['reportID'].'" churchIDwarning="'.$value['churchID'].'" violationtype="'.$value['violation_type'].'" style="display:none;" required="">
                                                <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnReport" value="hello">View Details </button>
                                                <button type="button" class="btn btn-outline-danger rounded-5 btn-sm pr-3 deleteReport" >Delete </button>
                                                <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 actionBtnReport">Take Action </button>
                                            </div>
                                        </div>
                                        <hr>
                                    ';

                                }
                                
                                
                                ?>
                        </div>
                    </div>
                </div>

            <div class="col-12 col-lg-12 col-xl-12 d-flex mt-5">  
                <div class="card w-100 mx-10 mb-0">
                    <div class="card-header bg-transparent">
                        <div class="d-flex align-items-center">
                            <div class="">
                            <h6 class="mb-0 fw-bold"><i class="fadeIn animated m-2 material-symbols-outlined">flag</i>Warned Accounts</h6>
                            </div>
                            <div class="ms-auto me-2">
                                    <input class="form-control px-2 " type="search"  placeholder="Search">
                            </div>
                        </div>
                    </div>  
                    <div class="card-body" scrollable-y="true">
                        <?php 
                            
                        $reports  = (new ControllerReportSubmission)->ctrWarnedAccounts();

                        $recipientDict = [];

                            foreach ($reports as $report) {

                                if(empty($report['recipientID'])){
                                

                                }else{
                                    $recipientID = $report['recipientID'];
                                    if (!array_key_exists($recipientID, $recipientDict)) {
                                        $recipientDict[$recipientID] = [
                                            'Count' => 0,
                                            'Violation' => [],
                                        ];
                                    }
        
                                    $recipientDict[$recipientID]['Count']++;
                                    $recipientDict[$recipientID]['Violation'][] = $report['notification_text'];

                                }
                    
                            }

                            
                            foreach($reports as $key => $value){

                                    if(empty($value['recipientID'])){
                                        $imagePath = "views/images/default.png"; // Default value

                                    }else{

                                            $ID = $value['recipientID'];

                                            if ($ID) {
                                                $stmt = $pdo->prepare("SELECT Avatar FROM churches WHERE churchID = :churchID");
                                                $stmt->bindParam(':churchID', $ID, PDO::PARAM_STR);
                                                $stmt->execute();
                                                $profile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data
                                            
                                                if (!empty($profile['Avatar']) && file_exists($imagePath)) {
                                                    $imagePath = "./views/UploadAvatar/" . $profile['Avatar'];
                                                }
                                            } else {
                                                // If the user is not an admin, you can fetch the avatar from the "account" table here
                                                $stmt = $pdo->prepare("SELECT Avatar FROM account WHERE AccountID = :AccountID");
                                                $stmt->bindParam(':AccountID',$ID, PDO::PARAM_STR);
                                                $stmt->execute();
                                                $profile = $stmt->fetch(PDO::FETCH_ASSOC);
                                            
                                                if (!empty($profile['Avatar']) && file_exists($imagePath)) {
                                                    $imagePath = "./views/UploadAvatar/" . $profile['Avatar'];
                                                }
                                            }
                                        }
                                    }





        
                        foreach($recipientDict as $key => $value){

                            echo '
                                    <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                    <img src="'.$imagePath.'" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">'.$key.'<sup class="badge rounded-circle bg-warning " style="font-size:.8em; margin-left:.5em;">'.$value['Count'].'</sup></h6> 
                                    </div>
                                    <div class="church_div">
                                        <input type="text" name="trans_type" id="warned_report_id" value="'.$key.'" style="display:none;" required="">
                                        <button type="button" class="btn btn-outline-danger rounded-5 btn-sm pr-3 deleteWarningBtn">Delete </button>
                                        <button type="button" class="btn btn-outline-warning rounded-5 btn-sm pr-3 deactivateBtn">Deactivate </button>
                                    </div>
                                </div>
                                <hr>
                            ';
                        }
                        
                        ?>
                    </div>
                </div>
            </div>
            

            
            </div>
        </div>

  
        <div class="col-12 col-lg-6 col-xl-6 d-flex">
            <div class="card w-100 mb-0">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <h6 class="mb-0 fw-bold"><i class="fadeIn animated lni lni-bullhorn m-2"></i>Feedback & Bug Reports:</h6>
                        </div>
                        <div class="ms-auto me-2">
                            <input class="form-control px-2 " type="search"  placeholder="Search">
                        </div>
                    </div>
                </div>
                <div class="card-body" scrollable-y="true">
                    
                    <div>
                        <div class="ReportSubmissionsSection" id="ReportSubmissionsSection">
                            <?php 
                            
                            $reports  = (new ControllerReportSubmission)->ctrgetSubmissions(0);

                            $db = new Connection();
                            $pdo = $db->connect();

                            
                            foreach($reports as $key => $value){
                                    
                                $ID = $value['memID'];
                             

                                $imagePath = "views/images/default.png"; // Default value
                                
                                if ($ID) {
                                    $stmt = $pdo->prepare("SELECT Avatar FROM churches WHERE accID = :accID");
                                    $stmt->bindParam(':accID', $ID, PDO::PARAM_STR);
                                    $stmt->execute();
                                    $profile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data
                                
                                    if (!empty($profile['Avatar']) && file_exists($imagePath)) {
                                        $imagePath = "./views/UploadAvatar/" . $profile['Avatar'];
                                    }
                                } else {
                                    // If the user is not an admin, you can fetch the avatar from the "account" table here
                                    $stmt = $pdo->prepare("SELECT Avatar FROM account WHERE AccountID = :AccountID");
                                    $stmt->bindParam(':AccountID',$ID, PDO::PARAM_STR);
                                    $stmt->execute();
                                    $profile = $stmt->fetch(PDO::FETCH_ASSOC);
                                
                                    if (!empty($profile['Avatar']) && file_exists($imagePath)) {
                                        $imagePath = "./views/UploadAvatar/" . $profile['Avatar'];
                                    }
                                }
                                


                                echo '
                                        <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                        <img src="'.$imagePath.'" width="50" height="50" class="rounded-circle border-2 border" style="background-size: cover; background-repeat: no-repeat; background-position: center;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-bold">'.$value['violation'].'</h6> 
                                        </div>
                                        <div class="church_div">
                                            <input type="text" name="trans_type" id="report_id" value="'.$value['reportID'].'" style="display:none;" required="">
                                            <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnReport" value="hello">View Details </button>
                                            <button type="button" class="btn btn-outline-danger rounded-5 btn-sm pr-3 deleteFeedbackBtn">Delete </button>
                                        </div>
                                    </div>
                                    <hr>
                                ';

                            }
                            
                            ?>

                        </div>      
                    </div>
                </div>
        </div>
    </div>
    

</main>



 <!-- Modal -->
 <div class="modal fade" id="reportDetailsModal" tabindex="-1" aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Report Submission</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
            <div class="col-6">
                <label for="reportSubmissionType" class="form-label fw-bold" >Reported Account</label>
                <input class="form-control border-3" id="reportSubmissionReportedDetails" aria-label="Default select example" disabled>
            </div>
          <div class="col-6">
            <label for="reportSubmissionType" class="form-label fw-bold" >Informer</label>
            <input class="form-control border-3" id="reportSubmissionReporterDetails" aria-label="Default select example" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-5">
            <label for="reportSubmissionType" class="form-label fw-bold" >Report Type</label>
            <input class="form-control border-3" id="reportSubmissionTypeDetails" aria-label="Default select example" disabled>
          </div>
          <div class="col-7">
            <label for="Collection" class="form-label fw-bold">Subject</label>
            <input type="text" class="form-control" id="reportSubmissionSubjectDetails" placeholder="" disabled>
          </div>
        </div>
        <div class="row p-3">
          <label for="Collection" class="form-label fw-bold">Description</label>
          <textarea class="form-control p-2" id="reportSubmissionDescriptionDetails" rows="3" style="height: 124px;"disabled></textarea>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


 <!-- Modal -->
 <div class="modal fade" id="takeActionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title_report_ban">Take Action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center gap-2 m-3">
                <input type="text" id="reportedAccountDetails" hidden>
                <button type="button" class="btn btn-warning rounded-5 btn-lg pr-3 giveWarningBtn text-white">Give Warning</button>
                <button type="button" class="btn btn-danger rounded-5 btn-lg pr-3 deactivateWrnReportBtn">Deactivate Account</button>
            </div>
        
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
