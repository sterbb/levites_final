
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
        <button onclick="downloadLyrics()" type="button" class="btn  btn-light border border-dark" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Download Lyrics"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud text-warning"><polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path></svg></button>
            <button type="button"  onclick="copyWholeLyrics()" class="btn  btn-light border border-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Copy All Lyrics"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy text-success"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>

            <button type="button" onclick="printLyrics()" class="btn  btn-light border border-dark" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Print Lyrics"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer text-primary"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg></button>

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

$apiKey = '4a66ea62568120729edc2aab041c6b91'; // Replace with your Musixmatch API key
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
    echo '<div class="icon-notifier">';
    echo '<button class="notifInformation border border-0 bg-transparent position-absolute bottom-0 start-0 " data-toggle="tooltip" data-placement="left" title="About Lyrics" data-bs-toggle="modal" data-bs-target="#lyricsInformation"><span class="ly material-symbols-outlined fs-2 m-2">
    contact_support
    </span></button>
    ';

    foreach ($sections as $section) {
        echo '<div class="lyrics-section">' . nl2br($section) . '  <br><button class="copy-button btn btn-light border border-transparent border-0" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Copy Stanza" onclick="copyLyrics(this)" >
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy text-success">
        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
        </svg>
    </button> </div>';
    
        echo '<div class="section-space"></div>'; // Add space between sections
    }
    echo '</div>';
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
                            <div class="video-container " id="videoContainer">

            
                            </div>
                        </div>
                    </div>

                    <script>
                        // Function to update the YouTube video based on song title
                        function updateYouTubeVideo(songTitle) {
                            var videoContainer = document.getElementById('videoContainer');
                            var youtubeIframeCode;

                            if (songTitle === 'Sing Your Praise To The Lord') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/CIPRSzVHfCM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                            } else if (songTitle === 'Lilim (In Your Shelter)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/sBum0Prrnmo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';        
                                } else if (songTitle === 'I Will Follow') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/1ohvhmGSfxI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';        
                                } else if (songTitle === 'I Know') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/j25JqWgjDF4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';        
                                } else if (songTitle === 'Too Faitful') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/-1vSWgDTQ00" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';        
                                } else if (songTitle === 'See A Victory') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/YNd-PbVhnvA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';        
                                } else if (songTitle === "The Father's House") {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/lHWRlRkkvV0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';        
                                } else if (songTitle === 'Who Am I') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/3rT8Re1EIQc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';        
                                } else if (songTitle === 'Who You Say I Am') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/lKw6uqtGFfo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';        
                                } else if (songTitle === 'Come Now Is Time To Worship') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Za4roZrWpc8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';        
                                } else if (songTitle === 'Goodness Of God(Live)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/n0FBb6hnwTo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';        
                                } else if (songTitle === 'What A Beautiful Name') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/r5L6QlAH3L4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                } else if (songTitle === 'Oceans (Where Feet May Fail)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/FBJJJkiRukY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === '10,000 Reasons (Bless the Lord)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/XtwIT8JjddM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Living Hope') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/u-1fwZtKJSM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Touch The Sky') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/3OBn7fKYk_4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Need You') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/IE6Zp_BDYiA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Every Giant Will Fall') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/iQOsD4Sou6c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Battle Belongs') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/qtvQNzPHn-w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Surrounded (Fight My Battles)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/YBl84oZxnJ4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Made a Way') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/MimVg0OMGvA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'On My Own') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/sG--g1gMrGo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Do It Again') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/ZOBIPb-6PTc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Jesus, Take the Wheel') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/lydBPm2KRaU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'King Of Kings') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/dQl4izxPeNU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Good Good Father') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/CqybaIesbuA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === "Hallelujah Nkateko (Lihle's Version)") {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/HUrnIYOpR-w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Intentional') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/VH3f0ellNv8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Way Maker') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/1kBvpS3z9Qo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Promises (feat. Joe L Barnes)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/q5m09rqOoxE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'You Are God (feat. Chigozie Achugo)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/euUoYhj52JA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'TOGETHER') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/lR1Hk0FVi_k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'There Was Jesus') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/37wV6D49iEY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Run to the Father') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/HcpeLDp0Foo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Holy Spirit') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/UvBBC7-PSHo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Famous For (I Believe)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/o15X2yZ1LT8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Love Theory') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/3aD8OK07iIY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Our God') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/NJpt1hSYf2o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'God, Turn It Around') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/h7-IAFogxcM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'O Come to the Altar (Live)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/rYQ5yXCc_CA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'This I Believe (The Creed)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/FtUNQpu2b7Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Raise a Hallelujah') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/GzKzEknglME" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Lord, I Need You') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/vG5O5TSIaE4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Bo Noo Ni') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/JiFM6t0k8JU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'So Will I (100 Billion X)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/pB_hNYp-a68" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Broken Vessels (Amazing Grace)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Meyeuq4uaBw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === "God's Not Dead (Like a Lion)") {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/S_OTz-lpDjw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Every Praise') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/UuuZMg6NVeA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Shepherd') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/xMxfBbr2FTM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Battle Hymn of the Republic') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/HkFjFIR-xIc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    
                                    //Tagalog

                                }else if (songTitle === 'Banal Mong Tahanan') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/D0MM_9cXmqI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Awit Sa Ina Ng Sto. Rosario') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/SEV3zAUMBfA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Diyos Ka Sa Amin') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/X2DWxYpTQpQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Hindi Ka Nagkulang') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/HH-G0rQY7-w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Kataas-Taasan') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/IXCnx1vxIVw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Pananagutan') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/VTA0zTaUliI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Malaya Na') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/DmpK6Ua1kBM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Pinagdiriwang (Live)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/_VWNb13GIkU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Panibagong Sigla (Live)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/tLroH0SMxEA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Mahiwaga') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/8WSWq687rak" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Sumigaw Sa Galak') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Q7USrkrYZK8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Unang Alay') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/cQ8D-KEHzIk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Mahal Na Mahal Kita Panginoon') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/h-vdzizpKnE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === "Sa'yo Lamang") {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Ugjxr6GNJSs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Munting Tinig') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/LBQOJ86VNCY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Purihin Pangalan Niya') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/_4TH7UVfjuo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Karapat-Dapat') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/pAu_0tkd330" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Ikaw Lamang (Live)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/oa1Feo0zsWU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Kay Buti-Buti Mo Panginoon') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/oQohvmpbtzo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Napakabuti Mo (Live)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/H4JjPKrjJpU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Dakilang Pag-Ibig') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/CEBoxu65YCQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Walang Katulad') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/PXrrT1aM8Z0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Tagumpay') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/fShTsUSk61A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Minamahal Kita') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/9KN3bkzlcRw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Pananagutan') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Jx8AeaJUH6s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Sukdulang Biyaya (Live)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Ce6oT3vTxpU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === "Halina't Sama-Sama") {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/mbkpV9VR9zU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Diyos Ng Kabutihan') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/tJWsI2XqHoY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Ligtas') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Wj73fKzQEsY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Walang Katulad') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/PXrrT1aM8Z0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Tanging Yaman') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/hKL8c7wgQQo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === "Sa 'Yo") {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/yBD6uCVj6P8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Ang Tanging Alay ko') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/ziJPJKmVxqE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'May Galak') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/y4-1iMxGFyg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Kahanga-Hanga') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/J5SqPuWJ7xM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Di Mag-Iisa (Live)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/wJ05VFjsIbQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === "Halina't Sama-Sama") {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/mbkpV9VR9zU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Maghari Ka (Live)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/eAw7kXhx7a4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Luwalhatiin Ka (Live)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/s7bwoguQ8Yw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Walang Katulad') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/PXrrT1aM8Z0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Pag-Ibig Na Kay Ganda') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/pcKTlsH9SwM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Pagbabalik') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/LOPQZfojseU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Sapat Na at Higit Pa (Live)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/S_JYpxVzDBk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === "Halina't Sama-Sama") {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/mbkpV9VR9zU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Sino Ako?') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Le_VwVZKbM0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Ako Ay Lalapit') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Rr-r1slydL0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Pag-Ibig Na Kay Ganda') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/pcKTlsH9SwM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Awit Ng Pagsamba') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/9FuclCwqlNc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Pupurihin Ka Sa Awit (Live)') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/r-KJgwzNMro" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                }else if (songTitle === 'Pasasalamat') {
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/Dobn1zrTfms" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                
                                } else {
                                // Default video URL if no match is found
                                youtubeIframeCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/DEFAULT_VIDEO_ID" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                            }

                            // Update the video container with the new YouTube video
                            videoContainer.innerHTML = youtubeIframeCode;                            
                        }

                        // Call the function to update the YouTube video based on the initial song title
                        var initialSongTitle = '<?php echo $song; ?>';
                        updateYouTubeVideo(initialSongTitle);
                    </script>

                    <div class="card  ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-12 d-flex align-items-center">
                                    <h4 style="font-weight:bold">Playlists</h4>
                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#AddPlaylist"  class="btn btn-transparent border-0">
                                        
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M10 10h4v4h-4zm6 0h4v4h-4zM4 10h4v4H4z"></path>
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
                    <div class="modal-header bg-warning ">
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

                            <button type="button" id="addToPlaylist" class="btn d-fixed btn-light border border-1 ms-3" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus text-success"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </button>

                
                        </div>
                        <ul id="songList" style="margin-top:30px;">
                                <!-- The search results will be displayed here -->
                            </ul>
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
                    <div class="modal-header bg-warning ">
                        <h5 class="modal-title">Link Playlist</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    
                            <div class="row">
                        
                            <label for="single-select-clear-field" class="form-label">Playlist: </label>
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
                        <div class="row">
                            <div class=" d-flex align-items-center mb-3 mt-3">


                                <div class="row">

                                <label for="single-select-clear-field" class="form-label">Event: </label>

                    
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
            

                        

                       
                        </div>

                        <div class="row d-flex justify-content-center  mt-3">
                            <button type="button" class="btn btn-outline-warning w-50" id="linkPlaylistBtn">Link</button>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
        
    <!-- Modal -->
<div class="modal fade" id="lyricsInformation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">About Lyrics</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="recommendation">
          <p>Looking to explore more song lyrics? While we diligently work on enhancing your lyrics experience, we recommend checking out well-established platforms like <a href="https://www.musixmatch.com/explore" target="_blank" rel="noopener noreferrer">Musixmatch</a> and <a href="https://www.azlyrics.com" target="_blank" rel="noopener noreferrer">AZLyrics</a>. These platforms offer an extensive collection of song lyrics across a wide range of genres. Although we're focused on delivering an exceptional lyrics service, we encourage you to indulge in these alternatives for your lyrical exploration. Your continued support fuels our commitment to excellence, and we eagerly anticipate unveiling an enhanced lyrics experience in the near future.</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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



