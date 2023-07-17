<main class="page-content" style="height:100vh;"> 

<div class="row">
        <div class="col-12 col-lg-8 col-xl-8 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h6 class="mb-0 text-uppercase">Website Organizer</h6>
                        </div>
                        <div class="col d-flex justify-content-end gap-3">
                            <button type="button" class="btn btn-outline-success px-3  radius-30 text-center" id="edit-website"><i class="fadeIn animated bx bx-message-square-edit" style="font-size: 1.2em;" ></i></button>
                            <button type="button"  data-bs-toggle="modal" data-bs-target="#Application" class="btn btn-outline-dark px-3  radius-30 text-center"><i class="fadeIn animated bx bx-plus" style="font-size:1.2em;"></i> <i class="fadeIn animated bx bx-globe" style="font-size:1.2em; margin-left:-5px;"></i></button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#Group" class="btn btn-outline-dark px-3 radius-30 text-center"><i class="fadeIn animated bx bx-list-plus" style="font-size:1.2em;"></i><i class="fadeIn animated bx bx-globe" style="font-size:1.2em; "></i></button>
                        </div>
                        <div class="my-3 border-top"></div>
                    </div>

                
                   
                    <div class="row row-cols-4 row-cols-lg-6 g-1">

                        <?php 
                         $websites = (new ControllerWebsite)->ctrShowWebsites();
                         foreach($websites as $key => $value){
                             echo '
                             <div class="col text-center" >
   
                             <a href="'.$value['website_path'].'" target="_blank">
                             <img src="views/images/multimedia.png" alt="">
                             <p class="text-dark" style="font-size: 1.2em;">'.$value['website_name'].'</p>
                             </a>
                             <button class="btn btn-danger mb-3 mt-0 minus-website" hidden><i class="fadeIn animated bx bx-minus"></i></button >
 
                         
                            </div>
                             ';
                            }
                        
                        ?>
                       

                        <div class="col text-center " >
   
                            <a href="https://www.facebook.com" target="_blank">
                            <img src="views/images/socmed.png" alt="">
                                <p class="text-dark" style="font-size: 1.2em;">Facebook</p>
                            </a>
                            <button class="btn btn-danger mb-3 mt-0 minus-website" hidden><i class="fadeIn animated bx bx-minus"></i></button >

                        
                        </div>

                        <div class="col text-center " >
                            <a href="https://www.youtube.com" target="_blank">
                            <img src="views/images/productivity.png" alt="">                                
                                <p class="text-black" style="font-size:1.2em;">Google Docs</p>
                            </a>
                            <button class="btn btn-danger mb-3 mt-0 minus-website" hidden><i class="fadeIn animated bx bx-minus"></i></button >
                        </div>

                
                        <div class="col text-center " >
                            <a href="https://www.youtube.com" target="_blank">
                            <img src="views/images/multimedia.png" alt="">
                                <p class="text-black"class="text-black" style="font-size:1.2em;">Canva</p>
                            </a>
                            <button class="btn btn-danger mb-3 mt-0 minus-website" hidden><i class="fadeIn animated bx bx-minus"></i></button >
                        </div>

                        <div class="col text-center " >
                            <a href="https://www.youtube.com" target="_blank">
                            <img src="views/images/videocon.png" alt="">
                            <p class="text-black" style="font-size:1.2em;">Google Meet</p>
                            </a>
                            <button class="btn btn-danger mb-3 mt-0 minus-website" hidden><i class="fadeIn animated bx bx-minus"></i></button >
                        </div>


                       
                    </div><!--end row-->

                    <hr>

                    <?php 
                   $websites = (new ControllerWebsite)->ctrShowGroups();
                    foreach($websites as $key => $value){
                        echo '

                        <div class="row mt-4 border border-2 mx-3 px-3">
                            <div class="col pt-3 d-flex justify-content-between align-items-center mb-2">
                                
                                <h6 class="mb-0 text-uppercase">'.$value['group_name'].'</h6>
                                <div>
                                    <button type="button" class="btn btn-outline-success px-3  radius-30 text-center"><i class="fadeIn animated bx bx-message-square-edit" style="font-size: 1.1em;" ></i></button>
                                </div>
                            </div>
                            <hr>
                            <div class="row row-cols-4 row-cols-lg-6 g-1 ">';

                            // $list1 = json_decode(stripslashes($value['websites_list']));

               
                            // $list2 = json_encode($value['websites_list']);
                            // echo $list1;
                            // echo $list2;

                            $list_websites = json_decode($value['websites_list']);

                            foreach($list_websites as $hello){
                                echo '
                                    <div class="col text-center" >
                            
                                        <a href="'. $hello-> path.'" target="_blank">
                                            <i class="fadeIn animated bx bx-hash" style="font-size:4em; color:#0A2647;" ></i>
                                            <p class="text-dark" style="font-size:1.5em;">'. $hello ->name.'</p>
                                        </a>
                                    </div>
                            ';
                            }


                        
                            echo' </div> </div>';
                    }
                        
                    
                    
                    ?>
                                        
                    <div class="row mt-4 border border-2 mx-3 px-3">
                        <div class="col pt-3 d-flex justify-content-between align-items-center mb-2">
                            
                            <h6 class="mb-0 text-uppercase">Social Media</h6>
                            <div>
                                <button type="button" class="btn btn-outline-success px-3  radius-30 text-center"><i class="fadeIn animated bx bx-message-square-edit" style="font-size: 1.1em;" ></i></button>
                            </div>
                        </div>
                        <hr>
                        <div class="row row-cols-4 row-cols-lg-6 g-1 ">
                            <div class="col text-center     " >
                       
                                <a href="https://www.facebook.com" target="_blank">
                                    <i class="fadeIn animated bx bx-hash" style="font-size:4em; color:#0A2647;" ></i>
                                    <p class="text-dark" style="font-size:1.5em;">Facebook</p>
                                </a>
                            </div>

                            <div class="col text-center " >
                                <a href="https://www.youtube.com" target="_blank">
                                    <i class="fadeIn animated bx bx-hash" style="font-size:4em; color:#0A2647;"></i>
                                    
                                    <p class="text-dark" style="font-size:1.5em;">Youtube</p>
                                </a>
                            </div>
                        </div>
                    </div>
             
                </div>
                
            </div>

            
        </div>

            <div class="col-12 col-lg-8 col-xl-4">
                <div class="card " style="height: 650px;">
                    <div class="card-body" >
                    <h6 class="mb-0 text-uppercase">Recommendation</h6>
                    <div class="my-3 border-top"></div>

                    <div class="row g-3">
                        <div class="col-12 col-lg-12">
                        <div class="nav flex-column nav-pills border rounded vertical-pills overflow-hidden reco"  role="tablist" id="recommendationTabs">
                        </div>
                        </div>
                        <div class="card align-items-center justify-content-center pt-3 p-1 border-1 border Newcard">
                        <div class="col-12 col-lg-10 Newcard">
                            <div class="row row-cols-2 " id="cardContainer">
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>


