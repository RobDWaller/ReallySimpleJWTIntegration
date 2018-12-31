<?php

require('../vendor/autoload.php');

use ReallySimpleJWT\TokenBuilder;
use Carbon\Carbon;

$tokenBuilder = new TokenBuilder();

$token = $tokenBuilder->addPayload(['key' => 'user_id', 'value' => 1])
    ->setSecret('!secReT$123*')
    ->setExpiration(Carbon::now()->addSeconds(30)->toDateTimeString())
    ->setIssuer('localhost')
    ->build();

echo '<h1>Really Simple JWT Advanced Integration Test</h1>';

echo '<h2>Get Token</h2>';

echo "<pre>";
var_dump($token);
echo "</pre>";

echo '<p><a href="advancedvalidate.php?token=' . $token . '">Validate Token</a></p>';

echo '<p><a href="/">Back</a></p>';
