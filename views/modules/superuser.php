<!--start main content-->
<main class="page-content">

    <div class="row ">
        <div class="col-12 col-lg-6 col-xl-7 d-flex ">  
            <div class="card w-100 mx-10">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center py-2 px-2">
                        <div class="px-2">
                            <h6 class="mb-0 fw-bold"> <i class="fadeIn animated bx bx-church text-5"></i>Account Apporval</h6>
                        </div>
                        <!-- MARGIN RIGHT -->
                        <div class="ms-auto me-3">
                            <input class="form-control px-2 " type="search"  placeholder="Search Church">
                        </div>
                        <!-- ALIGN SA CENTER -->
                        <div class="">  
                        <button class="btn btn-outline-success rounded-5 btn-sm px-3"><i class="fadeIn animated bx bx-check"></i></button>
                             <button class="btn btn-outline-danger rounded-5 btn-sm px-3"><i class="fadeIn animated bx bx-x"></i></button>

                            
                        </div>
                    </div>
                </div>
                <div class="card-body" scrollable-y="true">
                <div class="team-list">
                    <div class="d-flex align-items-center gap-3">
                        <div class="">
                        <img src="assets/images/avatars/01.png" alt="" width="50" height="50" class="rounded-circle">
                        </div>
                        <div class="flex-grow-1">
                        <h6 class="mb-1 fw-bold">Our Lady of the Miraculous Medal Parish    </h6>
                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Mansilingan, Bacolod City</span>
                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Negros Occidental, Philippines</span>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal">View Details </button>
                            <button class="btn btn-outline-success rounded-5 btn-sm pr-3">Accept </button>
                                <button class="btn btn-outline-danger rounded-5 btn-sm px-3">Reject </button>
                           
                        </div>
                    </div>
                    <hr>
                </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-5 d-flex">
            <div class="card w-100">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div class="">
                        <h6 class="mb-0 fw-bold">Approved Churches</h6>
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
                    <div class="team-list">
                        <div class="d-flex align-items-center gap-3">
                            <div class="">
                                <img src="assets/images/avatars/01.png" alt="" width="50" height="50" class="rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold">Our Lady of the Miraculous Medal Parish    </h6>
                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success ">Mansilingan, Bacolod City</span>
                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success ">Negros Occidental, Philippines</span>
                                <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary ">May 15, 2023</span>    
                            </div>
                            <div class="">
                                <button href="javascript:;"  class="btn btn-outline-primary rounded-5 btn-sm px-3 btn-hover" onclick="changeButtonText(this)">Activate</button>
                            </div>
                        </div>
                        <hr>
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
                  </script>

</main>

 <!-- Modal -->
 <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Church Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-body g-3">
                    <form role="form" id="churchAccounts-form " method="POST" autocomplete="nope" class="churchAccountsForm row g-3">
                        <input type="text" name="trans_type" id="trans_type" value="New" style="display:none;" required>
                        <div class="col-md-2 form-group pt-3 pr-3" style="display:none;">
                                <label for="churchID" class="form-label">ID</label>
                                <input id="churchID" class="form-control" name="churchID" type="text" style="font-size:1em;"readonly >
                        </div>

                        <div class="row g-3">        
                            <div class="col-12">
                                <label for="inputChurchName" class="form-label">Church Name</label>
                                <input type="text" class="form-control border-3" id="tns-churchName" name="churchName" placeholder="Our Lady of Peace and Good Voyage" value="Our Lady of Peace and Good Voyage" readonly>
                            </div>             
                        </div>
                        
                        <div class="row g-3">     

                            <div class="col-6">
                                <label for="inputEmailAddress" class="form-label">Church Email Address</label>
                                <input type="email" class="form-control border-3" id="tns-email" name="email" placeholder="example@user.com" value="ourladyofpeaceandgoodvoyage001@gmail.com" readonly>
                            </div> 

                            <div class="col-6">
                                <label for="inputReligion" class="form-label">Religion</label>
                                <select class="form-select border-3" id="tns-religion" name="religion" aria-label="Default select example" disabled>
                                <option selected="" value="Catholic">Catholic</option>
                                <option value="Baptist">Baptist</option>
                                <option value="Born Again">Born Again </option>
                                </select>
                            </div>

                            
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Church Address</label>
                                <input type="text" class="form-control border-3" id="tns-churchAddress" name="churchAddress" placeholder="Brgy. Singcang Airport, Raquel St." value="Brgy. Singcang Airport, Raquel St." readonly>
                            </div>
                        
                        </div>


                        <div class="row g-3">
                            <div class="col-6">
                            <label for="inputSelectCountry" class="form-label">City</label>
                                <select class="form-select border-3" id="tns-country" name="country" aria-label="Default select example" disabled>
                                <option selected="" value="Philippines">Bacolod City</option>
                                <option  value="India">India</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="America">America</option>
                                <option value="Dubai">Dubai</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="inputNum" class="form-label">Telephone Number</label>
                                <input type="text" class="form-control border-3" id="num-telnum" name="telnum" placeholder="432-0048" value="432-0048">
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <label for="inputSelectCountry" class="form-label">Province</label>
                                <select class="form-select border-3" id="tns-country" name="country" aria-label="Default select example" disabled>
                                <option selected="" value="Philippines">Negros Occidental</option>
                                <option  value="India">India</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="America">America</option>
                                <option value="Dubai">Dubai</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="inputSelectCountry" class="form-label">Country</label>
                                <select class="form-select border-3" id="tns-country" name="country" aria-label="Default select example" disabled>
                                <option selected="" value="Philippines">Philippines</option>
                                <option  value="India">India</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="America">America</option>
                                <option value="Dubai">Dubai</option>
                                </select>
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
