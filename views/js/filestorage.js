// For Firebase JS SDK v7.20.0 and later, measurementId is optional
// For Firebase JS SDK v7.20.0 and later, measurementId is optional


$(document).ready(function(){
  var divElements = document.getElementsByClassName('affiliateStorage');



async function calculateTotalStorage(folderPath) {
  const storage = firebase.storage();
  const rootRef = storage.ref(folderPath);

  const totalSize = await calculateSubfolderSize(rootRef);
  
  console.log('Total size of folder and its subfolders (in bytes):', totalSize);


  console.log('Total size of folder and its subfolders (formatted):', totalSizeFormatted);
  var progressBar = document.getElementById('myStorageSize');

  var totalSizeInGB = totalSize / (1024 * 1024 * 1024);
  var totalSizeInMB = totalSize / (1024 * 1024);
  var progress;
  
  if (totalSizeInMB >= 300) {
    // Limit progress to 100% if total size is greater than or equal to 1024 MB
    progress = 100;
  } else {
    // Calculate progress percentage for total size less than 1024 MB
    progress = (totalSizeInMB / 10.24).toFixed(2);
  }
  
  progressBar.style.width = progress + '%';
  var totalSizeFormatted;
  if (totalSizeInGB >= 1) {
    totalSizeFormatted = totalSizeInGB.toFixed(2) + ' GB';
  } else if (totalSizeInMB >= 1) {
    totalSizeFormatted = totalSizeInMB.toFixed(2) + ' MB';
  } else {
    totalSizeFormatted = (totalSize / 1024).toFixed(2) + ' KB';
  }


  $("#myStorageSizeTxt").text(totalSizeFormatted);

}

// Usage example
const folderPath = currentPath;
calculateTotalStorage(folderPath);

async function calculateFolderSize(folderRef) {
  try {
    const fileRefs = await folderRef.listAll();
    let overallSize = 0;

    await Promise.all(
      fileRefs.items.map(async (fileRef) => {
        const fileSize = await getFileSize(fileRef);
        overallSize += fileSize;
      })
    );

    // Recursively calculate size for subfolders
    await Promise.all(
      fileRefs.prefixes.map(async (subfolderRef) => {
        const subfolderSize = await calculateFolderSize(subfolderRef);
        overallSize += subfolderSize;
      })
    );

    return overallSize;
  } catch (error) {
    console.log('Error calculating folder size:', error);
    throw error;
  }
}

async function getFileSize(fileRef) {
  try {
    const metadata = await fileRef.getMetadata();
    const sizeInBytes = metadata.size;
    return sizeInBytes;
  } catch (error) {
    console.log('Error retrieving file size:', error);
    throw error;
  }
  }

// Loop through each div element
Array.from(divElements).forEach(function (divElement) {
  var storage = firebase.storage();
  var folderRef = storage.ref(divElement.id);
  var progressBar = document.getElementById('progress-bar' + divElement.id);

  calculateFolderSize(folderRef).then(function (totalSize) {
    var totalSizeInGB = totalSize / (1024 * 1024 * 1024);
    var totalSizeInMB = totalSize / (1024 * 1024);
    var progress = totalSizeInMB >= 200 ? 100 : (totalSizeInMB / 2).toFixed(2);
    progressBar.style.width = progress + '%';
    var totalSizeFormatted;
    if (totalSizeInGB >= 1) {
      totalSizeFormatted = totalSizeInGB.toFixed(2) + ' GB';
    } else if (totalSizeInMB >= 1) {
      totalSizeFormatted = totalSizeInMB.toFixed(2) + ' MB';
    } else {
      totalSizeFormatted = (totalSize / 1024).toFixed(2) + ' KB';
    }
    divElement.textContent = totalSizeFormatted;
  });
});

listFilesInFolder(currentPath);
listFoldersInFolder(currentPath);


});



const firebaseConfig = {
  apiKey: "AIzaSyDHkmk1QhuflkF8Vh_w5QC01WXy3-RAdbc",
  authDomain: "levites-aa257.firebaseapp.com",
  projectId: "levites-aa257",
  storageBucket: "levites-aa257.appspot.com",
  messagingSenderId: "126085173959",
  appId: "1:126085173959:web:0cf848c840596a337a24e2",
  measurementId: "G-QP1MWVQ7XE"
};
firebase.initializeApp(firebaseConfig);

var public = getCookie('publicClicked');
var member = getCookie('memberClicked');



if(public == "true"){
  var currentPath = getCookie('publicPath');
  $(".notPublic").hide();
  var currentNameTitle = getCookie('path_name');
  var titleContent = '<span class="clickable-path font-weight-bold h4 cursor-pointer" value="' + currentPath + '">' + decodeURIComponent(currentNameTitle)  + '</span>';
$('#upper-title').html(titleContent);
}else if ( member == "true"){
  var currentPath = getCookie('memberPath');
  $(".notMember").hide();
  var currentNameTitle = getCookie('path_name');
  var titleContent = '<span class="clickable-path font-weight-bold h4 cursor-pointer" value="' + currentPath + '">' + decodeURIComponent(currentNameTitle) + '</span>';
$('#upper-title').html(titleContent);
}else{
  var currentPath = getCookie('church_id');
  var currentNameTitle = getCookie('church_name');
  var titleContent = '<span class="clickable-path font-weight-bold h4 cursor-pointer" value="' + currentPath + '">' +  decodeURIComponent(currentNameTitle) + '</span>';
$('#upper-title').html(titleContent);
}





//For adding note / for folder manipulation
var currentFile = '';


async function calculateSubfolderSize(prefixRef) {
  const fileRefs = await prefixRef.listAll();
  let subfolderSize = 0;

  await Promise.all(
    fileRefs.items.map(async (fileRef) => {
      const fileSize = await getFileSize(fileRef);
      subfolderSize += fileSize;
    })
  );

  await Promise.all(
    fileRefs.prefixes.map(async (subPrefixRef) => {
      const subSubfolderSize = await calculateSubfolderSize(subPrefixRef);
      subfolderSize += subSubfolderSize;
    })
  );

  return subfolderSize;
}

async function getFilesInFolder(folderName) {
try {
  // Get a reference to the Firebase Cloud Storage
  var storage = firebase.storage();

  // Replace 'your-folder-path' with the actual path to the folder containing your files
  var folderRef = storage.ref(currentPath + "/" + folderName +"/");

  // List all the items (files) in the folder
  const result = await folderRef.listAll();

  // 'result' contains an array of files and sub-folders in the folder
  // We will extract the file names and return them as an array
  const files = result.items.map((fileRef) => fileRef.name);
  return files;
} catch (error) {
  console.error('Error retrieving files:', error);
  throw error;
}
}

function formatFileSize(sizeInBytes) {
if (sizeInBytes === 0) return 'No files'; // Handle the case of no files
const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
const i = Math.floor(Math.log(sizeInBytes) / Math.log(1024));
return (sizeInBytes / Math.pow(1024, i)).toFixed(2) + ' ' + sizes[i];
}

async function getFileSize(fileRef) {
try {
  const metadata = await fileRef.getMetadata();
  const sizeInBytes = metadata.size;
  return sizeInBytes;
} catch (error) {
  console.log('Error retrieving file size:', error);
  throw error;
}
}

