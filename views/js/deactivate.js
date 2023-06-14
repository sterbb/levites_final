$(function(){

    var inactivityTimeout; // Global variable to track the inactivity timeout

    function startInactivityTimer(durationInSeconds) {
    clearTimeout(inactivityTimeout); // Clear any existing timeout
    
    inactivityTimeout = setTimeout(function() {
        showLockScreen();
    }, durationInSeconds * 1000); // Convert seconds to milliseconds
    }

    function resetInactivityTimer() {
        clearTimeout(inactivityTimeout); // Clear the timeout
        startInactivityTimer(5); 
    }


      function showLockScreen() {
        $("#passwordError").hide();
        $('#lockScreen').modal('show');

      }
      
      function hideLockScreen() {
        $('#lockScreen').modal('hide');
      }
      
      // Start the inactivity timer when the page loads or when user activity is detected
      document.addEventListener("DOMContentLoaded", function() {
        startInactivityTimer(5);
      });
      
      // Reset the inactivity timer when user activity is detected
      document.addEventListener("mousemove", resetInactivityTimer);
      document.addEventListener("keydown", resetInactivityTimer);

    $('#lockScreen').modal({
        backdrop: 'static',
        keyboard: false
    })

})