// For Firebase JS SDK v7.20.0 and later, measurementId is optional
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
$(document).ready(function(){
  var divElements = document.getElementsByClassName('affiliateStorage');
var currentPath = getCookie('church_id');


// Loop through each div element
Array.from(divElements).forEach(function (divElement) {
  var storage = firebase.storage();
  var folderRef = storage.ref(divElement.id);
  var totalSize = 0;
  var totalFiles = 0;
  var progressBar = document.getElementById('progress-bar' + divElement.id);

  folderRef
    .listAll()
    .then(function (result) {
      var promises = [];
      totalFiles = result.items.length;

      // Iterate through all the items (files) in the folder
      result.items.forEach(function (item) {
        promises.push(
          item.getMetadata().then(function (metadata) {
            totalSize += metadata.size;

            // When all files have been processed, update the div element with the total size
            if (promises.length === totalFiles) {
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
            }
          })
        );
      });

      // Wait for all the promises to resolve
      return Promise.all(promises);
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

var currentPath = getCookie('church_id');
//For adding note / for folder manipulation
var currentFile = '';

async function getFilesInFolder(folderName) {
try {
  // Get a reference to the Firebase Cloud Storage
  var storage = firebase.storage();

  // Replace 'your-folder-path' with the actual path to the folder containing your files
  var folderRef = storage.ref(currentPath + folderName);

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
  foldersContainer.innerHTML = ''; // Clear existing folders
  

  await Promise.all(
    result.prefixes.map(async (prefixRef) => {
      var folderName = prefixRef.name.replace(/\/$/, ''); // Remove trailing slash if present

      var storage = firebase.storage();
      var fileRef = storage.ref(currentPath +'/' + folderName + '/.placeholder');

      const fileRefs = await prefixRef.listAll();
      let overallSize = 0;

      await Promise.all(
        fileRefs.items.map(async (fileRef) => {
          const fileSize = await getFileSize(fileRef);
          overallSize += fileSize;
        })
      );

      var metadata = {
        customMetadata: {
          createdBy: getCookie('acc_name'),
          createdDate: new Date().toLocaleDateString(),
          createdTime: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),            
          overallSize: formatFileSize(overallSize),
          // Add more custom metadata properties as needed
        }
      };

      try {
        const metadata = await fileRef.getMetadata();


        if (metadata.customMetadata.pin == 'true') {
          var newFolderCard = document.createElement('div');
          newFolderCard.className = 'col-12 col-lg-4 folder-div';
          newFolderCard.innerHTML = `
          <div class="card radius-10 border-0 border-bottom border-primary border-4 shadow-sm">
          <div class="card-body" id="public_folder" data-bs-target="#folderModal">
            <div class="d-flex align-items-center">
              <div class="font-30 text-primary mt-3">
                <i class='bx bxs-folder fs-1'></i>
                <button type="button" id="" class="pinned-button cursor-pointer position-absolute top-0 start-0 clicked" data-bs-toggle="dropdown">
                  <i class="bx bx-pin fs-4 "></i>
                </button>
                <button type="button" id="" class="info-mod cursor-pointer position-absolute bottom-0 end-0 text-info folderName" onclick="showNote(this)" value=${folderName}>
                  <i class='bx bx-info-circle fs-4 m-3'></i>
                </button>
              </div>
              <div class="dropdown ms-auto">
                <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer position-absolute bottom-0 end-0" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots fs-4"></i>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-add-to-queue' ></i>Add note</a></li>
                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-edit-alt' ></i>Edit note</a></li>
                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bxs-message-x' ></i>Delete note</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-share' ></i>Share Folder</a></li>
                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-edit-alt' ></i>Edit Folder</a></li>
                  <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-folder-minus' ></i>Delete Folder</a></li>
                </ul>
              </div>
            </div>
            <h5 class="mt-3 mb-0 cursor-pointer custom-tooltip" data-bs-toggle="modal" data-delay="2000" data-bs-target="#folderModal" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="" data-bs-html="true">
              <span class="folder-name-hover">${folderName}</span>
            </h5>
          </div>
        </div>
          `;

          pinnedContainer.appendChild(newFolderCard);
        }else{
          
          var newFolderCard = document.createElement('div');
          newFolderCard.className = 'col-12 col-lg-4 folder-div';
          newFolderCard.innerHTML = `
          <div class="card shadow-none border radius-15">
          <div class="card-body folder-div">
            <div class="d-flex align-items-center folder-div">
              <div>
                <button type="button" id="pinButton" class="pinned-button cursor-pointer position-absolute top-0 start-0" style="z-index:999;" value=${folderName} onclick="pinFolder(this)"><i class="bx bx-pin fs-5"></i></button>
                <button type="button" id="" class="info-mod cursor-pointer position-absolute bottom-0 end-0 text-info" onclick="showNote(this)" value=${folderName}><i class='bx bx-info-circle fs-4 m-3'></i></button>
              </div>
              <div class="font-30 text-secondary mt-2" onclick="handleClick(this)" value=${folderName}><i class="bx bxs-folder"></i></div>
            </div>
            <div class="dropdown ms-auto">
              <button type="button" class="btn-option dropdown-toggle dropdown-toggle-nocaret cursor-pointer position-absolute bottom-0 end-0 mb-3 p-3" data-bs-toggle="dropdown">
                <i class="bi bi-three-dots fs-4"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#createNote" onclick="setUpFilePath(this)" value=${folderName}><i class='fi bx bx-add-to-queue'></i>Add note</a></li>
                <li><a class="dropdown-item" href="javascript:;" onclick="setUpFilePathEdit(this)" data-bs-toggle="modal" data-bs-target="#editNote" value=${folderName}><i class='fi bx bx-edit-alt'></i>Edit note</a></li>
                <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bxs-message-x'></i>Delete note</a></li>
                <hr class="dropdown-divider">
                <li><a class="dropdown-item" href="javascript:;" onclick="pinFolder(this)" value=${folderName}><i class='fi bx bx-share'></i>Pin Folder</a></li>
                <hr class="dropdown-divider">
                <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-share'></i>Share Folder</a></li>
                <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-share'></i>Link to Event</a></li>
                <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-edit-alt'></i>Edit Folder</a></li>
                <li><a class="dropdown-item" href="javascript:;"><i class='fi bx bx-folder-minus'></i>Delete Folder</a></li>
              </ul>
            </div>
            <h6 class="mb-0 folder-name-hover" onclick="handleClick(this)" value=${folderName}>${folderName}</h6>
            <small>0 files</small>
          </div>
        </div>
          `;

          
          foldersContainer.appendChild(newFolderCard);
        }
        
     

    } catch (error) {
      console.log('Error:', error);
    }
      

      console.log("Folder:", folderName);

      // Call the getFilesInFolder function and display the tooltips
      try {
        const fileNames = await getFilesInFolder(folderName);

        // Now, we will display the file names as tooltips when hovering over '.folder-name-hover'
        // You can use any tooltip library or custom logic for displaying tooltips,
        // but here, I'll show you how to use Bootstrap's tooltip as an example

        $(newFolderCard).find('.folder-name-hover').tooltip({
          title: function () {
            let fileListHTML = `<div>Added By: ${metadata.customMetadata.createdBy}</div>`;
            fileListHTML += `<div>Date Created: ${metadata.customMetadata.createdDate}</div>`;
            fileListHTML += `<div>Time Created: ${metadata.customMetadata.createdTime}</div>`;
            fileListHTML += `<div>Folder Size: ${metadata.customMetadata.overallSize}</div>`;
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
          delay: { "show": 500, "hide": 0 },
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





// Function to list files in a folder
function listFilesInFolder(folderPath) {
  var storage = firebase.storage();
  var folderRef = storage.ref(folderPath);

  folderRef
    .listAll()
    .then(function (result) {
      var fileListBody = document.getElementById('fileListBody');
      fileListBody.innerHTML = ''; // Clear existing rows

      result.items.forEach(function (fileRef) {
        var fileIcon = '';
        var fileNameClass = '';

        // Determine file type and set appropriate icon and class
        if (fileRef.name.endsWith('.pdf')) {
          fileIcon = 'bx bxs-file-pdf';
          fileNameClass = 'text-danger';
        } else if (fileRef.name.endsWith('.doc') || fileRef.name.endsWith('.docx')) {
          fileIcon = 'bx bxs-file';
          fileNameClass = 'text-primary';
        } else if (fileRef.name.endsWith('.xls') || fileRef.name.endsWith('.xlsx')) {
          fileIcon = 'bx bxs-file-doc';
          fileNameClass = 'text-success';
        } else {
          fileIcon = 'bx bxs-file';
          fileNameClass = '';
        }

        var storage = firebase.storage();
        var fileRef2 = storage.ref(folderPath + "/"+fileRef.name);
      
        fileRef2
        .getMetadata()
        .then(function (metadata) {
          const timeCreated = metadata.timeCreated;
          const date = new Date(timeCreated);
          const formattedTimeCreated = date.toLocaleDateString('en-US', {
            month: 'long',
            day: 'numeric',
            year: 'numeric'
          });
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
                <li><a class="dropdown-item" href="#" value="${fileRef.name}" onclick="downloadFile(this)"><i class='bx bx-download fi'></i>Download</a></li>
                <li><a class="dropdown-item" href="#"><i class='bx bx-calendar-plus fi'></i>Add to event</a></li>
                <hr class="dropdown-divider">
                <li><a class="dropdown-item" href="#" value="${fileRef.name}" onclick="deleteFile(this)"><i class="lni lni-remove-file fi" ></i>Delete</a></li>
              </ul>
            </div>
          </td>
        </tr>
        
          `;
          fileListBody.innerHTML += newRowFile;
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
// Call the function with the desired folder path


// get dom in variables
var upload = document.getElementsByClassName('upload')[0];
var hiddenBtn = document.getElementsByClassName('hidden-upload-btn')[0];
var progress = document.getElementsByClassName('progress')[0];
var percent = document.getElementsByClassName('percent')[0];
var pause = document.getElementsByClassName('pause')[0];
var resume = document.getElementsByClassName('resume')[0];
var cancel = document.getElementsByClassName('cancel')[0];

// create function for select a file
upload.onclick = function () {
  hiddenBtn.click();
}

// // also store files path in localstorage or in database for further use
// if(!localStorage.getItem("uploaded-metadata")){
//     var metadata = '[]';
//     localStorage.setItem('uploaded-metadata', metadata)
// }

// get selected file and upload function
hiddenBtn.onchange = function () {
  // get file
  var file = hiddenBtn.files[0];
  // change file name so cannot overwrite
  var name = file.name.split('.').shift() + Math.floor(Math.random() * 10) + 10 + '.' + file.name.split('.').pop();
  var type = file.type.split('/')[0];
  var path = currentPath + "/" + name;

    // Set metadata
var metadata = {
  customMetadata: {
    createdBy: getCookie('acc_name'),
    key2: 'value2'
  }
};

  // now upload
  var storageRef = firebase.storage().ref(path);
  var uploadTask = storageRef.put(file, metadata);

   // Listen for upload completion
uploadTask.on(
  'state_changed',
  null,
  null,
  function () {
    // Perform listing after upload
    listFilesInFolder(currentPath);
    listFoldersInFolder(currentPath);
  }
);

  listFilesInFolder(currentPath);
  listFoldersInFolder(currentPath);

}

$("#createFolderBtn").click(function(){
var foldername = $("#folderName").val();  


var parentFolderPath = currentPath;
var subfolderName = foldername;

createSubfolder(parentFolderPath, subfolderName);

listFilesInFolder(currentPath);
listFoldersInFolder(currentPath);
});


function createSubfolder(parentFolderPath, subfolderName) {
var storage = firebase.storage();
var subfolderRef = storage.ref(parentFolderPath + "/" + subfolderName + "/.placeholder");

var metadata = {
  customMetadata: {
    createdBy: getCookie('acc_name'),
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


function handleClick(element) {

// Remove the 'clicked' class from all divs
$('.folder-div').removeClass('clicked');

// Add the 'clicked' class to the clicked div
$(element).addClass('clicked');

// Get the value of the clicked div
var value = $(element).attr('value');
currentPath += value ;
console.log(currentPath);
listFilesInFolder(currentPath);
listFoldersInFolder(currentPath);
}

$('.folder-div').click(function() {
// Get the value of the clicked div
var value = $(this).attr('value');
console.log(value);


});


function deleteFile(element) {

var path = $(element).attr('value');
var storage = firebase.storage();
var fileRef = storage.ref(currentPath + '/' + path);

fileRef
  .delete()
  .then(function () {
    console.log("File deleted:", path);
    listFilesInFolder(currentPath);
    listFoldersInFolder(currentPath);
  })
  .catch(function (error) {
    console.log("Error:", error);
  });
}

function downloadFile(element) {
var path = $(element).attr('value');
var storage = firebase.storage();
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

function addNoteMetadata(filePath) {
var storage = firebase.storage();
var fileRef = storage.ref(filePath);

var note = $("#noteField").val();
// Set metadata
var folderMetaData = {
  customMetadata: {
    folderNote: note
  }
};


fileRef
  .getMetadata()
  .then(function (metadata) {
    // Merge existing metadata with updatedMetadata
    var mergedMetadata = Object.assign({}, metadata, folderMetaData);

    return fileRef.updateMetadata(mergedMetadata);
  })
  .then(function (metadata) {
    console.log('Metadata updated:', metadata);
  })
  .catch(function (error) {
    console.log('Error:', error);
  });
}


$("#addNoteButton").on("click", function() {

var note = $("#noteField").val();
uploadNote(currentFile + '/.placeholder', note);
});

function uploadNote(filePath, textContent) {
var storage = firebase.storage();
var fileRef = storage.ref(filePath);

var blob = new Blob([textContent], { type: 'text/plain' });

return fileRef
  .put(blob)
  .then(function (snapshot) {
    console.log('Text file uploaded:', snapshot);

    addNoteMetadata(filePath);
  })
  .catch(function (error) {
    console.log('Error:', error);
  });
      
}


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
alert(path);
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



function showNote(element){

var path = $(element).attr('value');
currentFile = currentPath+ '/' + path + '/.placeholder';
alert(currentFile);


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


})
.catch(function (error) {
  console.log('Error:', error);
});

}

$('.affiliatesSection').click(function() {
  var collabID = $(this).val();
  currentPath = collabID;
  listFilesInFolder(currentPath);
  listFoldersInFolder(currentPath);
  console.log('Clicked Button Value:', buttonValue);
});