async function listFoldersInFolder(folderPath) {
try {
  var storage = firebase.storage();
  var folderRef = storage.ref(folderPath);

  const result = await folderRef.listAll();
  var foldersContainer = document.getElementById('foldersContainer');
  var pinnedContainer = document.getElementById('pinnedSection');
  pinnedContainer.innerHTML = ''; // Clear existing folders
  foldersContainer.innerHTML = ''; // Clear existing folders
  

  await Promise.all(
    result.prefixes.map(async (prefixRef) => {  
      var folderName = prefixRef.name.replace(/\/$/, ''); // Remove trailing slash if present

      var storage = firebase.storage();
      var fileRef = storage.ref(currentPath + '/' + folderName + '/.placeholder');
      

      const fileRefs = await prefixRef.listAll();
      const fileTypeToExclude = '.placeholder'; // Include the full filename you want to exclude
      const filteredFiles = fileRefs.items.filter(file => !file.name.endsWith(fileTypeToExclude));
      const numFiles = filteredFiles.length;


      let overallSize = await calculateSubfolderSize(prefixRef);


      // var metadata = {
      //   customMetadata: {
      //     // createdBy: getCookie('acc_name'),
      //     // createdDate: new Date().toLocaleDateString(),
      //     // createdTime: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),            
      //     overallSize: formatFileSize(overallSize),
      //     // Add more custom metadata properties as needed
      //   }
      // };
      var metadata = await fileRef.getMetadata();
      const creationTime = metadata.timeCreated; // Timestamp of creation time
      const creationDate = new Date(creationTime); // Convert timestamp to Date object

      try {
        const metadata = await fileRef.getMetadata();


        if (metadata.customMetadata.pin == 'true') {
          var newFolderCard = document.createElement('div');
          newFolderCard.className = 'col-12 col-lg-4 folder-div';
          

          if(public == "true" || member =="true"){
            newFolderCard.innerHTML = `
          <div class="card radius-10 border-0 border-bottom border-primary border-4 shadow-sm" >
          <div class="card-body folder-div"  data-bs-target="#folderModal" >
              <div class="d-flex align-items-center folder-div">

                <div class="font-30 text-secondary mt-2  text-primary cursor-pointer" onclick="handleClick(this)" value="${folderName}"><i class="bx bxs-folder fs-1  text-primary "></i></div>


              </div>
              <h6 class="mb-0 folder-name-hover" onclick="handleClick(this)" value="${folderName}">${folderName}</h6>
              <small>${numFiles} files</small>
              </p>
            </div>
          </div>
          `;

          }else{
            newFolderCard.innerHTML = `
            <div class="card radius-10 border-0 gradient-bottom border-4 shadow-sm" >

            <div class="card-body folder-div"  data-bs-target="#folderModal" >
                <div class="d-flex align-items-center folder-div">
                  <div class="font-30 text-primary mt-3" >
                    <button type="button" id="pinButton" class="pinned-button cursor-pointer position-absolute top-0 start-0 clicked" style="z-index:999; notPublic" data-toggle="tooltip" data-placement="left" title="Click to Unpin" value="${folderName}" onclick="pinFolder(this)"><i class="bx bx-pin fs-5"></i></button>
                    <button type="button" id="" class="info-mod cursor-pointer position-absolute bottom-0 end-0 text-info notPublic" onclick="showNote(this)" data-toggle="tooltip" data-placement="left" title="Click To See Note" value="${folderName}"><i class='bx bx-info-circle fs-4 m-3'></i></button>
                    </button>
                  </div>
                  
                  <div class="font-30 text-secondary mt-2  text-primary cursor-pointer" onclick="handleClick(this)" value="${folderName}"><i class="bx bxs-folder fs-1 text-primary" ></i></div>
  
                  <div class="dropdown ms-auto">
                    <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer position-absolute bottom-0 end-0 notPublic" data-bs-toggle="dropdown"><i class="bi bi-three-dots fs-4 notPublic"></i>
                    </button>
                    <ul class="dropdown-menu notPublic float-end" style="z-index:999;  ">
                    <li class="notPublic"><a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#createNote" onclick="setUpFilePath(this)" value="${folderName}"><i class='fi bx bx-add-to-queue'></i>Add note</a></li>
                    <li class="notPublic"><a class="dropdown-item" href="javascript:;" onclick="setUpFilePathEdit(this)" data-bs-toggle="modal" data-bs-target="#editNote" value="${folderName}"><i class='fi bx bx-edit-alt'></i>Edit note</a></li>
                    <li class="notPublic"><a class="dropdown-item text-danger" href="javascript:;" value="${folderName}" onclick="deleteNote(this)"><i class='fi bx bxs-message-x text-danger'></i>Delete note</a></li>
                    <hr class="dropdown-divider">
                    <li class="notPublic"><a class="dropdown-item" href="javascript:;"  onclick="unpinFolder(this)" value="${folderName}"><i class='fi bx bx-share'></i>Unpin Folder</a></li>
                    <hr class="dropdown-divider">
                    <li class="notPublic"><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-share'></i>Share Folder</a></li>
                    <li class="notPublic"><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-edit-alt'></i>Edit Folder</a></li>
                    <li class="notPublic"><a class="dropdown-item text-danger" href="javascript:;" value="${folderName}" onclick="deleteFolder(this)"><i class='fi bx bx-folder-minus text-danger'></i>Delete Folder</a></li>
                    </ul>
                  </div>
                  
                </div>
                <h6 class="mb-0 folder-name-hover" onclick="handleClick(this)" value="${folderName}">${folderName}</h6>
                <small>${numFiles} files</small>
                </p>
              </div>
            </div>
            `;
          }


          pinnedContainer.appendChild(newFolderCard);
        }else{

          var newFolderCard = document.createElement('div');
          newFolderCard.className = 'col-12 col-lg-4 folder-div';
          newFolderCard.style.zIndex = '0';
          if(public == "true" || member =="true"){

            newFolderCard.innerHTML = `
            <div class="card shadow-none border radius-15">
            <div class="card-body folder-div">
              <div class="d-flex align-items-center folder-div">
                <div class="font-30 text-secondary mt-2" onclick="handleClick(this)" value="${folderName}"><i class="bx bxs-folder"></i></div>
              </div>
              <h6 class="mb-0 folder-name-hover" onclick="handleClick(this)" value="${folderName}">${folderName}</h6>
              <small>${numFiles} files</small>
            </div>
          </div>
            `;
          }else{
            newFolderCard.innerHTML = `
            <div class="card shadow-none border radius-15" style="z-index:0;">
            <div class="card-body folder-div">
              <div class="d-flex align-items-center folder-div">
                <div>
                  <button type="button" id="pinButton" class="pinned-button cursor-pointer position-absolute top-0 start-0" style="z-index:999;" data-toggle="tooltip" data-placement="left" title="Click to Pin Folder" value="${folderName}" onclick="pinFolder(this)"><i class="bx bx-pin fs-5"></i></button>
                  <button type="button" id="" class="info-mod cursor-pointer position-absolute bottom-0 end-0 text-info notPublic" onclick="showNote(this)" data-toggle="tooltip" data-placement="left" title="Click To See Note" value="${folderName}"><i class='bx bx-info-circle fs-4 m-3'></i></button>
                </div>
                <div class="font-30 text-secondary mt-2" onclick="handleClick(this)" value="${folderName}"><i class="bx bxs-folder"></i></div>
              </div>
              <div class="dropdown ms-auto" >
                <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer position-absolute bottom-0 end-0 mb-3 p-3 class="notPublic" data-bs-toggle="dropdown" data-bs-placement="top">
                  <i class="bi bi-three-dots fs-4"></i>
                </button>
                <ul class="dropdown-menu notPublic"  ">
                  <li class="notPublic"><a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#createNote" onclick="setUpFilePath(this)" value="${folderName}"><i class='fi bx bx-add-to-queue'></i>Add note</a></li>
                  <li class="notPublic"><a class="dropdown-item" href="javascript:;" onclick="setUpFilePathEdit(this)" data-bs-toggle="modal" data-bs-target="#editNote" value="${folderName}"><i class='fi bx bx-edit-alt'></i>Edit note</a></li>
                  <li class="notPublic"><a class="dropdown-item text-danger" href="javascript:;" value="${folderName}" onclick="deleteNote(this)"><i class='fi bx bxs-message-x text-danger'></i>Delete note</a></li>
                  <hr class="dropdown-divider">
                  <li class="notPublic"><a class="dropdown-item" href="javascript:;" onclick="pinFolder(this)" value="${folderName}"><i class='fi bx bx-share'></i>Pin Folder</a></li>
                  <hr class="dropdown-divider">
                  <li class="notPublic"><a class="dropdown-item text-danger"  href="javascript:;" value="${folderName}" onclick="deleteFolder(this)"><i class='fi bx bx-folder-minus text-danger'></i>Delete Folder</a></li>
                </ul>
              </div>
              <h6 class="mb-0 folder-name-hover" onclick="handleClick(this)" value="${folderName}">${folderName}</h6>
              <small>${numFiles} files</small>
            </div>
          </div>
            `;

          }

          
          foldersContainer.appendChild(newFolderCard);
        }
        
     

    } catch (error) {
      console.log('Error:', error);
    }
      

      console.log("Folder:", folderName);

      // Call the getFilesInFolder function and display the tooltips
      try {
        const fileNames = await getFilesInFolder(folderName);


        $(newFolderCard).find('.folder-name-hover').tooltip({
          title: function () {
            let fileListHTML = `<div>Added By: ${metadata.customMetadata.createdBy}</div>`;
            fileListHTML += `<div>Date Created: ${metadata.customMetadata.createdDate}</div>`;
            fileListHTML += `<div>Time Created: ${metadata.customMetadata.createdTime}</div>`;
            fileListHTML += `<div>Folder Size: ${ formatFileSize(overallSize)}</div>`;
            fileListHTML += `<div>Uploaded Files:</div>`;
        
            fileListHTML += '<ul>';
            fileNames.forEach((file) => {
              // Check if the file is not ".placeholder" before adding it to the list
              if (file !== '.placeholder') {
                fileListHTML += `<li>${file}</li>`;
              }
            });
            fileListHTML += '</ul>';
            return fileListHTML;
          },
          html: true,
          placement: 'left',
          trigger: 'hover',
          delay: { "show": 500, "hide": 100 },
          container: 'body'
        });
      } catch (error) {
        console.log('Error retrieving files:', error);
      }







    })
  );
} catch (error) {
  console.log("Error:", error);
}
}