<div class="modal fade" id="Application" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Website</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form role="form" id="addWebsiteForm" method="POST" autocomplete="nope" class="addWebsiteForm row g-3">
            <div class="modal-body">
                <div class="form-body g-5 ">
                
                
                            <div class="row g-3 mb-3"> 
                            <div class="col-12">
                                    <label for="tns-urlPath" class="form-label">Website Name</label>
                                    <input type="text" class="form-control border-3" id="website_name" name="urlPath" placeholder="Enter website name">
                                    </div>  
                                <div class="col-8">
                                    <label for="inputUrl" class="form-label">URL</label>
                                    <input type="text" class="form-control border-3" id="website_path" name="urlPath" placeholder="https://www.facebook.com">
                                    </div>  

                                <div class="col-4">
                                    <label for="inputURL" class="form-label">Category</label>
                                    <select class="form-select border-3" id="website_category" name="pathUrl" aria-label="Default select example">
                                        <option selected="" value="Social Media">Social Media</option>
                                        <option value="Productivity">Productivity</option>
                                        <option value="Multimedia">Multimedia</option>
                                        <option value="Video Conference">Video Conference</option>
                                    </select>
                                </div>
                            </div>
            
        
                </div>
        

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add Website</button>
            </div>
        </form>
        </div>
    </div>
</div>


    <!-- Modal -->
