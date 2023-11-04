$(".addPlaylistForm").submit(function(e) {
    e.preventDefault();

    var playlist_name = $("#playlist_name").val();

    var song = [];
    var trackID = getCookie("trackID");
    var artist = $("#song-artist").text();
    var title = $("#song-title").text();

    var songdetails = {};
        songdetails.trackID = trackID;
        songdetails.artist = artist;
        songdetails.title = title;
    

    song.push(songdetails);

    var playlistData = new FormData();
    playlistData.append("playlist_name", playlist_name);
    playlistData.append("songs", JSON.stringify(song));

    if (playlist_name.trim() === "") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Playlist name is required in this field.',
        });
    } else {
        // Show a confirmation dialog
        Swal.fire({
            title: 'Confirm',
            text: 'Are you sure you want to add this playlist?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "ajax/playlist_add.ajax.php",
                    method: "POST",
                    data: playlistData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(answer) {
                        console.log(answer);
                        // Display a success Swal notification with a confirm button
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Playlist added successfully!',
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Reload the system when the "OK" button is clicked
                                location.reload();
                            }
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        });
                    },
                    complete: function() {
                        // Handle any completion tasks if needed
                    }
                });
            }
        });
    }
});



function removeSong(element){
    var playlist_name = $(element).attr('playlist_name');
    var song_list =  $(element).find('p').text();
    var trackID =  $(element).attr('trackID');



    var removesong = JSON.parse(song_list);

    var filteredArray = removeItemByTrackID(removesong, trackID);



      
    var playlistData = new FormData();
    playlistData.append("playlist_name", playlist_name);
    playlistData.append("songs", JSON.stringify(filteredArray));

    //it is just the same because it is updating
    $.ajax({
        url: "ajax/playlist_add_song.ajax.php",
        method: "POST",
        data: playlistData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
            console.log(answer);
            location.reload();


        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
        },
        complete: function() {
            // Handle any completion tasks if needed
        }
    });



}

function deletePlaylist(element) {
    var playlistID = $(element).attr('id');

    // Show a confirmation dialog
    Swal.fire({
        title: 'Confirm',
        text: 'Are you sure you want to delete this playlist?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            var playlistData = new FormData();
            playlistData.append("playlistID", playlistID);

            $.ajax({
                url: "ajax/delete_playlist.ajax.php",
                method: "POST",
                data: playlistData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "text",
                success: function(answer) {
                    console.log(answer);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Delete Playlist successfully!',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Reload the system when the "OK" button is clicked
                            location.reload();
                        }
                    });
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    });
                },
                complete: function() {
                    // Handle any completion tasks if needed
                }
            });
        }
    });
}

// Function to remove an item with matching trackID
function removeItemByTrackID(arr, trackID) {
    return arr.filter(function(item) {
        return item.trackID !== trackID;
    });
}



function getCookie(cookieName) {
    const cookiePattern = new RegExp(`(?:(?:^|.*;\\s*)${cookieName}\\s*\\=\\s*([^;]*).*$)|^.*$`);
    const cookieValue = document.cookie.replace(cookiePattern, "$1");
    return cookieValue || null;
    }

function setPlaylist(element){
    var name = $(element).attr('id');

    // Get the parent <li> element using jQuery's parent() method
    var liElement = $(element).parent();

    // Find the <p> element within the <li> using jQuery's find() method
    var pElement = liElement.find('p');

    // Get the text content of the <p> element using jQuery's text() method
    var songlist = pElement.text().trim();



    $("#addToPlaylistName").val(name);  
    $("#playlist_songlist").val(songlist);  

}
    
    $("#search_song_playlist").click(function() {
        const search = $("#song_title_playlist").val();

        var searchData = new FormData();
        searchData.append("search", search);


        $.ajax({
            url: "models/searchSong.php",
            method: "POST",
            data: searchData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data) {
                

                const songList = $("#songList");
                songList.empty(); // Clear previous search results

                if (Array.isArray(data)) {
                    data.forEach(track => {
                        const trackId = track.track_id;
                        const songName = track.track_name;
                        const artistName = track.artist_name;
            
                        // Create a clickable list item with track ID as data attribute
                        const listItem = $('<li>').text(songName + ' - ' + artistName);
                        listItem.attr('track-id', trackId);
                        listItem.attr('song-title', songName);
                        listItem.attr('song-artist', artistName);
                        listItem.css('cursor', 'pointer');
                        listItem.css('padding', '8px');
                        listItem.css('border', '1px solid #ccc');
                        listItem.css('background-color', '#f9f9f9');
                        listItem.css('margin-bottom', '5px');
                        listItem.css('border-radius', '4px');
                        listItem.css('hover', '{ background-color: #f1f1f1; }');
                        listItem.click(function () {
                            // Update the input and text when the list item is clicked
                            const clickedTrackId = $(this).attr('track-id');
                            const clickedTitle = $(this).attr('song-title');
                            const clickedArtist = $(this).attr('song-artist');
    
                            $("#song_title_playlist").val(clickedTitle + " - " +clickedArtist);
                            $("#song_title_playlist").attr("track-id", clickedTrackId);
                            $("#song_title_playlist").attr("song-title", clickedTitle);
                            $("#song_title_playlist").attr("song-artist", clickedArtist);
                            songList.empty(); // Clear previous search results
          
                        });
            
                        songList.append(listItem);
                    });
                } else {
                    console.error('Failed to fetch search results.');
                }

            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            },
            complete: function() {
                // Handle any completion tasks if needed
            }
        });

    });
    
