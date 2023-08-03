
    <!--start main content-->
<main class="page-content">
  <h4 class="mb-3 text-uppercase text-center" style="font-family: 'Montserrat', sans-serif; font-weight:700;">Affiliated Churches</h4>
  <div class="card">
    <div class="card-body">
        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="8000">
        <div class="carousel-inner">

        <!-- trapping for items -->
          <div class="carousel-item active">
            <div class="row d-flex">

            <?php 
            
            $churches = (new ControllerPublic)->ctrShowAffiliatedChurches();

            foreach($churches as $key => $value){    
              
              echo '

              <style>
              .col-3.membersChurch.cursor-pointer {
                  transition: all 0.3s ease;
                  display: inline-block;
              }
      
              .col-3.membersChurch.cursor-pointer .card {
                  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
                  padding: 10px;
                  transition: all 0.3s ease;
              }
      
              .col-3.membersChurch.cursor-pointer .card:hover {
                  transform: scale(1.1);
                  transform-origin: center;
                  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
              }
          </style>

          
          <div class="col-3 membersChurch cursor-pointer" church_id="'.$value['memChurchID'].'" onclick="openProfile(this)">
          <div class="card h-auto">
              <img src="views/images/ch1.jpg" class="card-img-top" style="height: 350px;" alt="...">
                  <div class="card-body" style="height:150px;">
                    <h5 class="card-title">'.$value['memChurchName'].'</h5>
                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">'.$value['churchCity'].'</span>
                    <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 mt-2 border-success">'.$value['churchProvince'].'</span>
                  </div>
                </div>

            </div>
              
              ';

              
              
 
            }
            
            ?>


              
            </div>
          </div>

          

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">	<span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </a>
      </div>
    </div>
  </div>

  <div class="row border-top ">

<div class="col-6 mt-3">
    <div class=" justify-content-start align-items-start  d-flex">
      <h4 class="mb-0 text-uppercase text-left" style="font-family: 'Montserrat', sans-serif; font-weight:700;">Explore</h4>
    </div>
  </div>
  
<div class="col-6 mt-3 mb-3">
        <div class="d-flex justify-content-end align-items-end">
            <div class="input-group w-50 text-right">
                <span class="input-group-text bg-white"><i class="bx bx-search"></i></span>
                <input type="search" id="searchQuery" class="form-control" placeholder="Search Churches">
                <ul id="searchResults" class="list-group mt-5 dropdown-menu" style="display: none;"></ul>
            </div>
        </div>
    </div>
</div>
  
<div id="churchResults">

<?php 
            
            $churches = (new ControllerSuperuser)->ctrShowChurchListExplore(1);
            foreach($churches as $key => $value){
                echo '
                
                <div class="row pt-3">
                  <div class="col-12 col-lg-12 col-xl-12 cursor-pointer" church_id="'.$value['churchID'].'" onclick="openProfile(this)">
                    <div class="card overflow-hidden">
                      <div class="profile-cover bg-dark position-relative mb-4 " style="background-image: url(\'views/images/Trimph.jpg\'); height:250px">
                        <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">
                          <img src="views/images/LogoTrim.jpg" alt="...">
                        </div>
                      </div>
                      <div class="card-body">
                        <div class=" d-flex align-items-start justify-content-between">
                          <div class="">
                            <h3 class="mb-2">'.$value['church_name'].'</h3>
                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success">'.$value['church_address']. ',' .$value['church_city'].'</span>
                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 mt-2 border-success">Negros Occidental, Philippines</span>
                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 mt-2 border-success">'.$value['church_num'].'</span>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div><!--end row-->
                ';
            }

?>




</div>
</main>
