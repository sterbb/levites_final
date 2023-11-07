$(function(){
// jQuery
$(document).ready(function() {



	function checkDeactivated(){
		

		var activate = new FormData();

		$.ajax({
		  url: "ajax/check_deactivation.ajax.php",
		  method: "POST",
		  data: activate,
		  cache: false,
		  contentType: false,
		  processData: false,
		  dataType: "text",	
		  success: function(answer) {
			console.log(answer);		
			if(answer['church_status'] == 1 && answer['rejected_status'] == 1){
					$('#lockScreen').modal({
						backdrop: 'static',
						keyboard: false
					})
					
					$('#lockScreen').modal('show');
			}
	
		  },
		  error: function(xhr, status, error) {
			alert(xhr);
				console.log(xhr);
				console.log(error);
			  alert("Oops. Something went wrong! ayuga");
		  },
		  complete: function() {
		  }
		});
		
	}
    
	if(getCookie('acc_type') == "admin" || getCookie('acc_type') == "subuser" || getCookie('acc_type') == "publicSub"){
		checkDeactivated();
	}

    
    const themeSwitcher = $('#theme-switcher');
    const root = $('html');
    const savedTheme = localStorage.getItem('theme');
  
    if (savedTheme) {
      root.attr('data-bs-theme', savedTheme);
    }
  
    themeSwitcher.on('click', function() {
      if (root.attr('data-bs-theme') === 'light') {
        root.attr('data-bs-theme', 'dark');
        localStorage.setItem('theme', 'dark');
      } else {
        root.attr('data-bs-theme', 'light');
        localStorage.setItem('theme', 'light');
      }

      $(".dark-mode span").text(function(i, v){
        return v === 'dark_mode' ? 'light_mode' : 'dark_mode'
     })

    });


    $(".btn-toggle-menu").click(function() {
      $("body").hasClass("toggled") ? ($("body").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($("body").addClass("toggled"), $(".sidebar-wrapper").hover(function() {
        $("body").addClass("sidebar-hovered")
      }, function() {
        $("body").removeClass("sidebar-hovered")
      }))
    })
    
	// chart 8
	var options = {
		series: [44, 55, 13, 43, 22],
		chart: {
			foreColor: '#9ba7b2',
			height: 200,
			type: 'pie',
		},
		colors: ["#999999", "#6f42c1", "#d63384", "#fd7e14", "#20c997"],
		labels: ['Free', 'Documents', 'PDF', 'Presentation', 'Excel'],
    legend: {
      show: false // Hide the legend labels
    },
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					height: 360
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#chart8"), options);
	chart.render();

      
	// chart 9
	var options = {
		series: [68, 21, 10, 12, 15],
		chart: {
			foreColor: '#9ba7b2',
			height: 200,
			type: 'pie',
		},
		colors: ["#999999", "#6f42c1", "#d63384", "#fd7e14", "#20c997"],
		labels: ['Free', 'Documents', 'PDF', 'Presentation', 'Excel'],
    legend: {
      show: false // Hide the legend labels
    },
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					height: 360
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#chart9"), options);
	chart.render();

  // chart 10
	var options = {
		series: [20, 30, 21, 35, 37],
		chart: {
			foreColor: '#9ba7b2',
			height: 200,
			type: 'pie',
		},
		colors: ["#999999", "#6f42c1", "#d63384", "#fd7e14", "#20c997"],
		labels: ['Free', 'Documents', 'PDF', 'Presentation', 'Excel'],
    legend: {
      show: false // Hide the legend labels
    },
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					height: 360
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#chart10"), options);
	chart.render();

  // chart 9
	var options = {
		series: [36, 44, 52, 32, 54],
		chart: {
			foreColor: '#9ba7b2',
			height: 200,
			type: 'pie',
		},
		colors: ["#999999", "#6f42c1", "#d63384", "#fd7e14", "#20c997"],
		labels: ['Free', 'Documents', 'PDF', 'Presentation', 'Excel'],
    legend: {
      show: false // Hide the legend labels
    },
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					height: 360
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#chart11"), options);
	chart.render();

	

	function getCookie(cookieName) {
		// Split the document.cookie string into individual cookies
		const cookies = document.cookie.split(";");
	  
		// Loop through each cookie to find the one with the specified name
		for (const cookie of cookies) {
		  // Trim any leading or trailing spaces from the cookie
		  const trimmedCookie = cookie.trim();
	  
		  // Check if the cookie starts with the provided name
		  if (trimmedCookie.startsWith(cookieName + "=")) {
			// Extract and return the value of the cookie
			return trimmedCookie.substring(cookieName.length + 1);
		  }
		}
	  
		// Return null if the cookie is not found
		return null;
	  }

	function setMap(){
	var acc_type = getCookie("acc_type");
	if(acc_type == "admin"){

		var pass = "";
		var getMap = new FormData();
		getMap.set("pass", pass);

		// Make an AJAX request to save the latitude and longitude
		$.ajax({
			url: "ajax/get_mapChurch.ajax.php",
			method: "POST",
			data: getMap,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function(answer) {
			  console.log(answer.lat);
			  var lat = answer.lat;
			  var lng = answer.lng;

			  if(lat == ''  && lng == ''){
				lat = 10.657672189514196;
				lng = 122.9485041461885;
			  }
			  
				var myLatLng = {
					lat: parseFloat(lat),
					lng: parseFloat(lng),
				  };

				  var map = new google.maps.Map(document.getElementById('marker-map'), {
					zoom: 17,
					center: myLatLng,
				  });
	
	

				  var marker;
				  
				  // Initialize the marker
				  function initMarker() {
					marker = new google.maps.Marker({
					  position: myLatLng,
					  map: map,
					  draggable: true,
					});
				  
					google.maps.event.addListener(marker, 'dragend', function(event) {
					  var latitude = event.latLng.lat();
					  var longitude = event.latLng.lng();
				  
					  // Center of map
					  map.panTo(new google.maps.LatLng(latitude, longitude));
				  
					  // Update marker position
					  marker.setPosition(new google.maps.LatLng(latitude, longitude));
					});
				  }
				  
				  // Add a click event listener to the map
				  google.maps.event.addListener(map, 'click', function(event) {
					var latitude = event.latLng.lat();
					var longitude = event.latLng.lng();

				  
					// Set the marker position to the clicked location
					marker.setPosition(event.latLng);
				  
					// Center of map
					map.panTo(event.latLng);
				  });
				  
				  // Handle button click
				  $('#updateChurchloc').click(function() {
					var latitude = marker.getPosition().lat();
					var longitude = marker.getPosition().lng();

				  
					var addChurchMap = new FormData();
					addChurchMap.set("latitude", latitude);
					addChurchMap.set("longitude", longitude);
				  
					// Make an AJAX request to save the latitude and longitude
					$.ajax({
					  url: "ajax/church_map.ajax.php",
					  method: "POST",
					  data: addChurchMap,
					  cache: false,
					  contentType: false,
					  processData: false,
					  dataType: "text",
					  success: function(answer) {

						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000,
							timerProgressBar: true,
							didOpen: (toast) => {
							  toast.addEventListener('mouseenter', Swal.stopTimer)
							  toast.addEventListener('mouseleave', Swal.resumeTimer)
							}
						  });
						
						  Toast.fire({
							icon: 'success',
							title: 'Location saved successfully.'
						  });
					  },
					  error: function() {
						alert("Oops. Something went wrong! diri");
					  },
					  complete: function() {
					  }
					});
				  });
				  
				  // Initialize the marker on page load
				  initMarker();
				
			},
			error: function() {
				alert("Oops. Something went wrong! diri");
			},
			complete: function() {
			}
		  });

		}else{

			var pass = "";
			var getMap = new FormData();
			getMap.set("pass", pass);
	
			// Make an AJAX request to save the latitude and longitude
			$.ajax({
				url: "ajax/get_mapChurch.ajax.php",
				method: "POST",
				data: getMap,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(answer) {
				  console.log(answer);
		
				  if (answer && answer.lat && answer.lng) {
					var profilemyLatLng = {
					  lat: parseFloat(answer.lat),
					  lng: parseFloat(answer.lng),
					};
				  
					var Newmap = new google.maps.Map(document.getElementById('profile-map'), {
					  zoom: 17,
					  center: profilemyLatLng
					});
					var Newmarker = new google.maps.Marker({
					  position: profilemyLatLng,
					  map: Newmap,
					  title: 'Our Lady Of Lourdes Parish Church'
					});
				  } else {
					// If no data is available, display a message
					var mapElement = document.getElementById('profile-map');
					mapElement.innerHTML = 'No data available.';
					mapElement.style.fontSize = '24px'; // Set the font size to make it bigger
					mapElement.style.textAlign = 'center'; // Center the text
					mapElement.style.paddingTop = '50%'; // Center vertically (adjust as needed)
				  }
				  
					
				},
				error: function() {
				
				},
				complete: function() {
				}
			  });


		}
	}
	setMap();



});


  


  $(function() {
	$("#menu").metisMenu()
})

  $(function() {
    for (var e = window.location, o = $(".sidebar-wrapper .metismenu li a").filter(function() {
        return this.href == e
      }).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
  })
  
  
  $(document).on('click', '#edit-website', function() {
    $("#edit-website").removeClass("btn-outline-success");
    $("#edit-website").addClass("btn-outline-danger");
    $("#edit-website").attr('id', 'editing-website');
	$(".minus-website").removeAttr("hidden");
  });

  // Attach click event handler to a parent elementupper
  $(document).on('click', '#editing-website', function() {
    $("#editing-website").addClass("btn-outline-success");
    $("#editing-website").removeClass("btn-outline-danger");
    $("#editing-website").attr('id', 'edit-website');
	$(".minus-website").attr("hidden",true);
  });


  $(document).on('click', '.edit-playlist', function() {
    $(".edit-playlist").removeClass("btn-outline-success");
    $(".edit-playlist").addClass("btn-outline-danger");
    $(".edit-playlist").attr('id', 'editing-playlist');
	$(".minus-playlist").removeAttr("hidden");
  });



  // Attach click event handler to a parent element
  $(document).on('click', '#editing-playlist', function() {
    $("#editing-playlist").addClass("btn-outline-success");
    $("#editing-playlist").removeClass("btn-outline-danger");
    $("#editing-playlist").attr('id', 'edit-playlist');
	$(".minus-playlist").attr("hidden",true);
  });

//  Chart sa report


	// chart 8
	var options = {
		series: [44, 55, 13, 43, 22],
		chart: {
			foreColor: '#9ba7b2',
			height: 330,
			type: 'pie',
		},
		colors: ["#0d6efd", "#6f42c1", "#d63384", "#fd7e14", "#20c997"],
		labels: ['Document', 'Forms', 'PDFs', 'Presentations', 'Spreedsheet'],
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					height: 360
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#sansebchart"), options);
	chart.render();

  	// chart 8
	var options = {
		series: [122, 546, 453, 456, 123],
		chart: {
			foreColor: '#9ba7b2',
			height: 330,
			type: 'pie',
		},
		colors: ["#0d6efd", "#6f42c1", "#d63384", "#fd7e14", "#20c997"],
		labels: ['Document', 'Forms', 'PDFs', 'Presentations', 'Spreedsheet'],
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					height: 360
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#chartStat"), options);
	chart.render();

	// chart 8
	var options = {
		series: [123, 54, 78, 645, 213],
		chart: {
			foreColor: '#9ba7b2',
			height: 330,
			type: 'pie',
		},
		colors: ["#0d6efd", "#6f42c1", "#d63384", "#fd7e14", "#20c997"],
		labels: ['Document', 'Forms', 'PDFs', 'Presentations', 'Spreedsheet'],
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					height: 360
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#chartNew"), options);
	chart.render();



	$('#loginForm2').submit(function(event) {
		// Prevent the default form submission behavior
		event.preventDefault();
	
		var username = $("#inputEmailAddress").val();



		var account = new FormData();
		account.append("username", username);

		$.ajax({
			url: "ajax/login_account.ajax.php",
			method: "POST",
			data: account,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "text",
			success: function(answer) {

				document.cookie = 'type =' +answer; 
			  if(answer == "admin"){
				
				window.location.href='adminhomepage';
			  }else if(answer == "public"){
				window.location.href='publichomepage';
			  }else if(answer == "superuser"){
				window.location.href='superuser';
			  }else if(answer == "subuser"){
				window.location.href='adminhomepage';
			  }
		   
		   
			},
			error: function() {
				alert("Oops. Something went wrong! diri");
			},
			complete: function() {
			}
		});

	  });

	  
	

 


})

function myTimer() {
	const date = new Date();
	document.getElementById("today_time").innerHTML = date.toLocaleTimeString();
  }

  function currentDate() {
	var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	let dtoday = new Date().toLocaleDateString('en-US', { month: 'long', year: 'numeric', day: 'numeric' });
	let d = new Date();
	document.getElementById("today_date").innerHTML = dtoday + " ";
	document.getElementById("today_day").innerHTML = days[d.getDay()] + ", ";
  }

  window.addEventListener("DOMContentLoaded", function() {
	currentDate();
	setInterval(myTimer, 1000); // Update time every second
  });




