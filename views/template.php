<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Levites</title>
    <link rel="icon" href="views/images/try2.png" type="image/x-icon" alt="Favicon">




	<!--plugins-->

	<link href="views/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="views/assets/plugins/fullcalendar/css/main.min.css" rel="stylesheet">
    <link href="views/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
    <link href="views/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet">
    <link href="views/assets/plugins/input-tags/css/tagsinput.css" rel="stylesheet">
	<link href="views/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<link rel="stylesheet" href="views/assets/plugins/flatpickr/flatpickr.min.css">
	<link href="views/assets/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet">
	<link href="views/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet">
	<link href="views/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet">




    <!-- loader-->
    <link href="views/assets/css/pace.min.css" rel="stylesheet">
    <script src="views/assets/js/pace.min.js"></script>
    <!--Styles-->
    <link href="views/assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="views/assets/css/icons.css">


    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="views/assets/css/extra-icons.css" rel="stylesheet">
    <link href="views/assets/css/main.css" rel="stylesheet">
    <link href="views/assets/css/dark-theme.css" rel="stylesheet">
    <link href="views/assets/css/semi-dark-theme.css" rel="stylesheet">
    <link href="views/assets/css/minimal-theme.css" rel="stylesheet">
    <link href="views/assets/css/shadow-theme.css" rel="stylesheet">
	<link href="views/assets/css/style.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/2cafbb6f68.js" crossorigin="anonymous"></script>
	

	<!-- Fonts  -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="views/assets/plugins/notifications/css/lobibox.min.css">


	


    
</head>
<body class="toggled">

     
    <?php
        

        if(isset($_GET["route"])){
            if ($_GET["route"] == 'login' ||
			$_GET["route"] == 'logincopy' ||
			$_GET["route"] == 'churchregistration' ||
			$_GET["route"] == 'forgotpassword' ||
			$_GET["route"] == 'resetpassword' ||	
			$_GET["route"] == 'websiteorg' ||	
			$_GET["route"] == 'accounts' ||
            $_GET["route"] == 'publichomepage' ||
            $_GET["route"] == 'churchpage'||
			$_GET["route"] == 'churchsettings'||
			$_GET["route"] == 'publicsettings'||
            $_GET["route"] == 'catdetails'||
            $_GET["route"] == 'adminhomepage'||
            $_GET["route"] == 'reportgen'||
			$_GET["route"] == 'adminreportgen'||
            $_GET["route"] == 'churchcalendar' ||
            $_GET["route"] == 'songlist' || 
			$_GET["route"] == 'filestorage' || 
			$_GET["route"] == 'lyrics'|| 
			$_GET["route"] == 'lyrics1'|| 
			$_GET["route"] == 'requests'|| 
			$_GET["route"] == 'slhomepage'|| 
			$_GET["route"] == 'playlist'||
			$_GET["route"] == 'profile'||
			$_GET["route"] == 'superuser'||
			$_GET["route"] == 'publicregistration' ||
			$_GET["route"] == 'verifyEmail' ||
			$_GET["route"] == 'verifyForget' ||
			$_GET["route"] == 'landingpage' ||
			$_GET["route"] == 'membership' ||
			$_GET["route"] == 'demomusic' ||
			$_GET["route"] == 'dailyreading' ||
			$_GET["route"] == 'reports' ||
			$_GET["route"] == 'requestPassword'){

            include "modules/".$_GET["route"].".php";

			if($_GET["route"] == 'dailyreading' || $_GET["route"] == 'login' || $_GET["route"] == 'logincopy' ||$_GET["route"] == 'verifyEmail' ||	$_GET["route"] == 'verifyForget' || $_GET["route"] == 'churchregistration' || $_GET["route"] == 'requestPassword'  || $_GET["route"] == 'publicregistration'  ||$_GET["route"] == 'forgotpassword' ||$_GET["route"] == 'resetpassword'||$_GET["route"] == 'landingpage'){
			
			}else{
				include "modules/header.php";
				include "modules/sidebar.php";
				
			}


            }else{
            include "modules/404.php";
            }
        }else{
            include "modules/landingpage.php";
        }

                echo '</div>';
            //     //footer
            //   include "modules/footer.php";
            //  echo '</div>';
        // echo '</div>';  
    
    // }else{
    //         include "modules/login.php";
    // }
        

    
    ?>
	
