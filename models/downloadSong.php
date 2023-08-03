<?php
// Check if the request contains the 'track_id' parameter
if (isset($_POST['track_id'])) {
    // Retrieve the track ID from the POST data
    $track_id = $_POST['track_id'];

// Replace 'YOUR_API_KEY' with your actual MusicMatch API key
$api_key = '7a089ceadb3e1e9367a4a5f5d5e5a343';

// API endpoint URLs
$lyrics_endpoint = "http://api.musixmatch.com/ws/1.1/track.lyrics.get?apikey=$api_key&track_id=$track_id";
$track_endpoint = "http://api.musixmatch.com/ws/1.1/track.get?apikey=$api_key&track_id=$track_id";

// Fetch lyrics
$lyrics_response = file_get_contents($lyrics_endpoint);
$lyrics_data = json_decode($lyrics_response, true);

// Fetch track details
$track_response = file_get_contents($track_endpoint);
$track_data = json_decode($track_response, true);

// Check if both API requests were successful
    if (
        $lyrics_data && $lyrics_data['message']['header']['status_code'] === 200 &&
        $track_data && $track_data['message']['header']['status_code'] === 200
    ) {
        // Extract data
        $lyrics = $lyrics_data['message']['body']['lyrics']['lyrics_body'];
        $title = $track_data['message']['body']['track']['track_name'];
        $artist = $track_data['message']['body']['track']['artist_name'];

        // Remove any extra whitespace and line breaks from the lyrics
        $lyrics = trim($lyrics);

        // Create content for the downloadable file
        $file_content = "Title: $title\nArtist: $artist\n\n$lyrics";

        // Set the file name
         // Create an array with the title, artist, and lyrics
        $response = array(
            'title' => $title,
            'artist' => $artist,
            'lyrics' => $file_content
        );

        // Send the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Handle API request errors
        echo "Failed to fetch data.";
    }
} else {
    // Return an error response if 'track_id' is not provided
    echo "Error: Track ID not provided.";
}
?>