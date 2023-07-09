<!--start main content-->
<main class="page-content">
    <div class="col ">
      <!-- Modal -->
      <div class="modal fade" id="displayEventsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-body ">
            <div class="card">
              <div class="card-body pt-3">
               <div class="d-flex text-right justify-content-end align-self-center pl-10 " style="float: right;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <ul class="nav nav-tabs nav-primary justify-content-between" role="tablist">
                  
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true" style="font-size:1.1em;">
                      <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="fadeIn animated bx bx-calendar"></i></i>
                        </div>
                        <div class="tab-title">View</div>
                      </div>
                    </a>
                  </li>

                  <div class="d-flex justify-content-center align-items-center text-center pb-1">
                    <button class="btn btn-white  me-3"><i class="bx bx-chevron-left me-0"></i></button>
                    <h6 id="eventDateModal">MAY 1, 2023</h6>
                    <button class="btn btn-white  ms-3"><i class="bx bx-chevron-right me-0"></i></button>
                  </div>

                  <li class="nav-item mr-1" role="presentation" style="float:right; margin-right:20px;">
                    <a class="nav-link btn btn-outline-success"  style="font-size:1.1em;">
                      <div class="d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#AddEvents">
                        <div class="tab-icon"><i class="fadeIn animated bx bx-calendar-plus"></i></i>
                        </div>
                        <div class="tab-title">Add</div>
                      </div>
                    </a>
                  </li>

                </ul>

      
                
            
                <div class="tab-content py-3" >

                  <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                    <div class="row g-3">
                        <div class="col-12 col-lg-3">

                          <div class="nav flex-column nav-pills border rounded vertical-pills overflow-hidden">
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#BibleStudySection" type="button"><i class="bi bi-tag-fill me-2"></i>Bible Study</button>
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#OutreachSection" type="button"><i class="bi bi-box-seam-fill me-2"></i>Outreach</button>
                            <button class="nav-link active px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#WorkshopSection" type="button"><i class="bi bi-truck-front-fill me-2"></i>Workshop</button>
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#SundayWorshipSection" type="button"><i class="bi bi-globe me-2"></i>Sunday Worship</button>
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#PrayerMeetingSection" type="button"><i class="bi bi-hdd-rack-fill me-2"></i>Prayer Meeting</button>
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#BaptismalSection" type="button"><i class="bi bi-handbag-fill me-2"></i>Baptismal</button>
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#AddType" type="button"><i class="lni lni-plus me-2 "></i>Add Event Type</button>  
                          </div>
                          
                          <div class="col-12 col-lg-12 text-center mt-5">
                            <h5 for="Collection" class="form-label fw-bold mb-3"><i class="lni lni-mic"></i>Podcast</h5>
                            <input type="file" class="form-control" id="inputGroupFile02">
                          </div>
                          
                        </div>
                        <div class="col-12 col-lg-9 border">

                         
                          
                          <div class="tab-content overflow-auto p-3" style="overflow-x: hidden !important; max-height: 50vh; "> 

                            <div class="tab-pane fade" id="BibleStudySection">
                              <div class="row g-3">
                                <div class="col-12 col-lg-12 text-center ">
                                  <h4 class="mb-2 ">Instrument Workshop</h4>
                                </div>
                              </div>
                            </div>


                            <div class="tab-pane fade" id="OutreachSection">
                              <h6 class="mb-3">Add to Stock</h6>
                              <div class="row g-3">
                                <div class="col-sm-7">
                                  <input class="form-control" type="number" placeholder="Quantity">
                                </div>
                                <div class="col-sm">
                                  <button class="btn btn-outline-primary"><i class="bi bi-check2 me-2"></i>Confirm</button>
                                </div>
                              </div>
                              <table class="mt-3">
                                <thead>
                                  <tr>
                                    <th style="width: 200px;"></th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="text-1000 fw-bold py-1">Product in stock now:</td>
                                    <td class="text-700 fw-semi-bold py-1">$2,059<button class="btn p-0 ms-2" type="button"><i class="bi bi-arrow-clockwise"></i></button></td>
                                  </tr>
                                  <tr>
                                    <td class="text-1000 fw-bold py-1">Product in transit:</td>
                                    <td class="text-700 fw-semi-bold py-1">3000</td>
                                  </tr>
                                  <tr>
                                    <td class="text-1000 fw-bold py-1">Last time restocked:</td>
                                    <td class="text-700 fw-semi-bold py-1">25th March, 2020</td>
                                  </tr>
                                  <tr>
                                    <td class="text-1000 fw-bold py-1">Total stock over lifetime:</td>
                                    <td class="text-700 fw-semi-bold py-1">50,000</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>


                            <div class="tab-pane fade show active" id="WorkshopSection">

                            <!-- event -->
                              <div class="border border-secondary p-3 mb-5">
                                
                                <div class="row">
                                  <div class="col d-flex justify-content-start">
                                    <div class="dropdown">
                                      <button class="btn btn-outline-dark me-4 dropdown-toggle"  style="font-size:1.2em;" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fadeIn animated bx bx-music"></i></button>
                                      <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Broken Vessels</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Raise a Hallelujah</a>
                                        </li>
                                        <li><a class="dropdown-item" href="lyrics">Living Hope</a>
                                        </li>
                                      </ul>
                                    </div>
                                    <div class="dropdown">
                                      <button class="btn btn-outline-dark me-4 dropdown-toggle"  style="font-size:1.2em;" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fadeIn animated bx bx-file"></i></button>
                                      <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Chords Chart</a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>


                                  <div class="col d-flex justify-content-end">
                                    <button class="btn btn-outline-success me-4" style="font-size:1.2em;"><i class="fadeIn animated bx bx-calendar-edit"></i></button>
                                    <button class="btn btn-outline-danger"><i class="fadeIn animated bx bx-calendar-minus"></i> </button>
                                  </div>

                                </div>
                              
                                <div class="row g-3">
                                  <div class="col-12 col-lg-12 text-center ">
                                    <h4 class="mb-2 ">Instrument Workshop</h4>
                                  </div>
                                </div>

                                <div class="row g-3 mt-2 mb-2">
                                  <div class="col-12 col-lg-12 ">
                                    <h6 class="mb-2 ">When: May 1, 2023 @10:00am - 11:30am</h6>
                                  </div>

                                  <div class="col-12 col-lg-12 ">
                                    <h6 class="">Where: CLGF Church-Henares Rosario Henares, Bacolod CIty, Philippines</h6>
                                  </div>

                                  <div class="col-12 col-lg-12 mb-3">
                                    <h6 class="mb-2 ">Announcement</h6>
                                    <textarea class="form-control p-3" id="exampleFormControlTextarea1" rows="5" readonly>
