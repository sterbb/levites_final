
<?php 
require_once "././models/connection.php";
?>

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

            $db = new Connection();
            $pdo = $db->connect();
          
            // Fetch the current avatar file name from the database
          

            foreach($churches as $key => $value){    
              $stmt = $pdo->prepare("SELECT Avatar FROM churches WHERE churchID = :churchID");
              $stmt->bindParam(':churchID', $value['memChurchID'], PDO::PARAM_STR);
              $stmt->execute();

              if ($stmt) {
                $profile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data
            
                if ($profile) {
                    $Avatar = "./views/UploadAvatar/".$profile['Avatar'];            
                    // Check if the church has a custom image, if not, use a default image
                    if (empty($profile['Avatar']) || !file_exists($Avatar)) {
                        $Avatar = "./views/images/default.png";
                    }
                } else {
                    // No results found for the given churchID, handle this case
                    echo "No profile found for the specified churchID";
                }
            } else {
                // Handle the case where the query execution failed
                echo "Query execution failed.";
            }
            
            
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

          
          <div class="col-3 membersChurch cursor-pointer" church_id="'.$value['memChurchID'].'" church_name="'.$value['memChurchName'].'" onclick="openProfile(this)">
          <div class="card h-auto">
              <img src='.$Avatar.' class="card-img-top" style="height: 350px;" alt="..."  style="background-image: url(views/images/default.png); background-size: cover ; background-repeat: no-repeat;   background-position: center;">
                  <div class="card-body" style="height:150px;">
                    <h5 class="card-title">'.$value['memChurchName'].'</h5>
                    
                    </div>
                </div>

            </div>
              
              ';

              // <span  class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success m-1"><i class="fas fa-map-marker-alt"></i> '.$chDetail['church_address'].'</span>
              //       <span  class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success m-1"><i class="fas fa-map-marker-alt"></i> '.$chDetail['church_city'].'</span>
              //       <span  class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success m-2"><i class="fas fa-phone"></i> '.$chDetail['church_num'].'</span>
              
 
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
              $db = new Connection();
              $pdo = $db->connect();
              
              $stmt = $pdo->prepare("SELECT Avatar, Back FROM churches WHERE churchID = :churchID");
              $stmt->bindParam(':churchID', $value['churchID'], PDO::PARAM_STR);
              $stmt->execute();
              
              if ($stmt) {
                  $profile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data
              
                  if ($profile) {
                      $Avatar = "./views/UploadAvatar/".$profile['Avatar'];
                      $Back = "./views/uploadBack/".$profile['Back'];
              
                      // Check if the church has a custom image, if not, use a default image
                      if (empty($profile['Avatar']) || !file_exists($Avatar)) {
                          $Avatar = "./views/images/default.png";
                      } elseif (empty($profile['Back']) || !file_exists($Back)) {
                          $Back = "./views/images/default.png";
                      }
                  } else {
                      // No results found for the given churchID, handle this case
                      echo "No profile found for the specified churchID";
                  }
              } else {
                  // Handle the case where the query execution failed
                  echo "Query execution failed.";
              }
              
      
                echo '
                
                <div class="row pt-3">
                  <div class="col-12 col-lg-12 col-xl-12 cursor-pointer" church_id="'.$value['churchID'].'" church_name="'.$value['church_name'].'" onclick="openProfile(this)">
                    <div class="card overflow-hidden">
                    <img class="profile-cover bg-dark position-relative mb-4" src="'.$Back.'" style="background-image: url(./views/images/default.png); background-size: cover; background-repeat: no-repeat; height: 15rem; background-position: center;">
                    <div class="user-profile-avatar shadow position-absolute start-0 translate-middle-x" style="top: 110px;">
                        <img src='.$Avatar.' width="50" height="50" class="rounded-circle"  style="background-image: url(views/images/default.png); background-size: cover ; background-repeat: no-repeat;   background-position: center;">

                        </div>
                      
                      <div class="card-body">
                        <div class=" d-flex align-items-start justify-content-between">
                          <div class="">
                            <h3 class="mb-2">'.$value['church_name'].'</h3>
                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$value["church_province"].', '.$value["church_city"].'</span>
                            <span class="badge bg-success bg-success-subtle text-success border border-opacity-25 border-success"><i class="bx bx-map-pin"> </i>    '.$value["church_barangay"].', '.$value["church_street"].'</span>
                            <span class="badge bg-danger bg-danger-subtle text-danger border border-opacity-25 border-danger"><i class="bx bx-phone"> </i>    '.$value["church_num"].'</span>
                            <span class="badge bg-primary bg-primary-subtle text-primary border border-opacity-25 border-primary"><i class="bx bx-envelope"> </i>    '.$value["church_email"].'</span>
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

                                                                
<script>
        // Fetch the current avatar and background file names from PHP
    var avatarPath = <?php echo json_encode($profile['Avatar']); ?>;
    var backgroundPath = <?php echo json_encode($profile['Back']); ?>;
    
    // Now you can use the JavaScript variables 'avatarPath' and 'backgroundPath' in your JavaScript code
    // For example, you can update an image element's 'src' attribute with these values
    var avatarImage = document.getElementById('avatarImage');
    var backgroundImage = document.getElementById('backgroundImage');
    
    avatarImage.src = './views/UploadAvatar/' + avatarPath; // Update the avatar image source
    backgroundImage.style.backgroundImage = 'url("./views/UploadBack/' + backgroundPath + '")'; // Update the background image style
</script>


</div>
</main>
