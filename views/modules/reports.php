<main class="page-content">


   
<div class="row py-3">
        <div class="col-12 col-lg-6 col-xl-6 d-flex ">  
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

                            foreach($reports as $key => $value){
                                echo '
                                        <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="views/images/ourlady.jpg" alt="" width="50" height="50" class="rounded-circle">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-bold">'.$value['violation'].'</h6> 
                                        </div>
                                        <div class="church_div">
                                            <input type="text" name="trans_type" id="report_id" value="'.$value['reportID'].'" style="display:none;" required="">
                                            <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnReport" value="hello">View Details </button>
                                            <button type="button" class="btn btn-outline-danger rounded-5 btn-sm pr-3 acceptBtn" onclick="deleteReport(this)">Delete </button>
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

                            foreach($reports as $key => $value){
                                echo '
                                        <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="views/images/ourlady.jpg" alt="" width="50" height="50" class="rounded-circle">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-bold">'.$value['violation'].'</h6> 
                                        </div>
                                        <div class="church_div">
                                            <input type="text" name="trans_type" id="report_id" value="'.$value['reportID'].'" style="display:none;" required="">
                                            <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnReport" value="hello">View Details </button>
                                            <button type="button" class="btn btn-outline-danger rounded-5 btn-sm pr-3 acceptBtn">Delete </button>
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
                <h5 class="modal-title">Church Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body church_details_div">
                <div class="form-body g-3">
                    <form role="form" id="churchAccounts-form " method="POST" autocomplete="nope" class="churchAccountsForm row g-3">
                        <input type="text" name="trans_type" id="trans_type" value="New" style="display:none;" required>
                        <div class="col-md-2 form-group pt-3 pr-3" style="display:block;">
                                <label for="churchID" class="form-label">ID</label>
                                <input id="superuser_churchID" class="form-control" name="superuser_churchID" type="text" style="font-size:1em;"readonly >
                        </div>

                        <div class="row g-3">        
                            <div class="col-12">
                                <label for="inputChurchName" class="form-label">Church Name</label>
                                <input type="text" class="form-control border-3" id="church_name" name="churchName" placeholder="Our Lady of Peace and Good Voyage" value="Our Lady of Peace and Good Voyage" readonly>
                            </div>             
                        </div>
                        
                        <div class="row g-3">     

                            <div class="col-6">
                                <label for="inputEmailAddress" class="form-label">Church Email Address</label>
                                <input type="email" class="form-control border-3" id="church_email" name="email" placeholder="example@user.com" value="ourladyofpeaceandgoodvoyage001@gmail.com" readonly>
                            </div> 

                            <div class="col-6">
                                <label for="inputReligion" class="form-label">Religion</label>
                                <select class="form-select border-3" id="church_religion" name="religion" aria-label="Default select example" disabled>
                                <option selected="" value="Catholic">Catholic</option>
                                <option value="Baptist">Baptist</option>
                                <option value="Born Again">Born Again </option>
                                </select>
                            </div>

                            
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Church Address</label>
                                <input type="text" class="form-control border-3" id="church_address" name="churchAddress" placeholder="Brgy. Singcang Airport, Raquel St." value="Brgy. Singcang Airport, Raquel St." readonly>
                            </div>
                        
                        </div>


                        <div class="row g-3">
                            <div class="col-6">
                            <label for="inputSelectCountry" class="form-label">City</label>
                                <select class="form-select border-3" id="church_city" name="country" aria-label="Default select example" disabled>
                                <option selected="" value="Philippines">Bacolod City</option>
                                <option value="India">India</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="America">America</option>
                                <option value="Dubai">Dubai</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="inputNum" class="form-label">Telephone Number</label>
                                <input type="text" class="form-control border-3" id="church_telnum" name="telnum" placeholder="432-0048" value="432-0048">
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
