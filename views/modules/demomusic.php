<?php

$apiKey = '7a089ceadb3e1e9367a4a5f5d5e5a343';
$searchTerm = 'love';
$perPage = 5; // Number of tracks per page
$page = 1; // Initial page number
$tracks = array(); // Array to store track details

do {
    $apiUrl = "https://api.musixmatch.com/ws/1.1/track.search?q={$searchTerm}&page={$page}&page_size={$perPage}&apikey={$apiKey}";

    $response = file_get_contents($apiUrl);

    if ($response === false) {
        // Handle error if the API request fails
        echo "Failed to fetch data from the API.";
        break;
    }

    $data = json_decode($response, true);

    // Loop through the track details
    foreach ($data['message']['body']['track_list'] as $track) {
        $trackId = $track['track']['track_id'];
        $trackName = $track['track']['track_name'];
        $artistName = $track['track']['artist_name'];
        $albumName = $track['track']['album_name'];

        // Store the track details in the array
        $tracks[] = array(
            'track_id' => $trackId,
            'track_name' => $trackName,
            'artist_name' => $artistName,
            'album_name' => $albumName
        );
    }

    // Check if there are more tracks
    $totalPages = $data['message']['body']['track_list']['total_pages'];
    $page++;

} while ($page <= $totalPages);

// Output the list of songs
foreach ($tracks as $track) {
    echo "Track ID: {$track['track_id']}<br>";
    echo "Track Name: {$track['track_name']}<br>";
    echo "Artist Name: {$track['artist_name']}<br>";
    echo "Album Name: {$track['album_name']}<br>";
    echo "<br>";
}
?>