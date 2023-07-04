<body style="background-image: url('views/images/marblebackground.png'); background-size: cover; background-repeat: no-repeat;">
<!--Request Password-->
<div class="container-fluid my-5">
        <div class="row">
           <div class="col-12 col-md-8 col-lg-6 col-xl-6 col-xxl-4 mx-auto">
            <div class="card rounded-5 border-3">
                <div class="card-header rounded-top-5 border-0 justify-content-center align-items-center d-flex" style="height:150px;  background:linear-gradient(150deg, #AAC4F2, #C9B4ED 100%);">
                    <img src="views/images/SendVerify.png" class="" width="100" alt="">
                
                    
                </div>     

                <div class="card-body p-5 ">
                    <div class="form-body ">
                        <form class="row g-3">
                            <div class="col-12 mb-3">
                                <h1 for="" style="font-weight:bold; " class="form-label ">Check Your Email</h1>
                            </div>
                            <hr>
                            <div class="col-12 ">
                                <p for="" class="form-label">We've just sent instructions to reset your account password</p>
                            </div>
                            
                            <div class="col-12">
    
                                <span for="" class="form-label" style="font-weight:bold; "><?php echo $_COOKIE["current_email"]?><span style="font-weight:normal;">. Follow the next steps in that email.</span></span>
                                
                            </div>

                            <div class="col-12 verification-input" id="verification_code">
                            <input type="text" class="forgotInputClass" id="code1" name="verification_code" maxlength="1" required>
                            <input type="text" class="forgotInputClass" id="code2" name="verification_code" maxlength="1" required>
                            <input type="text" class="forgotInputClass" id="code3" name="verification_code" maxlength="1" required>
                            <input type="text" class="forgotInputClass" id="code4" name="verification_code" maxlength="1" required>
                            <input type="text" class="forgotInputClass" id="code5" name="verification_code" maxlength="1" required>
                            </div>

                            <!-- <div class="col-12">
                                <input type="text" class="form-control  border-3" id="verification_code_forget" placeholder="" style="height:150px;font-size:120px;">
                            </div> -->

                            <div class="col-12 mt-5">
                                <div class="d-grid">
                                    <button type="button"  id="resendBtn" class="btn p-3 mb-5"   style="font-weight:bold;  background:linear-gradient(150deg, #AAC4F2, #C9B4ED 100%); border: 1 solid; border-color:black; color:dark; box-shadow: 5px 5px; "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rotate-ccw text-white " style="margin-right:20px; "><polyline points="1 4 1 10 7 10"></polyline><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path></svg><span class="text-white ">Send Verification Again</span></button>
                                </div>
                            </div>
                            <div class="verify-block">
                                <a href="forgotpassword">
                                <i class='bx bx-left-arrow-alt fs-1'></i>
                                </a>
                                </div>

                            <div class="col-12">
                                <span style="font-weight:normal;">Remember to check your spam folder or unblock janryandivinagracia25@gmail.com if you can't find the message</span></span>
                            </div>
                        </form>
				    </div>
                </div>
            </div>
            <hr>
            <div class="col-12 text-center">
                <span style="font-weight:normal;">Can't verify your account?</span><a href="">Let us know</a><span> well help!</span>
             </div>
        </div>
    </div><!--end row-->
</div>
      
</body>

    