Attention workshop participants!

Just a friendly reminder to bring your instruments to the upcomingworkshop.

Label your instrument with your name.
Make sure it's in good working condition and tuned.
Protect it in a suitable case or bag.
Don't forget any necessary accessories (extra strings, reeds, picks, etc.).
If you have an instrument that can be shared, let us know in advance!

Safety first! Handle your instrument with care and be aware of your surroundings.

Get ready to enhance your workshop experience by practicing and applying what you learn in real-time!

If you have any questions, feel free to reach out. We're here to help!

Looking forward to an amazing workshop with all of you. See you soon!
                                    </textarea>
              
                                  </div>

                                </div>

                                <h6 >Groups</h6>
                                <div class="row row-cols-1 row-cols-lg-3 g-3">
                                  
                                  <div class="col">
                                    <div class="card mb-0">
                                      <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                                        <h5 class="card-title inline">Trainer Team</h5>
                                        <button class="font-18  btn btn-outline-success px-3 inline">	<i class="fadeIn animated bx bx-mail-send"></i></button>
                                      </div>
                                      <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Jan Ryan A. Divinagracia</li>
                                        <li class="list-group-item">JayCobb Andrew D. Moya</li>
                                        <li class="list-group-item">John Cliff Fortaleza</li>
                                      </ul>
                                    </div>

                                    
                                  </div>
              
                                  

                                </div><!--end row-->
                              </div>
                            <!-- event -->
                            <div class="border border-secondary p-3 mb-5">
                                <div class="d-flex justify-content-end">
                                  <button class="btn btn-outline-success me-4" style="font-size:1.2em;"><i class="fadeIn animated bx bx-calendar-edit"></i></button>
                                  <button class="btn btn-outline-danger"><i class="fadeIn animated bx bx-calendar-minus"></i> </button>
                                </div>
                                <div class="row g-3">
                                  <div class="col-12 col-lg-12 text-center ">
                                    <h4 class="mb-2 ">Media Workshop</h4>
                                  </div>
                                </div>
                                <div class="row g-3 mt-2">
                                  <div class="col-12 col-lg-12 ">
                                    <h6 class="mb-2 ">When: May 1, 2023 @1:00pm - 3:30pm</h6>

                                  </div>

                                  <div class="col-12 col-lg-12 ">
                                    <h6 class="mb-2 ">Where: CLGF Church-Henares Rosario Henares, Bacolod CIty, Philippines</h6>
                                    <p></p>
                                  </div>

                                  <div class="col-12 col-lg-12 mb-3 ">
                                    <h6 class="mb-2 ">Announcement</h6>
                                    <textarea class="form-control p-3" id="exampleFormControlTextarea1" rows="5" readonly>
