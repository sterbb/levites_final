<!--start main content-->
<main class="page-content">
      <div class="card">
        <div class="card-body">
            <div class="d-flex flex-lg-row flex-column align-items-start align-items-lg-center justify-content-between gap-3">

                <div class="overflow-auto align-items-center d-flex justify-content-center text-center">
                <div class="btn-group position-static text-center align-items-center justify-content-center">
                  <button class="btn btn-white px-2 "><i class="bx bx-chevron-left me-0"></i></button>
                  <p class="mb-0 ms-3" id="catdetails_prev"></p>
                </div>  
                </div>

                <div class="flex-grow-1 align-self-center text-center">
                  <h4 class="fw-bold " id="catdetails_calendar_date"></h4>
                  <p class="mb-0"><?php 
                       $events = (new ControllerPublic)->ctrGetChurchDetails();


                       foreach ($events as $key => $value) {
                        echo $value['church_name'];
                       }
                  
                  ?></p>
                </div>

                <div class="overflow-auto">
                <div class="btn-group position-static  align-items-center justify-content-center text-center">
                  <p class="pt-3" id="catdetails_adv"></p>
                  <button class="btn btn-white px-2 ms-3"><i class="bx bx-chevron-right me-0"></i></button>
                </div>  
                </div>
            </div>
        </div>
      </div>

        <div class="row">
          <div class="col-12 col-lg-8 d-flex">
            <div class="card w-100 py-3" >
              <div class="card-body" >

            
                 <?php 
                 

                 $events = (new ControllerPublic)->ctrShowEventDetails();


                 if (isset($events) && count($events) > 0) {
  
                 foreach ($events as $key => $value) {
                    echo'   <!-- event -->
                    <div class="border border-3 border-secondary p-3 mb-5">
                      <div class="row g-3">
                        <div class="col-12 col-lg-12 text-center d-flex justify-content-between align-items-center">
                        <p class="mb-0"><button  style="font-size:25px;opacity:0%;" type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Tooltip on bottom"><i class="fadeIn animated bx bx-info-circle"></i></button></p>
                        <h4 class="mb-0">'.$value["event_title"].'</h4>
                        ';


                        $group = (new ControllerPublic)->ctrCheckIfInGroup($value["eventID"]);
                        foreach ($group as $row) {
                          // Access individual fields of the row
                          $emails = $row['emailList'];
               
                                                    // Check if the email exists in the array
                          if (in_array($_COOKIE['acc_email'], json_decode($emails))) {
                            // echo "Email exists in the array.";
                            echo'   <p class="mb-0"><button  style="font-size:18px;" type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Assigned to: '.$row['group_name'].'"><i class="fadeIn animated bx bx-info-circle"></i></button></p>';
                          } else {
                            // echo "Email does not exist in the array.";
                            echo '   <p class="mb-0"><button  style="font-size:25px;opacity:0%;" type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Tooltip on bottom"><i class="fadeIn animated bx bx-info-circle"></i></button></p>';
                          }
                      
                        }
                     
                       
                       
                        echo'
                      </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-12 col-lg-12 ">
                          <h6 class="mb-2 ">When: '.$value["event_date"].' @'.$value["event_time"].'</h6>
                        </div>
                        <div class="col-12 col-lg-12 ">
                          <h6 class="mb-2 ">Where: '.$value["event_venue"].' - '.$value["event_location"].'</h6>
                          <p></p>
                        </div>
                        <div class="col-12 col-lg-12 mb-3">
                          <h6 class="mb-2 ">Announcement</h6>
                          <textarea class="form-control p-3" id="exampleFormControlTextarea1" rows="5" readonly>
'.$value["event_announcement"].'
                          </textarea>
                        </div>

                    </div>

                    </div>';


                  }
                 } else {
        
                  echo'    <!-- event -->
                  <div class="border border-3 border-secondary p-3 mb-5">
                    <div class="row g-3">
                      <div class="col-12 col-lg-12 text-center d-flex justify-content-center align-items-center">
                  
                      <h4 class="mb-0">There is no event in this date</h4>
                    
                    </div>
                  </div>
                  <div class="row g-3 mt-2">

                  </div>

                  </div> ';
                 }

                 ?>
                 
  

              </div>
            </div>
          </div>

          
          <div class="col-12 col-lg-4 d-flex">
            <div class="w-100">
            <div class="card overflow-auto py-3">
              <div class="card-body " style="max-height:700px;">
                  <div class=" ">

                  <h5 class="mb-3 fw-bold text-center">Daily Readings</h5>
                  <?php
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

                            // Convert the date string to a Unix timestamp
              $timestamp = strtotime($_COOKIE['viewDate']);

              // Get the day using the 'd' format in date()
                $day = date('d', $timestamp);
            
                // URL of the USCCB daily readings page
                $url = 'https://bible.usccb.org/bible/readings/07'.$day.'23.cfm';
                
                // Fetch the web pages
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
                    $formattedReading = "<h3 class='d-flex justify-content-between pt-3' style='margin-left: -20px; margin-bottom: 20px;'>$name<a  style='font-size: 15px; left:2rem;' href=\"$verseLink\">$verse</a></h3>\n$content\n";
                
                    // Add the formatted reading to the array
                    $formattedReadings[] = $formattedReading;
                }
                
                // Combine all the formatted readings into a single string
                $allReadings = implode("\n", $formattedReadings);
                
                // Display the title and all the formatted readings
                echo "
                <div class='text-center'>
                <h2 class=''>$title</h2>
                </div>\n";
                echo "<div style='margin-left: 30px; margin-bottom: 50px; font-size: 16px; padding-bottom:20px;'>$allReadings
                </div>"
                ;
                  
                  
            
            
            
            
            ?>















                  
                      <!-- <h5 class="mb-3 fw-bold ">Daily Readings</h5>
                      <div class="row">
                          <h4> Second Sunday of Easter (or Sunday of Divine Mercy)</h4>
                          <p>Lectionary: 43</p>
                      </div>
                  </div>
                  <div class="row mt-2 px-5">
                      <div class="d-flex justify-content-between border-bottom border-white mb-3">
                          <h5>Reading 1 </h5>
                          <div>
                              Acts 2:42-47
                          </div>
                      </div>
                      <div class="text-wrap" style="font-size:1.2em;" >
                          <p>They devoted themselves<br>to the teaching of the apostles and to the communal life,<br>to the breaking of bread and to the prayers.<br>Awe came upon everyone,<br>and many wonders and signs were done through the apostles.<br>All who believed were together and had all things in common;<br>they would sell their property and possessions<br>and divide them among all according to each one’s need.<br>Every day they devoted themselves<br>to meeting together in the temple area<br>and to breaking bread in their homes.<br>They ate their meals with exultation and sincerity of heart,<br>praising God and enjoying favor with all the people.<br>And every day the Lord added to their number those who were being saved.</p>
            
                      </div>
                  </div>
                  <div class="row mt-4 px-5">
                      <div class="d-flex justify-content-between border-bottom border-white mb-3">
                          <h5>Responsorial Psalm</h5>
                          <div>
                          Ps 118:2-4, 13-15, 22-24
                          </div>
                      </div>
                      <div class="text-wrap" style="font-size:1.2em;" >
                      <p>R. (1) <strong>Give thanks to the LORD for he is good, his love is everlasting.</strong><br>
                          or:<br>
                          R. <strong>Alleluia.</strong><br>
                          Let the house of Israel say,<br>
                          “His mercy endures forever.”<br>
                          Let the house of Aaron say,<br>
                          “His mercy endures forever.”<br>
                          Let those who fear the LORD say,<br>
                          “His mercy endures forever.”<br>
                          R. <strong>Give thanks to the LORD for he is good, his love is everlasting.</strong><br>
                          or:<br>
                          R. <strong>Alleluia.</strong><br>
                          I was hard pressed and was falling,<br>
                          but the LORD helped me.<br>
                          My strength and my courage is the LORD,<br>
                          and he has been my savior.<br>
                          The joyful shout of victory<br>
                          in the tents of the just:<br>
                          R. <strong>Give thanks to the LORD for he is good, his love is everlasting.</strong><br>
                          or:<br>
                          R.<strong> Alleluia.</strong><br>
                          The stone which the builders rejected<br>
                          has become the cornerstone.<br>
                          By the LORD has this been done;<br>
                          it is wonderful in our eyes.<br>
                          This is the day the LORD has made;<br>
                          let us be glad and rejoice in it.<br>
                          R. <strong>Give thanks to the LORD for he is good, his love is everlasting.</strong><br>
                          or:<br>
                          R. <strong>Alleluia.</strong></p>
            
                      </div> -->
                  </div>

                

              </div>
            </div>
              
            <div class="col-12 col-lg-12 col-xl-12">
              <div class="card">
                  <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                    <h4 class="card-title fw-bold text-center text-black">Podcast</h4>
                      <audio id="podcastPlayer" controls autoplay>
                          Your browser does not support the audio element.
                      </audio>
                      <button type="button" class="btn btn-outline-dark mt-3 px-5" id="downloadPodcast" onclick="downloadPodcast()"><span class="material-symbols-outlined">cloud_download</span>Download</button>
                  </div>
                 
                </div>
            </div>
   
          
         
</main>