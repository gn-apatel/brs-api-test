
    <?php
    // USING GUZZLE

    $url = 'https://www.brsgolf.com/api/v2/clubs';
    $username = 'brsmobileapp';
    $password = 'QB6T9vmVw8WcbTZv8bGUJMs2E3SKU4jLBNJscNMZx4hyZdwfcta9ALqS4THXVxw679BFh5FsPEYbSUfHxSmvJVX9Wfm5gCPmterEJTWMzUjt8ej3kLwEbP7CkhLbfVAC8FvaxYDx2KzVvttMDsWxhNzmVqeqvjmVbFSNA2LgkfyDXTSD7XbPpNQRyZQcgzHSRuQVSQ5SZujDYjfm2TnetbP6Dk8gbf7Pae9vWA4kg5Bj84SsshnqMgGTFjPVeYr8';

    require_once  "vendor/autoload.php";

    use GuzzleHttp\Client;          // imports in Guzzle library

    $client = new Client (['auth' => [$username, $password]]);
    $response = $client->get('https://www.brsgolf.com/api/v2/clubs');

    if (200 == $response->getStatusCode()) {            // 200 status code = success
        $output = $response->getBody();
        $response_data = json_decode($output);          // decodes data from json and converts it to objects
        $club_data = $response_data->_results;  }        // removes header/extra info contained within the class
    ?>

    <!DOCTYPE html>

    <html lang="en" xmlns="http://www.w3.org/1999/html">

    <head>
        <meta charset="UTF-8">
        <title>Mobile-Enabled Clubs</title>

        <style>
            body {
                font-family: sans-serif;
            }
        </style>
    </head>

    <body>

    <h1>Mobile-Enabled BRS Clubs</h1>

        <ul>
        <?php foreach ($club_data as $club):                  // loops through all clubs ?>
            <?php if ($club->mobile_enabled): ?>
            <li>
                <?php
                $url = "https://www.brsgolf.com/" . $club->club_id;
                echo ($club->name); ?>
                <a href="<?php $url; ?>">(<?= $url ?>)</a><br>
            </li>
                <!-- outputs name with corresponding hyperlink -->
            <?php endif; ?>
            <?php endforeach; ?>
        </ul>



</body>

</html>
