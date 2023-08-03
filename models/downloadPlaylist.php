<?php
if ($_POST['songlist']) {

    $tracksData = json_decode($_POST['songlist'], true);
    $playlist_name = $_POST['playlist_name'];

    if (!is_array($tracksData)) {
        http_response_code(400); // Bad request
        echo json_encode(['error' => 'Invalid tracks data format.']);
        exit();
    }

    $apiKey = '7a089ceadb3e1e9367a4a5f5d5e5a343';

    // Concatenate the lyrics of all tracks
    $allLyrics = '';
    foreach ($tracksData as $track) {
        if (isset($track['trackID'])) {
            $trackID = $track['trackID'];

            // Construct the API URL to get the lyrics
            $lyricsApiUrl = "https://api.musixmatch.com/ws/1.1/track.lyrics.get?track_id=$trackID&apikey=$apiKey";

            // Make the API request to Musixmatch to get the lyrics
            $lyricsResponse = file_get_contents($lyricsApiUrl);
            $lyricsData = json_decode($lyricsResponse, true);

            // Extract the lyrics from the API response and concatenate
            if (isset($lyricsData['message']['body']['lyrics']['lyrics_body'])) {
                $lyrics = $lyricsData['message']['body']['lyrics']['lyrics_body'];

                // Remove any unwanted text from the lyrics
                $lyrics = str_replace("******* This Lyrics is NOT for Commercial use *******", "", $lyrics);

                // Append the artist and title details for each track
                $allLyrics .= "Artist: " . $track['artist'] . "\n";
                $allLyrics .= "Title: " . $track['title'] . "\n\n";

                // Concatenate the lyrics of the track
                $allLyrics .= $lyrics . "\n\n";
            }
        }
    }

    // Set the response headers to initiate download
    header('Content-Type: text/plain'); // Set content type as plain text
    header('Content-Disposition: attachment; filename="' . $playlist_name . '.txt"'); // Set the filename for download
    echo $allLyrics; // Output the file contents directly to the response

} else {
    http_response_code(400); // Bad request
    echo json_encode(['error' => 'Invalid request.']);
}
?>
