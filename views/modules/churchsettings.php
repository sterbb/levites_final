<main class="page-content"> 

<div class="card overflow-hidden">
    <div class="profile-ourlady bg-dark position-relative mb-4">
        <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">
            <img src="views/images/ch1.jpg" alt="...">

        </div>
        <button class="position-absolute btn btn-secondary rounded-circle" style=" top:190px; left:140px; font-size:18px;"><i class="fadeIn animated bx bx-edit"></i></button>
        <button class="position-absolute btn btn-secondary rounded-circle" style=" top:140px; right:140px; font-size:20px;"><i class="fadeIn animated bx bx-edit"></i></button>
    </div>
    <div class="card-body">
    <div class="mt-5 d-flex align-items-start justify-content-between">
        <div class="">
        <h3 class="mb-2">OUR LADY OF THE MIRACULOUS MEDAL PARISH</h3>
        <div class="">
            <span class="badge rounded-pill bg-primary">Mansiligan, Bacolod City</span>
            <span class="badge rounded-pill bg-primary">Negros Occidenal Philippines</span>
        </div>
        </div>
        <div class="">
                     <a href="javascript:;" class="btn btn-danger"><i class="bi bi-person-x"></i>Deactivate Account</a>
                  </div>
    </div>  
    </div>
</div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-body p-4">
                    <form id="jQueryValidationForm">
                        <div class="row mb-3">
                            <label for="input35" class="col-sm-3 col-form-label">Church Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="input35" name="yourname" placeholder="Enter Your Name">
                            </div>
                        </div>
                        <div class="row mb-3">
                                <label for="inputAddress" class="form-label">Church Address *</label>
                                <input type="text" class="form-control border-3" id="tns-churchAddress" name="churchAddress" placeholder="Brgy. Singcang Airport, Alice St.">
                        </div>
                        <div class="row mb-3">
                            <label for="input36" class="col-sm-3 col-form-label">Contact Details</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="input36" name="phone" placeholder="Phone No">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input37" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="input37" name="username" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input37a" class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="input37a" name="email" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input38" class="col-sm-3 col-form-label"> Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="input38" name="password" placeholder="Choose Password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input38a" class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="input38a" name="confirm_password" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="row mb-3">
                                <label for="inputReligion" class="form-label">Religion *</label>
                                <select class="form-select border-3" id="tns-religion" name="religion" aria-label="Default select example">
                                <option selected="" value="Catholic">Catholicism</option>
                                <option value="Baptist">Baptist</option>
                                <option value="Baptist">Islam</option>
                                <option value="Christianity ">Christianity </option>
                                </select>
                        </div>
                        <div class="row mb-3">
                                <label for="inputCity" class="form-label">City *</label>
                                <input type="text" class="form-control border-3" id="tns-city" name="city" placeholder="Bacolod City">
                        </div>

                       <div class="row mb-3">
                                <label for="inputSelectCountry" class="form-label">Country *</label>
                                <select class="form-select border-3" id="tns-country" name="country" aria-label="Default select example">
                                <option selected="" value="Philippines">Philippines</option>
                                <option  value="India">India</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="America">America</option>
                                <option value="Dubai">Dubai</option>
                                </select>
                        </div>

    
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="d-flex align-items-end justify-content-end">
                                    <button type="submit" class="btn text-white" name="submit2" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">Submit</button>
                                    <button type="reset" class="btn btn-light px-4">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                    <h5 class="mb-3">Location</h5>
                        <div id="marker-map" class="gmaps"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body d-flex justify-content-around align-items-center">
                        <div class="row">
                            <div class="col-4">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected="">GCash</option>
                                    <option value="1">PNB</option>
                                    <option value="2">BDO</option>
                                    <option value="3">Metrobank</option>
                                    <option value="3">BPI</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" placeholder="" aria-label="default input example">
                            </div>
                            <div class="col-1">
                                <button type="button" class="btn btn-outline-success"><i class="fadeIn animated bx bx-plus"></i></button>
                            </div>
                        </div>
                    
                 
   
                    </div>

                    <ul class="list-group list-group-flush mb-0">
                        <li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent"><img src="views/images/gcash2.png" alt="GCash" style="height:50px; width:100px; "> <p>09772535688</p>
                        </li>
    
                     </ul>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

    <div class="row">
        <div class="col">

                <div class="card">
                     <h2 class="text-center pt-3 mb-0   ">MISSION</h2>
                    <div class="card-body d-flex justify-content-around align-items-center">
                        <textarea class="form-control" id="input11" placeholder="" rows="3" style="height: 250px;"></textarea>
                    </div>
                </div>
        

        </div>


        <div class="col">
            <div class="card">
                    <h2 class="text-center pt-3 mb-0   ">VISION</h2>
                <div class="card-body d-flex justify-content-around align-items-center">
                    <textarea class="form-control" id="input11" placeholder="" rows="3" style="height: 250px;"></textarea>
                </div>
            </div>
        </div>
    </div>

  
</main>