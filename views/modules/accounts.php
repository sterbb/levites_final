<!--start main content-->
<main class="page-content">

        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 row-cols-xl-3 row-cols-xxl-3">
          <div class="col">
            <div class="card radius-10 border-0 border-start border-primary border-4" type="button" id="user1">
              <div class="card-body">
                <div class="d-flex align-items-center ">
                  <div class="">
                    <p class="mb-1">Activated</p>
                    <h4 class="mb-0 text-primary">User 1</h4>
                  </div>

                  <div class="ms-auto">
                    <div class="widget-icon bg-primary text-white">
                      <i class="fadeIn animated bx bx-user"></i>
                    </div>
                    <p class="mb-0 text-primary">Online</p>
                  </div>
              

                </div>
              </div>
            </div>
           </div>

           <div class="col">
            <div class="card radius-10 border-0 border-start border-success border-4 " type="button" id="user2">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="">
                    <p class="mb-1">Activated</p>
                    <h4 class="mb-0 text-success">User 2</h4>
                  </div>

                  <div class="ms-auto">
                    <div class="widget-icon bg-success text-white">
                      <i class="fadeIn animated bx bx-user"></i>
                    </div>
                    <p class="mb-0 text-success">Online</p>
                  </div>


                </div>
              </div>
            </div>
           </div>

           <div class="col">
            <div class="card radius-10 border-0 border-start border-danger border-4" type="button" id="user3">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="">
                    <p class="mb-1">Nonactivated</p>
                    <h4 class="mb-0 text-danger">User 3</h4>
                  </div>
                  
                  <div class="ms-auto">
                    <div class="widget-icon bg-danger text-white">
                      <i class="fadeIn animated bx bx-user"></i>
                    </div>
                    <p class="mb-0 text-danger">Offline</p>
                  </div>

                </div>
              </div>
            </div>
           </div>

           <div class="col">
            <div class="card radius-10 border-0 border-start border-danger border-4" type="button" id="addSubUser">
              <div class="card-body">

              </div>
            </div>
           </div>

        </div><!--end row-->


        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3 bg-transparent d-flex justify-content-between align-items-center">
								<h5 class="mb-0">Edit User 2 Account</h5>
                <button class="btn btn-danger">Deactivate</button>
							</div>
							<div class="card-body p-4">
              
								<form role="form" id="UserAccountForm" method="POST" autocomplete="nope" class="UserAccountForm" >

                <h6 class="mb-0 text-uppercase mt-2">Account Access  </h6>
				          <hr>
                  <div class="d-flex align-items-center gap-5 flex-wrap mt-5 mb-5">
                    <div class="form-check form-switch form-check-success">
                      <input class="form-check-input" type="checkbox" role="switch" id="calendar_access" value="C" checked>
                      <label class="form-check-label " for="flexSwitchCheckDefault1" style="font-size:18px">Calendar of Activities</label>
                    </div>
                    <div class="form-check form-switch form-check-success">
                      <input class="form-check-input" type="checkbox" role="switch" id="storage_access" value="S" checked>
                      <label class="form-check-label" for="flexSwitchCheckSuccess" style="font-size:18px">File Storage</label>
                    </div>
                    <div class="form-check form-switch form-check-success">
                      <input class="form-check-input" type="checkbox" role="switch" id="request_access" value="R" checked>
                      <label class="form-check-label" for="flexSwitchCheckDanger" style="font-size:18px">Requests</label>
                    </div>

                  </div>

                  <hr>
                
                  <div class="row mb-5 mt-5">
										<label for="input37" class="col-sm-3 col-form-label">Members</label>
										<div class="col-sm-9">
                      <select class="form-select border-3" id="subuserMember" aria-label="Default select example">
                      <?php   $memBer = (new ControllerUserAccount)->ctrShowUserAccount();
                          foreach($memBer as $key => $value){
                            echo '<option selected="" value="'.$value['memberID'].'">'.$value['memberName'].'</option>';

                          };
                          ?>
                        </select>
										</div>
									</div>

                  <div class="row mt-5 mb-2">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<div class="d-md-flex d-grid align-items-center justify-content-end  gap-3">
												<button type="button" id="submitMemberBtn" class="btn btn-outline-success px-4" name="submit2">Submit</button>
												<button type="resetMember" class="btn btn-outline-danger px-4">Clear</button>
											</div>
										</div>
									</div>
                  
                  <hr>
									
									<div class="row mb-3 mt-5">
										<label for="username" class="col-sm-3 col-form-label">Username</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="user-name" name="username" placeholder="Username">
										</div>
									</div>
									
									<div class="row mb-3">
										<label for="password" class="col-sm-3 col-form-label">Password</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="user-password" name="password" placeholder="Password">
										</div>
									</div>
									<div class="row mb-3">
										<label for="confirm_password" class="col-sm-3 col-form-label">Confirm Password</label>
										<div class="col-sm-9 " id="show_hide_password">
											<input type="text" class="form-control" id="con-password" name="confirm_password" placeholder="Confirm Password">
										</div>
									</div>


															
									

                
                   

                  <div class="row mt-5">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<div class="d-md-flex d-grid align-items-center justify-content-end  gap-3">
												<button type="button" class="btn btn-outline-success px-4" id="submitUser" name="submit2">Submit</button>
												<button type="reset" class="btn btn-outline-danger px-4">Clear</button>
											</div>
										</div>
									</div>


								</form>

							</div>
						</div>
					</div>
				</div>
				<!--end row-->

     </main>
     <!--end main content-->