$('#addToPlaylist').click(function() {
    var trackID =  $("#song_title_playlist").attr('track-id');
    var song_title =  $("#song_title_playlist").attr('song-title');
    var song_artist =  $("#song_title_playlist").attr('song-artist');
    var playlist =  $("#addToPlaylistName").val();
    var new_songlist = JSON.parse($("#playlist_songlist").val());

    var songdetails = {};
    songdetails.trackID = trackID;
    songdetails.artist = song_artist;
    songdetails.title = song_title;

    new_songlist.push(songdetails);

    if (playlist.trim() === "") {
        // Display an error message using SweetAlert or other method
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please provide a playlist name.',
        });
    } else {
        Swal.fire({
            title: 'Confirmation',
            text: 'Are you sure you want to add this song to your playlist?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                var playlistData = new FormData();
                playlistData.append("playlist_name", playlist);
                playlistData.append("songs", JSON.stringify(new_songlist));

                $.ajax({
                    url: "ajax/playlist_add_song.ajax.php",
                    method: "POST",
                    data: playlistData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function(answer) {
                        console.log(answer);
                        location.reload();
                    },
                    error: function() {
                        // Handle the error case if needed
                    },
                    complete: function() {
                        // Handle any completion tasks if needed
                    }
                });
            }
        });
    }
});
    

function editPlaylist(element) {
    var id = "#" + $(element).attr('id');
    var editingid = "editing-" + $(element).attr('id');
    var groupclass = "." + $(element).attr('id');
    var clickFunction = 'savedPlaylist(this)'; 

    $(element).text("Save Playlist");

    $(id).removeClass("btn-outline-success");
    $(id).addClass("btn-outline-danger");
    $(id).attr('onclick', clickFunction);

    $(id).attr('id', editingid);
    $(groupclass).removeAttr("hidden"); 

  //   var $inputField = $(element).siblings('input');

  $('#' + editingid + "-input").removeAttr("disabled");

    var $container = $(element).closest('div'); // Find the nearest parent container
    var $inputField = $container.find('input'); // Find the input field within the container
    $inputField.removeAttr("disabled");
    // Enable input field
  //   $('#editButton').removeClass("btn-outline-success").addClass("btn-outline-danger").attr('onclick', 'saveeditGroup()');
  //   $('#' + editingid).removeAttr("disabled");
  //   $('#' + editingid).on('keydown', function() {
  //       $(this).removeAttr("disabled");
  //   });
}

$('#inputField').on('keyup', function(event) {
    // Check if the Enter key (key code 13) was pressed
    if (event.keyCode === 13) {
      // Perform the desired action here
      alert('Enter key was pressed!');
    }
  });

//   function savedEditName (element){
//     alert($(element).val());
    
//   }


function savedPlaylist(element) {
    var id = "#" + $(element).attr('id');
    var saveid = $(element).attr('id').slice(8);
    var groupclass = "." + saveid;


    $(element).text("Edit Playlist");

   var playlistname = $(element).attr('playlistname');
   var newplaylistname =   $('#editing-' + saveid + "-input").val();  
   var playlistid = $(element).attr('playlistid');



    var updatePlaylist = new FormData();
    updatePlaylist.append("playlistname", playlistname);
    updatePlaylist.append("newplaylistname", newplaylistname);
    updatePlaylist.append("playlistid", playlistid);

    $.ajax({
        url: "ajax/update_playlist.ajax.php",
        method: "POST",
        data: updatePlaylist,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
            console.log(answer);
            location.reload();

        },
        error: function() {

        },
        complete: function() {
            // Handle any completion tasks if needed
        }
    });

    
    $(id).removeClass("btn-outline-danger");
    $(id).addClass("btn-outline-success");
    $(id).attr('onclick', 'editPlaylist(this)');
    $(id).attr('id', saveid);
    $(groupclass).attr("hidden", true);


    $('#editButton').removeClass("btn-outline-danger").addClass("btn-outline-success").attr('onclick', 'editPlaylist()');
    $('#editing-' + saveid + "-input").attr("disabled", true);
}


function linkPlaylist(element){

    var playlistID = $(element).attr("playlistid");

    
    $("#linkPlaylistInput option").each(function() {
        if ($(this).val() == playlistID) {
          $(this).prop("selected", true);
        } else {
          $(this).prop("selected", false);
        }
      });
}

$("#linkPlaylistBtn").click(function(){

    var playlist = $("#linkPlaylistInput").val();
    var event = $("#linkEventInput").val();

    var linkData = new FormData();
    linkData.append("playlist", playlist);
    linkData.append("event", event);

    $.ajax({
        url: "ajax/link_playlist.ajax.php",
        method: "POST",
        data: linkData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "text",
        success: function(answer) {
            console.log(answer);


        },
        error: function() {

        },
        complete: function() {
            // Handle any completion tasks if needed
        }
    });


});