var lastSearchTerm = '';

function listFilesInFolder(folderPath, searchTerm) {
  
  document.getElementById('searchInput').addEventListener('keyup', function() {
    var searchTerm = this.value.toLowerCase();
    var foldersContainer = document.getElementById('foldersContainer');
    var pinnedSection = document.getElementById('pinnedSection');
    var folderTitle = document.getElementById('folderTitle');
    if (searchTerm.trim() === '') {
      if (foldersContainer) {
        foldersContainer.style.display = 'flex';
      }
      if (pinnedSection) {
        pinnedSection.style.display = 'flex';
      }
      if (folderTitle) {
        folderTitle.style.display = 'flex';
      }
      return; // If the input is blank, do nothing
      
    }
    if (searchTerm === lastSearchTerm) {
      return;
    }
  
    lastSearchTerm = searchTerm;
    listFilesInFolder(folderPath, searchTerm);
  
    var foldersContainer = document.getElementById('foldersContainer');
    var pinnedSection = document.getElementById('pinnedSection');
    var folderTitle = document.getElementById('folderTitle');
  
    
    if (foldersContainer) {
      foldersContainer.style.display = 'none';
    }
    
    if (pinnedSection) {
      pinnedSection.style.display = 'none';
    }
  
    if (folderTitle) {
      folderTitle.style.display = 'none';
    }
  });
  
  var storage = firebase.storage();
  var folderRef = storage.ref(folderPath);
  console.log('Search Term:', searchTerm);
  checkAndDeleteExpiredFiles(folderPath);

  folderRef
    .listAll()
    .then(function (result) {
      var fileListBody = document.getElementById('fileListBody');
      var currentDate = new Date();

      fileListBody.innerHTML = '';
      // Clear existing rows if there's a search term
      if (searchTerm && fileListBody.innerHTML !== '') {
        fileListBody.innerHTML = '';
      }

      result.items.forEach(function (fileRef) {
        var fileIcon = '';
        var fileNameClass = '';

        fileRef.getMetadata()
          .then(function (metadata) {
            if (fileRef.name.endsWith('.pdf')) {
              fileIcon = 'bi bi-filetype-pdf';
              fileNameClass = 'text-danger';
            } else if (fileRef.name.endsWith('.doc') || fileRef.name.endsWith('.docx')) {
              fileIcon = 'bi bi-filetype-doc';
              fileNameClass = 'text-primary';
            } else if (fileRef.name.endsWith('.xls') || fileRef.name.endsWith('.xlsx')) {
              fileIcon = 'bi bi-filetype-xls';
              fileNameClass = 'text-success';
            } else if (fileRef.name.endsWith('.ppt') || fileRef.name.endsWith('.pptx')) {
              fileIcon = 'bi bi-filetype-ppt';
              fileNameClass = 'ppt';
            } else if (fileRef.name.endsWith('.jpg') || fileRef.name.endsWith('.png')) {
              fileIcon = 'bi bi-file-earmark-image';
              fileNameClass = 'pic';
            } else if (fileRef.name.endsWith('.mp4') || fileRef.name.endsWith('.mov') || fileRef.name.endsWith('.avi') || fileRef.name.endsWith('.wmv')) {
              fileIcon = 'bi bi-film';
              fileNameClass = 'vid';
            } else if (fileRef.name.endsWith('.mp3') || fileRef.name.endsWith('.mpc') || fileRef.name.endsWith('.msv') || fileRef.name.endsWith('.nmf') || fileRef.name.endsWith('.wav')) {
              fileIcon = 'bi bi-file-earmark-music';
              fileNameClass = 'aud';
            } else {
              fileIcon = 'bx bxs-file';
              fileNameClass = '';
            }
            if (metadata && metadata.customMetadata && metadata.customMetadata.expirationDate) {
              var expirationDate = new Date(metadata.customMetadata.expirationDate);
              if (currentDate >= expirationDate) {
                // If the file is expired, skip adding it to the list
                console.log("File is expired and will not be listed:", fileRef.name);
                return; // Return here to skip adding the expired file
              }
            }

            const timeCreated = metadata.timeCreated;
            const date = new Date(timeCreated);
            const formattedTimeCreated = date.toLocaleDateString('en-US', {
              month: 'long',
              day: 'numeric',
              year: 'numeric'
            });

            if (!searchTerm || fileRef.name.toLowerCase().includes(searchTerm)) { // Check if the file name contains the search term
              // Add the file to the list

              if(public == "true"){
                var newRowFile = `
                <tr class="dropdown-cell">
                  <td>
                    <div class="d-flex align-items-center">
                      <div><i class="${fileIcon} me-2 font-24 ${fileNameClass}"></i></div>
                      <div class="font-weight-bold ${fileNameClass}">${fileRef.name}</div>
                    </div>
                  </td>
                  <td>
                    <div class="font-weight-bold">${metadata.customMetadata.createdBy}</div>
                  </td>
                  <td><div class="font-weight-bold">${formattedTimeCreated}</div></td>
                  <td>
                    <div class="dropdown">
                      <button class="btn fs-3" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li ><a class="dropdown-item" href="#" value="${fileRef.name}" onclick="downloadFile(this)"><i class='bx bx-download fi'></i>Download</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                `;
              } else if (member == "true") {
                var newRowFile = `
                <tr class="dropdown-cell">
                  <td>
                    <div class="d-flex align-items-center">
                      <div><i class="${fileIcon} me-2 font-24 ${fileNameClass}"></i></div>
                      <div class="font-weight-bold ${fileNameClass}">${fileRef.name}</div>
                    </div>
                  </td>
                  <td>
                    <div class="font-weight-bold">${metadata.customMetadata.createdBy}</div>
                  </td>
                  <td><div class="font-weight-bold">${formattedTimeCreated}</div></td>
                  <td>
                    <div class="dropdown">
                      <button class="btn fs-3" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li ><a class="dropdown-item" href="#" value="${fileRef.name}" onclick="downloadFile(this)"><i class='bx bx-download fi'></i>Download</a></li>
                `;
                if (metadata.customMetadata.createdBy == getCookie('acc_name')) {
                  newRowFile += ` <li ><a class="dropdown-item text-danger" href="#" value="${fileRef.name}" onclick="deleteFile(this)"><i class="lni lni-remove-file fi text-danger" ></i>Delete</a></li>`;
                }
                newRowFile += `
                      </ul>
                    </div>
                  </td>
                </tr>
                `;
              } else {
                var newRowFile = `
                <tr class="dropdown-cell">
                  <td>
                    <div class="d-flex align-items-center">
                      <div><i class="${fileIcon} me-2 font-24 ${fileNameClass}"></i></div>
                      <div class="font-weight-bold ${fileNameClass}">${fileRef.name}</div>
                    </div>
                  </td>
                  <td>
                    <div class="font-weight-bold">${metadata.customMetadata.createdBy}</div>
                  </td>
                  <td><div class="font-weight-bold">${formattedTimeCreated}</div></td>
                  <td>
                    <div class="dropdown">
                      <button class="btn fs-3" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                      </button>
                      <ul class=" dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li ><a class="dropdown-item" href="#" value="${fileRef.name}" onclick="downloadFile(this)"><i class='bx bx-download fi'></i>Download</a></li>
                        <li class="notPublic"><a class="dropdown-item cursor-pointer" data-bs-toggle="modal" data-bs-target="#FileExpirationModal" value="${fileRef.name}" onclick="setFiletoExpire(this)"><i class='bx bx-time fi'></i>Set File Expiration</a></li>
                        <li class="notPublic"><a class="dropdown-item cursor-pointer" value="${fileRef.name}" data-bs-toggle="modal" data-bs-target="#linkFileModal" onclick="selectFile(this)" ><i class='lni lni-link fi'></i>Link to Event</a></li>
                        <hr class="dropdown-divider">
                        <li class="notPublic"><a class="dropdown-item text-danger" href="#" value="${fileRef.name}" onclick="deleteFile(this)"><i class="lni lni-remove-file fi text-danger" ></i>Delete</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                `;
              }

              fileListBody.innerHTML += newRowFile;
            }

            console.log("File:", fileRef.name);
          })
          .catch(function (error) {
            console.log('Error:', error);
          });
      });
    })
    .catch(function (error) {
      console.log("Error:", error);
    });
}

