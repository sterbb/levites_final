<?php
if ($_POST['search']) {

    $searchQuery = $_POST['search'];
    $apiKey = '10d5d6cfd3f1d6b777a1d447a76327de';
    $genreId = 22; // Replace with the desired music genre ID (numeric value)

    // Construct the API URL
    $apiUrl = "https://api.musixmatch.com/ws/1.1/track.search?q_track=" . urlencode($searchQuery) . "&apikey=$apiKey&s_track_rating=desc&f_music_genre_id=$genreId";

    // Make the API request to Musixmatch
    $searchResponse = file_get_contents($apiUrl);
    $searchData = json_decode($searchResponse, true);

    // Process the search results and extract the required data
    $trackList = array();
    if (isset($searchData['message']['body']['track_list'])) {
        foreach ($searchData['message']['body']['track_list'] as $trackData) {
            $track = array(
                'track_id' => $trackData['track']['track_id'],
                'track_name' => $trackData['track']['track_name'],
                'artist_name' => $trackData['track']['artist_name']
            );
            array_push($trackList, $track);
        }
    }

    // Return the search results as JSON
    header('Content-Type: application/json');
    echo json_encode($trackList);
} else {
    http_response_code(400); // Bad request
    echo json_encode(['error' => 'Invalid request.']);
}
?>