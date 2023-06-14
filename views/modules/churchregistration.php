
  <!--authentication-->

  <div class="section-authentication-cover">
    <div class="">
      <div class="row g-0">

        <div class="col-12 col-xl-7 col-xxl-5 auth-cover-left align-items-center justify-content-center d-none d-xl-flex bg-primary">

          <div class=" rounded-0 mb-0 border-0 bg-transparent">
            <div class="card-body">
              <img src="views/images/marblebackground.png" class="img-fluid auth-img-cover-login" width="650"
                alt="">
            </div>
          </div>

        </div>

        <div class="col-12 col-xl-5 col-xxl-7 auth-cover-right align-items-center justify-content-center">
        <div class="card m-3 border-0 rounded-3 ">
            <div class="card-body p-sm-10">
                <div class="text-center">
              <img src="views/img/LEVITES.png" class="mb-4" width="100" alt="">
   
              <h1 class="fw-bold">Church Registration</h1>
                <div>
                    <button type="button" class="btn "><a  href="publicregistration"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="url(#gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat text-info"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path>
                    <polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path>
                    <defs>
                        <linearGradient id="gradient" gradientTransform="rotate(90)">
                        <stop offset="0%" stop-color="#c080f9" />
                        <stop offset="100%" stop-color="#94c0f2 " />
                        </linearGradient>
                    </defs>
                    </svg></button>
                        <label class="form-check-label mt-1 cursor-pointer" for="flexSwitchCheckChecked" style=" background-image: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;  -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Switch to Public Registration</label> </a>
                </div>
             

              <div class="separator section-padding">
                <div class="line"></div>
               
                <div class="line"></div>
              </div>
            </div>      

              <div class="form-body mt-4">
                <form class="row g-3 " role="form" id="churchAccounts-form " method="POST" autocomplete="nope" class="churchAccountsForm row g-3">
                <input type="text" name="trans_type" id="trans_type" value="New" style="display:none;" required>

                <div class="col-md-2 form-group pt-3 pr-3" style="display:none;">
                    <label for="churchID" class="form-label">ID</label>
                    <input id="churchID" class="form-control" name="churchID" type="text" style="font-size:1em;"readonly >
                </div>
                <h5>Personal Information</h5>


                <div class="col-12">
                  <label for="username" class="form-label">First Name<sup style='color:red;'>  <sup style='color:red;'>  *</sup></sup></label>
                <input type="text" class="form-control border-3" id="tns-name" name="name" placeholder="">
                  </div>
                  <div class="col-12">
                  <label for="username" class="form-label">Last Name<sup style='color:red;'>  <sup style='color:red;'>  *</sup></sup></label>
                <input type="text" class="form-control border-3" id="tns-lname" name="lname" placeholder="">
                  </div>
                  <div class="col-12">
                  <label for="username" class="form-label">Designation<sup style='color:red;'>  <sup style='color:red;'>  *</sup></sup></label>
                <input type="text" class="form-control border-3" id="tns-role" name="role" placeholder="e.g. secretary">
                  </div>

                  <div class="col-6">
                                <label for="inputNum" class="form-label">Contact Number <sup style='color:red;'>  *</sup></label>
                                <input type="text" class="form-control border-3" id="num-telnum" name="telnum" placeholder="Landline or phone number ">
                            </div>



                  <h5>Church Information</h5>
                  
                  <div class="col-12">
                                <label for="inputChurchName" class="form-label">Church Name <sup style='color:red;'>  *</sup></label>
                                <input type="text" class="form-control border-3" id="tns-churchName" name="churchName" placeholder="Our Lady of Peace and Good Voyage">
                            </div>  
                  <div class="col-12">
                  <label for="inputEmailAddress" class="form-label">Church Email Address <sup style='color:red;'>  *</sup></label>
                <input type="email" class="form-control border-3" id="tns-email" name="email" placeholder="example@user.com">
                  </div>
                  <div class="col-12">
                                <label for="inputAddress" class="form-label">Church Address <sup style='color:red;'>  *</sup></label>
                                <input type="text" class="form-control border-3" id="tns-churchAddress" name="churchAddress" placeholder="Brgy. Singcang Airport, Alice St.">
                            </div>
                  <div class="col-12">
                  <label for="inputReligion" class="form-label">Religion <sup style='color:red;'>  *</sup></label>
                                <select class="form-select border-3" id="tns-religion" name="religion" aria-label="Default select example">
                                <option selected="" value="Catholic">Catholic</option>
                                <option value="Baptist">Baptist</option>
                                <option value="Christianity ">Christian</option>
                                </select>
                  </div>
                  <div class="row mt-2 mb-3">
                  <div class="col-6">
                                <label for="inputCity" class="form-label">City <sup style='color:red;'>  *</sup></label>
                                <input type="text" class="form-control border-3" id="tns-city" name="city" placeholder="Bacolod City">
                            </div>
                            <div class="col-6">
                                <label for="inputNum" class="form-label">Contact Number <sup style='color:red;'>  *</sup></label>
                                <input type="text" class="form-control border-3" id="num-telnum" name="telnum" placeholder="Landline or phone number ">
                            </div>
                        </div>
                  </div>
                  <h5>Account Information</h5>

                  <div class="col-12">
                  <label for="username" class="form-label">Username<sup style='color:red;'>  <sup style='color:red;'>  *</sup></sup></label>
                <input type="text" class="form-control border-3" id="tns-username" name="username" placeholder="Jhon">
                  </div>
                  <div class="col-12 mt-2">
                  <label for="inputChoosePassword" class="form-label">Password<sup style='color:red;'>  <sup style='color:red;'>  *</sup></sup></label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0 border-3 " id="tns-password" name="password"  placeholder="Enter Password">
                                <a href="javascript:;" class="input-group-text  border-3"><i class="bi bi-eye-slash-fill"></i></a>
                                </div>
                    <div class="input-group mt-1" id="show_hide_password">
                      <input type="password" class="form-control border-end-0 border-3" id="inputChoosePassword"  placeholder="Re-Enter Password">
                       <a href="javascript:;" class="input-group-text bg-transparent border-3"><i class="bi bi-eye-slash-fill"></i></a>
                    </div>
                  </div>
                  
                  <div class="col-12 mt-3">
                            <label for="inputProof" class="form-label">Church Proof of Legitimacy <sup style='color:red;'>  *</sup> <a type="button" data-bs-toggle="modal" data-bs-target="#Churchid" style=" background-image: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;  -webkit-background-clip: text; -webkit-text-fill-color: transparent;" ><i class="lni lni-question-circle text-primary"></i></a></label>
                            <input class="form-control form-control-ml" id="profleg" name="profleg" type="file">
                                
                                    
                        </div>

                        <div class="col-12 mt-2">
                            <label for="inputProof" class="form-label">User Identifications<sup style='color:red;'>  *</sup> <a type="button" data-bs-toggle="modal" data-bs-target="#UserIds" style=" background-image: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;  -webkit-background-clip: text; -webkit-text-fill-color: transparent;" ><i class="lni lni-question-circle text-primary"></i></a></label>
                            <input class="form-control form-control-ml" id="profleg" name="profleg" type="file">
                                
                                    
                        </div>

                  <div class="col-12 mt-3">
                  <div class="form-check form-check-info border-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckInfo">
                                <label class="form-check-label" for="flexCheckInfo" >I read and agree to Terms &amp; Conditions</label>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#LevitesAgreement" style=" background-image: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;  -webkit-background-clip: text; -webkit-text-fill-color: transparent;" ><i class="lni lni-question-circle text-primary"></i></a>
                            </div>
                  </div>
                  <div class="col-12 mt-3">
                    <div class="d-grid">
					<a href="loginrequest" type="button"  class="btn text-white" id="loginBtn" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">Register</a>
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
            <h5>Terms and Conditions</h5>
            Welcome to Levites, a software application ("App") designed to help users manage their daily tasks and schedule.
            These Terms and Conditions ("Terms") govern your use of the Levites App and any related services provided by us. 
            By accessing or using the Levites App, you agree to be bound by these Terms.
            </p>
            <p>
            <h5>Use of the App</h5>
            The Levites App is provided to you for your personal and non-commercial use. 
            You may not reproduce, distribute, display, or create derivative works of the
            Levites App without our prior written permission. You may use the Levites App
            only for lawful purposes and in accordance with these Terms.
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
            The Levites App and its entire contents, features, and functionality
            (including but not limited to all information, software, text, displays, 
            images, video, and audio, and the design, selection, and arrangement thereof), 
            are owned by us, our licensors, or other providers of such material and are protected
            by Philippines and international copyright, trademark, patent, trade secret, and other intellectual property or proprietary rights laws.
            </p>

            <p >
            <h5>Disclaimer of Warranties</h5>
            THE LEVITES APP IS PROVIDED "AS IS" AND WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. WE DO NOT WARRANT THAT THE FUNCTIONS CONTAINED IN THE LEVITES APP WILL BE UNINTERRUPTED OR ERROR-FREE, THAT DEFECTS WILL BE CORRECTED, OR THAT THE LEVITES APP OR THE SERVER THAT MAKES IT AVAILABLE ARE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS.
            </p>

            <p >
            <h5>Limitation of Liability</h5>
            IN NO EVENT WILL WE OR OUR LICENSORS, SERVICE PROVIDERS, EMPLOYEES, AGENTS, OFFICERS, OR DIRECTORS BE LIABLE FOR DAMAGES OF ANY KIND, UNDER ANY LEGAL THEORY, ARISING OUT OF OR IN CONNECTION WITH YOUR USE, OR INABILITY TO USE, THE LEVITES APP, ANY WEBSITES LINKED TO IT, ANY CONTENT ON THE LEVITES APP OR SUCH OTHER WEBSITES, INCLUDING ANY DIRECT, INDIRECT, SPECIAL, INCIDENTAL, CONSEQUENTIAL, OR PUNITIVE DAMAGES, INCLUDING BUT NOT LIMITED TO, PERSONAL INJURY, PAIN AND SUFFERING, EMOTIONAL DISTRESS, LOSS OF REVENUE, LOSS OF PROFITS, LOSS OF BUSINESS OR ANTICIPATED SAVINGS, LOSS OF USE, LOSS OF GOODWILL, LOSS OF DATA, AND WHETHER CAUSED BY TORT (INCLUDING NEGLIGENCE), BREACH OF CONTRACT, OR OTHERWISE, EVEN IF FORESEEABLE.
            </p>

            <p>
            <h5>Privacy Policy</h5>
            InCorp Philippines (hereinafter referred to as “the Company”)  values and respects your right to privacy. We are committed to protect the privacy of our website visitors. We will only collect, record, store, process, and use your personal information in accordance with the Data Privacy Act of 2012, its Implementing Rules and Regulations, the issuances by the National Privacy Commission, and other pertinent laws.  
            <br>
            This Privacy Policy informs you of updates in our corporate policies regarding the collection, use, storage, disclosure, and disposal of personal information we receive and collect from our customers, and any individual who communicates, raises inquiries and concerns, as well as transacts with us through our authorized representatives. 
            <br>
            We will only use your data based on the limitations set by this policy. The outline below provides the manner by which we manage the personal information that we will obtain from you if you visit our website.
            </p>

            <p>
            <h5>Personal Information</h5>
            Personal Information refers to any information, whether recorded in a material form or not, from which the identity of an individual is apparent or can be reasonably and directly ascertained by the entity holding the information, or when put together with other information would directly and certainly identify an individual. Sensitive Personal Information is any attribute of your personal information that can discriminate, qualify, or classify you such as your age, date of birth, marital status, government-issued identification numbers, account numbers, and financial information. Privileged Information is any and all forms of information which, under the Rules of Court and other pertinent laws, constitute privileged communication.
            <br>
            <br>
            Under the Data Privacy Act of 2012, you have the following rights: 
            <br><br>
            &nbsp; &nbsp;  1. Right to be informed – you may request the details as to how your personal information is being processed or have been processed by the Company, including the existence of automated decision-making and profiling systems;  <br>
            &nbsp; &nbsp; 2. Right to access – upon written request, you may demand reasonable access to your personal information, which may include the contents of your processed personal information, the manner of processing, sources where they were obtained, recipients and reason of disclosure;  <br>
            &nbsp; &nbsp; 3. Right to dispute – you may dispute inaccuracy or error in your personal information in the Company systems through our contact center representatives;  <br>
            &nbsp; &nbsp; 4. Right to object – you may suspend, withdraw, and remove your personal information in certain further processing, upon demand, which include your right to opt-out to any commercial communication or advertising purposes from the Company;  <br>
            &nbsp; &nbsp;  5. Right to data erasure – based on reasonable grounds, you have the right to suspend, withdraw or order the blocking, removal or destruction of your personal data from the Company’s filing system;  <br>
            &nbsp; &nbsp; 6. Right to secure data portability – you have the right to obtain from the Company your personal information in an electronic or structured format that is commonly used and allows for further use;  <br>
            &nbsp; &nbsp;  7. Right to be indemnified for damages – as data subject, you have every right to be indemnified for any damages sustained due to such violation of your right to privacy through inaccurate, false, unlawfully obtained or unauthorized use of your information; and  <br>
            &nbsp; &nbsp;  8. Right to file a complaint – you may file your complaint or any concerns with our legal compliance division: legalcompliance@incorp.ph           
            </p>

            <p>
            <h5>Collection of Personal Information</h5>
            <br>
            We collect the following categories of Personal Data about Site visitors, clients, prospective clients, and other third parties: 
            <br><br>
            &nbsp; &nbsp;  1. Device data: Computer Internet Protocol (IP) address, unique device identifier (UDID), cookies and other data linked to a device, and data about usage of our website (Usage Data) <br>
            &nbsp; &nbsp; 2. Basic and Client Service data: Name, gender, title, organization, job responsibilities, customers, phone number, mailing address, email address, and contact details;<br>
            &nbsp; &nbsp; 3. Social Media data: Pictures, gender, date of birth, relationship status, interests and hobbies, educational background, and employment details, or any other matters which are readily accessible if you link your account with our website;<br>
            &nbsp; &nbsp; 4.Registration and Marketing data: Newsletter requests, event/seminar registrations, subscriptions, data about participation in conferences, seminars, credentials, associations, product interests and preferences; <br>
            &nbsp; &nbsp;  5. Transaction data: Personal data contained in documents, correspondence or other material provided by or relating to transactions conducted with or by our clients/prospective clients. <br>
            &nbsp; &nbsp; 6. Compliance data: Government identifiers, passports or other identification documents, dates of birth, beneficial ownership data, and due diligence data;  <br>
            &nbsp; &nbsp;  7. Job applicant data: Data provided by job applicants or others on our website or offline means in connection with employment opportunities, which also may be subject to an additional relevant local recruitment privacy policy.<br><br>

            We will only collect your personal information if you voluntarily submit the information to us. If you choose not to submit your personal information to us or subsequently withdraw your consent to our use of your personal information, we may not be able to adequately respond to your inquiries or avail of our services.

            <br><br>
            When we receive data from our clients about employees, customers or other individuals, the client is responsible for ensuring that any such data is transferred to us in compliance with applicable data protection laws.
            </p>


            <p>
            <h5>Use of Personal Data</h5>
            <br>
            The purposes for which we use Personal Data are as follows:
            <br><br>
            &nbsp; &nbsp;  1. To provide consultation advice and respond to inquiries. For this, we use basic and client service data, transaction, and device data.  <br>
            &nbsp; &nbsp; 2. To manage our business operations, the website, and our client relationships. For this, we use basic and client service data, registration data, and marketing data. <br>
            &nbsp; &nbsp; 3. To make our Site intuitive and easy to use. For this, we use device data. It is necessary for our legitimate interests to monitor how our Site is used to help us improve the layout and information available on our website and provide a better service to our website users. <br>
            &nbsp; &nbsp; 4.To protect the security and effective functioning of our website and information technology systems. For this, we use basic and client service data, registration data, transaction data, and device data. It is necessary for our legitimate interests to monitor how our website is used to detect and prevent fraud, other crimes and the misuse of our website. This helps us to ensure that you can safely use our website. <br>
            &nbsp; &nbsp;  5.To provide relevant marketing, such as providing you with information about events or services that may be of interest to you including services, updates, client conferences or networking events, and groups of specific interest. For this, we use registration and marketing data, basic and client service data, as well as device data. It is necessary for our legitimate interests to process this information in order to provide you with tailored and relevant marketing, updates and invitations. <br>
            &nbsp; &nbsp; 6. To address compliance and legal obligations, such as complying with the Firm’s reporting obligations, checking the identity of new clients and to prevent money laundering and/or fraud. For this, we use compliance data, basic and client service data, registration data, transaction data, and device data. <br>
            &nbsp; &nbsp;  7. To consider individuals for employment and contractor opportunities and manage on-boarding procedures. For this, we use job applicant data and compliance data. The processing is necessary for the purposes of recruitment and on-boarding and for complying with legal obligations to which we are subject, and which may be subject to a relevant local recruitment privacy policy.<br><br>

            If you submit personal information for publication on our website, we will publish and otherwise use that information in accordance with the permission given to us.
            <br><br>
            Your privacy settings can be used to limit the publication of your information on our website and can be adjusted using privacy controls on the website.
            <br><br>
            We will not, without your express consent, supply your personal information to any third party for the purpose of their or any other third party’s direct marketing.
            </p>

            <p>
            <h5>Sharing of Personal Data</h5>
            <br>
            We may share Personal Data with the following categories and recipients:
            <br><br>
            &nbsp; &nbsp;  1. Affiliates and Service Providers: If requested and/or approved by the client or prospective client, we will share personal data with our trusted affiliate companies and service providers in order to provide you with adequate services in relation to our business and those of our affiliates and service providers. <br>
            &nbsp; &nbsp; 2. Financial institutions: We may share Personal Data with financial institutions in connection with invoicing and payments. <br>
            &nbsp; &nbsp; 3. Mandatory disclosures and Legal Claims: We share Personal Data in order to comply with the Company’s tax reporting obligations, comply with any subpoena, court order or other legal process, to comply with a request from regulators, governmental request or any other legally enforceable demand. We also share Personal Data to establish or protect our legal rights, property, or safety, or the rights, property, or safety of others, or to defend against legal claims.<br>
            </p>

            <p>
            <h5>Data Retention and Disposal</h5>
            <br>
            We typically retain Personal Data related to marketing activities for as long as you accept marketing communications from us, and we will securely delete such data in accordance with applicable laws upon request. For Personal Data that we collect and process for other purposes, we will typically retain such Personal Data for as long as it is necessary to fulfill the purposes outlined in the Privacy Policy, Cookies Policy, as well as the Terms of Use. Deletion of such data may be done at any time upon your request.
            <br>
            </p>

            <p>
            <h5>Cookies Policy</h5>
            <br>
            Our website uses cookies to optimize user experience.
            <br>
            </p>

            <p>
            <h5>What are cookies?</h5>
            <br>
            Cookies are small amounts of data that are stored on your browser, device, or the page you are viewing. Some cookies are deleted once you close your browser, while other cookies are retained even after you close your browser so that you can be recognized when you return to a website.
            <br>
            </p>
            
            <p>
            <h5>Categories of cookies on our Site:</h5>
            <br>
            We use cookies in order to gather information about your usage patterns when you navigate the Site in order to enhance your personalized experience, and to understand usage patterns to improve our Site’s services. 
            <br>
            </p>

            <p>
            <h5>How do we use cookies?</h5>
            <br>
            &nbsp; &nbsp;  1.Analytical/Performance Cookies: These allow us to recognize and count the number of users of our Site and understand how such users navigate through our Site. This helps to improve how our Site works, for example, by ensuring that users can find what they are looking for easily. These cookies are session cookies which are erased when you close your browser.  <br>
            &nbsp; &nbsp; 2. Functional Cookies: These improve the functional performance of our website and make it easier for you to use. For example, cookies are used to remember that you have previously visited the website and asked to remain logged into it. These cookies qualify as persistent cookies, because they remain on your device for us to use during a next visit to our website.  You can delete these cookies via your browser settings.<br>
            &nbsp; &nbsp; 3.Cookie Pop Up – We use a cookie to determine if you have read our cookies consent pop up and to ensure we do not show it to you again when you dismiss it.<br>
            </p>

            <p>
            <h5>What are your options if you do not want cookies on your computer?</h5>
            <br>
            You can review your Internet browser settings, typically under the sections “Help” or “Internet Options,” to exercise choices you have for certain Cookies. If you disable or delete certain Cookies in your Internet browser settings, you might not be able to access or use important functions or features of this Site.<br>
            </p>

            <p>
            <h5>Terms of Use</h5>
            <br>
            By accessing this site, you agree to the following terms and conditions:<br>
            <br>
            InCorp Philippines (hereinafter referred to as “the Company”) maintains this Site to provide you with information about its services and to facilitate communication with its affiliate companies and service providers. 
            <br><br>
            The Company requires all visitors to the Site to adhere to the following rules and regulations:
            <br><br>
            &nbsp; &nbsp; <sup style='color:red;'>  *</sup> By accessing the Site you indicate your acknowledgment and acceptance of these terms and conditions. From time to time we may revise these terms and conditions. <br>
            &nbsp; &nbsp; <sup style='color:red;'>  *</sup> The Company owns the text and images appearing on this Site or others as indicated. <br>
            &nbsp; &nbsp; <sup style='color:red;'>  *</sup> Not all the services described on the site are available in all geographic areas of the Philippines. 
            <br><br>
            We will use our best efforts to include accurate and up to date information on the Site, but we make no warranties or representations as to the accuracy of the information. You agree that all access and use of the Site and its contents is at your own risk. By using the Site, you acknowledge that we specifically disclaim any liability for any damages arising out of or in any way connected with your access to our use of the Site. 
            <br><br>
            You agree that your use of this Site shall be governed by Philippine laws and agree that venue of any relevant suit shall be located in the proper courts of Taguig City, Philippines.</br>
            </p>
            
        </div>
   
        </div>
    </div>
    </div>
</div>