document.querySelectorAll('.filter-link').forEach(function(link) {
  link.addEventListener('click', function() {
    var selectedFilter = this.dataset.filter;
    updateDisplayedFiles(selectedFilter);
  });
});

function updateDisplayedFiles(filter) {
  // Implement the code to filter and display the files based on the selected filter
  var fileList = document.getElementById('fileListBody');
  var storage = firebase.storage();
  const folderPath = currentPath;
  var folderRef = storage.ref(folderPath);
  
  folderRef
    .listAll()
    .then(function(result) {
      var currentDate = new Date();
      fileListBody.innerHTML = '';

      result.items.forEach(function(fileRef) {
        var fileIcon = '';
        var fileNameClass = '';

        fileRef.getMetadata()
          .then(function(metadata) {
            if (fileRef.name.endsWith('.pdf')) {
              fileIcon = 'bi bi-filetype-pdf';
              fileNameClass = 'text-danger';
            } else if (fileRef.name.endsWith('.doc') || fileRef.name.endsWith('.docx')) {
              fileIcon = 'bi bi-filetype-doc';
              fileNameClass = 'text-primary';
            } else if (fileRef.name.endsWith('.xls') || fileRef.name.endsWith('.xlsx')) {
              fileIcon = 'bi bi-filetype-xls';
              fileNameClass = 'text-success';
            } else if (fileRef.name.endsWith('.ppt') || fileRef.name.endsWith('.pptx')) {
              fileIcon = 'bi bi-filetype-ppt';
              fileNameClass = 'ppt';
            } else if (fileRef.name.endsWith('.jpg') || fileRef.name.endsWith('.png')) {
              fileIcon = 'bi bi-file-earmark-image';
              fileNameClass = 'pic'; 
            } else if (fileRef.name.endsWith('.mp4') || fileRef.name.endsWith('.mov') || fileRef.name.endsWith('.avi') || fileRef.name.endsWith('.wmv')) {
              fileIcon = 'bi bi-film';
              fileNameClass = 'vid';
            } else if (fileRef.name.endsWith('.mp3') || fileRef.name.endsWith('.mpc') || fileRef.name.endsWith('.msv') || fileRef.name.endsWith('.nmf') || fileRef.name.endsWith('.wav')) {
              fileIcon = 'bi bi-file-earmark-music';
              fileNameClass = 'aud';
            } else {
              fileIcon = 'bx bxs-file';
              fileNameClass = '';
            }
            if (metadata && metadata.customMetadata && metadata.customMetadata.expirationDate) {
              var expirationDate = new Date(metadata.customMetadata.expirationDate);
              if (currentDate >= expirationDate) {
                // If the file is expired, skip adding it to the list
                console.log("File is expired and will not be listed:", fileRef.name);
                return;
              }
            }

            const timeCreated = metadata.timeCreated;
            const date = new Date(timeCreated);
            const formattedTimeCreated = date.toLocaleDateString('en-US', {
              month: 'long',
              day: 'numeric',
              year: 'numeric'
            });
            if(filter === "all" || filter.split(',').some(ext => fileRef.name.endsWith(ext))) {
              if(public == "true"){
                var newRowFile = `
                <tr class="dropdown-cell">
                  <td>
                    <div class="d-flex align-items-center">
                      <div><i class="${fileIcon} me-2 font-24 ${fileNameClass}"></i></div>
                      <div class="font-weight-bold ${fileNameClass}">${fileRef.name}</div>
                    </div>
                  </td>
                  <td>
                    <div class="font-weight-bold">${metadata.customMetadata.createdBy}</div>
                  </td>
                  <td><div class="font-weight-bold">${formattedTimeCreated}</div></td>
                  <td>
                    <div class="dropdown">
                      <button class="btn fs-3" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li ><a class="dropdown-item" href="#" value="${fileRef.name}" onclick="downloadFile(this)"><i class='bx bx-download fi'></i>Download</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                `;
              } else if (member == "true") {
                var newRowFile = `
                <tr class="dropdown-cell">
                  <td>
                    <div class="d-flex align-items-center">
                      <div><i class="${fileIcon} me-2 font-24 ${fileNameClass}"></i></div>
                      <div class="font-weight-bold ${fileNameClass}">${fileRef.name}</div>
                    </div>
                  </td>
                  <td>
                    <div class="font-weight-bold">${metadata.customMetadata.createdBy}</div>
                  </td>
                  <td><div class="font-weight-bold">${formattedTimeCreated}</div></td>
                  <td>
                    <div class="dropdown">
                      <button class="btn fs-3" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li ><a class="dropdown-item" href="#" value="${fileRef.name}" onclick="downloadFile(this)"><i class='bx bx-download fi'></i>Download</a></li>
                `;
                if (metadata.customMetadata.createdBy == getCookie('acc_name')) {
                  newRowFile += ` <li ><a class="dropdown-item text-danger" href="#" value="${fileRef.name}" onclick="deleteFile(this)"><i class="lni lni-remove-file fi text-danger" ></i>Delete</a></li>`;
                }
                newRowFile += `
                      </ul>
                    </div>
                  </td>
                </tr>
                `;
              } else {
                var newRowFile = `
                <tr class="dropdown-cell">
                  <td>
                    <div class="d-flex align-items-center">
                      <div><i class="${fileIcon} me-2 font-24 ${fileNameClass}"></i></div>
                      <div class="font-weight-bold ${fileNameClass}">${fileRef.name}</div>
                    </div>
                  </td>
                  <td>
                    <div class="font-weight-bold">${metadata.customMetadata.createdBy}</div>
                  </td>
                  <td><div class="font-weight-bold">${formattedTimeCreated}</div></td>
                  <td>
                    <div class="dropdown">
                      <button class="btn fs-3" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                      </button>
                      <ul class=" dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li ><a class="dropdown-item" href="#" value="${fileRef.name}" onclick="downloadFile(this)"><i class='bx bx-download fi'></i>Download</a></li>
                        <li class="notPublic"><a class="dropdown-item cursor-pointer" data-bs-toggle="modal" data-bs-target="#FileExpirationModal" value="${fileRef.name}" onclick="setFiletoExpire(this)"><i class='bx bx-time fi'></i>Set File Expiration</a></li>
                        <li class="notPublic"><a class="dropdown-item cursor-pointer" value="${fileRef.name}" data-bs-toggle="modal" data-bs-target="#linkFileModal" onclick="selectFile(this)" ><i class='lni lni-link fi'></i>Link to Event</a></li>
                        <hr class="dropdown-divider">
                        <li class="notPublic"><a class="dropdown-item text-danger" href="#" value="${fileRef.name}" onclick="deleteFile(this)"><i class="lni lni-remove-file fi text-danger" ></i>Delete</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                `;
              }

              fileList.innerHTML += newRowFile;
            }
          })
          .catch(function(error) {
            console.log('Error:', error);
          });
      });
    })
    .catch(function(error) {
      console.log("Error:", error);
    });
}


