<!--start main content-->
<div class="overlay">
      <div class='loader position-absolute top-50 start-50 translate-middle'><img src="views/images/logoloader.gif" alt=""></div>
    </div>
<main class="page-content">

    <div class="row  py-3">
        <div class="col-12 col-lg-6 col-xl-7">  
            <div class="row ">
                <div class="col-12 col-lg-12 col-xl-12 d-flex ">
                    <div class="card w-100 mx-10 mb-0 scrollable-left-churchadmin">
                        <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center py-2 px-2">
                                <div class="px-2">
                                    <h6 class="mb-0 fw-bold"><i class="lni lni-envelope m-2"></i>Request Collaboration</h6>
                                </div>
                                <!-- MARGIN RIGHT -->
                                <div class="ms-auto me-2">
                               
                                </div>
                                <!-- ALIGN SA CENTER -->
                                <div class="">  

                                    <button class="btn btn-outline-success rounded-5 btn-sm pr-3 " data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal">Create Request</button>
                    
                                </div>
                            </div>
                        </div>


                        <div class="card-body" scrollable-y="true">
                        <?php 

                            $requests = (new CollaborationController)->ctrshowPendingRequest();
                            foreach($requests as $key => $value){

                                echo '
                                <div class="team-list reqlist">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                        <img src="views/images/ch3.jpg" alt="" width="50" height="50" class="rounded-circle">
                                        </div>
                                        <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">'.$value['churchname2'].'</h6>
                                        <span class="badge bg-warning bg-warning-subtle text-warning border border-opacity-25 border-warning">Pending Request</span>
                                        
                                        </div>
                                        <div class="">
                                            <input type="text" id="church_id" value='.$value['collabID'].' churchid='.$value['churchid2'].' churchname='.$value['churchname2'].' style="display:none;">
                                            <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                            <button class="btn btn-outline-danger rounded-5 btn-sm px-3 pendcan cancelPending">Cancel </button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                '
                                ;

                            }
                        
                        
                        
                        
                        ?>

                       


                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-12 col-lg-12 col-xl-12 d-flex ">
                    <div class="card w-100 mx-10 mb-0 scrollable-left-churchadmin">
                        <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center py-2 px-2">
                                <div class="px-2">
                                    <h6 class="mb-0 fw-bold"> <i class="fadeIn animated bx bx-church fs-4 m-2"></i>Church Collaboration</h6>
                                </div>
                                <!-- MARGIN RIGHT -->
                                <div class="ms-auto me-2">
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

                        <?php 

                            $requests = (new CollaborationController)->ctrshowRequests();
                            foreach($requests as $key => $value){
     

                                echo '
                                <div class="team-list">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                        <img src="views/images/ch1.2.jpg" alt="" width="50" height="50" class="rounded-circle">
                                        </div>
                                        <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">'.$value['churchname1'].'</h6>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Mansilingan, Bacolod City</span>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Negros Occidental, Philippines</span>
                                        </div>
                                        <div class="">
                                            <input type="text" id="church_id" value='.$value['collabID'].' churchid='.$value['churchid1'].' churchname="'.$value['churchname1'].'"  style="display:hidden;">
                                            <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button>
                                            <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptCollab">Accept </button>
                                            <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectCollab">Reject </button>
                                        </div>
                                    </div>
                                </div>

                                '
                                ;

                            }
                            ?>


                        </div>
                    </div>
                </div>
               

            </div>

            <div class="row mt-3">
                <div class="col-12 col-lg-12 col-xl-12 d-flex ">
                    <div class="card w-100 mx-10 mb-0 scrollable-left-churchadmin">
                        <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center py-2 px-2">
                                <div class="px-2">  
                                    <h6 class="mb-0 fw-bold"> <i class="fadeIn animated bx bx-church fs-4 m-2"></i>Rejected Collaboration</h6>
                                </div>  
                                <!-- MARGIN RIGHT -->
                                <div class="ms-auto me-2">
                                    <input class="form-control px-2 " type="search"  placeholder="Search Church">
                                </div>
                                <!-- ALIGN SA CENTER -->
                            </div>
                        </div>
                        <div class="card-body" scrollable-y="true">

                        <?php 

                            $requests = (new CollaborationController)->ctrshowRejected();
                            foreach($requests as $key => $value){
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

                
                                echo '
                                <div class="team-list">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                        <img src="views/images/ch1.2.jpg" alt="" width="50" height="50" class="rounded-circle">
                                        </div>
                                        <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">'.$churchname.'</h6>
                           
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Mansilingan, Bacolod City</span>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Negros Occidental, Philippines</span>
                                        </div>
                                        <div class="">
                                        <input type="text" id="church_id" value='.$value['collabID'].' churchid='.$churchid.' style="display:none;">
                                        <button type="button" class="btn btn-outline-secondary rounded-5 btn-sm pr-3 viewBtnAdmin">View Details</button> 
                                        </div>
                                    </div>
                                </div>
                                '
                                ;

                            }
                            ?>


                        </div>
                    </div>
                </div>
               

            </div>
            

            
        </div>

        <div class="col-12 col-lg-6 col-xl-5 d-flex">
            <div class="card w-100 mb-0 scrollable-right-churchadmin">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div class="">
                        <h6 class="mb-0 fw-bold"><i class="lni lni-users m-2"></i>Affilliated Churches</h6>
                        </div>
                        <div class="ms-auto me-2">
                            <input class="form-control px-2 " type="search"  placeholder="Search Church">
                        </div>
                    </div>
                </div>
                <div class="card-body">


                   <?php 

                            $requests = (new CollaborationController)->ctrshowAffilatedChurches();
                
                            foreach($requests as $key => $value){
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



                                echo '
                                <div class="team-list">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="views/images/ch1.2.jpg" alt="" width="50" height="50" class="rounded-circle">
                                            </div>
                                            <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-bold">'.$churchname.' </h6>
                                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success ">Mansilingan, Bacolod City</span>
                                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success ">Negros Occidental, Philippines</span>
                                            <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary ">May 15, 2023</span>    
                                        </div>
                                        <div class="">
                                            <input type="text" name="trans_type" id="church_id" value='.$value['collabID'].' name="church_id" style="display:none;" required>
                                            <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeCollab">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                '
                                ;
                            }
                            ?>
                    
                    

                </div>
            </div>
        </div>


    </div>



   
    <div class="row py-3 mt-5">

        <div class="col-12 col-lg-6 col-xl-7 d-flex ">  
            <div class="card w-100 mx-10 mb-0 scrollable-left-churchadmin">
                <div class="card-header bg-transparent">
                <div class="d-flex align-items-center py-2 px-2">
                    <div class="px-2">
                       <h6 class="mb-0 fw-bold"><i class="fadeIn animated bx bx-user-plus m-2"></i>Membership Request</h6>
                    </div>
                    <div class="ms-auto me-2">
                            <input class="form-control px-2 " type="search"  placeholder="Search Name">
                        </div>
                    <div class="">
                        <button class="btn btn-outline-success rounded-5 btn-sm px-3"><i class="fadeIn animated bx bx-check"></i></button>
                        <button class="btn btn-outline-danger rounded-5 btn-sm px-3"><i class="fadeIn animated bx bx-x"></i></button>
                    </div>
                </div>
                </div>
                <div class="card-body" scrollable-y="true">
                <?php 
             
                            $requests = (new CollaborationController)->ctrshowMembership();
                            foreach($requests as $key => $value){
        

                                echo '
                                <div class="team-list churchDiv">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                        <img src="views/images/ch1.2.jpg" alt="" width="50" height="50" class="rounded-circle">
                                        </div>
                                        <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">'.$value['memberName'].'</h6>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Mansilingan, Bacolod City</span>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">Negros Occidental, Philippines</span>
                                        </div>
                                        <div class="">
                                            <input type="text"  value="'.$value['mshipID'].'"  acc_id="'.$value['memberID'].'" acc_name="'.$value['memberName'].'" style="display:none;" required>
                                            <button class="btn btn-outline-success rounded-5 btn-sm pr-3 acceptMember">Accept </button>
                                            <button class="btn btn-outline-danger rounded-5 btn-sm px-3 rejectMember">Reject </button>
                                        </div>
                                    </div>
                                </div>

                                '
                                ;

                            }
                            ?>
                    </div>
                    <hr>
                </div>
            </div>
        

        <div class="col-12 col-lg-6 col-xl-5 d-flex">
            <div class="card w-100 mb-0 scrollable-right-churchadmin">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <h6 class="mb-0 fw-bold"><i class="fadeIn animated bx bx-user-circle m-2"></i>Members</h6>
                        </div>
                        <div class="ms-auto me-2">
                            <input class="form-control px-2 " type="search"  placeholder="Search Name">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php 

                        $requests = (new CollaborationController)->ctrshowAffilatedMember();
                        foreach($requests as $key => $value){
                            
                    
                            echo '
                            <div class="team-list">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <img src="views/images/ch1.2.jpg" alt="" width="50" height="50" class="rounded-circle">
                                        </div>
                                        <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold">'.$value['memberName'].' </h6>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success ">Mansilingan, Bacolod City</span>
                                        <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success ">Negros Occidental, Philippines</span>
                                        <span class="badge bg-success bg-primary-subtle text-primary border border-opacity-25 border-primary ">May 15, 2023</span>    
                                    </div>
                                    <div class="">
                                        <input type="text" name="trans_type" id="church_id" value='.$value['mshipID'].' name="church_id" style="display:none;" required>
                                        <button class="btn btn-outline-danger rounded-5 btn-sm px-3 removeMember">Remove</button>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            '
                            ;
                        }
                        ?>


                </div>
            </div>
        </div>
    </div>
    




