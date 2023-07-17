
<main class="page-content ">
    <div class="card ">
	    <div class="card-body ">
		    <nav class="navbar navbar-expand-xl navbar-light ">
                <div class="container" ><a class="navbar-brand" href=""> <span class="h2">LEVITES</span></a>
   
                    <form class="d-flex nav-search col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 " method="POST" class="form" id="form">
                        <div class="input-group ">
                            <input type="text" class="form-control border border-dark " name="searchQuery" placeholder="Search Title" id="searchQuery" />
                            <input type="text" class="form-control border border-dark " name="searchArtist" placeholder="Search Artist" id="searchArtist" />
                            <button class="btn border border-dark " name="submit" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search text-dark  "><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </button> 
                        </div>
                    </form>
            
                </div>
		    </nav>
        </div>
    </div>
         





    <div class="row justify-content-center" >

        <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-12 text-center">
            <button type="button" data-bs-toggle="modal" data-bs-target="#DownloadLyrics" class="btn  btn-light border border-dark"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud text-warning"><polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path></svg></button>

            <button type="button"  class="btn  btn-light border border-dark"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy text-success"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>

            <button type="button" onclick="printDiv('')" class="btn  btn-light border border-dark" ><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer text-primary"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg></button>

        </div>
    </div>




    <div class="row g-0">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
            <div class="card m-3 ">
                <div class="card-body p-sm-10 text-center">
                    <div class="div-share" id="lyricsContainer">
                        

 <?php
