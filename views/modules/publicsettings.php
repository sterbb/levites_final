
<main class="page-content" style="height:100vh;">
    
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 p-5">
            <div class="row">
                <div class="col">
                    <div class="card  border-3 rounded-4">
                        <div class="card-body">
                            <div class="form-body g-3  p-4">
                                <form role="form" id="church-form" method="POST" autocomplete="nope" class="row g-3">
                            
                                        <div class="row g-2">
                                            <div class="col-12">
                                                <label for="inputUsername" class="form-label">Username</label>
                                                <input type="email" class="form-control border-3" id="inputUsername" placeholder="Jhon">
                                            </div>
                                            
                                        </div>

                                        <div class="row g-2">
                                            <div class="col-6">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-3" id="inputChoosePassword" value="12345678" placeholder="Enter Password">
                                                </div>
                                            </div> 

                                            <div class="col-6">
                                                <label for="inputChoosePassword" class="form-label">Confirm Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0 border-3" id="inputChoosePassword" value="12345678" placeholder="Enter Password">
                                                    <a href="javascript:;" class="input-group-text bg-transparent border-3"><i class="bi bi-eye-slash-fill"></i></a>
                                                </div>
                                            </div> 
                                        </div>    
                                            

                                        <div class="row g-2">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input type="email" class="form-control border-3" id="inputEmailAddress" placeholder="example@user.com">
                                            </div> 
                                        </div>
                                        

                                        <div class="row g-2">
                                            <div class="col-6">
                                                <label for="inputName" class="form-label">Name</label>
                                                <input type="text" class="form-control border-3" id="inputName" placeholder="JAY COBB">
                                            </div>

                                            <div class="col-6">
                                                <label for="inputLastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control border-3" id="inputLastName" placeholder="MOYA">
                                            </div>


                                            <div class="col-6">
                                                <label for="inputReligion" class="form-label">Religion</label>
                                                <select class="form-select border-3" id="inputSelectCountry" aria-label="Default select example">
                                                <option selected="" value="Catholic">Catholic</option>
                                                <option value="Baptist">Baptist</option>
                                                <option value="Christian ">Christian</option>
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label for="inputNum" class="form-label">Contact Details</label>
                                                <input type="text" class="form-control border-3" id="inputNum" placeholder="432-0048">
                                            </div>

                                        
                                        </div>
                                       

                                        <div class="row g-2 mt-4 align-items-end d-flex justify-content-end">
                                            

                                            <div class="col-2">
                                                <div class="d-grid">
                                                    <a href="login" class="btn btn-danger border-3">Clear</a>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="d-grid">
                                                    <a href="login" class="btn btn-success border-3">Save</a>
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
    </div>
 </main>