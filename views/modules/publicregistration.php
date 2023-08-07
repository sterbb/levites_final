 <!--authentication-->
 <div id="alertContainer"></div>
<body style="overflow: hidden;">
  <div class="overlay">
      <div class='loader position-absolute top-50 start-50 translate-middle'><img src="views/images/logoloader.gif" alt=""></div>
    </div>
  <div class="section-authentication-cover">
    <div class="">
      <div class="row g-0">

      <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex bg-dark" style="background: linear-gradient(270deg, rgba(192,128,249,0.5) 0%, rgba(148,191,242,0.8) 100%);">
          <div class=" rounded-0 mb-0 border-0 bg-transparent">
            <div class="card-body">
              
                <div>
              <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
              viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
              <defs>
              <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
              </defs>
              <g class="parallax">
              <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
              <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
              <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
              <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
              </g>
              </svg>
              </div>
            </div>
          </div>
        </div>





        <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
        <div class="card mb-0 border-0 rounded-3 pubcard">
            <div class="card-body p-sm-10" style="overflow-y: scroll; height:250px;">
                <div class="text-center">
                <a href="landingpage"><img src="views/images/try.png" class="align-center mt-5 mb-4"  width="100" alt=""></a>
   
              <h1 class="fw-bold">Public Registration</h1>
                <div>
                    <button type="button" class="btn "><a  href="churchregistration"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="url(#gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat text-info"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path>
                    <polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path>
                    <defs>
                        <linearGradient id="gradient" gradientTransform="rotate(90)">
                        <stop offset="0%" stop-color="#c080f9" />
                        <stop offset="100%" stop-color="#94c0f2 " />
                        </linearGradient>
                    </defs>
                    </svg></button>
                        <label class="form-check-label mt-1 cursor-pointer" for="flexSwitchCheckChecked" style=" background-image: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;  -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Switch to Church Registration</label> </a>
                </div>
             

              <div class="separator section-padding">
                <div class="line"></div>
               
                <div class="line"></div>
              </div>
            </div>      

              <div class="form-body mt-4">
                <form class="row g-3 " role="form" id="publicRegistrationForm" method="POST" autocomplete="nope" class="churchAccountsForm row g-3">
                <input type="text" name="trans_type" id="trans_type" value="New" style="display:none;" >

                <div class="col-12">
                            <label for="pubUsername" class="form-label">Username <sup style='color:red;'>  *</sup></label>
                            <input type="text" class="form-control border-3" id="pubUsername" placeholder="Jhon" required>
                        </div>

                            <div class="col-12">
                            <label for="pubPassword" class="form-label">Password <sup style='color:red;'>  *</sup></label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0 border-3" id="pubPassword" value="" placeholder="Enter Password">
                                <a href="javascript:;" class="input-group-text  border-3"><i class="bi bi-eye-slash-fill"></i></a>
                                </div>
                            </div>     
                            
                            <hr>

                            <div class="col-12">
                            <label for="pubEmail" class="form-label">Email Address <sup style='color:red;'>  *</sup></label>
                            <input type="email" class="form-control border-3" id="pubEmail" placeholder="example@user.com" required>
                            </div> 
                            <div class="col-12">
                                <label for="inputName" class="form-label">First Name <sup style='color:red;'>  *</sup></label>
                                <input type="text" class="form-control border-3" id="pubfname" placeholder="JAY COBB" required>
                            </div>

                            <div class="col-12">
                                <label for="inputLastName" class="form-label">Last Name <sup style='color:red;'>  *</sup></label>
                                <input type="text" class="form-control border-3" id="publname" placeholder="MOYA" required>
                            </div>


                            <div class="col-12 mb-4">
                                <label for="inputReligion" class="form-label">Religion<sup style='color:red;'>  *</sup></label>
                                <select class="form-select border-3" id="pubReligion" aria-label="Default select example" >
                                <option value="" hidden selected></option>
                                <option value="Aglipay">Aglipay</option>
                                <option value="Ang Dating Daan">Ang Dating Daan</option>
                                <option value="Baptist">Baptist</option>
                                <option  value="Catholic">Catholic</option>
                                <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                <option value="Jehovah's Witnesses">Jehovah's Witnesses</option>
                                          
                                </select>
                            </div>

                        </div>

                  <div class="col-12 mt-3">
                  <div class="form-check form-check-info border-3">
                                <input class="form-check-input" type="checkbox" id="public_terms" required>
                                <label class="form-check-label" for="public_terms" >I read and agree to Terms &amp; Conditions</label>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#LevitesAgreement" style=" background-image: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;  -webkit-background-clip: text; -webkit-text-fill-color: transparent;" ><i class="lni lni-question-circle text-primary"></i></a>
                            </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
					            <button type="submit"  class="btn text-white" id="pubRegisterBtn" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">Register</button>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="text-start">
                      <p class="mb-0">Already have an account? <a href="login" style="background: -webkit-radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Sign in here</a></p>
                    </div>
                  </div>
                </form>
              </div>

          </div>
          </div>
        </div>

      </div>
      <!--end row-->
    </div>
  </div>

  <!--authentication-->




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




