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
                            <button type="button" class="btn btn-outline-success px-3  radius-30 text-center" data-toggle="tooltip" data-placement="left" title="Edit Website" id="edit-website"><i class="fadeIn animated bx bx-message-square-edit" style="font-size: 1.2em;" ></i></button>
                            <button type="button"  data-bs-toggle="modal" data-bs-target="#Application" class="btn btn-outline-dark px-3  radius-30 text-center" data-toggle="tooltip" data-placement="top" title="Add Website"><i class="fadeIn animated bx bx-plus" style="font-size:1.2em;"></i> <i class="fadeIn animated bx bx-globe" style="font-size:1.2em; margin-left:-5px;"></i></button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#Group" class="btn btn-outline-dark px-3 radius-30 text-center"><i class="fadeIn animated bx bx-list-plus" style="font-size:1.2em;" data-toggle="tooltip" data-placement="top" title="Add Group"></i><i class="fadeIn animated bx bx-globe" style="font-size:1.2em; "></i></button>
                        </div>
                        <div class="my-3 border-top"></div>
                    </div>

                
                   
                    <div class="row row-cols-4 row-cols-lg-6 g-1">


                  

                    <?php 
                    $websites = (new ControllerWebsite)->ctrShowWebsites();

                    foreach ($websites as $key => $value) {
                        echo '<div class="col text-center mt-3 website">';
                        $Deletewebsites = $value;

                        if (isset($_GET['accoutID'])) {
                            $accountID =  $_GET['accountID'];
                        }

                        echo '<a href="' . $value['website_path'] . '" target="_blank">';
                        
                        if ($value['website_category'] === 'Social Media') {
                            echo '<img src="views/images/socmed.png">';
                        } elseif ($value['website_category'] === 'Productivity') {
                            echo '<img src="views/images/Productivity.png">';
                        } elseif ($value['website_category'] === 'Multimedia') {
                            echo '<img src="views/images/Multimedia.png">';
                        } else {
                            echo '<img src="views/images/videocon.png">';
                        }
                        
                        echo '<p class="text-dark mt-3" style="font-size: 1.5em;">' . $value['website_name'] . '</p>';
                        echo '</a>';
                        echo '<button class="btn btn-danger mb-3 mt-0 minus-website" id="' . $value['accountID'] . '" value="' . $value['website_name'] . '" hidden><i class="fadeIn animated bx bx-minus"></i></button>';
                        echo '</div>';
                    }
                    ?>


                       
                    </div><!--end row-->

                    <hr>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
               
                    <?php 
                   $websites = (new ControllerWebsite)->ctrShowGroups();
                    foreach($websites as $key => $value){
                        echo '

                        <div class="row mt-4 border border-2 mx-3 px-3">
                            <div class="col pt-3 d-flex justify-content-between align-items-center mb-2">
                                
                                <input class="mb-0 text-uppercase border-0  text-dark h5" id="editing-'.$value['group_name'].'-website-input" value="'.$value['group_name'].'"  disabled></input>
                                <div>
                                    <button type="button" class="btn btn-outline-success px-3 radius-30 text-center"  id="'.$value['group_name'].'-website"  onclick="editGroup(this)" groupname="'.$value['group_name'].'" groupid="'.$value['accID'].'" ><i class="fadeIn animated bx bx-message-square-edit" style="font-size: 1.1em;" ></i></button>
                                    <button type="button" class="btn btn-outline-danger px-3 radius-30 text-center" group_name="'.$value['group_name'].'" id="'.$value['accID'].'"  onclick="deleteGroup(this)"><i class="fadeIn animated bx bx-message-square-minus" style="font-size: 1.1em;" ></i></button>

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

                                $images = $hello->category;
                              


                                if ( $images == "Social Media"){
                                    echo '
                                    <div class="col text-center mb-3" >
                                         <a href="'. $hello-> path.'" target="_blank">
                                         <img src="views/images/socmed.png">
                                        <p class="text-dark" style="font-size:1.5em;">'. $hello ->name.'</p>
                                    </a>
                                    <button class="btn btn-danger mb-3 mt-0 '.$value['group_name'].'-website" value="'. $hello ->name.'" groupname="'.$value['group_name'].'" groupid="'.$value['accID'].'" onclick="removeWebsiteGroup(this)" hidden><i class="fadeIn animated bx bx-minus"></i></button>
                                </div>';

                                }
                                elseif ($images == "Productivity"){
                                    echo '
                                    <div class="col text-center mb-3" >
                                         <a href="'. $hello-> path.'" target="_blank">
                                         <img src="views/images/Productivity.png">
                                        <p class="text-dark" style="font-size:1.5em;">'. $hello ->name.'</p>
                                        </a>
                                    <button class="btn btn-danger mb-3 mt-0 '.$value['group_name'].'-website" value="'. $hello ->name.'" groupname="'.$value['group_name'].'" groupid="'.$value['accID'].'"  onclick="removeWebsiteGroup(this)" hidden><i class="fadeIn animated bx bx-minus"></i></button>
                                </div>';
                                }
                                elseif ($images == "Multimedia"){
                                    echo '
                                    <div class="col text-center mb-3" >
                                         <a href="'. $hello-> path.'" target="_blank">
                                         <img src="views/images/Multimedia.png">
                                        <p class="text-dark" style="font-size:1.5em;">'. $hello ->name.'</p>
                                    </a>
                                    <button class="btn btn-danger mb-3 mt-0  '.$value['group_name'].'-website" value="'. $hello ->name.'" groupname="'.$value['group_name'].'" groupid="'.$value['accID'].'" onclick="removeWebsiteGroup(this)" hidden><i class="fadeIn animated bx bx-minus"></i></button>
                                </div>';

                                }else{
                                    echo ' <div class="col text-center mb-3" >
                                         <a href="'. $hello-> path.'" target="_blank">
                                         <img src="views/images/videocon.png">
                                        <p class="text-dark" style="font-size:1.5em;">'. $hello ->name.'</p>
                                    </a>
                                    <button class="btn btn-danger mb-3 mt-0  '.$value['group_name'].'-website" value="'. $hello ->name.'" groupname="'.$value['group_name'].'" groupid="'.$value['accID'].'" onclick="removeWebsiteGroup(this)" hidden><i class="fadeIn animated bx bx-minus"></i></button>
                                </div>';
    
                                }

                                        


                               
                            }


                        
                            echo' </div> </div>';
                    }
                        ?>
                                        
                    
             
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
        <div class="modal-header text-white" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">
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
                <button type="submit" class="btn text-white"  style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">Add Website</button>
            </div>
        </form>
        </div>
    </div>
