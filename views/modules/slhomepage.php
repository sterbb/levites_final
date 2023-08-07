<main class="page-content ">
    <div class="card ">
        <div class="card-body ">
            <nav class="navbar navbar-expand-xl navbar-light ">
                <div class="container"><a class="navbar-brand" href="slhomepage"> <span class="h2">LEVITES</span></a>

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
         


 
        <div>
             <div class="col-xs-12 text-left p-4 artist-col d-flex justify-content-between">
                <h2>DISCOVER SONGS</h2>

             </div>
             
             <div class="row justify-content-center p">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
                    <div class="list-group borders border border-success">
                        <?php

                        // $apiKey = '10d5d6cfd3f1d6b777a1d447a76327de'; // Replace with your Musixmatch API key

                        function get_random_popular_songs($genre_id, $num_random_songs, $language) {
                            // Replace 'YOUR_API_KEY' with your actual Musixmatch API key
                            $api_key = '7a089ceadb3e1e9367a4a5f5d5e5a343';
                            $endpoint = "https://api.musixmatch.com/ws/1.1/track.search?f_music_genre_id=$genre_id&f_lyrics_language=$language&s_track_rating=desc&apikey=$api_key&format=json&page_size=50";
                        
                            $curl = curl_init($endpoint);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            $response = curl_exec($curl);
                        
                            if ($response === false) {
                                echo 'Error: ' . curl_error($curl);
                                return [];
                            }
                        
                            $data = json_decode($response, true);
                        
                            if (isset($data['message']['body']['track_list'])) {
                                $tracks = $data['message']['body']['track_list'];
                        
                                // Get random indices to select random songs
                                $num_tracks = count($tracks);
                                $random_indices = array_rand($tracks, min($num_random_songs, $num_tracks));
                        
                                // Build the resulting array with track name, artist name, track ID, and genre ID
                                $result = [];
                                foreach ($random_indices as $index) {
                                    $trackName = $tracks[$index]['track']['track_name'];
                                    $artistName = $tracks[$index]['track']['artist_name'];
                                    $trackId = $tracks[$index]['track']['track_id'];
                        
                                    // Concatenate the track name, artist name, track ID, and genre ID with a delimiter (' - ' in this case)
                                    $result[] = "$trackName - $artistName - $trackId - $genre_id";
                                }
                                return $result;
                            } else {
                                echo 'Error: Unable to fetch songs.';
                                return [];
                            }
                        }
                        
                        // Example usage
                        $genre_id = 22; // Replace this with the desired music genre ID
                        $num_random_songs = 12; // Replace this with the number of random songs you want
                        
                        $random_songs = get_random_popular_songs($genre_id, $num_random_songs, "en");
                        
                        // Display the random songs in the specified format
                        foreach ($random_songs as $random_song) {
                            list($trackName, $artistName, $trackId, $genreId) = explode(' - ', $random_song);
                            echo "<a class='list-group-item getLyrics' style='cursor: pointer;' trackid='$trackId' genreid='$genreId'>$trackName - $artistName</a>";
                        }
                        

                        ?>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
                    <div class="list-group border border-warning">
                            <?php
                                                // Example usage
                        $genre_id = 22; // Replace this with the desired music genre ID
                        $num_random_songs = 12; // Replace this with the number of random songs you want
                        
                        $random_songs = get_random_popular_songs($genre_id, $num_random_songs, "tl");
                        
                        // Display the random songs in the specified format
                        foreach ($random_songs as $random_song) {
                            list($trackName, $artistName, $trackId) = explode(' - ', $random_song);
                            echo "<a class='list-group-item getLyrics' style='cursor: pointer;' trackid='$trackId'>$trackName - $artistName</a>";
                        }

                        ?>
                    </div>
                </div>
            </div>
            
        </div>
  

    


</div>





</main>




<script type="text/javascript">
  function handleSelect(elm)
  {
     window.location = elm.href+".php";
  }
</script>
  <!-- <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ">
                <div class="card border-warning border-bottom border-3 border-0  h-100">
                    <img src="views/SLimg/c1.png" class="card-img-top" alt="...">
                    <div class="card-body ">
                        <h6 class=" text-light">God Is Here As We His People</h6> 
                        <div class="">
                            <p>by Fred Pratt Green</p>
                        </div> 
                    </div>  
                    
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ">
                <div class="card border-danger border-bottom border-3 border-0 h-100">
                    <img src="views/SLimg/c2.png" class="card-img-top" alt="...">
                    <div class="card-body ">
                        <h6 class="text-light">O Church Arise</h6>
                        <div class="">
                        <p>By  Keith Getty, Stuart Townend</p>
                        </div>
                
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ">
                <div class="card border-success border-bottom border-3 border-0 h-100">
                    <img src="views/SLimg/c3.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title text-light">For I'm Building A People Of Power</h6>
                        <div class="">
                         <p>By Dave Richards</p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ">
                <div class="card border-primary border-bottom border-3 border-0 h-100">
                    <img src="views/SLimg/c4.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title text-light">Spirit Touch Your Church</h6>
                        <div class="">
                            <p>By Kim Bollinger</p>
                        </div>
        
                    </div>
                </div>
            </div> -->