Instructions for a successful workshop:

Come prepared: Bring your camera, fully charged batteries, memory cards, and any necessary cables.
Laptop and Software: If you're using editing software or other programs, make sure to bring your laptop and have the software installed beforehand.
Notebooks and Pens: It's always a good idea to have something for taking notes during the workshop.
Collaboration: Be ready to work together in teams and share ideas and experiences with fellow participants.
Questions and Engagement: Feel free to ask questions and actively engage with the workshop content. We're here to learn from each other.
We're looking forward to a creative and inspiring workshop experience where we can enhance our media skills and use them to serve our church community.
                                    </textarea>
                                    <p></p>
                                  </div>
                                </div>

                                <h6>Groups</h6>
                                <div class="row row-cols-1 row-cols-lg-3 g-3">
                              

                                    
          
                                  
                                  <div class="col">
                                    <div class="card mb-0">
                                      <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                                        <h5 class="card-title inline">Media Team</h5>
                                        <button class="font-18  btn btn-outline-success px-3 inline">	<i class="fadeIn animated bx bx-mail-send"></i></button>
                                      </div>
                                      <ul class="list-group list-group-flush">
                                      <li class="list-group-item">Jan Ryan A. Divinagracia</li>
                                        <li class="list-group-item">JayCobb Andrew D. Moya</li>
                                        <li class="list-group-item">John Cliff Fortaleza</li>
                                      </ul>
                                    </div>
                                  </div>
                                  

                                </div><!--end row-->
                              </div>
                              <!-- event -->
                              <div class="border border-secondary p-3 mb-5">
                                <div class="d-flex justify-content-end">
                                  <button class="btn btn-outline-success me-4" style="font-size:1.2em;"><i class="fadeIn animated bx bx-calendar-edit"></i></button>
                                  <button class="btn btn-outline-danger"><i class="fadeIn animated bx bx-calendar-minus"></i> </button>
                                </div>
                                <div class="row g-3">
                                  <div class="col-12 col-lg-12 text-center ">
                                    <h4 class="mb-2 ">Technical Workshop</h4>
                                  </div>
                                </div>
                                <div class="row g-3 mt-2">
                                  <div class="col-12 col-lg-12 ">
                                    <h6 class="mb-2 ">When: May 1, 2023 @4:00pm - 6:30pm</h6>

                                  </div>

                                  <div class="col-12 col-lg-12 ">
                                    <h6 class="mb-2 ">Where: CLGF Church-Henares Rosario Henares, Bacolod CIty, Philippines</h6>
                                    <p></p>
                                  </div>

                                  <div class="col-12 col-lg-12 mb-3">
                                    <h6 class="mb-2 ">Announcement</h6>
                                    <textarea class="form-control p-3" id="exampleFormControlTextarea1" rows="5" readonly>
