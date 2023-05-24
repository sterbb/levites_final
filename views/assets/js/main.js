
$(function() {
	"use strict";


// app dropdown
new PerfectScrollbar(".app-container")
new PerfectScrollbar(".header-notifications-list")


$(".sidebar-close").on("click", function() {
	$("body").removeClass("toggled")
})



$(".dark-mode span").click(function () {
	$(this).text(function(i, v){
	   return v === 'dark_mode' ? 'light_mode' : 'dark_mode'
	})
});



$(function() {
	$("#menu").metisMenu()
})


$(".btn-toggle-menu").click(function() {
	$("body").hasClass("toggled") ? ($("body").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($("body").addClass("toggled"), $(".sidebar-wrapper").hover(function() {
		$("body").addClass("sidebar-hovered")
	}, function() {
		$("body").removeClass("sidebar-hovered")
	}))
})





$(function() {
	for (var e = window.location, o = $(".sidebar-wrapper .metismenu li a").filter(function() {
			return this.href == e
		}).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
}),







// email 

$(".email-toggle-btn").on("click", function() {
	$(".email-wrapper").toggleClass("email-toggled")
}), $(".email-toggle-btn-mobile").on("click", function() {
	$(".email-wrapper").removeClass("email-toggled")
}), $(".compose-mail-btn").on("click", function() {
	$(".compose-mail-popup").show()
}), $(".compose-mail-close").on("click", function() {
	$(".compose-mail-popup").hide()
})


// chat 

$(".chat-toggle-btn").on("click", function() {
	$(".chat-wrapper").toggleClass("chat-toggled")
}), $(".chat-toggle-btn-mobile").on("click", function() {
	$(".chat-wrapper").removeClass("chat-toggled")
})




// switcher 

$("#LightTheme").on("click", function() {
	$("html").attr("data-bs-theme", "light")
}),

$("#DarkTheme").on("click", function() {
	$("html").attr("data-bs-theme", "dark")
}),

$("#SemiDarkTheme").on("click", function() {
	$("html").attr("data-bs-theme", "semi-dark")
}),

$("#MinimalTheme").on("click", function() {
	$("html").attr("data-bs-theme", "minimal-theme")
})

$("#ShadowTheme").on("click", function() {
	$("html").attr("data-bs-theme", "shadow-theme")
})


$(".dark-mode").click(function () {
	alert("hello")
	$("html").attr("data-bs-theme" , function(i, v){
	  return v === 'dark' ? 'light' : 'dark';
	})
})



});
//EXPEREMENT under

//pinned button 

const iconButtons = document.querySelectorAll('.pinned-button');

iconButtons.forEach(button => {
  button.addEventListener('click', function() {
    button.classList.toggle('clicked');
  });
});


//tooltip

document.addEventListener('DOMContentLoaded', function() {
	var cardBody = document.querySelector('.custom-tooltip');
	var tooltip = new bootstrap.Tooltip(cardBody);
  
	// Function to generate the tooltip content
	function generateTooltipContent() {

		var addedBy = "JayCobb "

		var creationDate = "2023-04-23";

	  // Retrieve the file's modified date (replace this with your own logic)
	  var modifiedDate = "2023-05-15";
	  
	  // Retrieve the folder size (replace this with your own logic)
	  var folderSize = "10 MB";
	  
	  // Retrieve the recently added files (replace this with your own logic)
	  var recentFiles = ["Prayer.txt", "PrayerofIntention.txt", "DailyReading.txt"];
	  
	  // Generate the tooltip content
	  var tooltipContent = 	"<div>Added by: " + addedBy + "</div>" +
	  						"<div>Date Created: " + creationDate + "</div>" +
	  						"<div>Modified Date: " + modifiedDate + "</div>" +
						   "<div>Folder Size: " + folderSize + "</div>" +
						   "<div>Recent Files:</div>" +
						   "<ul>" +
						   recentFiles.map(function(file) {
							 return "<li>" + file + "</li>";
						   }).join("") +
						   "</ul>";
  
	  // Update the tooltip content using the data-bs-original-title attribute
	  cardBody.setAttribute('data-bs-original-title', tooltipContent);
  
	  // Update the tooltip instance
	  tooltip.dispose();
	  tooltip = new bootstrap.Tooltip(cardBody);
	}


  
	// Call the generateTooltipContent function when needed
	generateTooltipContent();
  });



  //modal


  document.addEventListener('DOMContentLoaded', function() {
    var modal = new bootstrap.Modal(document.getElementById('exampleScrollableModal'));
    var modalTrigger = document.getElementById('modalTrigger');
    var modalBody = document.querySelector('#exampleScrollableModal .modal-body');
  
    modalTrigger.addEventListener('click', function() {
        modalBody.innerHTML = '<p>Folder contents</p>';
        modal.show();
    });
})



//File-storage 

document.addEventListener('DOMContentLoaded', function () {
	// Add File Form submission handler
	document.getElementById('addFileForm').addEventListener('submit', function (e) {
	  e.preventDefault(); // Prevent form submission
	  
	  // Get the selected file from the file input field
	  const fileInput = document.getElementById('fileInput');
	  const file = fileInput.files[0];
	  
	  if (file) {
		// Create a new list item for the file and append it to the file list
		const fileList = document.getElementById('fileList');
		const newFileItem = document.createElement('li');
		newFileItem.innerHTML = `${file.name} <button class="btn btn-danger btn-sm delete-file">Delete</button> <button class="btn btn-primary btn-sm view-file">View</button>`;
		fileList.appendChild(newFileItem);
		
		// Clear the file input field
		fileInput.value = '';
	  }
	});
	
	// Delete File button click handler
	document.addEventListener('click', function (e) {
	  if (e.target.classList.contains('delete-file')) {
		// Remove the file's list item when the delete button is clicked
		const fileItem = e.target.parentNode;
		fileItem.remove();
	  }
	});
  
	// View File button click handler
	document.addEventListener('click', function (e) {
	  if (e.target.classList.contains('view-file')) {
		const fileName = e.target.parentNode.firstChild.textContent.trim();
		const fileViewer = document.getElementById('fileViewer');
		const filePreview = document.getElementById('filePreview');
		
		// Set the source of the file preview iframe
		filePreview.src = `path/to/files/${fileName}`;
		
		// Show the file viewer and hide the file list
		fileViewer.style.display = 'block';
		document.getElementById('fileList').style.display = 'none';
	  }
	});
  });


  // JavaScript
document.getElementById('uploadButton').addEventListener('click', function () {
	document.getElementById('fileInput').click();
  });
  
  document.getElementById('fileInput').addEventListener('change', function () {
	var file = this.files[0];
	if (file) {
	  uploadFile(file);
	}
  });
  
  function uploadFile(file) {
	// Implement your file upload logic here
	// You can use AJAX, fetch, or a form submission to send the file to the server
	// Example:
	console.log('Uploading file:', file.name);
  }

  
  