// Call the function with the desired folder path


// get dom in variables
var upload = document.getElementsByClassName('upload')[0];
var hiddenBtn = document.getElementsByClassName('hidden-upload-btn')[0];
var progress = document.getElementsByClassName('progress')[0];
var progressBar = document.getElementById('progressBar');
var statusMessage = document.getElementById('statusMessage');
var pauseBtn = document.getElementById('pauseBtn');
var resumeBtn = document.getElementById('resumeBtn');
var cancelBtn = document.getElementById('cancelBtn');
var successMessage = 'File uploaded successfully!';
var uploadTask = null; // Declare uploadTask globally to access it for cancel, pause, and resume

upload.onclick = function () {
  hiddenBtn.click();
}

hiddenBtn.onchange = function () {
  var file = hiddenBtn.files[0];
  var name = file.name.split('.').shift() + Math.floor(Math.random() * 10) + 10 + '.' + file.name.split('.').pop();
  var type = file.type.split('/')[0];
  var path = currentPath + "/" + name;

    // Set metadata
var metadata = {
  customMetadata: {
    createdBy: decodeURIComponent(getCookie('acc_name')),
  }
};

  var storageRef = firebase.storage().ref(path);

  var allowedFileTypes = [
    'application/pdf',
    'text/plain',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'application/vnd.openxmlformats-officedocument.presentationml.presentation',
    'video/mp4',
    'video/quicktime', // .mov
    'video/x-msvideo', // .avi
    'video/x-ms-wmv',
    'image/jpeg',
    'image/png',
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'application/vnd.ms-excel',
    'audio/mp3',       // .mp3
    'audio/x-musepack', // .mpc
    'audio/x-ms-wma',  // .msv
    'application/x-nmf',
    'audio/wav'  // .nmf
  ];



  if (allowedFileTypes.includes(file.type)) {

    if (uploadTask !== null) {
      uploadTask.cancel().catch(function (error) {
        console.error('Cancel error:', error);
      });
    }
    uploadTask = storageRef.put(file, metadata);

    pauseBtn.style.display = 'inline-block';
    cancelBtn.style.display = 'inline-block';

    uploadTask.on(
      'state_changed',
      function (snapshot) {
        var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
        progressBar.style.width = progress + '%';
        statusMessage.textContent = 'Uploading... ' + Math.round(progress) + '%';

        
      },
      function (error) {
        console.error('Upload error:', error);
      },
      function () {
        // Perform listing after upload
        listFilesInFolder(currentPath);
        listFoldersInFolder(currentPath);

        progressBar.style.width = '0%';
        statusMessage.textContent = successMessage;

        // Hide pause and cancel buttons
        pauseBtn.style.display = 'none';
        cancelBtn.style.display = 'none';
        resumeBtn.style.display = 'none';

        uploadTask = null; // Reset uploadTask here

        setTimeout(function () {
          statusMessage.textContent = '';
        }, 3000); // 3000 milliseconds (3 seconds)
      }
    );
  } else {
    var modalErrorMessage = 'Invalid file type. Only PDF, TXT, DOCX, PPTX, MP4, JPG, PNG, XLSX, and XLS files are allowed.';
    var modalBody = document.getElementById('modalErrorMessage');
    modalBody.textContent = modalErrorMessage;

    var modal = new bootstrap.Modal(document.getElementById('errorModal'));
    modal.show();
  }
}