<div class="col">
     <!-- Button trigger modal -->
     <!-- Modal -->
    <div class="modal fade" id="UserIds" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Recommended IDs and Certificate for Churches </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <div class="row">
                    <p>The following are the official IDs and Certificate that will be accepted in registration for church account:</p>
                        <div class="col">
                           
                            <ul>
                                <li>Passport</li>
                                <li>National ID</li>
                                <li>Social Security Service ID</li>
                                <li>Government Service Insurance System e-Card</li>
                                <li>Driver’s License</li>
                                <li>National Bureau of Investigation clearance</li>
                                <li>Senior Citizen’s Card</li>
                                <li>Unified Multi-Purpose Identification Card</li>

                            </ul>
                        </div>
                  

                        <div class="col">
                            <ul>
                                <li>Police Clearance</li>
                                <li>Firearms’ License to Own and Possess ID </li>
                                <li>Professional Regulation Commission ID</li>
                                <li>Integrated Bar of the Philippines ID</li>
                                <li>Bureau of Internal Revenue ID</li>
                                <li>Voter’s ID</li>
                                <li>Person with Disabilities Card</li>
                                <li>Other government-issued ID with photo</li>
                            </ul>

                        </div>
                        
                    </div>
                </div>
    
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="col">
     <!-- Button trigger modal -->
     <!-- Modal -->
    <div class="modal fade" id="Churchid" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Recommended IDs </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <div class="row">
                    <p>The following are the official IDs that will be accepted in registration for church account:</p>
                        <div class="col">
                           
                            <ul>
                                <li>BIR Certificates</li>
                                <li>Church Priest IDs</li>
                                <li>Decree of Canonical Erection</li>
                                
                            </ul>
                        </div>
                      
                    </div>
                </div>
    
            </div>
        </div>
    </div>
