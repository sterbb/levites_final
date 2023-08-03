    <!--start main content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class=row>
                    <div class="col-3 d-flex align-items-center justify-content-start">
                        <h6 class="mb-0 text-uppercase" style="font-size:3em;">Report Generation</h6>
                    </div>

                    <div class="col-2">
                        <label class="form-label">Report Type</label>
                        <select class="form-select mb-3" id="report-type" aria-label="Default select example">
                            <option selected="" value="events">Events Held</option>
                            <option value="churches">Affiliated Churches</option>
                            <option value="members">Affiliated Members</option>
                            <option value="storage">File Storge</option>
                        </select>
                    </div>


                    <div class="col-3">
                        <div class="mb-3">
                            <label class="form-label">Date Range</label>
                            <!-- <input type="hidden" class="form-control date-range flatpickr-input"> -->
                            <input class="form-control date-range"  id="report-range" placeholder="" tabindex="0" type="text" readonly="readonly">
                            <!-- <input class="form-control flatpickr" type="text" placeholder="Select Dates.." id="report-range" name="flatpickr-range" required> -->
                        </div>
                    </div>

                    <div class="col-2">
                        <label class="form-label">Category</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="report-category">
                            <option selected="">All</option>
                            <option value="Bible Study">Bible Study</option>
                            <option value="Outreach">Outreach</option>
                            <option value="Workshop">Workshop</option>
                            <option value="Sunday Worship">Sunday Worship</option>
                            <option value="Prayer Meeting">Prayer Meeting</option>
                            <option value="Baptismal">Baptismal</option>
                            <option value="Wedding">Wedding</option>
                        </select>
                    </div>

                    <div class="col-2">
                        <label class="form-label">Affiliates</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="report-church" disabled>
                          <option selected="">All</option>
                          <?php 
                               $affiliates = (new CollaborationController)->ctrshowAffilatedChurches();
                               foreach($affiliates as $key => $value){
                                $churchname;
                                $churchid;

                                

                                if (array_key_exists("churchid1", $value)) {
                                    // Key exists in the array
                                    $churchid = $value["churchid1"];
                                    $churchname = $value["churchname1"];
                                } else {
                                    // Key is undefined
                                    $churchid = $value["churchid2"];
                                    $churchname = $value["churchname2"];
                                }

                                 echo'<option value="'.$churchid.'">'.$churchname.'</option>';
                               }
                          ?>
                        </select>
                    </div>
                    
                </div>
               
                <hr>


                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="report-table" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Event Title</th>
                            <th>Category</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>











            </div>
        </div>
        <!--end row-->

        <div class="row" >
          <div class="col-lg-12"  id="event-graph-section" hidden>
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                  <div class="">
                    <h6 class="mb-0 fw-bold">Events Overview</h6>
                  </div>

                </div>
              </div>
            
              <div class="card-body">
                   <div id="report"></div>
              </div>
            </div>
          </div>
          



           <div class="row" hidden>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                  <div class="">
                    <h6 class="mb-0 fw-bold">Report Overview</h6>
                  </div>

                </div>
              </div>
              <div class="card-body">
                   <div id="AffMem"></div>
              </div>
            </div>
          </div>
          

       </div><!--end row-->

    <div class="row" id="affiliatesReportContainer" hidden>

    
      <div class="col-lg-4">
              <div class="card">
                <div class="card-header bg-transparent">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <h6 class="mb-0 fw-bold">My Storage</h6>
                    </div>
                  </div>
                </div>
                
                <div class="card-body">
                    <div id="churchStorageReport" style="width: 100%; max-width: 600px;"></div>
                </div>
                <div class="card-header bg-transparent" style="overflow-y: scroll; height:200px;">

                    <ul class="list-group list-group-flush mb-0" id="churchStorageReportList">
                    </ul>
                  
                </div>
              </div>
            </div>


    </div><!--end row-->

      
      


     </main>
     <!--end main content-->

    
