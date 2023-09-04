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
                        <select class="form-select mb-3" id="admin_report-type" aria-label="Default select example">
                            <option selected="" value="users">Registered Users</option>
                            <option value="churches">Churches</option>
                            <option value="members">Collaboration</option>
                        </select>
                    </div>

                    <div class="col-3 cursor-pointer">
                 
                        <label for="month_report" class="form-label">Month</label>
                        <select class="form-select" id="month_report" multiple>
                          <option value="">All</option>
                          <option value="01">January</option>
                          <option value="02">February</option>
                          <option value="03">March</option>
                          <option value="04">April</option>
                          <option value="05">May</option>
                          <option value="06">June</option>
                          <option value="07">July</option>
                          <option value="08">August</option>
                          <option value="09">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                
                    </div>

                    <div class="col-2">
                        <label for="year_report" class="form-label">Year</label>
                        <select class="form-select" id="year_report" multiple>
                        <option value="">All</option>
                          <?php 

                          $year = 2023;
                          $todayYear = date("Y");
                          $availableYear = $todayYear - $year;

                          do{
                            echo '<option value="' . $year . '">' . $year . '</option>';
                            $year++;
                            $availableYear--;
                          }
                          while($availableYear >=0);
                          

                          ?>
                        </select>
                    </div>

                    <div class="col-2">
                        <label class="form-label" >Status</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="church_status_adminreport" disabled>
                          <option >All</option>
                          <option value="accepted">Accepted</option>
                          <option value="rejected">Rejected</option>
                          <option value="waitlist">Waitlist</option>
                          <?php 
      
                          ?>
                        </select>
                    </div>
                    
                </div>
               
                <hr>


                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="adminreport-table" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Religion</th>
                            <th>Email Address</th>
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

    
