<?php

$url = 'https://www.brsgolf.com/api/v2/clubs';
$username = 'brsmobileapp';
$password = 'QB6T9vmVw8WcbTZv8bGUJMs2E3SKU4jLBNJscNMZx4hyZdwfcta9ALqS4THXVxw679BFh5FsPEYbSUfHxSmvJVX9Wfm5gCPmterEJTWMzUjt8ej3kLwEbP7CkhLbfVAC8FvaxYDx2KzVvttMDsWxhNzmVqeqvjmVbFSNA2LgkfyDXTSD7XbPpNQRyZQcgzHSRuQVSQ5SZujDYjfm2TnetbP6Dk8gbf7Pae9vWA4kg5Bj84SsshnqMgGTFjPVeYr8';

    // creating and initialising a curl session
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);     // sets up URL
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);          // returns the transfer as a string
    curl_setopt($curl, CURLOPT_HEADER, false);              // skips the header info in the output

    $output = curl_exec($curl);

    curl_close($curl);

    $response_data = json_decode($output);
    $club_data = $response_data->data;

    echo "Mobile-enabled BRS clubs \n ";
    foreach ($club_data as $club){
        if ($club->mobile_enabled){
            echo $club->name;
            echo "\n";

        }
    }

// http_response_code(404);         returned when no clubs can be found
// exit;
// http_response_code(200);         returned when successful

?>