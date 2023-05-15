  <!--start main content-->
  <main class="page-content">   

    <div class="row">
        <div class="col-12 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="mb-0 text-uppercase">Software Application</h6>
                        </div>
                        <div class="col d-flex justify-content-around">
                            <button type="button"  data-bs-toggle="modal" data-bs-target="#Application" class="btn btn-outline-light px-3  radius-30 text-center"><i class="fadeIn animated bx bx-plus-circle" ></i>&nbsp;Application</button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#Group" class="btn btn-outline-light px-3 radius-30 text-center"><i class="fadeIn animated bx bx-list-plus"></i>&nbsp;Group</button>
                        </div>
                        <div class="my-3 border-top"></div>
                    </div>

                    <div class="modal fade" id="Application" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Add Application</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-body g-5 ">
                                <div class="row g-3 mb-3"> 
                                <div class="col-12">
                                        <label for="inputUrl" class="form-label">Name</label>
                                        <input type="text" class="form-control border-3" id="tns-urlPath" name="urlPath" placeholder="facebook">
                                     </div>  
                                    <div class="col-8">
                                        <label for="inputUrl" class="form-label">URL/PATH</label>
                                        <input type="text" class="form-control border-3" id="tns-urlPath" name="urlPath" placeholder="https://www.facebook.com">
                                     </div>  

                                    <div class="col-4">
                                        <label for="inputURL" class="form-label">Category</label>
                                        <select class="form-select border-3" id="tns-pathUrl" name="pathUrl" aria-label="Default select example">
                                            <option selected="" value="Catholic">Photo Editing</option>
                                            <option value="Baptist">Video Editing</option>
                                            
                                        
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Add App</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="Group" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Add Group</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-body g-5 ">
                                <div class="row g-3 mb-3"> 
                                    <div class="col-12">
                                        <label for="inputUrl" class="form-label">Group Name</label>
                                        <input type="text" class="form-control border-3" id="tns-urlPath" name="urlPath" placeholder="Social Media Tool">   
                                    </div>
                                        <div class="row row-cols-4 row-cols-lg-8 g-3">
                                            <ul class="ml-3">                                              
                                                <div class="col text-center  " >
                                                    <a href="">
                                                        <i class="lni lni-facebook" style="font-size:4em;"></i>
                                                        <p style="font-size:1.5em;">Facebook <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault"></p>
                                                    
                                                    </a>
                                                </div>

                                                <div class="col text-center " >
                                                    <a href="">
                                                        <i class="lni lni-twitter" style="font-size:4em;"></i>
                                                        <p style="font-size:1.5em;">twitter<br><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                                                    </a>
                                                    
                                                </div>
                                            </ul>
                                            <ul class="ml-3">
                                                <div class="col text-center  " >
                                                    <a href="">
                                                        <i class="lni lni-linkedin" style="font-size:4em;"></i>
                                                        <p style="font-size:1.5em;">linkedIn<br> <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault"></p>
                                                    
                                                    </a>
                                                <div class="col text-center " >
                                                    <a href="">
                                                        <i class="lni lni-youtube" style="font-size:4em;"></i>
                                                        <p style="font-size:1.5em;">Youtube<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                                                    </a>
                                                </div> 
                                            </ul>

                                            <ul class="ml-3">
                                                <div class="col text-center  " >
                                                    <a href="">
                                                        <i class="lni lni-spotify" style="font-size:4em;"></i>
                                                        <p style="font-size:1.5em;">Spotify<br><input class="form-check-input " type="checkbox" value="" id="flexCheckDefault"></p>
                                                    
                                                    </a>
                                                <div class="col text-center " >
                                                    <a href="">
                                                        <i class="lni lni-instagram" style="font-size:4em;"></i>
                                                        <p style="font-size:1.5em;">Insta<br><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                                                    </a>
                                                </div> 
                                            </ul>

                                            <ul class="ml-3">
                                                <div class="col text-center  " >
                                                    <a href="">
                                                        <i class="lni lni-apple" style="font-size:4em;"></i>
                                                        <p style="font-size:1.5em;">Apple<br><input class="form-check-input " type="checkbox" value="" id="flexCheckDefault"></p>
                                                    
                                                    </a>
                                                <div class="col text-center " >
                                                    <a href="">
                                                        <i class="lni lni-pinterest" style="font-size:4em;"></i>
                                                        <p style="font-size:1.5em;">Pinterest<br><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                                                    </a>
                                                </div> 
                                            </ul>


                                        </div><!--end row-->
                                    </div>
                                
                                </div>

                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Add Group</button>
                        </div>
                      </div>
                    </div>
                  </div>

                   
                

                   
                

                    <div class="row row-cols-1 row-cols-lg-4 g-3">

                        <div class="col text-center " >
                            <a href="https://www.facebook.com">
                                <i class="lni lni-facebook" style="font-size:4em;"></i>
                                <p style="font-size:1.5em;">Facebook</p>
                            </a>
                        </div>

                        <div class="col text-center " >
                            <a href="https://www.youtube.com">
                                <i class="lni lni-youtube" style="font-size:4em;"></i>
                                <p style="font-size:1.5em;">Youtube</p>
                            </a>
                        </div>

            


                        


                    </div><!--end row-->

                    <div class="row mt-4 border">
                        <div class="col pt-3">
                            <h4>Social Media</h4>
                        </div>

                        <div class="row row-cols-1 row-cols-lg-4 g-3 ">
                            <div class="col text-center     " >
                                <a href="">
                                    <i class="lni lni-facebook" style="font-size:4em;"></i>
                                    <p style="font-size:1.5em;">Facebook</p>
                                </a>
                            </div>

                            <div class="col text-center " >
                                <a href="">
                                    <i class="lni lni-youtube" style="font-size:4em;"></i>
                                    <p style="font-size:1.5em;">Youtube</p>
                                </a>
                            </div>
                        </div>
                    </div>
             
                </div>
                
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-xl-6">
                    <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="d-flex align-items-center">
                        <div class="">
                            <h6 class="mb-0 fw-bold">Monthly Views</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                            </button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chart3"></div>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12 col-xl-6">
                    <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="d-flex align-items-center">
                        <div class="">
                            <h6 class="mb-0 fw-bold">Monthly Users</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                            </button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chart4"></div>
                    </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>

        <div class="col-12 col-lg-8 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 text-uppercase">Recommendation</h6>
                    <div class="my-3 border-top"></div>

                    <div class="row g-3">
                        <div class="col-12 col-lg-5">
                          <div class="nav flex-column nav-pills border rounded vertical-pills overflow-hidden" role="tablist">
                            <button class="nav-link  rounded-0 active" data-bs-toggle="pill" data-bs-target="#Pricing" type="button" aria-selected="true" role="tab">Photo Editing</button>
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#Restock" type="button" aria-selected="false" role="tab" tabindex="-1">Video Editing</button>
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#Shipping" type="button" aria-selected="false" role="tab" tabindex="-1">Audio Mixing</button>
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#GlobalDelivery" type="button" aria-selected="false" role="tab" tabindex="-1">Presentation</button>
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#Attributes" type="button" aria-selected="false" role="tab" tabindex="-1">Live Streaming</button>
                          </div>
                        </div>
                        <div class="col-12 col-lg-7">
                          <div class="row row-cols-2">
                            <div class="col d-flex text-center justify-content-center align-items-center">
                                <a href="https://www.adobe.com/ph_en/products/photoshop/landpa.html?gclid=CjwKCAjwjYKjBhB5EiwAiFdSfkdiC2pVatF2Blg4W2bgDrepgNAEULMNFu7P1tULV8TBeA_3-Uf7ghoCGNkQAvD_BwE&sdid=G4FRYR56&mv=search&ef_id=CjwKCAjwjYKjBhB5EiwAiFdSfkdiC2pVatF2Blg4W2bgDrepgNAEULMNFu7P1tULV8TBeA_3-Uf7ghoCGNkQAvD_BwE:G:s&s_kwcid=AL!3085!3!444512451750!e!!g!!adobe%20photoshop!703953000!39399096689">
                                <i class="lni lni-microsoft" style="font-size:2em;"></i>
                                    <p style="font-size:1.5em;">Adobe Photoshop</p>
                                </a>
                            </div>

                            <div class="col d-flex text-center justify-content-center align-items-center">
                                <a href="https://www.canva.com/">
                                <i class="lni lni-microsoft" style="font-size:2em;"></i>
                                    <p style="font-size:1.5em;">Canva</p>
                                </a>
                            </div>

                            <div class="col d-flex text-center justify-content-center align-items-center">
                                <a href="https://www.adobe.com/ph_en/products/photoshop-lightroom/campaign/pricing.html?gclid=CjwKCAjwjYKjBhB5EiwAiFdSft5QJGKrC5dJ7bh_rl6z6NxOYiKJVyy2Mp8pry96nKqP0cqE8R7jrRoC0aoQAvD_BwE&sdid=G4FRYR56&mv=search&ef_id=CjwKCAjwjYKjBhB5EiwAiFdSft5QJGKrC5dJ7bh_rl6z6NxOYiKJVyy2Mp8pry96nKqP0cqE8R7jrRoC0aoQAvD_BwE:G:s&s_kwcid=AL!3085!3!645544253991!e!!g!!adobe%20lightroom!703952877!39399101169">
                                <i class="lni lni-microsoft" style="font-size:2em;"></i>
                                    <p style="font-size:1.5em;">Adobe Lightroom</p>
                                </a>
                            </div>

                            <div class="col d-flex text-center justify-content-center align-items-center">
                                <a href="https://www.dxo.com/dxo-photolab/">
                                <i class="lni lni-microsoft" style="font-size:2em;"></i>
                                    <p style="font-size:1.5em;">DxO PhotoLab</p>
                                </a>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            

            
            <div class="card">
                <div class="card-body d-flex justify-content-around align-items-center">
                    <h6 class="mb-0 text-uppercase">April 16, 2023</h6>
                    <a href="churchcalendar"><button type="button" class="btn btn-outline-light px-5 radius-30">View Calendar</button></a>
                    
                </div>
            </div>            

            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 text-uppercase">File Storage</h6>
                    <div class="my-3 border-top"></div>
                    <div class="row row-cols-1 row-cols-lg-2 g-3">

                        <div class="col">
                            <div class="card text-center">
                                <img src="views/assets/images/gallery/01.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Local Storage</h5>
                                    <a href="#" class="btn btn-primary">View Storage</a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card text-center">
                                <img src="views/assets/images/gallery/01.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">San Sebastian Cathedral</h5>
                                    <a href="#" class="btn btn-primary">View Storage</a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card text-center">
                                <img src="views/assets/images/gallery/01.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Our Lady of Lourdes Parish Church</h5>
                                    <a href="#" class="btn btn-primary">View Storage</a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card text-center">
                                <img src="views/assets/images/gallery/01.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Parish of San Antonio Abad</h5>
                                    <a href="#" class="btn btn-primary">View Storage</a>
                                </div>
                            </div>
                        </div>

                    
                    </div><!--end row-->
                </div>
            </div>

            

        </div>

    </div><!--end row-->
    



    
               
                    

</main>
<!--end main content-->

