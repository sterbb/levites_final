
<main class="page-content ">
    <div class="card ">
	    <div class="card-body ">
		    <nav class="navbar navbar-expand-xl navbar-light ">
                <div class="container" ><a class="navbar-brand" href=""> <span class="h2">LEVITES</span></a>
   
                    <form class="d-flex nav-search col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 searchSong" method="POST" class="form" id="form">
                                             <div class="input-group ">
                            <input type="text" class="form-control border border-dark " placeholder="" id="song_title"/>
                            <button class="btn border border-dark " type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search text-dark  "><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </button> 
                        </div>
                    </form>
            
                </div>
		    </nav>
        </div>
    </div>
         





    <div class="row justify-content-center" >

        <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-12 text-center">
            <button onclick="downloadLyrics()" type="button" class="btn  btn-light border border-dark"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud text-warning"><polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path></svg></button>

            <button type="button"  onclick="copyWholeLyrics()" class="btn  btn-light border border-dark"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy text-success"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>

            <button type="button" onclick="printLyrics()" class="btn  btn-light border border-dark" ><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer text-primary"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg></button>

        </div>
    </div>




<div class="row g-0">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
            <div class="card m-3 ">
                <div class="card-body p-sm-10 text-center">
                    <div class="div-share" id="lyricsContainer">

                    
                        
                    <?php

error_reporting(0);
ini_set('display_errors', 0);

$apiKey = '7a089ceadb3e1e9367a4a5f5d5e5a343'; // Replace with your Musixmatch API key
$trackId = $_COOKIE['trackID'];
// Fetch track details using the track_id
$trackUrl = "https://api.musixmatch.com/ws/1.1/track.get?track_id=$trackId&apikey=$apiKey";
$trackResponse = file_get_contents($trackUrl);
$trackData = json_decode($trackResponse, true);


$trackInfo = $trackData['message']['body']['track'];
$artist = $trackInfo['artist_name'];
$song = $trackInfo['track_name'];

// Output the artist name and song title
echo "<h2 class='font-bold' id='song-title'>$song </h2>
        <h3 class='mt-3' id='song-artist'>$artist</h3> <br>";



// Fetch the lyrics for the selected song using the track_id
$lyricsUrl = "https://api.musixmatch.com/ws/1.1/track.lyrics.get?track_id=$trackId&apikey=$apiKey";
$lyricsResponse = file_get_contents($lyricsUrl);
$lyricsData = json_decode($lyricsResponse, true);

if (isset($lyricsData['message']['body']['lyrics']['lyrics_body'])) {
    $lyrics = $lyricsData['message']['body']['lyrics']['lyrics_body'];

    // Split the lyrics into sections based on empty lines (markers)
    $sections = explode("\n\n", $lyrics);

    // Output each section in a separate <div> element
    echo '<div class="lyrics-container">';
    foreach ($sections as $section) {
        echo '<div class="lyrics-section">' . nl2br($section) . ' <br><button class="copy-button btn btn-light border border-transparent border-0" onclick="copyLyrics(this)">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy text-success">
        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
        </svg>
    </button> </div>';
    
        echo '<div class="section-space"></div>'; // Add space between sections
    }
    echo '</div>';
} else {
    echo "<h1 >Lyrics not found for the selected song.<h1>";
}


