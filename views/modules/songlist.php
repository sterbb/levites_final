<main class="page-content ">
    <div class="card ">
	    <div class="card-body ">
		    <nav class="navbar navbar-expand-xl navbar-light ">
                <div class="container" ><a class="navbar-brand" href="slhomepage"> <span class="h2">LEVITES</span></a>
   
                    <form class="d-flex nav-search col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 searchSong" id="searchSong" method="POST"  role="form">
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
         



    <div class="container-fluid bg-white card d-flex justify-content-center align-items-center " >
<div class="row" style="font-weight:bold;">

<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center ">

<?php

// $apiKey = '10d5d6cfd3f1d6b777a1d447a76327de'; // Replace with your Musixmatch API key

$apiKey = '10d5d6cfd3f1d6b777a1d447a76327de'; // Replace with your Musixmatch API key

$searchQuery = isset($_COOKIE['song_title']) ? $_COOKIE['song_title'] : '';

if ($searchQuery !== '') {
    // Search for songs and sort by track rating (popularity)
    $searchUrl = 'https://api.musixmatch.com/ws/1.1/track.search';
    $searchParams = [
        'q_track' => urlencode($searchQuery),
        'apikey' => $apiKey,
        'f_music_genre_id' => 22, // Replace YOUR_GENRE_ID with the desired music genre ID 22
        's_track_rating' => 'desc', // Sort by track rating in descending order
    ];
    $searchUrl .= '?' . http_build_query($searchParams);

    $searchResponse = file_get_contents($searchUrl);
    $searchData = json_decode($searchResponse, true);

    if (isset($searchData['message']['body']['track_list'])) {
        // Extract the list of songs and artists with track_ids
        $songs = [];
        $artists = [];
        $trackIds = []; // to store the track_ids

        foreach ($searchData['message']['body']['track_list'] as $track) {
            $songs[] = $track['track']['track_name'];
            $artists[] = $track['track']['artist_name'];
            $trackIds[] = $track['track']['track_id']; // Store the track_id for each song
        }

        // Output the list of songs and artists with URLs
        echo '<h4 class="pt-3 ">List of Songs and Artists<br></h4>';
        foreach ($songs as $index => $song) {
            $artist = $artists[$index];
            $trackId = $trackIds[$index];

            // Create URL parameters for the artist and song
            $artistParam = urlencode($artist);
            $songParam = urlencode($song);

            // Generate the UrRL for the lyrics.php page with track ID as a parameter
            $lyricsUrl = "lyics?track_id=$trackId";

            // Output the link to the lyrics.php page with the song ID as a parameter
            echo "<h6 class='pt-2'><a style='cursor: pointer;' class='getLyrics justify-content-center d-flex' trackid='$trackId'>$song - $artist</a></h6>";
        }
    } else {
        echo '<div class="error-message">No songs found.</div>';
    }
} else {
    echo '<h2 style="color:red;">Please enter a song title.</h2>';
}



// $apiKey = '7a089ceadb3e1e9367a4a5f5d5e5a343'; // Replace with your Musixmatch API key

// $searchQuery = 'lilim';
// // $searchArtist = $_POST['searchArtist'];

// // Search for songs and sort by track rating (popularity)
// $searchUrl = 'https://api.musixmatch.com/ws/1.1/track.search';
// $searchParams = [
//     'q_track' => urlencode($searchQuery),
//     'apikey' => $apiKey,
//     'f_music_genre_id' => 22, // Replace YOUR_GENRE_ID with the desired music genre ID 22
//     's_track_rating' => 'desc', // Sort by track rating in descending order
// ];
// $searchUrl .= '?' . http_build_query($searchParams);

// $searchResponse = file_get_contents($searchUrl);
// $searchData = json_decode($searchResponse, true);

// if (isset($searchData['message']['body']['track_list'])) {
//     // Extract the list of songs and artists with track_ids
//     $songs = [];
//     $artists = [];
//     $trackIds = []; // to store the track_ids

//     foreach ($searchData['message']['body']['track_list'] as $track) {
//         $songs[] = $track['track']['track_name'];
//         $artists[] = $track['track']['artist_name'];
//         $trackIds[] = $track['track']['track_id']; // Store the track_id for each song
//     }

//     // Output the list of songs and artists with URLs
//     echo 'List of Songs and Artists:<br>';
//     foreach ($songs as $index => $song) {
//         $artist = $artists[$index];
//         $trackId = $trackIds[$index];

//         // Create URL parameters for the artist and song
//         $artistParam = urlencode($artist);
//         $songParam = urlencode($song);

//         // Generate the URL for the lyrics.php page
//         $lyricsUrl = "lyrics?artist=$artistParam&song=$songParam";

//         // Output the link to the lyrics.php page
//         echo "<h6><a href='$lyricsUrl'>$song - $artist</a></h6>";

//         // // Fetch the lyrics for each song using track_id
//         // $lyricsUrl = "https://api.musixmatch.com/ws/1.1/track.lyrics.get?track_id=$trackId&apikey=$apiKey";
//         // $lyricsResponse = file_get_contents($lyricsUrl);
//         // $lyricsData = json_decode($lyricsResponse, true);

//         // if (isset($lyricsData['message']['body']['lyrics']['lyrics_body'])) {
//         //     $lyrics = $lyricsData['message']['body']['lyrics']['lyrics_body'];
//         //     // Output the lyrics for the current song
//         //     echo "<h6><a song='$lyrics'>$song - $artist</a></h6>";
//         //     setcookie('lyrics', $lyrics, time() + 3600);
//         // } else {
//         //     echo "Lyrics not found for $song - $artist";
//         // }
//     }
// } else {
//     echo 'No songs found.';
// }



?>
                </div>                  
            </div>                 
        </div>
    </div>
</div>

</main
