
    <!--start main content-->
    <main class="page-content">
      <!--breadcrumb-->
      <div id="particles-js"></div>
      <!--end breadcrumb-->
      <div class="progress">
    <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  <p id="statusMessage"></p>
  
    </div>
    <div class="btn-container">
    <button class="pause" id="pauseBtn" style="display: none;">Pause</button>
    <button class="resume" id="resumeBtn" style="display: none;">Resume</button>
    <button class="cancel" id="cancelBtn" style="display: none;">Cancel</button>
    </div>
      <div class="row ">
        <div class="col-12 col-lg-3 notPublic notMember">
          <div class="card ">
            <div class="card-body cursor-pointer" id="myFileStroage">
              <h5 class="mt-2 mb-0">My Storage</h5>
              <p class="mb-1 mt-2">
                <span id="myStorageSizeTxt"></span>
                <span class="float-end">1 GB</span>
              </p>
              <div class="progress" style="height: 7px;">
                <div class="progress-bar bg-warning" role="progressbar" id="myStorageSize" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <!-- <div class="d-flex align-items-center">
                <div>
                  <h6 class="mb-0 mt-4">Recent Files</h6>
                </div>
                <div class="ms-auto">
                  <a href="javascript:;" class="btn btn-sm btn-outline-primary justify-content-center mt-4">View all</a>
                </div>
              </div> -->
              <!-- <div id="recentFilesList"></div> -->
              <div class="mb-3 border-top"></div>
              
              
            </div>
            
          </div>
          <!-- Additional content -->
              <div class="card overflow-hidden notPublic notMember">
                <div class="card-body">
                  <h5 class="aff mb-0 text-dark font-weight-bold">Affiliates <a href="requests"><i class='upicon bx bxs-user-plus' data-toggle="tooltip" data-placement="top" title="Add Affiliates"></i></a></h5>
                  <div class="mt-3"></div>

                  <?php 

                  $requests = (new CollaborationController)->ctrshowAffilatedChurches();
                  foreach($requests as $key => $value){

                    $db = new Connection();
                    $pdo = $db->connect();
  
                    foreach ($requests as $key => $value) {
                        $stmt = $pdo->prepare("SELECT Avatar FROM churches WHERE churchID = :churchID");
                        
                        if (isset($value['churchid1'])) {
                            $stmt->bindParam(':churchID', $value['churchid1'], PDO::PARAM_STR);
                        } elseif (isset($value['churchid2'])) {
                            $stmt->bindParam(':churchID', $value['churchid2'], PDO::PARAM_STR);
                        } else {
                            // Handle the case where there is no valid church ID
                            continue; // Skip this iteration
                        }
  
                        $stmt->execute();
                        $profile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the profile data
  
                        $churchname = '';
                        $churchid = '';
  
                        if (isset($value['churchid1']) && isset($value['churchname1'])) {
                            $churchid = $value['churchid1'];
                            $churchname = $value['churchname1'];
                        } elseif (isset($value['churchid2']) && isset($value['churchname2'])) {
                            $churchid = $value['churchid2'];
                            $churchname = $value['churchname2'];
                        }
  
                        $imagePath = "./views/UploadAvatar/".$profile['Avatar'];
                        // Check if the church has a custom image, if not, use a default image
                        if (empty($profile['Avatar']) || !file_exists($imagePath)) {
                            $imagePath = "./views/images/default.png";
                        }
                      }

                      echo '
                          <button class="affiliatesSection border border-0 bg-transparent " value="'.$value['collabID'].'" church_name="'.$churchname.'">
                            <div class="d-flex text-start mt-3">
                              <div class="fm-file-box bg-light-primary text-primary mr-1" >
                              <img src="'.$imagePath.'"alt="Responsive image" class="img-thumbnail">
                              </div>
                              <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0 cursor-pointer">'.$churchname.'</h6>
                                <div class="progress mt-1" style="height: 7px; width: 210px;">
                                  <div id="progress-bar'.$value['collabID'].'" class="progress-bar bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                              <h6 class="text-primary mb-0 affiliateStorage" id="'.$value['collabID'].'"></h6>
                            </div>
                          </button>
                        ';
                      }
                  
                  
                  ?>
                  <!-- <button class="affiliatesSection border border-0 bg-transparent ">
                  <div class="d-flex text-start mt-3">
                    <div class="fm-file-box bg-light-primary text-primary mr-1">
                      <img src="views/images/sanseb.jpg" alt="Responsive image" class="img-thumbnail">
                    </div>
                    <div class="flex-grow-1 ms-2">
                      <h6 class="mb-0 cursor-pointer">San Sebastian Cathedral (Bacolod)</h6>
                      <div class="progress mt-1" style="height: 7px; width: 150px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 48%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <h6 class="text-primary mb-0"> 930 MB</h6>
                  </div>
                  </button>
                  
                  <div class="d-flex align-items-center mt-3">
                    <div class="fm-file-box bg-light-success text-success">
                      <img src="views/images/lupit.jpg" alt="Responsive image" class="img-thumbnail">
                    </div>
                    <div class="flex-grow-1 ms-2">
                      <h6 class="mb-0 cursor-pointer">Lupit Church</h6>
                      <div class="progress" style="height: 7px; width: 150px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <h6 class="text-primary mb-0">153 MB</h6>
                  </div>
                  <div class="d-flex align-items-center mt-3">
                    <div class="fm-file-box bg-light-danger text-danger">
                      <img src="views/images/abad.jpg" alt="Responsive image" class="img-thumbnail">
                    </div>
                    <div class="flex-grow-1 ms-2">
                      <h6 class="mb-0 cursor-pointer">Abad Church (Bacolod)</h6>
                      <div class="progress" style="height: 7px; width: 150px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 98%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <h6 class="text-primary mb-0">1.8 GB</h6>
                  </div> -->
                </div>
            </div>
        </div>
          <div class="col-12 col-lg-9 " >
            <!-- Content for the column on the right -->
            <div class="card">
                    <div class="card-body">
                      
                      <div class="fm-search">
                      <div class="input-group input-group-md" style="width: 70%">
                                    <span class="input-group-text bg-transparent"><i class="bx bx-search "></i></span>
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search files here">
                                    <div class="dropdown ms-auto " id="filterDropdown">
                                        <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer position-absolute " data-bs-toggle="dropdown">
                                            <i class="bx bx-filter fs-5 filbut" style="right: 50px; position: relative;"></i>
                                        </button>
                                        <ul class="dropdown-menu " id="filterLinks">
                                            <li><a class="dropdown-item filter-link" href="javascript:;" data-filter=".doc,.docx"><i class='si bx bxs-file-doc'></i>Documents</a></li>
                                            <li><a class="dropdown-item filter-link" href="javascript:;" data-filter=".xlsx,.xls"><i class='si bx bxs-spreadsheet' ></i>Spreadsheets</a></li>
                                            <li><a class="dropdown-item filter-link" href="javascript:;" data-filter=".pptx,.ppt"><i class='si bx bxs-slideshow' ></i>Presentation</a></li>
                                            <li><a class="dropdown-item filter-link" href="javascript:;" data-filter=".pdf"> <i class='si bx bxs-file-pdf' ></i>PDFs</a></li>
                                            <li><a class="dropdown-item filter-link" href="javascript:;" data-filter=".mp4,.mov,.avi,.wmv"><i class='si bx bxs-videos' ></i>Videos</a></li>
                                            <li><a class="dropdown-item filter-link" href="javascript:;" data-filter=".png,.jpg"><i class='si bx bx-images' ></i>Images</a></li>
                                            <li><a class="dropdown-item filter-link" href="javascript:;" data-filter=".mp3,.mpc,.msv,.nmf,.wav"><i class='si bx bxs-music' ></i>Audios</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item filter-link" href="javascript:;" data-filter="all">All files</a></li>
                                        </ul>
                                    </div>
                                </div>
                        <div class="mb-0">
                          <div class="upload-file position-absolute top-0 end-1 notPublic">
                          <input type="file" id="fileInput" style="display: none;" accept=".pdf,.txt,.docx,.pptx,.mp4,.jpeg,.png,.xlsx,.xls,.mov,.avi,.wmv,.mp3,.mpc,.msv,.nmf">
                            
                              <button type="button" class="btn text-white dropdown-toggle dropdown-toggle-nocaret cursor-pointer bg-secondary" style="border-right: 0px; font-weight:bold;"  data-bs-toggle="dropdown">Upload<i class='upicon bx bx-download'></i>
                                </button>
                                <ul class="dropdown-menu">
                                  <li  class="upload"><a class="dropdown-item button" id="uploadFiles"><i class='upicon bx bxs-file-import' ></i>Upload Files</a>
                                  <div id="uploadProgressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>

                                  </li>
                                  <hr class="dropdown-divider">
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;" data-bs-toggle="modal"  data-bs-target="#createFolder"><i class='upicon bx bx-folder-plus' ></i>Add Folder</a>
                                  </li>
                                </ul>
                          </div>

                          
                        </div>
                      </div>
                      <div id="upper-title" class="mt-3"></div>
                      <hr>
                      <div class="mt-3 " id="folderTitle">
                        <h5>Folders</h5>
                      
                    </div>

                      <div class="row mt-3 folder-preview" id="pinnedSection">
                        
                      <!--end row-->
                    </div>
                     
                    <div class="row mt-3" id="foldersContainer">
                      <!-- Folder cards will be dynamically added here -->
                    </div>
                      <!--end row-->
                      <div id="PubFol" class="tablelist">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">Uploaded Files</h5>
                            </div>
                        </div>
                        <div class="table-responsive mt-3 mb-3">
                            <table class="table table-striped table-hover table-sm border-bottom listOfFiles" id="listOfFiles">
                                <thead>
                                    <input type="file" class="hidden-upload-btn" style="display: none;">
                                    <tr class="mb-5 fs-6">
                                        <th>Name<i class=""></i></th>
                                        <th class="dropdown-cell">Uploaded by<i class=""></i></th>
                                        <th class="dropdown-cell">Date uploaded</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="fileListBody">
                                    <!-- Dynamic rows will be inserted here -->
                                </tbody>
                            </table>
                        </div>
                    </div>


    </main>
     <!--end main content-->

    <!-- Modal -->
    <div class="modal fade" id="createFolder" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Create Folder</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input class="form-control form-control-lg mb-3" id="folderName" type="text" placeholder="" aria-label=".form-control-lg example">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="createFolderBtn" class="btn btn-primary">Create</button>
          </div>
        </div>
      </div>
    </div>

        <!-- Modal -->
    <div class="modal fade" id="createNote" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="noteModalTitle">Create Note</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <textarea class="form-control p-3" id="noteField" rows="5" col="50"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="addNoteButton" class="btn btn-primary">Create</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editNote" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="noteModalTitle">Edit Note</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <textarea class="form-control p-3" id="editnoteField" rows="5" col="50"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="editNoteButton" class="btn btn-primary">Create</button>
          </div>
        </div>
      </div>
    </div>

    

