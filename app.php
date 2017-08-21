<?php

include 'vendor/autoload.php';

$host = 'https://pa-codibly.cloud.databricks.com/api/v2';
$user = 'mariusz.kraj@codibly.com';
$password = '!';


$adapter = new \Codibly\DatabricksBundle\Adapter\GuzzleAdapter($user, $password, $host);
$client = new \Codibly\DatabricksBundle\Client\Client($adapter);

$client->cluster()->create([]);
