    <!--start main content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class=row>
                    <div class="col-5 d-flex align-items-center justify-content-start">
                        <h6 class="mb-0 text-uppercase" style="font-size:3em;">Report Generation</h6>
                    </div>

                    <div class="col-2">
                        <label class="form-label">Report Type</label>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected="">Events Held</option>
                            <option value="1">Views</option>
                            <option value="2">Affiliated Members</option>
                            <option value="2">File Storge</option>
                        </select>
                    </div>


                    <div class="col-3">
                        <div class="mb-3">
                            <label class="form-label">Date Range</label>
                            <!-- <input type="hidden" class="form-control date-range flatpickr-input"> -->
                            <input class="form-control date-range input" placeholder="" tabindex="0" type="text" readonly="readonly">
                        </div>
                    </div>

                    <div class="col-2">
                        <label class="form-label">Category</label>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected="">All</option>
                            <option value="1">Bible Study</option>
                            <option value="2">Outreach</option>
                            <option value="3">Sunday Worship</option>
                        </select>
                    </div>
                    
                </div>
               
                <hr>

                <div class="col-12 col-lg-6 text-end mb-3">
                            <a href="javascript:;" class="btn btn-danger btn-sm me-2"><i class="bi bi-file-earmark-pdf me-2"></i>Export as PDF</a>
                            <a href="javascript:;" onclick="window.print()" class="btn btn-dark btn-sm"><i class="bi bi-printer-fill me-2"></i>Print</a>
                </div>
                <div class="card">
                
                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Event Title</th>
                                    <th scope="col">Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">April 16,2023</th>
                                    <td>1:45 PM</td>
                                    <td>Church Sportsfest</td>
                                    <td>Youth</td>
                                </tr>
                                <tr>
                                    <th scope="row">April 16,2023</th>
                                    <td>5:00 PM</td>
                                    <td>Soaking Prayer</td>
                                    <td>Adults</td>
                                </tr>
                                <tr>
                                    <th scope="row">April 16,2023</th>
                                    <td >8:00 PM</td>
                                    <td>Couple Gathering</td>
                                    <td>Couples</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                  <div class="">
                    <h6 class="mb-0 fw-bold">Report Overview</h6>
                  </div>
                  <div class="dropdown ms-auto">
                    <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a>
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a>
                      </li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                   <div id="chart1"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                  <div class="">
                    <h6 class="mb-0 fw-bold">File Storage Statistic</h6>
                  </div>
                  <div class="dropdown ms-auto">
                    <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a>
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a>
                      </li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                   <div id="chart2"></div>
              </div>
              <div class="card-header bg-transparent" style="overflow-y: scroll; height:100px;">
                  <ul class="list-group list-group-flush mb-0 ">
                    <li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent">Spreedsheet<span class="badge bg-success rounded-pill">12.4%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Document<span class="badge bg-primary rounded-pill">24.9%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">PDFs<span class="badge rounded-pill" style="background-color:deeppink">7.3%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Presentations<span class="badge rounded-pill" style="background-color:coral">24.3%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Forms<span class="badge rounded-pill" style="background-color:blueviolet">31.1%</span>
                    </li>
                  </ul>
                
              </div>
            </div>
          </div>

       </div><!--end row-->
    <div class="row">
       <div class="col-12 col-xl-4 col-lg-4">
            <div class="card overflow-hidden">
              <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                  <div class="">
                    <h6 class="mb-0 fw-bold">San Sebastian Cathedral</h6>
                  </div>
                  <div class="dropdown ms-auto">
                    <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a>
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a>
                      </li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                   <div id="sansebchart"></div>
                  
              </div>
              <div class="card-header bg-transparent" style="overflow-y: scroll; height:100px;">
                  <ul class="list-group list-group-flush mb-0 ">
                    <li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent">Spreedsheet<span class="badge bg-success rounded-pill">12.4%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Document<span class="badge bg-primary rounded-pill">24.9%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">PDFs<span class="badge rounded-pill" style="background-color:deeppink">7.3%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Presentations<span class="badge rounded-pill" style="background-color:coral">24.3%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Forms<span class="badge rounded-pill" style="background-color:blueviolet">31.1%</span>
                    </li>
                  </ul>
                
              </div>
            </div>
          </div>

          <div class="col-12 col-xl-4 col-lg-4">
            <div class="card overflow-hidden">
              <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                  <div class="">
                    <h6 class="mb-0 fw-bold">Christ the Living God Fellowship Bacolod</h6>
                  </div>
                  <div class="dropdown ms-auto">
                    <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a>
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a>
                      </li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                   <div id="chartStat"></div>
              </div>
              <div class="card-header bg-transparent" style="overflow-y: scroll; height:100px;">
              <ul class="list-group list-group-flush mb-0 ">
                    <li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent">Spreedsheet<span class="badge bg-success rounded-pill">12.4%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Document<span class="badge bg-primary rounded-pill">24.9%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">PDFs<span class="badge rounded-pill" style="background-color:deeppink">7.3%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Presentations<span class="badge rounded-pill" style="background-color:coral">24.3%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Forms<span class="badge rounded-pill" style="background-color:blueviolet">31.1%</span>
                    </li>
                  </ul>
                
              </div>
            </div>
          </div>


          <div class="col-12 col-xl-4 col-lg-4">
            <div class="card overflow-hidden">
              <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                  <div class="">
                    <h6 class="mb-0 fw-bold">Abad Church (Bacolod)</h6>
                  </div>
                  <div class="dropdown ms-auto">
                    <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a>
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a>
                      </li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                   <div id="chartNew"></div>
              </div>
              <div class="card-header bg-transparent" style="overflow-y: scroll; height:100px;">
              <ul class="list-group list-group-flush mb-0 ">
                    <li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent">Spreedsheet<span class="badge bg-success rounded-pill">12.4%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Document<span class="badge bg-primary rounded-pill">24.9%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">PDFs<span class="badge rounded-pill" style="background-color:deeppink">7.3%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Presentations<span class="badge rounded-pill" style="background-color:coral">24.3%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Forms<span class="badge rounded-pill" style="background-color:blueviolet">31.1%</span>
                    </li>
                  </ul>
                
              </div>
            </div>
          </div>


       </div><!--end row-->

      
      


     </main>
     <!--end main content-->

    