</div>





 <!-- Modal -->
 <div class="col">
     <!-- Button trigger modal -->
     <!-- Modal -->
    <div class="modal fade" id="LevitesAgreement" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">TERMS & CONDITIONS</h5>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
                    <div class="modal-body">        
                    <p>
                    Welcome to Levites, a website application designed to help churches and organizations manage their daily tasks and schedule, and a platform to dissiminate information to the public.
                    These Terms and Conditions govern your use of Levites and any related services provided by us. 
                    By accessing or using the Levites, you agree to be bound by these Terms.
                    </p>


                    <p>
                    <h5> Privacy Policy</h5>
                    Your privacy is important to us. Our Privacy Policy explains how we collect,
                    use, and disclose information about you in connection with your use of the Levites App.<sup style='color:red;'>  *</sup> 
                    By using the Levites App, you consent to our collection and use of your personal information
                    in accordance with our Privacy Policy.
                    </p>
                                
                    <p>
                    <h5>Intellectual Property</h5>
                    The Levites and its entire contents, features, and functionality
                    are owned by us, our licensors, or other providers of such material and are protected
                    by Philippines and international copyright, trademark, patent, trade secret, and other intellectual property or proprietary rights laws.
                    </p>

                    <h5>Limitation of Liability</h5>
                    <p>
                    In no event will we or our licensors, service providers, employees, agents, officers, or directors be liable for damages of any kind, 
                    under any legal theory, arising out of or in connection with your use, or inability to use,
                    any content on the levites including any direct, indirect, special, incidental, consequential, or punitive damages, 
                    including but not limited to, personal injury, pain and suffering, emotional distress, loss of revenue, loss of profits, loss of business or anticipated savings, 
                    loss of use, loss of goodwill, loss of data, and whether caused by tort (including negligence), breach of contract, or otherwise, even if foreseeable.
                    </p>

                    <p>
                    <h5>Personal Information</h5>
                    Personal Information refers to any information, whether recorded in a material form or not, from which the identity of an individual is apparent or can be reasonably and directly ascertained by the entity holding the information, or when put together with other information would directly and certainly identify an individual. Sensitive Personal Information is any attribute of your personal information that can discriminate, qualify, or classify you such as your age, date of birth, marital status, government-issued identification numbers, account numbers, and financial information. Privileged Information is any and all forms of information which, under the Rules of Court and other pertinent laws, constitute privileged communication.
                    <br>
                    <br>
                    <h5>Under the Data Privacy Act of 2012, you have the following rights: </h5>

                    &nbsp; &nbsp;  1. Right to be informed – you may request the details as to how your personal information is being processed or have been processed by the Company, including the existence of automated decision-making and profiling systems;  <br>
                    &nbsp; &nbsp; 2. Right to access – upon written request, you may demand reasonable access to your personal information, which may include the contents of your processed personal information, the manner of processing, sources where they were obtained, recipients and reason of disclosure;  <br>
                    &nbsp; &nbsp; 3. Right to dispute – you may dispute inaccuracy or error in your personal information in the Company systems through our contact center representatives;  <br>
                    &nbsp; &nbsp; 4. Right to object – you may suspend, withdraw, and remove your personal information in certain further processing, upon demand, which include your right to opt-out to any commercial communication or advertising purposes from the Company;  <br>
                    &nbsp; &nbsp;  5. Right to data erasure – based on reasonable grounds, you have the right to suspend, withdraw or order the blocking, removal or destruction of your personal data from the Company’s filing system;  <br>
                    &nbsp; &nbsp; 6. Right to secure data portability – you have the right to obtain from the Company your personal information in an electronic or structured format that is commonly used and allows for further use;  <br>
                    &nbsp; &nbsp;  7. Right to be indemnified for damages – as data subject, you have every right to be indemnified for any damages sustained due to such violation of your right to privacy through inaccurate, false, unlawfully obtained or unauthorized use of your information; and  <br>
                    &nbsp; &nbsp;  8. Right to file a complaint – you may file your complaint or any concerns with our legal compliance division: jajajocompliance@gmail.com    
                    </p>
 
                    <p>

                    <h5>Cookies Policy</h5>
                    Our website uses cookies to optimize user experience.
            
                    <br>
                    </p>
  

                    <p>
                    <h5>Terms of Use</h5>
                    By accessing this site, you agree to the following terms and conditions:<br>
                    <sup style='color:red;'>  *</sup> JAJAJO maintains this Site to provide you with information about its services and to facilitate communication with its affiliate companies and service providers. 
                    <br>
                    <sup style='color:red;'>  *</sup> The Company requires all visitors to the Site to adhere to the following rules and regulations:
                    <br>
                    <sup style='color:red;'>  *</sup> By accessing the Site you indicate your acknowledgment and acceptance of these terms and conditions. From time to time we may revise these terms and conditions. <br>
                    <sup style='color:red;'>  *</sup> The Company owns the text and images appearing on this Site or others as indicated. <br>

                    <br>
                    We will use our best efforts to include accurate and up to date information on the Site, but we make no warranties or representations as to the accuracy of the information. You agree that all access and use of the Site and its contents is at your own risk. By using the Site, you acknowledge that we specifically disclaim any liability for any damages arising out of or in any way connected with your access to our use of the Site. 
                    <br><br>
                    You agree that your use of this Site shall be governed by Philippine laws and agree that venue of any relevant suit shall be located in the proper courts of Bacolod City, Philippines.</br>
                    </p>

                    <div class=" d-flex justify-content-center align-items-right">
            <button type="button" id="agree" data-bs-dismiss="modal" class="btn btn-light text-white agree" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">I agree to the terms and conditions</button>
        </div>
    
                </div>
            </div>
        </div>
    </div>
</div>
<em>
<p id='head1' class='header'><em>Therefore go and make disciples of all nations, <br /> baptizing them in the name of the Father and of the Son <br />and of the Holy Spirit, <br />and teaching them to obey everything  <br /> I have commanded you. <br />And surely I am with you always, <br />to the very end of the age.”</em>  <br /><sub>Matthew 28:19-20</sub></p>
<p id='head2' class='header'><em>Whatever you do, work at it with all your heart, <br />as working for the Lord, not for human masters</em> <br /><sub>Colossians 3:23</sub></p>
<p id='head3' class='header'><em>Finally, brothers and sisters,<br /> whatever is true, whatever is noble, whatever is right,whatever is pure, <br /> whatever is lovely, whatever is admirable—if anything <br />is excellent or praiseworthy—think about such things.</em> <br /><sub>Philippians 4:8</sub></p>
<p id='head4' class='header'><em>And we know that in all things <br />God works for the good of those who love him, <br />who have been called according to his purpose.</em>  <br /><sub>Romans 8:28</sub></p>
<p id='head5' class='header '>LEVITES<br id='head6'><b>"To believe is to connect"</b> <br/><sub id="today_day"></sub><sub id="today_date"></sub>&nbsp;<sub id="today_time"></sub></p>
  <div class='light x1'></div>
  <div class='light x2'></div>
  <div class='light x3'></div>
  <div class='light x4'></div>
  <div class='light x5'></div>
  <div class='light x6'></div>
  <div class='light x7'></div>
  <div class='light x8'></div>
  <div class='light x9'></div>
 
