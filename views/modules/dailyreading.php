<?php
// // Function to fetch the web page content using file_get_contents
// function fetchWebPage($url) {
//     $options = [
//         'http' => [
//             'method' => 'GET',
//             'header' => 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3', // Set a user agent to mimic a browser request
//         ],
//     ];
//     $context = stream_context_create($options);
//     $response = file_get_contents($url, false, $context);
//     return $response;
// }

// // URL of the USCCB daily readings page
// $url = 'https://bible.usccb.org/bible/readings/072023.cfm';

// // Fetch the web page
// $html = fetchWebPage($url);

// // Create a DOMDocument object and suppress any warnings for malformed HTML
// $dom = new DOMDocument();
// libxml_use_internal_errors(true);
// $dom->loadHTML($html);
// libxml_clear_errors();

// // Create a DOMXPath object to navigate the HTML
// $xpath = new DOMXPath($dom);

// // Find the element that contains the daily readings
// // Here, we use the class name "b-verse" to target the div elements that hold each reading
// $readings = $xpath->query('//div[contains(@class, "b-verse")]');

// // Loop through each reading and extract the content
// $dailyReadings = '';
// foreach ($readings as $reading) {
//     // Extract the name of the reading (e.g., "Reading 1", "Responsorial Psalm", etc.)
//     $name = $xpath->query('.//h3[@class="name"]', $reading)->item(0)->nodeValue;

//     // Extract the text content of the reading
//     $content = $xpath->query('.//div[@class="content-body"]', $reading)->item(0)->nodeValue;

//     // Combine the name and content of the reading and add it to the final output
//     $dailyReadings .= "<h3>$name</h3>\n<p>$content</p>\n";
// }

// // Display the daily readings
// echo $dailyReadings;



// Function to fetch the web page content using file_get_contents
// Function to fetch the web page content using file_get_contents
// Function to fetch the web page content using file_get_contents
function fetchWebPage($url) {
    $options = [
        'http' => [
            'method' => 'GET',
            'header' => 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3', // Set a user agent to mimic a browser request
        ],
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    return $response;
}

// URL of the USCCB daily readings page
$url = 'https://bible.usccb.org/bible/readings/072023.cfm';

// Fetch the web page
$html = fetchWebPage($url);

// Create a DOMDocument object and suppress any warnings for malformed HTML
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

// Create a DOMXPath object to navigate the HTML
$xpath = new DOMXPath($dom);

// Find the element that contains the title and lectionary
$titleElement = $xpath->query('//div[contains(@class, "b-lectionary")]//h2')->item(0);
$title = $titleElement->nodeValue;

// Find all the elements that contain the readings
$readings = $xpath->query('//div[contains(@class, "b-verse")]');

// Initialize an array to store the formatted readings
$formattedReadings = [];

// Loop through each reading and extract the content and verses
foreach ($readings as $reading) {
    // Extract the name of the reading (e.g., "Reading 1", "Responsorial Psalm", etc.)
    $name = $xpath->query('.//h3[@class="name"]', $reading)->item(0)->nodeValue;

    // Extract the verses and the link
    $verseElement = $xpath->query('.//div[@class="address"]/a', $reading)->item(0);
    $verse = $verseElement->nodeValue;
    $verseLink = $verseElement->getAttribute('href');

    // Extract the text content of the reading, including the <br> tags
    $content = $dom->saveHTML($xpath->query('.//div[@class="content-body"]', $reading)->item(0));

    // Format the reading with heading, verses (as a link), and preserved HTML content
    $formattedReading = "<h3>$name - <a href=\"$verseLink\">$verse</a></h3>\n$content\n";

    // Add the formatted reading to the array
    $formattedReadings[] = $formattedReading;
}

// Combine all the formatted readings into a single string
$allReadings = implode("\n", $formattedReadings);

// Display the title and all the formatted readings
echo "<h2>$title</h2>\n";
echo $allReadings;