</div>


    <!-- Modal -->
<div class="modal fade" id="Group" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header text-white" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">
            <h5 class="modal-title">Add Group</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <input type="hidden" name="groupWebsiteList" id="groupWebsiteList">

        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label for="tns-urlPath" class="form-label">Group Name</label>
                    <input type="text" class="form-control border-3" id="website_groupname" name="urlPath" placeholder="Enter group name">
                </div>

                <div class="row mt-3 mb-1">
              
                   
                    <div class=" d-flex justify-content-between align-items-center mt-4">
                        <h6>Social Media</h6>
                        <input class="form-check-input border-2 border-success mb-3" type="checkbox" value="" id="SM" onclick="checkAllsm()" style="font-size:2em;">
                     
                       
                    </div>
                    <hr>

                    <div class="row mb-2 ">

          
                        <?php 
                            $websites = (new ControllerWebsite)->ctrShowWebsites();
                            foreach($websites as $key => $value) {
                                
                                $websiteCategory = $value['website_category'];
                                
                                if ($websiteCategory === 'Social Media') {
                                    echo '
                                    <div class="col-3 text-center">
                                            <div class="card">
                                            <img src="views/images/socmed.png" class="mx-auto d-block mt-3"  style="width:90px; height:90px;">
                                            <p style="font-size: 1.5em;"  class="mt-3" >'.$value['website_name'].'</p>
                                            <div class="card-body">
                                                <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top: -20px;">
                                                    <input class="form-check-input border-2 border-success NewSM" name="cur_websites" type="checkbox" value="'.$value['website_name'].'#'.$value['website_path'].'#'. $value['website_category'].'" group="websitesGroup" id="cur_websites" style="font-size: 2em;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                }

                                
                           
                            }
                    
                        ?>
                    </div>
                </div>

           
                <div class="row mb-2">
                        <div class=" d-flex justify-content-between align-items-center">
                        <h6>Productivity</h6>
                        <input class="form-check-input border-2 border-success mb-3" type="checkbox" value=""  id="Pro" onclick="checkAllpro()" style="font-size:2em;">
                         
                    </div>
                    <hr>
                    <div class="row mb-2">
                            

                    <?php 
                        $websites = (new ControllerWebsite)->ctrShowWebsites();
                        foreach($websites as $key => $value) {
                      
                            
                            $websiteCategory = $value['website_category'];
                            
                           if ($websiteCategory === 'Productivity') {
                            
                                echo '
                                <div class="col-3 text-center">
                                    <div class="card">
                                        <img src="views/images/Productivity.png" class="mx-auto d-block mt-3"  style="width:90px; height:90px;">
                                        <p style="font-size: 1.5em;"  class="mt-3" >'.$value['website_name'].'</p>
                                        <div class="card-body">
                                            <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top: -20px;">
                                                <input class="form-check-input border-2 border-success NewPro"  name="cur_websites" type="checkbox" value="'.$value['website_name'].'#'.$value['website_path'].'#'. $value['website_category'].'" group="websitesGroup" id="cur_websites" style="font-size: 2em;">
                                            </div>
                                        </div>
                                    </div>
                                </div>'
                                ;
                            }
                     
                            
                            
                        }
                        ?>
                    </div>

                </div>

                <div class="row mb-2">
                        <div class=" d-flex justify-content-between align-items-center">
                        <h6>Multimedia</h6>
                        <input class="form-check-input border-2 border-success mb-3" type="checkbox" value="" id="Media" onclick="checkAllmedia()" style="font-size:2em;">
                         
                    </div>
                    <hr>
                    <div class="row mb-2">
                            

                    <?php 
                        $websites = (new ControllerWebsite)->ctrShowWebsites();
                        foreach($websites as $key => $value) {
                      
                            
                            $websiteCategory = $value['website_category'];
                            
                           if ($websiteCategory === 'Multimedia') {
                            
                                echo '
                                <div class="col-3 text-center">
                                    <div class="card">
                                    <img src="views/images/Multimedia.png" class="mx-auto d-block mt-3"  style="width:90px; height:90px;">
                                        <p style="font-size: 1.5em;"  class="mt-3" >'.$value['website_name'].'</p>
                                        <div class="card-body">
                                            <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top: -20px;">
                                                <input class="form-check-input border-2 border-success NewMedia" name="cur_websites" type="checkbox" value="'.$value['website_name'].'#'.$value['website_path'].'#'. $value['website_category'].'" group="websitesGroup" id="cur_websites" style="font-size: 2em;">
                                            </div>
                                        </div>
                                    </div>
                                </div>'
                                ;
                            }
                     
                            
                            
                        }
                        ?>
                    </div>

                </div>

                <div class="row mb-2">
                        <div class=" d-flex justify-content-between align-items-center">
                        <h6>Video Conference</h6>
                        <input class="form-check-input border-2 border-success mb-3" type="checkbox" value="" id="Vid" onclick="checkAllvid()" style="font-size:2em;">
                         
                    </div>
                    <hr>
                    <div class="row mb-2">
                            

                    <?php 
                        $websites = (new ControllerWebsite)->ctrShowWebsites();
                        foreach($websites as $key => $value) {
                      
                            
                            $websiteCategory = $value['website_category'];
                            
                           if ($websiteCategory === 'Video Conference') {
                            
                                echo '
                                <div class="col-3 text-center">
                                    <div class="card">
                                        <img src="views/images/videocon.png" class="mx-auto d-block mt-3"  style="width:90px; height:90px;">
                                        <p style="font-size: 1.5em;"  class="mt-3" >'.$value['website_name'].'</p>
                                        <div class="card-body">
                                            <div class="form-check text-center d-flex align-items-center justify-content-center ms-3" style="margin-top: -20px;">
                                                <input class="form-check-input border-2 border-success NewVid" name="cur_websites" type="checkbox" value="'.$value['website_name'].'#'.$value['website_path'].'#'. $value['website_category'].'" group="websitesGroup" id="cur_websites" style="font-size: 2em;">
                                            </div>
                                        </div>
                                    </div>
                                </div>'
                                ;
                            }
                     
                            
                            
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn text-white" id="addGroupBtn"  style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">Add Group Website</button>
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