<!-- Font Awesome -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!--plugins-->
    <script src="views/assets/js/jquery.min.js"></script>
    <script src="views/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="views/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="views/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="views/assets/plugins/fullcalendar/js/main.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="views/assets/plugins/flatpickr/flatpickr.min.js"></script>




	
    <script src="views/assets/plugins/input-tags/js/tagsinput.js"></script>


	<script src="views/assets/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
	<script src="views/assets/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
	<script src="views/assets/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
	<script src="views/assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
	<script src="views/assets/plugins/validation/jquery.validate.min.js"></script>
	<script src="views/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	

	<script src="views/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
   <script src="views/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>





	
	
	<script src="views/assets/plugins/notifications/js/lobibox.min.js"></script>


	<!-- customize analystics -->
	<script src="views/assets/plugins/apex/apexcharts.min.js"></script>
	<script src="views/assets/js/index.js"></script>

	   <!-- google maps api -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZQlkqlLnUDpWOw1Kkbh6t5994OK_10VY&callback=initMap" async defer></script>
	<script src="views/assets/plugins/gmaps/map-custom-script.js"></script>

    
    <!--BS Scripts-->
    <script src="views/assets/js/bootstrap.bundle.min.js"></script>
    <script src="views/assets/js/main.js"></script>

	<script src="views/assets/plugins/form-repeater/repeater.js"></script>
	<script src="https://www.gstatic.com/firebasejs/6.1.0/firebase.js"></script>

	<script src="views/assets/js/flatpickr.js"></script>

	


	<script src="extensions/philippines-selector/ph-address-selector.js"></script>


	
    <!--BS SWALL-->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- customize scripts -->
	<script src="views/js/dashboard.js"></script>
	<script src="views/js/alerts.js"></script>
	<script src="views/js/loginRegister.js"></script>
	<script src="views/js/superUser.js"></script>
	<script src="views/js/website.js"></script>
	<script src="views/js/weborganizer.js"></script>
	<script src="views/js/calendar.js"></script>
	<script src="views/js/playlist.js"></script>
	<script src="views/js/UserAccount.js"></script>
	<script src="views/js/filestorage.js"></script>
	<script src="views/js/lyrics.js"></script>   
	<script src="views/js/collaboration.js"></script>   
	<script src="views/js/churchsetting.js"></script>   
	<script src="views/js/publichomepage.js"></script>   
<script src="views/js/askmembership.js"></script>   
<script src="views/js/music_demo.js"></script>   
	<script src="views/js/report.js"></script>   
	<script src="views/js/reportsubmission.js"></script>   
	<script src="views/js/membership.js"></script>   	

	<script src="views/js/eventtype.js"></script>   
	<script src="views/js/publicSetting.js"></script>   
	<script src="views/js/adminreport.js"></script>   


	
	<script src="views/js/member.js"></script>   
	<script src="views/js/affiliated.js"></script>   

	


	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="views/assets/plugins/select2/js/select2-custom.js"></script>

	<script>
        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });
    </script>

<script>
      $(function () {
        $('[data-bs-toggle="popover"]').popover();
        $('[data-bs-toggle="tooltip"]').tooltip();
      })
    </script>



	<!-- <script async defer src="https://apis.google.com/js/api.js"></script>
	<script src="https://accounts.google.com/gsi/client" async defer></script>



    <script>



		document.addEventListener('DOMContentLoaded', function () {
			var calendarEl = document.getElementById('calendar2');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				headerToolbar: {
					left: 'prev,next today',
					center: 'title',
					right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
				},
				initialView: 'dayGridMonth',
				initialDate: '2023-05-24',
				navLinks: true, // can click day/week names to navigate views
				selectable: true,
				nowIndicator: true,
				dayMaxEvents: true, // allow "more" link when too many events
				editable: true,
				selectable: true,
				businessHours: true,
				dayMaxEvents: true, // allow "more" link when too many events
				events: [{
					title: 'Instrument Workshop',
					start: '2020-09-01',
				}, {
					title: 'Offering Prayer',
					start: '2020-09-07',
					end: '2020-09-10'
				}, {
					// groupId: 999,
					// title: 'Event Time',
					// start: '2020-09-09T16:00:00'
				}, {
					// groupId: 999,
					// title: 'Event Time',
					// start: '2020-09-16T16:00:00'
				}, {
					title: 'Bible Study',
					start: '2020-09-11',
					end: '2020-09-13'
				}, {
					title: 'Outreach Program',
					start: '2020-09-12T10:30:00',
					end: '2020-09-12T12:30:00'
				}, {
					title: 'Media Seminar',
					start: '2020-09-12T12:00:00'
				}, {
					title: 'Instrument Workshop',
					start: '2020-09-12T14:30:00'
				}, {
					title: 'Bible Study',
					start: '2020-09-12T17:30:00'
				}, {
					title: 'Meeting',
					start: '2020-09-12T20:00:00'
				}, {
					// title: 'Event Time',
					// start: '2020-09-13T07:00:00'
				}, {
					title: 'Church Anniversary',
					url: 'http://google.com/',
					start: '2020-09-28'
				}],
				dateClick: function(info) {
					
					location.href = "catdetails";
				}
				
			});
			calendar.render();
		});
	</script>
 -->

    <script>
      $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
          event.preventDefault();
          if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("bi-eye-slash-fill");
            $('#show_hide_password i').removeClass("bi-eye-fill");
          } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("bi-eye-slash-fill");
            $('#show_hide_password i').addClass("bi-eye-fill");
          }
        });
      });
    </script>


	<!-- <script>
		$(".datepicker").flatpickr();

		$(".time-picker").flatpickr({
				enableTime: true,
				noCalendar: true,
				dateFormat: "H:i",
			});

		$(".date-time").flatpickr({
				enableTime: true,
				dateFormat: "Y-m-d H:i",
		});

		$(".date-format").flatpickr({
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
		});

		$(".date-range").flatpickr({
			mode: "range",
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
		});

		$(".date-inline").flatpickr({
			inline: true,
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
		});
	</script> -->

<!-- <script>
		$('#fancy-file-upload').FancyFileUpload({
			params: {
				action: 'fileuploader'
			},
			maxfilesize: 1000000
		});
	</script>
	<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})
	</script> -->


</body>

</html>
