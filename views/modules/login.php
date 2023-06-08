 <!--authentication-->

 <div class="container-fluid" style="margin-top:130px;">
	<div class="row ">
		<div class="d-flex justify-content-center align-items-center">
			<div class="col-12 col-md-8 col-lg-6 col-xl-4 col-sm-10" >
				<div class="card border-3 rounded-5 ">
					<div class="card-body p-5">
						<div class=" text-center">
							<img src="views/images/logo.png" class="align-center mb-4" width="100" alt="">
							<h1 class="fw-bold" >Welcome to Levites</h1>
							<p class="mb-0">Enter your credentials to login your account</p>
						</div>
						
 				
						<div class="form-body mt-4">	
							<form class="row g-3" id="loginForm" method="POST">
								<div class="col-12">
									<label for="inputEmailAddress" class="form-label">Username</label>
									<input type="text" class="form-control" id="inputEmailAddress" placeholder="jhon@example.com" name="username">
								</div>
								<div class="col-12">
									<label for="inputChoosePassword" class="form-label">Password</label>
									<div class="input-group" id="show_hide_password">
										<input type="password" class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> 
								<a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
									</div>
								</div>
								<div style="display:flex; flex-direction:row; justify-content:space-between;" >
									<div class="col-md-6 text-start">
										<div class="form-check form-switch">
											<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
											<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
										</div>
									</div>
									<div class="col-md-6 text-end"><a href="forgotpassword"  style="background: -webkit-radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Forgot Password ?</a>
									</div>
								</div>
								<div class="col-12">
									<div class="d-grid">
									<button type="submit" form="loginForm"  class="btn text-white" id="loginBtn" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">Login</a>
									</div>
								</div>
								<div class="col-12">
									<div class="text-start" >
										<p class="mb-0">Don't have an account yet? <a href="churchregistration" style="background: -webkit-radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Sign up here</a>
										</p>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--end row-->
	</div>
</div>
	
    <!--authentication-->

