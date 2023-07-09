$(".addPlaylistForm").submit(function(e) {
    e.preventDefault();

    var playlist_name = $("#playlist_name").val();

    if (playlist_name.trim() === "") {
        // Display an error message using SweetAlert
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please fill in the required fields: Playlist Name',
        });
    } else {
        var playlistData = new FormData();
        playlistData.append("playlist_name", playlist_name);

        $.ajax({
            url: "ajax/playlist_add.ajax.php",
            method: "POST",
            data: playlistData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "text",
            success: function(answer) {
                console.log(answer);

                // Close the modal form
                $('#AddPlaylist').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Playlist added successfully!',
                }).then(() => {
                    location.reload();
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


