
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

		var creationDate = "2023-04-23";

	  // Retrieve the file's modified date (replace this with your own logic)
	  var modifiedDate = "2023-05-15";
	  
	  // Retrieve the folder size (replace this with your own logic)
	  var folderSize = "10 MB";
	  
	  // Retrieve the recently added files (replace this with your own logic)
	  var recentFiles = ["Prayer.txt", "PrayerofIntention.txt", "DailyReading.txt"];
	  
	  // Generate the tooltip content
	  var tooltipContent = 	"<div>Date Created: " + creationDate + "</div>" +
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