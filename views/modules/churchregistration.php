
<div class="section-authentication-cover">
    <div class="">
      <div class="row g-0">

    

        <div class="col-12 col-xl-5 col-xxl-6 auth-cover-left align-items-center justify-content-center  bg-light  ">
          <div class="card rounded-0 m-3 border-0 rounded-3 ">
            <div class="card-body p-sm-10">
                <div class="text-center">
              <img src="views/img/LEVITES.png" class="mb-4" width="100" alt="">
                        
                           
                        
              <h4 class="fw-bold">Registration</h4>
              <div>
                    <button type="button" class="btn btn-dark"><a  href="publicregistration"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat text-warning"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg></button>
                            <label class="form-check-label mt-1 text-warning" for="flexSwitchCheckChecked" style="display: inline-block">Switch Public Registration to Church Registration</label></a>
                    </div>
            </div>
            
                    

              <div class="form-body g-3">
                <form role="form" id="churchAccounts-form " method="POST" autocomplete="nope" class="churchAccountsForm row g-3">
                        <input type="text" name="trans_type" id="trans_type" value="New" style="display:none;" required>


                        <div class="col-md-2 form-group pt-3 pr-3" style="display:none;">
                                            <label for="churchID" class="form-label">ID</label>
                                            <input id="churchID" class="form-control" name="churchID" type="text" style="font-size:1em;"readonly >
                                    </div>

                    <div class="row g-3">
                        <div class="col-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control border-3" id="tns-username" name="username" placeholder="Jhon">
                        </div>

                            <div class="col-6">
                            <label for="inputChoosePassword" class="form-label">Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0 border-3" id="tns-password" name="password" value="12345678" placeholder="Enter Password">
                                <a href="javascript:;" class="input-group-text bg-transparent border-3"><i class="bi bi-eye-slash-fill"></i></a>
                                </div>
                            </div>     
                            
                            <div class="col-12">
                                <label for="inputChurchName" class="form-label">Church Name</label>
                                <input type="text" class="form-control border-3" id="tns-churchName" name="churchName" placeholder="Our Lady of Peace and Good Voyage">
                            </div>             
                        </div>
                        
                        <div class="row g-3">     

                            <div class="col-6">
                                <label for="inputEmailAddress" class="form-label">Church Email Address</label>
                                <input type="email" class="form-control border-3" id="tns-email" name="email" placeholder="example@user.com">
                            </div> 

                            <div class="col-6">
                                <label for="inputReligion" class="form-label">Religion</label>
                                <select class="form-select border-3" id="tns-religion" name="religion" aria-label="Default select example">
                                <option selected="" value="Catholic">Catholicism</option>
                                <option value="Baptist">Baptist</option>
                                <option value="Baptist">Islam</option>
                                <option value="Christianity ">Christianity </option>
                                </select>
                            </div>

                           
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Church Address</label>
                                <input type="text" class="form-control border-3" id="tns-churchAddress" name="churchAddress" placeholder="Brgy. Singcang Airport, Alice St.">
                            </div>
                     
                        </div>


                        <div class="row g-3">
                            <div class="col-6">
                                <label for="inputCity" class="form-label">City</label>
                                <input type="text" class="form-control border-3" id="tns-city" name="city" placeholder="Bacolod City">
                            </div>
                            <div class="col-6">
                                <label for="inputNum" class="form-label">Telephone Number</label>
                                <input type="text" class="form-control border-3" id="num-telnum" name="telnum" placeholder="432-0048">
                            </div>
                        </div>
                    <div class="row g-3">
                        <div class="col-6">
                                <label for="inputSelectCountry" class="form-label">Country</label>
                                <select class="form-select border-3" id="tns-country" name="country" aria-label="Default select example">
                                <option selected="" value="Philippines">Philippines</option>
                                <option  value="India">India</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="America">America</option>
                                <option value="Dubai">Dubai</option>
                                </select>
                            </div>
                        <div class="col-6">
                            <label for="inputProof" class="form-label">Proof of Legitimacy</label>
                            
                                <input class="form-control form-control-ml" id="profleg" name="profleg" type="file">
                        </div>
                        
                    </div>

                    <div class="row g-3">

                        <div class="col-12">
                            <div class="form-check form-switch border-3">
                            <input class="form-check-input" type="checkbox" id="agree">
                            <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms &amp; Conditions</label>
                            </div>
                        </div>
                        
                        

                        <div class="col-12">
                            <div class="d-grid">
                            <button href="login" class="btn btn-primary border-3">Register</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="text-start">
                            <p class="mb-0">Already have an account? <a href="login">Sign in here</a></p>
                            </div>
                        </div>

                    </div>
  
                </form>
              </div>

          </div>
          </div>
        </div>

        <div class="col-12 col-xl-7 col-xxl-6 auth-cover-right align-items-center justify-content-center d-none d-xl-flex bg-light">

            <div class="card rounded-0 mb-0 border-0 bg-transparent">
            <div class="card-body">
                <img src="views/assets/images/boxed-register.png" class="img-fluid auth-img-cover-login" width="650"
                alt="">
            </div>
            </div>

            </div>

      </div>
      <!--end row-->
    </div>
  </div>


  <!-- Modal -->
<div class="modal fade" id="modal-search-accounts" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CHURCH ACCOUNTS LIST</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>


      <div class="modal-body">
        <table class="table table-hover  datatable-small-font profile-grid-header churchAccountsTable" width="100%" >
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>CHURCH NAME</th>
                    <th>CHURCH ADDRESS</th>
                    <th>TELEPHONE NUMBER</th>
              
                    </tr>
                </thead>
        </table>
      </div>



    </div>
  </div>
</div>