</main>



<div class="col">
  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered moda-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Request Collaboration</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" >
          <div class="col-12 col-sm-12   col-md-12 col-lg-12 col-xl-12">
            <label for="single-select-clear-field" class="form-label">Search Churches</label>
            <input type="search" id="searchBar" class="form-control" placeholder="Search Churches">
            <ul id="searchResults" class="list-group mt-2 "></ul>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary rounded-5 btn-md border-2 pr-3 "
            data-bs-dismiss="modal">Cancel</button>
          <button type="submit" id="sendRequestBtn" class="btn btn-outline-success rounded-5 btn-md border-2 pr-3 ">Send
            Request</button>
        </div>
      </div>
    </div>
  </div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="churchAdminModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Church Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body church_details_div">
                <div class="form-body g-3">
                    <form role="form" id="viewrequestdetails-form " method="POST" autocomplete="nope" class="viewrequestdetailsForm row g-3">
                        <input type="text" name="trans_type" id="trans_type" value="New" style="display:none;" required>
                        <div class="col-md-2 form-group pt-3 pr-3" style="display:block;">
                                <label for="churchID" class="form-label">ID</label>
                                <input id="admin_churchID" class="form-control" name="admin_churchID" type="text" style="font-size:1em;"readonly >
                        </div>

                        <div class="row g-3">        
                            <div class="col-12">
                                <label for="inputChurchName" class="form-label">Church Name</label>
                                <input type="text" class="form-control border-3" id="admin_church_name" name="admin_churchName" readonly>
                            </div>             
                        </div>
                        
                        <div class="row g-3">     

                            <div class="col-6">
                                <label for="inputEmailAddress" class="form-label">Church Email Address</label>
                                <input type="email" class="form-control border-3" id="admin_church_email" name="email" readonly>
                            </div> 

                            <div class="col-6">
                                <label for="inputReligion" class="form-label">Religion</label>
                                <input type="email" class="form-control border-3" id="admin_church_religion" name="email" readonly>
                            </div>

                            
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Church Address</label>
                                <input type="text" class="form-control border-3" id="admin_church_address" name="churchAddress" placeholder="Brgy. Singcang Airport, Raquel St." value="Brgy. Singcang Airport, Raquel St." readonly>
                            </div>
                        
                        </div>


                        <div class="row g-3">
                            <div class="col-6">
                            <label for="inputSelectCountry" class="form-label">City</label>
                            <input type="email" class="form-control border-3" id="admin_church_city" name="email" readonly>
                            </div>
                            <div class="col-6">
                                <label for="inputNum" class="form-label">Telephone Number</label>
                                <input type="text" class="form-control border-3" id="admin_church_telnum" name="telnum" placeholder="432-0048" value="432-0048">
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
