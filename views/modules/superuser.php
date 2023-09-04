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
                                    <input class="form-control px-2 " type="search" id="searchChurch" placeholder="Search Church">
                                </div>
                                <!-- ALIGN SA CENTER -->
                                <div class="">  
                                <button class="btn btn-outline-success rounded-5 btn-sm px-3"><i class="fadeIn animated bx bx-check"></i></button>
                                    <button class="btn btn-outline-danger rounded-5 btn-sm px-3"><i class="fadeIn animated bx bx-x"></i></button>

                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body " scrollable-y="true">
                        <div>
                        

                            <div class="registration_churches" id="registration_churches">
                            <?php
                                $churches = (new ControllerSuperuser)->ctrShowChurchList(0);
                                foreach($churches as $key => $value){
                                echo '
                                <div class="church_container"> <!-- Wrap each church entry in a container -->
                                    <div class="d-flex align-items-center approval_churches gap-3">
                                    <div class="">
                                        <img src="views/images/ourlady.jpg" alt="" width="50" height="50" class="rounded-circle">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">'.$value["church_name"].'</h6> 
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Bata, Bacolod City</span>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Negros Occidental, Philippines</span>
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
                        <div>
                        

                            <div class="registration_churches scrollable-left-superuser" id="registration_churches">
                                <?php
                                    $churches = (new ControllerSuperuser)->ctrShowRejectedChurches(0);
                                    foreach($churches as $key => $value){
                                        echo '

                                        <div class="d-flex align-items-center gap-3">
                                            <div class="">
                                                <img src="views/images/ourlady.jpg" alt="" width="50" height="50" class="rounded-circle">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1 fw-bold">'.$value["church_name"].'</h6> 
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Bata, Bacolod City</span>
                                                <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Negros Occidental, Philippines</span>
                                            </div>
                                            <div class="church_div">
                                                <input type="text" name="trans_type" id="church_id" value='.$value["churchID"].' name="church_id" style="display:none;" required>
                                                <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtn" >View Details </button>
                                                <button type="button" class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptBtn" onclick="changeButtonText(this)">Accept </button>
                                            </div>
                                        </div>
                                        <hr>
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


                    </div>
                </div>
                <div class="card-body">
                    <div >


                        <div class="accepted_churches" id="accepted_churches">
               
                            <?php
                            $churches = (new ControllerSuperuser)->ctrShowChurchList(1);
                            foreach($churches as $key => $value){
                                echo '
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <img src="views/images/ch1.jpg" alt="" width="50" height="50" class="rounded-circle">
                                        </div>
                                        <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">'.$value["church_name"].' </h6>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success ">Mansilingan, Bacolod City</span>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success ">Negros Occidental, Philippines</span>
                                        <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary ">May 15, 2023</span>    
                                    </div>
                                    <div class="">
                                        <button href="javascript:;"  class="btn btn-outline-primary rounded-5 btn-sm px-3 btn-hover" onclick="changeButtonText(this)">Activate</button>
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