?>

                        
                    </div>                 
                   
                </div>
            </div>
        </div>

            
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6  ">
                     <div class="card mt-3 ">
                        <div class="card-body text-center align-items-center justify-content-center  ">
                            <div class="video-container ">

                            <?php
                                // lyrics.php

                                if (isset($_COOKIE['trackID'])) {
                                    $apiKey = '7a089ceadb3e1e9367a4a5f5d5e5a343'; // Replace with your Musixmatch API key
                                    $trackId = $_COOKIE['trackID'];

                                    // Fetch track details using the track_id
                                    $trackUrl = "https://api.musixmatch.com/ws/1.1/track.get?track_id=$trackId&apikey=$apiKey";
                                    $trackResponse = file_get_contents($trackUrl);
                                    $trackData = json_decode($trackResponse, true);

                                    if (isset($trackData['message']['body']['track'])) {
                                        $trackInfo = $trackData['message']['body']['track'];
                                        $artist = $trackInfo['artist_name'];
                                        $song = $trackInfo['track_name'];

                                        // Fetch video using the YouTube API
                                        $youtubeApiKey = 'AIzaSyAV2ETHPyFx0PnRUvRZbEwkGGAR_12Fp4I'; // Replace with your YouTube API key

                                        // Construct the search query based on the artist name and song title
                                        $searchQuery = urlencode($artist . ' ' . $song);

                                        // // Fetch videos related to the song using the YouTube Data API
                                        // $youtubeSearchUrl = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$searchQuery&type=video&key=$youtubeApiKey";
                                        // $youtubeSearchResponse = file_get_contents($youtubeSearchUrl);
                                        // $youtubeSearchData = json_decode($youtubeSearchResponse, true);

                                        if (isset($youtubeSearchData['items'][0]['id']['videoId'])) {
                                            $videoId = $youtubeSearchData['items'][0]['id']['videoId'];

                                            // Output the embedded video player
                                            echo '<iframe  style="width: 100% !important; height: 300px !important;" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                        } else {
                                            echo "Video not found for the selected song.";
                                        }
                                    } else {
                                        echo "Track details not found for the selected song.";
                                    }
                                } else {
                                    echo "Invalid request.";
                                }
                                ?>       
                            
                            </div>
                        </div>
                    </div>

                    <div class="card  ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-12 d-flex align-items-center">
                                    <h4 style="font-weight:bold">Playlists</h4>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#AddPlaylist"  class="btn btn-transparent border-0">
                                        
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" viewBox="0 0 30 30" fill="none" stroke="url(#gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat text-info "><path d="m11 11h-7.25c-.414 0-.75.336-.75.75s.336.75.75.75h7.25v7.25c0 .414.336.75.75.75s.75-.336.75-.75v-7.25h7.25c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-7.25v-7.25c0-.414-.336-.75-.75-.75s-.75.336-.75.75z" fill-rule="nonzero"/>
                                      
                                        <defs>
                                            <linearGradient id="gradient" gradientTransform="rotate(90)">
                                            <stop offset="0%" stop-color="#c080f9" />
                                            <stop offset="100%" stop-color="#94c0f2 " />
                                            </linearGradient>
                                    </defs>
                                    </svg>
                                    
                                    
                                    </button>
                                    
                                </div> 
                            </div>
                            <hr>                                   
                        
                        <div class="row">

                            <?php
                                $playlist = (new ControllerPlaylist)->ctrShowPlaylist();
                                foreach ($playlist as $key => $value) {
                                    $accordionId = 'accordionExample_' . $key; // Unique ID for accordion
                                    $collapseId = 'collapseTwo_' . $key; // Unique ID for collapse element




                                    

                                    echo '
                                    <div class="row mt-2">
                                        <div class="d-flex align-items-center ">
                                            <div class="accordion col-12 col-xl-12" id="'.$value['playlist_name'].'-list">
                                           
                                                <div class="accordion-item" >
                                                    <h2 class="accordion-header " id="headingTwo">
                                                        <button class="accordion-button collapsed font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#'.$collapseId.'" aria-expanded="false" aria-controls="'.$collapseId.'">
                                                        <input class="mb-0 border-0  text-dark h6" id="editing-'.$value['playlistID'].'-playlist-input" value="'.$value['playlist_name'].'"  disabled>
                   
                                                        </button>
                       
                                                        
                                                    </h2>

                                                    

                                                    <div id="'.$collapseId.'" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#'.$value['playlist_name'].'-list">
                                                        <div class="accordion-body">
                                                            <ul> ';


                                                            $jsonString = $value['songs'];

           
                                                            // Convert JSON string to PHP array
                                                            $dataArray = json_decode($jsonString, true);

                                                            // Check if decoding was successful
                                                            if ($dataArray === null) {
                                                                // JSON decoding failed, handle the error here
                                                                echo "Error decoding JSON data.";
                                                            } else {
                                                                // Loop through each array in the decoded data
                                                                foreach ($dataArray as $data) {
                                                                    $trackID = $data['trackID'];
                                                                    $artist = $data['artist'];
                                                                    $title = $data['title'];

                                                                    echo '      
                                                                    <li class="d-flex justify-content-between align-items-center mt-3 cursor-pointer" >
                                                                        <span onclick="getSong(this)" trackID="'.$trackID.'" class="" type="text" value="" id="flexCheckDefault" onmouseover="this.style.color=\'blue\';" onmouseout="this.style.color=\'\';">'.$title.'</span>
                                                                        <button playlist_name="'.$value["playlist_name"].'" trackID="'.$trackID.'" class="btn btn-sm delete-file '.$value['playlistID'].'-playlist" onclick="removeSong(this)" hidden>
                                                                            <p hidden>'.$jsonString.' </p>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" feather feather-minus text-danger">
                                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                            </svg>
                                                                        </button>
                                                                    </li>';
                                                                }
                                                            }
                                                         

                                        echo'
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                                </div>            
                                            </div>

                                            <div class="row ">
                                                <div class="col-12 col-xl-12"  style="margin-left:-5px">
                                                            
      
                                                    
                                                    
                                                    <button type="button" class="btn btn-transparent border-0 " data-bs-toggle="dropdown">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="url(#gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat text-info "><path d="m11.998 2c5.517 0 9.997 4.48 9.997 9.998 0 5.517-4.48 9.997-9.997 9.997-5.518 0-9.998-4.48-9.998-9.997 0-5.518 4.48-9.998 9.998-9.998zm0 1.5c-4.69 0-8.498 3.808-8.498 8.498s3.808 8.497 8.498 8.497 8.497-3.807 8.497-8.497-3.807-8.498-8.497-8.498zm2.502 8.495c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25zm-3.75 0c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25zm-3.75 0c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25z"/>
                                                    <defs>
                                                        <linearGradient id="gradient" gradientTransform="rotate(90)">
                                                        <stop offset="0%" stop-color="#c080f9" />
                                                        <stop offset="100%" stop-color="#94c0f2 " />
                                                        </linearGradient>
                                                    </defs>
                                                    </svg>
                                                    </button>



                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#AddSongs" id="'.$value['playlist_name'].'" onclick="setPlaylist(this)">Add Song</a><p hidden>'.$jsonString.' </p></li>
                                            
                                                        <li><a type="button" class="dropdown-item" id="'.$value['playlistID'].'-playlist"  onclick="editPlaylist(this)" playlistname="'.$value['playlist_name'].'" playlistid="'.$value['playlistID'].'">Edit Playlist</a></li>

                                                        <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#linkPlayslitModal" onclick="linkPlaylist(this)" songs="'.$value['songs'].'"  playlistname="'.$value['playlist_name'].'" playlistid="'.$value['playlistID'].'">Link to Event</a></li>
                                                        <li><a class="dropdown-item" type="button" onclick="downloadPlaylist(this)" playlistname="'.$value['playlist_name'].'" playlistid="'.$value['playlistID'].'">Download Playlist Songs</a><p hidden>'.$jsonString.' </p></li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li><a class="dropdown-item text-danger" type="button" id="'.$value['playlistID'].'" onclick="deletePlaylist(this)" playlistid="'.$value['playlistID'].'">Delete Playlist</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                                    
                                          

                                        </div>  
                                    </div>
                                ';
                            }
                                ?>


                        </div>
                        
<!-- '.$value['playlistID'].'-playlist"  para ni tni sa-->


                            
                            

                            

                        </div>  
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>




                <div class="col">
                  <!-- Button trigger modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="DownloadLyrics" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Download Lyrics</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="auth-cover-left align-items-center justify-content-center  bg-light ">
                                    <div class="card m-3 border-0 rounded-3 "  id="printableArea">
                                        <div class="card-body p-sm-10 text-center">
                                            <div class="div-share"><h1>"Living Hope" lyrics</h1></div>

                                    <div class="lyrics">
                                        <h2 ><b>Phil Wickham Lyrics</b></h2>
                                    </div>
                                    <b>"Living Hope"</b><br>
                                    <br>
                                    <div >
                                    <!-- Usage of azlyrics.com content by any third-party lyrics provider is prohibited by our licensing agreement. Sorry about that. -->
                                    How great the chasm that lay between us<br>
                                    How high the mountain I could not climb<br>
                                    In desperation, I turned to heaven<br>
                                    And spoke Your name into the night<br>
                                    Then through the darkness, Your loving-kindness<br> 
                                    Tore through the shadows of my soul<br>
                                    The work is ﬁnished, the end is written<br>
                                    Jesus Christ, my living hope<br>
                                    <br>
                                    Who could imagine so great a mercy?<br>
                                    What heart could fathom such boundless grace?<br>
                                    The God of ages stepped down from glory<br>
                                    To wear my sin and bear my shame<br>
                                    The cross has spoken, I am forgiven<br>
                                    The King of kings calls me His own<br>
                                    Beautiful Savior, I'm Yours forever<br>
                                    Jesus Christ, my living hope<br>
                                    <br>
                                    Hallelujah, praise the One who set me free<br>
                                    Hallelujah, death has lost its grip on me<br>
                                    You have broken every chain<br>
                                    There's salvation in Your name<br>
                                    Jesus Christ, my living hope<br>
                                    Hallelujah, praise the One who set me free<br>
                                    Hallelujah, death has lost its grip on me<br>
                                    You have broken every chain<br>
                                    There's salvation in Your name<br>
                                    Jesus Christ, my living hope<br>
                                    <br>
                                    Then came the morning that sealed the promise<br>
                                    Your buried body began to breathe<br>
                                    Out of the silence, the Roaring Lion<br>
                                    Declared the grave has no claim on me<br>
                                    Then came the morning that sealed the promise<br>
                                    Your buried body began to breathe<br>
                                    Out of the silence, the Roaring Lion<br>
                                    Declared the grave has no claim on me<br>
                                    Jesus, Yours is the victory, whoa!<br>
                                    <br>
                                    Hallelujah, praise the One who set me free<br>
                                    Hallelujah, death has lost its grip on me<br>
                                    You have broken every chain<br>
                                    There's salvation in Your name<br>
                                    Jesus Christ, my living hope<br>
                                    Hallelujah, praise the One who set me free<br>
                                    Hallelujah, death has lost its grip on me<br>
                                    You have broken every chain<br>
                                    There's salvation in Your name<br>
                                    Jesus Christ, my living hope...<br>
                                    <br>
                                    Jesus Christ, my living hope<br>
                                    Oh God, You are my living hope
                                    <br>
                                    </div>
                                    <hr>
                                    <div class="smt"><small>Writer(s): Brian Johnson, Phil Wickham</small>
                                    <br>
                                    </div>
                                    <hr>
                                <!-- song facts -->
                                    <div class="panel album-panel noprint">
                                    "Living Hope" is the lead single from his eponymous album. The song was released on March 30, 2018.
                                    </div>
                                    <div class="panel album-panel noprint">
                                    Phil Wickham described the meaning of this song by saying, <i>"Our future was death, but Jesus came in and brought life – a living hope – into our souls and into our lives."</i>
                                    </div>
                                    <div class="panel album-panel noprint">
                                    <a href="https://www.azlyrics.com/b/bethelmusic.html">Bethel Music</a> released a cover of the song on their album 'Victory' (2019): it was a duet between Brian Johnson and Jenn Johnson. Phil Wickham said about co-writing of 'Living Hope', <i>"Last year, Brian Johnson (Bethel Music) and I started writing a song over text. Over the course of a month or so, we threw lyrics and voice memos back and forth. As we continued writing, every new line felt like a victory."</i>
                                    </div>
                                    </div>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Download Lyrics</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>



              

         
              
                        
</main> 

    <div class="col">
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="AddPlaylist" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
            <div class="modal-header text-white" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">
                <h5 class="modal-title">Create Playlist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form role="form" id="addPlaylistForm" method="POST" autocomplete="nope" class="addPlaylistForm">
                    <div class="modal-body"> 

                        <div class="form-body">                                      
                            <div class="row">
                                <div class="col-12"> 
                                    <label for="playlist_name" class="form-label fw-bold">Name</label>
                                    <input type="text" class="form-control"  id="playlist_name" name="playlist_name" placeholder="Enter Playlist Name">
                                </div>                  
                            </div>    
                        </div>                   
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-white" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>







            <div class="col">
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="AddSongs" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered moda-lg">
                    <div class="modal-content">
                    <div class="modal-header text-white" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">
                        <h5 class="modal-title">Add Songs</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">  
                            <input type="text" name="" id="playlist_songlist" hidden>
                            <label for="single-select-clear-field" class="form-label">Search Songs</label>
                            <div class="input-group ">
                                <input type="text" class="form-control border border-dark " placeholder="" id="song_title_playlist">
                                <button class="btn border border-dark " id="search_song_playlist"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search text-dark  "><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </button> 

                                <button type="button" id="addToPlaylist" class="btn d-fixed btn-light border border-1 ms-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="url(#gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat text-info "><path d="m11 11h-7.25c-.414 0-.75.336-.75.75s.336.75.75.75h7.25v7.25c0 .414.336.75.75.75s.75-.336.75-.75v-7.25h7.25c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-7.25v-7.25c0-.414-.336-.75-.75-.75s-.75.336-.75.75z" fill-rule="nonzero"/>
                                      
                                      <defs>
                                          <linearGradient id="gradient" gradientTransform="rotate(90)">
                                          <stop offset="0%" stop-color="#c080f9" />
                                          <stop offset="100%" stop-color="#94c0f2 " />
                                          </linearGradient>
                                  </defs>
                                    </svg>  
                                
                                </button>

                
                        </div>
                        <div class="row">
                                <div class="col-12 d-flex">
                                    <ul id="songList" style="list-style:none; margin-top:30px; margin-left:-30px;">
                                        <!-- The search results will be displayed here -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class=" d-flex align-items-center mb-3 mt-3">
                                    <div class=" col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                                    <select class="form-select border border-dark" id="addToPlaylistName" aria-label="Default select example">

                                    <?php
                                        $playlist = (new ControllerPlaylist)->ctrShowPlaylist();
                                        foreach ($playlist as $key => $value) {

                                            echo'
                                            <option selected="" value="'.$value['playlist_name'].'" class="" style="font-weight:bold;"><span>'.$value['playlist_name'].'
                                            </span></option>
                                            ';
                                        }
                                    
                                    ?>


            
                                    </select>
                                    

                                </div>
            

                        
                                </div>
                                <div class="modal-footer">
                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>




    
    <div class="col">
                <!-- Button trigger modal -->
                <!-- Modal -->
        <div class="modal fade" id="linkPlayslitModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered moda-lg">
                <div class="modal-content">
                    <div class="modal-headertext-white" style="background: radial-gradient(circle, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">
                        <h5 class="modal-title">Link Playlist</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                     <div class="row">
                                <label for="single-select-clear-field" class="form-label">Playlist: </label>
                                    <div class="col-12 d-flex align-items-center mb-3 mt-2">

                                    <select class="form-select border border-dark " id="linkPlaylistInput" >
                                    <?php
                                        $playlist = (new ControllerPlaylist)->ctrShowPlaylist();
                                        foreach ($playlist as $key => $value) {
                                            echo'
                                            <option value="'.$value['playlistID'].'"  class=" d-flex align-items-center justify-content-between" style="font-weight:bold;"><span>'.$value['playlist_name'].'</span>
                                            </option>
                                            ';  
                                        }
                                    
                                    ?>
                                    </select>
                                </div>             
                          


                  

                                <label for="single-select-clear-field" class="form-label">Event: </label>

                                <div class="col-12 d-flex align-items-center mb-3 mt-2">

                                    <select class="form-select border border-dark " id="linkEventInput" aria-label="Default select example">
                                    <?php
                                        $playlist = (new ControllerPlaylist)->ctrShowEventsLinkingPlaylist();
                                        foreach ($playlist as $key => $value) {

                                            echo'
                                            <option value="'.$value['eventID'].'"  class=" d-flex align-items-center justify-content-between " style="font-weight:bold;"><span>'.$value['event_title'].'
                                            </span><span>('.$value['event_date'].' @ '.$value['event_time'].') 
                                            </span>
                                            </option>
                                            ';
                                        }
                                    
                                    ?>
                                    </select>
                                </div>
                                    

                            </div>
            

                        <div class="row d-flex justify-content-center  mt-3">
                        	<button type="button" class="btn text-white btn-light w-50 custom-button" id="linkPlaylistBtn"  style="background: linear-gradient(to right, rgba(192,128,249,1) 0%, rgba(148,191,242,1) 100%); font-weight:bold;">Link</button>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
        
   

<style>
    .newCollapsed {
      display: none;
    }
  </style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>   


<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;   
}
</script>

<script>
    var data = [
      { id: 1, name: "Joy of Jesus" },
      { id: 2, name: "Holy Spirit Grooves" },
      { id: 3, name: "Gospel Glory" },
      { id: 4, name: "God’s Rockin’ Tunes" },
      { id: 5, name: "Blessed Beats" },
      { id: 6, name: "Songs Of Praise" }
     
    ];

    function search(query) {
      var results = [];
      query = query.toLowerCase();

      for (var i = 0; i < data.length; i++) {
        var item = data[i];

        if (item.name.toLowerCase().includes(query)) {
          results.push(item);
        }
      }

      return results;
    }

    function displayResults(results) {
      var searchResults = document.getElementById("searchResults");
      searchResults.innerHTML = "";

      if (results.length === 0) {
        searchResults.style.display = "none";
        return;
      }

      for (var i = 0; i < results.length; i++) {
        var result = results[i];
        var listItem = document.createElement("li");
        listItem.className = "list-group-item";
        listItem.textContent = result.name;
        listItem.addEventListener("click", function() {
          document.getElementById("searchBar").value = this.textContent;
          searchResults.style.display = "none";
        });
        searchResults.appendChild(listItem);
      }

      searchResults.style.display = "block";
    }

    var searchBar = document.getElementById("searchBar");
    var searchResults = document.getElementById("searchResults");

    searchBar.addEventListener("input", function() {
      var query = this.value;
      var results = search(query);
      displayResults(results);no
    });

    searchBar.addEventListener("focus", function() {
      if (this.value.trim() !== "") {
        searchResults.style.display = "block";
      }
    });

    document.addEventListener("click", function(event) {
      if (!searchBar.contains(event.target) && !searchResults.contains(event.target)) {
        searchResults.style.display = "none";
      }
    });


  </script>