Come prepared to learn: Bring a notebook and pen to take notes during the workshop. This will help you remember key concepts and techniques discussed.

Active participation: Engage in discussions and ask questions. This workshop is designed to be interactive and collaborative, so your active participation will greatly enhance the learning experience.

Familiarize yourself with the church's analog mixer: During the workshop, we will be focusing on the specific analog mixer used by our church. Take some time before the workshop to familiarize yourself with the layout, controls, and features of the mixer.

Hands-on practice: We will provide opportunities for hands-on practice with the analog mixer. Make the most of these practice sessions to develop your skills and gain confidence in operating the mixer.

Collaboration and knowledge sharing: Engage with fellow participants, share your experiences, and learn from one another. This collaborative environment will foster a deeper understanding and appreciation for analog mixers in a church setting.

We're excited to explore the world of analog mixers together and discover how they can enhance our worship services. 
                                    </textarea>
                                    <p></p>
                                  </div>
                                </div>
                                <h6>Groups</h6>
                                <div class="row row-cols-1 row-cols-lg-3 g-3">
                                  
        
                                  <div class="col">
                                    <div class="card mb-0">
                                      <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                                        <h5 class="card-title inline">Technical Team</h5>
                                        <button class="font-18 btn btn-outline-success px-3 inline">	<i class="fadeIn animated bx bx-mail-send"></i></button>
                                      </div>
                                      <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Jan Ryan A. Divinagracia</li>
                                        <li class="list-group-item">JayCobb Andrew D. Moya</li>
                                        <li class="list-group-item">John Cliff Fortaleza</li>
                                      </ul>
                                    </div>
                                  </div>
                                  

                                </div><!--end row-->
                              </div>
                              <!-- event -->

                            </div>


                            <div class="tab-pane fade" id="SundayWorshipSection">
                              <div class="d-flex flex-column h-100">
                                <h6 class="mb-3">Global Delivery</h6>
                                <div class="flex-1">
                                  <div class="mb-4">
                                    <div class="form-check mb-1">
                                      <input class="form-check-input" type="radio" name="shippingRadio" id="Worldwidedelivery">
                                      <label class="form-check-label fw-bold" for="Worldwidedelivery">Worldwide delivery</label>
                                    </div>
                                    <div class="ps-4">
                                      <p class="mb-0">Only available with Shipping method: <a href="#">Fullfilled by Admin</a></p>
                                    </div>
                                  </div>
                                  <div class="mb-4">
                                    <div class="form-check mb-1">
                                      <input class="form-check-input" type="radio" name="shippingRadio" id="SelectedCountries" checked="checked">
                                      <label class="form-check-label fw-bold d-flex align-items-center" for="SelectedCountries">Selected Countries</label>
                                    </div>
                                    <div class="ps-4">
                                      <input class="form-control" type="text" placeholder="Type Country name">
                                    </div>
                                  </div>
                                  <div class="mb-0">
                                    <div class="form-check mb-1">
                                      <input class="form-check-input" type="radio" name="shippingRadio" id="Localdelivery">
                                      <label class="form-check-label fw-bold" for="Localdelivery">Local delivery</label>
                                    </div>
                                    <div class="ps-4">
                                      <p class="mb-0">Only available with Shipping method: <a href="#!">Fullfilled by Admin</a></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="PrayerMeetingSection">
                              <h6 class="mb-3">Attributes</h6>
                              <div class="form-check">
                                <input class="form-check-input" id="fragileCheck" type="checkbox">
                                <label class="form-check-label text-900 fs-0" for="fragileCheck">Fragile Product</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" id="biodegradableCheck" type="checkbox">
                                <label class="form-check-label text-900 fs-0" for="biodegradableCheck">Biodegradable</label>
                              </div>
                              <div class="mb-3">
                                <div class="form-check"><input class="form-check-input" id="frozenCheck" type="checkbox" checked="checked">
                                  <label class="form-check-label text-900 fs-0" for="frozenCheck">Frozen Product</label>
                                  <input class="form-control" type="text" placeholder="Max. allowed Temperature" style="max-width: 350px;">
                                </div>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" id="productCheck" type="checkbox" checked="checked">
                                <label class="form-check-label text-900 fs-0" for="productCheck">Expiry Date of Product</label>
                                <input class="form-control" id="inventory" type="date">
                              </div>
                            </div>
                            <div class="tab-pane fade" id="BaptismalSection">
                              <h6 class="mb-3">Advanced</h6>
                              <div class="row g-3">
                                <div class="col-12 col-lg-6">
                                  <label class="mb-2">Product ID Type</label>
                                  <select class="form-select">
                                    <option selected="selected">ISBN</option>
                                    <option value="1">UPC</option>
                                    <option value="2">EAN</option>
                                    <option value="3">JAN</option>
                                  </select>
                                </div>
                                <div class="col-12 col-lg-6">
                                  <label class="mb-2">Product ID</label>
                                  <input class="form-control" type="text" placeholder="ISBN Number">
                                </div>
                              </div>
                            </div>

                            <div class="tab-pane fade" id="AddType">
                              <div class="row g-3">
                                <div class="col-12 col-lg-12">
                                  <label class="mt-3">Event Type Name</label>
                                  <input class="form-control" type="text" placeholder="">
                                  

                                </div>
                                
                              </div>

                              <div class="row mt-3">
                                  <div class="d-flex justify-content-end">
                                  <button type="button" class="btn btn-danger me-3">Clear </button>
                                  <button type="button" class="btn btn-success me-3">Save</button>
                                  </div>  
                              </div>
                            </div>

                          </div>
                        </div>
                       </div>

                  </div>

               
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>


      <div class="row">
        <div class="col-12 col-lg-3">
          <div class="card">
            
                <div class="card-body d-flex justify-content-around align-items-center">
                    <h6 class="mb-0 text-uppercase" style="font-family: 'Montserrat', sans-serif; font-weight:700; font-size:1.5em;">May 1, 2023</h6>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddEvents"><i class="fadeIn animated bx bx-calendar-plus"></i></button>
                </div>

                <ul class="list-group list-group-flush mb-0">
                    <li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent">Wedding<span class="badge bg-success rounded-pill">7:45 A.M.</span>
                    </li>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Baptism<span class="badge bg-primary rounded-pill">8:50 A.M.</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Workshop<span class="badge bg-danger rounded-pill">7:45 P.M.</span>
                </li>
              </ul>


          </div>
          

          <div class="card">
            <div class="card-body">
                <h6>Calendar Filters</h6>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Workshops</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Offering Prayer</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Bible Study</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Anniversary</label>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-9">
          <div class="card">
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!--end row-->
    </main>
     <!--end main content-->