cancelBtn.addEventListener('click', function () {
  if (uploadTask !== null) {
    Swal.fire({
      title: 'Cancel Upload?',
      text: 'Are you sure you want to cancel the upload?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, cancel it',
      cancelButtonText: 'No, keep uploading'
    }).then((result) => {
      if (result.isConfirmed) {
        uploadTask.cancel();

        // Reset progress bar and status message
        progressBar.style.width = '0%';
        statusMessage.textContent = '';
        // Hide cancel button and pause/resume buttons
        cancelBtn.style.display = 'none';
        pauseBtn.style.display = 'none';
        resumeBtn.style.display = 'none';
        uploadTask = null; // Reset uploadTask here

        Swal.fire(
          'Cancelled!',
          'The upload has been cancelled.',
          'info'
        );
      }
    });
  }
});



pauseBtn.addEventListener('click', function () {
  if (uploadTask) {
    uploadTask.pause();
    pauseBtn.style.display = 'none';
    resumeBtn.style.display = 'inline-block';
  }
});

resumeBtn.addEventListener('click', function () {
  if (uploadTask) {
    uploadTask.resume();
    resumeBtn.style.display = 'none';
    pauseBtn.style.display = 'inline-block';
  }
});

$("#createFolderBtn").click(function(){
  var foldername = $("#folderName").val();  


  var parentFolderPath = currentPath;
  var subfolderName = foldername;


  createSubfolder(parentFolderPath, subfolderName);

  listFilesInFolder(currentPath);
  listFoldersInFolder(currentPath);
});



function deleteFolder(element) {
  var path =  $(element).attr('value');
  
  var storage = firebase.storage();
  var folderRef = storage.ref(currentPath + "/" + path);

  // Check if the folder exists before attempting to delete it
  folderRef.listAll()
    .then(function(result) {
      // List all items (files and subfolders) within the folder
      var deleteFilePromises = result.items.map(function(item) {
        return item.delete();
      });

      // Wait for all files to be deleted
      return Promise.all(deleteFilePromises);
    })
    .then(function() {
      // Delete the folder itself
      return folderRef.delete();
    })
    .then(function() {
      console.log('Folder deleted successfully.');
    })
    .catch(function(error) {
      if (error.code === 'storage/object-not-found') {
        console.log('Folder not found. It might have been already deleted.');
      } else {
        console.error('Error deleting folder:', error);
      }
    });

    listFilesInFolder(currentPath);
    listFoldersInFolder(currentPath);
}


function createSubfolder(parentFolderPath, subfolderName) {
var storage = firebase.storage();
var subfolderRef = storage.ref(parentFolderPath + "/" + subfolderName + "/.placeholder");

var metadata = {
  customMetadata: {
    createdBy: decodeURIComponent(getCookie('acc_name')),
    createdDate: new Date().toLocaleDateString(),
    createdTime: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),            
    // Add more custom metadata properties as needed
  }
};

subfolderRef
  .putString("", "raw", metadata)
  .then(function () {
    console.log("Subfolder created:", parentFolderPath + "/" + subfolderName);
  })
  .catch(function (error) {
    console.log("Error:", error);
  });

}

$('#myFileStroage').click(function() {
  // Call the handleClick function when the button is clicked
  currentPath = getCookie('church_id');
   currentNameTitle = getCookie('church_name');
  var titleContent = '<span class="clickable-path font-weight-bold h4 cursor-pointer" value="' + currentPath + '">' +  decodeURIComponent(currentNameTitle) + '</span>';
  $('#upper-title').html(titleContent);
  
  listFilesInFolder(currentPath); 
  listFoldersInFolder(currentPath);


});

function handleClick(element) {
  $('.folder-name-hover').tooltip('hide');
  $('.folder-div').removeClass('clicked');
  $(element).addClass('clicked');

  var value = $(element).attr('value');
  currentPath = currentPath + "/" + value;
  var folderNames = currentPath.split('/').filter(Boolean);

  // Update the upper title with clickable spans based on the updated currentPath
  updateUpperTitle(folderNames.join(' > '));

  console.log(currentPath);
  listFilesInFolder(currentPath);
  listFoldersInFolder(currentPath);
}

function handleClickNav(element) {
  $('.folder-name-hover').tooltip('hide');
  // $('.folder-div').removeClass('clicked');
  // $(element).addClass('clicked');

  var value = element;
  console.log(value + "he");
  currentPath = value;
  var folderNames = currentPath.split('/').filter(Boolean);

  // Update the upper title with clickable spans based on the updated currentPath
  updateUpperTitle(folderNames.join(' > '));

  console.log(currentPath);
  listFilesInFolder(currentPath);
  listFoldersInFolder(currentPath);
}

  // Function to update the upper title with clickable spans
  function updateUpperTitle(path) {
    var parts = path.split(' > ');

    
    if(public == "true"){ 
      // var replacedPath = path.replace(parts.slice(0, 2).join(' > '), combined);
      parts[0] = parts[0] + '/' + parts[1];
      parts.splice(1, 1); // Remove the second part
    }else if (member == "true"){
      parts[0] = parts[0] + '/' + parts[1];
      parts.splice(1, 1); // Remove the second part
    }
    console.log(parts);

        // Create the HTML content for the upper title with clickable spans
        var titleContent = '';
        var currentPath = '';

        for (var i = 0; i < parts.length; i++) {
          var folderName = parts[i];

          console.log(folderName);

          
          currentPath += folderName;

          if (folderName.includes("/Public") || folderName.includes("/Member")) {
            folderName = folderName.replace(/\//g, " > ");
          }

          console.log(folderName);

        
          if(folderName.substring(0, 2) == "C0"){
            if(folderName.includes(" > Public")){
              folderName =  decodeURIComponent(getCookie('church_name')) + " > Public";
              // titleContent += '<span class="clickable-path font-weight-bold h4 cursor-pointer" value="' + currentPath + '">' + folderName + '</span>'; 
            }else if (folderName.includes(" > Member")){
              folderName =  decodeURIComponent(getCookie('church_name')) + " > Member";
            }else{
              folderName =  decodeURIComponent(getCookie('church_name'));
            }

            titleContent += '<span class="clickable-path font-weight-bold h4 cursor-pointer" value="' + currentPath + '">' + folderName + '</span>';
          }else if(folderName.substring(0, 3) == "COL"){  
            folderName =  currentNameTitle;
            titleContent += '<span class="clickable-path font-weight-bold h4 cursor-pointer" value="' + currentPath + '">' + folderName + '</span>';
          }else{
          titleContent += '<span class="clickable-path font-weight-bold h4 cursor-pointer" value="' + currentPath + '">' + folderName + '</span>';          
          }
          if (i < parts.length - 1) {
            titleContent += '<span class="font-weight-bold h4 "> > </span>';
            currentPath += '/';
          }
        }

    // Update the upper title content
    $('#upper-title').html(titleContent);
  }

  $(document).on('click', '.clickable-path', function() {
    var value = $(this).attr('value');
    console.log(value);
    // Handle the click action (e.g., call handleClick function)
    handleClickNav(value);
  });



$('.folder-div').click(function() {
// Get the value of the clicked div
var value = $(this).attr('value');
console.log(value);
});





function deleteFile(element) {
  var path = $(element).attr('value');
  var storage = firebase.storage();
  var fileRef = storage.ref(currentPath + '/' + path);

  Swal.fire({
    title: 'Are you sure?',
    text: 'You will not be able to recover this file!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      fileRef
        .delete()
        .then(function () {
          console.log("File deleted:", path);
          listFilesInFolder(currentPath);
          listFoldersInFolder(currentPath);
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          );
        })
        .catch(function (error) {
          console.log("Error:", error);
          Swal.fire(
            'Error!',
            'An error occurred while deleting the file.',
            'error'
          );
        });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      Swal.fire(
        'Cancelled',
        'Your file is safe :)',
        'info'
      );
    }
  });
}


