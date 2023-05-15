<!--start main content-->
<main class="page-content">
    <div class="col ">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary opacity-0" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal">Vertically Centered</button>
      <!-- Modal -->
      <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-body">
            <div class="card">
              <div class="card-body">
               <div class="d-flex text-right justify-content-end align-self-center pl-10 " style="float: right;">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <ul class="nav nav-tabs nav-primary justify-content-start" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                      <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class='bi bi-home font-18 me-1'></i>
                        </div>
                        <div class="tab-title">View</div>
                      </div>
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                      <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                        </div>
                        <div class="tab-title">Add</div>
                      </div>
                    </a>
                  </li>

                </ul>
                <div class="tab-content  py-3">

                  <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                    <div class="row g-3">
                        <div class="col-12 col-lg-3">
                          <div class="nav flex-column nav-pills border rounded vertical-pills overflow-hidden">
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#Pricing" type="button"><i class="bi bi-tag-fill me-2"></i>Church Event 1</button>
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#Restock" type="button"><i class="bi bi-box-seam-fill me-2"></i>Church Event 2</button>
                            <button class="nav-link active px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#Shipping" type="button"><i class="bi bi-truck-front-fill me-2"></i>Church Event 3</button>
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#GlobalDelivery" type="button"><i class="bi bi-globe me-2"></i>Church Event 4</button>
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#Attributes" type="button"><i class="bi bi-hdd-rack-fill me-2"></i>Church Event 5</button>
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#Advanced" type="button"><i class="bi bi-handbag-fill me-2"></i>Church Event 6</button>
                          </div>
                        </div>
                        <div class="col-12 col-lg-9 border">
                          <div class="tab-content">

                            <div class="tab-pane fade" id="Pricing">
                              <div class="row g-3">
                                <div class="col-12 col-lg-12 text-center ">
                                  <h4 class="mb-2 ">Instrument Workshop</h4>
                                </div>
                              </div>
                            </div>


                            <div class="tab-pane fade" id="Restock">
                              <h6 class="mb-3">Add to Stock</h6>
                              <div class="row g-3">
                                <div class="col-sm-7">
                                  <input class="form-control" type="number" placeholder="Quantity">
                                </div>
                                <div class="col-sm">
                                  <button class="btn btn-outline-primary"><i class="bi bi-check2 me-2"></i>Confirm</button>
                                </div>
                              </div>
                              <table class="mt-3">
                                <thead>
                                  <tr>
                                    <th style="width: 200px;"></th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="text-1000 fw-bold py-1">Product in stock now:</td>
                                    <td class="text-700 fw-semi-bold py-1">$2,059<button class="btn p-0 ms-2" type="button"><i class="bi bi-arrow-clockwise"></i></button></td>
                                  </tr>
                                  <tr>
                                    <td class="text-1000 fw-bold py-1">Product in transit:</td>
                                    <td class="text-700 fw-semi-bold py-1">3000</td>
                                  </tr>
                                  <tr>
                                    <td class="text-1000 fw-bold py-1">Last time restocked:</td>
                                    <td class="text-700 fw-semi-bold py-1">25th March, 2020</td>
                                  </tr>
                                  <tr>
                                    <td class="text-1000 fw-bold py-1">Total stock over lifetime:</td>
                                    <td class="text-700 fw-semi-bold py-1">50,000</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="tab-pane fade show active" id="Shipping">
                              <div class="row g-3">
                                <div class="col-12 col-lg-12 text-center ">
                                  <h4 class="mb-2 ">Instrument Workshop</h4>
                                </div>
                              </div>
                              <div class="row g-3 mt-2">
                                <div class="col-12 col-lg-12 ">
                                  <h6 class="mb-2 ">When: April 26, 2023 @10:00am - 11:30am</h6>

                                </div>

                                <div class="col-12 col-lg-12 ">
                                  <h6 class="mb-2 ">Where: CLGF Church-Henares Rosario Henares, Bacolod CIty, Philippines</h6>
                                  <p></p>
                                </div>
                              </div>
                              <h6>Groups</h6>
                              <div class="row row-cols-1 row-cols-lg-3 g-3">
                                
                                <div class="col">
                                  <div class="card">
                                    <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                                      <h5 class="card-title inline">Worship Team</h5>
                                      <button class="font-18  btn btn-outline-success px-3 inline">	<i class="fadeIn animated bx bx-mail-send"></i></button>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item">Church Person 1</li>
                                      <li class="list-group-item">Church Person 2</li>
                                      <li class="list-group-item">Church Person 3</li>
                                    </ul>
                                  </div>
                                </div>
                                
                                <div class="col">
                                  <div class="card">
                                    <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                                      <h5 class="card-title inline">Media Team</h5>
                                      <button class="font-18  btn btn-outline-success px-3 inline">	<i class="fadeIn animated bx bx-mail-send"></i></button>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item">Church Person 1</li>
                                      <li class="list-group-item">Church Person 2</li>
                                      <li class="list-group-item">Church Person 3</li>
                                    </ul>
                                  </div>
                                </div>
                                
                                <div class="col">
                                  <div class="card">
                                    <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                                      <h5 class="card-title inline">Technical Team</h5>
                                      <button class="font-18 btn btn-outline-success px-3 inline">	<i class="fadeIn animated bx bx-mail-send"></i></button>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item">Church Person 1</li>
                                      <li class="list-group-item">Church Person 2</li>
                                      <li class="list-group-item">Church Person 3</li>
                                    </ul>
                                  </div>
                                </div>
                                

                              </div><!--end row-->

                            </div>
                            <div class="tab-pane fade" id="GlobalDelivery">
                              <div class="d-flex flex-column h-100">
                                <h6 class="mb-3">Global Delivery</h6>
                                <div class="flex-1">
                                  <div class="mb-4">
                                    <div class="form-check mb-1">
                                      <input class="form-check-input" type="radio" name="shippingRadio" id="Worldwidedelivery">
                                      <label class="form-check-label fw-bold" for="Worldwidedelivery">Worldwide delivery</label>
                                    </div>
                                    <div class="ps-4">
                                      <p class="mb-0">Only available with Shipping method: <a href="#!">Fullfilled by Admin</a></p>
                                    </div>
                                  </div>
                                  <div class="mb-4">
                                    <div class="form-check mb-1">
                                      <input class="form-check-input" type="radio" name="shippingRadio" id="SelectedCountries" checked="checked">
                                      <label class="form-check-label fw-bold d-flex align-items-center" for="SelectedCountries">Selected Countries</label>
                                    </div>
                                    <div class="ps-4">
                                      <input class="form-control" type="text" placeholder="Type Country name">
                                    </div>
                                  </div>
                                  <div class="mb-0">
                                    <div class="form-check mb-1">
                                      <input class="form-check-input" type="radio" name="shippingRadio" id="Localdelivery">
                                      <label class="form-check-label fw-bold" for="Localdelivery">Local delivery</label>
                                    </div>
                                    <div class="ps-4">
                                      <p class="mb-0">Only available with Shipping method: <a href="#!">Fullfilled by Admin</a></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="Attributes">
                              <h6 class="mb-3">Attributes</h6>
                              <div class="form-check">
                                <input class="form-check-input" id="fragileCheck" type="checkbox">
                                <label class="form-check-label text-900 fs-0" for="fragileCheck">Fragile Product</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" id="biodegradableCheck" type="checkbox">
                                <label class="form-check-label text-900 fs-0" for="biodegradableCheck">Biodegradable</label>
                              </div>
                              <div class="mb-3">
                                <div class="form-check"><input class="form-check-input" id="frozenCheck" type="checkbox" checked="checked">
                                  <label class="form-check-label text-900 fs-0" for="frozenCheck">Frozen Product</label>
                                  <input class="form-control" type="text" placeholder="Max. allowed Temperature" style="max-width: 350px;">
                                </div>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" id="productCheck" type="checkbox" checked="checked">
                                <label class="form-check-label text-900 fs-0" for="productCheck">Expiry Date of Product</label>
                                <input class="form-control" id="inventory" type="date">
                              </div>
                            </div>
                            <div class="tab-pane fade" id="Advanced">
                              <h6 class="mb-3">Advanced</h6>
                              <div class="row g-3">
                                <div class="col-12 col-lg-6">
                                  <label class="mb-2">Product ID Type</label>
                                  <select class="form-select">
                                    <option selected="selected">ISBN</option>
                                    <option value="1">UPC</option>
                                    <option value="2">EAN</option>
                                    <option value="3">JAN</option>
                                  </select>
                                </div>
                                <div class="col-12 col-lg-6">
                                  <label class="mb-2">Product ID</label>
                                  <input class="form-control" type="text" placeholder="ISBN Number">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                       </div>

                  </div>

                  <div class="tab-pane fade" id="primaryprofile" role="tabpanel">

                    <div class="col-12 d-flex justify-content-end ">
                      <button type="button" class="btn btn-outline-light px-5 radius-30 text-center"><i class="fadeIn animated bx bx-list-plus"></i>&nbsp;Group</button>
                    </div>

                    <div class="row mt-3">

                      <div class="col-6">
                        <label for="inputReligion" class="form-label">Event Type</label>
                        <select class="form-select border-3" id="inputSelectCountry" aria-label="Default select example">
                        <option selected="" value="Catholic">Bible Study</option>
                        <option value="Baptist">Baptist</option>
                        <option value="Baptist">Islam</option>
                        <option value="Christianity ">Sunday Worship</option>
                        </select>
                      </div>

                      <div class="col-8 "> 
                        <label for="Collection" class="form-label fw-bold">Event Title</label>
                        <input type="text" class="form-control" id="Collection" placeholder="">
                      </div>

                      <div class="col-2">
                        <label for="Collection" class="form-label fw-bold">Date</label>
                        <input type="text" class="form-control" id="Collection" placeholder="">
                      </div>
                      <div class="col-2">
                        <label for="Collection" class="form-label fw-bold">Time</label>
                        <input type="text" class="form-control" id="Collection" placeholder="">
                      </div>
                    </div>

                    <div class="row row-cols-1 row-cols-lg-3 g-3 border-bottom pb-3 pt-3">
                      <div class="col">
                        <div class="card">
                          <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                            <h5 class="card-title inline">Worship Team</h5>
                            <button class="font-18 text-white btn btn-outline-success px-3 inline">	<i class="fadeIn animated bx bx-mail-send"></i></button>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Church Person 1</li>
                            <li class="list-group-item">Church Person 2</li>
                            <li class="list-group-item">Church Person 3</li>
                          </ul>
                        </div>
                      </div>

  

                    </div>

                    
      
                    <div class="row pt-3">
                      <div class="col d-flex justify-content-end">
                        <button type="button" class="btn btn-success me-3">Save</button>
                        <button type="button" class="btn btn-danger">Clear </button>
                      </div>

                      
                    </div>

                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>


      <div class="row">
        <div class="col-12 col-lg-3">
          <div class="card">
            <div class="card-body d-flex align-items-center justify-content-center">
                <div class="mb-2 d-flex align-items-center">
                    <input type="text" class="form-control date-inline mb-3 d-none"  />
                </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
                <h6>Calendar Filters</h6>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Meetings</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Workshops</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Outreaches</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Bible Study</label>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-9">
          <div class="card">
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!--end row-->
    </main>
     <!--end main content-->

