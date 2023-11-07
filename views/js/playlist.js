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
                            title: 'Playlist created successfully.'
                            });

                            var playlistData = new FormData();

                            $.ajax({
                                url: "ajax/async_playlist.ajax.php",
                                method: "POST",
                                data: playlistData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                dataType: "json",
                                success: function(answer) {
                                    console.log(answer);
                                     $("#AddPlaylist").modal('hide');

                                    var playlistList = document.querySelector('.playlist_section');
                                    playlistList.innerHTML = ''
                                    

                                    let playlistHTML = '';

                                    answer.forEach((value, key) => {
                                        const accordionId = 'accordionExample_' + key;
                                        const collapseId = 'collapseTwo_' + key;

                                        playlistHTML += `
                                            <div class="row mt-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="accordion col-12 col-xl-12" id="${value.playlist_name}-list">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button collapsed font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#${collapseId}" aria-expanded="false" aria-controls="${collapseId}">
                                                                    <input class="mb-0 border-0 text-dark h6" id="editing-${value.playlistID}-playlist-input" value="${value.playlist_name}" disabled>
                                                                </button>
                                                            </h2>
                                                            <div id="${collapseId}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#${value.playlist_name}-list">
                                                                <div class="accordion-body">
                                                                    <ul>
                                        `;

                                        const jsonStr = value.songs;
                                        const dataArray = JSON.parse(jsonStr);

                                        if (Array.isArray(dataArray)) {
                                            dataArray.forEach(data => {
                                                const trackID = data.trackID;
                                                const title = data.title;

                                                playlistHTML += `
                                                    <li class="d-flex justify-content-between align-items-center mt-3 cursor-pointer">
                                                        <span onclick="getSong(this)" trackID="${trackID}" class="" type="text" value="" id="flexCheckDefault" onmouseover="this.style.color='blue';" onmouseout="this.style.color='';">${title}</span>
                                                        <button playlist_name="${value.playlist_name}" trackID="${trackID}" class="btn btn-sm delete-file ${value.playlistID}-playlist" onclick="removeSong(this)" hidden>
                                                            <p hidden>${jsonStr}</p>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus text-danger">
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                        </button>
                                                    </li>
                                                `;
                                            });
                                        }

                                        playlistHTML += `
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 col-xl-12" style="margin-left:-5px">
                                                            <button type="button" class="btn btn-transparent border-0" data-bs-toggle="dropdown">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="url(#gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat text-info">
                                                                    <path d="m11.998 2c5.517 0 9.997 4.48 9.997 9.998 0 5.517-4.48 9.997-9.997 9.997-5.518 0-9.998-4.48-9.998-9.997 0-5.518 4.48-9.998 9.998-9.998zm0 1.5c-4.69 0-8.498 3.808-8.498 8.498s3.808 8.497 8.498 8.497 8.497-3.807 8.497-8.497-3.807-8.498-8.497-8.498zm2.502 8.495c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25zm-3.75 0c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25zm-3.75 0c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25z"/>
                                                                </svg>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#AddSongs" id="${value.playlist_name}" onclick="setPlaylist(this)">Add Song</a><p hidden>${jsonStr}</p></li>
                                                                <li><a type="button" class="dropdown-item" id="${value.playlistID}-playlist" onclick="editPlaylist(this)" playlistname="${value.playlist_name}" playlistid="${value.playlistID}">Edit Playlist</a></li>
                                                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#linkPlayslitModal" onclick="linkPlaylist(this)" songs="${value.songs}" playlistname="${value.playlist_name}" playlistid="${value.playlistID}">Link to Event</a></li>
                                                                <li><a class="dropdown-item" type="button" onclick="downloadPlaylist(this)" playlistname="${value.playlist_name}" playlistid="${value.playlistID}">Download Playlist Songs</a><p hidden>${jsonStr}</p></li>
                                                                <li><hr class="dropdown-divider"></li>
                                                                <li><a class="dropdown-item text-danger" type="button" id="${value.playlistID}" onclick="deletePlaylist(this)" playlistid="${value.playlistID}">Delete Playlist</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                    });

                                    playlistList.innerHTML += playlistHTML;
                                    
            
                                },
                                error: function() {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong! dir?',
                                    });
                                },
                                complete: function() {
                                    // Handle any completion tasks if needed
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
    
            var li = $(element).closest('li');
            li.remove();

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
                title: 'Song remove successfully.'
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
                        title: 'Playlist created successfully.'
                        });

                                    
                        var playlistData = new FormData();

                        $.ajax({
                            url: "ajax/async_playlist.ajax.php",
                            method: "POST",
                            data: playlistData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: "json",
                            success: function(answer) {
                                console.log(answer);
                                $("#AddSongs").modal('hide');

                                var playlistList = document.querySelector('.playlist_section');
                                playlistList.innerHTML = ''
                                

                                let playlistHTML = '';

                                answer.forEach((value, key) => {
                                    const accordionId = 'accordionExample_' + key;
                                    const collapseId = 'collapseTwo_' + key;

                                    playlistHTML += `
                                        <div class="row mt-2">
                                            <div class="d-flex align-items-center">
                                                <div class="accordion col-12 col-xl-12" id="${value.playlist_name}-list">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingTwo">
                                                            <button class="accordion-button collapsed font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#${collapseId}" aria-expanded="false" aria-controls="${collapseId}">
                                                                <input class="mb-0 border-0 text-dark h6" id="editing-${value.playlistID}-playlist-input" value="${value.playlist_name}" disabled>
                                                            </button>
                                                        </h2>
                                                        <div id="${collapseId}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#${value.playlist_name}-list">
                                                            <div class="accordion-body">
                                                                <ul>
                                    `;

                                    const jsonStr = value.songs;
                                    const dataArray = JSON.parse(jsonStr);

                                    if (Array.isArray(dataArray)) {
                                        dataArray.forEach(data => {
                                            const trackID = data.trackID;
                                            const title = data.title;

                                            playlistHTML += `
                                                <li class="d-flex justify-content-between align-items-center mt-3 cursor-pointer">
                                                    <span onclick="getSong(this)" trackID="${trackID}" class="" type="text" value="" id="flexCheckDefault" onmouseover="this.style.color='blue';" onmouseout="this.style.color='';">${title}</span>
                                                    <button playlist_name="${value.playlist_name}" trackID="${trackID}" class="btn btn-sm delete-file ${value.playlistID}-playlist" onclick="removeSong(this)" hidden>
                                                        <p hidden>${jsonStr}</p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus text-danger">
                                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                                        </svg>
                                                    </button>
                                                </li>
                                            `;
                                        });
                                    }

                                    playlistHTML += `
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-xl-12" style="margin-left:-5px">
                                                        <button type="button" class="btn btn-transparent border-0" data-bs-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="url(#gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat text-info">
                                                                <path d="m11.998 2c5.517 0 9.997 4.48 9.997 9.998 0 5.517-4.48 9.997-9.997 9.997-5.518 0-9.998-4.48-9.998-9.997 0-5.518 4.48-9.998 9.998-9.998zm0 1.5c-4.69 0-8.498 3.808-8.498 8.498s3.808 8.497 8.498 8.497 8.497-3.807 8.497-8.497-3.807-8.498-8.497-8.498zm2.502 8.495c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25zm-3.75 0c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25zm-3.75 0c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25z"/>
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#AddSongs" id="${value.playlist_name}" onclick="setPlaylist(this)">Add Song</a><p hidden>${jsonStr}</p></li>
                                                            <li><a type="button" class="dropdown-item" id="${value.playlistID}-playlist" onclick="editPlaylist(this)" playlistname="${value.playlist_name}" playlistid="${value.playlistID}">Edit Playlist</a></li>
                                                            <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#linkPlayslitModal" onclick="linkPlaylist(this)" songs="${value.songs}" playlistname="${value.playlist_name}" playlistid="${value.playlistID}">Link to Event</a></li>
                                                            <li><a class="dropdown-item" type="button" onclick="downloadPlaylist(this)" playlistname="${value.playlist_name}" playlistid="${value.playlistID}">Download Playlist Songs</a><p hidden>${jsonStr}</p></li>
                                                            <li><hr class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item text-danger" type="button" id="${value.playlistID}" onclick="deletePlaylist(this)" playlistid="${value.playlistID}">Delete Playlist</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                });

                                playlistList.innerHTML += playlistHTML;
                                
        
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong! dir?',
                                });
                            },
                            complete: function() {
                                // Handle any completion tasks if needed
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
                            title: 'Song added to playlist successfully.'
                            });
                            
                            var playlistData = new FormData();

                            $.ajax({
                                url: "ajax/async_playlist.ajax.php",
                                method: "POST",
                                data: playlistData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                dataType: "json",
                                success: function(answer) {
                                    console.log(answer);
                                    $("#AddSongs").modal('hide');

                                    var playlistList = document.querySelector('.playlist_section');
                                    playlistList.innerHTML = ''
                                    

                                    let playlistHTML = '';

                                    answer.forEach((value, key) => {
                                        const accordionId = 'accordionExample_' + key;
                                        const collapseId = 'collapseTwo_' + key;

                                        playlistHTML += `
                                            <div class="row mt-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="accordion col-12 col-xl-12" id="${value.playlist_name}-list">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button collapsed font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#${collapseId}" aria-expanded="false" aria-controls="${collapseId}">
                                                                    <input class="mb-0 border-0 text-dark h6" id="editing-${value.playlistID}-playlist-input" value="${value.playlist_name}" disabled>
                                                                </button>
                                                            </h2>
                                                            <div id="${collapseId}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#${value.playlist_name}-list">
                                                                <div class="accordion-body">
                                                                    <ul>
                                        `;

                                        const jsonStr = value.songs;
                                        const dataArray = JSON.parse(jsonStr);

                                        if (Array.isArray(dataArray)) {
                                            dataArray.forEach(data => {
                                                const trackID = data.trackID;
                                                const title = data.title;

                                                playlistHTML += `
                                                    <li class="d-flex justify-content-between align-items-center mt-3 cursor-pointer">
                                                        <span onclick="getSong(this)" trackID="${trackID}" class="" type="text" value="" id="flexCheckDefault" onmouseover="this.style.color='blue';" onmouseout="this.style.color='';">${title}</span>
                                                        <button playlist_name="${value.playlist_name}" trackID="${trackID}" class="btn btn-sm delete-file ${value.playlistID}-playlist" onclick="removeSong(this)" hidden>
                                                            <p hidden>${jsonStr}</p>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus text-danger">
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                        </button>
                                                    </li>
                                                `;
                                            });
                                        }

                                        playlistHTML += `
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 col-xl-12" style="margin-left:-5px">
                                                            <button type="button" class="btn btn-transparent border-0" data-bs-toggle="dropdown">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="url(#gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat text-info">
                                                                    <path d="m11.998 2c5.517 0 9.997 4.48 9.997 9.998 0 5.517-4.48 9.997-9.997 9.997-5.518 0-9.998-4.48-9.998-9.997 0-5.518 4.48-9.998 9.998-9.998zm0 1.5c-4.69 0-8.498 3.808-8.498 8.498s3.808 8.497 8.498 8.497 8.497-3.807 8.497-8.497-3.807-8.498-8.497-8.498zm2.502 8.495c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25zm-3.75 0c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25zm-3.75 0c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25z"/>
                                                                </svg>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#AddSongs" id="${value.playlist_name}" onclick="setPlaylist(this)">Add Song</a><p hidden>${jsonStr}</p></li>
                                                                <li><a type="button" class="dropdown-item" id="${value.playlistID}-playlist" onclick="editPlaylist(this)" playlistname="${value.playlist_name}" playlistid="${value.playlistID}">Edit Playlist</a></li>
                                                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#linkPlayslitModal" onclick="linkPlaylist(this)" songs="${value.songs}" playlistname="${value.playlist_name}" playlistid="${value.playlistID}">Link to Event</a></li>
                                                                <li><a class="dropdown-item" type="button" onclick="downloadPlaylist(this)" playlistname="${value.playlist_name}" playlistid="${value.playlistID}">Download Playlist Songs</a><p hidden>${jsonStr}</p></li>
                                                                <li><hr class="dropdown-divider"></li>
                                                                <li><a class="dropdown-item text-danger" type="button" id="${value.playlistID}" onclick="deletePlaylist(this)" playlistid="${value.playlistID}">Delete Playlist</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                    });

                                    playlistList.innerHTML += playlistHTML;
                                    
            
                                },
                                error: function() {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong! dir?',
                                    });
                                },
                                complete: function() {
                                    // Handle any completion tasks if needed
                                }
                            });

              
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
                title: 'Playlist updated successfully.'
                });
       

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
            $("#linkPlayslitModal").modal('hide');
            

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
                title: 'Playlist linked successfully.'
                });



        },
        error: function() {

        },
        complete: function() {
            // Handle any completion tasks if needed
        }
    });


});