function downloadFile(element) {
  var path = $(element).attr('value');
  var storage = firebase.storage();
  console.log(currentPath);
  var fileRef = storage.ref(currentPath + '/' + path);

  fileRef
  .getDownloadURL()
  .then(function (downloadURL) {
    var link = document.createElement('a');
    link.href = downloadURL;
    link.setAttribute('download', fileRef.name);
    link.style.display = 'none';

    // Append the link to the document body
    document.body.appendChild(link);

    // Programmatically trigger the download
    link.click();

    // Remove the link from the document body
    document.body.removeChild(link);

    // Call your listing functions after the download is initiated
    listFilesInFolder(currentPath);
    listFoldersInFolder(currentPath);
  })
  .catch(function (error) {
    console.log('Error:', error);
  });
}

function getCookie(cookieName) {
const cookiePattern = new RegExp(`(?:(?:^|.*;\\s*)${cookieName}\\s*\\=\\s*([^;]*).*$)|^.*$`);
const cookieValue = document.cookie.replace(cookiePattern, "$1");
return cookieValue || null;
}

function setUpFilePath(element){
var path = $(element).attr('value');
currentFile = currentPath + "/" + path;

$("#editNoteButton").attr("id", "addNoteButton");
$("#addNoteButton").text("Create");
$("#addNoteButton").removeAttr("hidden");
$("#noteModalTitle").text("Create Note");

}

function updateMetadata(filePath, updatedMetadata) {
var storage = firebase.storage();
var fileRef = storage.ref(filePath);

fileRef
  .getMetadata()
  .then(function (metadata) {
    // Merge existing metadata with updatedMetadata
    var mergedMetadata = Object.assign({}, metadata, updatedMetadata);

    return fileRef.updateMetadata(mergedMetadata);
  })
  .then(function (metadata) {
    console.log('Metadata updated:', metadata);
  })
  .catch(function (error) {
    console.log('Error:', error);
  });
}

function addNoteMetadata(filePath, note) {
  var storage = firebase.storage();
  var fileRef = storage.ref(filePath);

   // Get existing metadata
   fileRef.getMetadata()
   .then(function(metadata) {
     // If there are existing metadata, update it with the new note
     if (metadata && metadata.customMetadata) {
       var existingMetadata = metadata.customMetadata;
       existingMetadata.folderNote = note;

       // Set the updated metadata to the file
       fileRef.updateMetadata({ customMetadata: existingMetadata })
         .then(function(updatedMetadata) {
           console.log("Metadata updated successfully:", updatedMetadata);
         })
         .catch(function(error) {
           console.error("Error updating metadata:", error);
         });
     } else {
       // If no existing metadata, create new metadata with the note
       var newMetadata = {
         customMetadata: {
           note: note
         }
       };

       // Set the new metadata to the file
       fileRef.updateMetadata(newMetadata)
         .then(function(updatedMetadata) {
           console.log("Metadata added successfully:", updatedMetadata);
         })
         .catch(function(error) {
           console.error("Error adding metadata:", error);
         });
     }
   })
   .catch(function(error) {
     console.error("Error getting metadata:", error);
   });
}

// Function to delete the note (empty folderNote metadata)
function deleteNoteMetadata(filePath) {
  var storage = firebase.storage();
  var fileRef = storage.ref(filePath);

  // Set folderNote to an empty string
  var folderMetaData = {
    customMetadata: {
      folderNote: ""
    }
  };

  return fileRef
    .updateMetadata(folderMetaData)
    .then(function (metadata) {
      console.log('Folder note metadata deleted:', metadata);
    })
    .catch(function (error) {
      console.log('Error:', error);
    });
}

$("#addNoteButton").on("click", function() {
  var note = $("#noteField").val();
  addNoteMetadata(currentFile + '/.placeholder', note);
});

function uploadNote(filePath, textContent) {
  var storage = firebase.storage();
  var fileRef = storage.ref(filePath);

  var blob = new Blob([textContent], { type: 'text/plain' });

  return fileRef
    .put(blob)
    .then(function(snapshot) {
      console.log('Text file uploaded:', snapshot);

      // Wait for the file upload to complete and then update metadata
      return addNoteMetadata(filePath, textContent);
    })
    .catch(function(error) {
      console.log('Error:', error);
    });
}

function deleteNote(element){
  var path = $(element).attr('value');
  currentFile = currentPath + "/" + path;


  deleteNoteMetadata(currentFile + '/.placeholder');
}
// Function to delete the note when needed


function setUpFilePathEdit(element){
var path = $(element).attr('value');
currentFile = currentPath+ '/' + path + '/.placeholder';

$('#noteField').val('');

retrieveNote(currentFile);
}

$("#editNoteButton").on("click", function() {
console.log("hello");
var note = $("#editnoteField").val();
editNote(currentFile, note);
});


function editNote(path, note){
console.log(path);

var storage = firebase.storage();
var fileRef = storage.ref(path);

fileRef
.getMetadata()
.then(function (metadata) {
  // Get the current custom metadata
  var customMetadata = metadata.customMetadata || {};

  // Update the specific custom metadata key
  customMetadata.folderNote = note;

  // Create the updated metadata object
  var updatedMetadata = {
    customMetadata: customMetadata
  };

  // Update the metadata with the changes
  return fileRef.updateMetadata(updatedMetadata);
})
.then(function (metadata) {
  console.log('Metadata updated successfully:', metadata);
})
.catch(function (error) {
  console.log('Error:', error);
});

}


function retrieveNote(NotePath){
var storage = firebase.storage();
var fileRef = storage.ref(NotePath);

fileRef
.getMetadata()
.then(function (metadata) {
  $("#editnoteField").val(metadata.customMetadata.folderNote);
})
.catch(function (error) {
  console.log('Error:', error);
});
}

function pinFolder(element){
var path = $(element).attr('value');
currentFile = currentPath+ '/' + path + '/.placeholder';


var storage = firebase.storage();
var fileRef = storage.ref(currentFile);

// Get the current metadata
fileRef
.getMetadata()
.then(function (metadata) {
  // Add a new custom metadata property
  metadata.customMetadata = {
    ...metadata.customMetadata,
    pin: 'true'
  };
  // Update the metadata with the new property
  return fileRef.updateMetadata(metadata);
})
.then(function (metadata) {
  console.log('Metadata updated successfully:', metadata);
})
.catch(function (error) {
  console.log('Error:', error);
});
}


