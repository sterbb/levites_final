<div id="alertContainer"></div>
<!--Request Password-->
<div class="overlay">
      <div class='loader position-absolute top-50 start-50 translate-middle'><img src="views/images/logoloader.gif" alt=""></div>
    </div>
<body style="background-image: url('views/images/marblebackground.png'); background-size: cover; background-repeat: no-repeat;">
        
<div class="container-fluid m-0 ">
        <div class="row">
           <div class="col-12 col-md-8 col-lg-6 col-xl-6 col-xxl-4 mx-auto mt-5">
            <div class="card rounded-5 border-3">
                <div class="card-header rounded-top-5 border-0 justify-content-center align-items-center d-flex" style="height:80px;  background:linear-gradient(150deg, #AAC4F2, #C9B4ED 100%);">
                    <img src="views/images/SendVerify.png" class="" width="50" alt="">
                
                    
                </div>     

                <div class="card-body p-2  ">
                    <div class="form-body ">
                        <form class="row g-3">
                            <div class="col-12">
                                <h1 for="" style="font-weight:bold; " class="form-label justify-content-center align-items-center d-flex mt-2">Check Your Email</h1>
                            </div>
                            <hr>
                            <div class="col-12 ">
                                <p for="" class="form-label">We've just sent instructions to verify your account</p>
                            </div>
                            
                            <div class="col-12">
    
                                <span for="" class="form-label" style="font-weight:bold; "><?php echo $_COOKIE["current_email"]?><span style="font-weight:normal;">. Follow the next steps in that email.</span></span>
                                
                            </div>

                            
                            <div class="col-12 verification-input" id="verification_code">
                            <input type="text" class="inputClass" id="code1" name="verification_code" maxlength="1" required>
                            <input type="text" class="inputClass" id="code2" name="verification_code" maxlength="1" required>
                            <input type="text" class="inputClass" id="code3" name="verification_code" maxlength="1" required>
                            <input type="text" class="inputClass" id="code4" name="verification_code" maxlength="1" required>
                            <input type="text" class="inputClass" id="code5" name="verification_code" maxlength="1" required>
                            </div>

                            <div class="col-12 mt-5 m-2">
                          
                                <div class="d-flex">
                                    <button id="resendBtn" type="button" class="btn p-3 mb-5"   style="font-weight:bold;  background:linear-gradient(150deg, #AAC4F2, #C9B4ED 100%); border: 1 solid; border-color:black; color:dark; box-shadow: 5px 5px; width: 90%;  margin-left: 10px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                    class="feather feather-rotate-ccw mx-3 text-white"><polyline points="1 4 1 10 7 10"></polyline>
                                    <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path></svg>
                                    <span class="text-white ">Send Verification Again</span></button>
                                </div>
                                <div class="verify-block">
                                <a href="publicregistration">
                                <i class='bx bx-left-arrow-alt fs-1'></i>
                                </a>
                                </div>

                            </div>

                            <div class="col-12 mb-3">
                                <span style="font-weight:normal;">Remember to check your spam folder or unblock janryandivinagracia25@gmail.com if you can't find the message</span></span>
                            </div>
                        </form>
				    </div>
                </div>
            </div>
            <hr>
            <div class="col-12 text-center mb-5">
                <span style="font-weight:normal;">Can't verify your account?</span><a href="">Let us know</a><span> well help!</span>
             </div>
        </div>
    </div><!--end row-->
</div>
</body>

    
