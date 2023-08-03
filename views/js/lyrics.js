
$(document).ready(function() {

    $(".searchSong").submit(function(e) {
        e.preventDefault();
        var title = $("#song_title").val();

        document.cookie = "song_title="+title;
        window.location.href = 'songlist';
    });

    $(".getLyrics").click(function(){

        alert("hello");
        var trackID = $(this).attr('trackid');
        alert(trackID);
        document.cookie = "trackID="+trackID;
        window.location.href = 'lyrics';
    })

});

$(".searchSong").submit(function(e) {
    e.preventDefault();
    var title = $("#song_title").val();

    document.cookie = "song_title="+title;
    window.location.href = 'songlist';
});

function getSong(element){
    var trackID = $(element).attr('trackID');
    alert(trackID);
    document.cookie = "trackID="+trackID;
    window.location.href = 'lyrics';
}

// function copyLyrics(button) {
//     const lyricsSection = button.parentElement.previousElementSibling;
//     const sectionText = lyricsSection.innerText.trim();
    
//     copyToClipboard(sectionText);
//     alert('Lyrics copied to clipboard!');
// }

// function copyToClipboard(text) {
//     const textarea = document.createElement('textarea');
//     textarea.value = text;
//     document.body.appendChild(textarea);
//     textarea.select();
//     document.execCommand('copy');
//     document.body.removeChild(textarea);
// }



function copyLyrics(button) {
    const lyricsSection = button.parentElement;
    const sectionText = lyricsSection.textContent;
    const textarea = document.createElement('textarea');
    
    textarea.value = sectionText;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
    
    // Highlight the text after copying
    const range = document.createRange();
    range.selectNodeContents(lyricsSection);
    const selection = window.getSelection();
    selection.removeAllRanges();
    selection.addRange(range);
    
    // Add a timeout to remove the highlighting after a few seconds (optional)
    setTimeout(() => {
        selection.removeAllRanges();
    }, 3000);  //Remove the highlighting after 3 seconds (adjust as needed)
  }
  
  function copyToClipboard(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
  }

// JavaScript
function copyWholeLyrics() {
    const lyricsElement = document.getElementsByClassName('lyrics-container')[0];
    const sectionText = lyricsElement.textContent;
    const textarea = document.createElement('textarea');

    textarea.value = sectionText;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);

    // Highlight the copied text
    const range = document.createRange();
    range.selectNodeContents(lyricsElement);
    const selection = window.getSelection();
    selection.removeAllRanges();
    selection.addRange(range);

    // Add a class to the selected text for highlighting
    lyricsElement.classList.add('highlighted');

    // Remove the highlighting after a few seconds (adjust as needed)
    setTimeout(() => {
        lyricsElement.classList.remove('highlighted');
        selection.removeAllRanges();
    }, 3000); // Remove the highlighting after 2 seconds
    
}






function downloadLyrics() {
    // Clone the lyrics container to avoid modifying the original element
    var title = $("#song-title").text();
    var artist = $("#song-artist").text();
    const lyricsContainer = document.querySelector('.lyrics-container').cloneNode(true);

    // Remove all elements with the copy-button class from the cloned container
    const copyButtons = lyricsContainer.querySelectorAll('.copy-button');
    copyButtons.forEach(button => button.remove());

    const lyricsText = lyricsContainer.innerText.trim();
    const blob = new Blob([lyricsText], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);

    const a = document.createElement('a');
    a.href = url;
    a.download = title + artist + '.txt';
    a.click();

    URL.revokeObjectURL(url);
}

function downloadPlaylist(element){

    var name = $(element).attr('playlistname');

    // Get the parent <li> element using jQuery's parent() method
    var liElement = $(element).parent();

    // Find the <p> element within the <li> using jQuery's find() method
    var pElement = liElement.find('p');

    // Get the text content of the <p> element using jQuery's text() method
    // var songlist = JSON.parse(pElement.text().trim());
    var name = $(element).attr('playlistname');

    // Your track data as a JSON string
    const trackDataString = pElement.text().trim();

    // Parse the JSON string into a JavaScript array
    const trackData = JSON.parse(trackDataString);

    // Create a hidden form element
    const form = document.createElement('form');
    form.style.display = 'none';
    document.body.appendChild(form);

    // Set form attributes
    form.method = 'POST';
    form.action = 'models/downloadPlaylist.php';

    // Create an input element for songlist
    const songlistInput = document.createElement('input');
    songlistInput.type = 'hidden';
    songlistInput.name = 'songlist';
    songlistInput.value = JSON.stringify(trackData);
    form.appendChild(songlistInput);

    // Create an input element for playlist_name
    const playlistNameInput = document.createElement('input');
    playlistNameInput.type = 'hidden';
    playlistNameInput.name = 'playlist_name';
    playlistNameInput.value = name;
    form.appendChild(playlistNameInput);

    // Submit the form to initiate the download
    form.submit();
}


function printLyrics() {

    const lyricsContainer = document.querySelector('#lyricsContainer').cloneNode(true);

    // Remove all elements with the copy-button class from the cloned container
    const copyButtons = lyricsContainer.querySelectorAll('.copy-button');
    copyButtons.forEach(button => button.remove());
    
    // Create a new window for printing
    const printWindow = window.open('', '_blank');
    
    // Write the lyrics content to the print window
    printWindow.document.write('<html><head><title>Lyrics</title></head><body>');
    
    // Add CSS to center the lyrics content in the print window
    printWindow.document.write('<style>body { text-align: center; }</style>');
    
    // Append the cloned lyrics container to the print window
    printWindow.document.body.appendChild(lyricsContainer);
    
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    
    // Trigger the print dialog in the new window
    printWindow.onload = function () {
        printWindow.print();
        printWindow.close();
    }
}

function downloadLinkedSong(element) {

    var trackID = $(element).attr('value');

    alert(trackID);

    // Send the AJAX request to your PHP script
    $.ajax({
      url: 'models/downloadSong.php', // Replace 'get_lyrics.php' with the path to your PHP script
      method: 'POST', // You can use GET or POST as per your requirement
      data: { track_id: trackID }, // Send the track ID as a POST parameter named 'track_id'
      success: function(response) {
        // Check for an error response from the server
        if (response.error) {
            console.error(response.error);
            return;
          }
  
          // Create the content for the downloadable file
          var fileContent =  response.lyrics;
  
          // Create a Blob from the file content
          var blob = new Blob([fileContent], { type: 'text/plain' });
  
          // Generate a URL for the Blob
          var url = URL.createObjectURL(blob);
  
          // Create a temporary anchor element to initiate the download
          var downloadLink = document.createElement('a');
          downloadLink.href = url;
          downloadLink.download = response.title + '.txt'; // Set the file name
          downloadLink.click();
  
          // Clean up the URL and the anchor element
          URL.revokeObjectURL(url);
          downloadLink.remove();

        console.log(response); // Output the response to the browser console for debugging
      },
      error: function(xhr, status, error) {
        // Handle any errors that occur during the AJAX request
        console.error(error);
      }
    });
}