if (isset($_GET['artist']) && isset($_GET['song'])) {
    $artist = $_GET['artist'];
    $song = $_GET['song'];

    // Rest of the code to handle the variables
    // ...

    $apiKey = '10d5d6cfd3f1d6b777a1d447a76327de'; // Replace with your Musixmatch API key

    // Search for the song and artist
    $searchUrl = 'https://api.musixmatch.com/ws/1.1/track.search';
    $searchParams = [
        'q_artist' => urlencode($artist),
        'q_track' => urlencode($song),
        'apikey' => $apiKey
    ];
    $searchUrl .= '?' . http_build_query($searchParams);

    $searchResponse = file_get_contents($searchUrl);
    $searchData = json_decode($searchResponse, true);

    if (isset($searchData['message']['body']['track_list'][0]['track']['track_id'])) {
        $trackId = $searchData['message']['body']['track_list'][0]['track']['track_id'];

        // Get lyrics for the track
        $lyricsUrl = 'https://api.musixmatch.com/ws/1.1/track.lyrics.get';
        $lyricsParams = [
            'track_id' => $trackId,
            'apikey' => $apiKey
        ];
        $lyricsUrl .= '?' . http_build_query($lyricsParams);

        $lyricsResponse = file_get_contents($lyricsUrl);
        $lyricsData = json_decode($lyricsResponse, true);

        if (isset($lyricsData['message']['body']['lyrics']['lyrics_body'])) {
            $lyrics = $lyricsData['message']['body']['lyrics']['lyrics_body'];

            // Remove artist name from the lyrics
            $lyrics = preg_replace('/\[(.*?)\]/', '', $lyrics);

            // Add spacing between verses
            $lyrics = preg_replace('/\n{2,}/', '<br><br><br>', $lyrics);

            // Add spacing between each line
            $lyrics = str_replace("\n", '<br>', $lyrics);

            // Output the lyrics in the designated container
            echo "<div id='lyricsContainer'>$lyrics</div>";
        } else {
            echo 'Lyrics not found.';
        }
    } else {
        echo 'Song not found.';
    }
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
                            <iframe style="width: 100% !important; height: 300px !important;" src="https://www.youtube.com/embed/9f2FXxDVO6w" title="Phil Wickham - Living Hope (Lyrics)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>                            </div>
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
                                    $editId = 'editPlaylist_' . $key; // Unique ID for edit playlist
                                    $addSongsId = 'addSongs_' . $key; // Unique ID for add songs
                                    $linkEventId = 'linkEvent_' . $key; // Unique ID for link to event
                                    $downloadId = 'downloadPlaylist_' . $key; // Unique ID for download playlist
                                    $deleteId = 'deletePlaylist_' . $key; // Unique ID for delete playlist
                                    $fadeInAnimatedClass = 'fadeIn animated unique-class-' . $key; // Unique class for each edit-website button
                                    $minusButtonId = 'minus-playlist unique-class-' . $key; // Unique class for each minus button
                                    $editPlaylist = 'edit-playlist unique-class-' . $key; // Unique class for each minus button


                                    

                                    echo '
                                        <div class="row mt-2">
                                            <div class="d-flex align-items-center">
                                                <div class="accordion col-10 col-sm-8 col-md col-lg col-xl" id="'.$accordionId.'">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header " id="headingTwo">
                                                            <button class="accordion-button collapsed font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#'.$collapseId.'" aria-expanded="false" aria-controls="'.$collapseId.'">
                                                            <input class="border-0" value="'.$value['playlist_name'].'" readonly style="font-weight:bold; background:transparent">
                                                            </button>
                                                        </h2>

                                                        <div id="'.$collapseId.'" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#'.$accordionId.'">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <li class="d-flex justify-content-between align-items-center mt-3">
                                                                        <a href=""><span class="" type="text" value="" id="flexCheckDefault">Living Hope Phil Wickham</span></a>
                                                                        <div>
                                                                        <button class="btn btn-sm delete-file '.$minusButtonId.'" hidden><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$fadeInAnimatedClass.' feather feather-minus text-danger"><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                                                                    </div>
                                                                    </li>

                                                                    <li class="d-flex justify-content-between align-items-center mt-3">
                                                                    <a href=""><span class="" type="text" value="" id="flexCheckDefault">Living Hope Phil Wickham</span></a>
                                                                    <div>
                                                                    <button class="btn btn-sm delete-file '.$minusButtonId.' " hidden><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="'.$fadeInAnimatedClass.' feather feather-minus text-danger"><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                                                                </div>
                                                                </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div col col-sm col-md col-lg col-xl>
                                                    <button type="button" class="btn btn-transparent border-0 ms-3" id="'.$addSongsId.'">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="url(#gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat text-info "><path d="m11 11h-7.25c-.414 0-.75.336-.75.75s.336.75.75.75h7.25v7.25c0 .414.336.75.75.75s.75-.336.75-.75v-7.25h7.25c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-7.25v-7.25c0-.414-.336-.75-.75-.75s-.75.336-.75.75z" fill-rule="nonzero"/>
                                                    <defs>
                                                        <linearGradient id="gradient" gradientTransform="rotate(90)">
                                                        <stop offset="0%" stop-color="#c080f9" />
                                                        <stop offset="100%" stop-color="#94c0f2 " />
                                                        </linearGradient>
                                                </defs>
                                                </svg>
                                                
                                                    
                                                    </button>

                                                    <button type="button" class="btn btn-transparent border-0 " data-bs-toggle="dropdown">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="url(#gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat text-info "><path d="m11.998 2c5.517 0 9.997 4.48 9.997 9.998 0 5.517-4.48 9.997-9.997 9.997-5.518 0-9.998-4.48-9.998-9.997 0-5.518 4.48-9.998 9.998-9.998zm0 1.5c-4.69 0-8.498 3.808-8.498 8.498s3.808 8.497 8.498 8.497 8.497-3.807 8.497-8.497-3.807-8.498-8.497-8.498zm2.502 8.495c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25zm-3.75 0c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25zm-3.75 0c0-.69.56-1.25 1.25-1.25s1.25.56 1.25 1.25-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25z"/>
                                                    <defs>
                                                        <linearGradient id="gradient" gradientTransform="rotate(90)">
                                                        <stop offset="0%" stop-color="#c080f9" />
                                                        <stop offset="100%" stop-color="#94c0f2 " />
                                                        </linearGradient>
                                                </defs>
                                                </svg>
                                                
                                                    
                                                    </button>

                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#AddSongs" id="'.$addSongsId.'">Add Song</a></li>
                                                        <li><a class="dropdown-item '.$editPlaylist.'" type="button" data-bs-target="#'.$editId.'">Edit Playlist</a></li>

                                                        <li><a class="dropdown-item" type="button" id="'.$linkEventId.'">Link to Event</a></li>
                                                        <li><a class="dropdown-item" type="button" id="'.$downloadId.'">Download Playlist Songs</a></li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li><a class="dropdown-item text-danger" type="button" id="'.$deleteId.'">Delete Playlist</a></li>
                                                    </ul>
                                                </div>


                                            </div>  
                                        </div>
                                    ';
                                }
                                ?>


                        </div>
                        



                            
                            

                            

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
                    <div class="modal-header bg-warning ">
                        <h5 class="modal-title">Add Songs</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">  
                            <label for="single-select-clear-field" class="form-label">Search Songs</label>
                            <input type="search" id="searchBar" class="form-control" placeholder="">
                            <ul id="searchResults"  class="list-group mt-2 dropdown-menu"></ul> 
                        </div>
                        <div class="row">
                                <div class=" d-flex align-items-center mb-3 mt-3">
                                    <div class=" col-10 col-sm-10 col-md-10 col-lg-10 col-xl-11" >
                                    <select class="form-select border border-dark" id="inputSelectCountry" aria-label="Default select example" onchange="location = this.value; ">
                                    <option selected="" value="disabled" class="" style="font-weight:bold; color:aquamarine;"><span style="color:aquamarine">Sunday Line Up
                                    </span></option>
                                    <option value="">The Divine Groove</option>
                                 



                                    </select>
                                    
                                      
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">  
                                <button type="button" class="btn d-fixed btn-light border border-1 ms-1" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus text-success"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </button>
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



