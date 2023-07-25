
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
    $responseData = json_decode($output);          // decodes data from json and converts it to objects
    $clubData = $responseData->_results;  }        // removes header/extra info contained within the class

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <!-- line below brings in bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Mobile-Enabled Clubs</title>

    <style>
        body {
            font-family: sans-serif;
        }
    </style>
</head>

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <span class="fs-4">BRS Clubs List</span>
        </a>

    </header>
</div>

<div class="py-5 bg-body-tertiary">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <!-- Outputs as columns of 3 -->

<?php foreach ($clubData as $club):             // loops through all clubs
        if ($club->mobile_enabled): ?>

                        <div class="col">
                            <div class="card shadow-sm h-100">
                                <div class="card-header">
                                    <?php echo $club->name; ?>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        <?php
                                        // outputs each property contained in address object
                                        foreach($club->address as $addressLine){
                                            if ($addressLine != "") {
                                                echo $addressLine .", ";
                                                // if address line value is empty, does not bother outputting it out
                                            }
                                        }
                                        ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <?php $clubURL = "https://www.brsgolf.com/" . $club->club_id; ?>
                                            <!-- Attaches hyperlink to button -->
                                            <a href="<?php echo $clubURL ?>">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Visit</button>
                                            </a>
                                        </div>
                                        <small class="text-body-secondary">(<?php echo $club->club_id ?>)</small>
                                        <!-- retrieves club ID -->
                                    </div>
                                </div>
                            </div>
                        </div>


    <?php endif; ?>
<?php endforeach; ?>
        </div>
    </div>
</div>