<div class="col">
  <!-- Modal -->
  <div class="modal fade" id="addGroupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Group</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- <form role="form" id="addGroupForm" method="POST" autocomplete="nope" class="addGroupForm row g-3"> -->
          <div class="modal-body">
            <div class="col-12 "> 
              <label for="Collection" class="form-label fw-bold">Group Name</label>
              <input type="text" class="form-control" id="groupName" placeholder="">
            </div>

            <input type="hidden" name="groupEventMembersList" id="groupEventMembersList">
            <input type="hidden" name="groupEventEmailList" id="groupEventEmailList">

            <div class="mt-3">
                  <!-- Repeater Html Start -->
              <div id="repeater">
                <!-- Repeater Heading -->

                <div class="d-flex justify-content-between align-items-center">            
                  <h6 class="mb-0">Members</h6>
                  <button class="me-0 btn btn-success repeater-add-btn"><i class="fadeIn animated bx bx-user-plus"></i></button>
                </div>

              <hr>

                <!-- Repeater Items -->
                <div class="items" data-group="members"> 
                  <div class="card">
                    <div class="card-body">
                      <!-- Repeater Content -->
                      <div class="item-content">
                        <div class="d-flex align-items-end  justify-content-end">
                        <button class="btn btn-danger remove-btn "><i class="fadeIn animated bx bx-user-minus"></i></button>
                        </div>
                    
                        <div class="mb-3">
                          <label for="inputName1" class="form-label">Name</label>
                        
                          <input type="text" class="form-control" id="inputName1" placeholder="Name" data-name="memberName">
                        </div>
                        <div class="mb-3">
                          <label for="inputEmail1" class="form-label">Email</label>
                          <input type="text" class="form-control" id="inputEmail1" placeholder="Email" data-skip-name="true"
                            data-name="memberEmail">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


              </div>
              <!-- Repeater End -->
            

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"  id="groupAddBtn">Save changes</button>
          </div>
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>


