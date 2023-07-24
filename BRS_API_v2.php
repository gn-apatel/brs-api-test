<?php
// USING GUZZLE

$url = 'https://www.brsgolf.com/api/v2/clubs';
$username = 'brsmobileapp';
$password = 'QB6T9vmVw8WcbTZv8bGUJMs2E3SKU4jLBNJscNMZx4hyZdwfcta9ALqS4THXVxw679BFh5FsPEYbSUfHxSmvJVX9Wfm5gCPmterEJTWMzUjt8ej3kLwEbP7CkhLbfVAC8FvaxYDx2KzVvttMDsWxhNzmVqeqvjmVbFSNA2LgkfyDXTSD7XbPpNQRyZQcgzHSRuQVSQ5SZujDYjfm2TnetbP6Dk8gbf7Pae9vWA4kg5Bj84SsshnqMgGTFjPVeYr8';

require_once  "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client (['auth' => [$username, $password]]);
$response = $client->get('https://www.brsgolf.com/api/v2/clubs');
echo $response->getStatusCode();

if (200 == $response->getStatusCode()) {
    $body = $response->getBody();
    $arr_body = json_decode($body);
    print_r($arr_body);
}


?>