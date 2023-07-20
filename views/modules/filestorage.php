
    <!--start main content-->
    <main class="page-content">
      <!--breadcrumb-->
      <div id="particles-js"></div>
      <!--end breadcrumb-->
      <div class="row">
        <div class="col-12 col-lg-3">
          <div class="card">
            <div class="card-body">
              <h5 class="mt-2 mb-0">My Storage</h5>
              <p class="mb-1 mt-2">
                <span>1.2 GB</span>
                <span class="float-end">5  GB</span>
              </p>
              <div class="progress" style="height: 7px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="d-flex align-items-center">
                <div>
                  <h6 class="mb-0 mt-4">Recent Files</h6>
                </div>
                <div class="ms-auto">
                  <a href="javascript:;" class="btn btn-sm btn-outline-primary justify-content-center mt-4">View all</a>
                </div>
              </div>
              <div id="recentFilesList"></div>
              <div class="mb-3 border-top"></div>
              
              
            </div>
            
          </div>
          <!-- Additional content -->
              <div class="card overflow-hidden">
                <div class="card-body">
                  <h5 class="aff mb-0 text-dark font-weight-bold">Affiliates <a href="requests"><i class='upicon bx bxs-user-plus' ></i></a></h5>
                  <div class="mt-3"></div>
                  <div class="d-flex align-items-center mt-3">
                    <div class="fm-file-box bg-light-primary text-primary mr-1">
                      <img src="views/images/sanseb.jpg" alt="Responsive image" class="img-thumbnail">
                    </div>
                    <div class="flex-grow-1 ms-2">
                      <h6 class="mb-0 cursor-pointer">San Sebastian Cathedral (Bacolod)</h6>
                      <div class="progress" style="height: 7px; width: 150px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 48%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <h6 class="text-primary mb-0"> 930 MB</h6>
                  </div>
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
                  </div>
                </div>
            </div>
        </div>
          <div class="col-12 col-lg-9 " >
            <!-- Content for the column on the right -->
            <div class="card">
                    <div class="card-body cursor-pointer">
                      
                      <div class="fm-search">
                        <div class="mb-0">
                          <div class="upload-file position-absolute top-0 end-1">
                              <input type="file" id="fileInput" style="display: none;">
                            
                              <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown">Upload<i class='upicon bx bx-download'></i>
                                </button>
                                <ul class="dropdown-menu">
                                  <li  class="upload"><a class="dropdown-item button" id="uploadFiles"><i class='upicon bx bxs-file-import' ></i>Upload Files</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='upicon bx bx-folder-open' ></i>Upload Folder</a>
                                  </li>
                                  <hr class="dropdown-divider">
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;" data-bs-toggle="modal"  data-bs-target="#createFolder"><i class='upicon bx bx-folder-plus' ></i>Add Folder</a>
                                  </li>
                                </ul>
                          </div>

                          <div class="input-group input-group-md w-75">	<span class="input-group-text bg-transparent"><i class="bx bx-search "></i></span>
                            <input type="text" class="form-control" placeholder="Search the files">
                            <div class="dropdown ms-auto ">
                                <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer position-absolute bottom-0 end-0" data-bs-toggle="dropdown"><i class="bx bx-filter fs-5"></i>
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="javascript:;"><i class='si bx bxs-file-doc'></i>Documents</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='si bx bxs-spreadsheet' ></i>Spreadsheets</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='si bx bxs-slideshow' ></i>Presentation</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='si bx bxs-file-pdf' ></i>PDFs</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='si bx bxs-videos' ></i>Videos</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='si bx bx-images' ></i>Images</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='si bx bxs-music' ></i>Audios</a>
                                  </li>
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;">All files</a>
                                  </li>
                                </ul>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="mt-3 cursor-pointer">
                      <h5 id="upper-title">Folders</h5>
                    </div>

                      <div class="row mt-3 folder-preview" id="allFolders">
                        <div class="col-12 col-lg-4">
                          <div class="card radius-10 border-0 border-bottom border-primary border-4 shadow-sm" >
                          <div class="card-body " id="public_folder" data-bs-target="#folderModal" >
                              <div class="d-flex align-items-center">
                                <div class="font-30 text-primary mt-3" ><i class='bx bxs-folder fs-1'></i>
                                <button type="button" id="" class="pinned-button cursor-pointer position-absolute top-0 start-0" data-bs-toggle="dropdown"><i class="bx bx-pin fs-4 "></i>
                                <button type="button" id="" class="info-mod cursor-pointer position-absolute bottom-0 end-0 text-info" data-bs-toggle="modal" data-bs-target="#exampleScrollableModal"  id="modalTrigger"><i class='bx bx-info-circle fs-4 m-3'></i>
                                </button>
  
             
                                </div>
                                <div class="dropdown ms-auto">
                                <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer position-absolute bottom-0 end-0" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-add-to-queue' ></i>Add note</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-edit-alt' ></i>Edit note</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bxs-message-x' ></i>Delete note</a>
                                  </li>
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-share' ></i>Share Folder</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-edit-alt' ></i>Edit Folder</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-folder-minus' ></i>Delete Folder</a>
                                  </li>
                                </ul>
                              </div>
                              </div>
                              <h5 class="mt-3 mb-0 cursor-pointer custom-tooltip"  data-bs-toggle="modal" data-delay="2000" data-bs-target="#folderModal"  data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="" data-bs-html="true" >Public Folder</i></h5>
                              </p>
                            </div>
                          </div>
                        </div>

          
                        <div class="col-12 col-lg-4">
                          <div class="card radius-10 border-0 border-bottom border-primary border-4  shadow-sm" >
                          <div class="card-body ">
                              <div class="d-flex align-items-center">
                              <div class="font-30 text-primary mt-3" ><i class='bx bxs-folder fs-1'></i>                                
                              <button type="button" id="" class="pinned-button cursor-pointer position-absolute top-0 start-0" data-bs-toggle="dropdown"><i class="bx bx-pin fs-4 "></i>
                                <button type="button" id="" class="info-mod cursor-pointer position-absolute bottom-0 end-0 text-info " data-bs-toggle="modal" data-bs-target="#2exampleScrollableModal"  id="modalTrigger"><i class='bx bx-info-circle fs-4 m-3'></i>
                                </button>
                                  <!-- Modal -->
                                  <div class="modal fade" id="2exampleScrollableModal" tabindex="-1" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-scrollable">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title">Note:</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                              <textarea class="form-control" rows="5" placeholder="Enter your notes here"></textarea>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  <button type="button" class="btn btn-primary">Save changes</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <div class="dropdown ms-auto">
                                <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer position-absolute bottom-0 end-0" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                                </button>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-add-to-queue' ></i>Add note</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-edit-alt' ></i>Edit note</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bxs-message-x' ></i>Delete note</a>
                                  </li>
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-share' ></i>Share Folder</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-edit-alt' ></i>Edit Folder</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-folder-minus' ></i>Delete Folder</a>
                                  </li>
                                </ul>
                              </div>
                              </div>
                              <h5 class="mt-3 mb-0 cursor-pointer custom-tooltip folderName"  data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="" data-bs-html="true" data-bs-delay="1000" id="membertooltip">Members Folder</i></h5>
                              </p>
                            </div>
                          </div>
                        </div>

                        <div class="col-12 col-lg-4">
                          <div class="card radius-10 border-0 border-bottom border-primary border-4 shadow-sm" >
                          <div class="card-body ">
                              <div class="d-flex align-items-center">
                              <div class="font-30 text-primary mt-3" ><i class='bx bxs-folder fs-1'></i>
                                <button type="button" id="" class="pinned-button cursor-pointer position-absolute top-0 start-0" data-bs-toggle="dropdown"><i class="bx bx-pin fs-4 "></i>
                                <button type="button" id="" class="info-mod cursor-pointer position-absolute bottom-0 end-0 text-info" data-bs-toggle="modal" data-bs-target="#1exampleScrollableModal"  id="modalTrigger" disabled><i class='bx bx-info-circle fs-4 m-3'></i>
                                </button>
                                  <!-- Modal -->
                                  <div class="modal fade" id="1exampleScrollableModal" tabindex="-1" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-scrollable">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title">Modal title</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                  <p>xxx</p>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  <button type="button" class="btn btn-primary">Save changes</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <div class="dropdown ms-auto">
                                <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer position-absolute bottom-0 end-0" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4"></i>
                                </button>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-add-to-queue' ></i>Add note</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-edit-alt' ></i>Edit note</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bxs-message-x' ></i>Delete note</a>
                                  </li>
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-share' ></i>Share Folder</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-share' ></i>Link to Event</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-edit-alt' ></i>Edit Folder</a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-folder-minus' ></i>Delete Folder</a>
                                  </li>
                                </ul>
                              </div>
                              </div>
                              <h5 class="mt-3 mb-0 cursor-pointer custom-tooltip"  data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="" data-bs-html="true" data-bs-delay="1000">Christmas Carol</i></h5>
                              </p>
                            </div>
                          </div>
                        </div>

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
                        <div class="ms-auto">
                          <a href="javascript:;" class="btn btn-sm btn-outline-secondary">View all</a>
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
                   

                </div>
              </div>
            </div>
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

    

    