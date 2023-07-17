<main class="page-content ">
	<div class="card ">
	    <div class="card-body ">
		    <nav class="navbar navbar-expand-xl navbar-light ">
                <div class="container-fluid"><a class="navbar-brand" href=""> <span class="h2">LEVITES</span></a>
   
                   
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
    




<div class="container-fluid bg-white card" >
<div class="row" style="font-weight:bold;">

<div class="col-sm-6 col-xl-6 col-md-6 col-lg-6 text-center" id="songList">
<?php
$apiKey = '10d5d6cfd3f1d6b777a1d447a76327de'; // Replace with your Musixmatch API key

if (isset($_POST['submit'])) {
    $searchQuery = $_POST['searchQuery'];
    $searchArtist = $_POST['searchArtist'];

    // Search for songs
    $searchUrl = 'https://api.musixmatch.com/ws/1.1/track.search';
    $searchParams = [
        'q_track' => urlencode($searchQuery),
        'q_artist' => urlencode($searchArtist),
        'apikey' => $apiKey
    ];
    $searchUrl .= '?' . http_build_query($searchParams);

    $searchResponse = file_get_contents($searchUrl);
    $searchData = json_decode($searchResponse, true);

    if (isset($searchData['message']['body']['track_list'])) {
        // Extract the list of songs and artists
        $songs = [];
        $artists = [];

        foreach ($searchData['message']['body']['track_list'] as $track) {
            $songs[] = $track['track']['track_name'];
            $artists[] = $track['track']['artist_name'];
        }

        // Output the list of songs and artists with URLs
        echo 'List of Songs and Artists:<br>';
        foreach ($songs as $index => $song) {
            $artist = $artists[$index];

            // Create URL parameters for the artist and song
            $artistParam = urlencode($artist);
            $songParam = urlencode($song);

            // Generate the URL for the lyrics.php page
            $lyricsUrl = "lyrics?artist=$artistParam&song=$songParam";

            // Output the link to the lyrics.php page
            echo "<h6><a href='$lyricsUrl'>$song - $artist</a></h6>";
        }
    } else {
        echo 'No songs found.';
    }
}

?>


</div>
			
</div>
			
         
</div>
			
         
         


<div class="container-fluid bg-white card" >
<div class="row" style="font-weight:bold;">

<div class="col-sm-6 col-xl-6 col-md-6 col-lg-6 text-center">
<a href="lyrics" class="cursor-pointer">Living Hope</a><br>
<a href="f/floyda1bentley.html">Panalangin sa Pagiging Bukas Palad</a><br>
<a href="a/a1xj1.html">Tanging Yaman</a><br>
<a href="a/a.html">Awit ng Paghahangad</a><br>
<a href="a/a2h.html">Papuri</a><br>
<a href="a/a4.html">Ama namin</a><br>
<a href="a/a92.html">Aba Ginoong Maria</a><br>
<a href="s/snohaalegra.html">Gandang Sinauna at Sariwa</a><br>
<a href="a/aaliyah.html">Bawat Sandali</a><br>
<a href="s/saaraaalto.html">Balang Araw</a><br>
<a href="a/aaradhna.html">Amazing Grace</a><br>
<a href="a/aarne.html">How Great Thou Art</a><br>
<a href="a/aaroncarpenter.html">Great Is Thy Faithfulness</a><br>
<a href="c/carter.html">In Christ Alone</a><br>
<a href="a/aaroncole.html">Blessed Assurance</a><br>
<a href="a/aarondoh.html">What a Beautiful Name</a><br>
<a href="a/aaronfresh.html">10,000 Reasons (Bless the Lord)</a><br>
<a href="a/aarongoodvin.html">How Deep the Father's Love for Us</a><br>
<a href="a/aaronhall.html">Hallelujah for the Cross</a><br>
<a href="a/aaronlewis.html">Cornerstone</a><br>
<a href="l/lines.html">Holy Spirit</a><br>
<a href="a/aaronmay.html">The Stand</a><br>
<a href="a/aaronneville.html">Shout to the Lord</a><br>
<a href="a/aaronpritchett.html">Oceans (Where Feet May Fail)</a><br>
<a href="a/aaronshust.html">Lord, I Lift Your Name on High</a><br>
<a href="a/aaronsmithuk.html">Lord, I Lift Your Name on High</a><br>
<a href="a/aaronsmith.html">Good Good Father</a><br>
<a href="a/aarontaos.html">How He Loves</a><br>
<a href="a/aarontippin.html">Reckless Love</a><br>
<a href="a/aaronwatson.html">Forever</a><br>

</div>


<div class="col-sm-6 text-center artist-col">
<a href="a/aziatix.html">Stella Maris</a><br>
<a href="a/azizharun.html">Pag-aalala</a><br>
<a href="a/azizhedra.html">Paghahandog sa Sarili</a><br>
<a href="a/azizigibson.html">Mariang Ina ko</a><br>
<a href="a/azteccamera.html">Sa'yo lamang</a><br>
<a href="a/azureray.html">Hesus Hilumin Mo</a><br>
<a href="a/azureryder.html">Hindit kita Malilimutan</a><br>
<a href="a/azyet.html">Humayo't Ihayag</a><br>
<a href="a/azzimemo.html">Walang Pagmamaliw</a><br>
<a href="a/azzyland.html">Way Maker</a><br>
<a href="a/aaronhall.html">Break Every Chain</a><br>
<a href="a/aaronlewis.html">Mighty to Save</a><br>
<a href="l/lines.html">Open the Eyes of My Heart</a><br>
<a href="a/aaronmay.html">This Is Amazing Grace</a><br>
<a href="a/aaronneville.html">Build My Life</a><br>
<a href="a/aaronpritchett.html">Here for You</a><br>
<a href="a/aaronshust.html">You Are My All in All</a><br>
<a href="a/aaronsmithuk.html">Glorious Day</a><br>
<a href="a/aaronsmith.html">Your Grace Is Enough</a><br>
<a href="a/aarontaos.html">I Will Follow</a><br>
<a href="a/aarontippin.html">Everlasting God</a><br>
<a href="a/aaronwatson.html">O Praise the Name (Anástasis)</a><br>
<a href="a/aarontippin.html">This I Believe (The Creed)</a><br>
<a href="a/aaronwatson.html">At the Cross (Love Ran Red)</a><br>
<a href="a/aarontippin.html">The Heart of Worship</a><br>
<a href="a/aaronwatson.html">Beautiful One</a><br>
<a href="a/aarontippin.html">No Longer Slaves</a><br>
<a href="a/aaronwatson.html">King of My Heart</a><br>
<a href="a/aaronwatson.html">Jesus Messiah</a><br>
<a href="a/aarontippin.html">You Are Holy (Prince of Peace)g</a><br>


      </div>

</div>
</div>

</main