<div class="modal fade" id="Group" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content px-3">
        <div class="modal-header">
            <h5 class="modal-title">Add Group</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <input type="hid
        den" name="groupWebsiteList" id="groupWebsiteList">

        <div class="modal-body">
            <div class="row">
                <label for="tns-urlPath" class="form-label">Group Name</label>
                <input type="text" class="form-control border-3" id="website_groupname" name="urlPath" placeholder="Enter group name">
                <div class="row mt-3 mb-1">
              
                   
                    <div class=" d-flex justify-content-between align-items-center mt-4">
                        <h6>Social Media</h6>
                        <input class="form-check-input border-2 border-success mb-3" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                     
                       
                    </div>
                    <hr>
                    <?php 

                        $websites = (new ControllerWebsite)->ctrShowWebsites();
                        foreach($websites as $key => $value){
                            echo '
                            <div class="col-3 text-center">

                                <div class="card">
                                    <i class="fadeIn animated bx bx-hash" style="font-size:3em; color:#A27B5C;"></i>
                                    <p style="font-size:1.5em;">'.$value['website_name'].'</p>
                                    <div class="card-body">
                                        <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top:-20px;">
                                            <input class="form-check-input border-2 border-success" name="cur_websites" type="checkbox" value="'.$value['website_name'].'#'.$value['website_path'].'" group="websitesGroup" id="cur_websites" style="font-size:2em;">
                                        </div>
                                    </div>
                                </div>
                                
                    
                            </div>

                            ';

                            
                        }
                    ?>


          
                    <div class='col-3 text-center'>

                        <div class="card">
                            <i class="fadeIn animated bx bx-hash" style="font-size:3em; color:#A27B5C;"></i>
                            <p style="font-size:1.5em;">Facebook</p>
                            <div class="card-body">
                                <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top:-20px;">
                                <input class="form-check-input border-2 border-success" name="cur_websites" type="checkbox" value="hello" group="websitesGroup" id="cur_websites" style="font-size:2em;">

                                </div>
                            </div>
                        </div>
                        
                 
                    </div>

                    <div class='col-3 text-center'>
                        <div class="card">
                            <i class="fadeIn animated bx bx-hash" style="font-size:3em; color:#A27B5C;"></i>
                            <p style="font-size:1.5em;">Youtube</p>
                            <div class="card-body">
                                <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top:-20px;">
                                    <input class="form-check-input border-2 border-success" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class='col-3 text-center'>
                        <div class="card">
                            <i class="fadeIn animated bx bx-hash" style="font-size:3em; color:#A27B5C;"></i>
                            <p style="font-size:1.5em;">Twitter</p>
                            <div class="card-body">
                                <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top:-20px;">
                                    <input class="form-check-input border-2 border-success" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="row mb-2">
                        <div class=" d-flex justify-content-between align-items-center">
                        <h6>Productivity</h6>
                        <input class="form-check-input border-2 border-success mb-3" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                     
                       
                    </div>
                    <hr>
                    <div class='col-3 text-center'>
                        <div class="card">
                            <i class="fadeIn animated bx bx-briefcase"  style="font-size:4em;  color:#144272;"  ></i>     
                            <p style="font-size:1.5em;">Google Docs</p>
                            <div class="card-body">
                                <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top:-20px;">
                                    <input class="form-check-input border-2 border-success" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                                </div>
                            </div>
                        </div>
                       
                    </div>

                    <div class='col-3 text-center'>
                        <div class="card">
                            <i class="fadeIn animated bx bx-briefcase"  style="font-size:4em;  color:#144272;"  ></i>     
                            <p style="font-size:1.5em;">Google Sheets</p>
                            <div class="card-body">
                                <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top:-20px;">
                                    <input class="form-check-input border-2 border-success" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class=" d-flex justify-content-between align-items-center">
                        <h6>Multimedia</h6>
                        <input class="form-check-input border-2 border-success mb-3" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                     
                       
                    </div>
                    <hr>
                    <div class='col-3 text-center'>
                        <div class="card">
                            <i class="fadeIn animated bx bx-photo-album" style="font-size:4em; color:#2C74B3;" ></i>      
                            <p style="font-size:1.5em;">Canva</p>
                            <div class="card-body">
                                <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top:-20px;">
                                    <input class="form-check-input border-2 border-success" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                                </div>
                            </div>
                        </div>
                    
                    </div>

                        <div class='col-3 text-center'>
                            <div class="card">
                                <i class="fadeIn animated bx bx-photo-album" style="font-size:4em; color:#2C74B3;" ></i>      
                                <p style="font-size:1.5em;">Pixlr</p>
                                <div class="card-body">
                                    <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top:-20px;">
                                        <input class="form-check-input border-2 border-success" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='col-3 text-center'>
                            <div class="card">
                                <i class="fadeIn animated bx bx-photo-album" style="font-size:4em; color:#2C74B3;" ></i>      
                                <p style="font-size:1.5em;">Prezi</p>
                                <div class="card-body">
                                    <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top:-20px;">
                                        <input class="form-check-input border-2 border-success" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="row mb-2">
                    <div class=" d-flex justify-content-between align-items-center">
                        <h6>Video Conference</h6>
                        <input class="form-check-input border-2 border-success mb-3" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                     
                       
                    </div>
                    <hr>
                    <div class='col-3 text-center'>
                        <div class="card m">
                             <i class="fadeIn animated bx bx-camera" style="font-size:4em; color:#205295;"     ></i>      
                                <p style="font-size:1.5em;">MS Teams</p>
                                <div class="card-body">
                                    <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top:-20px;">
                                        <input class="form-check-input border-2 border-success" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class='col-3 text-center'>
                        <div class="card">
                             <i class="fadeIn animated bx bx-camera" style="font-size:4em; color:#205295;"     ></i>      
                                <p style="font-size:1.5em;">Google Meet</p>
                                <div class="card-body">
                                    <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top:-20px;">
                                        <input class="form-check-input border-2 border-success" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class='col-3 text-center'>
                        <div class="card">
                             <i class="fadeIn animated bx bx-camera" style="font-size:4em; color:#205295;"></i>      
                                <p style="font-size:1.5em;">Zoom</p>
                                <div class="card-body">
                                    <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top:-20px;">
                                        <input class="form-check-input border-2 border-success" type="checkbox" value="" id="flexCheckDefault" style="font-size:2em;">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="addGroupBtn">Save</button>
        </div>
        </div>
    </div>
    </div>
</div>

<style>
    @keyframes slideOut {
  from {
    opacity: 0;
    transform: translateX(50px);
  
  }
  to {
    opacity: 1;
    transform: translateY(0);
    
  }
}

.Newcard {
  animation: slideOut 0.5s ease-out;
  border: 0;
  margin-bottom: 0;
  font-size: 14px;
}
.reco {
    font-size: 16px;
  
}
</style>

<script>
generateCards();
generateURLList();
</script>