function unpinFolder(element) {
  var path = $(element).attr('value');

  currentFile = currentPath + '/' + path + '/.placeholder';

  var storage = firebase.storage();
  var fileRef = storage.ref(currentFile);

  // Get the current metadata
  fileRef.getMetadata()
    .then(function(metadata) {
      // Check if "pin" property exists in customMetadata and is initially set to true
      if (metadata.customMetadata && metadata.customMetadata.pin === 'true') {
        // Create a copy of the customMetadata object
        var updatedMetadata = { ...metadata.customMetadata };
        // Set the "pin" property to false
        updatedMetadata.pin = 'false';
        // Update the metadata to modify the "pin" property
        return fileRef.updateMetadata({ customMetadata: updatedMetadata });
      } else {
        // If "pin" property does not exist or is already false, do nothing
        return Promise.resolve();
      }
    })
    .then(function() {
      console.log('Metadata updated successfully: Pin property set to false');
    })
    .catch(function(error) {
      console.log('Error:', error);
    });
}


function showNote(element){

var path = $(element).attr('value');
currentFile = currentPath+ '/' + path + '/.placeholder';


var storage = firebase.storage();
var fileRef = storage.ref(currentFile);

fileRef
.getMetadata()
.then(function (metadata) {

  // Access custom metadata properties
  var note = metadata.customMetadata.folderNote;

  console.log('Content Type:', note);
  $("#noteField").val(note);
  $("#noteModalTitle").val("Note: ");
  $("#addNoteButton").attr("hidden", true);
  $("#createNote").modal('show');
  $("#noteModalTitle").text("Note:");


})
.catch(function (error) {
  console.log('Error:', error);
});

}

$('.affiliatesSection').click(function() {
  var collabID = $(this).val();
  currentPath = collabID;
  currentNameTitle = $(this).attr('church_name');
  listFilesInFolder(currentPath);
  listFoldersInFolder(currentPath);
  console.log('Clicked Button Value:', currentPath);
  var titleContent = '<span class="clickable-path font-weight-bold h4 cursor-pointer" value="' + currentPath + '">' + currentNameTitle + '</span>';
  $('#upper-title').html(titleContent);
});




//for public 

function publicFolder(element){
  var path = getCookie('church_id');
  var path_name =  decodeURIComponent(getCookie('church_name')) +" > Public";

 currentPath = path + "/Public";
 document.cookie = "publicClicked=true; expires=Fri, 31 Dec 2023 23:59:59 GMT; path=/";
 document.cookie = "publicPath=" + currentPath + "; expires=Fri, 31 Dec 2023 23:59:59 GMT; path=/";
 document.cookie = "path_name=" + path_name  +"; expires=Fri, 31 Dec 2023 23:59:59 GMT; path=/";
 

 document.cookie = "memberClicked=false; expires=Fri, 31 Dec 2023 23:59:59 GMT; path=/";


  window.location.href = "filestorage"; 

}
// for member
function memberFolder(element){
  var path = getCookie('church_id');
  var path_name =  decodeURIComponent(getCookie('church_name')) +" > Members";

 currentPath = path + "/Members";
 document.cookie = "memberClicked=true; expires=Fri, 31 Dec 2023 23:59:59 GMT; path=/";
 document.cookie = "memberPath=" + currentPath + "; expires=Fri, 31 Dec 2023 23:59:59 GMT; path=/";
 document.cookie = "path_name=" + path_name  +"; expires=Fri, 31 Dec 2023 23:59:59 GMT; path=/";

 document.cookie = "publicClicked=false; expires=Fri, 31 Dec 2023 23:59:59 GMT; path=/";

  window.location.href = "filestorage"; 

}




function openAffiliateStorage(element){

    var collabID = $(element).val();
   
    currentPath = collabID;

    window.location.href = "filestorage";

}

function selectFile(element){

  var filename =  $(element).attr('value');
  var filepath = currentPath + "/" + filename

  $("#linkFilePath").val(filepath);
  $("#linkFilePathName").val(filename);




}

$("#linkFileBtn").click(function(){


  var event = $("#linkEventInputFile").val();
  var filepath = $("#linkFilePath").val();
  var filename = $("#linkFilePathName").val();
  
  var arrData = [];

  var files = {};
  files.name = filename;
  files.path = filepath;

  arrData.push(files);

  var fileData1 = new FormData(); // Create a new FormData for the first AJAX call
  fileData1.append("event", event);

  $.ajax({
    url: "ajax/checkLinkFile.ajax.php",
    method: "POST",
    data: fileData1,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(answer) {

      try {
        var parsed_data = JSON.parse(answer["linked_files"]);
        if (parsed_data.length != 0) {
          parsed_data.push(files);
        }
        fileData1.append("files", JSON.stringify(parsed_data));
      } catch (error) {
        console.log(arrData);
        fileData1.append("files", JSON.stringify(arrData));
      }

      // Continue with the second AJAX call inside this success block
      var fileData2 = new FormData(); // Create a new FormData for the second AJAX call
      fileData2.append("event", event);
      fileData2.append("files", fileData1.get("files")); // Get the "files" from the first FormData



      $.ajax({
        url: "ajax/link_file.ajax.php",
        method: "POST",
        data: fileData2,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
          console.log(answer)
          $('#linkFileModal').modal('hide');

        },
        error: function(xhr, status, error) {
          //         var errorMessage = xhr.responseText; // Extract the error message
          alert("Error: " + error);
        },
        complete: function() {
        }
      });
  

    },
    error: function(xhr, status, error) {
      //         var errorMessage = xhr.responseText; // Extract the error message
      alert("Error: " + error);
    },
    complete: function() {
    }
  });


})

function setFiletoExpire(element){
  var file = $(element).attr('value');

  $("#fileToExpire").val(file);

}

function setFileExpiration(element){
  var path =   $("#fileToExpire").val();
  var expiration =    $("#expireDate").val(); 

  currentFile = currentPath+ '/' + path;

  
  
  var storage = firebase.storage();
  var fileRef = storage.ref(currentFile);
  
  // Get the current metadata
  fileRef
  .getMetadata()
  .then(function (metadata) {
    // Add a new custom metadata property
    metadata.customMetadata = {
      ...metadata.customMetadata,
      expirationDate: expiration
    };
    // Update the metadata with the new property
    return fileRef.updateMetadata(metadata);
  })
  .then(function (metadata) {
    console.log('Metadata updated successfully:', metadata);
  })
  .catch(function (error) {
    console.log('Error:', error);
  });

  $('#FileExpirationModal').modal('hide');
}



function checkAndDeleteExpiredFiles(folderPath) {
  var storage = firebase.storage();
  var storageRef = storage.ref(folderPath);

  storageRef.listAll().then(function (result) {
    var currentDate = new Date();

    result.items.forEach(function (fileRef) {
      fileRef.getMetadata().then(function (metadata) {
        if (metadata && metadata.customMetadata && metadata.customMetadata.expirationDate) {
          var expirationDate = new Date(metadata.customMetadata.expirationDate);
          if (currentDate >= expirationDate) {
            fileRef
              .delete()
              .then(function () {
                console.log("File deleted:", fileRef.name);
              })
              .catch(function (error) {
                console.log("Error:", error);
              });
          }
        }else{
          console.log(currentDate + expirationDate);
        }
      });
    });
  }).catch(function (error) {
    console.log("Error listing files:", error);
  });
}

// // Call the function when needed
// checkAndDeleteExpiredFiles();