<div class="col" >
  <!-- Modal -->
  <div class="modal fade" id="AddEvents" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  data-bs-toggle="modal" data-bs-target="#addEventModal" ></button>
        </div>
        <form role="form" id="addEventForm" method="POST" autocomplete="nope" class="addEventForm">
          <div class="modal-body" style="overflow-y:scroll; height: 60vh; ">
            <div >
              <div class="row">
                <div class="col-4">
                      <label for="inputReligion" class="form-label fw-bold" >Event Type</label>
                      <select class="form-select border-3" id="event_type" aria-label="Default select example">
                      <option selected="" value="Bible Study">Bible Study</option>
                      <option value="Outreach">Outreach</option>
                      <option value="Workshop">Workshop</option>
                      <option value="Sunday Worship">Sunday Worship</option>
                      <option value="Praryer Meeting">Praryer Meeting</option>
                      <option value="Baptismal">Baptismal</option>
                      <option value="Wedding">Wedding</option>
                      </select>
                  </div>  
                  <div class="col-8"> 
                      <label for="Collection" class="form-label fw-bold">Event Title</label>
                      <input type="text" class="form-control" id="event_title" placeholder="">
                  </div>

              </div>
                <div class="row mt-3">
                    <div class="col-6">
                      <label class="form-label fw-bold">Date Range</label>
                      <input type="text" class="form-control  date-range" id="event_date" />
                    </div>
                    <div class="col-3">
                      <label for="Collection" class="form-label fw-bold">Time Range</label>
                      <input type="text" class="form-control time-picker" id="event_time1"/>
                    </div>
                    <div class="col-3">
                      <label for="Collection" class="form-label fw-bold">&nbsp</label>
                      <input type="text" class="form-control time-picker" id="event_time2"/>
                    </div>    
                </div>
                <div class="row">
                  <div class="col-6 "> 
                      <label for="Collection" class="form-label fw-bold">Venue</label>
                      <input type="text" class="form-control" id="event_venue" placeholder="">
                  </div>

                  <div class="col-6 "> 
                      <label for="event_location" class="form-label fw-bold">Location</label>
                      <input type="text" class="form-control" id="event_location" placeholder="">
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 ">
                      <label for="event_announcement" class="form-label fw-bold">Announcement</label>
                      <textarea class="form-control" id="event_announcement" rows="5"></textarea>
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-end mt-3">
                  <button type="button" class="btn btn-outline-dark px-5 radius-30 text-center" data-bs-toggle="modal" data-bs-target="#addGroupModal"><i class="fadeIn animated bx bx-plus"></i><i class="fadeIn animated bx bx-group"></i>&nbsp;Add Group</button>
                </div>

                <div class="row row-cols-1 row-cols-lg-3 g-3 border-bottom pb-3 pt-3" id="add_group_preview">

                  <div class="col">
                    <div class="card">
                      <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                        <h5 class="card-title inline">Worship Team</h5>
                        <button class="font-18 text-black btn btn-outline-success px-3 inline">	<i class="lni lni-pencil-alt"></i></button>
                        <button class="font-18 text-black btn btn-outline-success px-3 inline">	<i class="fadeIn animated bx bx-mail-send"></i></button>
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Jan Ryan A. Divinagracia</li>
                        <li class="list-group-item">John Cliff T. Fortaleza</li>
                        <li class="list-group-item">JayCobb Andrew D. Moya</li>
                      </ul>
                    </div>
                  </div>

                </div>
                
              </div>
          </div>

          <div class="modal-footer">
            <div class="row pt-3">
              <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-danger me-3">Clear </button>
                <button type="submit" class="btn btn-success me-3">Save</button>
              </div>     
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