<!-- Modal -->
<div class="modal fade" id="linkFileModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-small">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title">Link File</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" id="linkFilePath" hidden>
        <input type="text" id="linkFilePathName" hidden>
              <label for="single-select-clear-field" class="form-label">Event:</label>
              <select class="form-select border border-dark w-100" id="linkEventInputFile" aria-label="Default select example">
                <?php
                $playlist = (new ControllerPlaylist)->ctrShowEventsLinkingPlaylist();
                foreach ($playlist as $key => $value) {
                  echo '
                    <option value="' . $value['eventID'] . '" class="d-flex align-items-center justify-content-between" style="font-weight:bold;">
                      <span>' . $value['event_title'] . '</span>
                      <span>(' . $value['event_date'] . ' @ ' . $value['event_time'] . ')</span>
                    </option>';
                }
                ?>
              </select>
        <div class="row d-flex justify-content-center mt-3">
          <button type="button" class="btn btn-outline-warning w-50" id="linkFileBtn">Link</button>
        </div>
      </div>
    </div>
  </div>
</div>    

<!-- Modal -->
<div class="modal fade" id="FileExpirationModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-small">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title">File Expiration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input class="form-control" type="text" id="fileToExpire" hidden>
        <input class="form-control flatpickr flatpickr-input flatpickr-date" type="text" id="expireDate" placeholder="Select Date.." data-id="datetime" readonly="readonly">
        <div class="row d-flex justify-content-center mt-3">
          <button type="button" class="btn btn-outline-primary w-50" id="FileExpireBtn" onclick="setFileExpiration(this)">Set</button>
        </div>
      </div>
    </div>
  </div>
</div>    

<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modalErrorMessage">Invalid file type. Only PDF, TXT, DOCX, PPTX, MP4, JPG, and PNG files are allowed.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>