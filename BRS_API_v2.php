
<?php
    require_once  "vendor/autoload.php";
    use GuzzleHttp\Client;

    $url = 'https://www.brsgolf.com/api/v2/clubs';
    $username = 'brsmobileapp';
    $password = 'QB6T9vmVw8WcbTZv8bGUJMs2E3SKU4jLBNJscNMZx4hyZdwfcta9ALqS4THXVxw679BFh5FsPEYbSUfHxSmvJVX9Wfm5gCPmterEJTWMzUjt8ej3kLwEbP7CkhLbfVAC8FvaxYDx2KzVvttMDsWxhNzmVqeqvjmVbFSNA2LgkfyDXTSD7XbPpNQRyZQcgzHSRuQVSQ5SZujDYjfm2TnetbP6Dk8gbf7Pae9vWA4kg5Bj84SsshnqMgGTFjPVeYr8';

    $client = new Client (['auth' => [$username, $password]]);
    $response = $client->get($url);

    if ($response->getStatusCode() == 200):
        $output = $response->getBody();
        $responseData = json_decode($output);
        $clubData = $responseData->_results;
        // $club_data = [];
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

                <?php
                    if (empty($clubData)):
                        echo "No Clubs Found!";
                ?>
                <ul>
                <?php
                    else:
                        foreach ($clubData as $club): ?>
                            <?php if ($club->mobile_enabled): ?>
                                <li>
                                    <?php
                                    $clubURL = "https://www.brsgolf.com/".$club->club_id;
                                    echo ($club->name); ?>
                                    <a href="<?php echo $clubURL ?>">(<?php echo $clubURL ?>)</a><br>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                </ul>
                    <?php endif;  ?>
            </body>

        </html>

    <?php else:
        echo "Sorry! Access not authorised";
    endif;
    ?>