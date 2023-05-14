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
                          <h5 class="modal-title">Choose an Application</h5>
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
                                        <label for="inputURL" class="form-label">Choose</label>
                                        <select class="form-select border-3" id="tns-pathUrl" name="pathUrl" aria-label="Default select example">
                                            <option selected="" value="Catholic">PATH</option>
                                            <option value="Baptist">URL</option>
                                            
                                        
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
                          <h5 class="modal-title">Choose an Application</h5>
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

            <div class="col-12 col-lg-8 col-xl-12">
             <div class="card">
              <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                  <div class="">
                    <h6 class="mb-0 fw-bold">Monthly Public Views</h6>
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
                  <div id="chart3" style="min-height: 265px;"><div id="apexchartsp8ze4kc6" class="apexcharts-canvas apexchartsp8ze4kc6 apexcharts-theme-light" style="width: 800; height: 250px;"><svg id="SvgjsSvg1167" width="800" height="250" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1169" class="apexcharts-inner apexcharts-graphical" transform="translate(39.280701637268066, 30)"><defs id="SvgjsDefs1168"><clipPath id="gridRectMaskp8ze4kc6"><rect id="SvgjsRect1175" width="954.7192983627319" height="186.29122828674315" x="-4" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskp8ze4kc6"></clipPath><clipPath id="nonForecastMaskp8ze4kc6"></clipPath><clipPath id="gridRectMarkerMaskp8ze4kc6"><rect id="SvgjsRect1176" width="950.7192983627319" height="186.29122828674315" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1181" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1182" stop-opacity="1" stop-color="rgba(1,225,149,1)" offset="0"></stop><stop id="SvgjsStop1183" stop-opacity="1" stop-color="rgba(13,110,253,1)" offset="0.5"></stop><stop id="SvgjsStop1184" stop-opacity="1" stop-color="rgba(13,110,253,1)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1174" x1="0" y1="0" x2="0" y2="182.29122828674315" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="182.29122828674315" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1186" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1187" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1189" font-family="Helvetica, Arial, sans-serif" x="0" y="211.29122828674315" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1190">Feb</tspan><title>Feb</title></text><text id="SvgjsText1192" font-family="Helvetica, Arial, sans-serif" x="118.33991229534149" y="211.29122828674315" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1193">Mar</tspan><title>Mar</title></text><text id="SvgjsText1195" font-family="Helvetica, Arial, sans-serif" x="236.67982459068298" y="211.29122828674315" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1196">Apr</tspan><title>Apr</title></text><text id="SvgjsText1198" font-family="Helvetica, Arial, sans-serif" x="355.0197368860245" y="211.29122828674315" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1199">May</tspan><title>May</title></text><text id="SvgjsText1201" font-family="Helvetica, Arial, sans-serif" x="473.35964918136597" y="211.29122828674315" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1202">Jun</tspan><title>Jun</title></text><text id="SvgjsText1204" font-family="Helvetica, Arial, sans-serif" x="591.6995614767075" y="211.29122828674315" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1205">Jul</tspan><title>Jul</title></text><text id="SvgjsText1207" font-family="Helvetica, Arial, sans-serif" x="710.039473772049" y="211.29122828674315" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1208">Aug</tspan><title>Aug</title></text><text id="SvgjsText1210" font-family="Helvetica, Arial, sans-serif" x="828.3793860673904" y="211.29122828674315" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1211">Sep</tspan><title>Sep</title></text><text id="SvgjsText1213" font-family="Helvetica, Arial, sans-serif" x="946.7192983627319" y="211.29122828674315" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1214">Oct</tspan><title>Oct</title></text></g><line id="SvgjsLine1215" x1="0" y1="183.29122828674315" x2="946.7192983627319" y2="183.29122828674315" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line></g><g id="SvgjsG1239" class="apexcharts-grid"><g id="SvgjsG1240" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1251" x1="0" y1="0" x2="946.7192983627319" y2="0" stroke="rgba(255, 255, 255, 0.15)" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1252" x1="0" y1="30.381871381123858" x2="946.7192983627319" y2="30.381871381123858" stroke="rgba(255, 255, 255, 0.15)" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1253" x1="0" y1="60.763742762247716" x2="946.7192983627319" y2="60.763742762247716" stroke="rgba(255, 255, 255, 0.15)" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1254" x1="0" y1="91.14561414337157" x2="946.7192983627319" y2="91.14561414337157" stroke="rgba(255, 255, 255, 0.15)" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1255" x1="0" y1="121.52748552449543" x2="946.7192983627319" y2="121.52748552449543" stroke="rgba(255, 255, 255, 0.15)" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1256" x1="0" y1="151.9093569056193" x2="946.7192983627319" y2="151.9093569056193" stroke="rgba(255, 255, 255, 0.15)" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1257" x1="0" y1="182.29122828674315" x2="946.7192983627319" y2="182.29122828674315" stroke="rgba(255, 255, 255, 0.15)" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1241" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1242" x1="0" y1="183.29122828674315" x2="0" y2="189.29122828674315" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1243" x1="118.33991229534149" y1="183.29122828674315" x2="118.33991229534149" y2="189.29122828674315" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1244" x1="236.67982459068298" y1="183.29122828674315" x2="236.67982459068298" y2="189.29122828674315" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1245" x1="355.0197368860245" y1="183.29122828674315" x2="355.0197368860245" y2="189.29122828674315" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1246" x1="473.35964918136597" y1="183.29122828674315" x2="473.35964918136597" y2="189.29122828674315" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1247" x1="591.6995614767075" y1="183.29122828674315" x2="591.6995614767075" y2="189.29122828674315" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1248" x1="710.039473772049" y1="183.29122828674315" x2="710.039473772049" y2="189.29122828674315" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1249" x1="828.3793860673904" y1="183.29122828674315" x2="828.3793860673904" y2="189.29122828674315" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1250" x1="946.7192983627319" y1="183.29122828674315" x2="946.7192983627319" y2="189.29122828674315" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1259" x1="0" y1="182.29122828674315" x2="946.7192983627319" y2="182.29122828674315" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1258" x1="0" y1="1" x2="0" y2="182.29122828674315" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1177" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1178" class="apexcharts-series" seriesName="MonthlyxViews" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1185" d="M0 182.29122828674315C41.418969303369515 182.29122828674315 76.92094299197197 136.71842121505736 118.33991229534148 136.71842121505736C159.75888159871099 136.71842121505736 195.26085528731343 85.0692398671468 236.67982459068295 85.0692398671468C278.09879389405245 85.0692398671468 313.6007675826549 176.21485401051837 355.0197368860244 176.21485401051837C396.43870618939394 176.21485401051837 431.9406798779964 45.57280707168579 473.3596491813659 45.57280707168579C514.7786184847355 45.57280707168579 550.2805921733379 121.52748552449543 591.6995614767075 121.52748552449543C633.118530780077 121.52748552449543 668.6205044686793 21.267309966786712 710.0394737720488 21.267309966786712C751.4584430754184 21.267309966786712 786.9604167640208 130.6420469388326 828.3793860673903 130.6420469388326C869.7983553707599 130.6420469388326 905.3003290593623 151.9093569056193 946.7192983627318 151.9093569056193C946.7192983627318 151.9093569056193 946.7192983627318 151.9093569056193 946.7192983627318 151.9093569056193 " fill="none" fill-opacity="1" stroke="url(#SvgjsLinearGradient1181)" stroke-opacity="1" stroke-linecap="butt" stroke-width="4" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaskp8ze4kc6)" pathTo="M 0 182.29122828674315C 41.418969303369515 182.29122828674315 76.92094299197197 136.71842121505736 118.33991229534148 136.71842121505736C 159.75888159871099 136.71842121505736 195.26085528731343 85.0692398671468 236.67982459068295 85.0692398671468C 278.09879389405245 85.0692398671468 313.6007675826549 176.21485401051837 355.0197368860244 176.21485401051837C 396.43870618939394 176.21485401051837 431.9406798779964 45.57280707168579 473.3596491813659 45.57280707168579C 514.7786184847355 45.57280707168579 550.2805921733379 121.52748552449543 591.6995614767075 121.52748552449543C 633.118530780077 121.52748552449543 668.6205044686793 21.267309966786712 710.0394737720488 21.267309966786712C 751.4584430754184 21.267309966786712 786.9604167640208 130.6420469388326 828.3793860673903 130.6420469388326C 869.7983553707599 130.6420469388326 905.3003290593623 151.9093569056193 946.7192983627318 151.9093569056193" pathFrom="M -1 212.673099667867L -1 212.673099667867L 118.33991229534148 212.673099667867L 236.67982459068295 212.673099667867L 355.0197368860244 212.673099667867L 473.3596491813659 212.673099667867L 591.6995614767075 212.673099667867L 710.0394737720488 212.673099667867L 828.3793860673903 212.673099667867L 946.7192983627318 212.673099667867"></path><g id="SvgjsG1179" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1265" r="0" cx="0" cy="0" class="apexcharts-marker wu15iutq6k no-pointer-events" stroke="#ffffff" fill="#0d6efd" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1180" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1260" x1="0" y1="0" x2="946.7192983627319" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1261" x1="0" y1="0" x2="946.7192983627319" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1262" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1263" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1264" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1173" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1216" class="apexcharts-yaxis" rel="0" transform="translate(9.280701637268066, 0)"><g id="SvgjsG1217" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1219" font-family="Helvetica, Arial, sans-serif" x="20" y="31.6" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1220">70</tspan><title>70</title></text><text id="SvgjsText1222" font-family="Helvetica, Arial, sans-serif" x="20" y="61.98187138112386" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1223">60</tspan><title>60</title></text><text id="SvgjsText1225" font-family="Helvetica, Arial, sans-serif" x="20" y="92.36374276224771" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1226">50</tspan><title>50</title></text><text id="SvgjsText1228" font-family="Helvetica, Arial, sans-serif" x="20" y="122.74561414337157" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1229">40</tspan><title>40</title></text><text id="SvgjsText1231" font-family="Helvetica, Arial, sans-serif" x="20" y="153.12748552449543" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1232">30</tspan><title>30</title></text><text id="SvgjsText1234" font-family="Helvetica, Arial, sans-serif" x="20" y="183.50935690561928" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1235">20</tspan><title>20</title></text><text id="SvgjsText1237" font-family="Helvetica, Arial, sans-serif" x="20" y="213.89122828674314" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#9ba7b2" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1238">10</tspan><title>10</title></text></g></g><g id="SvgjsG1170" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 125px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(13, 110, 253);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
               </div>
             </div>
          </div>
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
                            <button class="nav-link px-4 rounded-0" data-bs-toggle="pill" data-bs-target="#Advanced" type="button" aria-selected="false" role="tab" tabindex="-1">Others</button>
                          </div>
                        </div>
                        <div class="col-12 col-lg-7">
                          <div class="row row-cols-2">
                            <div class="col d-flex text-center justify-content-center align-items-center">
                                <a href="">
                                <i class="lni lni-microsoft" style="font-size:2em;"></i>
                                    <p style="font-size:1.5em;">Adobe Photoshop</p>
                                </a>
                            </div>

                            <div class="col d-flex text-center justify-content-center align-items-center">
                                <a href="">
                                <i class="lni lni-microsoft" style="font-size:2em;"></i>
                                    <p style="font-size:1.5em;">Canva</p>
                                </a>
                            </div>

                            <div class="col d-flex text-center justify-content-center align-items-center">
                                <a href="">
                                <i class="lni lni-microsoft" style="font-size:2em;"></i>
                                    <p style="font-size:1.5em;">Adobe Lightroom</p>
                                </a>
                            </div>

                            <div class="col d-flex text-center justify-content-center align-items-center">
                                <a href="">
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
                    <button type="button" class="btn btn-outline-light px-5 radius-30" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal">View Calendar</button>
                </div>
            </div>

            <div class="col">
                  <!-- Button trigger modal -->
                  <!-- Modal -->
                  <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Sans Sebastian Calendar of Activity</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                            <div class="col-2 col-lg-2 col-xl-3">
                                <div class="card overflow-hidden">
                                <div class="profile-cover bg-dark   position-relative  mb-4" style="background-image: url('views/images/ch3.jpg')">
                                    <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">
                                    <img src="views/images/ch3.3.png" class=" d-flex align-items-center justify-content-between" alt="...">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mt-5 d-flex align-items-center justify-content-between" >
                                    <div class="">
                                        <h3 class="mb-2">San Sebastian Cathedral</h3>
                                        <p class="mb-1">Rizal - San Juan Sts., Bacolod CIty,</p>
                                        <p>Negros Occidental, Philippines</p>
                                    </div>
                                    
                                    </div>
                                    <button type="button" class="btn btn-outline-light px-5 radius-30 ml-10"><i class="lni lni-folder mr-5"></i>&nbsp;&nbsp;Files</button>
                                </div>

                                
                                </div>
                            </div>
                            <div class="col-10 col-lg-10 col-xl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <div id="calendar">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div><!--end row-->



                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
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
                                    <h5 class="card-title">Church 1</h5>
                                    <a href="#" class="btn btn-primary">View Storage</a>
                                </div>
                            </div>
                        </div>

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
                                    <h5 class="card-title">Local Storage</h5>
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

